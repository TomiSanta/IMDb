<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>IMDb Főoldal &copy</title>
    <meta name="author" content="Sánta Tamás"/>
    <meta name="description" content="Ez egy IMDb adatbázis."/>
    <meta name="keywords" content="film, sorozat, IMDb, filmstúdió"/>
    <link rel="icon" href="img/logo.png"/>
    <style>
        body {
            background: url("img/index2.jpg") top/cover no-repeat;
        }
        div {
            position: absolute;
            font-size: 40px;
            top: 90px;
            color: whitesmoke;
        }
        h1{
            position: absolute;
            font-size: xxx-large;
            right: 500px;
            color: orange;
        }
        .button {
            background-color: orange;
            color: black;
            border: 20px solid papayawhip;
            border-radius: 12px;
            padding: 14px 40px;
            font-size: 20px;
            width: 24%;
        }
        .button:hover {
            background-color: orangered;
            color: white;
            border-radius: 12px;
            padding: 14px 40px;
            font-size: 25px;
            width: 28%;
        }
        .button2 {
            background-color: orange;
            color: black;
            border: 20px solid papayawhip;
            border-radius: 12px;
            padding: 14px 40px;
            font-size: 20px;
            width: 24%;
        }

        .button2:hover {
            background-color: orangered;
            color: white;
            border-radius: 12px;
            padding: 14px 40px;
            font-size: 25px;
            width: 28%;
        }
        #felhasznalo{
            position: absolute;
            top: 160px;
        }
        #sorozat{
            position: absolute;
            top: 230px;
        }
        #film{
            position: absolute;
            top: 300px;
        }
        #filmstudio{
            position: absolute;
            top: 370px;
        }
        #sorozatotkeres{
            position: absolute;
            top: 440px;
        }
        #filmetkeres{
            position: absolute;
            top: 510px;
        }
        #lekerdezes1{
            position: absolute;
            right: 10px;
            top: 240px;
        }
        #lekerdezes2{
            position: absolute;
            right: 10px;
            top: 310px;
        }
        #lekerdezes3{
            position: absolute;
            right: 10px;
            top: 410px;
        }
        address p {
            position:static;
            color: whitesmoke;
            font-size: 18px;
        }
        a[href="mailto:Valaki@example.com"]:link { color: papayawhip; }
        a[href="mailto:Valaki@example.com"]:visited { color: gray; }
        a[href="mailto:Valaki@example.com"]:hover { color: orangered; }
        a[href="mailto:Valaki@example.com"]:active { color: red; }

    </style>
    <title>IMDb</title>
</head>
<body>
    <h1>IMDb adatbázis kezelés</h1>
    <div>Menü:</div>

    <a href="felhasznalo.php"><button id="felhasznalo"  class="button" type="submit">Felhasználó</button></a>
    <a href="sorozat.php"><button id="sorozat" class="button" type="submit">Sorozatok</button></a>
    <a href="film.php"><button id="film"  class="button" type="submit">Film</button></a>
    <a href="filmstudio.php"><button id="filmstudio"  class="button" type="submit">Filmstúdió</button></a>
    <a href="sorozatot_keres.php"><button id="sorozatotkeres" class="button" type="submit">Sorozatot keres</button> </a>
    <a href="filmet_keres.php"><button id="filmetkeres" class="button" type="submit">Filmet keres</button> </a>

    <a href="lekerdezes1.php"><button id="lekerdezes1" class="button2" type="submit">2013 utáni filmek listája</button> </a>
    <a href="lekerdezes2.php"><button id="lekerdezes2" class="button2" type="submit">4 évadnál hosszabb akció sorozatok</button> </a>
    <a href="lekerdezes3.php"><button id="lekerdezes3" class="button2" type="submit">1995 után született SP monogrammú felhasználók</button> </a>
    <footer>
        <address>
            <p>A weboldal szerkesztője: Sánta Tamás </p>
            <p>Elérhetőség: <a href="mailto:Valaki@example.com">Valaki@example.com</a>.</p>
        </address>
    </footer>
</body>
</html>