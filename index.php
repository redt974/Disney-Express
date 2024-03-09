<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="icon" href='./images/favicon.ico' />
    <link rel="stylesheet" href="./font/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow-x: hidden;
        }
        nav{
            z-index: 1;
        }
        h1 {
            text-align: center;
            font-size : 102px;
            font-family: 'Disney';
            position: absolute;
            top: 300px;
            z-index: 1;
            color: #dcdcdc;
            text-align:center;
            transition: color 1s;
        }
        video{
            width: 100vw;
            height: 99%;
            z-index: 0;
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
    <video id="video" autoplay muted playsinline loop>
        <source
            src="./images/disney-video.mp4"
            type="video/mp4">
    </video>

    <h1 id="title">Bienvenue à Disneyland Paris !</h1>
    <script>
        // Récupérer l'élément vidéo
        const video = document.getElementById("video");

        // Écouter l'événement "play" (début de la vidéo)
        video.addEventListener("play", function() {
            // Rendre le texte de l'élément h1 transparent après 10 secondes
            setTimeout(function() {
                document.getElementById("title").style.color = "transparent";
            }, 500);
        });
    </script>

</body>
</html>