<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\TeknisiModel;

class TeknisiController extends Controller
{
	public function index(){
		$data = TeknisiModel::getAll();
		return view('teknisi.list', compact('data'));
	}
	public function input($id){
		$data = TeknisiModel::getUserById($id);
		return view('teknisi.form', compact('data'));
	}
	public function save($id, Request $req){
		$data = TeknisiModel::insertOrUpdate($id, $req);
		return redirect('/teknisi');
	}
	public function delete($id){
		$data = TeknisiModel::delete($id);
		return redirect('/teknisi');
	}
}
