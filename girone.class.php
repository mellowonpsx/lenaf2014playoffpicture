<?php

class Girone
{
	private $squadre;
	private $nome_girone;
	
	public function __construct($nome_girone)
	{
		$this->nome_girone = $nome_girone;
		$this->squadre = array();
	}
	
	public function aggiungiSquadra(&$team)
	{
		array_push( $this->squadre , $team);
	}
	
	public function ordinaClassifica()
	{
		sort($this->squadre, SORT_STRING);
		$this->squadre = array_reverse($this->squadre);
	}
	
	public function primeClassificate(&$prima, &$seconda)
	{
		$this->ordinaClassifica();
		$prima = $this->squadre[0];
		$seconda = $this->squadre[1];
	}
	
	public function stampaClassifica()
	{
		$lista = "Classifica girone ".$this->nome_girone.": <br />";
		foreach ($this->squadre as $squadra)
		{
			$lista .= "squadra: ".$squadra->nomeSquadra()." giocate: ".$squadra->partiteGiocate()." vinte: ".$squadra->calcolaVittorie().
					  " percentuale: ".$squadra->calcolaPercentualeVittorie()." <br />";
		}
		return $lista;
	}
	
	public function getTeamByName($nome_cercato, &$team)
	{
		foreach ($this->squadre as &$squadra)
		{
			if($squadra->nomeSquadra() == $nome_cercato)
			{
				$team = $squadra;
				return 0;
			}
		}
		return 1;
	}
}

?>
