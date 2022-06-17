<!-- Modal -->
<div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ประวัติการบริจาค</h5>
                <button type="button" class="close" onclick="customModalMaxMin()">
                    <span aria-hidden="true" id="btnIconMaxMin"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="table_stock_customModal" class="table-stock-scroll" style="height: 75vh;">
                    <table id="list_table_json" class="table table-bordered table-hover">
                        <thead id="list_table_header_json">
                            <tr>
                                <th class="table-td-header">เลขที่ผู้บริจาค</th>
                                <th class="table-td-header" style="min-width: 140px;">วัน-เวลาที่บริจาค</th>
                                <th class="table-td-header" style="min-width: 180px;">ชื่อ-สกุล</th>
                                <th class="table-td-header" style="min-width: 40px;">ครั้งที่<br />บริจาค</th>
                                <th class="table-td-header" style="min-width: 170px;">ชนิดเลือด<br />ที่บริจาค</th>
                                <th class="table-td-header" style="min-width: 120px;">หมายเลขถุง</th>
                                <th class="table-td-header">Infectious<br />Markers</th>
                                <th class="table-td-header">Antibody<br />Screening</th>
                                <!-- <th id="h_antibody" class="table-td-header" style="min-width: 140px;">Antibody</th>
                                <th id="h_phenotype" class="table-td-header" style="min-width: 140px;">phenotype</th> -->
                                <th class="table-td-header" style="min-width: 140px;">หมายเหตุ</th>
                                <th class="table-td-header">แก้ไข</th>
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
                        <button id="idAntiPhone" onclick="showAntiPhone()" class="btn btn-info" type="button" style="position: absolute;left: 10px;">
                            <span class="btn-label"><i class="fa fa-arrows-h"></i></span>แสดง Antibody และ Phenotype
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php if (!empty($row['donateid'])) { ?>
                            <button onclick="closePage()" class="btn btn-warning" type="button">
                                <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                            </button>

                        <?php } else { ?>
                            <button onclick="confirmAddBloodDonation()" id="btnAddModal" class="btn btn-success" type="button">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                            </button>
                            <button type="button" onclick="newPage()" class="btn btn-warning m-l-5">
                                <span class="btn-label"><i class="fa fa-remove"></i></span>ยกเลิก
                            </button>
                        <?php }; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>