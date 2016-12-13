<?php  //conexion base de donnée + verif error
	try
	{
	$bdd = new PDO('mysql:host=localhost;dbname=MkT;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
    die('Erreur : ' . $e->getMessage());
	}
?>