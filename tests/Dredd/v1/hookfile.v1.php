<?php

require_once __DIR__ . '/../dredd-hookfile-base.php';


$hooks = [
    \Tests\Dredd\v1\hooks\PostHook::class,
];

foreach ($hooks as $hook) {
    (new $hook())->handle();
}
