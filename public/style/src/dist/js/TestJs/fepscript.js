/* global $, location, Swal, alert, response, confirm */

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
