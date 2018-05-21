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
Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
	],
	function()
	{
		$lang_prefix = LaravelLocalization::getCurrentLocale();
		$lang = App\Language::where('lang_name', $lang_prefix)->first();
		View::share('roomCategories', App\RoomCategories::where('language_id', $lang['id'])->get());
		View::share('rooms', App\Rooms::where('language_id', $lang['id'])->inRandomOrder()->get());
		View::share('features', App\Features::where('language_id', $lang['id'])->inRandomOrder()->get());
		View::share('slider', App\Slider::where('language_id', $lang['id'])->get());
		View::share('сommonData', App\CommonData::where('language_id', $lang['id'])->get());
		View::share('foodCategories', App\FoodCategories::where('language_id', $lang['id'])->get());
		/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

		Route::get('/', [
			'lang_id' => $lang['id'],
			'uses' => 'OnePageController@getDataHome'
		]);

		Route::get('/contacts', [
			'lang_id' => $lang['id'],
			'uses' => 'OnePageController@getDataContact'
		]);
		Route::get('/thank-you', 'OnePageController@thankYou');
		Route::get('/search', [
			'lang_id' => $lang['id'],
			'uses' => 'NewsController@search'
		]);
		Route::get('/about', [
			'lang_id' => $lang['id'],
			'uses' => 'OnePageController@getDataAbout'
		]);
		Route::get('/guestbook', [
			'lang_id' => $lang['id'],
			'uses' => 'GuestBookController@getDataGuestBook'
		]);
		Route::get('/restoran/{name?}', [
			'lang_id' => $lang['id'],
			'uses' => 'RestoranController@getData'
		]);
		Route::get('/rooms/{name?}', [
			'lang_id' => $lang['id'],
			'uses' => 'RoomsController@getData'
		]);
		Route::get('/category/{name?}', [
			'lang_id' => $lang['id'],
			'uses' => 'RoomsController@getCategoryData'
		]);
	});
	/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

	Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
		Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
		Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');
	});

	Route::post('/contacts/store', 'OnePageController@contactsStore');
	Route::post('/guestbook/store', 'OnePageController@commentsStore');

	Route::get('a3login', [
		'as' => 'a3login',
		'uses' => 'Auth\LoginController@showLoginForm'
	]);
