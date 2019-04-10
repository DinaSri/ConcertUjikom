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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/buy/{id}', 'TransferController@detail');
Route::get('/buy', function() {
	return view('buy');
});
Route::get('/dashboard', function() {
	return view('dashboard');
});

Route::get('/welcome', function(){
	return view('welcome');
});
Route::get('/profile', function() {
	return view('profile');
});

// FrontEnd
// Event Frontend
Route::get('/event/layout', function() {
	return view('frontend.event.index');
});
Route::get('/createevent', function() {
	return view('frontend.event.UserEvent');
});


Route::get('/transaksi/confirmation/{id}', 'TransferController@Confirmation');
// nyimpen untuk cadangan .env takut salah 
// MAIL_DRIVER=smtp
// MAIL_HOST=smtp.mailtrap.io
// MAIL_PORT=2525
// MAIL_USERNAME=null
// MAIL_PASSWORD=null
// MAIL_ENCRYPTION=null


//untuk send email

Route::get('/email', function () {
    return view('send_email');
});
Route::post('/sendEmail', 'Email@sendEmail');




// Transaksi Detail Frontend
Route::get('/trans/{id}', 'TransferController@transfer');
Route::get('/trans', function() {

	return view('frontend.event.transaksi');
});
//Detail 

Route::get('/detail/{id}', 'TransferController@detail');
Route::get('/detail', function() {
	return view('buy');
});

// Category event
Route::get('/category', function() {
	return view('category.index');
});


Route::get('/category/show', function() {
	return view('category.show');
});


// Category Tiket
Route::get('/katiket', function() {
	return view('katiket.index');
});


Route::get('/katiket/show', function() {
	return view('katiket.show');
});



//Tiket
Route::get('/tiket', function() {
	return view('tiket.index');
});

Route::get('/tiket/create', function() {
	return view('tiket.create');
});

Route::get('/tiket/edit', function() {
	return view('tiket.edit');
});

Route::get('/tiket/show', function() {
	return view('tiket.show');
});







// Master Bank
Route::get('/masterbank', function() {
	return view('masterbank.index');
});

Route::get('/masterbank/edit', function() {
	return view('masterbank.edit');
});

Route::get('/masterbank/show', function() {
	return view('masterbank.show');
});

//Event
Route::get('/event', function() {
	return view('event.index');
});

Route::get('/event/create', function() {
	return view('event.create');
});

Route::get('/event/edit', function() {
	return view('event.edit');
});

Route::get('/event/show', function() {
	return view('event.show');
});




// Transfer
Route::get('/transfer', function() {
	return view('transfer.index');
});

// Route::get('/transfer/create', function() {
// 	return view('transfer.create');
// });

// Route::get('/transfer/edit', function() {
// 	return view('transfer.edit');
// });
// Route::get('/transfer/show', function() {
// 	return view('transfer.show');
// });


// Bank
Route::get('/bank', function() {
	return view('bank.index');
});

Route::get('/bank/create', function() {
	return view('bank.create');
});

Route::get('/bank/edit', function() {
	return view('bank.edit');
});

Route::get('/bank/show', function() {
	return view('bank.show');
});

// User
Route::get('/user', function() {
	return view('user.index');
});

Route::get('/user/edit', function() {
	return view('user.edit');
});
Route::get('/user/show', function() {
	return view('user.show');
});







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
