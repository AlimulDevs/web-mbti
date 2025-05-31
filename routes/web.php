<?php

use App\Http\Controllers\AuthWebController;
use App\Http\Controllers\CriteriaWebController;
use App\Http\Controllers\DashboardWebController;
use App\Http\Controllers\MajorWebController;
use App\Http\Controllers\QuestionWebController;
use App\Http\Controllers\SchoolCriteriaWebController;
use App\Http\Controllers\SchoolWebController;
use App\Http\Controllers\ViewMiddlewareAdminWebController;
use App\Http\Controllers\ViewMiddlewWareWebController;
use App\Http\Controllers\ViewWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewWebController::class, 'homeIndex']);


Route::post('/register', [AuthWebController::class, 'register'])->name('register');
Route::post('/login', [AuthWebController::class, 'login'])->name('login');
Route::delete('/logout', [AuthWebController::class, 'logout'])->name('logout');
Route::get('/register/index', [ViewWebController::class, 'registerIndex'])->name('register.index');
Route::get('/login/index', [ViewWebController::class, 'loginIndex'])->name('login.index');


Route::get('/home/index', [ViewMiddlewWareWebController::class, 'homeIndex'])->name('home.index');
Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('/criteria/index', [ViewMiddlewareAdminWebController::class, 'criteriaIndex'])->name('criteria.index');
        Route::get('/student/index', [ViewMiddlewareAdminWebController::class, 'studentIndex'])->name('student.index');
        Route::get('/school/index', [ViewMiddlewareAdminWebController::class, 'schoolIndex'])->name('school.index');
        Route::get('/major/index', [ViewMiddlewareAdminWebController::class, 'majorIndex'])->name('major.index');
        Route::get('/dashboard/index', [ViewMiddlewareAdminWebController::class, 'dashboardIndex'])->name('dashboard.index');
        Route::get('/question/index', [ViewMiddlewareAdminWebController::class, 'questionIndex'])->name('dashboard.index');
        Route::get('/profile-matching/index', [ViewMiddlewareAdminWebController::class, 'profileMatchingIndex'])->name('profile-matching.index');
        Route::get('/test-result/index', [ViewMiddlewareAdminWebController::class, 'testResultIndex'])->name('test-result.index');
        Route::get('/test-result/detail/index/{id}', [ViewMiddlewareAdminWebController::class, 'testResultDetailIndex'])->name('test-result.detail.index');



        Route::prefix('criteria')->group(function () {
            Route::name('criteria.')->group(function () {
                Route::post('/create', [CriteriaWebController::class, 'create'])->name('criteria.create');
                Route::post('/update', [CriteriaWebController::class, 'update'])->name('criteria.update');
                Route::delete('/delete/{id}', [CriteriaWebController::class, 'delete'])->name('criteria.delete');
            });
        });
        Route::prefix('school')->group(function () {
            Route::name('school.')->group(function () {
                Route::post('/create', [SchoolWebController::class, 'create'])->name('school.create');
                Route::post('/update', [SchoolWebController::class, 'update'])->name('school.update');
                Route::delete('/delete/{id}', [SchoolWebController::class, 'delete'])->name('school.delete');
            });
        });
        Route::prefix('major')->group(function () {
            Route::name('major.')->group(function () {
                Route::post('/create', [MajorWebController::class, 'create'])->name('major.create');
                Route::post('/update', [MajorWebController::class, 'update'])->name('major.update');
                Route::delete('/delete/{id}', [MajorWebController::class, 'delete'])->name('major.delete');
            });
        });
        Route::prefix('question')->group(function () {
            Route::name('question.')->group(function () {
                Route::post('/create', [QuestionWebController::class, 'create'])->name('question.create');
                Route::post('/update', [QuestionWebController::class, 'update'])->name('question.update');
                Route::delete('/delete/{id}', [QuestionWebController::class, 'delete'])->name('question.delete');
            });
        });

        Route::prefix('school-criteria')->group(function () {
            Route::name('school-criteria.')->group(function () {

                Route::post('/update', [SchoolCriteriaWebController::class, 'update'])->name('update');

            });
        });
    });
});


Route::get('/question/save', [ViewMiddlewWareWebController::class, 'questionSave'])->name('question.save.index');

Route::get('/test-mbti/index', [ViewMiddlewWareWebController::class, 'testMbtiIndex'])->name('test-mbti.index');
Route::get('/test-result/index', [ViewMiddlewWareWebController::class, 'testResultIndex'])->name('test-result.index');

