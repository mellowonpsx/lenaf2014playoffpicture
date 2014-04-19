<?php

class Campionato
{
	private $gironi;
	
	public function __construct()
	{
		$this->gironi = array();
	}
	
	public function aggiungiGirone(&$girone)
	{
		array_push( $this->gironi , $girone);
	}
	
	public function getTeamByName($nome_cercato, &$team)
	{
		foreach ($this->gironi as &$girone)
		{
			$temp_team;
			if(!$girone->getTeamByName($nome_cercato, $temp_team))
			{
				$team = $temp_team;
				return 0;
			}
		}
		return 1;
	}
	
	public function stampaClassifica()
	{
		$lista = "Classifica campionato: <br />";
		foreach ($this->gironi as $girone)
		{
			$lista .= $girone->stampaClassifica();
		}
		return $lista;
	}
	
	public function stampaClassificaTesteDiSerie()
	{
		$tds = new TesteDiSerie();
		foreach ($this->gironi as $girone)
		{
			$primo;
			$secondo;
			$girone->primeClassificate($primo, $secondo);
			$tds->aggiungiSquadra($primo);
			$tds->aggiungiSquadra($secondo);
		}
		$tds->ordinaClassifica();
		$lista = $tds->stampaClassifica();
		return $lista;
	}
}

?>
