<?php

use App\Http\Livewire\Blog\BlogIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Skill\SkillIndex;
use App\Http\Livewire\Client\ClientIndex;
use App\Http\Livewire\Portfolio\PortfolioBlog;
use App\Http\Livewire\Education\EducationIndex;
use App\Http\Livewire\Portfolio\PortfolioAbout;
use App\Http\Livewire\Portfolio\PortfolioResume;
use App\Http\Livewire\Experience\ExperienceIndex;
use App\Http\Livewire\Portfolio\PortfolioContact;
use App\Http\Livewire\Portfolio\PortfolioWork;
use App\Http\Livewire\Work\WorkIndex;

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

// Route::get('/', function () { return view('welcome');})->name('portfolio');

Route::get('/about',PortfolioAbout::class)->name('about');
Route::get('/resume',PortfolioResume::class)->name('resume');
Route::get('/contact',PortfolioContact::class)->name('contact');
Route::get('/blog',PortfolioBlog::class)->name('blog');
Route::get('/work',PortfolioWork::class)->name('work');

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function ()  {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/skills',SkillIndex::class)->name('skills');
    Route::get('/clients',ClientIndex::class)->name('clients');
    Route::get('/educations',EducationIndex::class)->name('educations');
    Route::get('/experiences',ExperienceIndex::class)->name('experiences');
    Route::get('/blogs',BlogIndex::class)->name('blogs');
    Route::get('/works',WorkIndex::class)->name('works');
});
