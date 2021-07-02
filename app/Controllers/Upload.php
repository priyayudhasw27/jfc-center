<?php

namespace App\Controllers;

use App\Models\UploadsModel;

class Upload extends BaseController
{
	public function Store()
	{
		if ($this->request->getMethod() == 'post') {
			$uploadsModel = new UploadsModel;

			// get ID peserta dan Usage
			$idUsage = $this->request->getPost('id_usage');
			$username = $this->userData['username'];
			// get File
			$file = $this->request->getFile('userFile');
			$fileName = $username . '-' . rand(0123, 9999) . '.jpg';
			$file->move('assets/uploaded/', $fileName);

			$data = [
				'id_uploads' => 'up'.rand(0123,9999),
				'filepath' => $fileName,
				'username' => $username,
				'id_usage' => $idUsage,
			];

			// print_r($data);
			$uploadsModel->_Insert($data);

			$redirectPage = $this->request->getPost('redirectPage');
			return redirect()->to('/Galeri/'.$redirectPage);
		}
	}

	public function GetPhotos()
	{
		if ($this->request->getVar('action') == 'GetPhotos') {
			$uploadsModel = new UploadsModel;

			if($this->request->getVar('username') != null){
				$username = $this->request->getVar('username');
			}else{
				$username = $this->session->userData['username'];
			}
			$idUsage = $this->request->getVar('id_usage');

			$photos = $uploadsModel->_getByIdUsage($username, $idUsage);

			return json_encode($photos);
		}
	}

	public function View()
	{
		if ($this->request->getVar('action') == 'GetView') {
			$uploadsModel = new UploadsModel;

			$idUploads = $this->request->getVar('id_uploads');
			$photo = $uploadsModel->_findById($idUploads);

			return json_encode($photo);
		}
	}

	public function Delete()
	{
		if ($this->request->getVar('action') == 'Delete') {
			$uploadsModel = new UploadsModel;

			$idUploads = $this->request->getVar('id_uploads');
			// $uploadsModel->_delete($idUploads);

			$output = array(
				'status' => 'ok'
			);
			return json_encode($idUploads);
		}
	}

	public function GetTotal(){
		if($this->request->getVar('action') == 'getTotal'){
			$uploadsModel = new UploadsModel;

			$idUsage = $this->request->getVar('id_usage');
			$username = $this->session->userData['username'];

			$count = $uploadsModel->_countPhotoByUsage($idUsage, $username);

			return json_encode($count);
		}
	}
}
