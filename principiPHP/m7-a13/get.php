<?php
    include('includes/header.php');
?>

<?php
    echo "Aquí tienes todos los chistes: <br>";

    for ($i=1; $i <= 6 ; $i++) { 
        $url = "https://api101.up.railway.app/joke/$i";

        $response = file_get_contents($url);

        $data = json_decode($response, true);   

        if (is_array($data)) {
            
                echo "Autor:" . $data[0]['author'] . "<br>";
                echo "Acudit: " . $data[0]['joke'] . "<br><br>";
            
        } else {
            echo "Error a l’obtenir les dades de l’API.";
        }
    }
?>