// --------------------------
// ------ RCB VARIABLE ------
// --------------------------
QUnit.module('Test IEC61850 Variable', function(){
  $(document).ready(function() {
    var tableRcb = $('#rcb-variable-table').DataTable({
      autoWidth: false,
      paging: true,
      fixedColumns: true,
      searching: true,
      ordering: true,
      processing: true,
    })
    $('.selectRcbAll').click(function() {
      var rowRcb = tableRcb.rows({'search': 'applied'}).nodes()
      $('.rcb_checkbox').prop('checked', $(this).prop('checked'))
      $('input[type="checkbox"]', rowRcb).prop('checked', this.checked)
      QUnit.test('Test event select all', function(assert){
        assert.ok(true, "Select all has been clicked")
      })
    })
  })

  $(document).on('click', '.deleteRcbVariable', function() {
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
          url: '/variable-list/rcb-variable/delete/' + id,
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
  
  $(document).on('click', '#rcb_bulk_delete', function() {
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
        $('.rcb_checkbox:checked').each(function() {
          id.push($(this).val())
          console.log(id)
        })
        if (id.length > 0) {
          $.ajax({
            url: '/variable-list/rcb-variable/delete-all',
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

  $(document).on('click', '.deleteAllRcbVariable', function() {
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
          url: '/variable-list/rcb-variable/delete-all-variable',
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
