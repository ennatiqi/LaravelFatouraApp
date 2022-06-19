<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;

use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\Invoices_Report;
use App\Http\Controllers\Customers_Report;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ClientController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});
 Auth::routes(['verify' => true]); 




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/reset', function () {
    return view('auth.passwords.email');
});

Route::resource('fatoura', InvoicesController::class);

Route::resource('clients', ClientController::class);
Route::get('/addclients', [ClientController::class, 'addclients']);
Route::get('/addinvoices', [InvoicesController::class, 'addinvoices']);
 Route::get('/timesheet', function () {
    return view('clients.timesheet');
}); 

Route::resource('users', UserController::class);

Route::get('parameter', [ClientController::class,'parameter']);

Route::resource('InvoiceAttachments', InvoiceAttachmentsController::class);
Route::resource('Archive', InvoiceAchiveController::class);



Route::get('/Invoices_Details',[InvoicesDetailsController::class, 'Invoices_Details'])->name('Invoices_Details');

Route::GET('/updateinvoices', [InvoicesController::class, 'updateinvoices'])->name('updateinvoices');


Route::get('/edit_invoice', [InvoicesController::class, 'edit_invoice'])->name('edit_invoice');
Route::get('/edit_client', [ClientController::class, 'edit_client'])->name('edit_client');

Route::get('/update_client/{id}', [ClientController::class, 'update'])->name('update_client');


Route::get('/Status_show', [InvoicesController::class, 'show'])->name('Status_show');
Route::post('/Status_Update/{id}', [InvoicesController::class, 'Status_Update'])->name('Status_Update');
Route::get('/Print_invoice', [InvoicesController::class, 'Print_invoice'])->name('Print_invoice');

Route::post('/store', [ClientController::class, 'store']);
Route::post('/add_client', [ClientController::class, 'add_client'])->name('add_client');
Route::post('/add_invoices', [InvoicesController::class, 'add_invoices'])->name('add_invoices');

Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('adminUpdateInfo');
Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('adminPictureUpdate');
Route::post('change-password',[UserController::class,'changePassword'])->name('adminChangePassword');


Route::get('/delete/{id}', [ClientController::class, 'destroy']);
Route::get('/deleteinvoice/{id}', [InvoicesController::class, 'destroy']);








Route::get('download/{invoice_number}/{file_name}',[InvoicesDetailsController::class, 'get_file'] );
Route::get('View_file/{invoice_number}/{file_name}',[InvoicesDetailsController::class, 'open_file'] );
Route::post('delete_file',[InvoicesDetailsController::class, 'destroy'] )->name('delete_file');
Route::get('Invoice_Paid',[InvoicesController::class, 'Invoice_Paid']);
Route::get('Invoice_UnPaid',[InvoicesController::class, 'Invoice_UnPaid']);
Route::get('Invoice_Partial',[InvoicesController::class, 'Invoice_Partial']);
Route::get('export_invoices',[InvoicesController::class, 'export'] );
Route::get('invoices_report',[Invoices_Report::class, 'index'] );
Route::post('Search_invoices', [Invoices_Report::class, 'Search_invoices']);
Route::get('customers_report',[Customers_Report::class, 'index'])->name("customers_report");
Route::post('Search_customers',[Customers_Report::class, 'Search_customers']);
Route::get('MarkAsRead_all',[InvoicesController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');
Route::get('unreadNotifications_count', [InvoicesController::class, 'unreadNotifications_count'])->name('unreadNotifications_count');
Route::get('unreadNotifications', [InvoicesController::class, 'unreadNotifications'])->name('unreadNotifications');




Route::get('/{page}',[AdminController::class, 'index']);




