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

Route::get('/', function()
{
	return View::make('pages.index');
});

Route::get('shop', function()
{
	return View::make('pages.shop');
});

// Route::get('about', function()
// {
//     return view('pages.about');
// });

// Route::get('stores', function()
// {
//     return view('pages.locations');
// });

Route::get('admin', 'AdminController@index');

// Dev testing page

Route::group(['prefix' => 'devel'], function()
{
    Route::get('/', function()
    {
        echo "Laravel version " . app()::VERSION;
    });

    Route::get('testclass', function()
    {
        class Conn
        {
            private function tableName()
            {
                return env('DB_TABLE_PREFIX') . "_" . 'items';
            }

            public function up()
            {
                echo $this->tableName();
            }
        }

        $t = new Conn();

        $t->up();
    });

});