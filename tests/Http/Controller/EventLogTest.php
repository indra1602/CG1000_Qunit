<?php

use App\Http\Controllers\EventLogController;

class EventLogTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/events-log')
            ->assertResponseStatus(302);
    }

    public function testData()
    {
        $testDatas = app('App\Http\Controllers\EventLogController')->data();
        $this->assertTrue();
    }

    public function testDownload()
    {
        $type = trim(fgets(STDIN));
        if ($type == 0) {
            $response = $this->get('/variable-list/iec-variable/download/csv');
            $this->assertResponseStatus(302);
        } elseif ($type == 1) {
            $response = $this->get('/variable-list/iec-variable/download/xlsx');
            $this->assertResponseStatus(302);
        }
    }
}
