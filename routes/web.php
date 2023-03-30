<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Livewire\CreateAnnouncement;
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
//route libere

Route::get('/', [FrontController::class, 'welcome'])->name('welcome');

Route::get('/categoria/{category}',[FrontController::class, 'categoryShow'])->name('categoryShow');

Route::get('/dettaglio/annuncio/{announcement}',[AnnouncementController::class,'showAnnouncement'])->name('announcements.show');

Route::get('/tutti/annunci/',[AnnouncementController::class,'indexAnnouncement'])->name('announcements.index');



//route protette da login
Route::middleware('auth')->group(function()
{
Route::get('/new/Announcement',[AnnouncementController::class, 'createAnnouncement'])->name('announcements.create');




});

