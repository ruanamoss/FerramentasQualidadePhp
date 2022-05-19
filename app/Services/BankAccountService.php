<?php

namespace App\Services;

use App\Repositories\BankAccountRepository;

class BankAccountService 
{
    /**
     * @var BankAccountRepository
     */
    private $bankAccountRepository;

    public function __construct(BankAccountRepository $bankAccountRepository)
    {
        $this->bankAccountRepository = $bankAccountRepository;
    }

    public function verifyAccountExists($bankAccount)
    {
        $findAccount = $this->bankAccountRepository->findAccount($bankAccount);

        if ($findAccount) {
            return true;
        }

        return false;
    }

    public function moneyWithdraw($bankAccount)
    {
        $findAccount = $this->bankAccountRepository->findAccount($bankAccount);
        
        if(!$findAccount){
            return ['verify' => false, 'message' => 'Conta inexistente'];
        }

        if($bankAccount['withdraw'] > $findAccount->balance)
            return ['verify' => false, 'message' => 'Saldo insuficiente'];

        $bankAccount['balance'] = $findAccount->balance - $bankAccount['withdraw'];
        $this->bankAccountRepository->changeBalance($bankAccount);

        return ['verify' => true, 'message' => "Retirada ok, saldo restante: R$ $bankAccount[balance]"];
    }

    public function moneyDeposit($bankAccount)
    {
        $findAccount = $this->bankAccountRepository->findAccount($bankAccount);
        
        if(!$findAccount){
            return ['verify' => false, 'message' => 'Conta inexistente'];
        }

        $bankAccount['balance'] = $findAccount->balance + $bankAccount['deposit'];
        $this->bankAccountRepository->changeBalance($bankAccount);

        return ['verify' => true, 'message' => "Depósito ok, saldo atual: R$ $bankAccount[balance]"];
    }
}