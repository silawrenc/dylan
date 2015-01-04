<?php

namespace dylan;

function key($key, $callable = null, $inputs = null) {
    $inputs = (array) ($inputs ?: $key);
    $callables = callables($callable ?: identity());
    return function ($data) use ($key, $callables, $inputs) {
        $values = [];
        foreach ($inputs as $input) {
            $values[$input] = array_key_exists($input, $data) ? $data[$input] : null;
        }
        $return = array_reduce($callables, function($values, callable $callable) {
            return call_user_func_array($callable, (array) $values);
        }, $values);
        return [$key => $return];
    };
}
