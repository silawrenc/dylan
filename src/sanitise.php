<?php

namespace dylan;

function sanitise($value, $rules) {
    $rules = callables($rules);
    return array_reduce($rules, function($value, $rule) {
        return call_user_func($rule, $value);
    }, $value);
}
