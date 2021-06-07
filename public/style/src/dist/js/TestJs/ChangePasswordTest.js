QUnit.module('Test event toggle Home', function(){
    $(document).on('click', '.updatePassword', function() {
        const idUser = $('#edit_id_user').val()
        const cPassword = $('#edit_password').val()
        const nPassword = $('#edit_NewPassword').val()
        console.log(nPassword)
        console.log(cPassword)

        if (((nPassword === '') && (cPassword === '')) || (nPassword !==    cPassword) ) {
            QUnit.test('Test event click function toggle SNMP display', function(assert){
                assert.notOk(true, 'incomplete data ')
            })
        } else {
            $.ajax({
              url: '/user-config/update',
              type: 'get',
              dataType: 'json',
              data: {
                idUser: idUser,
                cPassword: cPassword
              },
              success: function(response) {
                if (response === 1) {
                    QUnit.test('Test event click function toggle SNMP display', function(assert){
                        assert.ok(true, 'data has been updated')    
                    })
                } else {
                    QUnit.test('Test event click function toggle SNMP display', function(assert){
                        assert.notOk(true, 'data failed to update')
                    })
                }
              },
              error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError)
              }
            })
        }
    })
})