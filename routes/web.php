<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Livewire\Admin\AddCategoryComponet;
use App\Http\Livewire\Admin\AddLogosComponet;
use App\Http\Livewire\Admin\AddPagesComponent;
use App\Http\Livewire\Admin\AddPropertyPlansComponet;
use App\Http\Livewire\Admin\AddSettingsComponet;
use App\Http\Livewire\Admin\AddSliderComponet;
use App\Http\Livewire\Admin\AdminAddProjectsComponent;
use App\Http\Livewire\Admin\AdminEditProjectsComponent;
use App\Http\Livewire\Admin\AdminProjectsComponent;
use App\Http\Livewire\Admin\CategoryComponet;
use App\Http\Livewire\Admin\EditCategoryComponet;
use App\Http\Livewire\Admin\EditLogosComponet;
use App\Http\Livewire\Admin\EditPagesComponent;
use App\Http\Livewire\Admin\EditPropertyPlansComponet;
use App\Http\Livewire\Admin\EditSettingsComponet;
use App\Http\Livewire\Admin\EditSliderComponet;
use App\Http\Livewire\Admin\LogosComponet;
use App\Http\Livewire\Admin\PagesComponent;
use App\Http\Livewire\Admin\PropertyPlansComponet;
use App\Http\Livewire\Admin\SettingsComponet;
use App\Http\Livewire\Admin\SliderComponet;
use App\Http\Livewire\User\AboutUsComponent;
use App\Http\Livewire\User\ContactUsComponent;
use App\Http\Livewire\User\HomeComponent;
use App\Http\Livewire\User\NowSellingComponent;
use App\Http\Livewire\User\OurProjectsComponent;
use App\Http\Livewire\User\SingleProjectComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeComponent::class);
Route::get('/about-us', AboutUsComponent::class);
Route::get('/now-selling', NowSellingComponent::class);
Route::get('/our-projects', OurProjectsComponent::class);
Route::get('/projects-detail/{slug}', SingleProjectComponent::class)->name('projects.detail');
Route::get('/contact-us', ContactUsComponent::class);

Route::get('newsletter', [NewsletterController::class, 'create']);
Route::post('newsletter', [NewsletterController::class, 'store']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin/category', CategoryComponet::class)->name('category');
    Route::get('/admin/category/add', AddCategoryComponet::class)->name('category.add');
    Route::get('/admin/category/edit{slug}', EditCategoryComponet::class)->name('category.edit');

    Route::get('/admin/projects', AdminProjectsComponent::class)->name('projects');
    Route::get('/admin/project/add', AdminAddProjectsComponent::class)->name('project.add');
    Route::get('/admin/projects/edit/{slug}', AdminEditProjectsComponent::class)->name('project.edit');

    Route::get('/admin/logos', LogosComponet::class)->name('logos');
    Route::get('/admin/logo/add', AddLogosComponet::class)->name('logo.add');
    Route::get('/admin/logo/edit/{slug}', EditLogosComponet::class)->name('logo.edit');

    Route::get('/admin/pages', PagesComponent::class)->name('pages');
    Route::get('/admin/page/add', AddPagesComponent::class)->name('page.add');
    Route::get('/admin/page/edit/{slug}', EditPagesComponent::class)->name('page.edit');

    Route::get('/admin/properties', PropertyPlansComponet::class)->name('property');
    Route::get('/admin/property/add', AddPropertyPlansComponet::class)->name('property.add');
    Route::get('/admin/property/edit/{slug}', EditPropertyPlansComponet::class)->name('property.edit');

    Route::get('/admin/settings', SettingsComponet::class)->name('settings');
    Route::get('/admin/setting/add', AddSettingsComponet::class)->name('setting.add');
    Route::get('/admin/setting/edit/{slug}', EditSettingsComponet::class)->name('setting.edit');

    Route::get('/admin/sliders', SliderComponet::class)->name('sliders');
    Route::get('/admin/slider/add', AddSliderComponet::class)->name('slider.add');
    Route::get('/admin/slider/edit/{slug}', EditSliderComponet::class)->name('slider.edit');
});
