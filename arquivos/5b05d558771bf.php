<?php
	//conexão com servidor de banco de dados 
	$con = mysqli_connect("localhost", "root", "");
	//Seleciona o base de dados para conexão
	mysqli_select_db("userbd", $con);