/* global $, location, Swal, alert, response, confirm */
// -------------------------------------------
// ------------------- HOME ------------------
// -------------------------------------------

QUnit.module('Test event show slave config', function(){
  $(document).ready(function() {
    $('#HARDWARE_DISPLAY').hide()
    $('#REDUNDANT_DISPLAY').hide()
    $('#SNMP_CLOUD_DISPLAY').hide()
    $('#MC_DISPLAY').hide()
    $('#MASTER_DISPLAY').hide()
    $('#SLAVE_DISPLAY_1').hide()
    $('#SLAVE_DISPLAY_2').hide()
    $('#SLAVE_DISPLAY_3').hide()
    $('#SLAVE_DISPLAY_4').hide()
  
    $('#hardware_show').click(function() {
      $('#HARDWARE_DISPLAY').toggle()
      $('#REDUNDANT_DISPLAY').hide()
      $('#SNMP_CLOUD_DISPLAY').hide()
      $('#MC_DISPLAY').hide()
      $('#MASTER_DISPLAY').hide()
      $('#SLAVE_DISPLAY_1').hide()
      $('#SLAVE_DISPLAY_2').hide()
      $('#SLAVE_DISPLAY_3').hide()
      $('#SLAVE_DISPLAY_4').hide()
    })

    $('#redundant_show').click(function() {
      $('#HARDWARE_DISPLAY').hide()
      $('#REDUNDANT_DISPLAY').toggle()
      $('#SNMP_CLOUD_DISPLAY').hide()
      $('#MC_DISPLAY').hide()
      $('#MASTER_DISPLAY').hide()
      $('#SLAVE_DISPLAY_1').hide()
      $('#SLAVE_DISPLAY_2').hide()
      $('#SLAVE_DISPLAY_3').hide()
      $('#SLAVE_DISPLAY_4').hide()
    })

    $('#snmp_show').click(function() {
      $('#HARDWARE_DISPLAY').hide()
      $('#REDUNDANT_DISPLAY').hide()
      $('#SNMP_CLOUD_DISPLAY').toggle()      
      $('#MC_DISPLAY').hide()
      $('#MASTER_DISPLAY').hide()
      $('#SLAVE_DISPLAY_1').hide()
      $('#SLAVE_DISPLAY_2').hide()
      $('#SLAVE_DISPLAY_3').hide()
      $('#SLAVE_DISPLAY_4').hide()
    })

    $('#mc_show').click(function() {
      $('#HARDWARE_DISPLAY').hide()
      $('#REDUNDANT_DISPLAY').hide()
      $('#SNMP_CLOUD_DISPLAY').hide()
      $('#MC_DISPLAY').toggle()
      $('#MASTER_DISPLAY').hide()
      $('#SLAVE_DISPLAY_1').hide()
      $('#SLAVE_DISPLAY_2').hide()
      $('#SLAVE_DISPLAY_3').hide()
      $('#SLAVE_DISPLAY_4').hide()
    })

    $('#master_show').click(function() {
      $('#HARDWARE_DISPLAY').hide()
      $('#REDUNDANT_DISPLAY').hide()
      $('#SNMP_CLOUD_DISPLAY').hide()
      $('#MC_DISPLAY').hide()
      $('#MASTER_DISPLAY').toggle()
      $('#SLAVE_DISPLAY_1').hide()
      $('#SLAVE_DISPLAY_2').hide()
      $('#SLAVE_DISPLAY_3').hide()
      $('#SLAVE_DISPLAY_4').hide()
    })

    $('#slave_show_1').click(function() {
      $('#HARDWARE_DISPLAY').hide()
      $('#REDUNDANT_DISPLAY').hide()
      $('#SNMP_CLOUD_DISPLAY').hide()
      $('#MC_DISPLAY').hide()
      $('#MASTER_DISPLAY').hide()
      $('#SLAVE_DISPLAY_1').toggle()
      $('#SLAVE_DISPLAY_2').hide()
      $('#SLAVE_DISPLAY_3').hide()
      $('#SLAVE_DISPLAY_4').hide()
    })

    $('#slave_show_2').click(function() {
      $('#HARDWARE_DISPLAY').hide()
      $('#REDUNDANT_DISPLAY').hide()
      $('#SNMP_CLOUD_DISPLAY').hide()
      $('#MC_DISPLAY').hide()
      $('#MASTER_DISPLAY').hide()
      $('#SLAVE_DISPLAY_1').hide()
      $('#SLAVE_DISPLAY_2').toggle()
      $('#SLAVE_DISPLAY_3').hide()
      $('#SLAVE_DISPLAY_4').hide()
    })

    $('#slave_show_3').click(function() {
      $('#HARDWARE_DISPLAY').hide()
      $('#REDUNDANT_DISPLAY').hide()
      $('#SNMP_CLOUD_DISPLAY').hide()
      $('#MC_DISPLAY').hide()
      $('#MASTER_DISPLAY').hide()
      $('#SLAVE_DISPLAY_1').hide()
      $('#SLAVE_DISPLAY_2').hide()
      $('#SLAVE_DISPLAY_3').toggle()
      $('#SLAVE_DISPLAY_4').hide()
    })

    $('#slave_show_4').click(function() {
      $('#HARDWARE_DISPLAY').hide()
      $('#REDUNDANT_DISPLAY').hide()
      $('#SNMP_CLOUD_DISPLAY').hide()
      $('#MC_DISPLAY').hide()
      $('#MASTER_DISPLAY').hide()
      $('#SLAVE_DISPLAY_1').hide()
      $('#SLAVE_DISPLAY_2').hide()
      $('#SLAVE_DISPLAY_3').hide()
      $('#SLAVE_DISPLAY_4').toggle()
    })
  })

  // -------------------------------------------
  // ---------------- END HOME -----------------
  // -------------------------------------------


  // ----------------------------------------
  // ------ RESTART BUTTON CONFIRMATION -----
  // ----------------------------------------
  QUnit.module('Test event button restart', function(){
    $('#restart').click(function() {
      var i = 0
      var myVar = setInterval(myTimer, 1000)
      function myTimer() {
        i++
        console.log(i)
        if (i === 5) {
          Swal.fire(
            'Error !',
            'Time Out, Please try again',
            'error'
          )
          clearInterval(myVar)
          i = 0
          return
        }
      }

      Swal.fire({
        title: 'Are you sure want to restart?',
        text: 'The server will be restart after this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0B5EA3',
        cancelButtonColor: '#E6222C',
        confirmButtonText: 'Restart'
      }).then((result) => {
        if (result.value) {
          myTimer()
          window.location = '/restart'
          i = 0
        } else {
          Swal.fire(
            'Error !',
            'Restart Failed, Please try again',
            'error'
          )
          clearInterval(myVar)
          i = 0
        }
      })
    })
  })
  // ----------------------------------------
  // ---- END RESTART BUTTON CONFIRMATION ---
  // ----------------------------------------

  // ------------------------------------
  // ---- popup modal slave protocol ----
  // ------------------------------------
  $(document).on('click', '#nampilin_modal_1', function() {
    const id = $(this).data('id')

    $.ajax({
      url: '/general-setting/data-modal',
      type: 'get',
      dataType: 'json',
      data: { id: id },
      success: function(response) {
        $('#SLAVE_SLOTES').val(id)
        $('#active_slave').val(response)
        QUnit.test('Test event show form slave config', function(assert){
          assert.equal(response, 1, 'form config slave slot 1 respon')
        })
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError)
      }
    })
  })

  $(document).on('click', '#nampilin_modal_2', function() {
    const id = $(this).data('id')

    $.ajax({
      url: '/general-setting/data-modal',
      type: 'get',
      dataType: 'json',
      data: { id: id },
      success: function(response) {
        $('#SLAVE_SLOTES').val(id)
        $('#active_slave').val(response)
        QUnit.test('Test event show form slave config', function(assert){
          assert.equal(response, 1, 'form config slave slot 2 respon')
        })
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError)
      }
    })
  })

  $(document).on('click', '#nampilin_modal_3', function() {
    const id = $(this).data('id')

    $.ajax({
      url: '/general-setting/data-modal',
      type: 'get',
      dataType: 'json',
      data: { id: id },
      success: function(response) {
        $('#SLAVE_SLOTES').val(id)
        $('#active_slave').val(response)
        QUnit.test('Test event show form slave config', function(assert){
          assert.equal(response, 1, 'form config slave slot 3 respon')
        })
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError)
      }
    })
  })

  $(document).on('click', '#nampilin_modal_4', function() {
    const id = $(this).data('id')

    $.ajax({
      url: '/general-setting/data-modal',
      type: 'get',
      dataType: 'json',
      data: { id: id },
      success: function(response) {
        $('#SLAVE_SLOTES').val(id)
        $('#active_slave').val(response)
        QUnit.test('Test event show form slave config', function(assert){
          assert.equal(response, 1, 'form config slave slot 4 respon')
        })
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError)
      }
    })
  })
})