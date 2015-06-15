<?php
set_include_path('C:\xampp\htdocs\camp_wifi\inc\phpseclib');

include('Net/SSH2.php');

$host = '192.168.0.246';
$port = 22;

$username = '';
$password = '';

$name = $_REQUEST['name'];
$pwd = $_REQUEST['pass'];


if (!$name or !$pwd) {
	exit('Please provide username and password' . "\n");
}

$ssh = new Net_SSH2($host);
if(!$ssh->login($username, $password)){
	exit('Login Failed');
}

$cmd = $ssh->exec('ip hotspot user add name=' . $name . ' password=' . $pwd);
if(!$cmd){
	echo 'Account created successfully!';
} else{
	echo $cmd;
}
