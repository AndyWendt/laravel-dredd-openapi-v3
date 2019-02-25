<?php

namespace Tests\Dredd\v2\hooks;

use Dredd\Hooks;
use Tests\DisableSpecificMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Dredd\AbstractDreddHook;


class PostHook extends AbstractDreddHook
{
    use DatabaseTransactions;
    use DisableSpecificMiddleware;

    public function handle()
    {
        $this->before('/posts/{post_id} > *', 'show');
    }

    public function show(&$transaction)
    {
        $transaction->fail = true;
    }
}
