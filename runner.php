<?php

const ONE_HOUR = 60 * 60;
const SHORT_PERIOD = 60;
const LONG_PERIOD = ONE_HOUR;

const PERIOD = LONG_PERIOD;

$time = 1;

while (true) {
    echo "running for the $time time...\n";
    exec('php artisan dusk');
    echo 'sleeping for ' . PERIOD . "s\n";
    $time++;
    sleep(PERIOD);
}
