<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Update Status</title>
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
        <h5 class="modal-title">Shortcut Configure Slave Protocol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
        <input type="hidden" name="_token" value="NYkrZvxGwdwomk7PMkGwUxdnYD6UUhAmEiLz0o0k">
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">ID SLOT</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input id="SLAVE_SLOTES" name="SLAVE_SLOTES" type="text" value="1" required="required" placeholder="ID SLOT" class="form-control" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">Status Slave</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <select id="active_slave" name="active_slave" class="form-control">
                <option value="0">Disabled</option>
                <option value="1">Enabled</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">Protocols Slave</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <select id="protocols_active" name="protocols_active" class="form-control">
                    <option value="1">MODBUS TCP Client</option>
                    <option value="2">MODBUS RTU Master</option>
                    <option value="3">IEC 61850</option>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary UpdateAjaxStatus">Apply</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>

	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
	<script>
            
            
            $(document).on('click', '.UpdateAjaxStatus', function() {
              QUnit.test('Test event function restart', function(assert){
                const response = 1
                const slaveSlot = $('#SLAVE_SLOTES').val()
                const active = $('#active_slave').val()
                const protocols = $('#protocols_active').val()
                // console.log(slaveSlot)
                
                // $.ajax({
                    // url: 'localhost:8000/home/status-config/update',
                    // type: 'get',
                    // dataType: 'json',
                    // data: {
                        // slaveSlot: slaveSlot,
                        // active: active,
                        // protocols: protocols
                    // },
                    // success: function(response) {
                        // console.log("Modal Hasbeen close")
                        if (response === 1) {
                            // $('#slaveStatusConf').modal('hide')
                            // location.reload()
                            console.log("Modal Has been Hide")
                        } else {
                            alert('Update data error')
                            // Swal.fire(
                                // 'Error !',
                                // 'Update data error',
                                // 'error'
                            // )
                        }
                    // },
                    // error: function(xhr, ajaxOptions, thrownError) {
                        // alert(thrownError)
                    // }
                // })
                assert.equal(response, 1, "Test change password sukses")
            })

            
			// assert.ok(true,"test Restart sukses");
		});
	</script>
</body>
</html>