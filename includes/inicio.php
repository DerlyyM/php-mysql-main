<?php 
require '../config/database.php';

$db = new Database();
$con = $db->conectar();

if($_POST["inicio"])
{
   
}
else
{
 echo"<script>alert('Credenciales invalidas o usuario inactivo.')</script>";
 echo"<script>window.location='../index.php'</script>";
 exit();

}	
?>