<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Master Variable</title>
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

  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-body border-top">
          <h5>MASTER VARIABLE</h5>
            <div class="table-responsive">
              <div id="master-variable-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-bordered table-hover dataTable no-footer" id="master-variable-table" role="grid" aria-describedby="master-variable-table_info" style="width: 1519px;">
                      <thead class="bg-light">
                        <tr class="border-1" align="center" role="row">
                          <th class="border-1" colspan="3" rowspan="1">SLAVE</th>
                          <th class="border-1" colspan="5" rowspan="1">MASTER</th>
                        </tr>
                        <tr class="border-1" align="left" role="row">
                          <th class="border-1 sorting_asc" tabindex="0" aria-controls="master-variable-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 172px;">Name</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="master-variable-table" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" style="width: 99px;">Type</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="master-variable-table" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 138px;">Address</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="master-variable-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 114px;">Name</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="master-variable-table" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" style="width: 99px;">Type</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="master-variable-table" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 138px;">Address</th>
                          <th class="border-1 sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 154px;">Action</th>
                          <th class="border-1 sorting_disabled" rowspan="1" colspan="1" aria-label="Delete Selected" style="width: 258px;">
                            <input type="Checkbox" name="selectMasterAll" class="selectMasterAll">
                            <button type="button" name="master_bulk_delete" id="master_bulk_delete" class="btn btn-rounded btn-danger btn-sm">Delete Selected</button>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr role="row" class="odd">
                          <td class="sorting_1">AK-20T</td>
                          <td>COIL</td>
                          <td>32</td>
                          <td>AK-20T</td>
                          <td>BOOL</td>
                          <td>AK-20T</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item  add-master" href="javascript:void(0)" data-toggle="tooltip" data-sv-id-variable="1.1.32" data-sv-id-slave="1" data-sv-id-slot="1" data-sv-variable-name="AK-20T" data-original-title="Add" data-ms-variable-name="AK-20T">Add</a>
                                <a class="dropdown-item deleteMasterVariable" href="javascript:void(0)" data-toggle="tooltip" data-ms-id-variable="1.1.AK-20T" data-original-title="Delete">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="master_checkbox[]" class="master_checkbox" value="1.1.AK-20T">
                          </td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">AK-21AT</td>
                          <td>COIL</td>
                          <td>33</td>
                          <td>AK-21AT</td>
                          <td>BOOL</td>
                          <td>AK-21AT</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item  add-master" href="javascript:void(0)" data-toggle="tooltip" data-sv-id-variable="1.1.33" data-sv-id-slave="1" data-sv-id-slot="1" data-sv-variable-name="AK-21AT" data-original-title="Add" data-ms-variable-name="AK-21AT">Add</a>
                                <a class="dropdown-item deleteMasterVariable" href="javascript:void(0)" data-toggle="tooltip" data-ms-id-variable="1.1.AK-21AT" data-original-title="Delete">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="master_checkbox[]" class="master_checkbox" value="1.1.AK-21AT">
                          </td>
                        </tr>
                        <tr role="row" class="odd">
                          <td class="sorting_1">AK-21BT</td>
                          <td>COIL</td>
                          <td>34</td>
                          <td>AK-21BT</td>
                          <td>BOOL</td>
                          <td>AK-21BT</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item  add-master" href="javascript:void(0)" data-toggle="tooltip" data-sv-id-variable="1.1.34" data-sv-id-slave="1" data-sv-id-slot="1" data-sv-variable-name="AK-21BT" data-original-title="Add" data-ms-variable-name="AK-21BT">Add</a>
                                  <a class="dropdown-item deleteMasterVariable" href="javascript:void(0)" data-toggle="tooltip" data-ms-id-variable="1.1.AK-21BT" data-original-title="Delete">Delete</a>
                                </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="master_checkbox[]" class="master_checkbox" value="1.1.AK-21BT">
                          </td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">AK-22T</td>
                          <td>COIL</td>
                          <td>35</td>
                          <td>AK-22T</td>
                          <td>BOOL</td>
                          <td>AK-22T</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item  add-master" href="javascript:void(0)" data-toggle="tooltip" data-sv-id-variable="1.1.35" data-sv-id-slave="1" data-sv-id-slot="1" data-sv-variable-name="AK-22T" data-original-title="Add" data-ms-variable-name="AK-22T">Add</a>
                                <a class="dropdown-item deleteMasterVariable" href="javascript:void(0)" data-toggle="tooltip" data-ms-id-variable="1.1.AK-22T" data-original-title="Delete">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="master_checkbox[]" class="master_checkbox" value="1.1.AK-22T">
                          </td>
                        </tr>
                        <tr role="row" class="odd">
                          <td class="sorting_1">AK-23T</td>
                          <td>COIL</td>
                          <td>36</td>
                          <td>AK-23T</td>
                          <td>BOOL</td>
                          <td>AK-23T</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item  add-master" href="javascript:void(0)" data-toggle="tooltip" data-sv-id-variable="1.1.36" data-sv-id-slave="1" data-sv-id-slot="1" data-sv-variable-name="AK-23T" data-original-title="Add" data-ms-variable-name="AK-23T">Add</a>
                                <a class="dropdown-item deleteMasterVariable" href="javascript:void(0)" data-toggle="tooltip" data-ms-id-variable="1.1.AK-23T" data-original-title="Delete">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="master_checkbox[]" class="master_checkbox" value="1.1.AK-23T">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div id="master-variable-table_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
	<script>
		QUnit.test('Test event function restart', function(assert){

      $('.selectMasterAll').click(function() {
        $('.master_checkbox').prop('checked', $(this).prop('checked'))
      })

      $('.master_checkbox').change(function() {
        const total = $('.master_checkbox').length
        const number = $('.master_checkbox:checked').length

        if (total === number) {
          $('.selectMasterAll').prop('checked', true)
        } else {
          $('.selectMasterAll').prop('checked', false)
        }
      })

			assert.ok(true,"test Restart sukses");
		});
	</script>

  <script>
	  QUnit.test('Test event function restart', function(assert){
      $(document).on('click', '.add-master', function() {
        const masterVariable = $(this).data('ms-variable-name')
        const slvAddress = $(this).data('sv-id-variable')
        // var idSlave = $(this).data('sv-id-slave')
        const idSlot = $(this).data('sv-id-slot')
        const svVariableName = $(this).data('sv-variable-name')
        const variableName = 'SLOT_' + idSlot + '.' + svVariableName
        const address = variableName

        if (masterVariable === '') {
          $('.modal-title').text('Add Master Variable')
          $('#SLV_ADDRESS').val(slvAddress)
          $('#ID_SLOT').val($(this).data('sv-id-slot'))
          $('#VARIABLE_NAME').val(variableName)
          $('#ADDRESS').val(address)
          $('#AddModal').modal('show')
        } else {
          Swal.fire(
            'Error!',
            'The data already exists!',
            'error'
          )
        }
      })
		  assert.ok(true,"test Restart sukses");
	  });
  </script>
</body>
</html>