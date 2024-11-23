<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    AboutController,
    FAQController,
    ContactController,
    LocationController,
    AdminController,
    CitasController
};
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

// Rutas públicas
Route::get('/api/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/faqs', [FAQController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/location', [LocationController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Auth::routes();

// Rutas administrativas
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('contacts', ContactController::class);

    Route::resource('products', ProductController::class);
    Route::resource('citas', CitasController::class)->names([
        'index' => 'citas.index',
        'create' => 'citas.create',
        'store' => 'citas.store',
        'edit' => 'citas.edit',
        'update' => 'citas.update',
        'destroy' => 'citas.destroy',
    ]);
});
