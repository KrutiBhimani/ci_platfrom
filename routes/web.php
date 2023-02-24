
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
 
 
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AppController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\MissionController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\StoryController;
use App\Http\Controllers\admin\ThemeController;


// user side
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [RegistrationController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [RegistrationController::class, 'customRegistration'])->name('register.custom'); 
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('home', [HomeController::class, 'home']); 
Route::get('signout', [HomeController::class, 'signOut'])->name('signout');

// admin side
Route::get('admin/user',[UserController::class, 'user'])->name('user');
Route::get('admin/app',[AppController::class, 'app'])->name('app');
Route::get('admin/banner',[BannerController::class, 'banner'])->name('banner');
Route::get('admin/mission',[MissionController::class, 'mission'])->name('mission');
Route::get('admin/page',[PageController::class, 'page'])->name('page');
Route::get('admin/skill',[SkillController::class, 'skill'])->name('skill');
Route::get('admin/theme',[ThemeController::class, 'theme'])->name('theme');
Route::get('admin/story',[StoryController::class, 'story'])->name('story');
Route::get('admin/add_user',[UserController::class, 'add_user']);
Route::get('admin/add_banner',[BannerController::class, 'add_banner']);
Route::get('admin/add_mission',[MissionController::class, 'add_mission']);
Route::get('admin/add_page',[PageController::class, 'add_page']);
Route::get('admin/add_skill',[SkillController::class, 'add_skill']);
Route::get('admin/add_theme',[ThemeController::class, 'add_theme']);
Route::get('admin/edit_user/{user_id}',[UserController::class, 'edit_user']);
Route::get('admin/edit_banner',[BannerController::class, 'edit_banner']);
Route::get('admin/edit_mission',[MissionController::class, 'edit_mission']);
Route::get('admin/edit_page',[PageController::class, 'edit_page']);
Route::get('admin/edit_skill',[SkillController::class, 'edit_skill']);
Route::get('admin/edit_theme',[ThemeController::class, 'edit_theme']);
Route::post('add-user', [UserController::class, 'user_add'])->name('user.add'); 
Route::post('edit-user', [UserController::class, 'user_edit'])->name('user.edit');
Route::get('admin/delete_user/{user_id}',[UserController::class, 'delete_user']); 
Route::post('admin/user',[UserController::class, 'user'])->name('user');