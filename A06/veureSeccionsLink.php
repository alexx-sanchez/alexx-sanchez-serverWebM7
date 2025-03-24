<?php
    $db = new SQLite3('diariLocal.db');

    $resultats = $db->query("SELECT DISTINCT not_seccio FROM noticies ORDER BY not_seccio;");
    
    echo "<h1>Seccions</h1>";
    while($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
        echo "<li><a href='veureNoticiesSeccio.php?nomSeccio=$fila[not_seccio]'>$fila[not_seccio]</a></li>";
    }

    $db->close();
?>