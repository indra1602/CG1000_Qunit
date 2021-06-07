<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('style/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('style/src/assets/libs/jquery/dist/jquery-3.5.1/jquery.js') }}"></script>
<script src="{{ asset('style/src/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('style/src/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- apps -->
<!-- apps -->
<script src="{{ asset('style/src/dist/js/app-style-switcher.js') }}"></script>
<script src="{{ asset('style/src/dist/js/feather.min.js') }}"></script>
<script src="{{ asset('style/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('style/src/dist/js/sidebarmenu.js') }}"></script>

<!-- Unit Test Java script With QUnit -->
<script src="{{ asset('style/src/dist/js/TestJs/HomeTest.js') }}"></script>
<script src="{{ asset('style/src/dist/js/TestJs/ChangePasswordTest.js') }}"></script>
<script src="{{ asset('style/src/dist/js/TestJs/ProtocolSettingTest.js') }}"></script>

<!--Custom JavaScript -->
<script src="{{ asset('style/src/dist/js/custom.min.js') }}"></script>
<!--This page JavaScript -->
<script src="{{ asset('style/src/assets/extra-libs/c3/d3.min.js') }}"></script>
<script src="{{ asset('style/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('style/src/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>

<script src="{{ asset('style/src/assets/extra-libs/sweet-alert/dist/sweetalert2.all.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/DataTables-1.10.24/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/AutoFill-2.3.4/js/dataTables.autoFill.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/AutoFill-2.3.4/js/autoFill.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/Buttons-1.6.1/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/Buttons-1.6.1/js/buttons.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/Buttons-1.6.1/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/Buttons-1.6.1/js/buttons.flash.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/Buttons-1.6.1/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/Buttons-1.6.1/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/FixedHeader-3.1.6/js/dataTables.fixedHeader.min.js')}}"></script>

<script src="{{ asset('style/src/assets/libs/datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('style/src/assets/libs/datatables/Select-1.3.2/js/dataTables.select.min.js')}}"></script>

<script src="{{ asset('style/src/assets/extra-libs/c3/d3.min.js') }}"></script>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.2/js/dataTables.select.min.js"></script> -->

<!-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->

<!-- ---------------------------------------- -->
<!-- ---------- SWEET ALERT SESSION --------- -->
<!-- ---------------------------------------- -->
<script>
$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
})
</script>

<script>
  @if (Session::has('delete-success'))
  Swal.fire(
    'Success!',
    'Slave Variable has been deleted.',
    'success'
    )
  @elseif (Session::has('update-success'))
  Swal.fire(
    'Success!',
    'The data was updated successfully!',
    'success'
    )
  @elseif (Session::has('add-success'))
  Swal.fire(
    'Success!',
    'The data was added successfully!',
    'success'
    )
  @elseif (Session::has('import-success'))
  Swal.fire(
    'Success!',
    'The data was import successfully!',
    'success'
    )
  @elseif (Session::has('restart-main-success'))
  Swal.fire(
    'Success!',
    'Restart server success!',
    'success'
    )
  @elseif (Session::has('restart-backup-success'))
  Swal.fire(
    'Success!',
    'Restart backup server success!',
    'success'
    )
  @elseif (Session::has('Sending-data-success'))
  Swal.fire(
    'Success!',
    'Import variable success!',
    'success'
    )
  @elseif(Session::has('Sending-data-error'))
  Swal.fire(
    'Error!',
    'Import variable failed!',
    'error'
    )
  @elseif (Session::has('import-error'))
  Swal.fire(
    'Error!',
    'Something wrong. Check your query or file!',
    'error'
    )
  @elseif (Session::has('import-error-duplicate-id'))
  Swal.fire(
    'Error!',
    'The data already exist! Can not duplicate data with the same ID.',
    'error'
    )
  @elseif (Session::has('input-error'))
  Swal.fire(
    'Error!',
    'The data already exists!',
    'error'
    )
  @elseif (Session::has('restart-main-error'))
  Swal.fire(
    'Error!',
    'Restart server failed!',
    'error'
    )
  @elseif (Session::has('restart-backup-error'))
  Swal.fire(
    'Error!',
    'Restart backup server failed!',
    'error'
    )
  @elseif (Session::has('sending-data-GS'))
  Swal.fire(
    'Warning!',
    'Changing the IP address may cause a restart of the system',
    'warning'
    )
  @elseif (Session::has('start-error'))
  Swal.fire(
    'Warning!',
    'Minimum Value of Start is 1',
    'warning'
    )
  @elseif (Session::has('end-error'))
  Swal.fire(
    'Warning!',
    'Maximum Value of End is 9999',
    'warning'
    )
  @endif
</script>

<!-- ---------------------------------------- -->
<!-- ------------ END SWEET ALERT ----------- -->
<!-- ---------------------------------------- -->

<!-- ------------------------------------------ -->
<!-- ------------ Start Data Tables ----------- -->
<!-- ------------------------------------------ -->
<script>
// ------------------------------
// ---- CHECK VARIABLE VALUE ----
// ------------------------------
$(document).ready(function() {
    $('#check-variable-value-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '/variable-list/variable-value/data'
      },
      columns: [
      { data: 'sv_variable_name', name: 'sv_variable_name' },
      { data: 'sv_type', name: 'sv_type' },
      { data: 'sv_address', name: 'sv_address' },
      { data: 'ms_variable_name', name: 'ms_variable_name' },
      { data: 'ms_type', name: 'ms_type' },
      { data: 'ms_address', name: 'ms_address' },
     // { data: 'ms_value', name: 'ms_value' }
      ]
    })
  })
// ----------------------------
// ---- END VARIABLE VALUE ----
// ----------------------------
</script>
<!-- ---------------------------------------- -->
<!-- ------------ End Data Tables ----------- -->
<!-- ---------------------------------------- -->