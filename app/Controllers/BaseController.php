<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\InstrukturModel;
use App\Models\LeaderModel;
use App\Models\OperatorModel;
use App\Models\PesertaModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use CodeIgniter\I18n\Time;
use DateTime;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['date'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();

		// Preload Session =============================
		$this->session = session();
		$this->userData = $this->session->get('userData');

		// Get Current Date =============================
		$dateObj = Time::createFromTimestamp(now());
		$this->nowDate = $dateObj->toDateString();
	}

	// Get Id dari Username
	// Level 0 Peserta, Level 1 Operator, Level 2 Instruktur, Level 3 Leader, Level 99 Admin
	public function getId($username){
		$userModel = new UserModel;
		$idLevel = $userModel->_findById($username)->id_level;

		if($idLevel == 0){
			$pesertaModel = new PesertaModel;
			$result = $pesertaModel->_findByUsername($username)[0]->id_peserta;
			return $result;
		}else if($idLevel == 1){
			$operatorModel = new OperatorModel;
			$result = $operatorModel->_findByUsername($username)[0]->id_operator;
			return $result;
		}else if($idLevel == 2){
			$instrukturModel = new InstrukturModel;
			$result = $instrukturModel->_findByUsername($username)[0]->id_instruktur;
			return $result;
		}else if($idLevel == 3){
			$leaderModel = new LeaderModel;
			$result = $leaderModel->_findByUsername($username)[0]->id_leader;
			return $result;
		}else if($idLevel == 99){
			$adminModel = new AdminModel;
			$result = $adminModel->_findByUsername($username);
			return $result;
		}
	}

	public function GetMd5($val){
		if(preg_match('/^[a-f0-9]{32}$/', $val)){
			return $val;
		}else{
			return md5($val);
		}
	}
}
