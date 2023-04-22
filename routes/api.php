<?php

use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\RelationsController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\UserController;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => '/v1'], function() {
    
    Route::apiResource('users', UserController::class);
    Route::apiResource('lessons', LessonController::class);
    Route::apiResource('tags', TagController::class);

    Route::get('users/{id}/lessons', [RelationsController::class, 'userLessons']);
    Route::get('lessons/{id}/tags',  [RelationsController::class, 'lessonTags']);
    Route::get('tags/{id}/lessons', [RelationsController::class, 'tagLessons']);

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    
    Route::any('lesson', function() {
        $msg = "Please make sure to update your code to the latest version of out API. You should use lessons instead of lesson.";
        return Response::json([
            'data' => $msg,
            'link' => url('documentation/api'),
            'code' => 404
        ]);
    });

    // Route::redirect('lesson', 'lessons');
    
});

Route::domain('{account}.myapp.com')->group(function() {
    Route::get('users/{id}', function($account, $id) {
        //
    });
});

Route::get('lessons/{lesson:slug}', function($lesson) {
    return $lesson;
});


Route::fallback(function() {});                     