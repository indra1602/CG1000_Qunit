<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RestartControllerTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testRestart()
    {
        $restartMain = app('App\Http\Controllers\RestartController')->restart();
    }
}
