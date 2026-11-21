<?php

function calculer_rapport($ventes)
{
    $total = 0;
    $nombre = 0;
    $maximum = 0;
    $minimum = 999999;
    foreach ($ventes as $vente) {
        $total = $total + $vente;
        $nombre = $nombre + 1;
        if ($vente > $maximum) {
            $maximum = $vente;
        }
        if ($vente < $minimum) {
            $minimum = $vente;
        }
    }
    $moyenne = $total / $nombre;
    echo "Moyenne : " . $moyenne;
    echo "Maximum : " . $maximum;
    echo "Minimum : " . $minimum;
    $resultat = $moyenne * 100;
    $resultat = $resultat / 100;
    echo "Resultat : " . $resultat;
    return $resultat;
}
