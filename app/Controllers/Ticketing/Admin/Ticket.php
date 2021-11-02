<?php

namespace App\Controllers\Ticketing\Admin;

use App\Controllers\BaseController;
use App\Models\TicketBoughtModel;
use App\Models\TicketCategoryModel;
use App\Models\TicketSubCategoryModel;
use App\Models\TicketInvoiceModel;
use App\Models\TicketInvoiceDetailModel;
use App\Models\TicketPaymentModel;
use Picqer\Barcode\BarcodeGeneratorJPG;

class Ticket extends BaseController
{


	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function GetTicket()
	{
		$ticketCategoryModel = new TicketCategoryModel();


		$ticketCategory = $ticketCategoryModel->select('ticket_category.id AS id_category, ticket_category.nama AS nama_category, ticket_sub_category.*')
			->join('ticket_sub_category', 'ticket_sub_category.id_ticket_category = ticket_category.id', 'left')
			->get()
			->getResult();

		return json_encode($ticketCategory);
	}

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

	public function StoreCategory()
	{
		$categoryModel = new TicketCategoryModel();

		$nama = $this->request->getVar('nama');
		$tanggal = $this->request->getVar('tanggal');
		$start = $this->request->getVar('start');
		$end = $this->request->getVar('end');
		$kuota = $this->request->getVar('kuota');
		$location = $this->request->getVar('location');
		$locationLink = $this->request->getVar('location_link');



		$data = [
			'nama' => $nama,
			'tanggal' => $tanggal,
			'start' => $start,
			'end' => $end,
			'kuota' => $kuota,
			'location' => $location,
			'location_link' => $locationLink,
		];
		$categoryModel->insert($data);

		return json_encode('success');
	}

	public function StoreSubCategory()
	{
		$subCategoryModel = new TicketSubCategoryModel();

		$idCategory = $this->request->getVar('id_category');
		$nama = $this->request->getVar('nama');
		$harga = $this->request->getVar('harga');

		$data = [
			'id_ticket_category' => $idCategory,
			'nama' => $nama,
			'harga' => $harga,
		];;
		$subCategoryModel->insert($data);

		return json_encode('success');
	}

	public function GetWaitingInvoice()
	{
		$invoiceModel = new TicketInvoiceModel();

		$result = $invoiceModel->select('*')
			->where('status', 'waiting')
			->get()->getResult();

		return json_encode($result);
	}
	
	public function GetVerifiedInvoice()
	{
		$invoiceModel = new TicketInvoiceModel();

		$result = $invoiceModel->select('*')
			->where('status', 'verified')
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

		$paymentDetail = null;
		if ($invoice->status != 'unpaid') {
			$paymentModel = new TicketPaymentModel();
			$paymentDetail = $paymentModel->select('*')->where('id_invoice', $id)->get()->getResult();
		}

		$result = [
			'invoice' => $invoice,
			'detail' => $invoiceDetail,
			'payment' => $paymentDetail,

		];

		return json_encode($result);
	}

	public function ConfirmPayment()
	{
		$invoiceId = $this->request->getVar('id_invoice');

		$invoiceModel = new TicketInvoiceModel();
		$data = [
			'status' => 'verified',
		];
		$invoiceModel->update($invoiceId, $data);

		// adding barcode to Ticket Bought Table
		$invoiceDetailModel = new TicketInvoiceDetailModel();
		$boughtTicketModel = new TicketBoughtModel();
		$boughtTicket = $invoiceDetailModel->select('*')->where('id_invoice', $invoiceId)->get()->getResult();
		foreach ($boughtTicket as $x) {
			$generator = new BarcodeGeneratorJPG();

			file_put_contents($x->id_ticket_bought . '.jpg', $generator->getBarcode($x->id_ticket_bought, $generator::TYPE_CODE_128));
			$barcodePath = '/assets/boughtTicket/' . $x->id_ticket_bought . '.jpg';
			// move barcode file from original directories
			rename($x->id_ticket_bought . '.jpg', 'assets/boughtTicket/' . $x->id_ticket_bought . '.jpg');
			$updateBarcode = [
				'bar_code' => $barcodePath,
				'status' => 'verified',
			];
			$boughtTicketModel->update($x->id_ticket_bought, $updateBarcode);
		}

		return json_encode('success');
	}

	public function RevokePayment(){
		$invoiceId = $this->request->getVar('id_invoice');

		$invoiceModel = new TicketInvoiceModel();
		$data = [
			'status' => 'waiting',
		];
		$invoiceModel->update($invoiceId, $data);

		// adding barcode to Ticket Bought Table
		$invoiceDetailModel = new TicketInvoiceDetailModel();
		$boughtTicketModel = new TicketBoughtModel();
		$boughtTicket = $invoiceDetailModel->select('*')->where('id_invoice', $invoiceId)->get()->getResult();
		foreach ($boughtTicket as $x) {
			unlink('assets/boughtTicket/'.$x->id_ticket_bought . '.jpg');
			$barcodePath = '';
			$updateBarcode = [
				'bar_code' => $barcodePath,
				'status' => 'waiting',
			];
			$boughtTicketModel->update($x->id_ticket_bought, $updateBarcode);
		}

		return json_encode('success');
	}

	public function CountUnpaidInvoice(){
		$ticketUnpaidModel = new TicketInvoiceModel();
		$result = $ticketUnpaidModel->select('*')->where('status', 'unpaid')->countAllResults();
		return json_encode($result);
	}

	public function CountBoughtTicket(){
		$ticketBoughtModel = new TicketBoughtModel();
		$result = $ticketBoughtModel->select('*')->where('status', 'verified')->countAllResults();
		return json_encode($result);
	}

	public function CountTicketInVenue(){
		$ticketBoughtModel = new TicketBoughtModel();
		$result = $ticketBoughtModel->select('*')->where('in_venue', 'yes')->countAllResults();
		return json_encode($result);
	}

	public function GetBoughtTicketDetail(){
		$ticketBoughtModel = new TicketBoughtModel();
		$id = $this->request->getVar('id_ticket_bought');
		$result = $ticketBoughtModel->select('ticket_bought.*, ticket_sub_category.nama AS nama_sub_category, ticket_category.nama AS nama_category')
		->where('ticket_bought.id', $id)
		->join('ticket_sub_category',' ticket_sub_category.id = ticket_bought.id_ticket_sub')
		->join('ticket_category',' ticket_category.id = ticket_sub_category.id_ticket_category')
		->get()->getRow();
		return json_encode($result);
	}

	public function CheckIn(){
		$ticketBoughtModel = new TicketBoughtModel();
		$idBoughtTicket = $this->request->getVar('id_ticket_bought');
		$data = [
			'in_venue' => 'yes',
		];
		$ticketBoughtModel->update($idBoughtTicket, $data);

		return json_encode('success');
	}

	public function DeleteCategory(){
		$categoryModel = new TicketCategoryModel();
		$id = $this->request->getVar('id_ticket_category');
		$categoryModel->delete($id);

		return json_encode('success');
	}

	public function DeleteSubCategory(){
		$subCategoryModel = new TicketSubCategoryModel();
		$id = $this->request->getVar('id_ticket_sub');
		$subCategoryModel->delete($id);

		return json_encode('success');
	}
}
