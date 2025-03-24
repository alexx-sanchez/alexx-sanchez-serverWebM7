<?php
    $dataBase = new SQLite3('diariLocal.db');

    $resultats = $dataBase->query("SELECT DISTINCT not_seccio as resultat FROM noticies order by not_seccio asc");

    echo "Seccions: <br>";
    while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
        echo "- ". $fila['resultat'] . "<br>";
    }

    $dataBase->close();
?>