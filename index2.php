<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>LENAF 2014 Playoff Picture</title>
		<meta name="description" content="">
		<meta name="author" content="mellowonpsx">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<style>
			.scorebox
			{
				width: 30px;
				text-align: center;				
			}
			input
			{ 
         		text-align: center; 
         	} 
		</style>
	</head>

	<body>
		<div>
			<header>
				<h1>LENAF 2014 Playoff Picture</h1>
			</header>
			<nav>
				<p>
					<a href="/index2.php">Home</a>
				</p>
			</nav>

			<div>
				<p> DISCLAIMER: questo simulatore è un prodotto artigianale, in nessun modo collegato alla lega, i dati forniti da questo simulatore non hanno alcun valore. </p>
				<p> FUNZIONI NON IMPLEMENTATE: Calcolo dei tiebreak del girone </p>
				<p> FUNZIONI NON IMPLEMENTATE: Calcolo dei tiebreak delle teste di serie </p>
			</div>
			<div>
				<h2> Partite: </h2>
				<div>
					<form id="risultati" action="elaboraRisultati.php" method="post">
						<?php
						// file che contiene le inputbox
						include_once("input_data.php");
						?>									
						<input type="submit" value="elabora i risultati" />
					</form>
				</div>
			</div>
			<footer>
				<p>
					&copy; Copyright  by mellowonpsx
				</p>
			</footer>
		</div>
	</body>
</html>
