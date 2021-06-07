<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Http\Controllers\MqttDriverController;

class MqttDriverControllerTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testIndex()
    {
        $indexTest = (new MqttDriverController())->index();
        $this->get('/mqtt-driver')->assertResponseStatus(302);
    }

    public function testUpdate()
    {
        $port = trim(fgets(STDIN));
        $qos = trim(fgets(STDIN));
        $clientId = trim(fgets(STDIN));
        $username = trim(fgets(STDIN));
        $password = trim(fgets(STDIN));

        $user = factory(App\User::class)->make();
        $response = $this->actingAs($user)
        ->call('POST', '/mqtt-driver/update', [
            // 'VALUE1' => '1883',
            // 'VALUE2' => '1',
            // 'VALUE3' => 'mqttdrivers',
            // 'VALUE4' => 'omzedtyt',
            // 'VALUE5' => '85f72pXheP-N',

            'VALUE1' => $port,
            'VALUE2' => $qos,
            'VALUE3' => $clientId,
            'VALUE4' => $username,
            'VALUE5' => $password,
            ]);
        $this->visit('/mqtt-driver');
        echo "The data was updated successfully";
        $this->assertResponseStatus(200);
    }
}
