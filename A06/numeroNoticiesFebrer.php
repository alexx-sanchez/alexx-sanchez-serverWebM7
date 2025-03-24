<?php
    $dataBase = new SQLite3('diariLocal.db');

    $resultats = $dataBase->query("SELECT count(*) as total FROM noticies WHERE not_data LIKE '2025-02-%'");

    while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
        echo "Numero de noticies a febrer: " . $fila['total'];
    }

    $dataBase->close();
?>