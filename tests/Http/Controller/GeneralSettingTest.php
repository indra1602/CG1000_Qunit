<?php

use App\Models\GeneralSettingModel;
use App\Models\HardwareSettingModel;
use App\Models\MasterConfigModel;
use App\Models\MasterProtocolsModel;
use App\Models\SlaveConfigModel;
use App\Models\SlaveProtocolsModel;

class GeneralSettingTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/general-setting');
        $this->assertResponseStatus(302);
    }

    public function testUpdate()
    {
        $user = factory(App\User::class)->make();
        $response = $this->actingAs($user)
            ->post('/general-setting/update', [
                'IP_HW' => '192.168.100.130',
                'SUBNET' => '255.255.255.0',
                'GATEWAY' => '192.168.100.1',
                'HW_NAME' => 'My_SilVue',
                'IP_MC' => '192.168.100.8',
                'ROUTER_ID' => '202'
            ]);
        $restartMain = app('App\Http\Controllers\RestartController')
            ->restartGeneralSetting();
        $this->visit('/general-setting')->assertResponseOk();
    }

    public function testUpdateRedundant()
    {
        $user = factory(App\User::class)->make();
        $response = $this->actingAs($user)
            ->post('/general-setting/update-reduncancy', [
                'IP_MAIN' => '192.168.100.135',
                'IP_BACKUP' => '192.168.100.131',
                'IP_REDUNDANT' => '192.168.100.221',
                'REDUNDANCY_TYPE' => '1'
            ]);
        $restartMain = app('App\Http\Controllers\RestartController')->restartGeneralSetting();
        $this->visit('/general-setting')->assertResponseOk();
    }

    public function testMasterConfig()
    {
        $user = factory(App\User::class)->make();
        $this->actingAs($user)
        ->post('/general-setting/master-config', [
            'MASTER_PORT' => '4840',
        ]);

        $this->visit('/general-setting')
            ->assertResponseOk();
    }
}
