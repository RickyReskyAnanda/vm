<?php
Route::group(['middleware' => ['access-log-user']], function () {
	// Route::get('/', 'Homepage\HomepageController@viewMaintenance');
	Route::get('/', 'Homepage\HomepageController@viewHomepage');
	Route::get('search', 'Homepage\SearchController@viewSearch');
	Route::get('venue/{tipe}/{nama}_{id}', 'Homepage\DetailVenueController@viewVenue');
		Route::post('review/venue','Homepage\DetailVenueController@postReview');

	// -----Support-----
	//menjadi partner
	Route::get('menjadi-partner','Homepage\SupportController@viewMenjadiPartner');
	Route::post('menjadi-partner','Homepage\SupportController@postMenjadiPartner');

	//tentang kami
	Route::get('tentang-kami','Homepage\SupportController@viewTentangKami');
	// Route::post('mahasiswa','Auth\LoginController@login');
	Route::post('login','Auth\LoginController@login');
	Route::get('logout','Auth\LoginController@logout');
	Route::post('daftar','Auth\RegisterController@register');
	Route::get('activation/{key}','Auth\RegisterController@activation');

	// Route::get('kirim-email',function(){
	// 	// Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
	//     $data = ['prize' => 'Peke', 'total' => 3 ];
	 
	//     // "emails.hello" adalah nama view.
	//     Mail::send('emails.users.verifikasi', $data, function ($mail)
	//     {
	//       // Email dikirimkan ke address "momo@deviluke.com" 
	//       // dengan nama penerima "Momo Velia Deviluke"
	//       $mail->to('60200114019@uin-alauddin.ac.id', 'Ricky Resky Ananda');
	 
	//       // Copy carbon dikirimkan ke address "haruna@sairenji" 
	//       // dengan nama penerima "Haruna Sairenji"
	//       // $mail->cc('haruna@sairenji', 'Haruna Sairenji');
	 
	//       $mail->subject('Hello World!');
	//     });
		
	// });
});

Route::group(['middleware' => ['access-log']], function () {
	Route::get('sandwich','Administrator\AdminLoginController@getAdminLogin');
	Route::post('sandwich','Administrator\AdminLoginController@adminAuth');
	Route::get('sandwich/logout','Administrator\AdminLoginController@logout');

	Route::get('sandwich/beranda','Administrator\AdministratorController@viewBeranda');

	Route::get('sandwich/venue','Administrator\VenueController@viewVenue');
	Route::post('sandwich/venue/tambah','Administrator\VenueController@postTambahVenue');

	Route::get('sandwich/venue/detail.{id}','Administrator\VenueController@viewDetailVenue');
	Route::get('sandwich/venue/hapus.{id}','Administrator\VenueController@viewDetailVenue');
		
		Route::post('sandwich/venue/gallery/tambah','Administrator\VenueController@postTambahGalleryVenue');
		Route::post('sandwich/venue/gallery/select-profil','Administrator\VenueController@postSelectGalleryVenue');
		Route::get('sandwich/venue/gallery/show-hide.{id}','Administrator\VenueController@postShowHideGalleryVenue');
		Route::get('sandwich/venue/gallery/hapus.{id}','Administrator\VenueController@postHapusGalleryVenue');

		Route::post('sandwich/venue/paket/tambah','Administrator\VenueController@postTambahPaketVenue');
		Route::post('sandwich/venue/paket/select-profil','Administrator\VenueController@postSelectPaketVenue');
		Route::get('sandwich/venue/paket/show-hide.{id}','Administrator\VenueController@postShowHidePaketVenue');
		Route::get('sandwich/venue/paket/hapus.{id}','Administrator\VenueController@postHapusPaketVenue');

		Route::post('sandwich/venue/operational/edit','Administrator\VenueController@postEditOperationalVenue');

		Route::post('sandwich/venue/fasilitas/tambah','Administrator\VenueController@postTambahFasilitasVenue');
		Route::get('sandwich/venue/fasilitas/show-hide.{id}','Administrator\VenueController@postShowHideFasilitasVenue');
		Route::get('sandwich/venue/fasilitas/hapus.{id}','Administrator\VenueController@postHapusFasilitasVenue');
		//pengaturan data venue
		Route::post('sandwich/venue/pengaturan','Administrator\VenueController@postEditPengaturanVenue');

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
		Route::post('sandwich/venue/ruangan/pengaturan','Administrator\RoomController@postEditPengaturanRuangan');

	Route::get('sandwich/master-data/jenis-venue','Administrator\Master\VenueKindController@viewJenisVenue');
	Route::get('sandwich/master-data/jenis-venue/status_{id}','Administrator\Master\VenueKindController@postStatusJenisVenue');
	Route::post('sandwich/master-data/jenis-venue/tambah','Administrator\Master\VenueKindController@postTambahJenisVenue');
	Route::get('sandwich/master-data/jenis-venue/hapus_{id}','Administrator\Master\VenueKindController@postHapusJenisVenue');

	Route::get('sandwich/master-data/tipe-venue','Administrator\Master\VenueTypeController@viewTipeVenue');
	Route::get('sandwich/master-data/tipe-venue/status_{id}','Administrator\Master\VenueTypeController@postStatusTipeVenue');
	Route::post('sandwich/master-data/tipe-venue/tambah','Administrator\Master\VenueTypeController@postTambahTipeVenue');
	Route::get('sandwich/master-data/tipe-venue/hapus_{id}','Administrator\Master\VenueTypeController@postHapusTipeVenue');

	//tipe ruangan
	Route::get('sandwich/master-data/tipe-ruangan','Administrator\Master\RoomTypeController@viewTipeRuangan');
	Route::get('sandwich/master-data/tipe-ruangan/status_{id}','Administrator\Master\RoomTypeController@postStatusTipeRuangan');
	Route::post('sandwich/master-data/tipe-ruangan/tambah','Administrator\Master\RoomTypeController@postTambahTipeRuangan');
	Route::get('sandwich/master-data/tipe-ruangan/hapus_{id}','Administrator\Master\RoomTypeController@postHapusTipeRuangan');


	Route::get('sandwich/master-data/kategori-kegiatan','Administrator\KategoriVenueController@viewKategori');
	Route::get('sandwich/master-data/data-lokasi','Administrator\DataLokasiController@viewLokasi');

	// user admin
	Route::get('sandwich/master-data/user-admin','Administrator\Master\UserAdminController@viewUser');
	Route::get('sandwich/master-data/user-admin/tambah','Administrator\Master\UserAdminController@viewAddUser');
	Route::post('sandwich/master-data/user-admin/tambah','Administrator\Master\UserAdminController@postAddUser');
	Route::get('sandwich/master-data/user-admin/edit_{id}','Administrator\Master\UserAdminController@viewEditUser');
	Route::post('sandwich/master-data/user-admin/edit','Administrator\Master\UserAdminController@postEditUser');
	Route::get('sandwich/master-data/user-admin/hapus_{id}','Administrator\Master\UserAdminController@postDeleteUser');

	//Home Type
	Route::get('sandwich/master-data/home-type','Administrator\Master\HomeVenueTypeController@viewTipeVenue');
	Route::get('sandwich/master-data/home-type/status_{id}','Administrator\Master\HomeVenueTypeController@postStatusTipeVenue');
	Route::post('sandwich/master-data/home-type/tambah','Administrator\Master\HomeVenueTypeController@postTambahTipeVenue');
	Route::get('sandwich/master-data/home-type/hapus_{id}','Administrator\Master\HomeVenueTypeController@postHapusTipeVenue');

	//user customer
	Route::get('sandwich/pendaftaran-partner','Administrator\PartnerController@viewPartner');
	Route::get('sandwich/users','Administrator\UserController@viewUser');
});