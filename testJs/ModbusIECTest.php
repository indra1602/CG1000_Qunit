<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Modbus IEC Update</title>
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
        <h5 class="modal-title">Configure IEC61850 Protocol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
        <input type="hidden" name="_token" value="fAHq47TtqnCwnp681eTyjWJ6nTH8i2lpkh2uQYve">
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">ID SLOT</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_SLOT_IEC" name="slave_slot_iec" type="text" value="1" required="required" placeholder="ID SLOT" class="form-control" readonly="">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Protocol Type</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_PROTOCOL_IEC" name="slave_protocol_iec" type="text" value="3" required="required" placeholder="Protocol Type" class="form-control" readonly="">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Main IP</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_IP_IEC" name="slave_ip_iec" type="text" value="" required="required" placeholder="Main IP" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Secondary IP</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_ND_IEC" name="slave_nd_iec" type="text" value="" required="required" placeholder="Secondary IP" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Port</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_PORT_IEC" name="slave_port_iec" type="text" value="" required="required" placeholder="Port" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Pooling Time</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_Time_IEC" name="slave_time_iec" type="text" value="" required="required" placeholder="Pooling" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Timeout</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_Timeout_IEC" name="slave_timeout_iec" type="text" value="" required="required" placeholder="Timeout" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary UpdateAjaxIec">Apply</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>

	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
  <script>

    $(document).on('click', '.UpdateAjaxIec', function() {
        QUnit.test('Test function update TCP', function(assert){

            const idSlotIec = $('#SLAVE_SLOT_IEC').val()
            const idSlaveIec = $('#SLAVE_PROTOCOL_IEC').val()
            const mainIpIec = $('#SLAVE_IP_IEC').val()
            const secIpIec = $('#SLAVE_ND_IEC').val()
            const portIec = $('#SLAVE_PORT_IEC').val()
            const poolingIec = $('#SLAVE_Time_IEC').val()
            const timeoutIec = $('#SLAVE_Timeout_IEC').val()
            var response = 0

            console.log(mainIpIec)
            console.log(secIpIec)
            console.log(portIec)
            console.log(poolingIec)
            console.log(timeoutIec)
            console.log(response)

            if (
                (mainIpIec!=='')&&(secIpIec!=='')&&(portIec!=='')&&(poolingIec!=='')&&(timeoutIec!=='')
            ) {
                response = 1
                alert('Data Edited uccess')
            } else {
                response = 0
                alert('Update data error')
            }
            assert.ok(response, 1, "test function update TCP success");
        })
    })
  </script>

</body>
</html>