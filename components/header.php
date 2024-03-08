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
            background-color: #FFF;
            width: 100%;
            height: 50px;
            padding: 30px 0 20px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-bottom: 1px solid gray;
        }

        nav img{
            width: 200px;
        }

        nav a {
            height: 20px;
            display: block;
            color: #000;
            text-align: center;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 20px;
            border-radius: 15px;
        }

        nav a:hover {
            background-color:#adbce6 ;
            color: #FFF;
            transition: 0.3s;
        }

        nav a.active {
            background-color:#00B ;
            color: #FFF;
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
        <img src="./images/disney-logo.png" alt="disney-title" />
        <a href="./index.php" <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>>Accueil</a> 
        <a href="./attractions.php" <?php if(basename($_SERVER['PHP_SELF']) == 'attractions.php') echo 'class="active"'; ?>>Attractions</a> 
        <?php             

            if(isset($_SESSION['email'][0])) {
                echo "<a href='./logout.php'>Logout</a>";
            } else {
                echo '<a href="./connexion.php" '.(basename($_SERVER['PHP_SELF']) == 'connexion.php' || 'inscription.php'  ? 'class="active"' : '').'>Login</a>';
            }

        ?>
    </nav>
</body>
</html>
