<!------------------------------------------------------------>
<!---------------  MASTER PROTOCOL CONF MODAL  --------------->
<!------------------------------------------------------------>
<div class="modal fade" id="masterConfOPCUA" tabindex="-1" role="dialog" aria-labelledby="masterConfOPCUALabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">OPC-UA Server</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/general-setting/master-config" method="POST">
        {{ csrf_field() }}
            <div class="form-group row">
                <label class="col-12 col-sm-4 col-form-label text-sm-left">Port</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="MASTER_PORT" name="MASTER_PORT" type="text" value="{{$MASTER_PORT}}" required="required" placeholder="PORT" class="form-control">
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
<!------------------------------------------------------------>
<!------------- END MASTER PROTOCOL CONF MODAL --------------->
<!------------------------------------------------------------>

<!---------------------------------------------------------------->
<!---------------  MASTER VPS PROTOCOL CONF MODAL  --------------->
<!---------------------------------------------------------------->
<div class="modal fade" id="masterConfVPS" tabindex="-1" role="dialog" aria-labelledby="masterConfSVPLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Len VPS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/general-setting/master-config-VPS" method="POST">
        {{ csrf_field() }}
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">IP ADDRESS</label>
              <div class="col-12 col-sm-8 col-lg-6">
                <input id="MASTER_IPAddress" name="MASTER_IPAddress" type="text" value="{{$MASTER_IPAddress}}" required="required" placeholder="Variable Name" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">PORT</label>
              <div class="col-12 col-sm-8 col-lg-6">
                <input id="MASTER_PortVps" name="MASTER_PortVps" type="text" value="{{$MASTER_PortVps}}" required="required" placeholder="Variable Name" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Pooling Time</label>
              <div class="col-12 col-sm-8 col-lg-6">
                <input id="MASTER_Pt" name="MASTER_Pt" type="text" value="{{$MASTER_Pt}}" required="required" placeholder="Variable Name" class="form-control">
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
<!---------------------------------------------------------------->
<!------------- END MASTER VPS PROTOCOL CONF MODAL --------------->
<!---------------------------------------------------------------->

<!--------------------------------------------------------------->
<!---------------  SLAVE TCP PROTOCOL CONF MODAL  --------------->
<!--------------------------------------------------------------->
<div class="modal fade" id="slaveConfTCP" tabindex="-1" role="dialog" aria-labelledby="slaveConfTCPLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Configure TCP Protocol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <form action="/general-setting/tcp-config/update" method="POST"> -->
        <form action="#" method="POST">
        {{ csrf_field() }}
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Slot Number</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_SLOTS" name="slave_slot_edit" type="text" value="" required="required" placeholder="ID SLOT" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-12 col-sm-8 col-lg-6">
                <input id="SLAVE_PROTOCOLS" name="slave_protocols_edit" type="text" value="" required="required" placeholder="Protocol Type" class="form-control" hidden readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Protocol Type</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="NAME_PROTOCOL_TCP" name="slave_protocols_edit" type="text" value="" required="required" placeholder="Protocol Type" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Main IP</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_IP" name="slave_ip_edit" type="text" value="" required="required" placeholder="Main IP" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Secondary IP</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_ND" name="slave_nd_edit" type="text" value="" required="required" placeholder="Secondary IP" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Port</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_PORT" name="slave_port_edit" type="text" value="" required="required" placeholder="Port" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Pooling Time</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_Time" name="slave_time_edit" type="text" value="" required="required" placeholder="Pooling" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Timeout</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_Timeout" name="slave_timeout_edit" type="text" value="" required="required" placeholder="Main IP" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary UpdateAjaxTcp">Apply</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------->
<!------------- END SLAVE TCP PROTOCOL CONF MODAL --------------->
<!--------------------------------------------------------------->

<!--------------------------------------------------------------->
<!---------------  SLAVE RTU PROTOCOL CONF MODAL  --------------->
<!--------------------------------------------------------------->
<div class="modal fade" id="slaveConfRTU" tabindex="-1" role="dialog" aria-labelledby="slaveConfRTULabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Configure RTU Protocol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
        {{ csrf_field() }}
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Slot Number</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLOT_SLAVE" name="slot_slave_edit" type="text" value="" required="required" placeholder="ID SLOT" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-12 col-sm-8 col-lg-6">
                <input id="PROTOCOLS_SLAVE" name="protocol_slave_edit" type="text" value="" required="required" placeholder="Protocol Type" class="form-control" hidden readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Protocol Type</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="NAME_PROTOCOL_RTU" name="name_protocols_edit" type="text" value="" required="required" placeholder="Protocol Type" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Serial Type</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="SERIAL_TYPE" name="serial_type_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Serial Type ====</option>
                      <option value="RS232">RS232</option>
                      <option value="RS485">RS485</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Port</label>
                <div class="col-12 col-sm-8 col-lg-6">
                  <select id="PORT_RTU" ame="port_rtu_edit" class="custom-select form-control PORT_RTU">
                    <option value="" disabled="true" selected="true">==== Port ====</option>
                  </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Baud rate</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="BAUD_RATE" name="baud_rate_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Baud Rate ====</option>
                      <option value="1200">1200</option>
                      <option value="2400">2400</option>
                      <option value="4800">4800</option>
                      <option value="9600">9600</option>
                      <option value="38400">38400</option>
                      <option value="57600">57600</option>
                      <option value="115200">115200</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Parity</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="PARITY" name="parity_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Parity ====</option>
                      <option value="NONE">NONE</option>
                      <option value="EVEN">EVEN</option>
                      <option value="ODD">ODD</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Data Bits</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="DATA_BITS" name="data_bits_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Data Bits ====</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Stop Bits</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <select id="STOP_BITS" name="stop_bits_edit" class="custom-select form-control">
                      <option value="" disabled="true" selected="true">==== Stop Bits ====</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary UpdateAjaxRtu">Apply</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------->
<!------------- END SLAVE RTU PROTOCOL CONF MODAL --------------->
<!--------------------------------------------------------------->

<!-------------------------------------------------------------->
<!--------------- SLAVE IEC PROTOCOL CONF MODAL  --------------->
<!-------------------------------------------------------------->
<div class="modal fade" id="slaveConfIEC" tabindex="-1" role="dialog" aria-labelledby="slaveConfIECLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Configure IEC61850 Protocol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <form action="/general-setting/tcp-config/update" method="POST"> -->
        <form action="#" method="POST">
        {{ csrf_field() }}
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Slot Number</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_SLOT_IEC" name="slave_slot_iec" type="text" value="" required="required" placeholder="ID SLOT" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-12 col-sm-8 col-lg-6">
                <input id="SLAVE_PROTOCOL_IEC" name="slave_protocol_iec" type="text" value="" required="required" placeholder="Protocol Type" class="form-control" hidden readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Protocol Type</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="NAME_PROTOCOL_IEC" name="slave_protocol_iec" type="text" value="" required="required" placeholder="Protocol Type" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Main IP</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_IP_IEC" name="slave_ip_iec" type="text" value="" required="required" placeholder="Main IP" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Secondary IP</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_ND_IEC" name="slave_nd_iec" type="text" value="" required="required" placeholder="Secondary IP" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Port</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_PORT_IEC" name="slave_port_iec" type="text" value="" required="required" placeholder="Port" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Pooling Time</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_Time_IEC" name="slave_time_iec" type="text" value="" required="required" placeholder="Pooling" class="form-control">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-sm-left">Timeout</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input id="SLAVE_Timeout_IEC" name="slave_timeout_iec" type="text" value="" required="required" placeholder="Timeout" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary UpdateAjaxIec">Apply</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------->
<!------------- END SLAVE IEC PROTOCOL CONF MODAL --------------->
<!--------------------------------------------------------------->