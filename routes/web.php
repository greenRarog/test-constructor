<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/create-new-test', [TestController::class, 'create']);
Route::match(['get', 'post'], '/create-new-test/{test_id}', [QuestionController::class, 'create']);
Route::match(['get', 'post'], '/question-delete/{question_id}', [QuestionController::class, 'delete']);
Route::match(['get', 'post'], '/change-pic/{question_id}', [QuestionController::class, 'changePic'])
        ->name('question.changePic');
Route::match(['get', 'post'], '/pic-delete/{question_id}', [QuestionController::class, 'deletePic']);
Route::match(['get', 'post'], '/create-new-test/{test_id}/{question_id}/{countAnswer}', [AnswerController::class, 'create']);
Route::match(['get', 'post'], '/answer-delete/{answer_id}', [AnswerController::class, 'delete']);
Route::match(['get', 'post'], '/show/all', [TestController::class, 'showAll']);
Route::match(['get', 'post'], '/show/{test_id}', [TestController::class, 'show']);
Route::match(['get', 'post'], '/delete/{test_id}', [TestController::class, 'delete']);
Route::match(['get', 'post'], '/change/{test_id}', [TestController::class, 'change']);
Route::match(['get', 'post'], '/user/{user_id}', [UserController::class, 'profile']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
