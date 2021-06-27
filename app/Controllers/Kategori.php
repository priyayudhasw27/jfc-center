<?php

namespace App\Controllers;

use App\Models\KategoriEventModel;
use App\Models\KategoriModel;
use App\Models\ProvinsiModel;

class Kategori extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function Index()
	{


		return view('/Instruktur/Index');
	}

	// VALIDATION ==============================

	public function GetKategori()
	{
		if ($this->request->getMethod() == 'post') {
			if ($this->request->getVar('action') == 'getGC') {
				$id_kategori = 'GC';
			}else if ($this->request->getVar('action') == 'getWA') {
				$id_kategori = 'WA';
			}else if ($this->request->getVar('action') == 'getWK') {
				$id_kategori = 'WK';
			}
			$kategoriModel = new KategoriModel;
			$data = $kategoriModel->_findById($id_kategori);
			$output = array(
				'kategori' => $data,
			);

			return json_encode($output);
		}
	}
}
