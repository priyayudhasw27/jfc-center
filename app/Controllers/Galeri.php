<?php

namespace App\Controllers;

use App\Models\UploadsUsageModel;

class Galeri extends BaseController
{
	public function index()
	{
        $uploadsUsageModel = new UploadsUsageModel;

        $userData = $this->session->userData;

        $usageData = $uploadsUsageModel->_getWithoutProfilePhoto();

        $data = [
            'usageData' => $usageData,
            'userData' => $userData
        ];
        // print_r($data);
		echo view('Galeri/Level0/Index', $data);
	}
}
