<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\InvoiceCreate;
use App\Livewire\InvoiceShow;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/invoices/{id}', InvoiceShow::class)->name('invoices.show');
    Route::get('/invoices/create', function () {
    return view('invoices.create');
})->name('invoices.create');

Route::get('/generate-qr', function (Request $request) {
    $token = $request->query('token');

    if (!$token) {
        abort(400, 'Missing QR token');
    }

    // Use SVG format instead of PNG to avoid needing Imagick
    return response(QrCode::format('svg')->size(200)->generate($token))
        ->header('Content-Type', 'image/svg+xml');
});
});



require __DIR__.'/auth.php';

