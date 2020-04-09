<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a groups which
| contains the "web" middleware groups. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
// Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('profile', 'HomeController@showProfile')->name('profile');
    Route::get('profile/edit', 'HomeController@editProfile')->name('profile.edit');
    Route::put('profile', 'HomeController@updateProfile')->name('profile.update');
    Route::delete('profile', 'HomeController@deleteProfile')->name('profile.destroy');

    Route::get('leaderboard', 'LeaderboardController')->name('leaderboard');
});

Route::middleware(['auth', 'is_teacher'])->name('teacher.')->prefix('teacher')->group(function () {
    Route::get('/', 'TeacherController@teacherDashboard')->name('dashboard');
    Route::resources([
        'groups' => 'GroupController',
        'users' => 'UserController',
        'questions' => 'QuestionController',
        'exams' => 'ExamController',
        'notifications' => 'NotificationController',
        'topics' => 'TopicController',
        'type_exams' => 'TypeExamController',

        'groups.users' => 'GroupUserController',
        'groups.notifications' => 'GroupNotificationController',
        'groups.exams' => 'GroupExamController',
        'exams.questions' => 'ExamQuestionController',
        'topics.questions' => 'TopicQuestionController',
    ]);

    Route::get('groups/{group_id}/users/mass_create', 'GroupUserController@showCreateMassUser')->where('group_id', '[0-9]+')->name('mass_create_user');
    Route::post('groups/{group_id}/users/mass_create', 'GroupUserController@createMassUser')->where('group_id', '[0-9]+');

    // url search
});

Route::middleware(['auth', 'is_student'])->name('student.')->prefix('student')->group(function () {
    Route::get('', 'StudentController@studentDashboard')->name('dashboard');
    Route::get('notifications', 'StudentController@showNotifications')->name('notifications');
    Route::get('notifications/{id}', 'StudentController@showNotification')->where('id', '[0-9]+')->name('notification');
    Route::get('exams', 'StudentController@showExams')->name('exams');
    Route::get('exams/{id}', 'StudentController@showExam')->where('id', '[0-9]+')->name('exams');
    Route::post('exams/{id}', 'StudentController@submitAfterDoExam')->where('id', '[0-9]+')->name('exams');

    // url search
});
