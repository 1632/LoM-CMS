<?php
/*
====================================================
****************************************************
*  _           __  __         _____ __  __  _____  *
* | |         |  \/  |       / ____|  \/  |/ ____| *
* | |     ___ | \  / |______| |    | \  / | (___   *
* | |    / _ \| |\/| |______| |    | |\/| |\___ \  *
* | |___| (_) | |  | |      | |____| |  | |____) | *
* |______\___/|_|  |_|       \_____|_|  |_|_____/  *
*                                                  *
*                -=[VERSION 0.0.1]=-               *
*          BY: LEGEND OF MCPE ORGANIZATION         *
*       GITHUB: HTTP://GITHUB.COM/LEGENDOFMCPE     *
*                                                  *
****************************************************
*/

/**************************************************/
/** DO NOT TOUCH THIS FILE IF YOU DONT KNOW WHAT **/
/** WHAT YOU ARE DOING! IT MAY CAUSE TROUBLE!!   **/
/**************************************************/

/***************************************************
**READ ME. THIS FILE MUST BE INCLUDED TO ALL PAGES**
**EXCEPT THE LOGIN PAGE.****************************
***************************************************/

//Start session
	session_start();
//Check whether the session variable SESS_NAME is present or not
	if(!isset($_SESSION['SESS_NAME']) || (trim($_SESSION['SESS_NAME']) == '')) {
		header("location: login.php");
		exit();
	}
// Connection STUFF
require 'config.php';

// Replace current session ID with a new one
session_regenerate_id(true);

// Uses a strong hash
ini_set('session.hash_function', 'whirlpool');

// Uses a secure connection (HTTPS) if possible
ini_set('session.cookie_secure',1);

// Prevents javascript XSS attacks aimed to steal the session
ini_set('session.cookie_httponly',1);

// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies',1);

// Limit form execution time to 10 seconds
set_time_limit(10);

	if (isset($_SESSION['HTTP_USER_AGENT']) && $_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])){
		session_destroy();
		header("location: login.php");
		exit;
	}
	else
	{
		$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
	}

/*****************************/
/*-----Shortcuts Lists-------*/
/*****************************/

// Session Name
$usr = $_SESSION['SESS_NAME'];

// Session IP
$ip = $_SESSION['SESS_IP'];

/*****************************/

/******[ Directory Checks ]********/
$dirfag = $px."-".$sdir;
$dirfuck = $px."-".$sdir."/".$sdir_key;

	if($sdir !== "" and $sdir_key !== ""){
		if(!file_exists($dirfag)) {
		mkdir($dirfag);
		}
		if(!file_exists($dirfuck)) {
		mkdir($dirfuck);
		}
	}
	
	if($pdir !== ""){
		if(!file_exists($pdir)) {
			echo "PocketMine Directory '<i>$pdir</i>' doesnt exist! Please state the correct directory address at config.php<br /><br />";
		}
		else{
		}
	}
	
	if($dir_path !== ""){
		if(!file_exists($dir_path)){
			echo "Website Directory $dir_path doesnt exist! Please state the correct directory address at config.php<br /><br />";
		}
	}
	echo "copy ". $pdir . " " . $dir_path . $dir_folder . $dirfuck ."<br />";
/***********************************/
?>