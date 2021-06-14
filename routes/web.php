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


/*
|--------------------------------------------------------------------------
| Front Routes (Website Pages)
|--------------------------------------------------------------------------
*/


Route::get('/', function () {return redirect('/login');});
Route::get('/admin', function () {return redirect('/login');});


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Back Routes (Admin Dashboard Pages)
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'auth' , 'admin','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () 
{
    Route::get('/members', 'AdminController@members')->name('admin-members'); 
    Route::get('/home', 'AdminController@index')->name('home');
    Route::get('/logo', 'AdminController@logo')->name('admin-logo');
    Route::get('/setting', 'AdminController@setting')->name('admin-setting');
    Route::get('/calendar', 'AdminController@calendar')->name('calendar');
    Route::resource('/branches', 'Branches\BranchesController'); 
    Route::get('/activebranches', 'Branches\BranchesController@active')->name('active-branches');
    Route::get('/deactivebranches', 'Branches\BranchesController@deactive')->name('deactive-branches');
});


/*
|--------------------------------------------------------------------------
| Back Routes (Admin Actions)
|--------------------------------------------------------------------------
*/

Route::post('/changelogo', 'AdminController@changelogo')->name('changelogo');
Route::post('/editinfo', 'AdminController@editinfo')->name('edit-info');
Route::post('/changepassword', 'AdminController@changepassword')->name('change-password');
Route::post('/enableuser', 'AdminController@enableuser')->name('enable-user');

Route::post('/disablebranch', 'Branches\BranchesController@disablebranch')->name('branch-disable');

    //------------------------------- To-Do List --------------------------\\
    //----------------------------------------------------------------------\\

Route::post('/addtodo', 'AdminController@addtodo')->name('add-todo');
Route::post('/gettodo', 'AdminController@gettodo')->name('get-todo');
Route::post('/edittodo', 'AdminController@edittodo')->name('edit-todo');
Route::post('/removetodo', 'AdminController@removetodo')->name('remove-todo');


    //------------------------------- Notes --------------------------\\
    //-----------------------------------------------------------------\\
    
Route::post('/createnote', 'AdminController@createnote')->name('create-note');
Route::post('/addnote', 'AdminController@addnote')->name('add-note');
Route::post('/getnote', 'AdminController@getnote')->name('get-note');
Route::post('/shownote', 'AdminController@shownote')->name('show-note');
Route::post('/editnote', 'AdminController@editnote')->name('edit-note');
Route::post('/removenote', 'AdminController@removenote')->name('remove-note');


    //------------------------------- Calendar --------------------------\\
    //--------------------------------------------------------------------\\
    
Route::get('/getevent/{user}', 'AdminController@getevent')->name('get-event');
Route::post('/addevent', 'AdminController@addevent')->name('add-event');
Route::post('/updateevent', 'AdminController@updateevent')->name('update-event');
Route::post('/showevent', 'AdminController@showevent')->name('show-event');
Route::post('/editnevent', 'AdminController@editevent')->name('edit-event');
Route::post('/removeevent', 'AdminController@removeevent')->name('remove-event');


/*
|------------------------------------------------------------------------
| Link Storage
|------------------------------------------------------------------------
*/

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

