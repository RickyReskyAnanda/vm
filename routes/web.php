<?php
Route::group(['middleware' => ['access-log-user']], function () {
	Route::get('/', 'Homepage\HomepageController@viewHomepage');
	Route::get('search', 'Homepage\SearchController@viewSearch');
	Route::get('venue/{tipe}/{nama}.{id}', 'Homepage\DetailVenueController@viewVenue');
	// Route::post('mahasiswa','Auth\LoginController@login');
	// Route::post('mahasiswa','Auth\LoginController@login');
	// Route::get('mahasiswa/logout','Auth\LoginController@logout');
});

Route::group(['middleware' => ['access-log']], function () {
	Route::get('sandwich','Auth\LoginController@logout');

	Route::get('sandwich/beranda','Administrator\AdministratorController@viewBeranda');

	Route::get('sandwich/venue','Administrator\VenueController@viewVenue');
	Route::post('sandwich/venue/tambah','Administrator\VenueController@postTambahVenue');

	Route::get('sandwich/venue/detail.{id}','Administrator\VenueController@viewDetailVenue');
	Route::get('sandwich/venue/hapus.{id}','Administrator\VenueController@viewDetailVenue');
		
		Route::post('sandwich/venue/gallery/tambah','Administrator\VenueController@postTambahGalleryVenue');
		Route::post('sandwich/venue/gallery/select-profil','Administrator\VenueController@postSelectGalleryVenue');
		Route::get('sandwich/venue/gallery/show-hide.{id}','Administrator\VenueController@postShowHideGalleryVenue');
		Route::get('sandwich/venue/gallery/hapus.{id}','Administrator\VenueController@postHapusGalleryVenue');

		Route::post('sandwich/venue/operational/edit','Administrator\VenueController@postEditOperationalVenue');

		Route::post('sandwich/venue/fasilitas/tambah','Administrator\VenueController@postTambahFasilitasVenue');
		Route::get('sandwich/venue/fasilitas/show-hide.{id}','Administrator\VenueController@postShowHideFasilitasVenue');
		Route::get('sandwich/venue/fasilitas/hapus.{id}','Administrator\VenueController@postHapusFasilitasVenue');

	Route::post('sandwich/venue/ruangan/tambah','Administrator\RoomController@postTambahRuangan');
	Route::post('sandwich/venue/ruangan/hapus','Administrator\RoomController@postHapusRuangan');
	Route::get('sandwich/venue/ruangan/detail.{id}','Administrator\RoomController@viewDetailRuangan');
		/*paket*/
		Route::post('sandwich/venue/ruangan/paket/tambah','Administrator\RoomController@postTambahPaketRuangan');
		Route::get('sandwich/venue/ruangan/paket/show-hide.{id}','Administrator\RoomController@postShowHidePaketRuangan');
		Route::get('sandwich/venue/ruangan/paket/hapus.{id}','Administrator\RoomController@postHapusPaketRuangan');
		/*harga-harga*/
		Route::post('sandwich/venue/ruangan/harga/edit','Administrator\RoomController@postEditHargaRuangan');
		Route::get('sandwich/venue/ruangan/harga/show-hide.{id}','Administrator\RoomController@postShowHideHargaRuangan');
		/*galery*/
		Route::post('sandwich/venue/ruangan/gallery/tambah','Administrator\RoomController@postTambahGalleryRuangan');
		Route::post('sandwich/venue/ruangan/gallery/select-profil','Administrator\RoomController@postSelectGalleryRuangan');
		Route::get('sandwich/venue/ruangan/gallery/show-hide.{id}','Administrator\RoomController@postShowHideGalleryRuangan');
		Route::get('sandwich/venue/ruangan/gallery/hapus.{id}','Administrator\RoomController@postHapusGalleryRuangan');
		/*fasilitas*/
		Route::post('sandwich/venue/ruangan/fasilitas/tambah','Administrator\RoomController@postTambahFasilitasRuangan');
		Route::get('sandwich/venue/ruangan/fasilitas/show-hide.{id}','Administrator\RoomController@postShowHideFasilitasRuangan');
		Route::get('sandwich/venue/ruangan/fasilitas/hapus.{id}','Administrator\RoomController@postHapusFasilitasRuangan');
		/*penggunaan ruangan*/
		Route::post('sandwich/venue/ruangan/penggunaan-ruangan','Administrator\RoomController@postEditPenggunaanRuangan');

	Route::get('sandwich/master-data/kategori-tempat','Administrator\KategoriVenueController@viewKategori');
	Route::get('sandwich/master-data/kategori-kegiatan','Administrator\KategoriVenueController@viewKategori');
	Route::get('sandwich/master-data/data-lokasi','Administrator\DataLokasiController@viewLokasi');
	Route::get('sandwich/master-data/user-admin','Administrator\UserAdminController@viewUserAdmin');
});