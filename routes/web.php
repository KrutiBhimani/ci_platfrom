
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LogoutController;
 
 
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
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');



// admin side
Route::get('admin/user',[UserController::class, 'user'])->name('user');
Route::get('admin/add_user',[UserController::class, 'add_user']);
Route::get('admin/edit_user/{user_id}',[UserController::class, 'edit_user']);
Route::post('add-user', [UserController::class, 'user_add'])->name('user.add'); 
Route::post('edit-user', [UserController::class, 'user_edit'])->name('user.edit');
Route::post('admin/user',[UserController::class, 'user']);
Route::get('admin/delete_user/{user_id}',[UserController::class, 'delete_user']); 

Route::get('admin/page',[PageController::class, 'page'])->name('page');
Route::get('admin/add_page',[PageController::class, 'add_page']);
Route::get('admin/edit_page/{cms_page_id}',[PageController::class, 'edit_page']);
Route::post('admin/page',[PageController::class, 'page']);
Route::post('add-page', [PageController::class, 'page_add'])->name('page.add'); 
Route::post('edit-page', [PageController::class, 'page_edit'])->name('page.edit');
Route::get('admin/delete_page/{cms_page_id}',[PageController::class, 'delete_page']); 

Route::get('admin/skill',[SkillController::class, 'skill'])->name('skill');
Route::get('admin/add_skill',[SkillController::class, 'add_skill']); 
Route::get('admin/edit_skill/{skill_id}',[SkillController::class, 'edit_skill']);
Route::post('admin/skill',[SkillController::class, 'skill']);
Route::post('add-skill', [SkillController::class, 'skill_add'])->name('skill.add');
Route::post('edit-skill', [SkillController::class, 'skill_edit'])->name('skill.edit');
Route::get('admin/delete_skill/{skill_id}',[SkillController::class, 'delete_skill']); 

Route::get('admin/theme',[ThemeController::class, 'theme'])->name('theme');
Route::get('admin/add_theme',[ThemeController::class, 'add_theme']);
Route::get('admin/edit_theme/{mission_theme_id}',[ThemeController::class, 'edit_theme']);
Route::post('admin/theme',[ThemeController::class, 'theme']);
Route::post('add-theme', [ThemeController::class, 'theme_add'])->name('theme.add'); 
Route::post('edit-theme', [ThemeController::class, 'theme_edit'])->name('theme.edit');
Route::get('admin/delete_theme/{mission_theme_id}',[ThemeController::class, 'delete_theme']); 

Route::get('admin/banner',[BannerController::class, 'banner'])->name('banner');
Route::get('admin/add_banner',[BannerController::class, 'add_banner']);
Route::get('admin/edit_banner/{banner_id}',[BannerController::class, 'edit_banner']);
Route::post('admin/banner',[BannerController::class, 'banner']);
Route::post('add-banner', [BannerController::class, 'banner_add'])->name('banner.add'); 
Route::post('edit-banner', [BannerController::class, 'banner_edit'])->name('banner.edit');
Route::get('admin/delete_banner/{banner_id}',[BannerController::class, 'delete_banner']); 

Route::get('admin/mission',[MissionController::class, 'mission'])->name('mission');
Route::get('admin/add_mission',[MissionController::class, 'add_mission']);
Route::get('admin/edit_mission',[MissionController::class, 'edit_mission']);
Route::post('admin/mission',[MissionController::class, 'mission']);

Route::get('admin/app',[AppController::class, 'app'])->name('app');
Route::post('admin/app',[AppController::class, 'app'])->name('app');

Route::get('admin/story',[StoryController::class, 'story'])->name('story');
Route::post('admin/story',[StoryController::class, 'story'])->name('story');