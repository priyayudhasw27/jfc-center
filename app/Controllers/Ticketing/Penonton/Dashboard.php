<?php

namespace App\Controllers\Ticketing\Penonton;
use App\Controllers\BaseController;


class Dashboard extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function Index()
	{
		// $adminModel = new AdminModel;

		$alert = $this->session->getFlashdata('alert');
		$userData = $this->session->userData;

		$data = [
			'userData' => $userData,
		];
		
		echo view('/Ticketing/Penonton/Dashboard', $data);
	}

}