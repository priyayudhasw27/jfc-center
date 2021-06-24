<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\SubKategoriModel;

class Dashboard extends BaseController
{
    public function Index()
    {
        $userData = $this->session->userData;
        if ($userData['id_level'] == 0) {

            // dashboard peserta
            $data = [
                'userData' => $userData,
            ];
            echo view('/Dashboard/Level0/Index', $data);
        } else if ($userData['id_level'] == 1) {

            // dashboard operator
            if ($userData['id_direktorat'] == 'dir1') {

                // dashboard operator rekrutmen
                $kategoriModel = new KategoriModel;
                $subKategoriModel = new SubKategoriModel;

                $kategori = $kategoriModel->_get();
                $subKategoriModel = $subKategoriModel->_get();
                $data = [
                    'kategori' => $kategori,
                    'subKategoriModel' =>$subKategoriModel,
                    'userData' => $userData,
                ];
                echo view('/Dashboard/Level1/Direktorat1/Index', $data);
            } else if ($userData['id_direktorat'] == 'dir2') {

                // dashboard operator workshop
                $data = [
                    'userData' => $userData,
                ];
                echo view('/Dashboard/Level1/Direktorat2/Index', $data);
            } else if ($userData['id_direktorat'] == 'dir3') {

                // dashboard operator pengelompokan
                $data = [
                    'userData' => $userData,
                ];
                echo view('/Dashboard/Level1/Direktorat3/Index', $data);
            }
        } else if ($userData['id_level'] == 2) {

            // dashboard instruktur
            $data = [
                'userData' => $userData,
            ];
            echo view('/Dashboard/Level2/Index', $data);
        } else if ($userData['id_level'] == 3) {

            // dashboard PIC
            $data = [
                'userData' => $userData,
            ];
            echo view('/Dashboard/Level3/Index', $data);
        } else if ($userData['id_level'] == 99) {

            // dashboard Admin
            $data = [
                'userData' => $userData,
            ];
            echo view('/Dashboard/Level99/Index', $data);
        }
    }
}
