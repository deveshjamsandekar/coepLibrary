<?php

use App\PhpSerial;

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
Route::get('send','MyController@send');
Route::get('/students', 'StudentsController@index');
Route::get('/students/login', 'SessionsController@login');
Route::post('/students/login','SessionsController@val');

Route::get('/students/{student}/bookdetails','StudentsController@bookdetails');

Route::get('/students/search','StudentsController@search');

Route::get('/students/register', 'StudentsController@create');
Route::post('/students', 'StudentsController@store');
Route::get('/students/{student}/edit', 'StudentsController@edit');
Route::post('/students/{student}', 'StudentsController@update');
Route::get('/students/{student}/delete', 'StudentsController@destroy');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

Route::get('/books/issuer','IssueController@info');
Route::get('/books/issue', 'IssueController@create');
Route::get('/books/{student}/issue', 'IssueController@entry');
Route::post('/booksissuer/{student}', 'IssueController@store');
Route::get('/books/return', 'ReturnController@create');
Route::post('/books/return', 'ReturnController@store');
Route::post('/books/return/{book}', 'ReturnController@returning');



Route::get('/books', 'BooksController@index');
Route::get('/books/search','BooksController@search');
Route::get('/books/register', 'BooksController@create');
Route::post('/books', 'BooksController@store');
Route::get('/books/{book}/edit', 'BooksController@edit');
Route::post('/books/{book}', 'BooksController@update');
Route::get('/books/{book}/delete', 'BooksController@destroy');
Route::get('/books/{book}/details', 'IssueController@details');

Auth::routes();

Route::get('/profile','SessionsController@profile');
Route::post('/profile/delete','SessionsController@delete');
Route::get('/home', 'HomeController@index')->name('home');


Route::resource('codes', 'CodesController');



Route::get('/ibutton', function() {
  function microtime_float()
  {
  	list($usec, $sec) = explode(" ", microtime());
  	return ((float)$usec + (float)$sec);
  }
  // Let's start the class
  $serial = new phpSerial;
  // First we must specify the device. This works on both linux and windows (if
  // your linux serial device is /dev/ttyS0 for COM1, etc)
  $serial->deviceSet("COM4");
  // $serial->deviceSet("/dev/ttyS0.usbserial-FTDY7ID6");
  // We can change the baud rate, parity, length, stop bits, flow control
  $serial->confBaudRate(9600);
  $serial->confParity("none");
  $serial->confCharacterLength(8);
  $serial->confStopBits(1);
  $serial->confFlowControl("none");
  // Then we need to open it
  $serial->deviceOpen();
  // To write into
  // Or to read from
  $read = '';
  $theResult = '';
  $start = microtime_float();
  while ( ($read == '') && (microtime_float() <= $start + 0.5) ) {
  	$read = $serial->readPort();
  	if ($read != '') {
  		$theResult .= $read;
  		$read = '';
  	}
  }
  // If you want to change the configuration, the device must be closed
  $serial->deviceClose();
  // etc...
  echo "Read data: ".$theResult."<br>";
  echo "<form id='FormName' name='FormName' action='example_VS421CPNTA.php' method='post'>
  		<table width=500>
  			<tr>
  				<td>Switch to input? :</td>
  				<td><input type=text name=the_input  maxlength=30 size=30></td>
  				<td><input type=submit value='Switch'></td>
  			</tr>
  		</table>
  	</form>";
});
