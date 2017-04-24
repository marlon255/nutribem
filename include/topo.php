<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Nutribem</title>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.maskMoney.js"></script>
	<script type="text/javascript" src="assets/js/funcoes.js"></script>
</head>
<?php
	require_once('pags/connect.php');
	require_once('pags/funcoes.php');
?>
<body>
<div class="topo">
	<div class="logo"></div>
	<div class="nome_empresa"><h2>Nutribem - Sistema Interno</h2></div>
	<div class="usuario">Usuário: <?=$_SESSION['login'];?></div>
</div>
