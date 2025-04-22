<?php

use App\Livewire\CategoryCrud;
use App\Livewire\ProductosCrud;
use App\Livewire\ProviderCrud;
use App\Livewire\TestimonialCrud;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ProviderController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/testimonios/{testimonial}', [TestimonialController::class, 'show'])->name('testimonials.show');
Route::get('/testimonios', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/proveedores/{provider}', [ProviderController::class, 'show'])->name('providers.show');
/* index providers */
Route::get('/proveedores', [ProviderController::class, 'index'])->name('providers.index');

/* Route::get('/', function () {
    return view('welcome');
})->name('home'); */

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::prefix('admin')->group(function () {
        Route::get('/categorias', CategoryCrud::class)->name('categorias.index');
        /* productos */
        Route::get('/productos',ProductosCrud::class)->name('productos.index');
        /* proveedores */
        Route::get('/proveedores', ProviderCrud::class)->name('proveedores.index');
        /* testimonios */
        Route::get('/testimonios', TestimonialCrud::class)->name('testimonios.index');
        /* contacto */
        Route::get('/contacto', \App\Livewire\ContactForm::class)->name('contacto.index');
        /* horarios */
        Route::get('/horarios', \App\Livewire\ScheduleManager::class)->name('horarios.index');
        /* galeria */
        Route::get('/galeria', \App\Livewire\GalleryManager::class)->name('galeria.index');
    });

});

require __DIR__ . '/auth.php';
