<!-- Modal -->
<div class="modal fade custom-modal" id="bloodCancelModal" tabindex="-1" role="dialog" aria-labelledby="bloodCancelModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">รายละเอียดการปฏิเสธสิ่งส่งตรวจ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel1" class="check" type="checkbox" name="bloodcancel1">
                                1) สิ่งส่งตรวจและใบขอส่งตรวจ มีชื่อ-นามสกุลผู้ป่วย HN และ AN จำนวนสิ่งส่งตรวจ ไม่ตรงกัน
                                ไม่ครบถ้วน ไม่ชัดเจน
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel7" class="check" type="checkbox" name="bloodcancel7">
                                7) เป็นตัวอย่างเลือดที่เก็บจากสาย Intravenous fluid หรือจาก Blood catheter ที่ปนสารน้ำ
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel2" class="check" type="checkbox" name="bloodcancel2">
                                2) ไม่มีชื่อผู้ทำการเก็บเจาะเลือด บน slide tube
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel8" class="check" type="checkbox" name="bloodcancel8">
                                8) เป็นตัวอย่างเลือดที่เจาะเก็บไว้นานกว่า 24 ชั่วโมง
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel3" class="check" type="checkbox" name="bloodcancel3">
                                3) ติด Sticker แต่ไม่ได้ลงเวลาผู้เจาะเก็บ
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel9" class="check" type="checkbox" name="bloodcancel9">
                                9) เป็นตัวอย่างเลือดที่แบ่งมาจากหลอดสิ่งส่งตรวจอื่นๆ
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel4" class="check" type="checkbox" name="bloodcancel4">
                                4) ใช้ใบขอส่งตรวจผิดประเภท
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel10" class="check" type="checkbox" name="bloodcancel10">
                                10) ความผิดปกติอื่นๆ ที่ธนาคารเลือดพิจารณาแล้วอาจมีความเสี่ยง
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel5" class="check" type="checkbox" name="bloodcancel5">
                                5) มีตัวอย่างเลือดผู้ป่วยน้อยกว่า 5 มล.
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel11" class="check" type="checkbox" name="bloodcancel11">
                                11) มีก้อน clot ซึ่งจะรบกวนกระบวนการตรวจวิเคราะห์
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel6" class="check" type="checkbox" name="bloodcancel6">
                                6) ตัวอย่างเลือดมี Hemolysis
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="bloodcancel12" class="check" type="checkbox" name="bloodcancel12">
                                12) สิ่งส่งตรวจเก็บในอุณหภูมิที่ไม่เหมาะสม
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="lname">สาเหตุอื่น</label>
                        <textarea type="text" autocomplete="off" class="form-control" id="requestbloodcancelother" name="requestbloodcancelother"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">เจ้าหน้าที่ธนาคารเลือด</label>
                        <select id="isbloodblank" class="form-control form-control-sm isbloodblank" name="isbloodblank">
                            <option value="" selected>โปรดระบุ</option>
                            <?php
                            $strSQL = "SELECT * FROM staff WHERE isbloodblank = 1 ORDER BY id ASC";
                            $objQuery = mysql_query($strSQL);
                            while ($objResuut = mysql_fetch_array($objQuery)) {
                            ?>
                                <option <?php if ($objResuut["id"] == $row['isbloodblank']) {
                                            echo 'selected';
                                        } ?> value="<?php echo $objResuut['id']; ?>">
                                    <?php echo $objResuut["name"] . '|' . $objResuut["code"]; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-success" onclick="bloodCancelModalOK()" type="button">
                            <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                        </button>
                        <button onclick="bloodCancelModalClose()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>