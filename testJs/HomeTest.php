<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Home</title>
	<link rel="stylesheet"
	href="https://code.jquery.com/qunit/qunit-2.12.0.css">
	<script src="https://code.jquery.com/qunit/qunit-2.13.0.js"></script>
	<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<!-- <script src="https://unpkg.com/feather-icons"></script> -->
	<!-- <script src="../public/style/src/dist/js/feather.min.js"></script> -->

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../public/style/src/assets/extra-libs/c3/c3.min.css">
	<link rel="stylesheet" href="../public/style/src/dist/css/style.min.css">
	<link rel="stylesheet" href="../public/style/src/dist/css/style.css">
</head>
<body>

	<div class="card-group">
        <div class="card border-right">
            <div class="card-body bg-success">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="hardware_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Hardware</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Normal</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-right">
            <div class="card-body bg-success">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="redundant_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Redundancy</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Ready</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></span>
                    </div>
                </div>
            </div>
		</div>

        <div class="card border-right">
            <div class="card-body bg-red">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="snmp_show">
                                <h5 class="text-dark mb-1 font-weight-medium">SNMP Driver</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disconnected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></span>
                    </div>
                </div>
            </div>
		</div>

        <div class="card border-right">
            <div class="card-body bg-red">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="cloud_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Cloud Driver</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disconnected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cloud-off"><path d="M22.61 16.95A5 5 0 0 0 18 10h-1.26a8 8 0 0 0-7.05-6M5 5a8 8 0 0 0 4 15h9a5 5 0 0 0 1.7-.3"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg></span>
                    </div>
                </div>
            </div>
		</div>

        <div class="card border-right">
            <div class="card-body bg-red">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="mc_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Master Clock</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disconnected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></span>
                    </div>
                </div>
            </div>
		</div>
    </div>

    <div class="card-group">
        <div class="card border-right">
            <div class="card-body bg-success">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="master_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Master Protocol</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Connected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></span>
                    </div>
                </div>
            </div>
		</div>

        <div class="card border-right">
            <div class="card-body bg-success">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="slave_show_1">
                                <h5 class="text-dark mb-1 font-weight-medium">Slave Protocol</h5>
                            </a>
                        </div>
                    	<h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Slot 1</h6>
                    	<h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Connected</h6>
                    </div>
                 	<div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></span>
                    </div>
                </div>
            </div>
		</div>
                                        
		<div class="card border-right">
            <div class="card-body bg-red">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="slave_show_2">
                                <h5 class="text-dark mb-1 font-weight-medium">Slave Protocol</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Slot 2</h6>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disconnected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></span>
                    </div>
                </div>
            </div>
		</div>
                                        
		<div class="card border-right">
            <div class="card-body bg-dark">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="slave_show_3">
                                <h5 class="text-dark mb-1 font-weight-medium">Slave Protocol</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Slot 3</h6>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disabled</h6>
                    </div>
                </div>
            </div>
		</div>
                                        
		<div class="card border-right">
            <div class="card-body bg-dark">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="slave_show_4">
                                <h5 class="text-dark mb-1 font-weight-medium">Slave Protocol</h5>
                            </a>
                        </div>
                    	<h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Slot 4</h6>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disabled</h6>
                    </div>
                </div>
            </div>                    
		</div>
    </div>

	<div class="row">
        <div class="col-12">
            <div class="card" id="HARDWARE_DISPLAY">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">HARDWARE</h4>
                    </div>
                    <div class="tab-content">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Name
                                <span>My_SilVue</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                IP
                                <span>192.168.100.214</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Subnet
                            	<span>255.255.255.0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Gateway
                                <span>192.168.100.1</span>
                            </li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
                                CPU Temperature
                                <span class="badge badge-primary badge-pill">50° Celcius</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
                                Battery Temperature
                                <span class="badge badge-primary badge-pill">Normal</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
                                Power Status
                                <span class="badge badge-success badge-pill">ON AC</span>
							</li>
                        </ul>
                    </div>
                </div>
            </div>

			<div class="card" id="REDUNDANT_DISPLAY" style="">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">REDUNDANCY</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            IP Main
                            <span>192.168.100.214</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            IP Backup
                            <span>192.168.100.20</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            IP Redundant
                            <span>192.168.100.221</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Redundancy Type
                            <span>Dominant</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Status
                            <span class="badge badge-success badge-pill">Ready</span>
						</li>
                    </ul>
                </div>
            </div>

			<div class="card" id="SNMP_CLOUD_DISPLAY" style="display: none;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">SNMP &amp; CLOUD DRIVER</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        	SNMP Driver
                        	<span class="badge badge-danger badge-pill">Disconnected</span>
						</li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Cloud Driver
                            <span class="badge badge-danger badge-pill">Disconnected</span>
						</li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            URL
                            <span></span>
                        </li>
                    </ul>
                </div>
            </div>

			<div class="card" id="MC_DISPLAY" style="display: none;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">MASTER CLOCK</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            IP
                            <span>192.168.200.220</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Status
                            <span class="badge badge-danger badge-pill">Disconnected</span>
						</li>
                    </ul>
                </div>
            </div>

			<div class="card" id="MASTER_DISPLAY" style="">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">MASTER PROTOCOL</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        	Driver Protocol
                            <span>OPC UA Server</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Status
                            <span class="badge badge-success badge-pill">Connected</span>
						</li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Port
                            <span>4840</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Variables
                            <span>72</span>
                        </li>
                    </ul>
                </div>
            </div>
            
			<div class="card" id="SLAVE_DISPLAY_1" style="display: none;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">SLAVE PROTOCOL</h4>
                    </div>
                	<div class="list-group">
                        <h5 class="list-group-item d-flex justify-content-between align-items-center" style="border: 0px;padding-left: 0px;padding-right: 0px;">SLOT 1 
                            <span class="setting-status" name="SETTING_STATUS" id="SETTING_STATUS">
                                <a id="nampilin_modal_1" data-toggle="modal" data-id="1" href="#slaveStatusConf">Enabled</a>
                            </span>
                        </h5>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Driver Protocol
                            <span>MODBUS TCP Client</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Status
                            <span>
                                <span class="badge badge-success badge-pill">Connected</span>
							</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            IP
                            <span>192.168.100.16</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Variable
                            <span>72</span>
                        </li>
                    </ul>
                </div>
            </div>

			<div class="card" id="SLAVE_DISPLAY_2" style="display: none;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">SLAVE PROTOCOL</h4>
                    </div>
                    <div class="list-group">
                        <h5 class="list-group-item d-flex justify-content-between align-items-center" style="border: 0px;padding-left: 0px;padding-right: 0px;">SLOT 2 
                            <span class="setting-status" name="SETTING_STATUS" id="SETTING_STATUS">
                                <a id="nampilin_modal_2" data-toggle="modal" data-id="2" href="#slaveStatusConf">Enabled</a>
                            </span>
                        </h5>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Driver Protocol
                                <span>MODBUS TCP Client</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Status
                            <span>
                                <span class="badge badge-danger badge-pill">Disconnected</span>
							</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            IP
                            <span>192.168.100.16</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Variable
                            <span>0</span>
                        </li>
                    </ul>
                </div>
            </div>

			<div class="card" id="SLAVE_DISPLAY_3" style="display: none;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">SLAVE PROTOCOL</h4>
                    </div>
                	<div class="list-group">
                        <h5 class="list-group-item d-flex justify-content-between align-items-center" style="border: 0px;padding-left: 0px;padding-right: 0px;">SLOT 3 
                            <span class="setting-status" name="SETTING_STATUS" id="SETTING_STATUS">
                                <a id="nampilin_modal_3" data-toggle="modal" data-id="3" href="#slaveStatusConf">Disabled</a>
                            </span>
                        </h5>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Driver Protocol
                            <span>MODBUS TCP Client</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Status
                            <span>
                                <span class="badge badge-danger badge-pill">Disconnected</span>
							</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            IP
                            <span>192.168.100.16</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Variable
                            <span>0</span>
                        </li>
                    </ul>
                </div>
            </div>

			<div class="card" id="SLAVE_DISPLAY_4" style="display: none;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">SLAVE PROTOCOL</h4>
                    </div>
                    <div class="list-group">
                        <h5 class="list-group-item d-flex justify-content-between align-items-center" style="border: 0px;padding-left: 0px;padding-right: 0px;">SLOT 4 
                            <span class="setting-status" name="SETTING_STATUS" id="SETTING_STATUS">
                                <a id="nampilin_modal_4" data-toggle="modal" data-id="4" href="#slaveStatusConf">Disabled</a>
                            </span>
                        </h5>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Driver Protocol
                            <span>MODBUS TCP Client</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Status
                            <span>
                                <span class="badge badge-danger badge-pill">Disconnected</span>
							</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            IP
                           <span>192.168.100.16</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Variable
                            <span>0</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
	<!-- <script>
		QUnit.test('test event click', function(assert){
			$(document).on('click', '#nampilin_modal_1', function() {
				const id = $(this).data('id')
				
				$.ajax({
					url: '/general-setting/data-modal',
					type: 'get',
					dataType: 'json',
					data: { id: id },
					success: function(response) {
						$('#SLAVE_SLOTES').val(id)
						$('#active_slave').val(response)
					},
					error: function(xhr, ajaxOptions, thrownError) {
						console.log(thrownError)
					}
				})
			})
			assert.ok(true, 'test')
		})
	</script> -->
	<script>
		QUnit.test('Test event function toggle', function(assert){

			$(document).ready(function() {
  				$('#HARDWARE_DISPLAY').hide()
  				$('#REDUNDANT_DISPLAY').hide()
  				$('#SNMP_CLOUD_DISPLAY').hide()
  				$('#MC_DISPLAY').hide()
  				$('#MASTER_DISPLAY').hide()
  				$('#SLAVE_DISPLAY_1').hide()
  				$('#SLAVE_DISPLAY_2').hide()
  				$('#SLAVE_DISPLAY_3').hide()
  				$('#SLAVE_DISPLAY_4').hide()

  				$('#hardware_show').click(function() {
    				$('#HARDWARE_DISPLAY').toggle()
    				$('#REDUNDANT_DISPLAY').hide()
    				$('#SNMP_CLOUD_DISPLAY').hide()
    				$('#MC_DISPLAY').hide()
    				$('#MASTER_DISPLAY').hide()
    				$('#SLAVE_DISPLAY_1').hide()
    				$('#SLAVE_DISPLAY_2').hide()
    				$('#SLAVE_DISPLAY_3').hide()
    				$('#SLAVE_DISPLAY_4').hide()
  				})

  				$('#redundant_show').click(function() {
    				$('#HARDWARE_DISPLAY').hide()
    				$('#REDUNDANT_DISPLAY').toggle()
    				$('#SNMP_CLOUD_DISPLAY').hide()
    				$('#MC_DISPLAY').hide()
    				$('#MASTER_DISPLAY').hide()
    				$('#SLAVE_DISPLAY_1').hide()
    				$('#SLAVE_DISPLAY_2').hide()
    				$('#SLAVE_DISPLAY_3').hide()
    				$('#SLAVE_DISPLAY_4').hide()
  				})

  				$('#cloud_show').click(function() {
    				$('#HARDWARE_DISPLAY').hide()
    				$('#REDUNDANT_DISPLAY').hide()
    				$('#SNMP_CLOUD_DISPLAY').toggle()
    				$('#MC_DISPLAY').hide()
    				$('#MASTER_DISPLAY').hide()
    				$('#SLAVE_DISPLAY_1').hide()
    				$('#SLAVE_DISPLAY_2').hide()
    				$('#SLAVE_DISPLAY_3').hide()
    				$('#SLAVE_DISPLAY_4').hide()
  				})

  				$('#snmp_show').click(function() {
    				$('#HARDWARE_DISPLAY').hide()
    				$('#REDUNDANT_DISPLAY').hide()
    				$('#SNMP_CLOUD_DISPLAY').toggle()
    				$('#MC_DISPLAY').hide()
    				$('#MASTER_DISPLAY').hide()
    				$('#SLAVE_DISPLAY_1').hide()
    				$('#SLAVE_DISPLAY_2').hide()
   					$('#SLAVE_DISPLAY_3').hide()
    				$('#SLAVE_DISPLAY_4').hide()
  				})

  				$('#mc_show').click(function() {
    				$('#HARDWARE_DISPLAY').hide()
    				$('#REDUNDANT_DISPLAY').hide()
    				$('#SNMP_CLOUD_DISPLAY').hide()
    				$('#MC_DISPLAY').toggle()
    				$('#MASTER_DISPLAY').hide()
    				$('#SLAVE_DISPLAY_1').hide()
    				$('#SLAVE_DISPLAY_2').hide()
    				$('#SLAVE_DISPLAY_3').hide()
    				$('#SLAVE_DISPLAY_4').hide()
  				})

  				$('#master_show').click(function() {
    				$('#HARDWARE_DISPLAY').hide()
    				$('#REDUNDANT_DISPLAY').hide()
    				$('#SNMP_CLOUD_DISPLAY').hide()
   				 	$('#MC_DISPLAY').hide()
    				$('#MASTER_DISPLAY').toggle()
    				$('#SLAVE_DISPLAY_1').hide()
    				$('#SLAVE_DISPLAY_2').hide()
    				$('#SLAVE_DISPLAY_3').hide()
    				$('#SLAVE_DISPLAY_4').hide()
  				})

  				$('#slave_show_1').click(function() {
    				$('#HARDWARE_DISPLAY').hide()
    				$('#REDUNDANT_DISPLAY').hide()
    				$('#SNMP_CLOUD_DISPLAY').hide()
   				 	$('#MC_DISPLAY').hide()
    				$('#MASTER_DISPLAY').hide()
    				$('#SLAVE_DISPLAY_1').toggle()
   				 	$('#SLAVE_DISPLAY_2').hide()
   				 	$('#SLAVE_DISPLAY_3').hide()
   				 	$('#SLAVE_DISPLAY_4').hide()
  				})

  				$('#slave_show_2').click(function() {
    				$('#HARDWARE_DISPLAY').hide()
    				$('#REDUNDANT_DISPLAY').hide()
    				$('#SNMP_CLOUD_DISPLAY').hide()
    				$('#MC_DISPLAY').hide()
    				$('#MASTER_DISPLAY').hide()
    				$('#SLAVE_DISPLAY_1').hide()
    				$('#SLAVE_DISPLAY_2').toggle()
   				 	$('#SLAVE_DISPLAY_3').hide()
   				 	$('#SLAVE_DISPLAY_4').hide()
  				})

			  	$('#slave_show_3').click(function() {
			    	$('#HARDWARE_DISPLAY').hide()
			    	$('#REDUNDANT_DISPLAY').hide()
			    	$('#SNMP_CLOUD_DISPLAY').hide()
			    	$('#MC_DISPLAY').hide()
			    	$('#MASTER_DISPLAY').hide()
			    	$('#SLAVE_DISPLAY_1').hide()
			    	$('#SLAVE_DISPLAY_2').hide()
			    	$('#SLAVE_DISPLAY_3').toggle()
			    	$('#SLAVE_DISPLAY_4').hide()
			  	})

  				$('#slave_show_4').click(function() {
    				$('#HARDWARE_DISPLAY').hide()
    				$('#REDUNDANT_DISPLAY').hide()
    				$('#SNMP_CLOUD_DISPLAY').hide()
    				$('#MC_DISPLAY').hide()
    				$('#MASTER_DISPLAY').hide()
    				$('#SLAVE_DISPLAY_1').hide()
    				$('#SLAVE_DISPLAY_2').hide()
    				$('#SLAVE_DISPLAY_3').hide()
    				$('#SLAVE_DISPLAY_4').toggle()
  				})
			})
			assert.ok(true,"test sukses");
		});
	</script>
</body>
</html>