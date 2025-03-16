<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return 'Panel de Administración';
})->middleware('admin');

Route::get('/admin/users', function () {
    $users = User::all();
    return view('admin.users', compact('users'));
})->middleware(['auth', 'admin']);

Route::get('/dashboard', function () {
    $users = [];

    // Verificar si el usuario está autenticado y es un admin para cargar los usuarios
    if (Auth::check() && Auth::user()->role === 'admin') { // Usa Auth en lugar de auth()
        $users = User::all();
    }

    return view('dashboard', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

require __DIR__.'/auth.php';
