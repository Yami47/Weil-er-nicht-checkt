document.addEventListener('DOMContentLoaded', function() {
    // Abfrage 1: Inhalt vom Tag mit der ID "zwei"
    var suchUeberID = document.getElementById('zwei').innerHTML;
    document.getElementById('SucheUeberID').textContent = suchUeberID;
   
    // Abfrage 2: Anzahl der Treffer beim Suchen Ã¼ber den Namen "hallo"
    var suchUeberName = document.querySelectorAll('[name="hallo"]').length;
    document.getElementById('SucheUeberName').textContent = suchUeberName;
   
    // Abfrage 3: Inhalt des zweiten <h1>-Tags
    var suchUeberTag = document.getElementsByTagName('h1')[1].innerHTML;
    document.getElementById('SucheUeberTag').textContent = suchUeberTag;
   
    // Abfrage 4: Inhalt des ersten Elements mit der Klasse "MeineKlasse"
    var suchUeberKlasse = document.getElementsByClassName('MeineKlasse')[0].innerHTML;
    document.getElementById('SucheUeberKlasse').textContent = suchUeberKlasse;
   
    // Abfrage 5: Inhalt des ersten <p>-Kindelements von <div> mit dem querySelector
    var suchMitQuery = document.querySelector('div > p').innerHTML;
    document.getElementById('SucheMitQuery').textContent = suchMitQuery;
   });