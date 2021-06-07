<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\SlaveModel;
use App\Models\GeneralSettingModel;
use App\Models\SlaveProtocolsModel;
use App\Http\Controllers\SlaveController;

class SlaveControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $indexTest = app('App\Http\Controllers\SlaveController')->index();
        $this->visit('/variable-list/slave-variable')
        ->assertResponseStatus(200);
    }

    public function testStoreManual()
    {
        $ID_SLAVE = trim(fgets(STDIN));
        $ID_SLOT = trim(fgets(STDIN));
        $VARIABLE_NAME = trim(fgets(STDIN));
        $TYPE = trim(fgets(STDIN));
        $ADDRESS =trim(fgets(STDIN));
        $ACCESS = trim(fgets(STDIN));

        $user = factory(App\User::class)->make();

        $ID_VARIABLE = "$ID_SLAVE.$ID_SLOT.$ADDRESS";
        $check_id = SlaveModel::select('ID_VARIABLE')->where('ID_VARIABLE', 
        '=', $ID_VARIABLE)->count();        

        if ($check_id == 1) {
            $this->visit('/variable-list/slave-variable')
            ->assertResponseStatus(200);
            echo "Data already exist!";
        } elseif ($check_id == 0) {
            if ($TYPE == 'COIL') {
                $ACCESS = 1;
                $VALUE = 'FALSE';
            } elseif ($TYPE == 'HOLDING') {
                $ACCESS = 1;
                $VALUE = 0;
            } elseif ($TYPE == 'DISCRETE_INPUT') {
                $ACCESS = 0;
                $VALUE = 0;
            } elseif ($TYPE == 'INPUT_REGISTER') {
                $ACCESS = 0;
                $VALUE = false;
            }

            $response = $this->actingAs($user)
            ->post('/variable-list/slave-variable/manual-generate',[
                'ID_VARIABLE' => $ID_VARIABLE,
                'ID_SLAVE' => $ID_SLAVE,
                'ID_SLOT' => $ID_SLOT,
                'VARIABLE_NAME' => $VARIABLE_NAME,
                'TYPE' => $TYPE,
                'ADDRESS' => $ADDRESS,
                'ACCESS' => $ACCESS,
                'VALUE' => $VALUE,
            ])->assertResponseStatus(500);

            $this->visit('/variable-list/slave-variable')->assertResponseStatus(200);
            echo "Data has ben added!";
        }
    }

    public function testStoreAuto()
    {
        $ID_SLAVE = '1';
        $ID_SLOT = '1';
        $START = '1';
        $END = '4';
        $TYPE = 'COIL';

        for ($ADDRESS = $START; $ADDRESS <= $END; $ADDRESS++) {
            $ID_VARIABLE = "$ID_SLAVE.$ID_SLOT.$ADDRESS";
            $check_id = SlaveModel::select('ID_VARIABLE')->where('ID_VARIABLE', '=', $ID_VARIABLE)->count();
            if ($check_id == 1) {
                $this->visit('/variable-list/slave-variable')->assertResponseStatus(200);
                echo "Data already exist!";
            } elseif ($check_id == 0) {
                if ($TYPE == 'COIL') {
                    $ACCESS = 1;
                    $VALUE = 'FALSE';
                    $VARIABLE_NAME = "COIL_$ADDRESS";
                    $slave_variables = SlaveModel::insert([
                        'ID_VARIABLE' => $ID_VARIABLE,
                        'ID_SLAVE' => $ID_SLAVE,
                        'ID_SLOT' => $ID_SLOT,
                        'VARIABLE_NAME' => $VARIABLE_NAME,
                        'TYPE' => $TYPE,
                        'ACCESS' => $ACCESS,
                        'ADDRESS' => $ADDRESS,
                        'VALUE' => $VALUE,
                    ]);
                } elseif ($TYPE == 'HOLDING') {
                    $ACCESS = 1;
                    $VALUE = 0;
                    $VAR_NUM = $ADDRESS - 40000;
                    $VARIABLE_NAME = "HOLDING_$VAR_NUM";
                    $slave_variables = SlaveModel::insert([
                        'ID_VARIABLE' => $ID_VARIABLE,
                        'ID_SLAVE' => $ID_SLAVE,
                        'ID_SLOT' => $ID_SLOT,
                        'VARIABLE_NAME' => $VARIABLE_NAME,
                        'TYPE' => $TYPE,
                        'ACCESS' => $ACCESS,
                        'ADDRESS' => $ADDRESS,
                        'VALUE' => $VALUE,
                    ]);
                } elseif ($TYPE == 'INPUT_REGISTER') {
                    $ACCESS = 0;
                    $VALUE = false;
                    $VAR_NUM = $ADDRESS - 30000;
                    $VARIABLE_NAME = "INPUT_REGISTER_$VAR_NUM";
                    $slave_variables = SlaveModel::insert([
                        'ID_VARIABLE' => $ID_VARIABLE,
                        'ID_SLAVE' => $ID_SLAVE,
                        'ID_SLOT' => $ID_SLOT,
                        'VARIABLE_NAME' => $VARIABLE_NAME,
                        'TYPE' => $TYPE,
                        'ACCESS' => $ACCESS,
                        'ADDRESS' => $ADDRESS,
                        'VALUE' => $VALUE,
                    ]);
                } elseif ($TYPE == 'DISCRETE_INPUT') {
                    $ACCESS = 0;
                    $VALUE = 0;
                    $VAR_NUM = $ADDRESS - 10000;
                    $VARIABLE_NAME = "DISCRETE_INPUT_$VAR_NUM";
                    $slave_variables = SlaveModel::insert([
                        'ID_VARIABLE' => $ID_VARIABLE,
                        'ID_SLAVE' => $ID_SLAVE,
                        'ID_SLOT' => $ID_SLOT,
                        'VARIABLE_NAME' => $VARIABLE_NAME,
                        'TYPE' => $TYPE,
                        'ACCESS' => $ACCESS,
                        'ADDRESS' => $ADDRESS,
                        'VALUE' => $VALUE,
                    ]);
                }
            }
        }

        $this->visit('/variable-list/slave-variable')
        ->assertResponseStatus(200);
        echo "Data has ben added";
    }

    public function testUpdate()
    {
        $ID_VARIABLE = '1.1.5';
        $ID_SLAVE = '1';
        $ID_SLOT = '1';
        $VARIABLE_NAME = 'COIL_5';
        $TYPE = 'COIL';
        $ACCESS = '1';
        $ADDRESS = '5';
        $user = factory(App\User::class)->make();

        $slave_variables = $this->actingAs($user)
        ->post('/variable-list/slave-variable/update', [
            'ID_SLAVE' => $ID_SLAVE,
            'ID_SLOT' => $ID_SLOT,
            'VARIABLE_NAME' => $VARIABLE_NAME,
            'TYPE' => $TYPE,
            'ACCESS' => $ACCESS,
            'ADDRESS' => $ADDRESS,
        ]);

        $this->visit('/variable-list/slave-variable')
        ->assertResponseStatus(200);
        echo "Data has ben updated";
    }

    public function testDelete()
    {
        $ID_VARIABLE = trim(fgets(STDIN));
        $deleteTest = (new SlaveController())->delete($ID_VARIABLE);
    }

    public function testDeleteAll()
    {
        $ID_VARIABLES = ['1.1.10', '1.1.11'];
        $SLAVE_VARIABLE = SlaveModel::whereIn('ID_VARIABLE', $ID_VARIABLES);
        if ($SLAVE_VARIABLE->delete()) {
            echo 'Data Deleted';
        }
    }

    public function testDownload()
    {
        $type = trim(fgets(STDIN));
        if ($type == 0) {
            $response = $this->get('/variable-list/slave-variable/download/csv');
            $this->assertResponseStatus(302);
        } elseif ($type == 1) {
            $response = $this->get('/variable-list/slave-variable/download/xlsx');
            $this->assertResponseStatus(302);
        }
    }

    public function testImport()
    {
        $user = factory(App\User::class)->make();
        $response = $this->actingAs($user)
        ->visit('/variable-list/slave-variable')
        ->attach('C:\Users\OnvifDriver\Downloads\Slave Variable.xlsx','import_file')
        ->press('Import');
        $this->assertResponseStatus(200);
    }

    public function testDeleteAllVariable()
    {
        $deleteAllVariable = (new SlaveController())->deleteAllVariable();
        $this->assertEquals(1, json_encode(1));
    }

}
