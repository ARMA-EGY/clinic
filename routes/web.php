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
Route::get('/pledgefile/{id}', 'Admin\Pledges\PledgesController@file')->name('pledgefile');
Route::post('/agreement', 'Admin\Pledges\PledgesController@agree')->name('pledge.agree');

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
    Route::get('/patient/{id}/profile', 'MasterController@patientProfile')->name('patient.profile');
    Route::post('/patientinfo', 'Admin\Appointment\AppointmentController@patientinfo')->name('patient-info');
    Route::post('/patientinfotable', 'Admin\Xrays\XraysController@patientinfotable')->name('patient-info-table');
    Route::post('/appointmentinfotable', 'Admin\Xrays\XraysController@appointmentinfotable')->name('appointment-info-table');
    Route::post('/removeXrayImage', 'Admin\Xrays\XraysController@removeImage')->name('remove-xray-image');
    Route::resource('/pledges', 'Admin\Pledges\PledgesController'); 

    /*
    |--------------------------------------------------------------------------
    | Admin Routes 
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'admin','middleware' => [ 'admin' ]], function () 
    {
        Route::resource('/xrays', 'Admin\Xrays\XraysController'); 
        Route::resource('/branches', 'Admin\Branches\BranchesController'); 
        Route::resource('/inventory', 'Admin\Inventory\InventoryController'); 
        Route::get('/inventory/adjustment/index', 'Admin\Inventory\InventoryController@adjustmentIndex')->name('index-adjustment');
        Route::get('/inventory/adjustment/create', 'Admin\Inventory\InventoryController@adjustmentCreate')->name('create-adjustment');
        Route::post('/inventory/adjustment/store', 'Admin\Inventory\InventoryController@adjustmentStore')->name('store-adjustment');
        Route::post('/disableinventory', 'Admin\Inventory\InventoryController@disableinventory')->name('inventory-disable');
        Route::get('/activeinventory', 'Admin\Inventory\InventoryController@active')->name('active-inventory');
        Route::get('/deactiveinventory', 'Admin\Inventory\InventoryController@deactive')->name('deactive-inventory');
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
        Route::get('/transactions', 'Admin\Appointment\AppointmentController@transactions')->name('index-transactions');
        Route::resource('/AppointmentServices', 'Admin\AppointmentServices\AppointmentServicesController'); 
        Route::get('/appointment-today', 'Admin\Appointment\AppointmentController@today')->name('appointment.today');
        Route::get('/appointment-done', 'Admin\Appointment\AppointmentController@done')->name('appointment.done');
        Route::get('/appointment-cancelled', 'Admin\Appointment\AppointmentController@cancelled')->name('appointment.cancelled');
        Route::post('/appointmentnext', 'Admin\Appointment\AppointmentController@next')->name('appointment.next');
        Route::post('/appointmentprev', 'Admin\Appointment\AppointmentController@prev')->name('appointment.prev');
        Route::post('/appointmentschedule', 'Admin\Appointment\AppointmentController@schedule')->name('appointment.schedule');
        Route::post('/disablebranch', 'Admin\Branches\BranchesController@disablebranch')->name('branch-disable');
        Route::post('/disablesector', 'Admin\Sectors\SectorsController@disable')->name('sector-disable');
        Route::post('/disabledoctor', 'Admin\Doctors\DoctorsController@disable')->name('doctor-disable');
        Route::post('/disablestaff', 'Admin\Staff\StaffController@disable')->name('staff-disable');
        Route::get('/logo', 'MasterController@logo')->name('admin-logo');
        Route::get('/setting', 'MasterController@setting')->name('admin-setting');
        Route::post('/appointment-checkout-show', 'Admin\Appointment\AppointmentController@showCheckout')->name('appointment.checkout');
        Route::post('/appointment-checkout-confirm', 'Admin\Appointment\AppointmentController@confirmCheckout')->name('appointment.checkout-confirm');
        Route::post('/appointment-cancel', 'Admin\Appointment\AppointmentController@cancel')->name('appointment.cancel');
        Route::post('/adjustment-show', 'Admin\Inventory\InventoryController@showAdjustment')->name('adjustment.show');
    });

    /*
    |--------------------------------------------------------------------------
    | Staff Routes 
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'staff','middleware' => [ 'staff' ]], function () 
    {
        Route::resource('/staff-patients', 'Staff\Patients\PatientsController'); 
        Route::resource('/staff-services', 'Staff\Services\ServicesController');
        Route::resource('/staff-servicescategory', 'Staff\servicescategory\ServicesCategoryController');
        Route::resource('/staff-doctors', 'Staff\Doctors\DoctorsController'); 
        Route::get('/staff-activedoctors', 'Staff\Doctors\DoctorsController@active')->name('staff-active-doctors');
        Route::get('/staff-deactivedoctors', 'Staff\Doctors\DoctorsController@deactive')->name('staff-deactive-doctors');
        Route::get('/staff-doctor/{id}/profile', 'Staff\Doctors\DoctorsController@profile')->name('staff-doctors.profile');
        Route::resource('/staff-staff', 'Staff\Staff\StaffController'); 
        Route::get('/staff-activestaff', 'Staff\Staff\StaffController@active')->name('staff-active-staff');
        Route::get('/staff-deactivestaff', 'Staff\Staff\StaffController@deactive')->name('staff-deactive-staff');
        Route::get('/staff/{id}/profile', 'Staff\Staff\StaffController@profile')->name('staff-staff.profile');
        Route::resource('/staff-AppointmentServices', 'Staff\AppointmentServices\AppointmentServicesController'); 
        Route::resource('/staff-appointment', 'Staff\Appointment\AppointmentController'); 
        Route::get('/staff-appointment-today', 'Staff\Appointment\AppointmentController@today')->name('staff-appointment.today');
        Route::get('/staff-appointment-done', 'Staff\Appointment\AppointmentController@done')->name('staff-appointment.done');
        Route::get('/staff-appointment-cancelled', 'Staff\Appointment\AppointmentController@cancelled')->name('staff-appointment.cancelled');
        Route::post('/staff-appointmentnext', 'Staff\Appointment\AppointmentController@next')->name('staff-appointment.next');
        Route::post('/staff-appointmentprev', 'Staff\Appointment\AppointmentController@prev')->name('staff-appointment.prev');
        Route::resource('/staff-external-appointment', 'Staff\ExternalAppointment\ExternalAppointmentController'); 
        Route::get('/staff-external-appointment-today', 'Staff\ExternalAppointment\ExternalAppointmentController@today')->name('staff-external-appointment.today');
        Route::get('/staff-external-appointment-done', 'Staff\ExternalAppointment\ExternalAppointmentController@done')->name('staff-external-appointment.done');
        Route::get('/staff-external-appointment-cancelled', 'Staff\ExternalAppointment\ExternalAppointmentController@cancelled')->name('staff-external-appointment.cancelled');
        Route::post('/staff-external-appointmentnext', 'Staff\ExternalAppointment\ExternalAppointmentController@next')->name('staff-external-appointment.next');
        Route::post('/staff-external-appointmentprev', 'Staff\ExternalAppointment\ExternalAppointmentController@prev')->name('staff-external-appointment.prev');
        Route::post('/staff-patientinfo', 'Staff\Appointment\AppointmentController@patientinfo')->name('staff-patient-info');
        Route::post('/staff-appointmentschedule', 'Staff\Appointment\AppointmentController@schedule')->name('staff-appointment.schedule');
        Route::post('/staff-disablesector', 'Staff\Sectors\SectorsController@disable')->name('staff-sector-disable');
        Route::post('/staff-disabledoctor', 'Staff\Doctors\DoctorsController@disable')->name('staff-doctor-disable');
        Route::post('/staff-disablestaff', 'Staff\Staff\StaffController@disable')->name('staff-staff-disable');
    });

    /*
    |--------------------------------------------------------------------------
    | Doctor Routes 
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'doctor','middleware' => [ 'doctor' ]], function () 
    {
        Route::get('/profile', 'Doctor\Doctors\DoctorsController@profile')->name('doctor-doctors.profile');
        Route::post('/changepassword', 'Doctor\Doctors\DoctorsController@changepassword')->name('doctor-changepassword');
        Route::resource('/doctor-appointment', 'Doctor\Appointment\AppointmentController'); 
        Route::post('/doctor-appointment-addnotes', 'Doctor\Appointment\AppointmentController@addNotes')->name('doctor-appointment-addnotes');
        Route::get('/appointment-today', 'Doctor\Appointment\AppointmentController@today')->name('doctor-appointment.today');
        Route::get('/appointment-done', 'Doctor\Appointment\AppointmentController@done')->name('doctor-appointment.done');
        Route::get('/appointment-cancelled', 'Doctor\Appointment\AppointmentController@cancelled')->name('doctor-appointment.cancelled');
        Route::resource('/AppointmentServices', 'Doctor\AppointmentServices\AppointmentServicesController'); 
        Route::post('/AppointmentServices', 'Doctor\AppointmentServices\AppointmentServicesController@remove')->name('doctor-AppointmentServicesController.remove');
        
    });

});


/*
|--------------------------------------------------------------------------
| Back Routes (Admin Actions)
|--------------------------------------------------------------------------
*/

Route::post('/changelogo', 'MasterController@changelogo')->name('changelogo');
Route::post('/editinfo', 'MasterController@editinfo')->name('edit-info');
Route::post('/changeProfilePicture', 'MasterController@changeProfilePicture')->name('change-profile-picture');
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

