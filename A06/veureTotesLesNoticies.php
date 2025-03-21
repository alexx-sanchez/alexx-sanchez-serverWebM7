<?php
    $db = new SQLite3('database.db');

    $db->exec("CREATE TABLE IF NOT EXISTS usuaris (usu_id INTEGER PRIMARY KEY, usu_nom TEXT, usu_email TEXT)");

    $db->close();
?>
