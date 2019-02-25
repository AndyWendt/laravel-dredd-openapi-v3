<?php

namespace Tests\Dredd\v1\hooks;

use Dredd\Hooks;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Dredd\AbstractDreddHook;


class PostHook extends AbstractDreddHook
{
    use DatabaseTransactions;

    public function handle()
    {
        $this->before('/posts/{post_id} > *', 'show');
    }

    public function show(&$transaction)
    {
        $transaction->fail = true;
    }
}
