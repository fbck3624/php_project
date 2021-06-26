<?php
session_start();
if(isset($_SESSION["login1"])){
	unset($_SESSION["login1"]);
	}
if(isset($_SESSION["login"])){
unset($_SESSION["login"]);
}

header("Location: login.html");
?>