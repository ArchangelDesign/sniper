<?php

const PERIOD = 60 * 10;
const SHORT_PERIOD = 60;

$time = 1;

while (true) {
    echo "running for the $time time...\n";
    exec('php artisan dusk');
    echo 'sleeping for ' . PERIOD . "s\n";
    $time++;
    sleep(PERIOD);
}
