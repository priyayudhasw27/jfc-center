<?php

namespace App\Controllers\Ticketing\Penonton;

use App\Controllers\BaseController;
use App\Models\TicketBoughtModel;
use App\Models\TicketCartModel;
use App\Models\TicketCategoryModel;
use App\Models\TicketInvoiceDetailModel;
use App\Models\TicketInvoiceModel;
use App\Models\TicketPaymentModel;
use App\Models\TicketSeatModel;
use App\Models\TicketSubCategoryModel;

class Ticket extends BaseController
{


	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================

	public function CountCategories()
	{
		$categoryModel = new TicketCategoryModel();

		$result = $categoryModel->select('*')->countAllResults();
		return json_encode($result);
	}

	public function GetCategories()
	{
		$categoryModel = new TicketCategoryModel();

		$categories = $categoryModel->findAll();
		return json_encode($categories);
	}

	public function GetSubCategories()
	{
		$subCategoryModel = new TicketSubCategoryModel();

		$subCategories = $subCategoryModel->findAll();
		return json_encode($subCategories);
	}

	public function AddToCart()
	{
		$selectedTicket = $this->request->getVar('selectedTicket');
		$nama = $this->request->getVar('nama');
		$email = $this->request->getVar('email');
		$nomorHp = $this->request->getVar('nomorHp');
		// $idSeat = $this->request->getVar('id_seat');
		$username = $this->session->userData['username'];

		$cartModel = new TicketCartModel();

		$data = [
			'username' => $username,
			'id_ticket_sub' => $selectedTicket,
			'nama' => $nama,
			'email' => $email,
			'no_hp' => $nomorHp,
		];

		$cartModel->insert($data);
		return json_encode('success');
	}

	public function CountOnCart()
	{
		$username = $this->session->userData['username'];

		$cartModel = new TicketCartModel();

		$result = $cartModel->select('*')->where('username', $username)->countAllResults();
		return json_encode($result);
	}

	public function GetCart()
	{
		$username = $this->session->userData['username'];

		$cartModel = new TicketCartModel();

		$result = $cartModel->select('ticket_category.nama AS nama_category, ticket_category.* , ticket_sub_category.nama AS nama_sub_category, ticket_sub_category.harga AS harga, ticket_cart.*')->where('username', $username)
			->join('ticket_sub_category', 'ticket_sub_category.id = ticket_cart.id_ticket_sub')
			->join('ticket_category', 'ticket_category.id = ticket_sub_category.id_ticket_category')
			->get()
			->getResult();
		return json_encode($result);
	}

	public function DeleteCart()
	{
		$cartModel = new TicketCartModel();
		$idCart = $this->request->getVar('id_cart');
		$cartModel->delete($idCart);
		return json_encode('success');
	}

	public function CheckOut()
	{
		$username = $this->session->userData['username'];
		$invoiceModel = new TicketInvoiceModel();
		$invoiceDetailModel = new TicketInvoiceDetailModel();
		$ticketBoughtModel = new TicketBoughtModel();
		$subCategoryModel = new TicketSubCategoryModel;

		$idSubCategory = $this->request->getVar('id_ticket_sub');
		$nama = $this->request->getVar('nama');
		$email = $this->request->getVar('email');
		$noHp = $this->request->getVar('no_hp');
		$invoiceID = rand(0, 999999);

		$hargaTicket = $subCategoryModel->select('harga')->where('id', $idSubCategory)->get()->getResult();
		$uniqueCode = rand(100, 200);
		$totalHarga = $hargaTicket[0]->harga + $uniqueCode;

		$expiredDate = date("Y-m-d H:i:s", strtotime('+1 hour', time()));

		$invoiceData = [
			'id' => $invoiceID,
			'username' => $username,
			'total' => $totalHarga,
			'unique_code' => $uniqueCode,
			'created_at' => date('Y-m-d'),
			'expired_date' => $expiredDate,
			'status' => 'unpaid',
		];

		$invoiceModel->insert($invoiceData);

		$boughtTicketId = rand(0, 999999);
		$boughtTicketData = [
			'id' => $boughtTicketId,
			'username' => $username,
			'id_ticket_sub' => $idSubCategory,
			'nama' => $nama,
			'email' => $email,
			'no_hp' => $noHp,
		];
		$ticketBoughtModel->insert($boughtTicketData);
		$invoiceDetailData = [
			'id_invoice' => $invoiceID,
			'id_ticket_bought' => $boughtTicketId,
		];
		$invoiceDetailModel->insert($invoiceDetailData);



		return json_encode($invoiceID);
	}



	//  INVOICE SECTION ===========================================================

	public function CountInvoice()
	{
		$status = $this->request->getVar('status');
		$where = isset($status) ? $status : '';

		$invoiceModel = new TicketInvoiceModel();
		$result = $invoiceModel->select('*')
			->where('username', $this->session->userData['username'])
			->where('status', $where)
			->countAllResults();

		return json_encode($result);
	}

	public function GetInvoice()
	{
		$username = $this->session->userData['username'];

		$invoiceModel = new TicketInvoiceModel();

		$result = $invoiceModel->select('*')
			->where('ticket_invoice.username', $username)
			->orderBy('created_at', 'DESC')
			->get()->getResult();

		return json_encode($result);
	}

	public function GetInvoiceDetail()
	{
		$invoiceModel = new TicketInvoiceModel();
		$invoiceDetailModel = new TicketInvoiceDetailModel();
		$id = $this->request->getVar('id_invoice');

		// get the invoice data after insertion
		$invoice = $invoiceModel->find($id);
		$invoiceDetail = $invoiceDetailModel->select('ticket_category.nama AS nama_category, ticket_sub_category.*, ticket_bought.nama AS nama_pemilik, ticket_invoice_detail.id_ticket_bought AS id_ticket_bought')
			->where('id_invoice', $id)
			->join('ticket_bought', 'ticket_bought.id = ticket_invoice_detail.id_ticket_bought')
			->join('ticket_sub_category', 'ticket_sub_category.id = ticket_bought.id_ticket_sub')
			->join('ticket_category', 'ticket_category.id = ticket_sub_category.id_ticket_category')
			->get()
			->getResult();

		$result = [
			'invoice' => $invoice,
			'detail' => $invoiceDetail,
		];

		return json_encode($result);
	}

	public function UploadPayment()
	{
		$invoiceId = $this->request->getVar('invoiceId');
		$username = $this->session->userData['username'];
		$created_at = date('Y-m-d');
		// get File
		$file = $this->request->getFile('payment');
		$fileName = $invoiceId . '.jpg';
		$file->move('assets/payment/', $fileName);

		$paymentModel = new TicketPaymentModel();
		$ticketBoughtModel = new TicketBoughtModel();

		$data = [
			'id_invoice' => $invoiceId,
			'username' => $username,
			'bukti_pembayaran' => $fileName,
			'created_at' => $created_at,
		];

		$paymentModel->insert($data);

		$invoiceModel = new TicketInvoiceModel();
		$data = [
			'status' => 'waiting'
		];
		$invoiceModel->update($invoiceId, $data);

		$idTicketBought = $invoiceModel->select('ticket_bought.id')
			->where('ticket_invoice.id', $invoiceId)
			->join('ticket_invoice_detail', 'ticket_invoice_detail.id_invoice = ticket_invoice.id')
			->join('ticket_bought', 'ticket_bought.id = ticket_invoice_detail.id_ticket_bought')
			->get()
			->getResult();
		$ticketBoughtModel->update($idTicketBought[0]->id, $data);

		return redirect()->back();
	}

	function GetBoughtTicket()
	{
		$ticketBoughtModel = new TicketBoughtModel();
		$username = $this->session->userData['username'];
		$result = $ticketBoughtModel->select('ticket_bought.*, ticket_sub_category.nama AS nama_sub_category, ticket_category.nama AS nama_category')
			->where('username', $username)
			->where('ticket_bought.status', 'verified')
			->join('ticket_sub_category', ' ticket_sub_category.id = ticket_bought.id_ticket_sub')
			->join('ticket_category', ' ticket_category.id = ticket_sub_category.id_ticket_category')
			->get()->getResult();
		return json_encode($result);
	}

	function CountBoughtTicket()
	{
		$ticketBoughtModel = new TicketBoughtModel();
		$username = $this->session->userData['username'];
		$result = $ticketBoughtModel->select('*')
			->where('username', $username)
			->where('status', 'verified')
			->countAllResults();
		return json_encode($result);
	}

	function GetBoughtTicketDetail()
	{
		$ticketBoughtModel = new TicketBoughtModel();
		$id = $this->request->getVar('id_ticket_bought');
		$result = $ticketBoughtModel->select('ticket_bought.*, ticket_bought.nama AS nama_pemilik, ticket_bought.id AS id_ticket, ticket_sub_category.nama AS nama_sub_category, ticket_category.*, ticket_category.nama AS nama_category')
			->where('ticket_bought.id', $id)
			->join('ticket_sub_category', ' ticket_sub_category.id = ticket_bought.id_ticket_sub')
			->join('ticket_category', ' ticket_category.id = ticket_sub_category.id_ticket_category')
			->get()->getRow();
		return json_encode($result);
	}

	public function GetSeat()
	{
		$seatModel = new TicketSeatModel();
		$subCategoryModel = new TicketSubCategoryModel();

		$idSubCategory = $this->request->getVar('id_sub_category');

		$idStudio = $subCategoryModel->find($idSubCategory);

		$result = $seatModel->select('ticket_seat.*, ticket_seat.status AS seat_status, ticket_studio.nama AS nama_studio')
			->where('id_studio', $idStudio->id_ticket_studio)
			->join('ticket_studio', 'ticket_studio.id = ticket_seat.id_studio')
			->get()
			->getResult();
		return json_encode($result);
	}
}
