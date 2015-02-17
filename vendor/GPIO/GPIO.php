<?php

namespace GPIO;

class GPIO
{
    const SET_PIN_MODE_IN = 'in';
    const SET_PIN_MODE_OUT = 'out';
    const SET_PIN_MODE_PWM = 'pwm';
    const SET_PIN_MODE_UP = 'up';
    const SET_PIN_MODE_DOWN = 'down';
    const SET_PIN_MODE_TRI = 'tri';

    const SET_PIN_HIGH = 1;
    const SET_PIN_LOW = 0;

    public function mode($pin, $mode)
    {
        $cmd = sprintf('gpio mode %d %s', $pin, $mode);
        exec($cmd);
    }

    public function write($pin, $state)
    {
        $cmd = sprintf('gpio write %d %d', $pin, $state);
        exec($cmd);
    }

    /**
     * @param $pin
     * @return int
     * @throws \Exception
     */
    public function read($pin)
    {
        $cmd = sprintf('gpio read %d ', $pin);
        $state = exec($cmd);

        if ($state == self::SET_PIN_HIGH) {
            return self::SET_PIN_HIGH;
        } else if ($state == self::SET_PIN_LOW) {
            return self::SET_PIN_LOW;
        }

        throw new \Exception('unknow pin ' . $pin . ' state: ' . $state);
    }
}