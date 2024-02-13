<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Contract\BillsFileServiceContract;

use App\Services\Contract\ProcessBillsServiceContract;
use App\Services\Contract\UploadServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;
use Throwable;

class BillsUploadController extends Controller
{
    public function __construct(
        protected readonly BillsFileServiceContract $billsFileServiceContract,
        protected readonly UploadServiceContract $uploadServiceContract
    ) {
    }

    public function upload(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'file' => ['required', File::types(['csv'])]
            ]);

            $file = $this->uploadServiceContract->upload(
                $request->file('file'),
            );

            $this->billsFileServiceContract->create(
                $file->toArray(),
            );

            return response()->json(['message' => 'ok'], Response::HTTP_CREATED);
        } catch (ValidationException $validationException) {
            return response()->json(
                ['message' => $validationException->getMessage()],
                Response::HTTP_BAD_REQUEST
            );
        } catch (Throwable $exception) {
            return response()->json(
                ['message' => $exception->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
