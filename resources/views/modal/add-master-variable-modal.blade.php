<!------------------------------------------------------------>
<!---------------  ADD MASTER VARIABLE MODAL  ---------------->
<!------------------------------------------------------------>

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/variable-list/master-variable/add" method="POST">
                {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-12 col-sm-4 col-form-label text-sm-left">Slave Address</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="SLV_ADDRESS" name="SLV_ADDRESS" type="text" required="required" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-4 col-form-label text-sm-left">Master Protocol</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select name="ID_MASTER" id="ID_MASTER" class="selectpicker form-control">
                            @foreach($MASTER_PROTOCOLS as $master)
                                <option value="{{$master->ID_MASTER}}">{{$master->NAMES}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-4 col-form-label text-sm-left">Slot Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="ID_SLOT" name="ID_SLOT" type="text" required="required" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-4 col-form-label text-sm-left">Variable Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="VARIABLE_NAME" name="VARIABLE_NAME" type="text" required="required" placeholder="Variable Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-4 col-form-label text-sm-left">Type</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select id="TYPE" name="TYPE" class="form-control">
                                <option value="BOOL">BOOLEAN</option>
                                <option value="INT">INTEGER</option>
                                <option value="REAL">REAL</option>
                                <option value="FLOAT">FLOAT</option>
                                <option value="STRING">STRING</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-4 col-form-label text-sm-left">Address</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="ADDRESS" name="ADDRESS" type="text" required placeholder="Address" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------>
<!-------------   END ADD MASTER VARIABLE MODAL  -------------->
<!------------------------------------------------------------>