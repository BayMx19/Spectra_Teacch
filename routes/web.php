<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\SubLessonsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
use App\Models\LessonsModel;
use App\Models\ModulesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [WelcomeController::class, 'index'])->name('landing.index');
Route::get('/modules/{id}', [WelcomeController::class, 'show'])->name('modules.show');
Route::get('/modules/{id}/download', function ($id) {
    $module = ModulesModel::findOrFail($id);

    if (!$module->pdf_path || !Storage::disk('public')->exists($module->pdf_path)) {
        abort(404, 'Modul tidak ditemukan atau belum tersedia.');
    }

    return Storage::disk('public')->download($module->pdf_path);
});
Route::get('/lessons/{id}', function($id) {
    $lesson = LessonsModel::with(['subLessons' => function ($query) {
        $query->orderBy('order');
    }])->findOrFail($id);

    return response()->json([
        'title' => $lesson->title,
        'description' => $lesson->description,
        'sub_lessons' => $lesson->subLessons->map(function($sub){
            return [
                'id' => $sub->id,
                'title' => $sub->title,
                'description' => $sub->description,
                'order' => $sub->order,
                'table_data' => $sub->table_data,
                'image_path' => $sub->image_path
                    ? asset('storage/' . $sub->image_path)
                    : null,
            ];
        }),
    ]);
});
    Auth::routes();

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('home');

    Route::get('/admin/master_users/', [UsersController::class, 'index'])->name('master_users.index');
    Route::get('/admin/master_users/create', [UsersController::class, 'create'])->name('master_users.create');
    Route::post('/admin/master_users/store', [UsersController::class, 'store'])->name('master_users.store');
    Route::get('/admin/master_users/{id}/detail', [UsersController::class, 'detail'])->name('master_users.detail');
    Route::get('/admin/master_users/{id}/edit', [UsersController::class, 'edit'])->name('master_users.edit');
    Route::put('/admin/master_users/{id}', [UsersController::class, 'update'])->name('master_users.update');
    Route::delete('/admin/master_users/{id}', [UsersController::class, 'destroy'])->name('master_users.destroy');

    Route::get('/admin/master_modules/', [ModulesController::class, 'index'])->name('master_modules.index');
    Route::get('/admin/master_modules/create', [ModulesController::class, 'create'])->name('master_modules.create');
    Route::post('/admin/master_modules/store', [ModulesController::class, 'store'])->name('master_modules.store');
    Route::get('/admin/master_modules/{id}/detail', [ModulesController::class, 'detail'])->name('master_modules.detail');
    Route::get('/admin/master_modules/{id}/edit', [ModulesController::class, 'edit'])->name('master_modules.edit');
    Route::put('/admin/master_modules/{id}', [ModulesController::class, 'update'])->name('master_modules.update');
    Route::delete('/admin/master_modules/{id}', [ModulesController::class, 'destroy'])->name('master_modules.destroy');

    Route::get('/admin/master_lessons/', [LessonsController::class, 'index'])->name('master_lessons.index');
    Route::get('/admin/master_lessons/create', [LessonsController::class, 'create'])->name('master_lessons.create');
    Route::post('/admin/master_lessons/store', [LessonsController::class, 'store'])->name('master_lessons.store');
    Route::get('/admin/master_lessons/{id}/detail', [LessonsController::class, 'detail'])->name('master_lessons.detail');
    Route::get('/admin/master_lessons/{id}/edit', [LessonsController::class, 'edit'])->name('master_lessons.edit');
    Route::put('/admin/master_lessons/{id}', [LessonsController::class, 'update'])->name('master_lessons.update');
    Route::delete('/admin/master_lessons/{id}', [LessonsController::class, 'destroy'])->name('master_lessons.destroy');

    Route::get('/admin/master_sub_lessons/', [SubLessonsController::class, 'index'])->name('master_sub_lessons.index');
    Route::get('/admin/master_sub_lessons/create', [SubLessonsController::class, 'create'])->name('master_sub_lessons.create');
    Route::post('/admin/master_sub_lessons/store', [SubLessonsController::class, 'store'])->name('master_sub_lessons.store');
    Route::get('/admin/master_sub_lessons/{id}/detail', [SubLessonsController::class, 'detail'])->name('master_sub_lessons.detail');
    Route::get('/admin/master_sub_lessons/{id}/edit', [SubLessonsController::class, 'edit'])->name('master_sub_lessons.edit');
    Route::put('/admin/master_sub_lessons/{id}', [SubLessonsController::class, 'update'])->name('master_sub_lessons.update');
    Route::delete('/admin/master_sub_lessons/{id}', [SubLessonsController::class, 'destroy'])->name('master_sub_lessons.destroy');


    Route::get('/admin/profile/', [UsersController::class, 'profileindex'])->name('profile.index');

    Route::post('/upload-summernote-image', [UploadController::class, 'uploadImage'])->name('upload.summernote.image');
