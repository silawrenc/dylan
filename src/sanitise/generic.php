<?php

namespace dylan;

function usedefault ($default) {
    return function($v) use ($default) {
        return $v === null ? $default : $v;
    };
}

function identity ($v) {
    return function($v) {
        return $v;
    };
}
