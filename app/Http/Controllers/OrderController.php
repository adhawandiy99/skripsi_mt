<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\OrderModel;
use App\DA\TeknisiModel;
use App\DA\MaterialModel;
use DB;
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
	public function detail($id){
		return json_encode(OrderModel::getOrderById($id));
	}
	public function progress($id){
		$data = OrderModel::getOrderById($id);
		$mtr = DB::select('
      SELECT mmp.*,COALESCE(m.Quantity, 0) AS Quantity FROM material mmp 
      LEFT JOIN pemakaian_mtr m ON mmp.ID_Sistem = m.Material_ID
        AND m.Master_Order_ID = ? 
      WHERE 1
      ', [
        $id
      ]);
		// dd($data);
		return view('teknisi.progress', compact('data', 'mtr'));
	}
	public function saveprogress(Request $req, $id){
		$input = 'Foto_Pekerjaan';
    if ($req->hasFile($input)) {
    	//dd('asd');
      $path = public_path().'/storage/';
      if (!file_exists($path)) {
        if (!mkdir($path, 0775, true))
          return 'gagal menyiapkan folder foto evidence';
      }
      $file = $req->file($input);
      try {
      	$nama = $file->getClientOriginalName();
        $moved = $file->move("$path", "$nama");
        DB::table('master_order')->where('ID_Sistem', $id)->update([
					"Foto_Pekerjaan"					=> $nama
				]);
      }
      catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
        return 'gagal menyimpan foto evidence '.$id;
      }
    }
		DB::table('master_order')->where('ID_Sistem', $id)->update([
			"Status"					=> $req->Status
		]);
		DB::table('pemakaian_mtr')->where('Master_Order_ID', $id)->delete();
		foreach(json_decode($req->item) as $item){
			DB::table('pemakaian_mtr')->insert([
				"Material_ID"	 		=> $item->ID_Sistem,
				"Master_Order_ID"	=> $id,
				"Quantity"				=> $item->Quantity
			]);
		}
		return redirect('/inbox_order');
	}
}
