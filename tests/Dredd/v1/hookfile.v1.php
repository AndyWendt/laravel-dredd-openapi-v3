<?php

require __DIR__ . '/../../../vendor/autoload.php';

$hooks = [
    \Tests\Dredd\v1\hooks\PostHook::class,
];

foreach ($hooks as $hook) {
    (new $hook())->handle();
}
