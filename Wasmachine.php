<?php

class Wasmachine extends Apparaat
{
    private $wasprogramma = [
        "Katoen",
        "Synthetisch",
        "Fijnwas",
        "Wol"
    ];
    private $huidigProgramma;

    // Methode om het wasprogramma in te stellen
    public function stelWasprogrammaIn($programma)
    {
        if (in_array($programma, $this->wasprogramma)) {
            $this->huidigProgramma = $programma;
        } else {
        }
    }

    // Methode om het huidige programma weer te geven
    public function toonHuidigProgramma()
    {
        return $this->huidigProgramma ?? "Geen programma ingesteld.";
    }
}
