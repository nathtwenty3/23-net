<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\SiteSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('index');
})->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('role-index',[RoleController::class,'index'])->name('role.index');
Route::get('role-create',[RoleController::class,'create'])->name('role.create');
Route::post('role-store',[RoleController::class,'store'])->name('role.store');
Route::get('role-edit/{id}',[RoleController::class,'edit'])->name('role.edit');
Route::put('role-update/{id}',[RoleController::class,'update'])->name('role.update');
Route::get('role-delete/{id}',[RoleController::class,'destroy'])->name('role.delete');

Route::get('banner-index',[BannerController::class,'index'])->name('banner.index');
Route::get('banner-create',[BannerController::class,'create'])->name('banner.create');
Route::post('banner-store',[BannerController::class,'store'])->name('banner.store');
Route::get('banner-edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
Route::put('banner-update/{id}',[BannerController::class,'update'])->name('banner.update');
Route::get('banner-delete/{id}',[BannerController::class,'destroy'])->name('banner.delete');

Route::get('site_setting-index',[SiteSettingController::class,'index'])->name('site_setting.index');
Route::get('site_setting-create',[SiteSettingController::class,'create'])->name('site_setting.create');
Route::post('site_setting-store',[SiteSettingController::class,'store'])->name('site_setting.store');
Route::get('site_setting-edit/{id}',[SiteSettingController::class,'edit'])->name('site_setting.edit');
Route::put('site_setting-update/{id}',[SiteSettingController::class,'update'])->name('site_setting.update');
Route::get('site_setting-delete/{id}',[SiteSettingController::class,'destroy'])->name('site_setting.delete');

