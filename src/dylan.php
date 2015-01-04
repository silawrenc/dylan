<?php

namespace dylan;

function dylan(array $keys) {
    return function ($data) use ($keys) {
        return array_reduce($keys, function($out, $key) use ($data) {
            return call_user_func($key, $data) + $out;
        }, []);
    };
}
