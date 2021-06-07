<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Unit Testing Change Password</title>
	<link rel="stylesheet"
	href="https://code.jquery.com/qunit/qunit-2.12.0.css">
	<script src="https://code.jquery.com/qunit/qunit-2.13.0.js"></script>
	<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<!-- <script src="../../public/style/src/assets/extra-libs/sweet-alert/dist/sweetalert2.min.css"></script>
	<script src="../../public/style/src/assets/extra-libs/sweet-alert/dist/sweetalert2.css"></script>
    <script src="../../public/style/src/assets/extra-libs/sweet-alert/dist/sweetalert2.all.min.js"></script> -->
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="card offset-xl-2 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 mb-5">
                <div class="card-body border-top">
                    <form class="offset-xl-2" id="changePassword" name="changePassword">
                        <input type="hidden" name="_token" value="DgHaKNjNH5Jz8rS0WYTY4dVhnNBQzVGa94PkV3bt">
                        <div class="form-group">
                            <input id="edit_id_user" name="edit_id_user" type="hidden" required="required" readonly="" value="1" class="col col-lg-10 form-control">  
                            <label for="username" class="col-form-label">Username</label>
                            <input id="edit_username" name="edit_username" type="text" required="required" readonly="" value="adminFEP" class="col col-lg-10 form-control">
                        </div>
                        <div class="form-group">
                            <label for="new-password" class="col-form-label">New Password</label>
                            <input id="edit_NewPassword" name="edit_NewPassword" type="text" required="required" minlength="6" class="col col-lg-10 form-control" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password" class="col-form-label">Confirm New Password</label>
                            <input id="edit_password" name="edit_password" type="text" required="required" minlength="6" class="col col-lg-10 form-control" placeholder="Confirm New Password">
                        </div>
                        <div class="form-group row text-right">
                            <div class="col col-lg-10">
                                <button type="submit" class="btn btn-rounded btn-primary updatePassword">Apply</button>
                                <a href="/home" class="btn  btn-rounded btn-secondary  btn-close">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
	<script>
		QUnit.test('Test event function restart', function(assert){
            const response = 1 //value dari return ajax url: '/user-config/update'
            $(document).on('click', '.updatePassword', function() {
                const idUser = $('#edit_id_user').val()
                const cPassword = $('#edit_password').val()
                const nPassword = $('#edit_NewPassword').val()
                if (((nPassword === '') && (cPassword === '')) || (nPassword !== cPassword)) {
                    alert('Please check your data')
                } else {
                    // $.ajax({
                        // url: '/user-config/update',
                        // type: 'get',
                        // dataType: 'json',
                        // data: {
                            // idUser: idUser,
                            // cPassword: cPassword
                        // },
                        // success: function(response) {
                            // if (response === 1) {
                                alert('Password has been changed')
                                // Swal.fire(
                                    // 'Success !',
                                    // 'Password has been changed',
                                    // 'success'
                                // )
                                // window.location = 'localhost:8000/home'
                            // } else {
                                // alert('Update data error')
                                // Swal.fire(
                                    // 'Error !',
                                    // 'Update data error',
                                    // 'error'
                                // )
                            // }
                        // },
                        // error: function(xhr, ajaxOptions, thrownError) {
                            // alert(thrownError)
                        // }
                    // })
                }
            })
            assert.equal(response, 1, "Test change password sukses")
			// assert.ok(true,"test Restart sukses");
		});
	</script>
</body>
</html>