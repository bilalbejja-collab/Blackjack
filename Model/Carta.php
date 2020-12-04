<?php

namespace Blackjack;

use Blackjack\Jugador;

include_once("Jugador.php");

/*
 * Clase Carta
 * @author Bilal Bejja
 */
class Carta
{
    /*PHP:8
    public function __construct(
        private $palo,
        private $figura
    )
    {}
    */
    private $palo;
    private $figura;

    public function __construct($unPalo = "", $unaFigura = "")
    {
        $this->palo = $unPalo;
        $this->figura = $unaFigura;
    }

    public function __toString()
    {
        return $this->getPalo() . "-" . $this->getFigura();
    }

    /**
     * Get the value of palo
     */
    public function getPalo()
    {
        return $this->palo;
    }

    /**
     * Set the value of palo
     *
     * @return  self
     */
    public function setPalo($palo)
    {
        $this->palo = $palo;

        return $this;
    }

    /**
     * Get the value of unaFigura
     */
    public function getFigura()
    {
        return $this->figura;
    }

    /**
     * Set the value of unaFigura
     *
     * @return  self
     */
    public function setFigura($unaFigura)
    {
        $this->figura = $unaFigura;

        return $this;
    }

    // Depende de la mano del jugador a la A = 1 o A = 11  
    public function getValor($jugador)
    {
        $cards = array('A' => 11, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10, 'J' => 10, 'Q' => 10, 'K' => 10);

        //Si el jugador tiene menos de 21 punto 
        if ($jugador->calcCards() + 11 > 21) {
            $cards['A'] = 1;
        }

        return $cards[$this->figura . ''];
    }
}
