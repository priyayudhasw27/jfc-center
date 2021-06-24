<?php

namespace App\Controllers;

use App\Models\KategoriEventModel;
use App\Models\KategoriModel;
use App\Models\ProvinsiModel;
use App\Models\SubKategoriModel;

class SubKategori extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function index()
	{
	}

	// VALIDATION ==============================

	public function GetSubKategori()
	{
		if ($this->request->getMethod() == 'post') {
			if ($this->request->getVar('action') == 'GetSubKategori') {
				$subKategoriModel = new SubKategoriModel;

				$subKategoriData = $subKategoriModel->_get();
			}
			$output = array(
				'subKategori' => $subKategoriData,
			);

			return json_encode($output);
		}
	}
}
