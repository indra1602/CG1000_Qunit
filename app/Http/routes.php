<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Route::group(['middleware' => 'auth'], function () {
    /*
    |--------------------------------------------------------------------------
    | >>>>>>>>>> DATABASE <<<<<<<<<<
    |--------------------------------------------------------------------------
    |
    | Route for access to database
    |
    */

    /*
    |--------------------------------------------------------------------------
    |    HOME
    |--------------------------------------------------------------------------
    */
    //Read data from table GENERAL_SETTING to view /home

    Route::get('/home','HomeController@index');

    /*
    |--------------------------------------------------------------------------
    |    SLAVE VARIABLE
    |--------------------------------------------------------------------------
    */
    //Read data from table SLAVE_VARIABLES to view /variable-list/slave-variable
    Route::get('/variable-list/slave-variable', 'SlaveController@index');
    Route::get('/variable-list/slave-variable/data-slave-variable', 'SlaveController@data');

    //Menyimpan inputan data dari form Manually Generated
    Route::post('/variable-list/slave-variable/manual-generate', 'SlaveController@storeManual');

    //Update data dari table slave_variables
    Route::post('/variable-list/slave-variable/update', 'SlaveController@update');

    //Delete data dari table slave_variables
    Route::get('/variable-list/slave-variable/delete/{ID_VARIABLE}', 'SlaveController@delete');
    Route::get('/variable-list/slave-variable/delete-all', 'SlaveController@deleteAll');

    //Menyimpan inputan data dari form Manually Generated
    Route::post('/variable-list/slave-variable/auto-generate', 'SlaveController@storeAuto');

    Route::get('/variable-list/slave-variable/download/{type}', 'SlaveController@download');
    Route::post('/variable-list/slave-variable/import', 'SlaveController@import');
    
    Route::get('/variable-list/slave-variable/delete-all-Variable', 'SlaveController@deleteAllVariable');
    
    /*
    |--------------------------------------------------------------------------
    |    REGISTER
    |--------------------------------------------------------------------------
    */
    // Route::get('/user-data-config', 'ConfigController@index');
    // Route::get('/change-password/data', 'BebasController@data');
    // Route::post('/user-data/data/update', 'ChangePassword@update');
    Route::get('/user-config', 'ConfigController@index');
    // Route::post('/user-config/update', 'ConfigController@update');
    Route::get('/user-config/update', 'ConfigController@update');

    /*
    |--------------------------------------------------------------------------
    |    MASTER VARIABLE
    |--------------------------------------------------------------------------
    */
    //Read from table MASTER_VARIABLES and SLAVE_VARIABLES to view /variable-list/master-variable
    Route::get('/variable-list/master-variable', 'MasterVariableController@index');
    Route::get('/variable-list/master-variable/data', 'MasterVariableController@data');

    //Add data to table MASTER_VARIABLES from modal in view /variable-list/master-variable/add
    Route::post('/variable-list/master-variable/add', 'MasterVariableController@store');

    //Delete data from table MASTER_VARIABLES
    Route::get('/variable-list/master-variable/delete/{ID_VARIABLE}', 'MasterVariableController@delete');
    Route::get('/variable-list/master-variable/delete-all', 'MasterVariableController@deleteAll');
    
    Route::get('/variable-list/master-variable/delete-all-variable', 'MasterVariableController@deleteAllMasterVariable');

    Route::get('/variable-list/master-variable/download/{type}', 'MasterVariableController@download');
    Route::post('/variable-list/master-variable/import', 'MasterVariableController@import');

    /*
    |--------------------------------------------------------------------------
    |    IEC VARIABLE
    |--------------------------------------------------------------------------
    */
    //Read data from table IEC_VARIABLES to view /variable-list/iec-variable
    Route::get('/variable-list/iec-variable', 'IecController@index');
    Route::get('/variable-list/iec-variable/data-iec-variable', 'IecController@data');

    //Update data dari table slave_variables
    Route::post('/variable-list/iec-variable/update', 'IecController@update');

    //Delete data from table IEC_VARIABLES
    Route::get('/variable-list/iec-variable/delete/{ID_VARIABLE}', 'IecController@delete');
    Route::get('/variable-list/iec-variable/delete-all', 'IecController@deleteAll');

    Route::get('/variable-list/iec-variable/download/{type}', 'IecController@download');
    Route::post('/variable-list/iec-variable/import', 'IecController@import');
    
    Route::get('/variable-list/iec-variable/delete-all-variable','IecController@deleteAllVariable');
    /*
    |--------------------------------------------------------------------------
    |    RCB VARIABLE
    |--------------------------------------------------------------------------
    */
    //Read data from table RCB_VARIABLES to view /variable-list/rcb-variable
    Route::get('/variable-list/rcb-variable', 'RcbController@index');
    Route::get('/variable-list/rcb-variable/data-rcb-variable', 'RcbController@data');

    //Update data dari table slave_variables
    Route::post('/variable-list/rcb-variable/update', 'RcbController@update');

    //Delete data from table IEC_VARIABLES
    Route::get('/variable-list/rcb-variable/delete/{ID_VARIABLE}', 'RcbController@delete');
    Route::get('/variable-list/rcb-variable/delete-all', 'RcbController@deleteAll');

    Route::get('/variable-list/rcb-variable/download/{type}', 'RcbController@download');
    Route::post('/variable-list/rcb-variable/import', 'RcbController@import');

    Route::get('/variable-list/ip-rcb', 'RcbController@showIdRcb');

    Route::get('/variable-list/rcb-tmp-variable/data', 'RcbController@dataTmpRcb');
    // Route::get('/variable-list/rcb-tmp-variable/copySatu', 'RcbController@copyTmpRcbSatu');
    // Route::get('/variable-list/rcb-tmp-variable/copyDua', 'RcbController@copyTmpRcbDua');
    // Route::get('/variable-list/rcb-tmp-variable/copyTiga', 'RcbController@copyTmpRcbTiga');
    // Route::get('/variable-list/rcb-tmp-variable/copyEmpat',
    // 'RcbController@copyTmpRcbEmpat');
    Route::get('/variable-list/rcb-tmp-variable/rcb-satu', 'RcbController@rcbSatu');
    Route::get('/variable-list/rcb-tmp-variable/rcb-dua', 'RcbController@rcbDua');
    Route::get('/variable-list/rcb-tmp-variable/rcb-tiga', 'RcbController@rcbTiga');
    Route::get('/variable-list/rcb-tmp-variable/rcb-empat', 'RcbController@rcbEmpat');
    
    Route::get('/variable-list/rcb-tmp-variable/import-browse-rcb', 'RcbController@importBrowseRcb');
    Route::get('/variable-list/rcb-variable/delete-all-variable', 'RcbController@deleteAllVariable');

    /*
    |--------------------------------------------------------------------------
    |    VARIABLE VALUE
    |--------------------------------------------------------------------------
    */
    //Read data from table SLAVE_VARIABLES to view /variable-list/variable-value
    Route::get('/variable-list/variable-value', 'VariableValueController@index');
    Route::get('/variable-list/variable-value/data', 'VariableValueController@data');
    
    Route::get('/variable-list/variable-value/download/{type}', 'VariableValueController@download');

    /*
    |--------------------------------------------------------------------------
    |    GENERAL SETTING
    |--------------------------------------------------------------------------
    */
    //Read from table GENERAL_SETTING to view /general-setting (include form and detail slot)
    Route::get('/general-setting', 'GeneralSettingController@index');

    //Update table GENERAL_SETTING through form in view /general-setting
    Route::post('/general-setting/update', 'GeneralSettingController@update');
    Route::post('/general-setting/update-reduncancy', 'GeneralSettingController@updateRedundant');
    
    Route::post('/general-setting/master-config', 'GeneralSettingController@masterConfig');
    Route::post('/general-setting/master-config-VPS','GeneralSettingController@masterConfigVPS');
    Route::get('/general-setting/protocol-settings/data-protocol', 'GeneralSettingController@dataProtocol');
    
    Route::get('/variable-list/opc-variable', 'OpcUAController@index');
        
    // Route::get('/general-setting/opc-ua', 'OpcUAController@index');
    
    // Route::get('/general-setting/modbus-tcp', 'ModbusTCPController@index');
    // tidak terpakai

    // Route::get('/general-setting/modbus-rtu', 'ModbusRTUController@index');
    // tidak terpakai

    /*
    |--------------------------------------------------------------------------
    |    SNMP DRIVER
    |--------------------------------------------------------------------------
    */
    //Read from table SNMP_DRIVERS to form in view /snmp-driver
    Route::post('/snmp-driver/update', 'SnmpDriverController@update');

    //Update table SNMP_DRIVERS through form in view /snmp-driver
    Route::get('/snmp-driver', 'SnmpDriverController@index');

    /*
    |--------------------------------------------------------------------------
    |    MQTT DRIVER
    |--------------------------------------------------------------------------
    */
    //Read from table MQTT_DRIVERS to form in view /mqtt-driver
    Route::get('/mqtt-driver', 'MqttDriverController@index');

    //Update table MQTT_DRIVERS through form in view /mqtt-driver
    Route::post('/mqtt-driver/update', 'MqttDriverController@update');

    /*
    |--------------------------------------------------------------------------
    |    EVENT_LOG
    |--------------------------------------------------------------------------
    */
    //Read from table EVENT_LOG to view /events-log
    Route::get('/events-log', 'EventLogController@index');
    Route::get('/events-log/data', 'EventLogController@data');

    Route::get('/events-log/download/{type}', 'EventLogController@download');

    /*
    |--------------------------------------------------------------------------
    |    RESTART
    |--------------------------------------------------------------------------
    */
    //Rstart
    Route::get('/restart', 'RestartController@restart');
    Route::get('/restart-close', 'RestartController@restartCloseSocket');
    
    //General Setting
    Route::get('/restart-general-setting','RestartController@restartGeneralSetting');
    /*
    |--------------------------------------------------------------------------
    |    AJAX
    |--------------------------------------------------------------------------
    */
    //SetData Modal Config
    Route::get('/setdatamodaltcp', 'Ajax\GeneralSettingController@setTcp');
    Route::get('/setdatamodalrtu', 'Ajax\GeneralSettingController@setRtu');
    Route::get('/setdatamodaliec', 'Ajax\GeneralSettingController@setIec');

    // UpdateData Slave
    Route::get('/general-setting/tcp-config/update', 'Ajax\GeneralSettingController@updateTcp');
    Route::get('/general-setting/rtu-config/update', 'Ajax\GeneralSettingController@updateRtu');
    Route::get('/general-setting/iec-config/update', 'Ajax\GeneralSettingController@updateIec');
    Route::get('/general-setting/data-modal', 'Ajax\GeneralSettingController@nampilin');

    Route::get('/restart_controller/timer', 
    'RestartController@nyoba_timer');
    
    //setData Active
    // Route::post('/home/status-config', 'HomeController@setStatus');
    Route::get('/home/status-config/update', 'HomeController@updateStatus');

    Route::get('/home/ubahdata', 'HomeController@ubahdata');
    Route::get('/home/updatedata', 'HomeController@updatedata');
});

/*
|--------------------------------------------------------------------------
|    AUTH LOGIN
|--------------------------------------------------------------------------
*/
Route::auth();

//Route::get('/home', 'HomeController@index');
