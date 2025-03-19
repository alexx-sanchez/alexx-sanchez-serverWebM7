<?php
    $final = false;
    if (isset($_REQUEST['numeroUsuari'])) {
        $numeroUsuari = $_REQUEST['numeroUsuari'];
        $numeroMagic = $_REQUEST['numeroMagic'];
        $numeroIntents = $_REQUEST['numeroIntents'];

        echo "<div class='message'>Numero jugat: ". $numeroUsuari."<br/></div>";
    
        if ($numeroUsuari == $numeroMagic) {
            $final = true;
            echo "<div class='success'>Has encertat! </div>";
        } else if ($numeroUsuari < $numeroMagic) {
            $missatge = "<div class='hint'>El numero es mes gran. <br/></div>";
            $numeroIntents--;
        } else {
            $missatge = "<div class='hint'>El numero es mes petit</div>";
            $numeroIntents--;
        }
        
    } else {
        $numeroMagic = rand(0,10);
        $numeroIntents = 3;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc del Numero Magic</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            padding: 50px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .message, .hint, .success, .error {
            font-weight: bold;
            margin: 10px 0;
        }
        .hint {
            color: blue;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 5px;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }
        a:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            if (!$final && $numeroIntents > 0) {
        ?>
        <form action="" method="post">
            <label for=""><strong>Joc del numero magic</strong></label><br><br>
            <input type="hidden" name="numeroMagic" size=5 value="<?php echo $numeroMagic ?>" readonly>
            Intents: <input name="numeroIntents" size="4" value="<?php echo $numeroIntents ?>" readonly/><br><br>
            Jugada: <input name="numeroUsuari" size="4" type="text"/><br><br>
            <input type="submit" value="Jugar!">
        </form>
        <?php
            echo $missatge;
            } else if ($final) {
                echo "<div class='success'>Has guanyat</div>";
                echo "<a href='numeroMagic.php'>Torna a jugar</a>"."<br><br>";
            } else {
                echo "<div class='error'>T'has quedat sense intents. El numero era: ". $numeroMagic."</div><br><br>";
                echo "<a href='numeroMagic.php'>Torna a jugar</a>";
            }
        ?>
    </div>
</body>
</html>
