<div class="modal fade blank-modal" id="labformmodal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">แบบฟอร์มใบขอตรวจชันสูตรโรค (F-LAB)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">

                <div class="form-group col-md-12">
                    <div class="tab">
                        <button type="button" class="tablinks" onclick="openTabLabForm(event, 'labform1')"
                            id="defaultOpenLabForm">Blood Bank</button>
                        <!-- <button type="button" class="tablinks"
                            onclick="openTab(event, '2')">ข้อมูลเก่า</button> -->
                        <!-- <button type="button" class="tablinks"
                            onclick="openTab(event, '3')">ข้อมูลนัด</button> -->
                    </div>

                    <div id="labform1" class="tabcontent">
                        <?php include('test-result-blood-bank-form-modal-tab1.php'); ?>
                    </div>

                  
                </div>

                

            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button  onclick="setLabFormToItemList()" id="btnAddModal" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                        </button>
                        <button type="button" onclick="labFormModalClose()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>