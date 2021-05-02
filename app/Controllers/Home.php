<?php

namespace App\Controllers;
use App\Models\ModelBarang;
class Home extends BaseController
{
	public function __construct()
	{
		$this->ModelBarang = new ModelBarang();
		helper('number');
		helper('form');
	}
	public function index()
	{
		$data = [
			'title' => 'Daftar Barang',
			'barang' => $this->ModelBarang->getBarang(),
			'cart' => \Config\Services::cart(),
			'isi' => 'v_home'
		];
		echo view ('layout/v_wrapper', $data);
	}
	public function cek()
	{
		$cart = \Config\Services::cart();
		$response = $cart->contents();
		echo '<pre>';
		print_r($response);
		echo '</pre>';
	}
	public function add()
	{
		$cart = \Config\Services::cart();
		$cart->insert(array(
   'id'      => $this->request->getPost('id'),
   'qty'     => 1,
   'price'   => $this->request->getPost('price'),
   'name'    => $this->request->getPost('name'),
   'options' => array(
		 'gambar' => $this->request->getPost('gambar'),
		 'berat' => $this->request->getPost('berat'))
	 ));
	 session()->setflashdata('pesan', 'Barang Berhasil masuk Keranjang');
	 return redirect()->to(base_url('home'));
	}
	public function clear()
	{
		$cart = \Config\Services::cart();
		$cart->destroy();
		session()->setflashdata('pesan', 'Data Keranjang Berhasil di Bersihkan');
 	 	return redirect()->to(base_url('home/cart'));
	}
	public function cart()
	{
		$data = [
			'title' => 'View Cart',
			'cart' => \Config\Services::cart(),
			'isi' => 'v_cart'
		];
		echo view ('layout/v_wrapper', $data);
	}
	public function update()
	{
		$cart = \Config\Services::cart();
		$i = 1;
		foreach ($cart->contents() as $key => $value) {
			$cart->update(array(
			   'rowid'   => $value['rowid'],
			   'qty'     => $this->request->getPost('qty'.$i++),
			));
		}
		session()->setflashdata('pesan', 'Data Keranjang Berhasil di Update');
 	 	return redirect()->to(base_url('home/cart'));
	}
	public function delete($rowid)
	{
		$cart = \Config\Services::cart();
		$cart->remove($rowid);
		session()->setflashdata('pesan', 'Data Keranjang Berhasil di Hapus');
 	 	return redirect()->to(base_url('home/cart'));
	}
}
