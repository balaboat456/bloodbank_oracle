<!-- Modal -->
<div class="modal fade custom-modal" id="customActivityModal" tabindex="-1" role="dialog" 
    aria-hidden="true" style="width:800px">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">[<label id="activitystate" ></label>] กิจกรรม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">ชื่อกิจกรรม</label>
                        <input hidden type="text" autocomplete="off" class="form-control" id="emtryactivityid"  name="emtryactivityid">
                        <input type="text" autocomplete="off" class="form-control" id="emtryactivityname"  name="emtryactivityname">
                    </div>
                    
                </div>
                <div class="table-no-scroll" style="height:520px">
                    <table id="list_table_json_activity"  class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th style="width:60px">No.</th>
                                <th >ชื่อกิจกรรม</th>
                                <th style="width:100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">

                        <button type="button" onclick="newActivity()" class="btn btn-success m-l-5">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
                        </button>

                        <button onclick="saveActivity()" class="btn btn-primary" type="button">
                            <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                        </button>

                        <button onclick="closeActivity()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>