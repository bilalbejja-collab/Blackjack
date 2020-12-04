<?php
session_start();
//session_destroy();

include_once("..\autoload.php");

use Blackjack\Partida;
use Blackjack\VistaGanador;
use Blackjack\VistaIndex;

//Si existe la sesión partida 
if (isset($_SESSION['partida'])) {
    $partida = unserialize($_SESSION['partida']);

    if ($_POST['action'] == "start") {
        VistaIndex::render($partida);
    }

    //PEDIR CARTA

    if ($_POST['action'] == "pedirCarta") {
        asignarCarta($partida, $partida->getJugador());
        asignarCartaCrupier($partida, $partida->getCrupier());
        VistaIndex::render($partida);

        $_SESSION['partida'] = serialize($partida);
    }

    //PLANTARSE

    if ($_POST['action'] == "plantarse") {
        if ($partida->getJugador()->calcCards() >= 17) {
            asignarCarta($partida, $partida->getCrupier());
            VistaIndex::render($partida);

            $_SESSION['partida'] = serialize($partida);
        } else {
            VistaIndex::render($partida);
        }
    }

    //NUEVA PARTIDA

    if ($_POST['action'] == "nuevaPartida") {
        unset($_SESSION['partida']);
        $partida = new Partida();
        VistaIndex::render($partida);

        $_SESSION['partida'] = serialize($partida);
    }

    //FUNCIONAMIENTO

    if ($partida->getJugador()->calcCards() == 21) {
        //Paso como parámetros quienes el ganador y el valor de la mano de los dos jugadores
        VistaGanador::render("Jugador", $partida->getJugador()->calcCards(), $partida->getCrupier()->calcCards());
    }

    if ($partida->getCrupier()->calcCards() == 21) {
        VistaGanador::render("Crupier", $partida->getJugador()->calcCards(), $partida->getCrupier()->calcCards());
    }

    if ($partida->getJugador()->calcCards() > 21) {
        VistaGanador::render("Crupier", $partida->getJugador()->calcCards(), $partida->getCrupier()->calcCards());
    }

    if ($partida->getCrupier()->calcCards() > 21) {
        VistaGanador::render("Jugador", $partida->getJugador()->calcCards(), $partida->getCrupier()->calcCards());
    }

    if (
        $partida->getJugador()->calcCards() == 21
        && $partida->getCrupier()->calcCards() == 21
    ) {
        if ($partida->getJugador()->totalCartas() < $partida->getCrupier()->totalCartas())
            VistaGanador::render("Jugador", $partida->getJugador()->calcCards(), $partida->getCrupier()->calcCards());
        else
            VistaGanador::render("Crupier", $partida->getJugador()->calcCards(), $partida->getCrupier()->calcCards());
    }
} else {
    //Si no existe la sesión la creamos 
    $partida = new Partida();
    VistaIndex::render($partida);

    $_SESSION['partida'] = serialize($partida);
}

// FUNCIONES
/**
 * Asigna nueva Carta al jugador 
 */
function asignarCarta($partida, $jugador)
{
    $baraja = $partida->getBaraja();
    // Barajar
    $baraja->barajar();
    // Reparte una carta
    $nueva_carta = $baraja->repartirCarta();
    // Sacar cartas de la baraja y la mete en la mano del jugador
    $jugador->nuevaCarta($nueva_carta);
}

/**
 * Asigna nueva Carta al crupier
 */
function asignarCartaCrupier($partida, $crupier)
{
    $baraja = $partida->getBaraja();
    // Barajar
    $baraja->barajar();
    // Reparte una carta
    $nueva_carta = $baraja->repartirCarta();

    //Sacar cartas de la baraja y la mete en la mano del crupier
    if ($crupier->calcCards("crupier") + $nueva_carta->getValor($crupier) <= 17) {
        $crupier->nuevaCarta($nueva_carta);
    }
}
