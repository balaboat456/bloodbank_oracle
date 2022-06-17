<div class="modal fade blood-invest-modal" id="bloodRefundModal5" tabindex="-1" role="dialog"
    aria-labelledby="bloodModal" aria-hidden="true" style="z-index:1060">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label_refund_receivingtypeid_11">ข้อมูลประวัติการยืมเลือดกับ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-s-scroll" style="height:80vh;">
                    <table id="list_blood_refund_receivingtypeid_11">
                        <thead>
                        <tr>
                                <th rowspan="2" style="width:160px">เลขที่ยืมเลือด</th>
                                <th colspan="5" id="label_stock_pay_title_1" >จำนวนที่ยืม</th>
                                <th colspan="5" id="label_stock_pay_title_2" style="background:#404040">จำนวนที่คืน</th>
                                <th rowspan="2" style="width:60px">จำนวนคงค้าง</th>
                            </tr>
                            <tr>
                                <th style="top:25px;">ชนิดเลือด</th>
                                <th style="top:25px;width:60px">Bl.Gr.</th>
                                <th style="top:25px;width:60px">จำนวนที่ขอ</th>
                                <th style="top:25px;width:60px">รวม</th>
                                <th style="top:25px;width:160px">วันที่ยืม</th>
                                <th style="background:#404040;top:25px;">ชนิดเลือด</th>
                                <th style="width:60px;background:#404040;top:25px;">Bl.Gr.</th>
                                <th style="width:60px;background:#404040;top:25px;">จำนวนที่คืน</th>
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
                    <button class="btn btn-success" onclick="confirmchReceivingTypeid_11()" type="button">
                        <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                    </button>
                    <button type="button" onclick="closeBloodRefund5()" class="btn btn-warning m-l-5">
                        <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                    </button>
                </div>



            </div>
        </div>
    </div>
</div>