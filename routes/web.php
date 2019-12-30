<?php

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





Route::group(['prefix' => 'crm', 'middleware' => 'admin'], function()
{
	Route::get('/sample', function () {
		return view('backend.sample');
	});

	
	Route::group(['middleware' => 'superadmin'], function()
	{
		Route::resource('user', 'UserController');
		Route::get('changeStatus', 'UserController@changeStatus');
	});
	Route::get('/', 'DashboardController@index');
	Route::get('task/createcompanytask/{id}', 'TaskController@createcompanytask');
	Route::get('contact/createcompanycontact/{id}', 'ContactController@createcompanycontact');
	Route::get('document/createcompanydocument/{id}', 'DocumentController@createcompanydocument');
	Route::get('offer/createcompanyoffer/{id}', 'OfferController@createcompanyoffer');
	Route::post('updatecompanyemployee/{id}', 'CompanyController@updatecompanyemployee')->name('company.updatecompanyemployee');
	Route::post('updatecompanyservice/{id}', 'CompanyController@updatecompanyservice')->name('company.updatecompanyservice');
	Route::resource('employee', 'EmployeeController');
	Route::resource('currency', 'CurrencyController');
	Route::resource('contact', 'ContactController');
	Route::resource('document', 'DocumentController');
	Route::resource('task', 'TaskController');
	Route::resource('event', 'EventController');
	Route::resource('service', 'ServiceController');
	Route::resource('company', 'CompanyController');
	Route::resource('offer', 'OfferController');
	Route::resource('payment', 'PaymentController');
	Route::resource('expense', 'ExpenseController');
	Route::get('setting', 'SettingController@edit')->name('crm.setting');
	Route::post('setting', 'SettingController@update')->name('backend.setting');
	Route::get('profile', 'UserController@editown')->name('crm.profile');
	Route::post('profile', 'UserController@updateown')->name('backend.profile');
});


Auth::routes();
Route::get('/lang/{locale?}', 'LanguageController@index');
Route::get('/', function () {
	return view('frontend.home');
});

