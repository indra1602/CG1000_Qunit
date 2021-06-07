<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\RcbModel;
use App\Http\Controllers\RcbController;

class RcbControllerTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testIndex()
    {
        $indexTest = (new RcbController())->index();
        $this->get('/variable-list/rcb-variable')->assertResponseStatus(302);
    }

    public function testData()
    {
        $dataTest = (new RcbController())->data();
    }

    public function testDataTmpRcb()
    {
        $dataTmpRcbTest = (new RcbController())->dataTmpRcb();
    }

    public function testInsertDataRcb()
    {
        $slot = trim(fgets(STDIN));
        $id = ['1.1.9', '1.1.8'];
        if ($slot == 1){
            try {
                $host = "127.0.0.1";
                $port = 235;
                $message = "%";
                // echo "Message To server :".$message;
                // create socket
                $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
                // connect to server
                $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
                // send string to server
                socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
                // get server response
                $result = socket_read($socket, 1024) or die("Could not read server response\n");
                foreach ($id as $row => $values) {
                    $delete_data_rcb_tmp = DB::delete('DELETE FROM `rcb_variables` WHERE ID_VARIABLE = (?)', ["$values"]);
                    //insert
                    $insert_data = DB::statement('INSERT INTO rcb_variables (ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE) SELECT ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE FROM rcb_variables_tmp WHERE ID_VARIABLE = (?)', [$values]);
                }
                echo "Reply From Server  :" . $result;
                // close socket
                socket_close($socket);
                echo "\nSending data succesfully!";
            } catch (\Exception $ex) {
                echo "\nSomething wrong. Sending data failed.";
            }
        } elseif($slot == 2) {
            try {
                $host = "127.0.0.1";
                $port = 235;
                $message = "^";
                // echo "Message To server :".$message;
                // create socket
                $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
                // connect to server
                $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
                // send string to server
                socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
                // get server response
                $result = socket_read($socket, 1024) or die("Could not read server response\n");
                foreach ($id as $row => $values) {
                    $delete_data_rcb_tmp = DB::delete('DELETE FROM `rcb_variables` WHERE ID_VARIABLE = (?)', ["$values"]);
                    //insert
                    $insert_data = DB::statement('INSERT INTO rcb_variables (ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE) SELECT ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE FROM rcb_variables_tmp WHERE ID_VARIABLE = (?)', [$values]);
                }
                echo "Reply From Server  :" . $result;
                // close socket
                socket_close($socket);
                echo "\nSending data succesfully!";
            } catch (\Exception $ex) {
                echo "\nSomething wrong. Sending data failed.";
            }
        } elseif ($slot == 3){
            try {
                $host = "127.0.0.1";
                $port = 235;
                $message = "&";
                // echo "Message To server :".$message;
                // create socket
                $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
                // connect to server
                $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
                // send string to server
                socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
                // get server response
                $result = socket_read($socket, 1024) or die("Could not read server response\n");
                foreach ($id as $row => $values) {
                    $delete_data_rcb_tmp = DB::delete('DELETE FROM `rcb_variables` WHERE ID_VARIABLE = (?)', ["$values"]);
                    //insert
                    $insert_data = DB::statement('INSERT INTO rcb_variables (ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE) SELECT ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE FROM rcb_variables_tmp WHERE ID_VARIABLE = (?)', [$values]);
                }
                echo "Reply From Server  :" . $result;
                // close socket
                socket_close($socket);
                echo "\nSending data succesfully!";
            } catch (\Exception $ex) {
                echo "\nSomething wrong. Sending data failed.";
            }
        } elseif ($slot == 4) {
            try {
                $host = "127.0.0.1";
                $port = 235;
                $message = "*";
                // echo "Message To server :".$message;
                // create socket
                $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
                // connect to server
                $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
                // send string to server
                socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
                // get server response
                $result = socket_read($socket, 1024) or die("Could not read server response\n");
                foreach ($id as $row => $values) {
                    $delete_data_rcb_tmp = DB::delete('DELETE FROM `rcb_variables` WHERE ID_VARIABLE = (?)', ["$values"]);
                    //insert
                    $insert_data = DB::statement('INSERT INTO rcb_variables (ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE) SELECT ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE FROM rcb_variables_tmp WHERE ID_VARIABLE = (?)', [$values]);
                }
                echo "Reply From Server  :" . $result;
                // close socket
                socket_close($socket);
                echo "\nSending data succesfully!";
            } catch (\Exception $ex) {
                echo "\nSomething wrong. Sending data failed.";
            }
        }
    }

    public function testDelete()
    {
        $ID_VARIABLE = trim(fgets(STDIN));
        $response = (new RcbController())->delete($ID_VARIABLE);
    }

    public function testDeleteAll()
    {
        $ID_VARIABLES = ['1.1.5', '1.1.6'];
        
        $IEC_VARIABLE = RcbModel::whereIn('ID_VARIABLE', $ID_VARIABLES);
        if ($IEC_VARIABLE->delete()) {
            echo 'Data Deleted';
        } else{
            echo "Data is not deleted";
        }
    }

    public function testUpdate()
    {
        $ID_VARIABLE = trim(fgets(STDIN)); 
        $ID_SLAVE = trim(fgets(STDIN));
        $ID_SLOT = trim(fgets(STDIN));
        $VARIABLE_NAME = trim(fgets(STDIN));
        $TYPE = trim(fgets(STDIN));
        $ACCESS = trim(fgets(STDIN));
        $ADDRESS = trim(fgets(STDIN));

        $user = factory(App\User::class)->make();
        $response = $this->actingAs($user)
        ->post('/variable-list/rcb-variable/update', [
            // 'ID_VARIABLE' => '1.1.100',
            // 'ID_SLAVE' => '3',
            // 'ID_SLOT' => '2',
            // 'VARIABLE_NAME' => 'zUK1/Q0MMXU1.PhV.phsA.cVal.mag.f',
            // 'TYPE' => 'REAL',
            // 'ACCESS' => '1',
            // 'ADDRESS' => 'zUK1/Q0MMXU1.PhV.phsA.cVal.mag.f',
            'ID_VARIABLE' => $ID_VARIABLE,
            'ID_SLAVE' => $ID_SLAVE,
            'ID_SLOT' => $ID_SLOT,
            'VARIABLE_NAME' => $VARIABLE_NAME,
            'TYPE' => $TYPE,
            'ACCESS' => $ACCESS,
            'ADDRESS' => $ADDRESS,
        ]);
        $this->visit('/variable-list/rcb-variable')
        ->assertResponseOk();
    }

    public function testDownload()
    {
        $type = trim(fgets(STDIN));
        if ($type == 0) {
            $response = $this->get('/variable-list/rcb-variable/download/csv');
            $this->assertResponseStatus(302);
        } elseif ($type == 1) {
            $response = $this->get('/variable-list/rcb-variable/download/xlsx');
            $this->assertResponseStatus(302);
        }
    }

    public function testImport()
    {
        $user = factory(App\User::class)->make();
        $response = $this->actingAs($user)
        ->visit('/variable-list/rcb-variable')
        ->attach('C:\Users\OnvifDriver\Downloads\Rcb Variable.xlsx','import_file')
        ->press('Import');
        $this->assertResponseStatus(200);
    }    
}
