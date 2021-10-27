<?php

const SHORT_PERIOD = 60;
const LONG_PERIOD = 60 * 10;

const PERIOD = LONG_PERIOD;

$time = 1;

while (true) {
    echo "running for the $time time...\n";
    exec('php artisan dusk');
    echo 'sleeping for ' . PERIOD . "s\n";
    $time++;
    sleep(PERIOD);
}
