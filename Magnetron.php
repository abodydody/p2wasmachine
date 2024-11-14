
<?php

class Magnetron extends Apparaat
{
    private $temperatuur = 0;
    private $tijd = 0;

    // Methode om de temperatuur in te stellen
    public function stelTemperatuurIn($temp)
    {
        if ($temp > 0 && $temp <= 300) { // Stel een maximum in
            $this->temperatuur = $temp;
        } else {
        }
    }

    // Methode om de tijd in te stellen
    public function stelTijdIn($minuten)
    {
        if ($minuten > 0 && $minuten <= 30) { // Stel een maximum tijd in
            $this->tijd = $minuten;
        } else {
        }
    }

    // Toon de huidige instellingen
    public function toonInstellingen()
    {
        return "Temperatuur: $this->temperatuur graden, Tijd: $this->tijd minuten.";
    }
}
?>
