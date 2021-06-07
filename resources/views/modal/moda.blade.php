<!------------------------------------------------------------------>
<!---------------  SLAVE STATUS PROTOCOL CONF MODAL  --------------->
<!------------------------------------------------------------------>
<div class="modal fade" id="slaveStatusConf" tabindex="-1" role="dialog" aria-labelledby="slaveConfTCPLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Shortcut Configure Slave Protocol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
        {{ csrf_field() }}
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">ID SLOT</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input id="SLAVE_SLOTES" name="SLAVE_SLOTES" type="text" value="" required="required" placeholder="ID SLOT" class="form-control" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">Status Slave</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <select id="active_slave" name="active_slave" class="form-control">
                <option value="0">Disabled</option>
                <option value="1">Enabled</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-sm-4 col-form-label text-sm-left">Protocols Slave</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <select id="protocols_active" name="protocols_active" class="form-control">
                @foreach($PROTOCOL_SETTING as $slv_protocols)
                  <option value="{{$slv_protocols->ID_SLAVE}}">{{$slv_protocols->NAMES}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary UpdateAjaxStatus">Apply</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------------------------------>
<!------------- END SLAVE STATUS PROTOCOL CONF MODAL --------------->
<!------------------------------------------------------------------>