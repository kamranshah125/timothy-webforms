<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Livewire\Forms\IntakeWizard;
use Illuminate\Support\Facades\Artisan;

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



Route::get('/sys_optimize', function () {

    // Clear caches
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    // Re-optimize 
    Artisan::call('optimize');

    return "<h2 style='padding:20px; background:#e7fff3; color:#00884a;'>✔ System optimized successfully!</h2>";
});

Route::get('/', function () {
    return redirect('/admin/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// =================

Route::get('/form/{formType}/{token?}', IntakeWizard::class)
    ->name('form.start');

Route::get('/form-submission/thank-you/{token}',[FormController::class, 'thankyouPage'] )->name('form.complete.thankyou');

    
// Route::middleware('auth')->get('/form/{formType}', IntakeWizard::class)->name('form.start');


// Route::middleware('auth')->get('/form/{formType}', IntakeWizard::class)->name('form.start.auth');

// ==========================


// Step-wise form navigation
// Route::get('/form/adult-intake}', [FormController::class, 'showExmaple'])->name('form.example');
// Route::get('/form/step/{step}', [FormController::class, 'showStep'])
//     ->where('step', '[1-7]')
//     ->name('form.step');

// Route::post('/form/step/{step}', [FormController::class, 'saveStep'])
//     ->where('step', '[1-7]')
//     ->name('form.step.save');

// Complete form (last step submit)
// Route::post('/form/complete', [FormController::class, 'complete'])
//     ->name('form.complete');

// Resume form via token link (from email)
// Route::get('/form/resume/{token}', [FormController::class, 'resume'])
//     ->name('form.resume');

// View/Download completed PDF
// Route::get('/form/pdf/{id}', [FormController::class, 'downloadPdf'])
//     ->name('form.pdf.download');
