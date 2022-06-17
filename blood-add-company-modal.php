<!-- Modal -->
<div class="modal fade custom-modal" id="customCompanyModal" tabindex="-1" role="dialog" 
    aria-hidden="true" style="width:800px; margin-left:51%;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">[<label id="companystate" ></label>]บริษัทน้ำยา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">บริษัทน้ำยา</label>
                        <input hidden type="text" autocomplete="off" class="form-control" id="emtrycompanypasid"  name="emtrycompanypasid">
                        <input type="text" autocomplete="off" class="form-control" id="emtrycompanypasname"  name="emtrycompanypasname">
                    </div>
                    
                </div>
                <div class="table-no-scroll" style="height:520px">
                    <table id="list_table_json_company"  class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th style="width:60px">No.</th>
                                <th >บริษัท</th>
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

                        <button type="button" onclick="newCompany()" class="btn btn-success m-l-5">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
                        </button>

                        <button onclick="saveCompany()" class="btn btn-primary" name="btnSaveModal" type="button">
                            <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                        </button>

                        <button onclick="closeCustomCompany()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>