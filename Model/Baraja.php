<?php

namespace Blackjack;

use Blackjack\Carta;

include_once("../autoload.php");

/*
 * Clase Baraja
 * @author Bilal Bejja
 */
abstract class Baraja
{
    // array de 52 cartas de la clase Carta
    private $mazo;

    abstract protected function repartirCarta();

    public function __construct($mazo = array())
    {
        $this->mazo = $mazo; 
    }

    //desordenar las cartas 
    public function barajar()
    {
        shuffle($this->mazo);
        return $this->mazo;
    }

    public function listar()
    {
        foreach ($this->mazo as $carta) {
            $carta = $carta->getPalo() . "-" . $carta->getFigura();
            echo "<img src='../img/" . $carta . ".jpg' style='width: 60px; border: 1px solid black;' alt='" . $carta . "'>";
        }
    }

    /**
     * Get the value of mazo
     */
    public function getMazo()
    {
        $this->barajar();
        return $this->mazo;
    }

    /**
     * Set the value of mazo
     *
     * @return  self
     */
    public function setMazo($mazo)
    {
        $this->mazo = $mazo;

        return $this;
    }
}
