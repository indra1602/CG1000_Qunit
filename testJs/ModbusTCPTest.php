<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Modbus TCP Update</title>
	<link rel="stylesheet"
	href="https://code.jquery.com/qunit/qunit-2.12.0.css">
	<script src="https://code.jquery.com/qunit/qunit-2.13.0.js"></script>
	<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../public/style/src/assets/extra-libs/c3/c3.min.css">
	<link rel="stylesheet" href="../public/style/src/dist/css/style.min.css">
	<link rel="stylesheet" href="../public/style/src/dist/css/style.css">
</head>
<body>

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Configure TCP Protocol</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        <!-- <form action="/general-setting/tcp-config/update" method="POST"> -->
        <form action="#" method="POST">
            <input type="hidden" name="_token" value="fAHq47TtqnCwnp681eTyjWJ6nTH8i2lpkh2uQYve">
                <div class="form-group row">
                <label class="col-12 col-sm-4 col-form-label text-sm-left">ID SLOT</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input id="SLAVE_SLOTS" name="slave_slot_edit" type="text" value="1" required="required" placeholder="ID SLOT" class="form-control" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-4 col-form-label text-sm-left">Protocol Type</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input id="SLAVE_PROTOCOLS" name="slave_protocols_edit" type="text" value="1" required="required" placeholder="Protocol Type" class="form-control" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-4 col-form-label text-sm-left">Main IP</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input id="SLAVE_IP" name="slave_ip_edit" type="text" value="" required="required" placeholder="Main IP" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-4 col-form-label text-sm-left">Secondary IP</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input id="SLAVE_ND" name="slave_nd_edit" type="text" value="" required="required" placeholder="Secondary IP" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-4 col-form-label text-sm-left">Port</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input id="SLAVE_PORT" name="slave_port_edit" type="text" value="" required="required" placeholder="Port" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-4 col-form-label text-sm-left">Pooling Time</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input id="SLAVE_Time" name="slave_time_edit" type="text" value="" required="required" placeholder="Pooling" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-4 col-form-label text-sm-left">Timeout</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input id="SLAVE_Timeout" name="slave_timeout_edit" type="text" value="" required="required" placeholder="Main IP" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary UpdateAjaxTcp">Apply</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>

	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
  <script>

    $(document).on('click', '.UpdateAjaxTcp', function() {
        QUnit.test('Test function update TCP', function(assert){
            const idSlot = $('#SLAVE_SLOT').val()
            const idSlave = $('#SLAVE_PROTOCOL').val()
            const mainIp = $('#SLAVE_IP').val()
            const secIp = $('#SLAVE_ND').val()
            const port = $('#SLAVE_PORT').val()
            const pooling = $('#SLAVE_Time').val()
            const timeout = $('#SLAVE_Timeout').val()
            var response = 0

            console.log(mainIp)
            console.log(secIp)
            console.log(port)
            console.log(pooling)
            console.log(timeout)
            if (
                (mainIp!=='')&&(secIp!=='')&&(port!=='')&&(pooling!=='')&&(timeout!=='')
            ){
                response = 1
                console.log(response)
                alert('Data Edited Success')
            } else {
                response = 0
                console.log(response)
                alert('Data Failed')
            }
            assert.ok(response, 1, "test function update TCP success");
        })
    });
  </script>

</body>
</html>