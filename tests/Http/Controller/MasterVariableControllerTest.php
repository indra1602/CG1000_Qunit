<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\MasterVariableModel;
use App\Http\Controllers\MasterVariableController;

class MasterVariableControllerTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testIndex()
    {
        $indexTest = (new MasterVariableController())->index();
        $this->get('/variable-list/master-variable')->assertResponseStatus(302);
    }

    public function testData()
    {
        $dataTest = (new MasterVariableController())->data();
    }

    public function testStore()
    {
        // $SLV_ADDRESS = trim(fgets(STDIN));
        // $ID_MASTER = trim(fgets(STDIN));
        // $ID_SLOT = trim(fgets(STDIN));
        // $VARIABLE_NAME = trim(fgets(STDIN));
        // $TYPE = trim(fgets(STDIN));
        // $ADDRESS = trim(fgets(STDIN));
        // $ID_VARIABLE = "$ID_MASTER.$ID_SLOT.$ADDRESS";
        // $VALUE = "";

        $SLV_ADDRESS = '1.1.1';
        $ID_MASTER = 1;
        $ID_SLOT = 1;
        $VARIABLE_NAME = 'SLOT_1.COIL_1';
        $TYPE = 'INTEGER';
        $ADDRESS = 'SLOT_1.COIL_1';
        $ID_VARIABLE = "$ID_MASTER.$ID_SLOT.$ADDRESS";
        // $VALUE = "";
        
        // $storeTest = (new MasterVariableController())->store();

        $check_id = MasterVariableModel::select('ID_VARIABLE')
        ->where('ID_VARIABLE', '=', $ID_VARIABLE)
        ->count();
    
        if ($check_id == 1) {
            // alihkan halaman ke halaman /variable-list/slave-variable
            $this->visit('/variable-list/master-variable');
            echo "\n[Data already exist!]";
        } elseif ($check_id == 0) {
            if ($TYPE == 'BOOLEAN') {
                $VALUE = 'FALSE';
            } elseif ($TYPE == 'INTEGER') {
                $VALUE = 0;
            } elseif ($TYPE == 'REAL') {
                $VALUE = 0;
            } elseif ($TYPE == 'FLOAT') {
                $VALUE = 0;
            } elseif ($TYPE == 'STRING') {
                $VALUE = 0;
            }
            $master_variables = MasterVariableModel::insert([
                'ID_VARIABLE' => $ID_VARIABLE,
                'SLV_ADDRESS' => $SLV_ADDRESS,
                'ID_MASTER' => $ID_MASTER,
                'ID_SLOT' => $ID_SLOT,
                'VARIABLE_NAME' => $VARIABLE_NAME,
                'TYPE' => $TYPE,
                'ADDRESS' => $ADDRESS,
                'VALUE' => $VALUE,
            ]);
        }
        // alihkan halaman ke halaman /variable-list/master-variable
        $this->visit('/variable-list/master-variable');
        echo "\n[Data has ben added!]";
        $this-> assertResponseOK();
    }

    public function testDelete()
    {
        $ID_VARIABLE = trim(fgets(STDIN));
        $DeteTest = (new MasterVariableController())->delete($ID_VARIABLE);
    }

    public function testDeleteAll()
    {
        // $id = trim(fgets(STDIN));
        $ID_VARIABLES = ['1.1.SLOT_1.COIL_5', '1.1.SLOT_1.COIL_6'];
        $MASTER_VARIABLE = MasterVariableModel::whereIn('ID_VARIABLE', $ID_VARIABLES);
        if ($MASTER_VARIABLE->delete()) {
            echo 'Data Deleted';
        }
    }

    public function testDownload()
    {
        $type = trim(fgets(STDIN));
        if ($type == 0) {
            $response = $this->get('/variable-list/master-variable/download/csv');
            $this->assertResponseStatus(302);
        } elseif ($type == 1) {
            $response = $this->get('/variable-list/master-variable/download/xlsx');
            $this->assertResponseStatus(302);
        }
    }

    public function testImport()
    {
        $user = factory(App\User::class)->make();
        $response = $this->actingAs($user)
        ->visit('/variable-list/master-variable')
        ->attach('C:\Users\OnvifDriver\Downloads\Master Variable.xlsx',
        'import_file')
        ->press('Import');
        $this->assertResponseStatus(200);
    }
}
