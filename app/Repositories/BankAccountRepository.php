<?php

namespace App\Repositories;

use App\Models\BankAccount;

class BankAccountRepository
{
    public function findAccount($bankAccount)
    {
        return BankAccount::where('client_id', $bankAccount['client_id'])->first();
    }

    public function createAccount($bankAccount)
    {
        return BankAccount::create($bankAccount->all());
    }

    public function changeBalance($bankAccount)
    {
        return BankAccount::where('client_id', $bankAccount['client_id'])->update(['balance' => $bankAccount->balance]);
    }
}