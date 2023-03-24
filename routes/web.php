<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StoriesController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\VolunteeringController;
use App\Http\Controllers\ShareStoryController;
use App\Http\Controllers\StoryDetailController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AppController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\MissionController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\StoryController;
use App\Http\Controllers\admin\ThemeController;

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/', function () {
    return redirect('/login');
});

Route::resource('login', LoginController::class);
Route::resource('registration', RegistrationController::class);
Route::resource('forget-password', ForgotPasswordController::class);
Route::resource('reset-password', ResetPasswordController::class);
Route::resource('logout', LogoutController::class);
Route::resource('policy', PolicyController::class);

// user side
Route::middleware(['authenticate-user'])->group(function () {
    Route::resource('home', HomeController::class);
    Route::get('like/{mission_id}', [HomeController::class, 'like']);
    Route::get('unlike/{mission_id}', [HomeController::class, 'unlike']);
    Route::resource('volunteering_mission', VolunteeringController::class);
    Route::get('edit_rating/{rating}/{mission_id}', [VolunteeringController::class, 'edit_rating']);
    Route::get('add_rating/{rating}/{mission_id}', [VolunteeringController::class, 'add_rating']);
    Route::resource('share_story', ShareStoryController::class);
    Route::resource('stories', StoriesController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('story_detail', StoryDetailController::class);

    Route::resource('edit_user', EditUserController::class);
    Route::post('api/fetch-cities', [EditUserController::class, 'fetchCity']);
    Route::resource('timesheet', TimesheetController::class);
});

// admin side
Route::middleware(['authenticate-admin'])->group(function () {
    Route::resource('admin/user', UserController::class);
    Route::resource('admin/page', PageController::class);
    Route::resource('admin/skill', SkillController::class);
    Route::resource('admin/theme', ThemeController::class);
    Route::resource('admin/banner', BannerController::class);
    Route::resource('admin/mission', MissionController::class);
    Route::resource('admin/app', AppController::class);
    Route::resource('admin/story', StoryController::class);
    Route::get('admin/approve_app/{mission_application_id}', [AppController::class, 'approve_app']);
    Route::get('admin/decline_app/{mission_application_id}', [AppController::class, 'decline_app']);
    Route::get('admin/approve_story/{story_id}', [StoryController::class, 'approve_story']);
    Route::get('admin/decline_story/{story_id}', [StoryController::class, 'decline_story']);
});