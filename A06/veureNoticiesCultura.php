<?php
    $dataBase = new SQLite3('diariLocal.db');

    $resultats = $dataBase->query("SELECT * FROM noticies WHERE not_seccio = 'Cultura' ORDER BY not_data DESC");

    while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
        echo "ID: ". $fila['not_id'] . "<br>";
        echo "Titular: ". $fila['not_titular'] . "<br>";
        echo "Cos: ". $fila['not_cos'] . "<br>";
        echo "Data: ". $fila['not_data'] . "<br>";
        echo "Seccio: ". $fila['not_seccio'] . "<br><br>";
    }

    $dataBase->close();
?>