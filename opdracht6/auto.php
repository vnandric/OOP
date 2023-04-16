<?php
class auto 
{
  public $merk;
  public $type;
  public $kleur;
  public bool $heeftTrekhaak;
  public $kenteken;
  public $kilometers = 0;
  public $tankinhoud;
  public $benzine = 0;
  public $verbruik;
  
  public function tanken(float $liters)
    {
        $this->benzine += $liters;
        if ($this->benzine > $this->tankinhoud) {
            $teveel = $this->benzine - $this->tankinhoud;
            $this->benzine = $this->tankinhoud;
            return $teveel;
        }
        return 0;
    }
    public function rijden(float $kilometers)
    {
        $verbruikt = ($this->verbruik * $kilometers) / 100;
        if ($verbruikt < $this->benzine) {
            $this->benzine -= $verbruikt;
            $this->kilometers += $kilometers;
            return $kilometers;
        }
        $kilometers = ($this->benzine / 100) * $verbruikt;
        $this->kilometers += $kilometers;
        $this->benzine = 0;
        return $kilometers;
    }

    public function __construct(string $merk, string $type, string $kleur, bool $heeftTrekhaak = false, string $kenteken, float $kilometers = 0, float $tankinhoud, float $benzine = 0, float $verbruik)
    {
        $this->merk = $merk;
        $this->type = $type;
        $this->kleur = $kleur;
        $this->kenteken = $kenteken;
        $this->tankinhoud = $tankinhoud;
        $this->verbruik = $verbruik;
        $this->heeftTrekhaak = $heeftTrekhaak;
        $this->kilometers = $kilometers;
        $this->tanken($benzine);
    }
  
}