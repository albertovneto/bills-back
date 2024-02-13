<?php

namespace App\Dto;

class BillDto
{
    public function __construct(
        public readonly int $billFilesId,
        public readonly string $name,
        public readonly string $governmentId,
        public readonly string $email,
        public readonly float $debtAmount,
        public readonly string $debtDueDate,
        public readonly string $debtId,
    ) {}

    public function toArray(): array
    {
        return [
            'bills_files_id' => $this->billFilesId,
            'name' => $this->name,
            'government_id' => $this->governmentId,
            'email' => $this->email,
            'debt_amount' => $this->debtAmount,
            'debt_due_date' => $this->debtDueDate,
            'debt_id' => $this->debtId,
        ];
    }
}
