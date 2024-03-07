<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            overflow: hidden;
            background-color: #333;
            width: 100%;
            height: 50px;
            padding: 10px 0;
            margin: 0 0 30px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        nav img{
            padding: 10px 0;
            width: 200px;
        }

        nav a {
            height: 20px;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 10px 12px;
            text-decoration: none;
            font-size: 16px;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
            transition: 1s;
        }

        nav a.active {
            background-color: #4CAF50;
        }

        @media screen and (max-width: 600px) {
            nav a {
                float: none;
                display: block;
            }
        }
    </style>
</head>
<body>
    <nav> 
        <img src="./images/disney-title.png" alt="disney-title" />
        <a href="./index.php" <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>>Accueil</a> 
        <a href="./attractions.php" <?php if(basename($_SERVER['PHP_SELF']) == 'attractions.php') echo 'class="active"'; ?>>Attractions</a> 
        <?php             

            if(isset($_SESSION['email'][0])) {
                echo "<a href='./logout.php'>Logout</a>";
            } else {
                echo '<a href="./connexion.php" '.(basename($_SERVER['PHP_SELF']) == 'connexion.php' ? 'class="active"' : '').'>Login</a>';
            }

        ?>
    </nav>
</body>
</html>
