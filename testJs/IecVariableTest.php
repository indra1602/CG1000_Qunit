<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing IEC Variable Table</title>
	<link rel="stylesheet"
	href="https://code.jquery.com/qunit/qunit-2.12.0.css">
	<script src="https://code.jquery.com/qunit/qunit-2.13.0.js"></script>
	<!-- <script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script> -->
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
        <h5>IEC VARIABLE DATA</h5>
          <div class="table-responsive">
            <div id="iec-variable-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered table-hover dataTable no-footer" id="iec-variable-table" name="iec-variable-table" role="grid" aria-describedby="iec-variable-table_info" style="width: 1531px;">
                    <thead class="bg-light" align="left">
                      <tr class="border-1" role="row">
                        <th class="border-1 sorting_asc" tabindex="0" aria-controls="iec-variable-table" rowspan="1" colspan="1" style="width: 35px;" aria-sort="ascending" aria-label="SLOT: activate to sort column descending">SLOT</th>
                        <th class="border-1 sorting" tabindex="0" aria-controls="iec-variable-table" rowspan="1" colspan="1" style="width: 191px;" aria-label="NAME: activate to sort column ascending">NAME</th>
                        <th class="border-1 sorting" tabindex="0" aria-controls="iec-variable-table" rowspan="1" colspan="1" style="width: 34px;" aria-label="TYPE: activate to sort column ascending">TYPE</th>
                        <th class="border-1 sorting" tabindex="0" aria-controls="iec-variable-table" rowspan="1" colspan="1" style="width: 191px;" aria-label="ADDRESS: activate to sort column ascending">ADDRESS</th>
                        <th class="border-1 sorting" tabindex="0" aria-controls="iec-variable-table" rowspan="1" colspan="1" style="width: 52px;" aria-label="ACCESS: activate to sort column ascending">ACCESS</th>
                        <th class="border-1 sorting" tabindex="0" aria-controls="iec-variable-table" rowspan="1" colspan="1" style="width: 43px;" aria-label="VALUE: activate to sort column ascending">VALUE</th>
                        <th class="border-1 sorting_disabled" rowspan="1" colspan="1" style="width: 69px;" aria-label="ACTION">ACTION</th>
                        <th class="border-1 sorting_disabled" style="width: 69px;" rowspan="1" colspan="1" aria-label="Delete Selected">
                          <input type="Checkbox" name="selectIecAll" class="selectIecAll">
                          <button type="button" name="iec_bulk_delete" id="iec_bulk_delete" class="iec_bulk_delete btn btn-rounded btn-danger btn-sm">Delete Selected</button>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr role="row" class="odd">
                        <td class="sorting_1">2</td>
                        <td>zUK1/Q0CSWI1</td>
                        <td>BOOL</td>
                        <td>zUK1/Q0CSWI1</td>
                        <td>1</td>
                        <td>0</td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 31" data-id-slave="3" data-id-slot="2" data-variable-name="zUK1/Q0CSWI1" data-type="BOOL" data-address="zUK1/Q0CSWI1" data-access="1" data-original-title="Modify">Modify</a>
                              <a class="dropdown-item deleteIecVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 31" data-original-title="Delete">Delete</a>
                            </div>
                          </div>
                        </td>
                        <td>
                          <input type="checkbox" name="iec_checkbox[]" class="iec_checkbox" value=" 3. 2. 31">
                        </td>
                      </tr>
                      <tr role="row" class="even">
                        <td class="sorting_1">2</td>
                        <td>zUK1/Q0CSWI1.Pos</td>
                        <td>BOOL</td>
                        <td>zUK1/Q0CSWI1.Pos</td>
                        <td>1</td>
                        <td>0</td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 32" data-id-slave="3" data-id-slot="2" data-variable-name="zUK1/Q0CSWI1.Pos" data-type="BOOL" data-address="zUK1/Q0CSWI1.Pos" data-access="1" data-original-title="Modify">Modify</a>
                              <a class="dropdown-item deleteIecVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 32" data-original-title="Delete">Delete</a>
                            </div>
                          </div>
                        </td>
                        <td>
                          <input type="checkbox" name="iec_checkbox[]" class="iec_checkbox" value=" 3. 2. 32">
                        </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td class="sorting_1">2</td>
                        <td>zUK1/Q0CSWI1.Pos.Oper</td>
                        <td>BOOL</td>
                        <td>zUK1/Q0CSWI1.Pos.Oper</td>
                        <td>1</td>
                        <td>0</td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 33" data-id-slave="3" data-id-slot="2" data-variable-name="zUK1/Q0CSWI1.Pos.Oper" data-type="BOOL" data-address="zUK1/Q0CSWI1.Pos.Oper" data-access="1" data-original-title="Modify">Modify</a>
                              <a class="dropdown-item deleteIecVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 33" data-original-title="Delete">Delete</a>
                            </div>
                          </div>
                        </td>
                        <td>
                          <input type="checkbox" name="iec_checkbox[]" class="iec_checkbox" value=" 3. 2. 33">
                        </td>
                      </tr>
                      <tr role="row" class="even">
                        <td class="sorting_1">2</td>
                        <td>zUK1/Q0CSWI1.Pos.Oper.ctlVal</td>
                        <td>BOOL</td>
                        <td>zUK1/Q0CSWI1.Pos.Oper.ctlVal</td>
                        <td>1</td>
                        <td>0</td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 34" data-id-slave="3" data-id-slot="2" data-variable-name="zUK1/Q0CSWI1.Pos.Oper.ctlVal" data-type="BOOL" data-address="zUK1/Q0CSWI1.Pos.Oper.ctlVal" data-access="1" data-original-title="Modify">Modify</a>
                              <a class="dropdown-item deleteIecVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 34" data-original-title="Delete">Delete</a>
                            </div>
                          </div>
                        </td>
                        <td>
                          <input type="checkbox" name="iec_checkbox[]" class="iec_checkbox" value=" 3. 2. 34">
                        </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td class="sorting_1">2</td>
                        <td>zUK1/Q0CSWI1.Pos.Oper.origin</td>
                        <td>BOOL</td>
                        <td>zUK1/Q0CSWI1.Pos.Oper.origin</td>
                        <td>1</td>
                        <td>0</td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 35" data-id-slave="3" data-id-slot="2" data-variable-name="zUK1/Q0CSWI1.Pos.Oper.origin" data-type="BOOL" data-address="zUK1/Q0CSWI1.Pos.Oper.origin" data-access="1" data-original-title="Modify">Modify</a>
                              <a class="dropdown-item deleteIecVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable=" 3. 2. 35" data-original-title="Delete">Delete</a>
                            </div>
                          </div>
                        </td>
                        <td>
                          <input type="checkbox" name="iec_checkbox[]" class="iec_checkbox" value=" 3. 2. 35">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div id="iec-variable-table_processing" class="dataTables_processing card" style="display: none;">Processing...
                  </div>
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

      $('.selectIecAll').click(function() {
        $('.iec_checkbox').prop('checked', $(this).prop('checked'))
      })

      $('.iec_checkbox').change(function() {
        const total = $('.iec_checkbox').length
        const number = $('.iec_checkbox:checked').length

        if (total === number) {
          $('.selectIecAll').prop('checked', true)
        } else {
          $('.selectIecAll').prop('checked', false)
        }
      })

			assert.ok(true,"test Restart sukses");
		});
	</script>
</body>
</html>