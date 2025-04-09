<!DOCTYPE html>
<html lang="ca">
<head>···
</head>
<body>
    <div class="container">
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recollir les dades del formulari
            $nom = htmlspecialchars(trim($_POST['nom']));
            $cognom = htmlspecialchars(trim($_POST['cognom']));
            $genere = isset($_POST['genere']) ? $_POST['genere'] : 'No especificat';
            $edad = isset($_POST['edad']) ? $_POST['edad'] : 'No especificada';
            $ciudad = htmlspecialchars(trim($_POST['ciudad']));
            $aficions = isset($_POST['aficions']) ? implode(", ", $_POST['aficions']) : 'No seleccionades';
            $motivacions = htmlspecialchars(trim($_POST['motivacions']));

            // Agrupar les dades en una sola variable
            $resultat = "<h2>Resum de les dades introduïdes:</h2>";
            $resultat .= "<p><strong>Nom:</strong> $nom</p>";
            $resultat .= "<p><strong>Cognom:</strong> $cognom</p>";
            $resultat .= "<p><strong>Gènere:</strong> $genere</p>";
            $resultat .= "<p><strong>Edat:</strong> $edad</p>";
            $resultat .= "<p><strong>Ciutat:</strong> $ciudad</p>";
            $resultat .= "<p><strong>Aficions:</strong> $aficions</p>";
            $resultat .= "<p><strong>Motivacions personals:</strong> $motivacions</p>";

            echo $resultat;
        } else {
            echo "<h2>Accés no vàlid. Si us plau, ompliu el formulari.</h2>";
        }
        ?>
    </div>
</body>
</html>