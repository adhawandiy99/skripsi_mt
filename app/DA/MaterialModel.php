<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class MaterialModel
{
	const TABLE = 'material';
  public static function getMaterialById($id)
  {
    return DB::table(self::TABLE)->where('ID_Sistem', $id)->first();
  }
  public static function getMaterialByOrderId($id)
  {
    return DB::table('pemakaian_mtr')->leftJoin('material', 'pemakaian_mtr.Material_ID', '=', 'material.ID_Sistem')->where('Master_Order_ID', $id)->get();
  }
  public static function getAll()
  {
    return DB::table(self::TABLE)->get();
  }
  public static function delete($id)
  {
    return DB::table(self::TABLE)->where('ID_Sistem', $id)->delete();
  }
  public static function insertOrUpdate($id, $req)
  {
    $exist = self::getMaterialById($id);
    if($exist){
      DB::table(self::TABLE)
      ->where("ID_Sistem" , $id)
      ->update([
          "Nama_Material" => $req->Nama_Material,
          "Satuan" 				=> $req->Satuan,
          "Deskripsi" 		=> $req->Deskripsi
      ]);
    }else{
      DB::table(self::TABLE)
      ->insert([
          "Nama_Material" => $req->Nama_Material,
          "Satuan" 				=> $req->Satuan,
          "Deskripsi" 		=> $req->Deskripsi
      ]);
    }
  }
}
