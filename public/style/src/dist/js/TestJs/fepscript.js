/* global $, location, Swal, alert, response, confirm */

// ---------------------------------------------
// ---- START CODING POP UP MASTER PROTOCOL ----
// ---------------------------------------------
$('#MASTER_PROTOCOL').on('change', function(e) {
  const idMaster = e.target.value
  console.log(idMaster)

  if (idMaster === '1') {
    $('#SETTING_MASTER').empty()
    $('#SETTING_MASTER').append('<a data-toggle="modal" href="#masterConfOPCUA"><i class="fas fa-cog"></i>Protocol Configuration..</a>')
  } else {
    $('#SETTING_MASTER').empty()
    $('#SETTING_MASTER').append('<a href="#"><i class="fas fa-cog"></i>Protocol Configuration..</a>')
  }
})
// -------------------------------------------
// ---- END CODING POP UP MASTER PROTOCOL ----
// -------------------------------------------

// ---------------------------------------------
// ---- START CODING POP UP STATUS PROTOCOL ----
// ---------------------------------------------
$(document).on('click', '.UpdateAjaxStatus', function() {
  const slaveSlot = $('#SLAVE_SLOTES').val()
  const active = $('#active_slave').val()
  const protocols = $('#protocols_active').val()
  console.log(slaveSlot)

  $.ajax({
    url: '/home/status-config/update',
    type: 'get',
    dataType: 'json',
    data: {
      slaveSlot: slaveSlot,
      active: active,
      protocols: protocols
    },
    success: function(response) {
      console.log(response)
      if (response === 1) {
        $('#slaveStatusConf').modal('hide')
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
// -------------------------------------------
// ---- END CODING POP UP STATUS PROTOCOL ----
// -------------------------------------------

// --------------------------------------------
// ---- START CODING POP UP Slave PROTOCOL ----
// --------------------------------------------
$('#SETTING_SLAVE').on('click', function() {
  const idSlot = $('#SLAVE_SLOT').val()
  const idSlave = $('#SLAVE_PROTOCOL').val()

  if (idSlot == null) {
    Swal.fire(
      'Error !',
      "You haven't selected slot number",
      'error'
    )
    $('#SLAVE_MODAL').attr('href', '#')
  } else if (idSlave == null){
    Swal.fire(
      'Error !',
      "You haven't selected slave protocol",
      'error'
    )
    $('#SLAVE_MODAL').attr('href', '#')
  }
})

$('#SLAVE_SLOT').on('change', function(e) {
  const idSlot = $('#SLAVE_SLOT').val()
  console.log(e)
  if (idSlot !== null) {
    $('#SLAVE_PROTOCOL').val(0)
  } else {
    $('#SLAVE_MODAL').attr('href', '#')
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
    $('#SLAVE_MODAL').attr('href', '#')
  } else if (idSlave === '1') {
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
  } else if (idSlave === '2') {
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
  } else if (idSlave === '3') {
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
  } else {
    $('#SLAVE_MODAL').attr('href', '#')
  }
})

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

// -----------------------------
// ---- END GENERAL SETTING ----
// -----------------------------

// ------------------------
// ---- SLAVE VARIABLE ----
// ------------------------
$(document).ready(function() {
  var tableSlave = $('#slave-variable-table').DataTable({
    autoWidth: false,
    paging: true,
    searching: true,
    ordering: true,
    processing: true,
    responsive: false,
    // serverSide: true,
    // ajax: {
      // url: '/variable-list/slave-variable/data-slave-variable',
      // type: 'get',
      // data: function(d) {
        // d._token = '{{ csrf_token() }}'
      // }
    // },
    // columns: [
      // { data: 'ID_SLAVE', name: 'ID_SLAVE' },
      // { data: 'VARIABLE_NAME', name: 'VARIABLE_NAME' },
      // { data: 'ID_SLOT', name: 'ID_SLOT' },
      // { data: 'TYPE', name: 'TYPE' },
      // { data: 'ADDRESS', name: 'ADDRESS' },
      // { data: 'ACCESS', name: 'ACCESS' },
      // { data: 'VALUE', name: 'VALUE' },
      // { data: 'action', name: 'action', orderable: false, searchable: false },
      // // { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false }
    // ]
  })

  $('.selectSlaveAll').click(function() {
    var rowSlave = tableSlave.rows({'search': 'applied'}).nodes()
    $('.slave_checkbox').prop('checked', $(this).prop('checked'))
    $('input[type="checkbox"]', rowSlave).prop('checked', this.checked)
  })

  // start checklist ALL
  // $('.selectSlaveAll').click(function() {
    // $('.slave_checkbox').prop('checked', $(this).prop('checked'))
  // })
  // 
  // $('.slave_checkbox').change(function() {
    // const total = $('.slave_checkbox').length
    // const number = $('.slave_checkbox:checked').length
    // 
    // if (total === number) {
      // $('.selectSlaveAll').prop('checked', true)
    // } else {
      // $('.selectSlaveAll').prop('checked', false)
    // }
  // })
  // End Checklist ALL
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
          // alert(data)
          // $('#slave-variable-table').DataTable().ajax.reload()
          Swal.fire({
            title: 'Success!',
            text: "Data has been deleted",
            type: 'success',
            confirmButtonColor: '#0B5EA3',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              location.reload()
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
            // alert(data)
            // $('#slave-variable-table').DataTable().ajax.reload()
            Swal.fire({
              title: 'Success!',
              text: "Data has been deleted",
              type: 'success',
              confirmButtonColor: '#0B5EA3',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                location.reload()
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
            location.reload()
          }
        })
        // alert('Please select atleast one checkbox')
      }
    }
  })
})
// ----------------------------
// ---- END SLAVE VARIABLE ----
// ----------------------------

// -------------------------
// ---- MASTER VARIABLE ----
// -------------------------
// DELETE DATA MASTER_VARIABLE pada view variable-list/master-variable

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
          // alert(data)
          // $('#master-variable-table').DataTable().ajax.reload()
          Swal.fire({
            title: 'Success!',
            text: "Data has been deleted",
            type: 'success',
            confirmButtonColor: '#0B5EA3',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              location.reload()
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
            // alert(data)
            // $('#master-variable-table').DataTable().ajax.reload()
            Swal.fire({
              title: 'Success!',
              text: "Data has been deleted",
              type: 'success',
              confirmButtonColor: '#0B5EA3',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                location.reload()
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
            location.reload()
          }
        })
        // alert('Please select atleast one checkbox')
      }
    }
  })
})

// -----------------------------
// ---- END MASTER VARIABLE ----
// -----------------------------

// -------------------
// ---- EVENT LOG ----
// -------------------
$(document).ready(function() {
  $('#event-log-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: '/events-log/data'
    },
    columns: [
      { data: 'TIME_STAMP', name: 'TIME_STAMP' },
      { data: 'EVENT', name: 'EVENT' },
      { data: 'NAME', name: 'NAME' }
    ]
  })
})
// -----------------------
// ---- END EVENT LOG ----
// -----------------------

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

// --------------------------
// ------ VPS VARIABLE ------
// --------------------------
$(document).ready(function() {
  $('#vps-variable-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: '/variable-list/vps-variable/data-vps-variable',
      type: 'get',
      data: function(d) {
        d._token = '{{ csrf_token() }}'
      }
    },
    columns: [
      { data: 'ID_SLOT', name: 'ID_SLOT' },
      { data: 'VARIABLE_NAME', name: 'VARIABLE_NAME' },
      { data: 'TYPE', name: 'TYPE' },
      { data: 'ADDRESS', name: 'ADDRESS' },
      { data: 'ACCESS', name: 'ACCESS' },
      { data: 'VALUE', name: 'VALUE' },
      { data: 'action', name: 'action', orderable: false, searchable: false },
      { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false }
    ]
  })
})

$('.selectVpsAll').click(function() {
  $('.vps_checkbox').prop('checked', $(this).prop('checked'))
})

$('.vps_checkbox').change(function() {
  const total = $('.vps_checkbox').length
  const number = $('.vps_checkbox:checked').length

  if (total === number) {
    $('.selectVpsAll').prop('checked', true)
  } else {
    $('.selectVpsAll').prop('checked', false)
  }
})

$(document).on('click', '.deleteVpsVariable', function() {
  const id = $(this).data('id-variable')

  Swal.fire({
    title: 'Are you sure to delete this variable?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#0B5EA3',
    cancelButtonColor: '#E6222C',
    confirmButtonText: 'Delete'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: '/variable-list/iec-variable/delete/' + id,
        method: 'get',
        data: { id: id },
        success: function(data) {
          alert(data)
          $('#vps-variable-table').DataTable().ajax.reload()
        }
      })
    }
  })
})

// --------------------------
// ------ IEC VARIABLE ------
// --------------------------
$(document).ready(function() {
  var tableIec = $('#iec-variable-table').DataTable({
    autoWidth: false,
    paging: true,
    fixedColumns: true,
    searching: true,
    ordering: true,
    processing: true,
    // responsive: false,
    // serverSide: true,
    // ajax: {
      // url: '/variable-list/iec-variable/data-iec-variable',
      // type: 'get',
      // data: function(d) {
        // d._token = '{{ csrf_token() }}'
      // }
    // },
    // columnDefs: [{
      // orderable: false,
      // className: 'select-checkbox',
      // targets: 6,
      // checkboxes: {
        // selectRow: true
      // }
    // } ],
    // select:{
      // style: 'multi'
    // },
    // columns: [
      // { data: 'ID_SLOT', name: 'ID_SLOT' },
      // { data: 'VARIABLE_NAME', name: 'VARIABLE_NAME' },
      // { data: 'TYPE', name: 'TYPE' },
      // { data: 'ADDRESS', name: 'ADDRESS' },
      // { data: 'ACCESS', name: 'ACCESS' },
      // { data: 'VALUE', name: 'VALUE' },
      // { data: 'action', name: 'action', orderable: false, searchable: false },
      // // { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false }
    // ],
    // columnDefs: [
      // { targets: 0 },
      // { checkboxes: {
        // selectRow: true
      // }}
    // ],
  })

  $('.selectIecAll').click(function() {
    var rowsIec = tableIec.rows({'search': 'applied'}).nodes();
    $('.iec_checkbox').prop('checked', $(this).prop('checked'))
    $('input[type="checkbox"]', rowsIec).prop('checked', this.checked)
  })
})

$(document).on('click', '.deleteIecVariable', function() {
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
        url: '/variable-list/iec-variable/delete/' + id,
        method: 'get',
        data: { id: id },
        success: function(data) {
          // alert(data)
          // $('#iec-variable-table').DataTable().ajax.reload()
          Swal.fire({
            title: 'Success!',
            text: "Data has been deleted",
            type: 'success',
            confirmButtonColor: '#0B5EA3',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              location.reload()
            }
          })
          
        }
      })
    }
  })
})

$(document).on('click', '#iec_bulk_delete', function() {
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
      $('.iec_checkbox:checked').each(function() {
        id.push($(this).val())
        console.log(id)
      })
      if (id.length > 0) {
        $.ajax({
          url: '/variable-list/iec-variable/delete-all',
          method: 'get',
          data: { id: id },
          success: function(data) {
            // alert(data)
            // $('#iec-variable-table').DataTable().ajax.reload()
            Swal.fire({
              title: 'Success!',
              text: "Data has been deleted",
              type: 'success',
              confirmButtonColor: '#0B5EA3',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                location.reload()
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
            location.reload()
          }
        })
        // alert('Please select atleast one checkbox')
      }
    }
  })
})

// --------------------------
// ------ RCB VARIABLE ------
// --------------------------
$(document).ready(function() {
  var tableRcb = $('#rcb-variable-table').DataTable({
    autoWidth: false,
    paging: true,
    fixedColumns: true,
    searching: true,
    ordering: true,
    processing: true,
    // serverSide: true,
    // ajax: {
      // url: '/variable-list/rcb-variable/data-rcb-variable',
      // type: 'get',
      // data: function(d) {
        // d._token = '{{ csrf_token() }}'
      // }
    // },
    // columns: [
      // { data: 'ID_SLOT', name: 'ID_SLOT' },
      // { data: 'VARIABLE_NAME', name: 'VARIABLE_NAME' },
      // { data: 'TYPE', name: 'TYPE' },
      // { data: 'ADDRESS', name: 'ADDRESS' },
      // { data: 'ACCESS', name: 'ACCESS' },
      // { data: 'VALUE', name: 'VALUE' },
      // { data: 'action', name: 'action', orderable: false, searchable: false },
      // // { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false }
    // ]
  })
  $('.selectRcbAll').click(function() {
    var rowRcb = tableRcb.rows({'search': 'applied'}).nodes()
    $('.rcb_checkbox').prop('checked', $(this).prop('checked'))
    $('input[type="checkbox"]', rowRcb).prop('checked', this.checked)
  })
})

$(document).ready(function() {
  var tableRcbTmp = $('#rcb-tmp-variable-table').DataTable({
    processing: true,
    responsive: true,
    serverSide: true,
    ajax: {
      url: '/variable-list/rcb-tmp-variable/data',
      type: 'get',
      data: function(d) {
        d._token = '{{ csrf_token() }}'
      }
    },
    columns: [
      { data: 'ID_SLOT', name: 'ID_SLOT' },
      { data: 'VARIABLE_NAME', name: 'VARIABLE_NAME' },
      { data: 'TYPE', name: 'TYPE' },
      { data: 'ADDRESS', name: 'ADDRESS' },
      { data: 'ACCESS', name: 'ACCESS' },
      { data: 'VALUE', name: 'VALUE' },
      { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false }
    ]
  })
})

$('.selectTmpRcbAll').click(function() {
  var rowsTmpRcb = tableRcbTmp.rows({'search' : 'applied'}.nodes())
  $('.tmp_rcb').prop('checked', $(this).prop('checked'))
  $('input[type="checkbox"]',rowsTmpRcb).prop('checked', this.checked)
})

$(document).on('click', '#bulk_idRcb', function() {
  const id = []

  Swal.fire({
    title: 'Are you sure to import this variable?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#0B5EA3',
    cancelButtonColor: '#E6222C',
    confirmButtonText: 'Import Data'
  }).then((result) => {
    if (result.value) {
      $('.tmp_rcb:checked').each(function() {
        id.push($(this).data('id'))
      })
      if (id.length > 0) {
          $.ajax({
            url: '/variable-list/rcb-tmp-variable/import-browse-rcb',
            method: 'get',
            data: { id: id },
            success: function(data) {
              $('#AddModalRcbtmp').modal('hide')
              location.reload()
            }
          })
      } else {
        alert('Please select atleast one checkbox')
      }
    }
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
          // alert(data)
          // $('#rcb-variable-table').DataTable().ajax.reload()
          Swal.fire({
            title: 'Success!',
            text: "Data has been deleted",
            type: 'success',
            confirmButtonColor: '#0B5EA3',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              location.reload()
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
            // alert(data)
            // $('#rcb-variable-table').DataTable().ajax.reload()
            Swal.fire({
              title: 'Success!',
              text: "Data has been deleted",
              type: 'success',
              confirmButtonColor: '#0B5EA3',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                location.reload()
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
            location.reload()
          }
        })
        // alert('Please select atleast one checkbox')
      }
    }
  })
})

$(document).ready(function() {
  $('#id_browse').prop('disabled', true)
  $('#browseRcb').prop('disabled', true)
  $('#loading').hide()
})

$('#SLAVE_SLOT_RCB').on('change', function(e) {
  $('#browseRcb').prop('disabled', false)
  var idSlotRcb = $('#SLAVE_SLOT_RCB').find('option:selected').val()
  // console.log(idSlotRcb)

  $.ajax({
    url: '/variable-list/ip-rcb',
    type: 'get',
    dataType: 'json',
    data: {
      idSlotRcb: idSlotRcb
    },
    success: function(response) {
      $('#ip_idSlotValueRcb').prop('readonly', true).val(response)
    },
    error: function(xhr, ajaxOptions, thrownError) {
      alert(thrownError)
    }
  })
})

// ----------------------------------
// ------ Browse RCB Variable  ------
// ----------------------------------

$('#browseRcb').on('click', function() {
  var idSlotRcb = $('#SLAVE_SLOT_RCB').find('option:selected').val()
  $('#browseRcb').prop('disabled', true)
  $('#loading').show()

  var myVar = setInterval(myTimer, 1000)
  function myTimer() {
    i++
    console.log(i)
    if (i === 300) {
      Swal.fire(
        'Error !',
        'Time Out, Please try again',
        'error'
      )
      clearInterval(myVar)
      $('#loading').hide()
      $('#id_browse').prop('disabled', false)
      i = 0
      return
    }
  }

  if (idSlotRcb === '1') {
    myTimer()
    $.ajax({
      url: '/variable-list/rcb-tmp-variable/rcb-satu',
      type: 'get',
      dataType: 'json',
      success: function(response) {
        if (response === 1) {
          $('#rcb-tmp-variable-table').DataTable().ajax.reload()
          $('#AddModalRcbtmp').modal('show')
          clearInterval(myVar)
          $('#loading').hide()
          $('#id_browse').prop('disabled', false)
          i = 0
        } else {
          Swal.fire(
            'Error !',
            'Tidak terhubung ke server, coba lagi',
            'error'
          )
          clearInterval(myVar)
          $('#loading').hide()
          $('#id_browse').prop('disabled', false)
          i = 0
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError)
      }
    })
  } else if (idSlotRcb === '2') {
    myTimer()
    $.ajax({
      url: '/variable-list/rcb-tmp-variable/rcb-dua',
      type: 'get',
      dataType: 'json',
      success: function(response) {
        if (response === 1) {
          $('#rcb-tmp-variable-table').DataTable().ajax.reload()
          $('#AddModalRcbtmp').modal('show')
          clearInterval(myVar)
          $('#loading').hide()
          $('#browseRcb').prop('disabled', false)
          i = 0
        } else {
          Swal.fire(
            'Error !',
            'Not connect to the server, Please try again',
            'error'
          )
          clearInterval(myVar)
          $('#loading').hide()
          $('#browseRcb').prop('disabled', false)
          i = 0
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError)
      }
    })
  } else if (idSlotRcb === '3') {
    myTimer()
    $.ajax({
      url: '/variable-list/rcb-tmp-variable/rcb-tiga',
      type: 'get',
      dataType: 'json',
      success: function(response) {
        if (response === 1) {
          $('#rcb-tmp-variable-table').DataTable().ajax.reload()
          $('#AddModalRcbtmp').modal('show')
          clearInterval(myVar)
          $('#loading').hide()
          $('#browseRcb').prop('disabled', false)
          i = 0
        } else {
          Swal.fire(
            'Error !',
            'Not connect to the server, Please try again',
            'error'
          )
          clearInterval(myVar)
          $('#loading').hide()
          $('#browseRcb').prop('disabled', false)
          i = 0
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError)
      }
    })
  } else if (idSlotRcb === '4') {
    myTimer()
    $.ajax({
      url: '/variable-list/rcb-tmp-variable/rcb-empat',
      type: 'get',
      dataType: 'json',
      success: function(response) {
        if (response === 1) {
          $('#rcb-tmp-variable-table').DataTable().ajax.reload()
          $('#AddModalRcbtmp').modal('show')
          clearInterval(myVar)
          $('#loading').hide()
          $('#browseRcb').prop('disabled', false)
          i = 0
        } else {
          Swal.fire(
            'Error !',
            'Not connect to the server, Please try again',
            'error'
          )
          clearInterval(myVar)
          $('#loading').hide()
          $('#browseRcb').prop('disabled', false)
          i = 0
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError)
      }
    })
  }
})


// ----------------------------------
// ------ Delete All Variable  ------
// ----------------------------------
// Slave
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
            // $('#slave-variable-table').DataTable().ajax.reload()
            // alert('Data Has been deleted')
            Swal.fire({
              title: 'Success!',
              text: "Data has been deleted",
              type: 'success',
              confirmButtonColor: '#0B5EA3',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                location.reload()
              }
            })
            
          }
        }
      })
    }
  })
})

// IEC
$(document).on('click', '.deleteAllIecVariable', function() {
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
        url: '/variable-list/iec-variable/delete-all-variable',
        method: 'get',
        dataType: 'Json',
        success: function(response) {
          if (response === 1) {
            // alert('Data Has been deleted')
            Swal.fire({
              title: 'Success!',
              text: "Data has been deleted",
              type: 'success',
              confirmButtonColor: '#0B5EA3',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                location.reload()
              }
            })            
          }
        }
      })
    }
  })
})

// RCB
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
            // $('#rcb-variable-table').DataTable().ajax.reload()
            // alert('Data Has been deleted')
            Swal.fire({
              title: 'Success!',
              text: "Data has been deleted",
              type: 'success',
              confirmButtonColor: '#0B5EA3',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                location.reload()
              }
            })
            
          }
        }
      })
    }
  })
})

// Master
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
            // $('#master-variable-table').DataTable().ajax.reload()
            // alert('Data Has been deleted')
            Swal.fire({
              title: 'Success!',
              text: "Data has been deleted",
              type: 'success',
              confirmButtonColor: '#0B5EA3',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                location.reload()
              }
            })            
          }
        }
      })
    }
  })
})

// -------------------------
// ---- Master Variable ----
// -------------------------
$(document).ready(function() {
  $.fn.dataTable.ext.errMode = 'throw';
  var tableMaster = $('#master-variable-table').DataTable({
    autoWidth: false,
    paging: true,
    searching: true,
    ordering: true,
    processing: true,
    responsive: false,
    // serverSide: true,
    // ajax: {
      // 'url': '/variable-list/master-variable/data',
      // 'type': 'GET',
      // 'data': function(d) {
        // d._token = '{{ csrf_token() }}'
      // }
    // },
    // columns: [
    // { data: 'sv_variable_name', name: 'sv_variable_name' },
    // { data: 'sv_id_slot', name: 'sv_id_slot' },
    // { data: 'sv_type', name: 'sv_type' },
    // { data: 'sv_address', name: 'sv_address' },
    // { data: 'ms_variable_name', name: 'ms_variable_name' },
    // { data: 'ms_type', name: 'ms_type' },
    // { data: 'ms_address', name: 'ms_address' },
    // { data: 'action', name: 'action', orderable: false, searchable: false },
    // { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false }
    // ]
  })
  $('.selectMasterAll').click(function() {
    var rows = tableMaster.rows({'search': 'applied'}).nodes();
    $('.master_checkbox').prop('checked', $(this).prop('checked'))
    $('input[type="checkbox"]', rows).prop('checked', this.checked)
  })
})
// -----------------------------
// ---- END Master Variable ----
// -----------------------------
