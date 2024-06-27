<?php

use App\Http\Controllers\LearningActivityController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::resource('learning-activity', LearningActivityController::class);
// Route::put('/learning-activity/{activity}/restore', [LearningActivityController::class, 'restore'])->name('learning-activity.restore');
// Route::get('/learning-activity/softdelete', [LearningActivityController::class, 'indexSoftDeleted'])->name('learning-activity.softdelete');
