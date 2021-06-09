// ------------------------
// ---- SLAVE VARIABLE ----
// ------------------------
QUnit.module('Test Slave Protocol', function(){
  $(document).ready(function() {
    var tableSlave = $('#slave-variable-table').DataTable({
      autoWidth: false,
      paging: true,
      searching: true,
      ordering: true,
      processing: true,
      responsive: false,
    })

    $('.selectSlaveAll').click(function() {
      var rowSlave = tableSlave.rows({'search': 'applied'}).nodes()
      $('.slave_checkbox').prop('checked', $(this).prop('checked'))
      $('input[type="checkbox"]', rowSlave).prop('checked', this.checked)
      QUnit.test('Test event select all', function(assert){
        assert.ok(true, "Select all has been clicked")
      })
    })
  })

  // DELETE DATA SLAVE_VARIABLE pada view variable-list/slave-variable
  $(document).on('click', '.deleteSlaveVariable', function() {
    const id = $(this).data('id-variable')

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
          url: '/variable-list/slave-variable/delete/' + id,
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

  // AJAX CRUD operations
  // Edit a slave_variable
  $(document).on('click', '.modify-modal', function() {
    $('.modal-title').text('Modify Data')
    $('#id_variable_edit').val($(this).data('id-variable'))
    $('#id_slave_edit').val($(this).data('id-slave'))
    $('#id_slot_edit').val($(this).data('id-slot'))
    $('#variable_name_edit').val($(this).data('variable-name'))
    $('#type_edit').val($(this).data('type'))
    $('#access_edit').val($(this).data('access'))
    $('#address_edit').val($(this).data('address'))
    $('#ModifyModal').modal('show')
    QUnit.test('Test event show form modify modal', function(assert){
      assert.ok(true, "Form modify modal has been shown")
    })
  })

  $(document).on('click', '#bulk_delete', function() {
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
        $('.slave_checkbox:checked').each(function() {
          id.push($(this).val())
          console.log(id)
        })
        if (id.length > 0) {
          $.ajax({
            url: '/variable-list/slave-variable/delete-all',
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

  $(document).on('click', '.deleteAllSlaveVariable', function() {
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
          url: '/variable-list/slave-variable/delete-all-Variable',
          method: 'get',
          dataType: 'Json',
          success: function(response) {
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
  // ----------------------------
  // ---- END SLAVE VARIABLE ----
  // ----------------------------