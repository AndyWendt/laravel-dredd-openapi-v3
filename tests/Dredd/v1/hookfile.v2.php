<?php

require __DIR__ . '/../../../vendor/autoload.php';

$hooks = [
    \Tests\Dredd\v2\hooks\CenturylinkBackfeedHook::class,
    \Tests\Dredd\v2\hooks\LeadsHook::class,
];

foreach ($hooks as $hook) {
    (new $hook())->handle();
}
