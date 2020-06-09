<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('testes', 'Admin\TesteController@teste');

Route::any('products/search', 'ProductController@search')->name('products.search')->middleware(['auth', 'check.is.admin']);
//Route::resource('users', 'UserController')->middleware('auth');
Route::resource('users', 'UserController')->middleware('auth');

Route::resource('products', 'ProductController')->middleware(['auth', 'check.is.admin']);


Route::get('/login', function () {
    return 'Login';
})->name('login');
/*
Route::delete('/product/{id}', 'ProductController@destroy')->name('products.destroy');
Route::put('/products/{id}', 'ProductController@update')->name('products.update');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
Route::get('/products', 'ProductController@index')->name('products.index');
*/


Route::get('/', function () {
    return view('welcome');
});
/*
//grupo de rotas
Route::group([
    'middleware' => [],
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::get('/teste', function () {
        return 'group array teste';
    });
});


Route::middleware([])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::namespace('Admin')->group(function () {

            Route::name('admin.')->group(function () {

                Route::get('/', 'TesteController@teste');

                Route::get('dashboard', 'TesteController@teste')->name('dashboard');
                Route::get('products', 'TesteController@teste')->name('products');
            });
        });

        Route::get('users', 'Admin\TesteController@teste')->name('admin.users');
    });
});


Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/name-url', function () {
    return 'hey hey hey';
})->name('url.name');

Route::view('/view', 'welcome');

//Route::redirect('/redirect1', '/redirect2');

Route::get('/redirect2', function () {
    return 'Redirect 2';
});

Route::get('/redirect1', function () {
    return redirect('/redirect2');
});

//param router opcional
Route::get('/category/{idCategory?}', function ($id = '(Id não informado)') {
    return 'Produtos do id ' . $id;
});


Route::get('/products/{idProduct}', function ($id) {
    return 'Produtos do id ' . $id;
});

Route::match(['get', 'post'], '/match', function () {
    return 'match';
});

Route::any('/any', function () {
    return 'any';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', function () {
    return 'Contato';
});*/

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
