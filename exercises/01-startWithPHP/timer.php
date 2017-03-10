<?php

class Timer {

    private $start_time = 0;

    function start() {
        $this->start_time = microtime(true);
        return $this->start_time;
    }

    function stop() {
        $this->stop_time = microtime(true);
        return $this->stop_time - $this->start_time;
    }

    function reset() {
        $this->start_time = 0;
        $this->stop_time = 0;
    }
}
