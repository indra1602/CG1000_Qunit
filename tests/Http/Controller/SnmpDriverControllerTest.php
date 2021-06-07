<?php

// use app\Models;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\SlaveModel;
use App\Http\Controllers\SnmpDriverControler;

class SnmpDriverControllerTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testIndex()
    {
        $indexTest = app('App\Http\Controllers\SnmpDriverController')->index();
        $this->get('/snmp-driver')->assertResponseStatus(302);
    }

    public function testUpdate()
    {
        $port = trim(fgets(STDIN));
        $userName = trim(fgets(STDIN));

        $user = factory(App\User::class)->make();
        $response = $this->actingAs($user)
        ->post('/snmp-driver/update',[
            'VALUE2' => $port,
            'VALUE3' => $userName,
        ])->assertResponseStatus(500);

        $this->visit('/snmp-driver')
        ->assertResponseStatus(200);
    }
}
