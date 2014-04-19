<?php
	function __autoload($classname)
	{
    	$filename = strtolower("$classname.class.php");
    	require_once($filename);
	}
?>	


<?php	
	error_reporting(E_ALL);

	//creare squadre e gironi
	//GIRONE A
	$gironeA = new Girone("GironeA");
	$gironeA->aggiungiSquadra(new Squadra("Cardinals"));
	$gironeA->aggiungiSquadra(new Squadra("Elephants"));
	$gironeA->aggiungiSquadra(new Squadra("Sharks"));
	$gironeA->aggiungiSquadra(new Squadra("Crusaders"));
	//GIRONE B
	$gironeB = new Girone("GironeB");
	$gironeB->aggiungiSquadra(new Squadra("Grizzlies"));
	$gironeB->aggiungiSquadra(new Squadra("Guelfi"));
	$gironeB->aggiungiSquadra(new Squadra("Barbari"));
	$gironeB->aggiungiSquadra(new Squadra("Legio"));
	//GIRONE C
	$gironeC = new Girone("GironeC");
	$gironeC->aggiungiSquadra(new Squadra("Angels"));
	$gironeC->aggiungiSquadra(new Squadra("Hogs"));
	$gironeC->aggiungiSquadra(new Squadra("Titans"));
	$gironeC->aggiungiSquadra(new Squadra("Neptunes"));
	//GIRONE D
	$gironeD = new Girone("GironeD");
	$gironeD->aggiungiSquadra(new Squadra("Blacks"));
	$gironeD->aggiungiSquadra(new Squadra("Daemons"));
	$gironeD->aggiungiSquadra(new Squadra("Skorpions"));
	$gironeD->aggiungiSquadra(new Squadra("BlueStorms"));
	$gironeD->aggiungiSquadra(new Squadra("Frogs"));
	//GIRONE E
	$gironeE = new Girone("GironeE");
	$gironeE->aggiungiSquadra(new Squadra("Muli"));
	$gironeE->aggiungiSquadra(new Squadra("Draghi"));
	$gironeE->aggiungiSquadra(new Squadra("Islanders"));
	$gironeE->aggiungiSquadra(new Squadra("Cavaliers"));
	//GIRONE F
	$gironeF = new Girone("GironeF");
	$gironeF->aggiungiSquadra(new Squadra("Mastini"));
	$gironeF->aggiungiSquadra(new Squadra("Redskins"));
	$gironeF->aggiungiSquadra(new Squadra("Saints"));
	$gironeF->aggiungiSquadra(new Squadra("Hurricanes"));

	$game = $_POST["game"];
	$campionato = new Campionato();
	$campionato->aggiungiGirone($gironeA);
	$campionato->aggiungiGirone($gironeB);
	$campionato->aggiungiGirone($gironeC);
	$campionato->aggiungiGirone($gironeD);
	$campionato->aggiungiGirone($gironeE);
	$campionato->aggiungiGirone($gironeF);
	
	foreach($game as $partita)
	{
		$hometeam = "";		
		if($campionato->getTeamByName(strtolower($partita["hometeam"]), $hometeam)) echo "hometeam ".$partita["hometeam"]." not found <br />";
		$awayteam = "";
		if($campionato->getTeamByName(strtolower($partita["awayteam"]), $awayteam)) echo "awayteam ".$partita["awayteam"]."not found <br />";
		
		$nuova_partita = new Partita($hometeam, $awayteam);
		$hometeam->addPartita($nuova_partita);
		$awayteam->addPartita($nuova_partita);
		$nuova_partita->setPunteggio($partita["hometeam-score"], $partita["awayteam-score"]);
	}
?>

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
					<p>
<?php	
	
	
	echo $campionato->stampaClassifica();
	echo $campionato->stampaClassificaTesteDiSerie();
?>

					</p>
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

	
<?php	
	//codice per le prove	
	/*echo $gironeB->stampaClassifica();
	echo $gironeC->stampaClassifica();
	echo $gironeD->stampaClassifica();
	echo $gironeE->stampaClassifica();
	echo $gironeF->stampaClassifica();*/
	
	/*
	$team1 = new Squadra("TEAM1");
	$team2 = new Squadra("TEAM2");
	$team3 = new Squadra("TEAM3");
	
	$partita1 = new Partita($team1,$team2);
	$partita2 = new Partita($team2,$team3);
	$partita3 = new Partita($team3,$team1);
	$partita4 = new Partita($team2,$team1);
	$partita5 = new Partita($team3,$team2);
	$partita6 = new Partita($team1,$team3);
	
	$team1->addPartita($partita1);
	$team2->addPartita($partita1);
	$team1->addPartita($partita4);
	$team2->addPartita($partita4);
	
	$team2->addPartita($partita2);
	$team3->addPartita($partita2);
	$team2->addPartita($partita5);
	$team3->addPartita($partita5);
	
	$team3->addPartita($partita3);
	$team1->addPartita($partita3);
	$team3->addPartita($partita6);
	$team1->addPartita($partita6);
	
	$partita1->setPunteggio(10, 2);
	$partita2->setPunteggio(10, 2);
	$partita3->setPunteggio(12, 5);
	$partita4->setPunteggio(12, 5);
	$partita5->setPunteggio(5, 12);
	$partita6->setPunteggio(12, 5);
	
	echo "vittorie team 1: ".$team1->calcolaVittorie()." su ".$team1->partiteGiocate()." partite giocate <br />";
	echo "vittorie team 2: ".$team2->calcolaVittorie()." su ".$team2->partiteGiocate()." partite giocate <br />";	
	
	$girone = new Girone("primo girone");
	$girone->aggiungiSquadra($team1);
	$girone->aggiungiSquadra($team2);
	$girone->aggiungiSquadra($team3);
	
	$girone->ordinaClassifica();
	echo $girone->stampaClassifica();
	
	$primo;
	$secondo;
	$girone->primeClassificate($primo, $secondo);
	$tds = new TesteDiSerie();
	$tds->aggiungiSquadra($primo);
	$tds->aggiungiSquadra($secondo);
	$tds->ordinaClassifica();
	echo $tds->stampaClassifica();*/
?>
