<?php

namespace dylan;

function sum() {
    return function ($a, $b) {
        return $a + $b;
    };
}

function difference() {
    return function ($a, $b) {
        return $a - $b;
    };
}
