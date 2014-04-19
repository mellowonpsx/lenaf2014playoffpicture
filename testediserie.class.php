<?php

class TesteDiSerie
{
	private $squadre;
	
	public function __construct()
	{
		$this->squadre = array();
	}
	
	public function aggiungiSquadra(&$team)
	{
		$team->setTestaDiSerie();
		array_push( $this->squadre , $team);
	}
	
	public function ordinaClassifica()
	{
		sort($this->squadre, SORT_STRING);
		$this->squadre = array_reverse($this->squadre);
	}
	
	public function stampaClassifica()
	{
		$lista = "Classifica teste di serie: <br />";
		foreach ($this->squadre as $squadra)
		{
			$lista .= "squadra: ".$squadra->nomeSquadra()." giocate: ".$squadra->partiteGiocate()." vinte: ".$squadra->calcolaVittorie().
					  " percentuale: ".$squadra->calcolaPercentualeVittorie()." vittorieavversaribattuti ".$squadra->vittorieAvversariBattuti()." <br />";
		}
		return $lista;
	}
}

?>
