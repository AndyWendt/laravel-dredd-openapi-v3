<?php

namespace Tests\Dredd\v1\hooks;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Dredd\AbstractDreddHook;


class PostHook extends AbstractDreddHook
{
    use DatabaseTransactions;

    public function handle()
    {
        $this->before('/api/posts/{post_id} > *', 'show');
    }

    public function show(&$transaction)
    {
        Post::truncate();
        factory(Post::class)->create([
            'id' => 1,
            'name' => 'foobar',
            'text' => "foo bar baz ipsum",
        ]);

        $transaction->fail = false;
    }
}
