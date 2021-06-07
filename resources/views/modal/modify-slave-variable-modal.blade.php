<!------------------------------------------------------------>
<!--------------- MODIFY SLAVE VARIABLE MODAL ---------------->
<!------------------------------------------------------------>

<div class="modal fade" id="ModifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/variable-list/slave-variable/update" method="POST">
        {{ csrf_field() }}
            <div class="form-group row">
                <input id="id_variable_edit" name="ID_VARIABLE" type="hidden" class="form-control">
            </div>
            <div class="form-group row">
                <label class="col-12 col-sm-4 col-form-label text-sm-left">Slave Protocol</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select name="ID_SLAVE" id="id_slave_edit" class="selectpicker form-control">
                        <option value="1">MODBUS TCP Client</option>
                        <option value="2">MODBUS RTU Master</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-sm-4 col-form-label text-sm-left">Slot Number</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select name="ID_SLOT" id="id_slot_edit" class="selectpicker form-control">
                        @foreach($GENERAL_SETTING as $gs)
                        <option value="{{$gs->ID_SLOT}}">{{$gs->ID_SLOT}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-sm-4 col-form-label text-sm-left">Variable Name</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="variable_name_edit" name="VARIABLE_NAME" type="text" required="required" placeholder="Variable Name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-sm-4 col-form-label text-sm-left">Type</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="type_edit" name="TYPE" class="form-control">
                        <option value="COIL">COIL</option>
                        <option value="DISCRETE_INPUT">DISCRETE_INPUT</option>
                        <option value="INPUT_REGISTER">INPUT_REGISTER</option>
                        <option value="HOLDING">HOLDING</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-sm-4 col-form-label text-sm-left">Access</label>
                <!-- <div class="col-12 col-sm-8 col-lg-6"> -->
                    <!-- <input id="access_edit" name="ACCESS" type="text" required="required" placeholder="Access" class="form-control"> -->
                <!-- </div> -->
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="access_edit" name="ACCESS" class="form-control">
                        <option value="0">Read</option>
                        <option value="1">Read/Write</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-sm-4 col-form-label text-sm-left">Address</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="address_edit" name="ADDRESS" type="text" required placeholder="Address" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!------------------------------------------------------------>
<!------------- END MODIFY SLAVE VARIABLE MODAL -------------->
<!------------------------------------------------------------>