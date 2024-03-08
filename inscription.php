<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./font/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            height: 100%;
            background-color: #ffffff; 
            color: #000000; 
        }
        h1 {
            text-align: center;
            font-family: 'Disney';
            font-size: 56px;
            margin: 16px 0;
        }
        form {
            padding: 20px;
            background-color: #ffffff; 
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            width: 35%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-group {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .label-input {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            width: 200px; 
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
        }
        input[type="submit"], .inscription {
            background-color: #00B;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: center;
            text-decoration: none;
        }
        input[type="submit"]:hover {
            background-color: #adbce6; 
        }
        .switch-page{
            margin-bottom: 50px;
        }
        ::-webkit-scrollbar{
            width: 12px;
            height: 12px;
        }

        ::-webkit-scrollbar-track{
            background: none;
        }

        ::-webkit-scrollbar-thumb{
            background-color: rgb(61, 61, 61);
            border-radius: 12px;
        }

        ::-webkit-scrollbar-thumb:hover{
            background-color: rgb(46, 46, 46);
            border-radius: 12px;
        }

        ::-webkit-scrollbar-corner{
            background: none;
        }
    </style>
</head>
<body>
    <?php 
        include './components/header.php';
    ?>
    <h1>Inscription</h1>
    <form action="register.php" method="post">
        <div class="form-group">
            <div class="label-input">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" required>
            </div>
        </div>

        <div class="form-group">
            <div class="label-input">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" required>
            </div>
        </div>

        <div class="form-group">
            <div class="label-input">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
        </div>

        <div class="form-group">
            <div class="label-input">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
        </div>

        <input type="submit" value="Register">
    </form>
    <div class="switch-page">
        <h2>Vous avez déjà un compte ?</h2><a class="inscription" href="connexion.php">Connectez-vous !</a>
    </div>
</body>
</html>
