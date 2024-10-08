<?php
// Impostare il tipo di contenuto JSON
header('Content-Type: application/json');

// Percorso del file dischi.json
$file = './data/dischi.json';

// Leggi il contenuto del file JSON
$data = file_get_contents($file);

// Restituisci il contenuto come JSON
echo $data;
