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

Route::get('/', 'IndexController@index');

Route::get('/router', function(){
    return view('layouts.vue-router');
});

Route::post('/register/email', 'Auth\EmailRegisterController@register');

Route::get('/register/email/verify/{token}', 'Auth\EmailVerificationController@verify');

Route::post('/login', 'Auth\EmailLoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'feeds'], function(){
    Route::post('update', 'Feed\FeedsController@update');
    Route::post('backward', 'Feed\FeedsController@backward');
    Route::post('my', 'Feed\FeedsController@my');
    Route::post('someone/{id}', 'Feed\FeedsController@someone');
});

Route::group(['prefix' => 'person'], function(){
    Route::post('counts', 'PersonController@counts');
    Route::post('info', 'PersonController@info');
    Route::post('name', 'PersonController@name');
    Route::post('gender', 'PersonController@gender');
    Route::post('profession', 'PersonController@profession');
    Route::post('birthday', 'PersonController@birthday');
    Route::post('district', 'PersonController@district');
    Route::post('brief', 'PersonController@brief');

    //Route::post('someone/{id}', 'Content\CountsController@someone');
});

Route::group(['prefix' => 'works'], function(){
    Route::post('new', 'Works\WorksController@new');
    Route::post('albums', 'Works\AlbumsController@my');
    //Route::post('someone/{id}', 'Content\CountsController@someone');
});

Route::group(['prefix' => 'albums'], function(){
    Route::post('my', 'Works\AlbumsController@my');
    //Route::post('someone/{id}', 'Content\CountsController@someone');
});

Route::group(['prefix' => 'upload'], function(){
    Route::post('avatar', 'UploadController@avatar');
    //Route::post('someone/{id}', 'Content\CountsController@someone');
});





/*
Route::group(['prefix' => 'counts'], function(){
    Route::post('my', 'Content\CountsController@my');
    Route::post('someone/{id}', 'Content\CountsController@someone');
});
*/

/*
Route::group(['prefix' => 'login'], function(){
    Route::post('/email', 'Auth\EmailLoginController@login');
});
*/


/*
Route::group(['prefix' => 'register'], function(){
    //Route::get('/person', 'Auth\PersonEmailRegisterController@showRegistrationForm');
    Route::post('/person', 'Auth\PersonEmailRegisterController@register');
    //Route::get('/company', 'Auth\CompanyRegisterController@showRegistrationForm');
    //Route::get('/org', 'Auth\OrgRegisterController@register');
    //Route::get('/pending', 'Auth\PersonEmailRegisterController@pending');
    //Route::get('/verify/{token}', 'Auth\EmailVerificationController@verify')->name('verify');
});
*/

//Auth::routes();



/*
Route::get('/login', 'IndexController@login')->name('login');

Route::get('/register', 'IndexController@register')->name('register');
*/
/*
Route::get(['prefix' => 'user'], function(){
    Route::get('/register', 'Auth\PersonEmailRegisterController@showRegistrationForm');
});
*/
/*
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/help', 'HomeController@help')->name('help');

Route::get('/works', 'WorksController@index')->name('works');


Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'login'], function(){
    Route::post('/email', 'Auth\EmailLoginController@login');
    Route::post('/mobile', 'Auth\MobileLoginController@login');
});

*/
/*
Route::group(['prefix' => 'register'], function(){
	Route::get('/person', 'Auth\PersonEmailRegisterController@showRegistrationForm');
	Route::post('/person', 'Auth\PersonEmailRegisterController@register');
	Route::get('/company', 'Auth\CompanyRegisterController@showRegistrationForm');
	Route::get('/org', 'Auth\OrgRegisterController@register');
    Route::get('/pending', 'Auth\PersonEmailRegisterController@pending');
    Route::get('/verify/{token}', 'Auth\EmailVerificationController@verify')->name('verify');
});
*/


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
