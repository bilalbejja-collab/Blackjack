<?php
session_start();
include_once("autoload.php");
include_once("Views/_cabecera.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blackjack</title>
</head>

<body>
	<div class="contenedor1">
		<div class="row justify-content-center">
			<div class="mt-5 px-2 align-self-center border border-dark bg-white rounded text-center ">
				<h1>Blackjack</h1>
			</div>
		</div>
		<br>
		<div class="row justify-content-center">
			<div class="start">
				<a href="#start" id="start" name="start">Jugar!</a>
			</div>
		</div>
	</div>
	<section id='content'>
	</section>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script>
		document.getElementById("start").addEventListener("click", async () => {
			let formData = new FormData();
			formData.append("action", "start");

			let res = await fetch("Controllers/controller.php", {
				method: "POST",
				body: formData,
			});
			let data = await res.text();
			document.getElementById("content").innerHTML = data;

			//Ocultar el button start
			$(".contenedor1").hide();

			await buttonsActions();
		});

		//Asignar funciones a los botones
		async function buttonsActions() {
			let blackjackButtons = document.querySelectorAll(".blackjack");
			blackjackButtons.forEach((bjButton) => bjButton.addEventListener("click", blackjackActions));
		}

		//Depende de la action que lleva cada botón se le asigna una función 
		async function blackjackActions(e) {
			let action = e.target.closest("button").getAttribute('action');

			if (action == 'pedirCarta') {
				await pedirCarta();
			}

			if (action == 'nuevaPartida') {
				await nuevaPartida();
			}

			if (action == 'plantarse') {
				await plantarse();
			}
		}

		// Añade cartas a la mano del jugador
		async function pedirCarta() {
			let formData = new FormData();
			formData.append("action", "pedirCarta");

			let res = await fetch("Controllers/controller.php", {
				method: "POST",
				body: formData,
			});
			let data = await res.text();
			document.getElementById("content").innerHTML = data;

			//Para que los botones siguen funcionando cuando oculto el botón start 
			await buttonsActions();
		}

		// Crea nueva partida
		async function nuevaPartida() {
			console.log("Nueva");
			let formData = new FormData();
			formData.append("action", "nuevaPartida");

			let res = await fetch("Controllers/controller.php", {
				method: "POST",
				body: formData,
			});
			let data = await res.text();
			document.getElementById("content").innerHTML = data;

			//Para que los botones siguen funcionando cuando oculto el botón start 
			await buttonsActions();
		}

		// Cuando el jugador quiere plantarse
		async function plantarse() {
			let formData = new FormData();
			formData.append("action", "plantarse");

			let res = await fetch("Controllers/controller.php", {
				method: "POST",
				body: formData,
			});
			let data = await res.text();
			document.getElementById("content").innerHTML = data;

			//Para que los botones siguen funcionando cuando oculto el botón start 
			await buttonsActions();
		}
	</script>
</body>

</html>