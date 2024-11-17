<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["frauherr"]) && isset($_GET["vorname"]) && isset($_GET["nachname"])) {
        $anrede = $_GET["frauherr"];
        $vorname = $_GET["vorname"];
        $nachname = $_GET["nachname"];

        if (!empty($anrede) && !empty($vorname) && !empty($nachname)) {
            $zeit = date("d.m.Y H:i:s");

            $reg_data = "$zeit;$anrede;$vorname;$nachname;\n";
            file_put_contents("protokoll.txt", $reg_data, FILE_APPEND);

            echo "<h1>Registrierung erfolgreich</h1>";
            echo "<p>Sie haben sich mit folgenden Daten erfolgreich registriert:</p>";
            echo "<p>Anrede: $anrede</p>";
            echo "<p>Vorname: $vorname</p>";
            echo "<p>Nachname: $nachname</p>";
        } else {
            echo "<h1>Fehler bei der Registrierung</h1>";
            echo "<p>Bitte füllen Sie alle Felder aus.</p>";
        }
    } else {
        echo "<h1>Fehler bei der Registrierung</h1>";
        echo "<p>Ein oder mehrere erforderliche Felder fehlen.</p>";
    }
}

function getRegisteredUsers() {
    $registeredUsers = [];

    $lines = file("protokoll.txt", FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {
        $data = explode(";", $line);
        $registeredUsers[] = $data;
    }

    return $registeredUsers;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrierung erfolgt</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <p>Folgende Personen sind bislang registriert: </p>
    <table>
        <tr>
            <th>Zeit</th>
            <th>Anrede</th>
            <th>Vorname</th>
            <th>Nachname</th>
        </tr>

        <?php
        $registeredUsers = getRegisteredUsers();

        foreach ($registeredUsers as $user) {
            echo "<tr>";
            foreach ($user as $data) {
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
