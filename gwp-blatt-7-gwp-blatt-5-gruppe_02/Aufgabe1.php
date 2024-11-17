<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Anlegen eines Arrays</title>
</head>

<body>
    <h1>Anlegen eines Arrays</h1>

    <p>Erste Zeile: <br>

        <?php
        $myArray = ["Mal", "Zum", "lerne", "Arrays", "ersten", "kennen", "Heute", "Ich", "."];

        $output1 = $myArray[7] . '-' . $myArray[2] . '-' . $myArray[6] . '-' . $myArray[3] . '-' . $myArray[5] . '-' . $myArray[8];
        echo $output1 . "<br>";

        $output2 = $myArray[6] . '-' . $myArray[2] . '-' . $myArray[7] . '-' . $myArray[1] . '-' . $myArray[4] . '-' . $myArray[0] . '-' . $myArray[3] . '-' . $myArray[5] . '-' . $myArray[8];
        echo $output2 . "<br>";

        $output3 = $myArray[7] . '-' . $myArray[2] . '-' . $myArray[6] . '-' . $myArray[1] . '-' . $myArray[4] . '-' . $myArray[0] . '-' . $myArray[3] . '-' . $myArray[5] . '-' . $myArray[8];
        echo $output3 . "<br>";
        ?>

    </p>
</body>
</html>
