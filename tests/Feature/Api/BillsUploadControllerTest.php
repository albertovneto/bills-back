<?php

namespace Tests\Feature\Api;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BillsUploadControllerTest extends TestCase
{
    public function testUploadSuccess()
    {
        $file = UploadedFile::fake()->create('example.csv');

        $response = $this->postJson('/api/bills/upload', [
            'file' => $file,
        ]);

        $response
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJson(['message' => 'ok']);
    }

    public function testValidationFile()
    {
        $response = $this->postJson('/api/bills/upload', [
            'file' => 'files',
        ]);

        $response->assertStatus(400)
            ->assertJsonStructure(['message']);
    }
}
