<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title><?php echo $titulo_pagina; ?> - Cardapio Virtual</title>
	<link href="files/css/bootstrap.css" rel="stylesheet" />
	<link href="files/css/estilo.css" rel="stylesheet" />
	<meta charset="utf-8">
</head>
<body>
<div class="container <?php echo $fundo; ?>">
	<!-- Topo do Sistema -->
    <div class="row">
        <div class="topo">
            <a href="?page=home"> CARDÁPIO VIRTUAL </a>
            <a href="?page=<?php echo $pagina; ?>">
                <span class="glyphicon glyphicon-<?php echo $glyphicon; ?>"></span>
            </a>
        </div>    
    </div>