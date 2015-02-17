<?php

use GPIO\GPIO;
use GPIO\Pin\RaspberryPi;

include_once __DIR__ . '/bootstrap.php';

$deleyMS = (int)isSet($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : 1000;

$gpio = new GPIO();
$gpio->mode(\GPIO\Pin\RaspberryPi::PIN_17, GPIO::SET_PIN_MODE_OUT);

for ($isOn = true; true; $isOn = !$isOn) {
    $pinState = $isOn ? GPIO::SET_PIN_HIGH : GPIO::SET_PIN_LOW;

    $gpio->write(RaspberryPi::PIN_17, $pinState);

    usleep($deleyMS * 1000);
}