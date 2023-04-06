<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\VideoController;
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

Route::get('/Autore/{user}',[FrontController::class, 'userShow'])->name('userShow');


//route protette da login
Route::middleware('auth')->group(function()
{
Route::get('/new/Announcement',[AnnouncementController::class, 'createAnnouncement'])->name('announcements.create');

//* diventa revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');

//* Abilita revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

});

//* Rout revisore

Route::middleware('isRevisor')->group(function()
{
//* home revisore
Route::get('/revisor/home',[RevisorController::class, 'index'])->name('revisor.index');

//* sccetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');

//* rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
});




//Route::get('/video',[VideoController::class,'create'] )->name('videos');
