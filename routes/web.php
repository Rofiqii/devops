<?php
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LuppassController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/', [IndexController::class, 'showIndex'])->name('index');

Route::get('/registercustomer', [RegisterController::class, 'showRegistrationFormCus'])->name('registercus');
Route::post('/tambah-customer', [RegisterController::class, 'tambahCustomer'])->name('tambahCustomer');
Route::get('/registeradmin', [RegisterController::class, 'showRegistrationFormAdmin'])->name('registeradmin');
Route::post('/tambah-admin', [RegisterController::class, 'tambahAdmin'])->name('tambahAdmin');

Route::get('/logincustomer', [LoginController::class, 'showLoginFormCus'])->name('indexcus');
Route::get('/loginadmin', [LoginController::class, 'showLoginFormAdmin'])->name('indexadmin');
Route::post('/konfirmasilogincustomer', [LoginController::class, 'loginCus'])->name('loginCus');
Route::post('/konfirmasiloginadmin', [LoginController::class, 'loginAdmin'])->name('loginAdmin');

Route::get('/admin/dashboard', [DashboardController::class, 'showDashboardAdmin'])->name('dashboardadmin');
Route::get('/customer/dashboard', [DashboardController::class, 'showDashboardCus'])->name('dashboardcustomer');

Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::post('/logoutcus', [DashboardController::class, 'logoutcus'])->name('logoutcus');
Route::get('/logoutcus/confirm', [DashboardController::class, 'confirmLogoutCus'])->name('confirmlogoutcus');
Route::post('/logoutadmin', [DashboardController::class, 'logoutadmin'])->name('logoutadmin');
Route::get('/logoutadmin/confirm', [DashboardController::class, 'confirmLogoutAdmin'])->name('confirmlogoutadmin');

Route::get('/lupapasswordcustomer', [LuppassController::class, 'showLuppassFormCus'])->name('luppasscus');
Route::post('/lupapasswordcustomer', [LuppassController::class, 'lupaPasswordCus'])->name('customer.lupaPasswordCus');
Route::get('/lupapasswordadmin', [LuppassController::class, 'showLuppassFormAdmin'])->name('luppassadmin');
Route::post('/lupapasswordadmin', [LuppassController::class, 'lupaPasswordAdmin'])->name('admin.lupaPasswordAdmin');

Route::get('/admin/wisata', [AdminController::class, 'showWisataAdmin'])->name('wisataadmin');
Route::get('/admin/form-wisata', [AdminController::class, 'showFormWisataAdmin'])->name('formwisataadmin');
Route::post('/admin/insert-wisata', [AdminController::class, 'insertWisata'])->name('tambahwisata');
Route::get('/edit-wisata-admin/{kd_wisata}', [AdminController::class, 'showEditWisata'])->name('editWisataAdmin');
Route::put('/update-wisata-admin/{kd_wisata}', [AdminController::class, 'updateWisata'])->name('updateWisataAdmin');
Route::delete('/delete-wisata-admin/{kd_wisata}', [AdminController::class, 'deleteWisata'])->name('deleteWisataAdmin');
Route::get('/detail-wisata-admin/{id}', [AdminController::class, 'showDetailWisataAdmin'])->name('detailWisataAdmin');
Route::get('/admin/event', [AdminController::class, 'showEventAdmin'])->name('eventadmin');
Route::get('/admin/form-event', [AdminController::class, 'showFormEventAdmin'])->name('formeventadmin');
Route::post('/admin/insert-event', [AdminController::class, 'insertEvent'])->name('tambahevent');
Route::get('/detail-event-admin/{id}', [AdminController::class, 'showDetailEventAdmin'])->name('detailEventAdmin');
Route::get('/edit-event-admin/{kd_event}', [AdminController::class, 'showEditEvent'])->name('editEventAdmin');
Route::put('/update-event-admin/{kd_event}', [AdminController::class, 'updateEvent'])->name('updateEventAdmin');
Route::delete('/delete-event-admin/{kd_event}', [AdminController::class, 'deleteEvent'])->name('deleteEventAdmin');

Route::get('/customer/wisata', [CustomerController::class, 'showWisataCustomer'])->name('wisatacustomer');
Route::get('/detail-wisata-customer/{id}', [CustomerController::class, 'showDetailWisataCustomer'])->name('detailWisataCustomer');
Route::get('/customer/event', [CustomerController::class, 'showEventCustomer'])->name('eventcustomer');
Route::get('/detail-event-customer/{id}', [CustomerController::class, 'showDetailEventCustomer'])->name('detailEventCustomer');

Route::get('/admin/masukan', [AdminController::class, 'showMasukanAdmin'])->name('masukanadmin');
Route::get('/admin/detail-masukan/{kd_masukan}', [AdminController::class, 'showDetailMasukanAdmin'])->name('detailmasukanadmin');
Route::delete('/delete-detail-masukan-admin/{kd_masukan}', [AdminController::class, 'deleteMasukan'])->name('deletemasukan');

Route::get('/customer/masukan', [CustomerController::class, 'showMasukanCustomer'])->name('masukancustomer');
Route::get('/customer/form-masukan', [CustomerController::class, 'showFormMasukanCustomer'])->name('formmasukancustomer');
Route::get('/customer/detail-masukan/{kd_masukan}', [CustomerController::class, 'showDetailMasukanCustomer'])->name('detailmasukancustomer');
Route::post('/customer/tambah-masukan', [CustomerController::class, 'tambahMasukan'])->name('tambahmasukan');

Route::get('/admin/cariwisataadmin', [WisataController::class, 'cariwisataadmin'])->name('cariwisataadmin');
Route::get('/admin/carieventadmin', [EventController::class, 'carieventadmin'])->name('carieventadmin');
Route::get('/customer/cariwisatacus', [WisataController::class, 'cariwisatacus'])->name('cariwisatacus');
Route::get('/customer/carieventcus', [EventController::class, 'carieventcus'])->name('carieventcus');
