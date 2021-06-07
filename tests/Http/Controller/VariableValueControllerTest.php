<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\SlaveModel;
use App\Http\Controllers\VariableValueController;

class VariableValueControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->visit('/variable-list/variable-value')->assertResponseOK();
    }

    public function testData()
    {
        $dataTest = (new VariableValueController())->data();
    }

    public function testDownload()
    {
        $type = trim(fgets(STDIN));
        if ($type == 0) {
            $response = $this->get('/variable-list/variable-value/download/csv')->assertResponseStatus(302);
        } elseif ($type == 1) {
            $response = $this->get('/variable-list/variable-value/download/xlsx')->assertResponseStatus(302);
        }
    }
}
