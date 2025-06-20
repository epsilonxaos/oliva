<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComandosController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\WebsiteController;
use App\Models\Website;
use Illuminate\Support\Facades\Route;

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


Route::get('/artisan', [ComandosController::class, 'executeComands']);

Route::view('/', 'layouts.app')->where('path', '.*');
Route::view('/bolsa-de-trabajo', 'layouts.app')->where('path', '.*');
Route::view('/eventos', 'layouts.app')->where('path', '.*');
Route::view('/politicas-privacidad', 'layouts.app')->where('path', '.*');
Route::view('/politicas-reservacion', 'layouts.app')->where('path', '.*');
Route::get('/sucursal/{slug}', function ($slug) {
	$w = Website::find(1);
	return view('layouts.app', ['st' => $w->link_covermanager]);
})->where('path', '.*');

Route::post('/send/mailbolsa', [MailController::class, 'sendBolsa']);
Route::post('/send/mailEvento', [MailController::class, 'sendEvento']);

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->prefix('/admin')->group(function () {
	Route::get('/', [AdminController::class, 'iniciarSesionView'])->name('panel.access');
	Route::post('/login', [AdminController::class, 'login'])->name('panel.login');
	Route::get('/register', [AdminController::class, 'registrarAdmin'])->name('panel.register');
});

Route::middleware(['auth:admin', 'verified'])->prefix('/admin')->group(function () {
	Route::post('/logout', [AdminController::class, 'logout'])->name('panel.logout');
	Route::get('/dashboard', [AdminController::class, 'dashboardAdmin'])->name('panel.dashboard');

	//Roles
	Route::prefix('/roles')->group(function () {
		Route::get('/', [RoleController::class, 'index'])->name('panel.roles.index');
		Route::get('/nuevo', [RoleController::class, 'create'])->name('panel.roles.create');
		Route::get('/editar/{id}', [RoleController::class, 'edit'])->name('panel.roles.edit');
		Route::post('/store', [RoleController::class, 'store'])->name('panel.roles.store');
		Route::put('/update/{id}', [RoleController::class, 'update'])->name('panel.roles.update');
		Route::delete('/destroy/{id}', [RoleController::class, 'destroy'])->name('panel.roles.destroy');
	});

	Route::prefix('/perfil')->group(function () {
		Route::get('/', [AdminController::class, 'editProfile'])->name('panel.profile.edit');
		Route::patch('/update', [AdminController::class, 'updateProfile'])->name('panel.profile.update');
		Route::put('/update/password', [AdminController::class, 'updateProfilePassword'])->name('panel.profile.update.password');
		Route::delete('/destroy', [AdminController::class, 'destroyProfile'])->name('panel.profile.destroy');
	});

	Route::prefix('/usuarios')->group(function () {
		Route::get('/', [AdminController::class, 'index'])->name('panel.usuarios.index');
		Route::get('/create', [AdminController::class, 'create'])->name('panel.usuarios.create');
		Route::post('/store', [AdminController::class, 'store'])->name('panel.usuarios.store');
		Route::get('/edit/{id?}', [AdminController::class, 'editProfileId'])->name('panel.usuarios.edit');
		Route::patch('/update/{id?}', [AdminController::class, 'updateProfile'])->name('panel.usuarios.update');
		Route::put('/update/{id?}/password', [AdminController::class, 'updateProfilePassword'])->name('panel.usuarios.update.password');
		Route::delete('/destroy/{id?}', [AdminController::class, 'destroyProfile'])->name('panel.usuarios.destroy');
	});

	// Website
	Route::prefix('/website')->group(function () {
		Route::get('{seccion}/edit', [WebsiteController::class, 'edit'])->name('panel.website.edit');
		Route::put('{seccion}/update', [WebsiteController::class, 'update'])->name('panel.website.update');
	});

	// Sucursal
	Route::prefix('/sucursal')->group(function () {
		Route::get('/', [SucursalController::class, 'index'])->name('panel.sucursal.index');
		Route::get('/create', [SucursalController::class, 'create'])->name('panel.sucursal.create');
		Route::post('/store', [SucursalController::class, 'store'])->name('panel.sucursal.store');
		Route::get('/edit/{id}', [SucursalController::class, 'edit'])->name('panel.sucursal.edit');
		Route::patch('/update/{id?}', [SucursalController::class, 'update'])->name('panel.sucursal.update');
		// Route::put('/update/{id?}/password', [SucursalController::class, 'updateProfilePassword'])->name('panel.sucursal.update.password');
		Route::delete('/destroy/{id?}', [SucursalController::class, 'destroy'])->name('panel.sucursal.destroy');
	});

	Route::prefix('/galeria')->group(function () {
		Route::post('/store', [GalleryController::class, 'store'])->name('panel.galeria.store');
		Route::post('/destroy', [GalleryController::class, 'destroy'])->name('panel.galeria.destroy');
	});
});

require __DIR__ . '/auth.php';
