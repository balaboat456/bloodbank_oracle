<div class="modal fade blood-invest-modal" id="bloodBloodStockPay" tabindex="-1" role="dialog"
    aria-labelledby="bloodModal" aria-hidden="true" style="z-index:1060">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label_stock_pay">ข้อมูลประวัติการยืมเลือดกับ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-s-scroll" style="height:80vh;">
                    <table id="list_blood_stock_pay">
                        <thead>
                            <tr>
                                <th rowspan="2" style="width:160px">เลขที่จ่ายเลือด</th>
                                <th colspan="5" id="label_stock_pay_title_1">จำนวนที่ให้แลก</th>
                                <th colspan="5" id="label_stock_pay_title_2" style="background:#404040">จำนวนที่รับแลก
                                </th>
                                <th rowspan="2" style="width:60px">จำนวนคงค้าง</th>


                            </tr>
                            <tr>
                                <th style="top:25px;">ชนิดเลือด</th>
                                <th style="top:25px;width:60px">Bl.Gr.</th>
                                <th style="top:25px;width:60px">จำนวน</th>
                                <th style="top:25px;width:60px">รวม</th>
                                <th style="top:25px;width:160px">วันที่</th>
                                <th style="background:#404040;top:25px;">ชนิดเลือด</th>
                                <th style="width:60px;background:#404040;top:25px;">Bl.Gr.</th>
                                <th style="width:60px;background:#404040;top:25px;">จำนวน</th>
                                <th style="width:60px;background:#404040;top:25px;">รวม</th>
                                <th style="width:160px;background:#404040;top:25px;">วันที่</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <div align="right" class="form-group col-md-6">
                    <button class="btn btn-success" onclick="confirmchBloodStockPay()" type="button">
                        <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                    </button>
                    <button type="button" onclick="closeBloodStockPay()" class="btn btn-warning m-l-5">
                        <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                    </button>
                </div>



            </div>
        </div>
    </div>
</div>