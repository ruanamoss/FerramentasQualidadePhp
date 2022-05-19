<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Services\BankAccountService;
use Illuminate\Support\Facades\Log;

class BankAccountController extends Controller
{
    /**
     * @var BankAccountService
     */
    private $bankAccountService;

    public function __construct(BankAccountService $bankAccountService)
    {
        $this->bankAccountService = $bankAccountService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {
        try {
            $account = BankAccount::all();
            return response($account);
        } catch (\Exception) {
            throw new \Exception('Exception message');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $verifyAccount = $this->bankAccountService->verifyAccountExists($request);

            if ($verifyAccount) {
                return Response('Cliente já possui conta no banco', 200);
            }
            
            $account = BankAccount::create($request->all());
            return Response($account, 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception ($e, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function withdraw(Request $request)
    {
        try {
            $account = $this->bankAccountService->moneyWithdraw($request);
            
            if (!$account['verify']) {
                return Response($account['message'], 200);
            }

            return Response($account['message'], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception ($e, 500);
        }
    }

    public function deposit(Request $request)
    {
        try {
            $account = $this->bankAccountService->moneyDeposit($request);
            
            if (!$account['verify']) {
                return Response($account['message'], 200);
            }

            return Response($account['message'], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception ($e, 500);
        }
    }
}
