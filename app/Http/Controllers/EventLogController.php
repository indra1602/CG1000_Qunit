<?php
namespace App\Http\Controllers;

use App\Models\EventLogModel;
use Datatables;
use Excel;

class EventLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengirim data EVENT_LOG ke view /event-log
        return view('/events-log');
    }

    public function data()
    {
        // mengambil data dari table EVENT_LOG
        $EVENT_LOG = EventLogModel::join('EVENT_LIST', 'EVENT_LIST.ID_EVENT', '=', 'EVENT_LOG.ID_EVENT')
            ->select('EVENT_LIST.NAME', 'EVENT_LOG.*')
            ->get();

        // mengirim data EVENT_LOG ke view /event-log
        return Datatables::of($EVENT_LOG)->make(true);
    }

    public function download($type)
    {
        $EVENT_LOG = EventLogModel::join('EVENT_LIST', 'EVENT_LIST.ID_EVENT', '=', 'EVENT_LOG.ID_EVENT')
            ->select('EVENT_LOG.TIME_STAMP', 'EVENT_LOG.EVENT', 
            'EVENT_LIST.NAME')
            ->get();
        $EventLogArray = [];
        $EventLogArray[] = ['TIME STAMP', 'EVENT', 'EVENT TYPE'];
        foreach ($EVENT_LOG as $EVENT_LOG) {
            $EventLogArray[] = $EVENT_LOG->toArray();
        }
        Excel::create('EVENT_LOG', function ($excel) use ($EventLogArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Event Log');
            $excel->setCreator('LEN-FEP')->setCompany('LEN Industri');
            $excel->setDescription('Event Log file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('events-log', function ($sheet) use ($EventLogArray) {
                $sheet->fromArray($EventLogArray, null, 'A1', false, false);
            });

        })->download($type);
    }
}
