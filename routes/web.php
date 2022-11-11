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
    return view('auth.login');
});



Auth::routes();

Route::group(['prefix' => 'admin'], function(){
	Route::get('/lte', 'LteController@index');
	// Route dashboard 
	Route::get('/home', 'AdminController@index')->name('adminhome');
	// Route profil 
	Route::get('/profil/{id}', 'AdminController@edit')->name('profil.admin');
	Route::post('/update/{id}','AdminController@update')->name('update.admin');
	Route::post('/update/foto/{id}','AdminController@updatefoto')->name('update.foto');
	Route::post('/update/pw/{id}','AdminController@updatepw')->name('update.pw');
	// Route guru
	Route::get('/daftar/guru', 'UserController@guru')->name('list.guru');
	Route::get('/tambah/guru', 'UserController@insert')->name('insert.guru');
	Route::post('/store/guru', 'UserController@store')->name('store.guru');
	Route::get('/edit/guru/{id}', 'UserController@edit')->name('edit.list.guru');
	Route::post('/update/guru/{id}','UserController@update')->name('update.list.guru');
	Route::get('/delete/guru/{id}', 'UserController@delete')->name('delete.list.guru');
	Route::get('/import/guru', 'UserController@import')->name('import.guru');
	Route::post('/guru/importExcel', 'UserController@importExcel');
	// Route kelas
	Route::get('/kelas', 'KelasController@index')->name('kelas');
	Route::get('/tambahkelas', 'KelasController@insert')->name('insert.kelas');
	Route::post('/store/kelas', 'KelasController@store')->name('store.kelas');
	Route::get('/edit/kelas/{id}', 'KelasController@edit')->name('edit.kelas');
	Route::post('/update/kelas/{id}','KelasController@update')->name('update.kelas');
	Route::get('/delete/kelas/{id}', 'KelasController@delete')->name('delete.kelas');
	Route::get('/import/kelas', 'KelasController@import')->name('import.kelas'); 
	Route::post('/importExcel', 'KelasController@importExcel');
	Route::get('/import/walikelas', 'KelasController@importwali')->name('import.wali.kelas'); 
	Route::post('/wali/importExcel', 'KelasController@importwaliExcel')->name('excel.wali');
	Route::get('/naik/kelas','KelasController@naik')->name('naik.kelas');
	// Route Siswa
	Route::get('/{id}/siswa', 'SiswaController@index')->name('siswa');
	Route::get('/tambah/{id}/siswa', 'SiswaController@insert')->name('insert.siswa');
	Route::post('/store/{id}/siswa', 'SiswaController@store')->name('store.siswa');
	Route::get('/edit/siswa/{id}', 'SiswaController@edit')->name('edit.siswa');
	Route::post('/update/siswa/{s_id}/{k_id}','SiswaController@update')->name('update.siswa');
	Route::get('/delete/siswa/{s_id}/{k_id}', 'SiswaController@delete')->name('delete.siswa');
	Route::get('/pindah/kelas/{id}', 'SiswaController@pindah')->name('pindah.siswa');
	Route::post('/kelas/baru/{s_id}','SiswaController@updatekelas')->name('pindah.kelas');
	Route::get('/import/{id}/siswa', 'SiswaController@import')->name('import.siswa'); 
	Route::post('/siswa/{id}/importExcel', 'SiswaController@importExcel')->name('excel.siswa');
	// user akun siswa
	Route::get('/siswa', 'UserController@siswa')->name('list.siswa');
	Route::get('/add/akun/siswa', 'UserController@add')->name('add.akun.siswa');
	Route::post('/simpan/akun/siswa', 'UserController@simpanakunsiswa')->name('simpan.akun.siswa');
	Route::get('/sunting/siswa/{id}', 'UserController@sunting')->name('sunting.siswa');
	Route::post('/ubah/siswa/{id}','UserController@ubah')->name('ubah.siswa');
	Route::get('/hapus/siswa/{id}', 'UserController@hapus')->name('hapus.siswa');
	Route::get('/import/siswa/akun', 'UserController@importsiswa')->name('import.siswa.akun');
	Route::post('/akun/siswa/importExcel', 'UserController@importExcelsiswa');
	//Route kh
	Route::get('/jenis_kh', 'KhController@index')->name('kh');
	Route::post('/jenis_kh/action', 'KhController@actionkh')->name('action.kh');
	Route::get('/tambah/jenis_kh', 'KhController@insert')->name('insert.kh');
	Route::post('/store/jenis_kh', 'KhController@store')->name('store.kh');
	// Route Tahun Ajar
	Route::get('/th_ajar', 'ThAjarController@index')->name('th_ajar');
	Route::get('/tambah/th_ajar', 'ThAjarController@insert')->name('insert.th_ajar');
	Route::post('/store/th_ajar', 'ThAjarController@store')->name('store.th_ajar');
	Route::get('/edit/th_ajar/{id}', 'ThAjarController@edit')->name('edit.th_ajar');
	Route::post('/update/th_ajar/{id}','ThAjarController@update')->name('update.th_ajar');
	Route::get('/delete/th_ajar/{id}', 'ThAjarController@delete')->name('delete.th_ajar');
	Route::get('/rekap/kh/{id}', 'ThAjarController@rekapkh')->name('rekap.kh');
	Route::get('/rekap/{ta_id}/{k_id}', 'ThAjarController@rekapsiswa')->name('rekap.siswa');
	Route::get('/rekap/siswa/{ta_id}', 'ThAjarController@rekapsemua')->name('rekap.semua');
	//Route Penguji KH
	Route::get('/uji/{id}/{nama}', 'UjiKhController@index')->name('ujikh');
	Route::get('/edit/penguji/{id}', 'UjiKhController@edit')->name('edit.ujikh');
	Route::post('/update/penguji/{id}/{ta_id}/{kh_nama}','UjiKhController@update')->name('update.ujikh');
	Route::get('/import/penguji/{ta_id}/{id_kh}', 'UjiKhController@import')->name('import.penguji');
	Route::get('/template/penguji', 'UjiKhController@download')->name('download.template'); 
	Route::post('/penguji/importExcel/{ta_id}/{id_kh}', 'UjiKhController@importExcel')->name('excel.penguji');
	// Route Rekap KH
	Route::get('/rekap/{id}', 'RekapKhController@index')->name('rekap');
	Route::post('/rekap/action', 'RekapKhController@actionrekap')->name('action.rekap');
	Route::get('/rekapan/{id}', 'RekapKhController@rekap')->name('rekapan');
	Route::get('/penguji/{id}', 'RekapKhController@rekappenguji')->name('rekap.penguji');

	//Route Tanggungan Semester
	Route::get('/tanggungan/{id}', 'TanggunganSmtController@rekap')->name('tanggungan');

	//Route tanggungan ijazah keuangan
	Route::get('/keuangan', 'KeuanganController@index')->name('index.keu');
	Route::get('/keuangan/{th_lulus}', 'KeuanganController@view')->name('view.keu');
	Route::get('/edit/tanggungan/{th_lulus}/{id}', 'KeuanganController@edit')->name('edit.keu');
	Route::post('/ubah/tanggungan/{th_lulus}/{id}','KeuanganController@update')->name('update.keu');
	Route::get('/import/keuangan/{th_lulus}', 'KeuanganController@import')->name('import.keu');
	Route::post('/keuangan/importExcel/{th_lulus}', 'KeuanganController@importExcel'); 

	//Route tanggungan ijazah keamanan putra
	Route::get('/keamanan', 'KeamananController@index')->name('index.aman');
	Route::get('/keamanan/{th_lulus}', 'KeamananController@view')->name('view.aman');
	Route::get('/edit/keamanan/{th_lulus}/{id}', 'KeamananController@edit')->name('edit.aman');
	Route::post('/ubah/keamanan/{th_lulus}/{id}','KeamananController@update')->name('update.aman');
	Route::get('/import/keamanan/{th_lulus}', 'KeamananController@import')->name('import.aman');
	Route::post('/keamanan/importExcel/{th_lulus}', 'KeamananController@importExcel');
	Route::get('/keamanan/acc/{th_lulus}/{id}', 'KeamananController@acc')->name('acc.aman');

	//Route tanggungan ijazah dzikrul ghofilin
	Route::get('/dzikrul', 'DzikrulController@index')->name('index.dz');
	Route::get('/dzikrul/{th_lulus}', 'DzikrulController@view')->name('view.dz');
	Route::get('/edit/dzikrul/{th_lulus}/{id}', 'DzikrulController@edit')->name('edit.dz');
	Route::post('/ubah/dzikrul/{th_lulus}/{id}','DzikrulController@update')->name('update.dz');
	Route::get('/import/dzikrul/{th_lulus}', 'DzikrulController@import')->name('import.dz');
	Route::post('/dzikrul/importExcel/{th_lulus}', 'DzikrulController@importExcel'); 

	//Route tanggungan ijazah paper
	Route::get('/paper', 'PaperController@index')->name('index.paper');
	Route::get('/paper/{th_lulus}', 'PaperController@view')->name('view.paper');
	Route::get('/edit/paper/{th_lulus}/{id}', 'PaperController@edit')->name('edit.paper');
	Route::post('/ubah/paper/{th_lulus}/{id}','PaperController@update')->name('update.paper');
	Route::get('/import/paper/{th_lulus}', 'PaperController@import')->name('import.paper');
	Route::post('/paper/importExcel/{th_lulus}', 'PaperController@importExcel'); 

	//Route tanggungan ijazah pondok
	Route::get('/pondok', 'PondokController@index')->name('index.pondok');
	Route::get('/pondok/{th_lulus}', 'PondokController@view')->name('view.pondok');
	Route::get('/edit/pondok/{th_lulus}/{id}', 'PondokController@edit')->name('edit.pondok');
	Route::post('/ubah/pondok/{th_lulus}/{id}','PondokController@update')->name('update.pondok');
	Route::get('/import/pondok/{th_lulus}', 'PondokController@import')->name('import.pondok');
	Route::post('/pondok/importExcel/{th_lulus}', 'PondokController@importExcel');
	Route::get('/pondok/acc/{th_lulus}/{id}', 'PondokController@acc')->name('acc.pondok');

	//Route tanggungan ijazah perpus
	Route::get('/perpus', 'TgPerpusController@index')->name('index.perpus');
	Route::get('/perpus/{th_lulus}', 'TgPerpusController@view')->name('view.perpus');
	Route::get('/acc/{th_lulus}/{id}', 'TgPerpusController@acc')->name('perpus.accepted');
	Route::get('/edit/perpus/{th_lulus}/{id}', 'TgPerpusController@edit')->name('edit.perpus');
	Route::post('/ubah/perpus/{th_lulus}/{id}','TgPerpusController@update')->name('ubah.perpus');
	Route::get('/import/perpus/{th_lulus}', 'TgPerpusController@import')->name('upload.perpus');
	Route::post('/perpus/importExcel/{th_lulus}', 'TgPerpusController@importExcel');

	//Route ketuntasan tanggungan ijazah
	Route::get('/ijazah', 'IjazahController@index')->name('index.ijazah');
	Route::get('/ijazah/{th_lulus}', 'IjazahController@view')->name('view.ijazah');
	Route::get('/acc/perpus/{th_lulus}/{id}', 'IjazahController@accperpus')->name('perpus.acc');
	Route::get('/acc/keamanan/{th_lulus}/{id}', 'IjazahController@accaman')->name('aman.acc');
	Route::get('/acc/pondok/{th_lulus}/{id}', 'IjazahController@accpondok')->name('pondok.acc');
	Route::post('/ubah/ijazah/{th_lulus}/{id}','IjazahController@update')->name('update.ijazah');
});

Route::group(['prefix' => 'guru',  'middleware' => 'is_user'], function(){
	// Route dashboard 
	Route::get('/home', 'GuruController@index')->name('guruhome');
	// Route profil guru
	Route::get('/profil/{id}', 'GuruController@edit')->name('profil.guru');
	Route::post('/update/{id}','GuruController@update')->name('update.guru');
	Route::post('/update/foto/{id}','GuruController@updatefoto')->name('foto.guru');
	Route::post('/update/pw/{id}','GuruController@updatepw')->name('pw.guru');
	// Route Rekap KH
	Route::get('/rekap/{id}', 'GuruController@rekap')->name('rekap.guru');
	Route::post('/rekap/{r_id}/{uji_id}', 'GuruController@updatenilai')->name('edit.rekap');
	// Route wali kelas
	Route::get('/kelas/{id}', 'GuruController@kelas')->name('kelas.guru');
	Route::get('/rekap/kh/kelas/{id}', 'GuruController@rekap_kelas')->name('rekap.kelas');
	Route::get('/ceklist/kelas/{id}', 'GuruController@ceklist')->name('ceklist.kelas');
	Route::post('/ceklist/{tg_id}/{k_id}', 'GuruController@updateceklist')->name('edit.ceklist');
});

Route::group(['prefix' => 'panitia',  'middleware' => 'is_panitia'], function(){
	Route::get('/home', 'HomeController@index')->name('panitiahome');

	// Route profil panitia
	Route::get('/profil/{id}', 'PanitiaController@edit')->name('profil.panitia');
	Route::post('/update/{id}','PanitiaController@update')->name('update.panitia');
	Route::post('/update/foto/{id}','PanitiaController@updatefoto')->name('foto.panitia');
	Route::post('/update/pw/{id}','PanitiaController@updatepw')->name('pw.panitia');

	Route::get('/ceklist', 'PanitiaController@ceklist')->name('ceklist.panitia');
	Route::post('/ceklist/{tg_id}', 'PanitiaController@updateceklist')->name('ceklist.update');
});

Route::group(['prefix' => 'perpus',  'middleware' => 'is_perpus'], function(){
	Route::get('/home', 'PerpusController@index')->name('perpushome');

	// Route profil perpus
	Route::get('/profil/{id}', 'PerpusController@edit')->name('profil.perpus');
	Route::post('/update/{id}','PerpusController@update')->name('update.perpus');
	Route::post('/update/foto/{id}','PerpusController@updatefoto')->name('foto.perpus');
	Route::post('/update/pw/{id}','PerpusController@updatepw')->name('pw.perpus');

	// Route Rekap Tanggungan Perpus
	Route::get('/tanggungan/{id}', 'PerpusController@tanggungan')->name('tanggungan.perpus');
	Route::get('/import/tanggungan/{th_lulus}', 'PerpusController@import')->name('import.perpus');
	Route::post('/importExcel/{th_lulus}', 'PerpusController@importExcel'); 
	Route::get('/edit/tanggungan/{th_lulus}/{id}', 'PerpusController@edit_tg')->name('edit.tg_perpus');
	Route::post('/ubah/tanggungan/{th_lulus}/{id}','PerpusController@update_tg')->name('update.tg');
	Route::get('/acc/{th_lulus}/{id}', 'PerpusController@acc')->name('acc.perpus');
});

Route::group(['prefix' => 'siswa',  'middleware' => 'is_siswa'], function(){
	Route::get('/home', 'HomeController@siswa')->name('siswahome');

	// Route profil siswa
	Route::get('/profil/{id}', 'AkunSiswaController@edit')->name('profil.siswa');
	Route::post('/update/foto/{id}','AkunSiswaController@updatefoto')->name('foto.siswa');
	Route::post('/update/pw/{id}','AkunSiswaController@updatepw')->name('pw.siswa');

	//Route Ijazah
	Route::get('/ijazah/{id}', 'AkunSiswaController@ijazah')->name('ijazah.siswa');
	Route::post('/update/ijazah/{id}','AkunSiswaController@updatetg')->name('tg.siswa');
	Route::get('/template/sp', 'AkunSiswaController@download')->name('download.sp'); 
});

Route::group(['prefix' => 'keamanan',  'middleware' => 'is_keamanan'], function(){
	Route::get('/home', 'KeamananController@home')->name('keamananhome');

	// Route profil keamanan
	Route::get('/profil/{id}', 'KeamananController@profil')->name('profil.keamanan');
	Route::post('/update/foto/{id}','KeamananController@updatefoto')->name('foto.keamanan');
	Route::post('/update/pw/{id}','KeamananController@updatepw')->name('pw.keamanan');

	// Route Rekap Tanggungan Keamanan
	Route::get('/tanggungan/{id}', 'KeamananController@tanggungan')->name('tanggungan.keamanan');
	Route::post('/ubah/ijazah/{th_lulus}/{id}','KeamananController@ijazah')->name('ijazah.keamanan');
	Route::get('/acc/{th_lulus}/{id}', 'KeamananController@accaman')->name('keamanan.acc');
});

Route::group(['prefix' => 'pondok',  'middleware' => 'is_pondok'], function(){
	Route::get('/home', 'PondokController@home')->name('pondokhome');

	// Route profil pondok
	Route::get('/profil/{id}', 'PondokController@profil')->name('profil.pondok');
	Route::post('/update/foto/{id}','PondokController@updatefoto')->name('foto.pondok');
	Route::post('/update/pw/{id}','PondokController@updatepw')->name('pw.pondok');

	// Route Rekap Tanggungan Keamanan
	Route::get('/tanggungan/{id}', 'PondokController@tanggungan')->name('tanggungan.pondok');
	Route::post('/ubah/ijazah/{th_lulus}/{id}','PondokController@ijazah')->name('ijazah.pondok');
	Route::get('/acc/{th_lulus}/{id}', 'PondokController@accpondok');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
