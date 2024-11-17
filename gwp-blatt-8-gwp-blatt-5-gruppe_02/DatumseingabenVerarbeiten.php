<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Datumseingaben verarbeiten</title>
  </head>
  <body>
    <h1>Datumseingaben verarbeiten</h1>
    <p><b>Sie haben sich mit folgenden Daten registriert:</b></p>
    <?php
    function validateDate($dateString) {
      $regex = '/^\d{4}-\d{2}-\d{2}$/';
      if (!preg_match($regex, $dateString)) {
        return false;
      }

      $currentDate = new DateTime();
      $inputDate = new DateTime($dateString);

      return $inputDate <= $currentDate;
    }

    function validateHistoryDate($dateVon, $dateBis, $minYears = 0, $maxYears = 150) {
      $von = new DateTime($dateVon);
      $bis = new DateTime($dateBis);

      if ($von > $bis) {
        return false;
      }

      $alter = $von->diff(new DateTime())->y;

      return ($alter >= $minYears && $alter <= $maxYears);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $geburtsdatum = $_GET["geburtsdatum"];
      $einschulungsdatum = $_GET["einschulungsdatum"];
      $fuehrerscheinSeit = $_GET["fuehrerscheinSeit"];

      if (validateDate($geburtsdatum) &&
          validateDate($einschulungsdatum) &&
          validateDate($fuehrerscheinSeit) &&
          validateHistoryDate($geburtsdatum, date("Y-m-d")) &&
          validateHistoryDate($einschulungsdatum, date("Y-m-d"), 5) &&
          (empty($fuehrerscheinSeit) || validateHistoryDate($fuehrerscheinSeit, date("Y-m-d"), 17))) {

        echo "<p>Geburtsdatum: $geburtsdatum</p>";
        echo "<p>Datum der Einschulung: $einschulungsdatum</p>";
        echo "<p>PKW-Führerschein seit: $fuehrerscheinSeit</p>";
      } else {
        echo "<h1>Fehler bei der Registrierung</h1>";
        echo "<p>Bitte überprüfen Sie die eingegebenen Daten.</p>";
      }
    }
    ?>
    <p>Zurück zu den <a href="Datumseingaben.html">Datumseingaben</a> </p>
  </body>
</html>
