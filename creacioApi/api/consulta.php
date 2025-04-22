<?php
    $db = new SQLite3('../database/database.db');
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['visibility']) && !isset($_GET['date'])) {
        $resultats = $db->query("SELECT * FROM articles");
        $articles = [];
        while ($row = $resultats->fetchArray(SQLITE3_ASSOC)) {
            $articles[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($articles);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['visibility'])) {
        if ($_GET['visibility'] === "premium") {
            $visibility = "subscriber";
        } else {
            $visibility = "public";
        }
        
        $stmt = $db->prepare("SELECT * FROM articles WHERE art_visibilitat = :visibility");
        $stmt->bindValue(':visibility', $visibility, SQLITE3_TEXT);
        $resultats = $stmt->execute();

        $articles = [];
        while ($row = $resultats->fetchArray(SQLITE3_ASSOC)) {
            $articles[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($articles);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['date'])) {
        $date = $_GET['date'];

        $stmt = $db->prepare("SELECT * FROM articles WHERE DATE(art_data_publicacio) > :date");
        $stmt->bindValue(':date', $date, SQLITE3_TEXT);
        $resultats = $stmt->execute();

        $articles = [];
        while ($row = $resultats->fetchArray(SQLITE3_ASSOC)) {
            $articles[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($articles);
    }

    $db->close();

?>