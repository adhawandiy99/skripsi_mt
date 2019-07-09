<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;
class HomeController extends Controller
{
	public function index(){
		$totalorder = DB::table('master_order')->count();
		$totalselesai = DB::table('master_order')->where('Status', 'Selesai')->count();
		$totalpending = DB::table('master_order')->where('Status', 'Pending')->count();
		$selesai = $totalselesai ? $totalselesai/$totalorder*100 : $totalselesai;
		$pending = $totalpending ? $totalpending/$totalorder*100 : $totalpending;
		$data = array("selesai"=>$selesai,"pending"=>$pending);
		$date = date('Y-m-d');
		$chart = DB::select("SELECT COUNT(*) AS Total, DATE_FORMAT(Tgl_Status, '%Y-%m-%d') as Tgl_Status, (select count(*) from master_order mo where mo.status='Selesai' and DATE_FORMAT(Tgl_Status, '%Y-%m-%d')= DATE_FORMAT(master_order.Tgl_Status, '%Y-%m-%d')) as Selesai,(select count(*) from master_order mo where mo.status='Pending' and DATE_FORMAT(Tgl_Status, '%Y-%m-%d')= DATE_FORMAT(master_order.Tgl_Status, '%Y-%m-%d')) as Pending FROM `master_order` GROUP BY DATE_FORMAT(Tgl_Status, '%Y-%m-%d') ORDER BY `Tgl_Status` desc limit 0,6");
		$x =['x', 0, 1, 2, 3, 4, 5];
		$pending =['Pending', 0, 0, 0, 0, 0, 0];
		$selesai =['Selesai', 0, 0, 0, 0, 0, 0];
		$no = 6;
		foreach($chart as $c){
			$x[$no]	=	$c->Tgl_Status;
			$pending[$no] = $c->Pending;
			$selesai[$no] = $c->Selesai;
			$no--;
		}
		// dd($x);
		$line = [
            $x,
            $pending,
            $selesai
        ];
		return view('welcome', compact('data', 'line'));
	}
}
