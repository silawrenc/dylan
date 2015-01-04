<?php

namespace dylan;

function tostring() {
    return function ($v) {
        return (string) $v;
    };
}

function tointeger() {
    return function ($v) {
        return (int) $v;
    };
}

function toboolean() {
    return function ($v) {
        return (bool) $v;
    };
}

function toarray() {
    return function ($v) {
        return (array) $v;
    };
}

function tofloat() {
    return function ($v) {
        return (float) $v;
    };
}

function todatetime ($format = null) {
    return function ($v) use ($format) {
        return $format ? Datetime::createFromFormat($v, $format) : new Datetime($v);
    };
}
