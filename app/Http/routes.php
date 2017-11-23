<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Dictionarys;


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('gettext/{qtext}', ['as' => 'gettext', function ($qtext) {
			
			
			$dictionay = Dictionarys::where('active',1)
									->where('qtext','=',$qtext)
									->get();

			if(count($dictionary)>0)
			{

				return view('pages.welcome')
			->with('$dictionary', $dictionary[0]);
			}
			else
			{
				return view('pages.welcome');
			}

			
			
			
			
		}]);

		Route::resource('searchs','SearchController');


	Route::group(['middleware' => 'auth'],function()
	{
		
		Route::get('dashboarduserprofile', [
					'uses' => 'ProfilesController@dashboarduserindex'
					]);

		Route::resource('profiles','ProfilesController');

		Route::group(['middleware' => 'roleware3_4'],function()
		{
			
			

			Route::group(['middleware' => 'roleware2'],function()
			{
				

				
				
				

				Route::group(['middleware' => 'roleware'],function()
				{
					
					Route::resource('userspannel','UserspannelController');
					Route::resource('dictionarys','DictionaryController');

					
				});

			});
			
		});



		
	});