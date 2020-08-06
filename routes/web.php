<?php

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


Auth::routes();

Route::domain('{page}.ajourney.page')->group(function () {
    Route::get('/', 'PageController@index');
});


Route::get('/dashboard', 'DashboardController@index')->name('home');
Route::get('/dashboard/info', 'DashboardController@edit');
Route::patch('/dashboard/info/update', 'DashboardController@update');
Route::get('/dashboard/journeys', 'UserJourneyController@index');

Route::get('/', 'StaticPageController@index');
Route::get('/about', 'StaticPageController@about');
Route::get('/privacy-policy', 'StaticPageController@privacy');
Route::get('/terms', 'StaticPageController@terms');

Route::resource('journeys', 'JourneyController');

Route::resource('journeys.steps', 'JourneyStepController')->shallow();

Route::post('/newsletter', 'NewsletterController@store');
Route::delete('/newsletter', 'NewsletterController@destroy');

Route::post('/api/publish/journeys/{journey}', 'Api\PublishJourneyController@store');
Route::delete('/api/publish/journeys/{journey}', 'Api\PublishJourneyController@destroy');

Route::post('/api/make-public/journeys/{journey}', 'Api\MakePublicJourneyController@store');
Route::delete('/api/make-public/journeys/{journey}', 'Api\MakePublicJourneyController@destroy');

Route::get('/subscribe', 'SubscriptionController@create');
Route::post('/subscribe', 'SubscriptionController@store');
Route::delete('/subscribe', 'SubscriptionController@delete');
Route::get('/update-subscription', 'SubscriptionController@edit');
