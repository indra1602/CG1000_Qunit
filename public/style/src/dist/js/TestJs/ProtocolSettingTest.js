// -------------------------------
// ---- Start GENERAL SETTING ----
// -------------------------------
QUnit.module('Test General Setting', function(){
  // ---------------------------------------------
  // ---- START CODING POP UP MASTER PROTOCOL ----
  // ---------------------------------------------
  $('#MASTER_PROTOCOL').on('change', function(e) {
    const idMaster = e.target.value
    console.log(idMaster)

    if (idMaster === '1') {
      QUnit.test('Test event Change Master Protocol', function(assert){
        $('#SETTING_MASTER').empty()
        $('#SETTING_MASTER').append('<a data-toggle="modal"     href="#masterConfOPCUA"><i class="fas fa-cog"></i>Protocol     Configuration..</a>')
        assert.equal(idMaster, 1, "Link OPC UA Server has been selected")
      })
    } else {
      QUnit.test('Test event Change Master Protocol', function(assert){
        $('#SETTING_MASTER').empty()
        $('#SETTING_MASTER').append('<a href="#"><i class="fas fa-cog"></i>Protocol Configuration..</a>')
        assert.equal(idMaster, 1, "There is no link to this master variable")
      })
    }
  })
  // -------------------------------------------
  // ---- END CODING POP UP MASTER PROTOCOL ----
  // -------------------------------------------

  // --------------------------------------------
  // ---- START CODING POP UP Slave PROTOCOL ----
  // --------------------------------------------
  $('#SETTING_SLAVE').on('click', function() {
    const idSlot = $('#SLAVE_SLOT').val()
    const idSlave = $('#SLAVE_PROTOCOL').val()

    if (idSlot == null) {
      QUnit.test('Test event click setting slave', function(assert){
        Swal.fire(
          'Error !',
          "You haven't selected slot number",
          'error'
        )
        $('#SLAVE_MODAL').attr('href', '#')
        assert.equal(idSlot, 1, "You haven't selected slot number")
      })
    } else if (idSlave == null){
      QUnit.test('Test event click setting slave', function(assert){
        Swal.fire(
          'Error !',
          "You haven't selected slave protocol",
          'error'
        )
        $('#SLAVE_MODAL').attr('href', '#')
        assert.equal(idSlave, 1, "You haven't selected slave protocol")
      })
    }
  })
  
  $('#SLAVE_PROTOCOL').on('change', function(e) {
    const idSlot = $('#SLAVE_SLOT').val()
    const idSlave = $('#SLAVE_PROTOCOL').val()

    const option0 = '<option value="">==== Port ====</option>'
    const option1 = '<option value="1">1</option>'
    const option2 = '<option value="2">2</option>'

    const arr1 = []
    const arr2 = []

    arr1.push(option0, option1)
    arr2.push(option0, option1, option2)

    if (idSlot == null) {
      QUnit.test('Test event Change Slave Protocol', function(assert){
        $('#SLAVE_MODAL').attr('href', '#')
        assert.equal(idSlot, 1, "You haven't selected slave protocol")
      })
    } else if (idSlave === '1') {
      QUnit.test('Test event Change Slave Protocol', function(assert){
        $('#SLAVE_MODAL').attr('data-toggle', 'modal')
        $('#SLAVE_MODAL').attr('href', '#slaveConfTCP')
        $.ajax({
          url: '/setdatamodaltcp',
          type: 'get',
          dataType: 'json',
          data: { idSlot: idSlot, idSlave: idSlave },
          success: function(response) {
            $('#SLAVE_SLOTS').val(idSlot)
            $('#SLAVE_IP').val(response[0])
            $('#SLAVE_PROTOCOLS').val(response[1])
            $('#NAME_PROTOCOL_TCP').val('MODBUS TCP Client')
            $('#SLAVE_ND').val(response[2])
            $('#SLAVE_PORT').val(response[3])
            $('#SLAVE_Time').val(response[4])
            $('#SLAVE_Timeout').val(response[5])
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError)
          }
        })
        assert.equal(idSlave, 1, "Link Slave TCP Has been selected")
      })
    } else if (idSlave === '2') {
      QUnit.test('Test event Change Slave Protocol', function(assert){
        $('#SLAVE_MODAL').attr('data-toggle', 'modal')
        $('#SLAVE_MODAL').attr('href', '#slaveConfRTU')
        $.ajax({
          url: '/setdatamodalrtu',
          type: 'get',
          dataType: 'json',
          data: { idSlot: idSlot, idSlave: idSlave },
          success: function(response) {
            const serialType = response[0]
            console.log(serialType)
            $('#SLOT_SLAVE').val(idSlot)
            $('#SERIAL_TYPE').val(response[0])
            $('#NAME_PROTOCOL_RTU').val('MODBUS RTU Master')
            $('#PROTOCOLS_SLAVE').val(response[1])
            // console.log(response[1])
            if (serialType === 'RS232') {
              $('#PORT_RTU').empty()
              $('#PORT_RTU').append(arr1)
              $('#PORT_RTU').val(response[2])
            } else {
              $('#PORT_RTU').empty()
              $('#PORT_RTU').append(arr2)
              $('#PORT_RTU').val(response[2])
            }
            $('#BAUD_RATE').val(response[3])
            $('#PARITY').val(response[4])
            $('#DATA_BITS').val(response[5])
            $('#STOP_BITS').val(response[6])
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError)
          }
        })
        assert.equal(idSlave, 2, "Link Slave RTU Has been selected")
      })
    } else if (idSlave === '3') {
      QUnit.test('Test event Change Slave Protocol', function(assert){
        $('#SLAVE_MODAL').attr('data-toggle', 'modal')
        $('#SLAVE_MODAL').attr('href', '#slaveConfIEC')
        $.ajax({
          url: '/setdatamodaliec',
          type: 'get',
          dataType: 'json',
          data: { idSlot: idSlot, idSlave: idSlave },
          success: function(response) {
            $('#SLAVE_SLOT_IEC').val(idSlot)
            $('#SLAVE_IP_IEC').val(response[0])
            $('#NAME_PROTOCOL_IEC').val('IEC 61850')
            $('#SLAVE_PROTOCOL_IEC').val(response[1])
            $('#SLAVE_ND_IEC').val(response[2])
            $('#SLAVE_PORT_IEC').val(response[3])
            $('#SLAVE_Time_IEC').val(response[4])
            $('#SLAVE_Timeout_IEC').val(response[5])
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError)
          }
        })
        assert.equal(idSlave, 3, "Link Slave IEC Has been selected")
      })
    } else {
      QUnit.test('Test event Change Slave Protocol', function(assert){
        $('#SLAVE_MODAL').attr('href', '#')
        assert.notOk("You haven't selected slave protocol")
      })
    }
  })

  // -----------------------------
  // ---- END GENERAL SETTING ----
  // -----------------------------

  // ---------------------------------------------
  // ---- START CODING POP UP STATUS PROTOCOL ----
  // ---------------------------------------------
  
  // MODBUS RTU PAGE
  $('#SERIAL_TYPE').on('change', function(e) {
    const serialType = $('#SERIAL_TYPE').val()
    console.log(serialType)
  
    const option0 = '<option value="" disabled="true">==== Port ====</option>'
    const option1 = '<option value="1">1</option>'
    const option2 = '<option value="2">2</option>'
    const arr1 = []
    const arr2 = []
  
    arr1.push(option0, option1)
    arr2.push(option0, option1, option2)
    console.log(serialType)
  
    if (serialType === 'RS232') {
      $('#PORT_RTU').empty()
      $('#PORT_RTU').append(arr1)
      $('#PORT_RTU').val(response[2])
    } else {
      $('#PORT_RTU').empty()
      $('#PORT_RTU').append(arr2)
      $('#PORT_RTU').val(response[2])
    }
  })
    
  // update ajax tcp
  $(document).on('click', '.UpdateAjaxTcp', function() {
    const idSlot = $('#SLAVE_SLOT').val()
    const idSlave = $('#SLAVE_PROTOCOL').val()
    const mainIp = $('#SLAVE_IP').val()
    const secIp = $('#SLAVE_ND').val()
    const port = $('#SLAVE_PORT').val()
    const pooling = $('#SLAVE_Time').val()
    const timeout = $('#SLAVE_Timeout').val()
  
    $.ajax({
      url: '/general-setting/tcp-config/update',
      type: 'get',
      dataType: 'json',
      data: {
        idSlot: idSlot,
        idSlave: idSlave,
        mainIp: mainIp,
        secIp: secIp,
        port: port,
        pooling: pooling,
        timeout: timeout
      },
      success: function(response) {
        if (response === 1) {
          Swal.fire(
            'Success !',
            'Data Edited',
            'success'
          )
          $('#slaveConfTCP').modal('hide')
          location.reload()
        } else {
          Swal.fire(
            'Error !',
            'Update data error',
            'error'
          )
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError)
      }
    })
  })
  
  // update ajax IEC
  $(document).on('click', '.UpdateAjaxIec', function() {
    const idSlotIec = $('#SLAVE_SLOT_IEC').val()
    const idSlaveIec = $('#SLAVE_PROTOCOL_IEC').val()
    const mainIpIec = $('#SLAVE_IP_IEC').val()
    const secIpIec = $('#SLAVE_ND_IEC').val()
    const portIec = $('#SLAVE_PORT_IEC').val()
    const poolingIec = $('#SLAVE_Time_IEC').val()
    const timeoutIec = $('#SLAVE_Timeout_IEC').val()
  
    $.ajax({
      url: '/general-setting/iec-config/update',
      type: 'get',
      dataType: 'json',
      data: {
        idSlotIec: idSlotIec,
        idSlaveIec: idSlaveIec,
        mainIpIec: mainIpIec,
        secIpIec: secIpIec,
        portIec: portIec,
        poolingIec: poolingIec,
        timeoutIec: timeoutIec
      },
      success: function(response) {
        if (response === 1) {
          Swal.fire(
            'Success !',
            'Data Edited',
            'success'
          )
          $('#slaveConfIEC').modal('hide')
          location.reload()
        } else {
          Swal.fire(
            'Error !',
            'Update data error',
            'error'
          )
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError)
      }
    })
  })
    
  // update ajax RTU
  $(document).on('click', '.UpdateAjaxRtu', function() {
    const slaveSlot = $('#SLAVE_SLOT').val()
    const slaveProtocol = $('#SLAVE_PROTOCOL').val()
    const serialType = $('#SERIAL_TYPE').val()
    const portRtu = $('#PORT_RTU').val()
    const baudRate = $('#BAUD_RATE').val()
    const parity = $('#PARITY').val()
    const dataBits = $('#DATA_BITS').val()
    const stopBits = $('#STOP_BITS').val()
  
    $.ajax({
      url: '/general-setting/rtu-config/update',
      type: 'get',
      dataType: 'json',
      data: {
        slaveSlot: slaveSlot,
        slaveProtocol: slaveProtocol,
        serialType: serialType,
        portRtu: portRtu,
        baudRate: baudRate,
        parity: parity,
        dataBits: dataBits,
        stopBits: stopBits
      },
      success: function(response) {
        if (response === 1) {
          Swal.fire(
            'Success !',
            'Data Edited',
            'success'
          )
          $('#slaveConfRTU').modal('hide')
          location.reload()
        } else {
          Swal.fire(
            'Error !',
            'Update data error',
            'error'
          )
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError)
      }
    })
  })
  // ------------------------------------------
  // ---- END CODING POP UP Slave PROTOCOL ----
  // ------------------------------------------
})