<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="./font/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }
        h1 {
            text-align: center;
            font-size : 102px;
            font-family: 'Disney';
            position: absolute;
            top: 300px;
            z-index: 1;
            color: #DCDCDC;
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
    <video autoplay muted playsinline loop>
        <source
            src="https://rr2---sn-aigl6nsr.googlevideo.com/videoplayback?expire=1709930862&amp;ei=DiXrZbmeEdqKvdIP0fGpgA0&amp;ip=2a01%3Ae0a%3A990%3A8500%3A85f4%3Afd7a%3Ac4ba%3A3c27&amp;id=o-AL5hbOh6kfTCSCJmi3Nn8zUyxIvfuHwGdhkZWH0bvjm8&amp;itag=22&amp;source=youtube&amp;requiressl=yes&amp;xpc=EgVo2aDSNQ%3D%3D&amp;mh=az&amp;mm=31%2C29&amp;mn=sn-aigl6nsr%2Csn-25glenlk&amp;ms=au%2Crdu&amp;mv=m&amp;mvi=2&amp;pl=51&amp;initcwndbps=2350000&amp;spc=UWF9f9bjB5CTZDhDN1taVqOMOWtEWmRFHYgBwWvfaU9pZ3U&amp;vprv=1&amp;svpuc=1&amp;mime=video%2Fmp4&amp;ns=iJGF0Xt1Mg3uPBMavB4cTvgQ&amp;cnr=14&amp;ratebypass=yes&amp;dur=214.227&amp;lmt=1693342601875715&amp;mt=1709908652&amp;fvip=4&amp;fexp=24007246&amp;c=WEB&amp;sefc=1&amp;txp=4432434&amp;n=H-HK0vjxKsFgQY8O&amp;sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cxpc%2Cspc%2Cvprv%2Csvpuc%2Cmime%2Cns%2Ccnr%2Cratebypass%2Cdur%2Clmt&amp;sig=AJfQdSswRAIgRsHFKzCTzxZbt0dDBhk-Yk9qVFk3yguUV_5i1eeCH0wCIHp4i-ry9_53lcJjr8NNJanFwsSBzPa1_gsczx39LOqQ&amp;lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&amp;lsig=APTiJQcwRQIgN1dYrkxqY6Qv-3JH8BPDCXZzwrEXqNfJVSH8PwTbc54CIQDOu0bu-aCJxT0HwjvtMFaoWfClngP8o5sLp0UpDstvOw%3D%3D"
            type="video/mp4">
    </video>
    <h1>Bienvenue à Disneyland Paris !</h1>
</body>
</html>