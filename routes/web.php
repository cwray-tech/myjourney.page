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
Route::get('lang/{locale}', 'LocalizationController@index');

Auth::routes();


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/info', 'DashboardController@edit')->name('info');
Route::patch('/dashboard/info/update', 'DashboardController@update')->name('update-info');
Route::get('/dashboard/journeys', 'UserJourneyController@index')->name('user-journeys');

Route::get('/', 'StaticPageController@index');
Route::get('/about', 'StaticPageController@about');
Route::get('/privacy-policy', 'StaticPageController@privacy');
Route::get('/terms', 'StaticPageController@terms');

Route::resource('journeys', 'JourneyController');
Route::patch('/api/journeys/{journey}', 'Api\JourneyController@update');

Route::resource('journeys.steps', 'JourneyStepController')->shallow();
Route::patch('/api/steps/{step}/', 'Api\JourneyStepController@update');

Route::post('/newsletter', 'NewsletterController@store');
Route::delete('/newsletter', 'NewsletterController@destroy');

Route::get('/subscribe', 'SubscriptionController@create');
Route::post('/subscribe', 'SubscriptionController@store');
Route::delete('/subscribe', 'SubscriptionController@delete');
Route::get('/update-subscription', 'SubscriptionController@edit');

// Api Routes

Route::post('/api/publish/journeys/{journey}', 'Api\PublishJourneyController@store');
Route::delete('/api/publish/journeys/{journey}', 'Api\PublishJourneyController@destroy');

Route::post('/api/make-public/journeys/{journey}', 'Api\MakePublicJourneyController@store');
Route::delete('/api/make-public/journeys/{journey}', 'Api\MakePublicJourneyController@destroy');



