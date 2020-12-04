<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Blackjack</title>
    <style>
        .contenedor1,
        .contenedor2 {
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background-image: url('./img/background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            font-family: verdana;
        }

        .contenedor2 {
            background-image: url('./img/background.jpg');
        }

        .contenedor2 {
            background-image: url('./img/background2.jpg');
        }

        .jugar {
            margin: 6%;
        }

        aside#izquierda,
        aside#derecha {
            height: 400px;
            width: 40%;
            margin: 20px;
            border: 1px solid black;
            padding: 20px;
            position: relative;
        }

        #mensaje {
            padding-top: 10%;
            height: 400px;
            width: 45%;
            color: wheat;
            transform: rotate(-5deg);
            text-shadow: 2px 2px yellow;
            color: black;
        }

        .puntos {
            text-align: center;
            color: white;
            position: absolute;
            bottom: 0;
            font-weight: bold;
        }

        img {
            margin: 10px;
            width: 100px;
            box-shadow: 0 0 20px 0 black;
            transform: rotate(10deg);
        }

        .new_partida {
            margin: 6%;
            margin-left: 30%;
        }

        .start {
            margin-top: 30%;
        }

        #start,
        #pedir_carta,
        #plantarse,
        #nueva_partida {
            padding: 25px 10px 25px 10px;
            border-radius: 150px;
            background-color: yellow;
            color: green;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            border: 3px solid red;
            box-shadow: 0px 10px 5px black;
        }
        span{
            color: red;
            text-shadow: 2px 2px yellow;
            font-size: 50px;
        }

        h1{
            text-shadow: 2px 2px yellow;
            font-size: 50px;
        }
    </style>
</head>

<body>