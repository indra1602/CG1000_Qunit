/* global $, location, Swal, alert, response, confirm */
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
  })

  $('.selectSlaveAll').click(function() {
    var rowSlave = tableSlave.rows({'search': 'applied'}).nodes()
    $('.slave_checkbox').prop('checked', $(this).prop('checked'))
    $('input[type="checkbox"]', rowSlave).prop('checked', this.checked)
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
  })
  $('.selectRcbAll').click(function() {
    var rowRcb = tableRcb.rows({'search': 'applied'}).nodes()
    $('.rcb_checkbox').prop('checked', $(this).prop('checked'))
    $('input[type="checkbox"]', rowRcb).prop('checked', this.checked)
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
