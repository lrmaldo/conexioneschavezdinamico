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

Route::get('/', function () {
    return view('welcome');
})->name('home');

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
    });

});

require __DIR__ . '/auth.php';
