<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CMS Sekolahku | CMS (Content Management System) dan PPDB/PMB Online GRATIS
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    2.4.13
 * @author     Adi Septianto | https://facebook.com/adi.richardo.5 | adiseptianto55@gmail.com | 0857 0579 0490
 * @copyright  (c) 2014-2023
 * @link       https://www.mtsn2kotim.sch.id/
 *
 * PERINGATAN :
 * 1. TIDAK DIPERKENANKAN MENGGUNAKAN CMS INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 2. TIDAK DIPERKENANKAN MEMPERJUALBELIKAN APLIKASI INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 3. TIDAK DIPERKENANKAN MENGHAPUS KODE SUMBER APLIKASI.
 */

class Logout extends CI_Controller {

	/**
	 * Class Constructor
	 *
	 * @return Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_users');
	}

	/**
	 * Index
	 * @return Void
	 */
	public function index() {
		if (!$this->auth->hasLogin())
			return redirect(base_url());
		$id = (int) __session('user_id');
		if (!empty($id)) {
			$this->session->sess_destroy();
			$this->m_users->reset_logged_in($id);
		}
		return redirect('login', 'refresh');
	}
 }
