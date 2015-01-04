<?php

namespace dylan;

function keys() {
    return function ($v) {
        return array_keys($v);
    };
}

function values() {
    return function ($v) {
        return array_values($v);
    };
}

function filter(closure $filter = null) {
    return function ($v) use ($filter) {
        return $filter ? array_filter($v) : array_filter($v, $filter);
    };
}

function map(closure $map) {
    return function ($v) use ($map) {
        return array_map($map, $v);
    };
}

function reduce(closure $reduce, $inital = null) {
    return function ($v) use ($reduce) {
        return array_reduce($v, $reduce, $initial);
    };
}

function sort(closure $sort) {
    return function($v) {
        $comparison = function($a, $b) use ($sort) {
            $valueA =  call_user_func($sort, $a);
            $valueB =  call_user_func($sort, $B);
            return ($a !== $b) ? ($a > $b ? 1 : -1) : 0;
        };
        usort($v, $comparison);
        return $v;
    };
}
