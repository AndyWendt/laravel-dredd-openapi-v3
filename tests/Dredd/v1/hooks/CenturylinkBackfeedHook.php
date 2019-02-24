<?php

namespace Tests\Dredd\v2\hooks;

use Tests\DisableSpecificMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Dredd\AbstractDreddHook;


class CenturylinkBackfeedHook extends AbstractDreddHook
{
    use DatabaseTransactions;
    use DisableSpecificMiddleware;

    public function handle()
    {
        $this->before('/v2/brands/{brand}/backfeed > *', 'backfeed');
    }

    public function backfeed(&$transaction)
    {
        $product1 = factory(\App\Models\Brands\Centurylink\Product::class)->create([
            'name' => 'CENTURYLINK HIGH-SPEED INTERNET 20M/896K'
        ]);

        $product2 = factory(\App\Models\Brands\Centurylink\Product::class)->create([
            'name' => 'CENTURYLINK 30 MINUTES LONG DISTANCE'
        ]);

        $transaction->fail = false;
    }
}
