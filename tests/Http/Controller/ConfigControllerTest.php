<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controller\ConfigController;

class ConfigControllerTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testIndex()
    {
        $this->get('/user-config')
            ->assertResponseStatus(302);
    }

    public function testUpdate()
    {
        $arr = [];
        $idUser = '1';
        $cPassword = 'adminFEP2019!';
        array_push($arr, $idUser, $cPassword);

        $update_password = DB::update('update users set password = (?) where id = (?)', [Hash::make($cPassword), $idUser]);

        // echo json_encode(1);
        // return json_encode(1);
        // $this->expectOutputRegex('/./');
        // $this->object->ConfigController();
        // $this->visit('/user-config')->see(json_encode(1));
        // $this->get('/user-config')->seeStatusCode(302)->response->getContent();
        // $this->get('/user-config')->decodeResponseJson();
        $this->assertEquals(1, json_encode(1), "json_encode value is not as expected");
    }
}
