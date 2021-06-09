// -------------------------
// ---- MASTER VARIABLE ----
// -------------------------
QUnit.module('Test Master Variable', function(){
  $(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'throw';
    var tableMaster = $('#master-variable-table').DataTable({
      autoWidth: false,
      paging: true,
      searching: true,
      ordering: true,
      processing: true,
      responsive: false,
    })
    $('.selectMasterAll').click(function() {
      var rows = tableMaster.rows({'search': 'applied'}).nodes();
      $('.master_checkbox').prop('checked', $(this).prop('checked'))
      $('input[type="checkbox"]', rows).prop('checked', this.checked)
      QUnit.test('Test event select all', function(assert){
        assert.ok(true, "Select all has been clicked")
      })
    })
  })

  $(document).on('click', '.add-master', function() {
    const masterVariable = $(this).data('ms-variable-name')
    const slvAddress = $(this).data('sv-id-variable')
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
      QUnit.test('Test event add master variable', function(assert){
        assert.ok(true, "new variable has been added")
      })
    } else {
      Swal.fire(
        'Error!',
        'The data already exists!',
        'error'
      )
      QUnit.test('Test event add master variable', function(assert){
        assert.notOk(true, "The data already exists!")
      })
    }
  })

  $(document).on('click', '.deleteMasterVariable', function() {
    const id = $(this).data('ms-id-variable')
  
    Swal.fire({
      title: 'Are you sure to delete this variable?',
      text: "You won't be able to revert this!",
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#0B5EA3',
      cancelButtonColor: '#E6222C',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: '/variable-list/master-variable/delete/' + id,
          method: 'get',
          data: { id: id },
          success: function(data) {
            console.log(id)
            Swal.fire({
              title: 'Success!',
              text: "Data has been deleted",
              type: 'success',
              confirmButtonColor: '#0B5EA3',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                QUnit.test('Test event Delete variable', function(assert){
                  assert.ok(result.value, "variable has been deleted")
                })
              }
            })
          }
        })
      }
    })
  })
  
  $(document).on('click', '#master_bulk_delete', function() {
    const id = []

    Swal.fire({
      title: 'Are you sure to delete this variable?',
      text: "You won't be able to revert this!",
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#0B5EA3',
      cancelButtonColor: '#E6222C',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.value) {
        $('.master_checkbox:checked').each(function() {
          id.push($(this).val())
        })
        if (id.length > 0) {
          $.ajax({
            url: '/variable-list/master-variable/delete-all',
            method: 'get',
            data: { id: id },
            success: function(data) {
              Swal.fire({
                title: 'Success!',
                text: "Data has been deleted",
                type: 'success',
                confirmButtonColor: '#0B5EA3',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.value) {
                  QUnit.test('Test event delete selected variable', function(assert){
                    assert.ok(result.value, "Data has been deleted")
                  })
                }
              })
            }
          })
        } else {
          Swal.fire({
            title: 'Error!',
            text: "Please select atleast one checkbox",
            type: 'error',
            confirmButtonColor: '#0B5EA3',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              QUnit.test('Test event delete selected variable', function(assert){
                assert.notOk(result.value, "Please select atleast one checkbox")
              })
            }
          })
        }
      }
    })
  })

  $(document).on('click', '.deleteAllMasterVariable', function() {
    Swal.fire({
      title: 'Are you sure to delete this All variable?',
      text: "You won't be able to revert this!",
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#0B5EA3',
      cancelButtonColor: '#E6222C',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: '/variable-list/master-variable/delete-all-variable',
          method: 'get',
          dataType: 'Json',
          success: function(response) {
            console.log(response)
            if (response === 1) {
              Swal.fire({
                title: 'Success!',
                text: "Data has been deleted",
                type: 'success',
                confirmButtonColor: '#0B5EA3',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.value) {
                  QUnit.test('Test event delete selected variable', function(assert){
                    assert.ok(result.value, "All data has been deleted")
                  })
                }
              })            
            }
          }
        })
      }
    })
  })
})
  // -----------------------------
  // ---- END MASTER VARIABLE ----
  // -----------------------------