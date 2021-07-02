<?php

namespace App\Controllers;

use App\Models\Peserta_roadshowModel;
use App\Models\RoadshowModel;
use App\Models\UploadsUsageModel;

class Galeri extends BaseController
{
	public function index()
	{
	}

    public function Presentasi1()
	{
        $uploadsUsageModel = new UploadsUsageModel;

        $userData = $this->session->userData;

        // usage data untuk upload foto
        $usageData = $uploadsUsageModel->_findById('usg_0111');

        $data = [
            'usageData' => $usageData,
            'userData' => $userData
        ];
        // print_r($data);
		echo view('Galeri/Level0/Presentasi1/Index', $data);
	}

    public function Presentasi2()
	{
        $uploadsUsageModel = new UploadsUsageModel;

        $userData = $this->session->userData;

        // usage data untuk upload foto
        $usageData = $uploadsUsageModel->_findById('usg_0112');

        $data = [
            'usageData' => $usageData,
            'userData' => $userData
        ];
        // print_r($data);
		echo view('Galeri/Level0/Presentasi2/Index', $data);
	}

    public function GrandJuri()
	{
        $uploadsUsageModel = new UploadsUsageModel;

        $userData = $this->session->userData;

        // usage data untuk upload foto
        $usageData = $uploadsUsageModel->_findById('usg_0241');

        $data = [
            'usageData' => $usageData,
            'userData' => $userData
        ];
        // print_r($data);
		echo view('Galeri/Level0/GrandJuri/Index', $data);
	}

    public function Roadshow()
	{
        $peserta_roadshowModel = new Peserta_roadshowModel;

        $userData = $this->session->userData;
        $idPeserta = $this->getId($userData['username']);

        // usage data untuk upload foto
        $roadshowData = $peserta_roadshowModel->_findByIdPeserta($idPeserta);

        $data = [
            'roadshowData' => $roadshowData,
            'userData' => $userData
        ];
		echo view('Galeri/Level0/Roadshow/Index', $data);
	}
}
