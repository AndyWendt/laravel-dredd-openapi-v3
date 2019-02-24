<?php

namespace Tests\Dredd\v2\hooks;

use Dredd\Hooks;
use Tests\DisableSpecificMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Dredd\AbstractDreddHook;


class CustomerHook extends AbstractDreddHook
{
    use DatabaseTransactions;
    use DisableSpecificMiddleware;

    public function handle()
    {
        $this->before('/version-improved > Retrieves the application version > *', 'versionImprovedGet');
    }

    public function versionImprovedGet(&$transaction)
    {
        $transaction->fail = true;
    }
}
