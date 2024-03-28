<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatage de données</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            text-align: center;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h1>Formatage de données</h1>
        <label for="data">Entrez les données (séparées par des virgules) :</label><br>
        <textarea id="data" name="data" rows="4" cols="50"></textarea><br>

        <input type="radio" id="format" name="format_type" value="table">
        <label for="format_table">Format tableau</label><br>

        <input type="radio" id="format" name="format_type" value="list">
        <label for="format_list">Format liste</label><br>

        <input type="submit" name="submit" value="Format">
    </form>

    <?php
    // Vérification des données avant traitement (Pas de signes <>$, séparateur de données virgule, au moins 2 données pour le format tableau)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $data = $_POST["data"];
        $format_type = $_POST["format_type"];


        if (!empty($data)) {

            if (strpos($data, ",") === false && !($format_type === "table" && count($donnees) == 1)) {
                echo "Le séparateur de données doit être une virgule.";
                exit;
            }


            $donnees = explode(",", $data);

            if ($format_type === "table" && count($donnees) < 2) {
                echo "Pour le format tableau, il doit y avoir au moins 2 données.";
                exit;
            }

            if ($format_type === "list") {
                // Affichage des données comme une liste à puce
                echo "<ul>";
                foreach ($donnees as $donnee) {
                    echo "<li>$donnee</li>";
                }
                echo "</ul>";
            } else {
                // Affichage des données comme un tableau
                echo "<table border='1'>";
                echo "<tr><th>Données</th></tr>";
                foreach ($donnees as $donnee) {
                    echo "<tr><td>$donnee</td></tr>";
                }
                echo "</table>";
            }
        } else {

            echo "Veuillez entrer des données.";
        }
    }
    ?>


    <img src="https://img.shields.io/badge/CECI_EST_UN_SUPER_BADGE-blue" />

</body>

</html>