<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\PaymentMethodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/carteira', [WalletController::class, 'index'])->name('wallet.index');
    Route::get('/carteira/{id}', [WalletController::class, 'show'])->name('wallet.show');
    Route::post('/carteira', [WalletController::class, 'store'])->name('wallet.store');
});


Route::get('/financeiro', [FinanceController::class, 'index'])
->middleware(['auth', 'verified'])
->name('finance.index');

Route::get('/financeiro/receita', [RevenueController::class, 'index'])
->middleware(['auth', 'verified'])
->name('finance.revenue');
Route::post('/financeiro/receita', [RevenueController::class, 'store'])
->middleware(['auth', 'verified'])
->name('finance.revenue');

Route::get('/financeiro/despesa', [ExpenseController::class, 'index'])
->middleware(['auth', 'verified'])
->name('finance.expense');
Route::post('/financeiro/despesa', [ExpenseController::class, 'store'])
->middleware(['auth', 'verified'])
->name('finance.expense');


Route::get('/financeiro/formas-de-pagamento', [PaymentMethodController::class, 'index'])
->middleware(['auth', 'verified'])
->name('paymentMethod.index');
Route::post('/financeiro/formas-de-pagamento', [PaymentMethodController::class, 'store'])
->middleware(['auth', 'verified'])
->name('paymentMethod.store');

Route::get('/financeiro/receber', [ReceiveController::class, 'index'])
->middleware(['auth', 'verified'])
->name('receive.index');
Route::post('/financeiro/receber', [ReceiveController::class, 'store'])
->middleware(['auth', 'verified'])
->name('receive.store');



Route::get('/components/buttons', function () {
    return Inertia::render('Components/Buttons');
})->middleware(['auth', 'verified'])->name('components.buttons');

require __DIR__ . '/auth.php';
