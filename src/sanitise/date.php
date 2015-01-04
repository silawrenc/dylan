<?php

namespace dylan;

use DateInterval;
use DateTime;

function tomidnight() {
    return function(DateTime $date) {
        return $date->setTime(0,0,0);
    };
}

function addmilliseconds($count) {
    return function(DateTime $date) use ($count) {
        $seconds = $count/1000;
        return $date->add(new DateInterval("PT{$seconds}S"));
    };
}

function submilliseconds($count) {
    return function(DateTime $date) use ($count) {
        $seconds = $count/1000;
        return $date->sub(new DateInterval("PT{$seconds}S"));
    };
}

function addseconds($count) {
    return function(DateTime $date) use ($count) {
        return $date->add(new DateInterval("PT{$count}S"));
    };
}

function subseconds($count) {
    return function(DateTime $date) use ($count) {
        return $date->sub(new DateInterval("PT{$count}S"));
    };
}

function addminutes($count) {
    return function(DateTime $date) use ($count) {
        return $date->add(new DateInterval("PT{$count}M"));
    };
}

function subminutes($count) {
    return function(DateTime $date) use ($count) {
        return $date->sub(new DateInterval("PT{$count}M"));
    };
}

function addhours($count) {
    return function(DateTime $date) use ($count) {
        return $date->add(new DateInterval("PT{$count}H"));
    };
}

function subhours($count) {
    return function(DateTime $date) use ($count) {
        return $date->sub(new DateInterval("PT{$count}H"));
    };
}

function adddays($count) {
    return function(DateTime $date) use ($count) {
        return $date->add(new DateInterval("P{$count}D"));
    };
}

function subdays($count) {
    return function(DateTime $date) use ($count) {
        return $date->sub(new DateInterval("P{$count}D"));
    };
}

function addweeks($count) {
    return function(DateTime $date) use ($count) {
        return $date->add(new DateInterval("P{$count}W"));
    };
}

function subweeks($count) {
    return function(DateTime $date) use ($count) {
        return $date->sub(new DateInterval("P{$count}W"));
    };
}

function addmonths($count) {
    return function(DateTime $date) use ($count) {
        return $date->add(new DateInterval("P{$count}M"));
    };
}

function submonths($count) {
    return function(DateTime $date) use ($count) {
        return $date->sub(new DateInterval("P{$count}M"));
    };
}

function addyears($count) {
    return function(DateTime $date) use ($count) {
        return $date->add(new DateInterval("P{$count}Y"));
    };
}

function subyears($count) {
    return function(DateTime $date) use ($count) {
        return $date->sub(new DateInterval("P{$count}Y"));
    };
}
