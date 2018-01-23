<?PHP
session_start();//启用SESSION
include '../start.php';

session_destroy();

header("Location:".ADM_URL."/login.php");

