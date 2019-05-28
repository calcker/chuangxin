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

Route::get('/', 'HomeController@index');

//Auth::routes();



/*
Route::get('/login', 'IndexController@login')->name('login');

Route::get('/register', 'IndexController@register')->name('register');
*/
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/help', 'HomeController@help')->name('help');


Route::get('/login', 'LoginController@showPage');

Route::group(['prefix' => 'register'], function(){
	Route::get('/person', 'Auth\PersonEmailRegisterController@showRegistrationForm');
	Route::post('/person', 'Auth\PersonEmailRegisterController@register');
	Route::get('/company', 'Auth\CompanyRegisterController@showRegistrationForm');
	Route::get('/org', 'Auth\OrgRegisterController@register');
    Route::get('/verify/{token}', 'Auth\EmailVerificationController@verify')->name('verify');
});



/*
Route::group(['prefix' => 'user'], function(){
    // 使用者驗證
    Route::group(['prefix' => 'auth'], function(){
        Route::get('/sign-up', 'UserAuthController@signUpPage')->name('sign-up');
        Route::post('/sign-up', 'UserAuthController@signUpProcess');
        Route::get('/sign-in', 'UserAuthController@signInPage')->name('sign-in');
        Route::post('/sign-in', 'UserAuthController@signInProcess');
        Route::get('/sign-out', 'UserAuthController@signOut');
        // Facebook 登入
        Route::get('/facebook-sign-in', 'UserAuthController@facebookSignInProcess');
        // Facebook 登入重新導向授權資料處理
        Route::get('/facebook-sign-in-callback', 'UserAuthController@facebookSignInCallbackProcess');
        // Github 登入
        Route::get('/github-sign-in', 'UserAuthController@githubSignInProcess');
        // Github 登入重新導向授權資料處理
        Route::get('/github-sign-in-callback', 'UserAuthController@githubSignInCallbackProcess');
    });
});
*/
