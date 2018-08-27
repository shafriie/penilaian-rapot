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

/* Check permission. if already login next page dashboard */
Route::group(['middleware' => 'nextAuth'], function() {
    
    /* Login */
    Route::get('/',function(){
		return view('Login/login');
	});

	/* Login */
	Route::get('login',function(){
		return view('Login/login');
	});

});

/* Submit Login */
Route::post('login/submit', 'Login@submit');

/* Logout */
Route::get('logout', 'Logout@index');

/* check Permission. If not login. return redirect to login */
Route::group(['middleware' => 'checkAuth'], function() {
    
	/* Dashboard */
	Route::get('dashboard','Dashboard@index')->name('dashboard');

	/* check status. if not admin. can not work */
	Route::group(['middleware' => 'checkStatus'], function() {
	
		/* Siswa */
		Route::get('siswa','Siswa@index');

		Route::get('siswa/add',function(){
			return view('Siswa.add');
		});

		Route::post('siswa/insert','Siswa@insert');

		Route::get('siswa/edit/{id}','Siswa@edit');

		Route::post('siswa/update/{id}','Siswa@update');

		Route::get('siswa/delete/{id}','Siswa@delete');
		/* End Siswa */

		/* Mata Pelajaran */
		Route::get('pelajaran','Pelajaran@index');

		Route::get('pelajaran/add',function(){
			return view('Pelajaran.add');
		});

		Route::post('pelajaran/insert','Pelajaran@insert');

		Route::get('pelajaran/edit/{id}','Pelajaran@edit');

		Route::post('pelajaran/update/{id}','Pelajaran@update');

		Route::get('pelajaran/delete/{id}','Pelajaran@delete');

		/* End Mata Pelajaran */

		/* Kelas */
		Route::get('kelas','Kelas@index');

		Route::get('kelas/add',function(){
			return view('Kelas.add');
		});

		Route::post('kelas/insert','Kelas@insert');

		Route::get('kelas/edit/{id}','Kelas@edit');

		Route::put('kelas/update/{id}','Kelas@update');

		Route::get('kelas/delete/{id}','Kelas@delete');

		/* End Kelas */

		/* Nilai */
		Route::get('nilai','Nilai@index');

		Route::get('nilai/add','Nilai@add');

		Route::post('nilai/insert','Nilai@insert');

		Route::get('nilai/delete/{id}','Nilai@delete');

		Route::get('nilai/edit/{id}','Nilai@edit');

		Route::put('nilai/update/{id}', 'Nilai@update');

		/* End Nilai */

	});
	
	/* Laporan */
	Route::get('laporan','Laporan@index');
	/* End Laporan */

	/* Profile */
	Route::get('profile','Profile@index');

	Route::put('profile/update/guru/{id}','Profile@updateGuru');

	Route::put('profile/update/siswa/{id}','Profile@updateSiswa');

});