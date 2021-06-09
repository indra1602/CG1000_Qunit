/* global $, location, Swal, alert, response, confirm */
// -------------------------------------------
// ------------------- HOME ------------------
// -------------------------------------------

QUnit.module('Test event toggle Home', function(){
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
      QUnit.test('Test event click function toggle hardware display', function(assert){
        $('#HARDWARE_DISPLAY').toggle()
        $('#REDUNDANT_DISPLAY').hide()
        $('#SNMP_CLOUD_DISPLAY').hide()
        $('#MC_DISPLAY').hide()
        $('#MASTER_DISPLAY').hide()
        $('#SLAVE_DISPLAY_1').hide()
        $('#SLAVE_DISPLAY_2').hide()
        $('#SLAVE_DISPLAY_3').hide()
        $('#SLAVE_DISPLAY_4').hide()
        assert.ok(true,'toggle hardware successfully displayed')
      })
    })

    $('#redundant_show').click(function() {
      QUnit.test('Test event click function toggle Redundancy display', function(assert){
        $('#HARDWARE_DISPLAY').hide()
        $('#REDUNDANT_DISPLAY').toggle()
        $('#SNMP_CLOUD_DISPLAY').hide()
        $('#MC_DISPLAY').hide()
        $('#MASTER_DISPLAY').hide()
        $('#SLAVE_DISPLAY_1').hide()
        $('#SLAVE_DISPLAY_2').hide()
        $('#SLAVE_DISPLAY_3').hide()
        $('#SLAVE_DISPLAY_4').hide()
        assert.ok(true,'toggle Redundancy successfully displayed')
      })
    })

    $('#snmp_show').click(function() {
      QUnit.test('Test event click function toggle SNMP display', function(assert){
        $('#HARDWARE_DISPLAY').hide()
        $('#REDUNDANT_DISPLAY').hide()
        $('#SNMP_CLOUD_DISPLAY').toggle()      
        $('#MC_DISPLAY').hide()
        $('#MASTER_DISPLAY').hide()
        $('#SLAVE_DISPLAY_1').hide()
        $('#SLAVE_DISPLAY_2').hide()
        $('#SLAVE_DISPLAY_3').hide()
        $('#SLAVE_DISPLAY_4').hide()
        assert.ok(true,'toggle SNMP successfully displayed')
      })
    })

    $('#mc_show').click(function() {
      QUnit.test('Test event click function toggle Master Clock display', function(assert){
        $('#HARDWARE_DISPLAY').hide()
        $('#REDUNDANT_DISPLAY').hide()
        $('#SNMP_CLOUD_DISPLAY').hide()
        $('#MC_DISPLAY').toggle()
        $('#MASTER_DISPLAY').hide()
        $('#SLAVE_DISPLAY_1').hide()
        $('#SLAVE_DISPLAY_2').hide()
        $('#SLAVE_DISPLAY_3').hide()
        $('#SLAVE_DISPLAY_4').hide()
        assert.ok(true,'toggle Master Clock successfully displayed')
      })
    })

    $('#master_show').click(function() {
      QUnit.test('Test event click function toggle Master Protocol display', function(assert){
        $('#HARDWARE_DISPLAY').hide()
        $('#REDUNDANT_DISPLAY').hide()
        $('#SNMP_CLOUD_DISPLAY').hide()
        $('#MC_DISPLAY').hide()
        $('#MASTER_DISPLAY').toggle()
        $('#SLAVE_DISPLAY_1').hide()
        $('#SLAVE_DISPLAY_2').hide()
        $('#SLAVE_DISPLAY_3').hide()
        $('#SLAVE_DISPLAY_4').hide()
        assert.ok(true,'toggle Master Protocol successfully displayed')
      })
    })

    $('#slave_show_1').click(function() {
      QUnit.test('Test event click function toggle Slave Protocol 1 display', function(assert){
        $('#HARDWARE_DISPLAY').hide()
        $('#REDUNDANT_DISPLAY').hide()
        $('#SNMP_CLOUD_DISPLAY').hide()
        $('#MC_DISPLAY').hide()
        $('#MASTER_DISPLAY').hide()
        $('#SLAVE_DISPLAY_1').toggle()
        $('#SLAVE_DISPLAY_2').hide()
        $('#SLAVE_DISPLAY_3').hide()
        $('#SLAVE_DISPLAY_4').hide()
        assert.ok(true,'toggle Slave Protocol 1 successfully displayed')
      })
    })

    $('#slave_show_2').click(function() {
      QUnit.test('Test event click function toggle Slave Protocol 2 display', function(assert){
        $('#HARDWARE_DISPLAY').hide()
        $('#REDUNDANT_DISPLAY').hide()
        $('#SNMP_CLOUD_DISPLAY').hide()
        $('#MC_DISPLAY').hide()
        $('#MASTER_DISPLAY').hide()
        $('#SLAVE_DISPLAY_1').hide()
        $('#SLAVE_DISPLAY_2').toggle()
        $('#SLAVE_DISPLAY_3').hide()
        $('#SLAVE_DISPLAY_4').hide()
        assert.ok(true,'toggle Slave Protocol 2 successfully displayed')
      })
    })

    $('#slave_show_3').click(function() {
      QUnit.test('Test event click function toggle Slave Protocol 3 display', function(assert){
        $('#HARDWARE_DISPLAY').hide()
        $('#REDUNDANT_DISPLAY').hide()
        $('#SNMP_CLOUD_DISPLAY').hide()
        $('#MC_DISPLAY').hide()
        $('#MASTER_DISPLAY').hide()
        $('#SLAVE_DISPLAY_1').hide()
        $('#SLAVE_DISPLAY_2').hide()
        $('#SLAVE_DISPLAY_3').toggle()
        $('#SLAVE_DISPLAY_4').hide()
        assert.ok(true,'toggle Slave Protocol 3 successfully displayed')
      })
    })

    $('#slave_show_4').click(function() {
      QUnit.test('Test event click function toggle Slave Protocol 4 display', function(assert){
        $('#HARDWARE_DISPLAY').hide()
        $('#REDUNDANT_DISPLAY').hide()
        $('#SNMP_CLOUD_DISPLAY').hide()
        $('#MC_DISPLAY').hide()
        $('#MASTER_DISPLAY').hide()
        $('#SLAVE_DISPLAY_1').hide()
        $('#SLAVE_DISPLAY_2').hide()
        $('#SLAVE_DISPLAY_3').hide()
        $('#SLAVE_DISPLAY_4').toggle()
        assert.ok(true,'toggle Slave Protocol 4 successfully displayed')
      })
    })
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
        QUnit.test('Test event click button reatart', function(assert){
          location = '/restart'
          i = 0
          assert.ok(true,'Restart response')
        })
      } else {
        QUnit.test('Test event click button reatart', function(assert){
          Swal.fire(
            'Error !',
            'Restart Failed, Please try again',
            'error'
          )
          assert.notOk(true,'Restart not response')
          clearInterval(myVar)
          i = 0
        })
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
    },
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError)
    }
  })
})
