<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'judul' => 'Selamat Datang Di Aplikasi Perpustakaan',
		];

		echo view('layout/v_header', $data);
		echo view('layout/v_sidebar');
		echo view('layout/v_topbar');
		echo view('home/index', $data);
		echo view('layout/v_footer');
	}
}

	//--------------------------------------------------------------------
