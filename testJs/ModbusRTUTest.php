<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Modbus RTU Update</title>
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
        <h5 class="modal-title">Configure RTU Protocol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
        <input type="hidden" name="_token" value="Q1kt9ZreZqMQXBCnYePwQxNPgfLTtpKRpI5JxBLU">
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">ID SLOT</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLOT_SLAVE" name="slot_slave_edit" type="text" value="1" required="required" placeholder="ID SLOT" class="form-control" readonly="">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Protocol Type</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="PROTOCOLS_SLAVE" name="protocol_slave_edit" type="text" value="2" required="required" placeholder="Protocol Type" class="form-control" readonly="">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Serial Type</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="SERIAL_TYPE" name="serial_type_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Serial Type ====</option>
                      <option value="RS232">RS232</option>
                      <option value="RS485">RS485</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Port</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <select id="PORT_RTU" ame="port_rtu_edit" class="custom-select form-control PORT_RTU"><option value="">==== Port ====</option><option value="1">1</option></select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Baud rate</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="BAUD_RATE" name="baud_rate_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Baud Rate ====</option>
                      <option value="1200">1200</option>
                      <option value="2400">2400</option>
                      <option value="4800">4800</option>
                      <option value="9600">9600</option>
                      <option value="38400">38400</option>
                      <option value="57600">57600</option>
                      <option value="115200">115200</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Parity</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="PARITY" name="parity_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Parity ====</option>
                      <option value="NONE">NONE</option>
                      <option value="EVEN">EVEN</option>
                      <option value="ODD">ODD</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Data Bits</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="DATA_BITS" name="data_bits_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Data Bits ====</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Stop Bits</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="STOP_BITS" name="stop_bits_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Stop Bits ====</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary UpdateAjaxRtu">Apply</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>

	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
	<script>
		QUnit.test('Test event function change serial type', function(assert){
      $('#SERIAL_TYPE').on('change', function(e) {
        const serialType = $('#SERIAL_TYPE').val()
        console.log(serialType)

        const option0 = '<option value="" disabled="true">==== Port ====<option>'
        const option1 = '<option value="1">1</option>'
        const option2 = '<option value="2">2</option>'
        const arr1 = []
        const arr2 = []

        arr1.push(option0, option1)
        arr2.push(option0, option1, option2)
        console.log(serialType)

        if (serialType === 'RS232') {
          $('#PORT_RTU').empty()
          $('#PORT_RTU').append(arr1)
          // $('#PORT_RTU').val(response[2])
        } else {
          $('#PORT_RTU').empty()
          $('#PORT_RTU').append(arr2)
          // $('#PORT_RTU').val(response[2])
        }
      })
			// alert('button restart has been clicked');
			assert.ok(true,"test Change Serial Type sukses");
		});
	</script>

  <script>

    QUnit.test('Test function update RTU', function(assert){
      $(document).on('click', '.UpdateAjaxRtu', function() {
        const slaveSlot = $('#SLAVE_SLOT').val()
        const slaveProtocol = $('#SLAVE_PROTOCOL').val()
        const serialType = $('#SERIAL_TYPE').val()
        const portRtu = $('#PORT_RTU').val()
        const baudRate = $('#BAUD_RATE').val()
        const parity = $('#PARITY').val()
        const dataBits = $('#DATA_BITS').val()
        const stopBits = $('#STOP_BITS').val()
        var response = 0

        if (
          (serialType===null)||(portRtu===null)||(baudRate===null)||(parity===null)||(dataBits===null)||(stopBits===null)
          ) {
            response = 0
            alert('data Failed')
            // console.log(serialType)
            // console.log(portRtu)
            // console.log(baudRate)
            // console.log(parity)
            // console.log(dataBits)
            // console.log(stopBits)
            console.log(response)
        } else{
          response = 1
          alert('data edited success')
          console.log(response)
        }
      })
      assert.ok(true,"test Change Serial Type sukses");
    });
  </script>

</body>
</html>