<?php

namespace dylan;

function callables($fns) {
    return is_callable($fns) ? [$fns] : $fns;
}
