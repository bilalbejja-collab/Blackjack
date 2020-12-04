<?php

namespace Blackjack;

use Blackjack\Carta;

include_once("../autoload.php");

/*
 * Clase BarajaInglesa
 * @author Bilal Bejja
 */
class BarajaInglesa extends Baraja
{
    static $palos = ["C", "D", "P", "T"];
    static $figuras = ["A", 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K"];

    public function __construct()
    {
        parent::__construct($this->generarMazo());
    }

    public function generarMazo()
    {
        $mazo = array();
        foreach (self::$palos as $palo) {
            foreach (self::$figuras as $figura) {
                $nueva_carta = new Carta($palo, $figura);
                $mazo[] = $nueva_carta;
            }
        }
        return $mazo;
    }

    public function repartirCarta()
    {
        // Obtengo el mazo
        $mazo = parent::barajar(); 
        
        // Reparte una carta y la borra del mazo
        $carta = array_pop($mazo);

        // Actalizamos el mazo
        parent::setMazo($mazo);

        return $carta;
    }
}
 