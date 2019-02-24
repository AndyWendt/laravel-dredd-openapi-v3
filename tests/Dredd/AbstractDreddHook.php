<?php

namespace Tests\Dredd;

use Dredd\Hooks;
use Tests\DisableSpecificMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;


abstract class AbstractDreddHook extends TestCase
{
    use DatabaseTransactions;
    use DisableSpecificMiddleware;

    abstract public function handle();

    protected function before(string $path, $methodOrCallable)
    {
        $this->createApplication();
        $this->setUp();

        if (is_callable($methodOrCallable)) {
            return Hooks::before($path, $methodOrCallable);
        }

        $this->methodExists($methodOrCallable);
        Hooks::before($path, function(&$transaction) use ($methodOrCallable) {
            return $this->{$methodOrCallable}($transaction);
        });
    }

    private function methodExists(string $methodName)
    {
        if (!method_exists($this, $methodName)) {
            throw new \InvalidArgumentException(sprintf('Method does not exist: %s::%s', get_class($this), $methodName));
        }
    }
}
