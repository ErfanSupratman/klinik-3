<?php
Class Login_model extends CI_Model
{

function login_admin($username, $password){
  if( $username == "admin" && $password == "admin"){
    return true;
  }
  else{
    return false;
  }
}


function login_user($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>