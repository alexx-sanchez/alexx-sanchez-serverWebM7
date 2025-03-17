<!DOCTYPE html>
<html lang="ca">
<head>···
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // codigo recogiendo los datos
        } else {
            echo "<h2>Accés no vàlid.</h2>";
        }
        ?>
    </div>
</body>
</html>