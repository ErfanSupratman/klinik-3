<?php 
Class Hp_model extends CI_Model
{
	function login_hp($nik, $password, $imei){
		// SELECT * FROM `pegawai` WHERE `nik` = '".$data['nik']."' AND `password` = '".$data['password']."' AND `imei` = '".$data['imei']."';
		$this -> db -> select('nik, password, imei');
		$this -> db -> from('pegawai');
		$this -> db -> where('username', $username);
		$this -> db -> where('password', $password);
		$this -> db -> where('imei', $imei);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return "0000";
		}
		else
		{
			return "212";
		}
	}


	

}
 ?>