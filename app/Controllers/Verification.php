<?php

namespace App\Controllers;


class Verification extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function index()
	{
	}

	// VERIFICATION UNDONE ================
	public function Undone(){
		echo view('Verification/Undone');
	}

}