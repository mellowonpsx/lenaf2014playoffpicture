<?php

class Partita
{
	private $punteggio_home;
	private $punteggio_away;
	private $team_home;
	private $team_away;
	
	public function __construct(&$team_home, &$team_away)
	{
		$this->team_home = $team_home;
		$this->team_away = $team_away;
		$this->punteggio_home = 0;
		$this->punteggio_away = 0;
	}
	
	public function setPunteggio($punteggio_home, $punteggio_away)
	{
		$this->punteggio_home = $punteggio_home;
		$this->punteggio_away = $punteggio_away;
	}
	
	public function isGiocata()
	{
		if($this->punteggio_home!= 0 || $this->punteggio_away != 0) return 1;
		return 0;
	}
	
	
	public function isHomeWin()
	{
		if($this->punteggio_home > $this->punteggio_away) return 1;
		return 0;
	}
	
	public function isAwayWin()
	{
		if($this->punteggio_home < $this->punteggio_away) return 1;
		return 0;
	}
	
	public function opponentTeam(&$team)
	{
		if($this->team_home == $team) return $this->team_away;
		if($this->team_away == $team) return $this->team_home;
	}
	
	public function winForTeam(&$team)
	{
		if(!$this->isGiocata()) return 0;
		if($this->team_home == $team && $this->isHomeWin()) return 1;
		if($this->team_away == $team && $this->isAwayWin()) return 1;
	}
	
}

?>
