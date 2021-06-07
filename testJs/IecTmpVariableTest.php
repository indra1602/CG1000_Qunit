<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing IEC Tmp Table</title>
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
      <h4 class="modal-title" id="fullWidthModalLabel">IEC Variables Data</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <div class="modal-body">
      <div class="form-group row">
        <label class="col-3 col-sm-2 col-form-label text-sm-left">ID Slot</label>
        <div class="col-3 col-sm-2">
          <select name="SLAVE_SLOT_IEC" id="SLAVE_SLOT_IEC" class="selectpicker form-control">
            <option value="" disabled="true" selected="true">=== Select Slot ===</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div>
      </div>
      <hr>
        <div class="table-responsive">
          <div id="iec-tmp-variable-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered table-hover dataTable no-footer" width="100%" id="iec-tmp-variable-table" name="iec-tmp-variable-table" role="grid" aria-describedby="iec-tmp-variable-table_info" style="width: 100%;">
                  <thead class="bg-light" align="left">
                    <tr class="border-1" role="row">
                      <th class="border-1 sorting_asc" tabindex="0" aria-controls="iec-tmp-variable-table" rowspan="1" colspan="1" style="width: 48px;" aria-sort="ascending" aria-label="SLOT: activate to sort column descending">SLOT</th>
                      <th class="border-1 sorting" tabindex="0" aria-controls="iec-tmp-variable-table" rowspan="1" colspan="1" style="width: 296px;" aria-label="NAME: activate to sort column ascending">NAME</th>
                      <th class="border-1 sorting" tabindex="0" aria-controls="iec-tmp-variable-table" rowspan="1" colspan="1" style="width: 47px;" aria-label="TYPE: activate to sort column ascending">TYPE</th>
                      <th class="border-1 sorting" tabindex="0" aria-controls="iec-tmp-variable-table" rowspan="1" colspan="1" style="width: 297px;" aria-label="ADDRESS: activate to sort column ascending">ADDRESS</th>
                      <th class="border-1 sorting" tabindex="0" aria-controls="iec-tmp-variable-table" rowspan="1" colspan="1" style="width: 69px;" aria-label="ACCESS: activate to sort column ascending">ACCESS</th>
                      <th class="border-1 sorting" tabindex="0" aria-controls="iec-tmp-variable-table" rowspan="1" colspan="1" style="width: 59px;" aria-label="VALUE: activate to sort column ascending">VALUE</th>
                      <th class="border-1 sorting_disabled" style="width: 150px;" rowspan="1" colspan="1" aria-label="">
                        <input type="Checkbox" name="selectTmpAll" class="selectTmpAll">
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
                        <input type="checkbox" data-id=" 3. 2. 31" name="tmp[]" class="tmp">
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
                        <input type="checkbox" data-id=" 3. 2. 32" name="tmp[]" class="tmp">
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
                        <input type="checkbox" data-id=" 3. 2. 33" name="tmp[]" class="tmp">
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
                        <input type="checkbox" data-id=" 3. 2. 34" name="tmp[]" class="tmp">
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
                        <input type="checkbox" data-id=" 3. 2. 35" name="tmp[]" class="tmp">
                      </td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="sorting_1">2</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.origin.orCat</td>
                      <td>BOOL</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.origin.orCat</td>
                      <td>1</td>
                      <td>0</td>
                      <td>
                        <input type="checkbox" data-id=" 3. 2. 36" name="tmp[]" class="tmp">
                      </td>
                    </tr>
                    <tr role="row" class="odd">
                      <td class="sorting_1">2</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.origin.orIdent</td>
                      <td>BOOL</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.origin.orIdent</td>
                      <td>1</td>
                      <td>0</td>
                      <td>
                        <input type="checkbox" data-id=" 3. 2. 37" name="tmp[]" class="tmp">
                      </td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="sorting_1">2</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.ctlNum</td>
                      <td>BOOL</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.ctlNum</td>
                      <td>1</td>
                      <td>0</td>
                      <td>
                        <input type="checkbox" data-id=" 3. 2. 38" name="tmp[]" class="tmp">
                      </td>
                    </tr>
                    <tr role="row" class="odd">
                      <td class="sorting_1">2</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.T</td>
                      <td>BOOL</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.T</td>
                      <td>1</td>
                      <td>0</td>
                      <td>
                        <input type="checkbox" data-id=" 3. 2. 39" name="tmp[]" class="tmp">
                      </td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="sorting_1">2</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.Test</td>
                      <td>BOOL</td>
                      <td>zUK1/Q0CSWI1.Pos.Oper.Test</td>
                      <td>1</td>
                      <td>0</td>
                      <td>
                        <input type="checkbox" data-id=" 3. 2. 40" name="tmp[]" class="tmp">
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div id="iec-tmp-variable-table_processing" class="dataTables_processing card" style="display: none;">Processing...
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" id="bulk_id">Import Variable</button>
    </div>
  </div>

	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
	<script>
		QUnit.test('Test event function restart', function(assert){

      $('.selectTmpAll').click(function() {
        $('.tmp').prop('checked', $(this).prop('checked'))
      })

      $('.tmp').change(function() {
        const total = $('.tmp').length
        const number = $('.tmp:checked').length

        if (total === number) {
          $('.selectTmpAll').prop('checked', true)
        } else {
          $('.selectTmpAll').prop('checked', false)
        }
      })

			assert.ok(true,"test Restart sukses");
		});
	</script>
</body>
</html>