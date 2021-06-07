<!----------------------------------------------------->
<!---------------  PASSWORD CONF MODAL  --------------->
<!----------------------------------------------------->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/user-data/data/update" method="POST">
        {{ csrf_field() }}
        @foreach($DATA_USER as $DU)
        <input type="hidden" class="form-control" name="edit_id_user" value="{{$DU->id}}" id="edit_id_user" placeholder="">
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">USERNAME</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input id="edit_username" name="edit_username" type="text" value="{{$DU->username}}" required="required" placeholder="USERNAME" class="form-control" readonly>
            </div>
          </div>
          @endforeach
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">OLD PASSWORD</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input id="edit_old_pass" name="edit_old_pass" type="text" value="" required="required" placeholder="OLD PASSWORD" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">NEW PASSWORD</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input id="edit_password" name="edit_password" type="text" value="" required="required" placeholder="NEW PASSWORD" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Apply</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------------->
<!------------- END PASSWORD CONF MODAL --------------->
<!----------------------------------------------------->