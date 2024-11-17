<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Assoziatives Array anlegen</title>
</head>

<body>

    <h1>Assoziatives Array anlegen</h1>

    <p>Folgende Schlüssel-Wert-Paare sind im Array enthalten: <br>
        <?php
        $wochentage = array(
            'Mo' => 'Montag',
            'Di' => 'Dienstag',
            'Mi' => 'Mittwoch',
            'Do' => 'Donnerstag',
            'Fr' => 'Freitag'
        );

        $wochentage = array_merge($wochentage, array('Sa' => 'Samstag', 'So' => 'Sonntag'));

        foreach ($wochentage as $kuerzel => $tag) {
            switch ($tag) {
                case 'Freitag':
                    echo "$kuerzel: Endlich Wochenende <br>";
                    break;
                default:
                    echo "$kuerzel: $tag <br>";
                    break;
            }
        }
        ?>

    </p>
    
</body>
</html>
