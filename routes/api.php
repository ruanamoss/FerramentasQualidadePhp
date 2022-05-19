<?php

use App\Http\Controllers\Api\BankAccountController;
use App\Http\Controllers\Api\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [AuthController::class, 'authUser']);
    Route::get('clients', [ClientController::class, 'index'])->name('client.index');
    Route::post('clients', [ClientController::class, 'store'])->name('client.store');
    
    Route::get('bankaccount', [BankAccountController::class, 'index'])->name('bankaccount.index');
    Route::post('bankaccount', [BankAccountController::class, 'store'])->name('bankaccount.store');
    Route::post('withdraw', [BankAccountController::class, 'withdraw'])->name('bankaccount.withdraw');
    Route::post('deposit', [BankAccountController::class, 'deposit'])->name('bankaccount.deposit');
});
