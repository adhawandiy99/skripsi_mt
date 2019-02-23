<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\OrderModel;
use App\DA\TeknisiModel;

class OrderController extends Controller
{
	public function index(){
		$data = OrderModel::getAll();
		return view('order.list', compact('data'));
	}
	public function input($id){
		$data = OrderModel::getOrderById($id);
		$teknisi = TeknisiModel::getUser4Select2();
		return view('order.form', compact('data', 'teknisi'));
	}
	public function save($id, Request $req){
		//dd($req);
		$data = OrderModel::insertOrUpdate($id, $req);
		return redirect('/order');
	}
	public function delete($id){
		$data = OrderModel::delete($id);
		return redirect('/order');
	}
}
