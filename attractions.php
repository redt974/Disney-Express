<?php
session_start();

// Charger les attractions depuis le fichier CSV
$attractions = [];
$file = fopen("attractions.csv", "r");

if ($file !== false) {
    // Ignorer la première ligne (en-tête)
    fgetcsv($file);

    // Lire chaque ligne du fichier CSV
    while ($attraction = fgetcsv($file)) {
        $attractions[] = [
            'id' => strtolower(str_replace(' ', '_', $attraction[0])),
            'name' => $attraction[1],
            'image' => $attraction[2],
            'description' => $attraction[3]
        ];
    }

    fclose($file);
}

// Ajouter ou supprimer des attractions aux favoris
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && isset($_POST["attractionId"])) {
    $action = $_POST["action"];
    $attractionId = $_POST["attractionId"];

    if ($action == "add" && !in_array($attractionId, $_SESSION["favorites"])) {
        $_SESSION["favorites"][] = $attractionId;
    } elseif ($action == "remove" && ($index = array_search($attractionId, $_SESSION["favorites"])) !== false) {
        unset($_SESSION["favorites"][$index]);
    }

    // Redirection pour éviter la soumission du formulaire lors du rafraîchissement
    header("Location: attractions.php");
    exit();
}

// Restaurer les favoris depuis le fichier spécifique à l'utilisateur
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $userFavoritesFilename = "user_favorites_" . $email . ".csv";

    if (file_exists($userFavoritesFilename)) {
        // Charger les favoris depuis le fichier CSV spécifique à l'email
        $userFavoritesContent = file_get_contents($userFavoritesFilename);

        // Vérifier si le fichier n'est pas vide
        if (isset($userFavoritesContent)) {
            $userFavorites = str_getcsv($userFavoritesContent, ";", '"');
            // print_r($userFavorites);
            $_SESSION["favorites"] = $userFavorites;
        }
    }
}



// En-tête HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractions</title>
    <style>
        /* Add CSS to style your page if necessary */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            font-family: ;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 100px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .table-img {
            max-width: 100px;
            max-height: 100px;
        }
        .favorites-btn {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include './components/header.php'; //var_dump($_SESSION["favorites"]) ?>

    <h1>Disneyland Attractions</h1>

    <?php if (!isset($_SESSION["email"])) : ?>
        <p>You must be logged in to view attractions.</p>
    <?php else : ?>
        <!-- Afficher le tableau des attractions -->
        <?php if (!empty($attractions)) : ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Favorites</th>
                </tr>
                <?php foreach ($attractions as $attraction) : ?>
                    <tr>
                        <td><?= $attraction['id'] ?></td>
                        <td><?= $attraction['name'] ?></td>
                        <td><img class="table-img" src="<?= $attraction['image'] ?>" alt="<?= $attraction['name'] ?>"></td>
                        <td><?= $attraction['description'] ?></td>
                        <td>
                            <!-- Formulaire pour ajouter ou supprimer des favoris -->
                            <?php if (in_array($attraction['id'], $_SESSION["favorites"])) : ?>
                                <form method="post" action="attractions.php">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="attractionId" value="<?= $attraction['id'] ?>">
                                    <button type="submit">Remove from Favorites</button>
                                </form>
                            <?php else : ?>
                                <form method="post" action="attractions.php">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="attractionId" value="<?= $attraction['id'] ?>">
                                    <button type="submit">Add to Favorites</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No attractions found.</p>
        <?php endif; ?>

        <!-- Afficher le tableau des favoris -->
        <?php if ($_SESSION["favorites"] !== [null]) : ?>
            <h1>Favorites</h1>
            <table id='favoritesTable'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Favorites</th>
                </tr>
                <?php foreach ($_SESSION["favorites"] as $favAttractionId) : ?>
                    <?php
                    $favAttraction = $attractions[array_search($favAttractionId, array_column($attractions, 'id'))];
                    ?>
                    <tr data-id='<?= $favAttractionId ?>'>
                        <td><?= $favAttractionId ?></td>
                        <td><?= $favAttraction['name'] ?></td>
                        <td><img class="table-img" src='<?= $favAttraction['image'] ?>' alt='<?= $favAttraction['name'] ?>'></td>
                        <td><?= $favAttraction['description'] ?></td>
                        <td>
                            <form method='post' action='attractions.php'>
                                <input type='hidden' name='action' value='remove'>
                                <input type='hidden' name='attractionId' value='<?= $favAttractionId ?>'>
                                <button type='submit'>Remove from Favorites</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <h2>Favorites</h2>
            <table id='favoritesTable'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Favorites</th>
                </tr>
            </table>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>

