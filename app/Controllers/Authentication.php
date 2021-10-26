<?php

namespace App\Controllers;

use App\Models\OperatorModel;
use App\Models\PesertaModel;
use App\Models\UploadsModel;
use App\Models\UserModel;

class Authentication extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->getFlashdata('errorMessage') != null) {
            $errorAlert = "<div class='alert alert-danger'>" . $session->getFlashdata('errorMessage') . "</div>";
        } elseif ($session->getFlashdata('alert') != null) {
            $errorAlert = "<div class='alert alert-success'>" . $session->getFlashdata('alert') . "</div>";
        } else {
            $errorAlert = "";
        }
        $data = [
            'errorMessage' => $errorAlert,
        ];
        echo view('LoginView', $data);
    }

    // Logging in User ===========================
    public function Login()
    {
        $userModel = new UserModel;
        $pesertaModel = new PesertaModel;
        $uploadsModel = new UploadsModel;

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = md5($this->request->getPost('password'));

            // cek username dan password
            if ($userModel->_auth($username, $password) == 'success') {
                $userData = $userModel->_findById($username);
                // cek siapa yang login ============================
                // cek aktivasi akun
                $active = $userData->active;
                if ($active == 0) {
                    return redirect()->to('/Verification/Undone');
                } else {
                    // set user data ke session

                    foreach ($userData as $x => $y) {
                        $data[$x] = $y;
                    }
                    // get profile photo file name
                    $profilePhoto = $uploadsModel->_getProfilePhoto($data['username']);
                    if (!empty($profilePhoto)) {
                        $data['profilePhoto'] = "/assets/profile-photos/" . $profilePhoto[0]->filepath;
                    } else {
                        $data['profilePhoto'] = "/bootstrap/img/blank-profile.png";
                    }


                    $this->session->set('userData', $data);

                    // get level

                    $level = $this->session->userData['id_level'];
                    // Cek level user
                    if ($level == 0) {
                        return redirect()->to('/Dashboard');
                    } else if ($level == 1) {

                        // get direktorat
                        $operatorModel = new OperatorModel;
                        $result = $operatorModel->_findByUsername($username);
                        $id_direktorat = $result[0]->id_direktorat;

                        // push id direktorat ke session userData
                        $this->session->push('userData', ['id_direktorat' => $id_direktorat]);
                        if ($id_direktorat == 'dir1') {
                            return redirect()->to('/Dashboard');
                        } else {
                            return redirect()->to('/Workshop');
                        }
                    } else if ($level == 2) {
                        return redirect()->to('/Workshop');
                    } else if ($level == 3) {
                        return redirect()->to('/Peserta/DaftarPeserta');
                    } else if ($level == 99) {
                        return redirect()->to('/Dashboard');
                    } else if ($level == 100) {
                        return redirect()->to('/Dashboard');
                    } else if ($level == 4){
                        return redirect()->to('/Ticketing/Penonton/Dashboard');
                    } else if ($level == 5){
                        return redirect()->to('/Ticketing/Admin/Dashboard');
                    }
                }
            } else {
                $this->session->setFlashData('errorMessage', 'Username atau Password salah');
                return redirect()->back();
            }
        }
    }

    // Logout ===========================
    public function Logout()
    {
        $this->session->remove('userData');
        return redirect()->to('/Login');
    }


}
