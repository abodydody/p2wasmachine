<?php
class Apparaat
{
    // Eigenschap om bij te houden of het apparaat aan of uit staat
    protected $isAan = false;

    // Methode om het apparaat aan te zetten
    public function zetAan()
    {
        $this->isAan = true;
    }

    // Methode om het apparaat uit te zetten
    public function zetUit()
    {
        $this->isAan = false;
    }

    // Controleer de status van het apparaat
    public function isAan()
    {
        return $this->isAan;
    }
}
