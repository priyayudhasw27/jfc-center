<?php

namespace App\Controllers;


class TicketingAdmin extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function Dashboard()
	{
		// $adminModel = new AdminModel;

		$alert = $this->session->getFlashdata('alert');
		$userData = $this->session->userData;

		$data = [
			'userData' => $userData,
		];
		
		echo view('/Ticketing/Admin/Dashboard', $data);
	}

}