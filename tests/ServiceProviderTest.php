<?php

use Mockery as m;
use Recca0120\Upload\Manager;
use Recca0120\Upload\ServiceProvider;

class ServiceProviderTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testServiceProvider()
    {
        /*
        |------------------------------------------------------------
        | Set
        |------------------------------------------------------------
        */

        $app = m::mock(ApplictionContract::class);

        /*
        |------------------------------------------------------------
        | Expectation
        |------------------------------------------------------------
        */

        $app
            ->shouldReceive('singleton')->with('ajaxupload', m::type(Closure::class))->once()
            ->shouldReceive('singleton')->with(Manager::class, m::type(Closure::class))->once();

        /*
        |------------------------------------------------------------
        | Assertion
        |------------------------------------------------------------
        */

        $serviceProvider = new ServiceProvider($app);
        $serviceProvider->register();
    }
}