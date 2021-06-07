<!-------------------------------------------------->
<!--------------- MODAL SNMP Driver ---------------->
<!-------------------------------------------------->

<div class="modal fade" id="ModifySnmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="snmp-driver/update" method="POST">
                    {{ csrf_field() }}
                                    
                    @foreach($snmp_driver_ver as $sdv)
                    <div class="form-group">
                        <label for="snmp-ver" class="col-form-label">SNMP Version</label>
                        <input id="snmp-ver" name="VALUE1" type="text" required="required" readonly value="{{$sdv->VALUE}}" class="col col-lg-10 form-control">
                    </div>
                    @endforeach
                    
                    @foreach($snmp_driver_port as $sdp)
                    <div class="form-group">
                        <input id="CONFIG_ITEM2" name="CONFIG_ITEM2" type="hidden" value="Port" required="required">
                        <label for="snmp-port" class="col-form-label">Port</label>
                        <input id="snmp-port" name="VALUE2" type="text" value="{{$sdp->VALUE}}" required="required" class="col col-lg-10 form-control">
                    </div>
                    @endforeach
                    
                    @foreach($snmp_driver_username as $sdu)
                    <div class="form-group">
                        <label for="snmp-uname" class="col-form-label">SNMPv2 Username</label>
                        <input id="snmp-uname" name="VALUE3" type="text" value="{{$sdu->VALUE}}" required="required" class="col col-lg-10 form-control">
                    </div>
                    @endforeach
                    
                    <div class="form-group row text-right">
                        <div class="col col-lg-10">
                            <button type="submit" class="btn btn-rounded btn-primary">Apply</button>
                            <a href ="/home" class="btn btn-rounded btn-secondary btn-close">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------->
<!------------- END MODAL SNMP Driver -------------->
<!-------------------------------------------------->