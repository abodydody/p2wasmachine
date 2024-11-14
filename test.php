<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Testunit voor Wasmachine en Magnetron</title>
</head>
<style>
    body,
    html {
        background-color: #f5f5dc;
        padding: 0;
        margin: 0;
        font-family: Arial, sans-serif;
        box-sizing: border-box;
    }

    h1,
    h2 {
        color: #333;
        text-align: center;
    }

    button,
    select,
    input {
        margin: 5px;
        padding: 10px;
        border: 2px solid #333;
        border-radius: 5px;
        font-weight: bold;
        background-color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover,
    select:hover,
    input:hover {
        background-color: #e0e0e0;
    }

    #dezediv,
    #anderediv {
        margin: 20px auto;
        padding: 20px;
        border: 2px solid #333;
        border-radius: 10px;
        background-color: #d3d3d3;
        width: 45%;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #container {
        display: flex;
        justify-content: space-around;
        margin: 20px auto;
        width: 80%;
    }

    form {
        margin: 0;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        text-align: center;
    }

    #output {
        margin: 20px auto;
        padding: 20px;
        border: 2px solid #333;
        border-radius: 10px;
        background-color: #fff;
        width: 80%;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <h1>Testunit voor Wasmachine en Magnetron</h1>

    <?php
    // Vereiste bestanden importeren
    require_once 'Apparaat.php';
    require_once 'Wasmachine.php';
    require_once 'Magnetron.php';

    // Nieuwe objecten van Wasmachine en Magnetron maken
    $wasmachine = new Wasmachine();
    $magnetron = new Magnetron();

    // Variabele voor output meldingen initialiseren
    $output = ""; // Dit zal alle meldingen bevatten

    // Controleren of het verzoek een POST-verzoek is
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Controle voor de Wasmachine
        if (isset($_POST['wasmachine_aan'])) {
            // Wasmachine aanzetten
            $wasmachine->zetAan();
            // Output melding toevoegen
            $output .= "<p>Wasmachine is ingeschakeld.</p>";
        }
        if (isset($_POST['wasmachine_uit'])) {
            // Wasmachine uitzetten
            $wasmachine->zetUit();
            // Output melding toevoegen
            $output .= "<p>Wasmachine is uitgeschakeld.</p>";
        }
        if (isset($_POST['wasprogramma'])) {
            // Wasprogramma instellen
            $wasmachine->stelWasprogrammaIn($_POST['wasprogramma']);
            // Output melding toevoegen
            $output .= "<p>Huidig wasprogramma: " . $wasmachine->toonHuidigProgramma() . "</p>";
        }

        // Controle voor de Magnetron
        if (isset($_POST['magnetron_aan'])) {
            // Magnetron aanzetten
            $magnetron->zetAan();
            // Output melding toevoegen
            $output .= "<p>Magnetron is ingeschakeld.</p>";
        }
        if (isset($_POST['magnetron_uit'])) {
            // Magnetron uitzetten
            $magnetron->zetUit();
            // Output melding toevoegen
            $output .= "<p>Magnetron is uitgeschakeld.</p>";
        }
        if (isset($_POST['temperatuur'])) {
            // Temperatuur instellen
            $magnetron->stelTemperatuurIn($_POST['temperatuur']);
            // Output melding toevoegen
            $output .= "<p>Temperatuur van de magnetron is ingesteld op " . $_POST['temperatuur'] . "°C.</p>";
        }
        if (isset($_POST['tijd'])) {
            // Tijd instellen
            $magnetron->stelTijdIn($_POST['tijd']);
            // Output melding toevoegen
            $output .= "<p>Tijd voor de magnetron is ingesteld op " . $_POST['tijd'] . " minuten.</p>";
        }

        // Controle voor de reset knop
        if (isset($_POST['reset'])) {
            // Output resetten
            $output = "";
        }
    }
    ?>

    <!-- Wasmachine sectie -->
    <div id="dezediv">
        <h2>Wasmachine</h2>
        <form method="post">
            <button type="submit" name="wasmachine_aan">Aan</button>
            <button type="submit" name="wasmachine_uit">Uit</button><br><br>

            <label for="wasprogramma">Kies wasprogramma:</label>
            <select name="wasprogramma" id="wasprogramma" required>
                <option value="Katoen">Katoen</option>
                <option value="Synthetisch">Synthetisch</option>
                <option value="Fijnwas">Fijnwas</option>
                <option value="Wol">Wol</option>
            </select>
            <button type="submit">Stel programma in</button>
        </form>
    </div>

    <!-- Magnetron sectie -->
    <div id="anderediv">
        <h2>Magnetron</h2>
        <form method="post">
            <button type="submit" name="magnetron_aan">Aan</button>
            <button type="submit" name="magnetron_uit">Uit</button><br><br>

            <label for="temperatuur">Temperatuur (max 300°C):</label>
            <input type="number" name="temperatuur" id="temperatuur" min="1" max="300" required>
            <button type="submit">Stel temperatuur in</button><br><br>

            <label for="tijd">Tijd (max 30 minuten):</label>
            <input type="number" name="tijd" id="tijd" min="1" max="30" required>
            <button type="submit">Stel tijd in</button>
        </form>
    </div>

    <!-- Alle uitkomsten binnen de output div -->
    <div id="output">
        <?= $output ?>
    </div>

    <!-- Reset sectie -->
    <div id="resetdiv">
        <form method="post">
            <button type="submit" name="reset">Reset</button>
        </form>
    </div>
</body>

</html>