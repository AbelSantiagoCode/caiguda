<?php
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
// include "Telegram.php";
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
Route::get('/telegram', function () {
  $client = new Client(); //GuzzleHttp\Client
  $result = $client->post('https://api.telegram.org/bot615582162:AAGgt4fbrWwCtNCzEltixeg4r1_-WXay2AI/sendMessage', [
  'form_params' => [
      'chat_id'  => '-1001271064871',
      'text'     => 'Prova text desde Laravel'
  ]
  ]);

  $result = $client->post('https://api.telegram.org/bot615582162:AAGgt4fbrWwCtNCzEltixeg4r1_-WXay2AI/sendPhoto', [
    'form_params' => [
        'chat_id'  => '-1001271064871',
        'photo' => "https://raw.githubusercontent.com/AbelSantiagoCode/caiguda/master/public/images/12112.png"
    ]
    ]);

 
  return "Text sent to telegramm";
});




Route::get('/test','TestController@test')->name('test');



Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('event-caiguda',function(){

  $data = [
    'topic_id' => 'onAlertMessage'
  ];
  \App\Socket\Pusher::sentDataToServer($data);
  return redirect()->route('caiguda.show');

});

// MESSAGE CONTROLLER
Route::prefix('caiguda')->group(function() {
  // store per fer debug!!!
  Route::get('/store','CaigudaController@store')->name('caiguda.store');
  Route::get('/show','CaigudaController@show')->name('caiguda.show');
  Route::get('/assistit/{id}','CaigudaController@assistit')->name('caiguda.assistit');
});



Route::middleware('auth')->group(function() {

  // USER CONTROLLER comentarr
  Route::prefix('user')->group(function() {

    Route::get('/index','UserController@index')->name('user.index')->middleware('can:read-user');
    Route::post('/store','UserController@store')->name('user.store')->middleware('can:create-user');
    Route::get('create','UserController@create')->name('user.create')->middleware('can:create-user');
    Route::delete('/destroy/{user}','UserController@destroy')->name('user.destroy')->middleware('can:delete-user');
    Route::patch('/update/{user}','UserController@update')->name('user.update')->middleware('can:update-user');
    Route::get('/show/{user}','UserController@show')->name('user.show')->middleware('can:read-user');
    Route::get('/edit/{user}','UserController@edit')->name('user.edit')->middleware('can:update-user');

    Route::get('/horaris/{user}','UserController@horaris')->name('user.horaris')->middleware('can:read_horari-user');
    Route::get('/sectors/{user}','UserController@sectors')->name('user.sectors')->middleware('can:read_sector-user');

  });

  // SECTOR CONTROLLER
  Route::prefix('sector')->group(function() {
      Route::get('/index','SectorController@index')->name('sector.index')->middleware('can:read-sector');
      Route::post('/store','SectorController@store')->name('sector.store')->middleware('can:create-sector');
      Route::get('/create','SectorController@create')->name('sector.create')->middleware('can:create-sector');
      Route::delete('/destroy/{sector}','SectorController@destroy')->name('sector.destroy')->middleware('can:delete-sector');
      Route::patch('/update/{sector}','SectorController@update')->name('sector.update')->middleware('can:update-sector');
      Route::get('/edit/{sector}','SectorController@edit')->name('sector.edit')->middleware('can:update-sector');
  });


  // HORARI CONTROLLER
  Route::prefix('horari')->group(function() {
      Route::get('/index','HorariController@index')->name('horari.index')->middleware('can:read-horari');
      Route::post('/store','HorariController@store')->name('horari.store')->middleware('can:create-horari');
      Route::get('/create','HorariController@create')->name('horari.create')->middleware('can:create-horari');
      Route::delete('/destroy/{horari}','HorariController@destroy')->name('horari.destroy')->middleware('can:delete-horari');
      Route::patch('/update/{horari}','HorariController@update')->name('horari.update')->middleware('can:update-horari');
      Route::get('/edit/{horari}','HorariController@edit')->name('horari.edit')->middleware('can:update-horari');

  });

  // DEVICE CONTROLLER
  Route::prefix('devices')->group(function() {
    Route::get('/','DeviceController@index')->name('devices.index')->middleware('can:read-device');
    Route::post('/','DeviceController@store')->name('devices.store')->middleware('can:create-device');
    Route::get('create','DeviceController@create')->name('devices.create')->middleware('can:create-device');
    Route::delete('/{device}','DeviceController@destroy')->name('devices.destroy')->middleware('can:delete-device');
    Route::put('/{device}','DeviceController@update')->name('devices.update')->middleware('can:update-device');
    Route::get('/{device}','DeviceController@show')->name('devices.show')->middleware('can:read-device'); //May be restrict it only for Admins and Superadmins
    Route::get('/{device}/edit','DeviceController@edit')->name('devices.edit')->middleware('can:update-device');
  });


  // CLIENT CONTROLLER
  Route::prefix('clients')->group(function() {
    Route::get('/','ClientController@index')->name('clients.index')->middleware('can:read-client');
    Route::post('/','ClientController@store')->name('clients.store')->middleware('can:create-client');
    Route::get('create','ClientController@create')->name('clients.create')->middleware('can:create-client');
    Route::delete('/{client}','ClientController@destroy')->name('clients.destroy')->middleware('can:delete-client');
    Route::put('/{client}','ClientController@update')->name('clients.update')->middleware('can:update-client');
    Route::get('/{client}','ClientController@show')->name('clients.show')->middleware('can:read-client'); //May be restrict it only for Admins and Superadmins
    Route::get('/{client}/edit','ClientController@edit')->name('clients.edit')->middleware('can:update-client');

  });


  

});
