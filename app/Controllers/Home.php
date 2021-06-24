<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if($this->session->userData['id_level'] == 0){
			return view('/Level0/Index');
		}else{
			
		}
	}
}
