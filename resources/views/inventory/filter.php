<?php

// THE FOLLOWING FILE IS JUST A GENERAL REWORK OF THE JS LOGIC IMPLEMENTED IN THE PROVIDED
// VIEW FILE FOR THE INVENTORY SYSTEM

// MADE AT THE REQUEST OF ESAM TO PROVIDE SCALABILITY IN BEING ABLE TO REFACTOR ACCORDINGLY

$TYPE_COLOURS = 
[
    'BEAUTY' => 'bg-pink-100',
    'HEALTH' => 'bg-green-100',
    'HAIRCARE' => 'bg-purple-100',
    'SKINCARE' => 'bg-yellow-100',
    'BODYCARE' => 'bg-red-100',
    'MERCH' => 'bg-blue-100',
    'HOME' => 'bg-indigo-100'
];

$TYPE_ICONS = 
[
    'BEAUTY' => 'fa-spa',
    'HEALTH' => 'fa-heartbeat',
    'HAIRCARE' => 'fa-air-freshener',
    'SKINCARE' => 'fa-pump-soap',
    'BODYCARE' => 'fa-shower',
    'MERCH' => 'fa-tshirt',
    'HOME' => 'fa-home'
];

function GENERATE_CARD_HTML($PRODUCT, $TYPE_ICONS)
{
    $stock_level = $PRODUCT['stock_level'];

    [$STATUS, $COLOUR] = $stock_level === 0 
    ? ['Out of Stock', 'text-red-400']
    : ($stock_level < 6
        ? ['Extremely Low', 'text-red-500']
        : ($stock_level < 20
            ? ['Running Low', 'text-amber-600']
            : ['Sufficient Stock', 'text-green-600']
        )
    );
}

?>
