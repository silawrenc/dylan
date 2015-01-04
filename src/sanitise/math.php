<?php

namespace dylan;

function floor() {
    return 'floor';
}

function ceiling() {
    return 'ceil';
}

function absolute() {
    return 'abs';
}

function modulo($mod) {
    return function ($v) use ($mod) {
        return ($v+$mod) % $mod;
    };
}

function add($add) {
    return function ($v) use ($add) {
        return $add + $v;
    };
}

function subtract($sub) {
    return function ($v) use ($sub) {
        return $v - $sub;
    };
}

function multiply($multiply) {
    return function ($v) use ($multiply) {
        return $v * $multiply;
    };
}

function divide($divide) {
    return function ($v) use ($divide) {
        return $v / $divide;
    };
}

function negate() {
    return function ($v) {
        return -$v;
    };
}
