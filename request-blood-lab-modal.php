<div class="modal fade blank-modal" id="requestbloodlabmodal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ค้นหาข้อมูลการรักษา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">

                <div class="form-group col-md-12">
                    <div class="tab">
                        <button type="button" class="tablinks" onclick="openTab(event, '1')" >ข้อมูลใหม่</button>
                        <button type="button" class="tablinks" onclick="openTab(event, '2')" id="defaultOpen">ข้อมูลเก่า</button>
                        <!-- <button type="button" class="tablinks"
                            onclick="openTab(event, '3')">ข้อมูลนัด</button> -->
                    </div>

                    <div id="1" class="tabcontent">
                        <?php include('request-blood-lab-modal-tab1.php'); ?>
                    </div>

                    <div id="2" class="tabcontent">
                        <?php include('request-blood-lab-modal-tab2.php'); ?>
                    </div>

                    <div id="3" class="tabcontent">

                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="setItemManualPayment()" id="btnAddModal" class="btn btn-info" type="button">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>ผู้ป่วยนอกระบบชำระเงินเอง
                        </button>
                        <button id="btnAddData" onclick="setItemLab()" id="btnAddModal" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                        </button>
                        <button id="btnEditData" onclick="addItemEditData()" id="btnAddModal" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-check"></i></span>เปิด
                        </button>
                        <button type="button" onclick="requestBloodLabModalClose()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>