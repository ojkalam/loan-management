<?php
/**
*Session Class - Control sesssions of users
**/
class Session{
	 public static function init(){
	  	if (version_compare(phpversion(), '5.4.0', '<')) {
	        if (session_id() == '') {
	            session_start();
	        }
	    } else {
	        if (session_status() == PHP_SESSION_NONE) {
	            session_start();
	        }
	    }
	 }

	 public static function set($key, $val){
	 	 $_SESSION[$key] = $val;
	 }

	 public static function get($key){
	    if (isset($_SESSION[$key])) {
		  return $_SESSION[$key]; 
		}else {
		  return false;
	    }
	 }

	 public static function checkSession(){
		  self::init();
		  if (self::get("userlogin")== false) {
		   self::destroy();
		   header("Location:signin.php");
		  }
	 }

	 public static function checkLogin(){
		  self::init();
		  if (self::get("userlogin")== true) {
		   header("Location:index.php");
		  }
	 }

	 public static function destroy(){
		    session_unset();
		    session_destroy();
	 }


//end of Session class
}