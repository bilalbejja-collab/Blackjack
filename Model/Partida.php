<?php

namespace Blackjack;

include_once("../autoload.php");

use Blackjack\Jugador;
use Blackjack\BarajaInglesa;

/*
 * Clase Partida
 * @author Bilal Bejja
 */

class Partida
{
    private $crupier;
    private $jugador;
    private $baraja;

    public function __construct()
    {
        $this->crupier = new Jugador();
        $this->jugador = new Jugador();
        $this->baraja = new BarajaInglesa();
    }
    
    //Asigna Cartas al jugador
    public function asignarCarta(Jugador $jugador)
    {
        $carta = $this->baraja->repartirCarta();
        $jugador->nuevaCarta($carta);
        return $carta;
    }

    /**
     * Get the value of jugador
     */
    public function getJugador()
    {
        return $this->jugador;
    }

    /**
     * Get the value of crupier
     */
    public function getCrupier()
    {
        return $this->crupier;
    }

    /**
     * Get the value of baraja
     */
    public function getBaraja()
    {
        return $this->baraja;
    }
}
