<?php

namespace dylan;

function uppercase() {
    return function ($v) {
        return strtoupper($v);
    };
}

function lowercase() {
    return function ($v) {
        return strtolower($v);
    };
}

function titlecase() {
    return function ($v) {
        return ucwords($v);
    };
}

function sentencecase() {
    return function ($v) {
        return ucfirst($v);
    };
}

function trim() {
    return 'trim';
}
