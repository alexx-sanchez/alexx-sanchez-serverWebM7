<?php
    $db = new SQLite3('diariLocal.db');

    $nomSeccio = $_GET['nomSeccio'];

    $resultats = $db->query("SELECT * FROM noticies WHERE not_seccio = '$nomSeccio' ORDER BY not_data DESC;");

    echo "<h1>Notícies sobre $nomSeccio:</h1>";
    while($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
        echo "<hr>";
        echo "$fila[not_data] <br>";
        echo "<b>'".$fila['not_titular']."</b>'->".$fila['not_cos']."<br>";
    }
    echo "<hr>";

?>