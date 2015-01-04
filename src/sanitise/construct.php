<?php

namespace dylan;

function all($rule) {
    return function($keys) use ($rule) {
        $keys = func_get_args();
        return array_map(function($key) use ($rule) {
            return call_user_func($rule, $key);
        }, $keys);
    };
}
