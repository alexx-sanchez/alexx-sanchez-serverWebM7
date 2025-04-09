<?php 
    $db = new SQLite3('diariLocal.db');

    if (isset($_GET['nom'])) {
        $introduit = $_GET['nom'];
        
        $stmt = $db->prepare("SELECT * FROM noticies WHERE LOWER(not_titular) LIKE LOWER(:titular)");
        $stmt->bindValue(':titular', '%' . $introduit . '%', SQLITE3_TEXT);
        $resultats = $stmt->execute();

        $foundResults = false;
        while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
            if (!$foundResults) {
                $foundResults = true;
            }
            echo "ID: ". $fila['not_id'] . "<br>";
            echo "Titular: ". $fila['not_titular'] . "<br>";
            echo "Cos: ". $fila['not_cos'] . "<br>";
            echo "Data: ". $fila['not_data'] . "<br>";
            echo "Secció: ". $fila['not_seccio'] . "<br><br>";
        }
        echo "<br>";
        if (!$foundResults) {
            echo "No hi ha resultats.";
        }    
        echo '<form action="cercaPerParaula.php"><input type="submit" value="Torna a la pagina de cerca"></form>';
        
    } else {
        echo '<form action="cercaPerParaula.php" method="get">
                <label for="nom">Paraula per filtrar titulars: </label>
                <input type="text" name="nom" id="nom" required placeholder="Escriu el titular a cercar"><br>
                <input type="submit" value="Cerca">
              </form>';
    }
    
    $db->close();
?>
