<?php

namespace App\Controllers\Ticketing\Admin;
use App\Controllers\BaseController;


class Portal extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function Index()
	{
		$userData = $this->session->userData;

		$data = [
			'userData' => $userData,
		];
		
		echo view('/Ticketing/Admin/Portal', $data);
	}

}