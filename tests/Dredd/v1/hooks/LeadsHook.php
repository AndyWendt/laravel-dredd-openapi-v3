<?php

namespace Tests\Dredd\v2\hooks;

use Dredd\Hooks;
use Tests\DisableSpecificMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Dredd\AbstractDreddHook;


class LeadsHook extends AbstractDreddHook
{
    use DatabaseTransactions;
    use DisableSpecificMiddleware;

    public function handle()
    {
        $this->before('/v2/leads > Creates a lead order > *', 'leads');
    }

    public function leads(&$transaction)
    {
        factory(\App\Models\Brand::class)->create([
            'name' => 'verizon',
        ]);

        $transaction->fail = false;
    }
}
