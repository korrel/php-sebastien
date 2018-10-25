<?php

/* Permet de formatter un prix */

function formatPrice($price) {

    $cent = substr($price, -2);
    $unité = substr($price, 0, -3);

    return $unité .'€<span class="card-price-cents"> ' . $cent .'</span>';

}

?>