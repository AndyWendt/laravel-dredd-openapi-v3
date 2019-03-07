<?php

namespace Tests\Dredd\v1\hooks;

use App\Post;
use Tests\Dredd\AbstractDreddHook;


class PostHook extends AbstractDreddHook
{
    public function handle()
    {
        $this->before('/api/posts/{post_id} > *', 'show');
        $this->before('/api/posts > *', 'index');
    }

    public function index(&$transaction)
    {
        Post::truncate();

        factory(Post::class)->create([
            'id' => 2,
            'name' => 'foobar',
            'text' => "foo bar baz ipsum",
        ]);

        $transaction->fail = false;
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
