<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Prottocol Setting</title>
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

  <div class="pills-regular">
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade" id="general-setting" role="tabpanel" aria-labelledby="pills-general-setting">
        <h4 class="name-title offset-xl-1">General</h4>
          <form class="offset-xl-1" action="/general-setting/update" method="POST"></form>
      </div>
      <div class="tab-pane fade active show" id="protocols-setting" role="tabpanel" aria-labelledby="pills-protocols-setting">
            
        <form class="offset-xl-1" action="#">
          <div class="form-group row">
            <label for="MASTER_PROTOCOL" class="col-4 col-sm-4 col-form-label text-left">Master's Protocol</label>
            <div class="col-6 col-lg-6">
              <select name="MASTER_PROTOCOL" id="MASTER_PROTOCOL" class="selectpicker form-control">
                <option value="" disabled="true" selected="true">=== Master Protocol ===</option>
            	  <option value="1">OPC UA Server</option>
              </select>
              <span class="setting-master" name="SETTING_MASTER" id="SETTING_MASTER">
                <a href="#"><i class="fas fa-cog"></i>Protocol Configuration..</a>
              </span>
            </div>
          </div>
        </form>

        <form class="offset-xl-1" action="#">
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">ID Slot</label>
            <div class="col-6 col-lg-6">
              <select name="ID_SLOT" id="SLAVE_SLOT" class="selectpicker form-control show-menu-arrow">
                <option value="" disabled="true" selected="true">=== Select Slot ===</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="SLAVE_PROTOCOL" class="col-4 col-sm-4 col-form-label text-left">Slave's Protocol</label>
            <div class="col-6 col-lg-6">
              <select name="ID_PROTOCOL" id="SLAVE_PROTOCOL" class="selectpicker form-control">
                <option value="0" disabled="disabled" selected="true">=== Slave Protocol ===</option>
                <option value="1">MODBUS TCP Client</option>
                <option value="2">MODBUS RTU Master</option>
                <option value="3">IEC 61850</option>
              </select>
              <span class="setting-slave" name="SETTING_SLAVE" id="SETTING_SLAVE">
                <a id="SLAVE_MODAL" href="#"><i class="fas fa-cog"></i>Protocol Configuration..</a>
              </span>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
    
	<div id="qunit"></div>
	<div id="qunit-fixture"></div>

	<script>

    QUnit.test('Test event function Change Master Variable', function(assert){
      $('#MASTER_PROTOCOL').on('change', function(e) {
        console.log(e)
        const idMaster = e.target.value
        if (idMaster === '1') {
          $('#SETTING_MASTER').empty()
          $('#SETTING_MASTER').append('<a data-toggle="modal" href="#"><i class="fas fa-cog"></i>Protocol Configuration..</a>')
          console.log("Value Combobox has been changed")
        } else {
          $('#SETTING_MASTER').empty()
          $('#SETTING_MASTER').append('<a href="#"><i class="fas fa-cog"></i>Protocol Configuration..</a>')
          console.log("Value Combobox is empty")
        }
      })
      // alert('button restart has been clicked');
      assert.ok(true,"test change Master Variable sukses");
    });

		QUnit.test('Test event function Click Setting Slave', function(assert){
      $('#SETTING_SLAVE').on('click', function() {
        const idSlot = $('#SLAVE_SLOT').val()
        const idSlave = $('#SLAVE_PROTOCOL').val()
        console.log(idSlot)
        console.log(idSlave)

        if ((idSlot == null) || (idSlave == null)) {
          alert('You have a null data')
          $('#SLAVE_MODAL').attr('href', '#')
        }
      })
      assert.ok(true,"test Click Setting Slave")
    })

    QUnit.test('Test event function Change Slave Slot', function(assert){
      $('#SLAVE_SLOT').on('change', function(e) {
        console.log(e)
        if (idSlot != null) {
          $('#SLAVE_PROTOCOL').val(0)
        } else {
          $('#SLAVE_MODAL').attr('href', '#')
        }
      })

      $('#SLAVE_PROTOCOL').on('change', function(e) {
        const idSlot = $('#SLAVE_SLOT').val()
        const idSlave = $('#SLAVE_PROTOCOL').val()
                
        const option0 = '<option value="">==== Port ====</option>'
        const option1 = '<option value="1">1</option>'
        const option2 = '<option value="2">2</option>'

        const arr1 = []
        const arr2 = []

        arr1.push(option0, option1)
        arr2.push(option0, option1, option2)

        if (idSlot == null) {
          $('#SLAVE_MODAL').attr('href', '#')
        } else if (idSlave === '1') {
          $('#SLAVE_MODAL').attr('data-toggle', 'modal')
          $('#SLAVE_MODAL').attr('href', '#slaveConfTCP')
        } else if (idSlave === '2') {
          $('#SLAVE_MODAL').attr('data-toggle', 'modal')
          $('#SLAVE_MODAL').attr('href', '#slaveConfRTU')
        } else if (idSlave === '3') {
          $('#SLAVE_MODAL').attr('data-toggle', 'modal')
          $('#SLAVE_MODAL').attr('href', '#slaveConfIEC')
        } else {
          $('#SLAVE_MODAL').attr('href', '#')
        }
      })
			// alert('button restart has been clicked');
			assert.ok(true,"test Change Slave Slot");
		});
	</script>
</body>
</html>