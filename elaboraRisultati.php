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
	$gironeD->aggiungiSquadra(new Squadra("BlueStorm"));
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
		if($campionato->getTeamByName(strtolower($partita["hometeam"]), $hometeam)) echo "hometeam not found <br />";
		$awayteam = "";
		if($campionato->getTeamByName(strtolower($partita["awayteam"]), $awayteam)) echo "awayteam not found <br />";
		
		$nuova_partita = new Partita($hometeam, $awayteam);
		$hometeam->addPartita($nuova_partita);
		$awayteam->addPartita($nuova_partita);
		$nuova_partita->setPunteggio($partita["hometeam-score"], $partita["awayteam-score"]);
	}
	
	echo $campionato->stampaClassifica();
	echo $campionato->stampaClassificaTesteDiSerie();
?>
