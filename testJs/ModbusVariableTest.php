<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Modbus Variable</title>
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
    <!-- =========================================================== -->
    <!-- start accordions  -->
    <!-- =========================================================== -->
    <div class="col-lg-6">
      <!-- end custom accordions-->
    </div>
    <!-- ============================================================== -->
    <!-- Table Variable -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-body border-top">
          <h5 class="name-title">Modbus's Variable Data</h5>
            <div class="table-responsive">
							<div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover dataTable no-footer" id="slave-variable-table" name="slave-variable-table" role="grid" aria-describedby="slave-variable-table_info" style="width: 1350px;">
                      <thead class="bg-light" align="left">
                        <tr class="border-1" role="row">
                          <th class="border-1 sorting_asc" tabindex="0" aria-controls="slave-variable-table" rowspan="1" colspan="1" style="width: 83px;" aria-sort="ascending" aria-label="ID SLAVE: activate to sort column descending">ID SLAVE</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="slave-variable-table" rowspan="1" colspan="1" style="width: 65px;" aria-label="NAME: activate to sort column ascending">NAME</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="slave-variable-table" rowspan="1" colspan="1" style="width: 52px;" aria-label="TYPE: activate to sort column ascending">TYPE</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="slave-variable-table" rowspan="1" colspan="1" style="width: 89px;" aria-label="ADDRESS: activate to sort column ascending">ADDRESS</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="slave-variable-table" rowspan="1" colspan="1" style="width: 75px;" aria-label="ACCESS: activate to sort column ascending">ACCESS</th>
                          <th class="border-1 sorting" tabindex="0" aria-controls="slave-variable-table" rowspan="1" colspan="1" style="width: 64px;" aria-label="VALUE: activate to sort column ascending">VALUE</th>
                          <th class="border-1 sorting_disabled" rowspan="1" colspan="1" style="width: 94px;" aria-label="ACTION">ACTION</th>
                          <th class="border-1 sorting_disabled" style="width: 150px;" rowspan="1" colspan="1" aria-label="Delete Selected">
                            <input type="Checkbox" name="selectSlaveAll" class="selectSlaveAll">
                            <button type="button" name="bulk_delete" id="bulk_delete" class="bulk_delete btn btn-rounded btn-danger btn-sm">Delete Selected</button>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr role="row" class="odd">
                          <td class="sorting_1">1</td>
                          <td>POK-22T</td>
                          <td>COIL</td>
                          <td>1</td>
                          <td>1</td>
                          <td>FALSE</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                              </button>
                              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.1" data-id-slave="1" data-id-slot="1" data-variable-name="POK-22T" data-type="COIL" data-address="1" data-access="1" data-original-title="Modify">Modify</a>
                                <a class="dropdown-item deleteSlaveVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.1" data-original-title="Delete">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="slave_checkbox[]" class="slave_checkbox" value="1.1.1">
                          </td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">1</td>
                          <td>POK-23T</td>
                          <td>COIL</td>
                          <td>2</td>
                          <td>1</td>
                          <td>FALSE</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.2" data-id-slave="1" data-id-slot="1" data-variable-name="POK-23T" data-type="COIL" data-address="2" data-access="1" data-original-title="Modify">Modify</a>
                                <a class="dropdown-item deleteSlaveVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.2" data-original-title="Delete">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="slave_checkbox[]" class="slave_checkbox" value="1.1.2">
                          </td>
                        </tr>
                        <tr role="row" class="odd">
                          <td class="sorting_1">1</td>
                          <td>KMT-20T</td>
                          <td>COIL</td>
                          <td>3</td>
                          <td>1</td>
                          <td>FALSE</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.3" data-id-slave="1" data-id-slot="1" data-variable-name="KMT-20T" data-type="COIL" data-address="3" data-access="1" data-original-title="Modify">Modify</a>
                                <a class="dropdown-item deleteSlaveVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.3" data-original-title="Delete">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="slave_checkbox[]" class="slave_checkbox" value="1.1.3">
                          </td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">1</td>
                          <td>KMT-21T</td>
                          <td>COIL</td>
                          <td>4</td>
                          <td>1</td>
                          <td>FALSE</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.4" data-id-slave="1" data-id-slot="1" data-variable-name="KMT-21T" data-type="COIL" data-address="4" data-access="1" data-original-title="Modify">Modify</a>
                                <a class="dropdown-item deleteSlaveVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.4" data-original-title="Delete">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="slave_checkbox[]" class="slave_checkbox" value="1.1.4">
                          </td>
                        </tr>
                        <tr role="row" class="odd">
                          <td class="sorting_1">1</td>
                          <td>KMT-22T</td>
                          <td>COIL</td>
                          <td>5</td>
                          <td>1</td>
                          <td>FALSE</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.5" data-id-slave="1" data-id-slot="1" data-variable-name="KMT-22T" data-type="COIL" data-address="5" data-access="1" data-original-title="Modify">Modify</a>
                                <a class="dropdown-item deleteSlaveVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="1.1.5" data-original-title="Delete">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input type="checkbox" name="slave_checkbox[]" class="slave_checkbox" value="1.1.5">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div id="slave-variable-table_processing" class="dataTables_processing card" style="display: none;">Processing...
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
      $('.selectSlaveAll').click(function() {
        $('.slave_checkbox').prop('checked', $(this).prop('checked'))
      })

      $('.slave_checkbox').change(function() {
        const total = $('.slave_checkbox').length
        const number = $('.slave_checkbox:checked').length

        if (total === number) {
          $('.selectSlaveAll').prop('checked', true)
        } else {
          $('.selectSlaveAll').prop('checked', false)
        }
      })
			assert.ok(true,"test Restart sukses");
		});
	</script>
</body>
</html>