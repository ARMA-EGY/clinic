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
| Front Routes 
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
| Roles Routes 
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'auth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () 
{

    Route::get('/home', 'MasterController@index')->name('home');
    Route::get('/profile', 'MasterController@profile')->name('profile');
    Route::get('/calendar', 'MasterController@calendar')->name('calendar');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes 
    |--------------------------------------------------------------------------
    */

    Route::group(['middleware' => [ 'admin' ]], function () 
    {
        Route::resource('/branches', 'Admin\Branches\BranchesController'); 
        Route::get('/activebranches', 'Admin\Branches\BranchesController@active')->name('active-branches');
        Route::get('/deactivebranches', 'Admin\Branches\BranchesController@deactive')->name('deactive-branches');
        Route::resource('/patients', 'Admin\Patients\PatientsController'); 
        Route::resource('/permissions', 'Admin\Permissions\PermissionsController'); 
        Route::resource('/sectors', 'Admin\Sectors\SectorsController'); 
        Route::get('/activesectors', 'Admin\Sectors\SectorsController@active')->name('active-sectors');
        Route::get('/deactivesectors', 'Admin\Sectors\SectorsController@deactive')->name('deactive-sectors');
        Route::resource('/services', 'Admin\Services\ServicesController');
        Route::resource('/servicescategory', 'Admin\servicescategory\ServicesCategoryController');
        Route::resource('/doctors', 'Admin\Doctors\DoctorsController'); 
        Route::get('/activedoctors', 'Admin\Doctors\DoctorsController@active')->name('active-doctors');
        Route::get('/deactivedoctors', 'Admin\Doctors\DoctorsController@deactive')->name('deactive-doctors');
        Route::get('/doctor/{id}/profile', 'Admin\Doctors\DoctorsController@profile')->name('doctors.profile');
        Route::resource('/staff', 'Admin\Staff\StaffController'); 
        Route::get('/activestaff', 'Admin\Staff\StaffController@active')->name('active-staff');
        Route::get('/deactivestaff', 'Admin\Staff\StaffController@deactive')->name('deactive-staff');
        Route::get('/staff/{id}/profile', 'Admin\Staff\StaffController@profile')->name('staff.profile');
        Route::resource('/appointment', 'Admin\Appointment\AppointmentController'); 
        Route::resource('/AppointmentServices', 'Admin\AppointmentServices\AppointmentServicesController'); 
        Route::get('/appointment-today', 'Admin\Appointment\AppointmentController@today')->name('appointment.today');
        Route::get('/appointment-done', 'Admin\Appointment\AppointmentController@done')->name('appointment.done');
        Route::get('/appointment-cancelled', 'Admin\Appointment\AppointmentController@cancelled')->name('appointment.cancelled');
        Route::post('/appointmentnext', 'Admin\Appointment\AppointmentController@next')->name('appointment.next');
        Route::post('/appointmentprev', 'Admin\Appointment\AppointmentController@prev')->name('appointment.prev');
        Route::post('/patientinfo', 'Admin\Appointment\AppointmentController@patientinfo')->name('patient-info');
        Route::post('/appointmentschedule', 'Admin\Appointment\AppointmentController@schedule')->name('appointment.schedule');
        Route::post('/disablebranch', 'Admin\Branches\BranchesController@disablebranch')->name('branch-disable');
        Route::post('/disablesector', 'Admin\Sectors\SectorsController@disable')->name('sector-disable');
        Route::post('/disabledoctor', 'Admin\Doctors\DoctorsController@disable')->name('doctor-disable');
        Route::post('/disablestaff', 'Admin\Staff\StaffController@disable')->name('staff-disable');
        Route::get('/logo', 'MasterController@logo')->name('admin-logo');
    });

    /*
    |--------------------------------------------------------------------------
    | Staff Routes 
    |--------------------------------------------------------------------------
    */

    Route::group(['middleware' => [ 'Staff' ]], function () 
    {

    });

    /*
    |--------------------------------------------------------------------------
    | Doctor Routes 
    |--------------------------------------------------------------------------
    */

    Route::group(['middleware' => [ 'Doctor' ]], function () 
    {

    });

});


/*
|--------------------------------------------------------------------------
| Back Routes (Admin Actions)
|--------------------------------------------------------------------------
*/

Route::post('/changelogo', 'MasterController@changelogo')->name('changelogo');
Route::post('/editinfo', 'MasterController@editinfo')->name('edit-info');
Route::post('/changepassword', 'MasterController@changepassword')->name('change-password');
Route::post('/enableuser', 'MasterController@enableuser')->name('enable-user');

/*
|--------------------------------------------------------------------------
| To-Do List
|--------------------------------------------------------------------------
*/

Route::post('/addtodo', 'MasterController@addtodo')->name('add-todo');
Route::post('/gettodo', 'MasterController@gettodo')->name('get-todo');
Route::post('/edittodo', 'MasterController@edittodo')->name('edit-todo');
Route::post('/removetodo', 'MasterController@removetodo')->name('remove-todo');

/*
|--------------------------------------------------------------------------
| Notes
|--------------------------------------------------------------------------
*/
    
Route::post('/createnote', 'MasterController@createnote')->name('create-note');
Route::post('/addnote', 'MasterController@addnote')->name('add-note');
Route::post('/getnote', 'MasterController@getnote')->name('get-note');
Route::post('/shownote', 'MasterController@shownote')->name('show-note');
Route::post('/editnote', 'MasterController@editnote')->name('edit-note');
Route::post('/removenote', 'MasterController@removenote')->name('remove-note');

/*
|--------------------------------------------------------------------------
| Calendar
|--------------------------------------------------------------------------
*/
    
Route::get('/getevent/{user}', 'MasterController@getevent')->name('get-event');
Route::post('/addevent', 'MasterController@addevent')->name('add-event');
Route::post('/updateevent', 'MasterController@updateevent')->name('update-event');
Route::post('/showevent', 'MasterController@showevent')->name('show-event');
Route::post('/editnevent', 'MasterController@editevent')->name('edit-event');
Route::post('/removeevent', 'MasterController@removeevent')->name('remove-event');


/*
|------------------------------------------------------------------------
| Link Storage
|------------------------------------------------------------------------
*/

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

