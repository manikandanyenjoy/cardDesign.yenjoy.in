<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::post('users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

    Route::get('users/change-password', [\App\Http\Controllers\Admin\UserController::class, 'showChangePasswordForm'])->name('changePasswordForm');
    Route::post('users/change-password', [\App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('changePassword');

    Route::get('sellers', [\App\Http\Controllers\Admin\SellerController::class, 'index'])->name('sellers.index');
    Route::get('sellers/create', [\App\Http\Controllers\Admin\SellerController::class, 'create'])->name('sellers.create');
    Route::post('sellers', [\App\Http\Controllers\Admin\SellerController::class, 'store'])->name('sellers.store');
    Route::get('sellers/{seller}/edit', [\App\Http\Controllers\Admin\SellerController::class, 'edit'])->name('sellers.edit');
    Route::put('sellers/{seller}', [\App\Http\Controllers\Admin\SellerController::class, 'update'])->name('sellers.update');
    Route::get('sellers/{seller}', [\App\Http\Controllers\Admin\SellerController::class, 'show'])->name('sellers.show');
    Route::delete('sellers/{seller}', [\App\Http\Controllers\Admin\SellerController::class, 'destroy'])->name('sellers.destroy');

    Route::get('buyers', [\App\Http\Controllers\Admin\BuyerController::class, 'index'])->name('buyers.index');
    Route::get('buyers/create', [\App\Http\Controllers\Admin\BuyerController::class, 'create'])->name('buyers.create');
    Route::post('buyers', [\App\Http\Controllers\Admin\BuyerController::class, 'store'])->name('buyers.store');
    Route::get('buyers/{buyer}/edit', [\App\Http\Controllers\Admin\BuyerController::class, 'edit'])->name('buyers.edit');
    Route::put('buyers/{buyer}', [\App\Http\Controllers\Admin\BuyerController::class, 'update'])->name('buyers.update');
    Route::get('buyers/{buyer}', [\App\Http\Controllers\Admin\BuyerController::class, 'show'])->name('buyers.show');
    Route::delete('buyers/{buyer}', [\App\Http\Controllers\Admin\BuyerController::class, 'destroy'])->name('buyers.destroy');
    
    //Designer

    Route::get('designers', [\App\Http\Controllers\Admin\DesignerController::class, 'index'])->name('designers.index');
    Route::get('designers/create', [\App\Http\Controllers\Admin\DesignerController::class, 'create'])->name('designers.create');
    Route::post('designers', [\App\Http\Controllers\Admin\DesignerController::class, 'store'])->name('designers.store');
    Route::get('designers/{designer}/edit', [\App\Http\Controllers\Admin\DesignerController::class, 'edit'])->name('designers.edit');
    Route::put('designers/{designer}', [\App\Http\Controllers\Admin\DesignerController::class, 'update'])->name('designers.update');
    Route::get('designers/{designer}', [\App\Http\Controllers\Admin\DesignerController::class, 'show'])->name('designers.show');
    Route::delete('designers/{designer}', [\App\Http\Controllers\Admin\DesignerController::class, 'destroy'])->name('designers.destroy');
    
    
    //Sales Rep

    Route::get('salesreps', [\App\Http\Controllers\Admin\SalesRepController::class, 'index'])->name('salesreps.index');
    Route::get('salesreps/create', [\App\Http\Controllers\Admin\SalesRepController::class, 'create'])->name('salesreps.create');
    Route::post('salesreps', [\App\Http\Controllers\Admin\SalesRepController::class, 'store'])->name('salesreps.store');
    Route::get('salesreps/{salesrep}/edit', [\App\Http\Controllers\Admin\SalesRepController::class, 'edit'])->name('salesreps.edit');
    Route::put('salesreps/{salesrep}', [\App\Http\Controllers\Admin\SalesRepController::class, 'update'])->name('salesreps.update');
    Route::get('salesreps/{salesrep}', [\App\Http\Controllers\Admin\SalesRepController::class, 'show'])->name('salesreps.show');
    Route::delete('salesreps/{salesrep}', [\App\Http\Controllers\Admin\SalesRepController::class, 'destroy'])->name('salesreps.destroy');


    //Printers

    Route::get('printers', [\App\Http\Controllers\Admin\PrinterController::class, 'index'])->name('printers.index');
    Route::get('printers/create', [\App\Http\Controllers\Admin\PrinterController::class, 'create'])->name('printers.create');
    Route::post('printers', [\App\Http\Controllers\Admin\PrinterController::class, 'store'])->name('printers.store');
    Route::get('printers/{printer}/edit', [\App\Http\Controllers\Admin\PrinterController::class, 'edit'])->name('printers.edit');
    Route::put('printers/{printer}', [\App\Http\Controllers\Admin\PrinterController::class, 'update'])->name('printers.update');
    Route::get('printers/{printer}', [\App\Http\Controllers\Admin\PrinterController::class, 'show'])->name('printers.show');
    Route::delete('printers/{printer}', [\App\Http\Controllers\Admin\PrinterController::class, 'destroy'])->name('printers.destroy');

   //Printers

   Route::get('finishers', [\App\Http\Controllers\Admin\FinisherController::class, 'index'])->name('finishers.index');
   Route::get('finishers/create', [\App\Http\Controllers\Admin\FinisherController::class, 'create'])->name('finishers.create');
   Route::post('finishers', [\App\Http\Controllers\Admin\FinisherController::class, 'store'])->name('finishers.store');
   Route::get('finishers/{finisher}/edit', [\App\Http\Controllers\Admin\FinisherController::class, 'edit'])->name('finishers.edit');
   Route::put('finishers/{finisher}', [\App\Http\Controllers\Admin\FinisherController::class, 'update'])->name('finishers.update');
   Route::get('finishers/{finisher}', [\App\Http\Controllers\Admin\FinisherController::class, 'show'])->name('finishers.show');
   Route::delete('finishers/{finisher}', [\App\Http\Controllers\Admin\FinisherController::class, 'destroy'])->name('finishers.destroy');


   //Loom Operator

   Route::get('loomoperators', [\App\Http\Controllers\Admin\LoomOperatorController::class, 'index'])->name('loomoperators.index');
   Route::get('loomoperators/create', [\App\Http\Controllers\Admin\LoomOperatorController::class, 'create'])->name('loomoperators.create');
   Route::post('loomoperators', [\App\Http\Controllers\Admin\LoomOperatorController::class, 'store'])->name('loomoperators.store');
   Route::get('loomoperators/{loomoperator}/edit', [\App\Http\Controllers\Admin\LoomOperatorController::class, 'edit'])->name('loomoperators.edit');
   Route::put('loomoperators/{loomoperator}', [\App\Http\Controllers\Admin\LoomOperatorController::class, 'update'])->name('loomoperators.update');
   Route::get('loomoperators/{loomoperator}', [\App\Http\Controllers\Admin\LoomOperatorController::class, 'show'])->name('loomoperators.show');
   Route::delete('loomoperators/{loomoperator}', [\App\Http\Controllers\Admin\LoomOperatorController::class, 'destroy'])->name('loomoperators.destroy');



   //Finishing Operators

   Route::get('finishingoperators', [\App\Http\Controllers\Admin\FinishingOperatorController::class, 'index'])->name('finishingoperators.index');
   Route::get('finishingoperators/create', [\App\Http\Controllers\Admin\FinishingOperatorController::class, 'create'])->name('finishingoperators.create');
   Route::post('finishingoperators', [\App\Http\Controllers\Admin\FinishingOperatorController::class, 'store'])->name('finishingoperators.store');
   Route::get('finishingoperators/{finishingoperator}/edit', [\App\Http\Controllers\Admin\FinishingOperatorController::class, 'edit'])->name('finishingoperators.edit');
   Route::put('finishingoperators/{finishingoperator}', [\App\Http\Controllers\Admin\FinishingOperatorController::class, 'update'])->name('finishingoperators.update');
   Route::get('finishingoperators/{finishingoperator}', [\App\Http\Controllers\Admin\FinishingOperatorController::class, 'show'])->name('finishingoperators.show');
   Route::delete('finishingoperators/{finishingoperator}', [\App\Http\Controllers\Admin\FinishingOperatorController::class, 'destroy'])->name('finishingoperators.destroy');


   //Quality Checkers

   Route::get('qualitycheckers', [\App\Http\Controllers\Admin\QualityCheckerController::class, 'index'])->name('qualitycheckers.index');
   Route::get('qualitycheckers/create', [\App\Http\Controllers\Admin\QualityCheckerController::class, 'create'])->name('qualitycheckers.create');
   Route::post('qualitycheckers', [\App\Http\Controllers\Admin\QualityCheckerController::class, 'store'])->name('qualitycheckers.store');
   Route::get('qualitycheckers/{qualitychecker}/edit', [\App\Http\Controllers\Admin\QualityCheckerController::class, 'edit'])->name('qualitycheckers.edit');
   Route::put('qualitycheckers/{qualitychecker}', [\App\Http\Controllers\Admin\QualityCheckerController::class, 'update'])->name('qualitycheckers.update');
   Route::get('qualitycheckers/{qualitychecker}', [\App\Http\Controllers\Admin\QualityCheckerController::class, 'show'])->name('qualitycheckers.show');
   Route::delete('qualitycheckers/{qualitychecker}', [\App\Http\Controllers\Admin\QualityCheckerController::class, 'destroy'])->name('qualitycheckers.destroy');

});

