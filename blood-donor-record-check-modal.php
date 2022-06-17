<!-- Modal -->
<div class="modal fade custom-modal" id="bloodCheckModal" role="dialog" aria-labelledby="bloodCheckModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ประวัติเลือดติดเชื้อ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-check">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <div class="row">
                                <label class="form-check-label">
                                    <br />
                                    <input id="isconfirmblooddonation" class="check" type="checkbox" onchange="set_discharge(1)" <?php if (!checkPermission("BK_DONATE_UNLOCK", "UNLOCK")) {
                                                                                                                                        echo 'disabled';
                                                                                                                                    }  ?> name="isconfirmblooddonation" value="1" <?php if ($row['isconfirmblooddonation'] == 1) {
                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                    }  ?>>
                                    ยืนยันรับบริจาคเลือดได้
                                </label>
                            </div>
                            <div class="row">
                                <label class="form-check-label">
                                    <br />
                                    <input id="isconfirmdonorblooddonation" class="check" type="checkbox" onchange="set_discharge(2)" <?php if (!checkPermission("BK_DONATE_UNLOCK", "UNLOCK")) {
                                                                                                                                            echo 'disabled';
                                                                                                                                        }  ?> name="isconfirmdonorblooddonation" value="1" <?php if ($row['isconfirmdonorblooddonation'] == 1) {
                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                            }  ?>>
                                    ปลดล็อคการงดรับบริจาค
                                </label>
                            </div>
                            <div class="row">
                                <label class="form-check-label">
                                    <br />
                                    <input id="isconfirmdonorsdp" class="check" type="checkbox" onchange="set_discharge(3)" <?php if (!checkPermission("BK_DONATE_UNLOCK", "UNLOCK")) {
                                                                                                                                echo 'disabled';
                                                                                                                            }  ?> name="isconfirmdonorsdp" value="1" <?php if ($row['isconfirmdonorsdp'] == 1) {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        }  ?>>
                                    ปลดล็อค SDP
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputEmail4">ผู้อนุญาต</label>
                            <select id="confirmblooddonationid" class="form-control confirmblooddonationid" <?php if (!checkPermission("BK_DONATE_UNLOCK", "UNLOCK")) {
                                                                                                                echo 'disabled';
                                                                                                            }  ?> name="confirmblooddonationid">
                                <option value="" selected>โปรดระบุ</option>
                                <?php
                                $strSQL = "SELECT * FROM staff WHERE isblooddriller = 1 ORDER BY id ASC";
                                $objQuery = mysql_query($strSQL);
                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                ?>
                                    <option <?php if ($objResuut["id"] == $row['confirmblooddonationid']) {
                                                echo 'selected';
                                            } ?> value="<?php echo $objResuut['id']; ?>">
                                        <?php echo $objResuut["name"]; ?>
                                        <?php echo $objResuut["surname"]; ?>
                                    </option>
                                <?php
                                }
                                ?>


                            </select>

                        </div>
                        <div class="form-group col-md-2">
                            <div class="row">
                                <label for="inputPassword4">ผู้บันทึก</label>

                                <input type="text" autocomplete="off" readonly class="form-control" value="<?php echo $row["isconfirmblooddonation_user"]; ?>" id="isconfirmblooddonation_user" placeholder="" autocomplete="off" name="isconfirmblooddonation_user">
                            </div>
                            <div class="row">
                                <label for="inputPassword4">ผู้บันทึก</label>

                                <input type="text" autocomplete="off" readonly class="form-control" value="<?php echo $row["isconfirmdonorblooddonation_user"]; ?>" id="isconfirmdonorblooddonation_user" placeholder="" autocomplete="off" name="isconfirmdonorblooddonation_user">

                            </div>
                            <div class="row">
                                <label for="inputPassword4">ผู้บันทึก</label>

                                <input type="text" autocomplete="off" readonly class="form-control" value="<?php echo $row["isconfirmdonorsdp_user"]; ?>" id="isconfirmdonorsdp_user" placeholder="" autocomplete="off" name="isconfirmdonorsdp_user">

                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="form-group col-md-2">
                            <div class="row">
                                <label for="inputPassword4">วันที่/เวลา</label>
                                <input type="text" autocomplete="off" readonly class="form-control" value="<?php echo $row["isconfirmblooddonation_datetime"]; ?>" id="isconfirmblooddonation_datetime" placeholder="" autocomplete="off" name="isconfirmblooddonation_datetime">
                            </div>
                            <div class="row">
                                <label for="inputPassword4">วันที่/เวลา</label>
                                <input type="text" autocomplete="off" readonly class="form-control" value="<?php echo $row["isconfirmdonorblooddonation_datetime"]; ?>" id="isconfirmdonorblooddonation_datetime" placeholder="" autocomplete="off" name="isconfirmdonorblooddonation_datetime">
                            </div>
                            <div class="row">
                                <label for="inputPassword4">วันที่/เวลา</label>
                                <input type="text" autocomplete="off" readonly class="form-control" value="<?php echo $row["isconfirmdonorsdp_datetime"]; ?>" id="isconfirmdonorsdp_datetime" placeholder="" autocomplete="off" name="isconfirmdonorsdp_datetime">
                            </div>

                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">สาเหตุที่บริจาคได้</label>
                            <textarea id="confirmblooddonationremark" class="form-control" name="confirmblooddonationremark" <?php if (!checkPermission("BK_DONATE_UNLOCK", "UNLOCK")) {
                                                                                                                                    echo 'readonly';
                                                                                                                                }  ?> rows="6" cols="50"><?php echo $row["confirmblooddonationremark"]; ?></textarea>
                        </div>

                    </div>


                    <!-- &emsp;&emsp;&emsp;&emsp;
                                    แนบเอกสาร: <input type="file" name="filUpload" id="filUpload"> -->
                </div>
                <br>
                <div class="form-group col-md-12">
                    <div class="tab">
                        <button type="button" class="tablinks" onclick="openTab(event, '1')" id="defaultOpen">ข้อมูลประวัติเลือดติดเชื้อ</button>
                        <button type="button" class="tablinks" onclick="openTab(event, '2')">การเจาะเลือดซ้ำ</button>
                    </div>

                    <div id="1" class="tabcontent">
                        <div class="table-s-scroll" style="height:50vh;">
                            <table id="list_table_json_check_blood" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SYPHILIS TPHA RPR</th>
                                        <th>HBsAg</th>
                                        <th>HIV Ag/Ab</th>
                                        <th>HCV Ab</th>
                                        <th>HBV DNA</th>
                                        <th>HCV RNA</th>
                                        <th>HIV RNA</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="2" class="tabcontent">
                        <div class="table-s-scroll" style="height:50vh;">

                            <table id="list_table_json_appointment_blood" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width:40px;"></th>
                                        <th style="width:100px;">วันที่เจาะซ้ำ</th>
                                        <th style="width:100px;">วันที่นัดฟังผล</th>
                                        <th style="width:100px;">วันที่นัดเจาะซ้ำ</th>
                                        <th style="width:60px;">ครั้งที่</th>
                                        <th>เหตุผลที่เจาะซ้ำ</th>
                                        <th>ผลการตรวจเชื้อ/ให้คำปรึกษา</th>
                                        <th style="width:60px;">อัพโหลด</th>
                                        <th style="width:60px;">เอกสาร</th>
                                        <th class="td-table" style="width:40px">
                                            <button type="button" onclick="clickAddRowRepeatInfectionItem()" class="btn btn-info btn-sm">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">

                        <button onclick="saveAppointment()" class="btn btn-primary" name="submit" type="button">
                            <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                        </button>

                        <button onclick="closePageCheckBlood()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal รับเข็ม/รับบัตร -->
<div class="modal fade custom-modal" id="GetNeedleAndCardModal" role="dialog" aria-labelledby="bloodCheckModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">รับเข็มผู้บริจาค</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12 margin-top-bottom-label-10-5">

                    <div class="row">
                        <br>
                        <div class="form-group col-md-12">
                            <div class="tab">
                                <button type="button" class="tablinks_needle" onclick="openTab_needle(event, '1')" id="defaultOpen_needle">ขอรับเข็มผู้บริจาค</button>
                                <button type="button" class="tablinks_needle" onclick="openTab_needle(event, '2')">รับเข็มผู้บริจาค</button>
                            </div>
                            <br>
                            <div id="1needle" class="tabcontent_needle">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <br>
                                        <label style="margin-top:3px;" class="form-check-label">
                                            <input class="check2" type="checkbox" id="getneedle" name="getneedle" onchange="auto_date_getneedle()" value="1" <?php if (!empty($row['getneedle'])) {
                                                                                                                                                                    echo 'checked onclick="return false;"';
                                                                                                                                                                }  ?>>&nbsp;ขอเข็ม
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5" for="inputState">ครั้งที่รับเข็มที่ระลึก</label>
                                        <select id="souvenirnum" class="form-control form-control-sm" name="souvenirnum" onchange="setsouvenirnum()">
                                            <option <?php if (empty($row['souvenirnum'])) {
                                                        echo 'selected';
                                                    }  ?> value="0">
                                            </option>
                                            <option <?php if ($row['souvenirnum'] == 1) {
                                                        echo ' selected ';
                                                    }  ?>value="1">1
                                            </option>
                                            <option <?php if ($row['souvenirnum'] == 7) {
                                                        echo ' selected ';
                                                    }  ?>value="7">7
                                            </option>
                                            <option <?php if ($row['souvenirnum'] == 16) {
                                                        echo ' selected ';
                                                    }  ?>value="16">
                                                16</option>
                                            <option <?php if ($row['souvenirnum'] == 24) {
                                                        echo ' selected ';
                                                    }  ?>value="24">
                                                24</option>
                                            <option <?php if ($row['souvenirnum'] == 48) {
                                                        echo ' selected ';
                                                    }  ?>value="48">
                                                48</option>
                                            <option <?php if ($row['souvenirnum'] == 60) {
                                                        echo ' selected ';
                                                    }  ?>value="60">
                                                60</option>
                                            <option <?php if ($row['souvenirnum'] == 72) {
                                                        echo ' selected ';
                                                    }  ?>value="72">
                                                72</option>
                                            <option <?php if ($row['souvenirnum'] == 84) {
                                                        echo ' selected ';
                                                    }  ?>value="84">
                                                84</option>
                                            <option <?php if ($row['souvenirnum'] == 96) {
                                                        echo ' selected ';
                                                    }  ?>value="96">
                                                96</option>
                                            <option <?php if ($row['souvenirnum'] == 108) {
                                                        echo ' selected ';
                                                    }  ?>value="108">
                                                108</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5">วันที่ขอเข็มที่ระลึก</label>&nbsp;
                                        <input type="text" autocomplete="off" class="form-control form-control-sm date1" id="getneedledate" aria-describedby="numberlHelp" onkeyup="" value="<?php if (!empty($row["getneedledate"])) {
                                                                                                                                                                                                    echo date_format(date_create($row["getneedledate"]), "d/m/Y");
                                                                                                                                                                                                }  ?>" name="getneedledate">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5">เจ้าหน้าที่ผู้จ่ายเข็ม</label>
                                        <select id="staffneedleid" class="form-control form-control-sm staffneedleid" name="staffneedleid">
                                            <option value="" selected>โปรดระบุ</option>
                                            <?php
                                            $strSQL = "SELECT * FROM staff WHERE isstaffsouvenirid = 1 ORDER BY id ASC";
                                            $objQuery = mysql_query($strSQL);
                                            while ($objResuut = mysql_fetch_array($objQuery)) {
                                            ?>
                                                <option <?php if ($objResuut["id"] == $row['staffneedleid']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $objResuut['id']; ?>">
                                                    <?php echo $objResuut["name"]; ?>
                                                    <?php echo $objResuut["surname"]; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="2needle" class="tabcontent_needle">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <br>
                                        <label style="margin-top:3px;" class="form-check-label">
                                            <input class="check2" type="checkbox" id="receiveneedle" name="receiveneedle" onchange="auto_date_getneedle2()" value="1" <?php if (!empty($row['receiveneedle'])) {
                                                                                                                                                                            echo 'checked onclick="return false;"';
                                                                                                                                                                        }  ?>>&nbsp;รับเข็ม
                                        </label>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5" for="inputState">ครั้งที่รับเข็มที่ระลึก</label>
                                        <select id="souvenirnum2" class="form-control form-control-sm" name="souvenirnum2" onchange="setsouvenirnum2();">
                                            <option <?php if (empty($row['souvenirnum'])) {
                                                        echo 'selected';
                                                    }  ?> value="0">
                                            </option>
                                            <option <?php if ($row['souvenirnum'] == 1) {
                                                        echo ' selected ';
                                                    }  ?>value="1">1
                                            </option>
                                            <option <?php if ($row['souvenirnum'] == 7) {
                                                        echo ' selected ';
                                                    }  ?>value="7">7
                                            </option>
                                            <option <?php if ($row['souvenirnum'] == 16) {
                                                        echo ' selected ';
                                                    }  ?>value="16">
                                                16</option>
                                            <option <?php if ($row['souvenirnum'] == 24) {
                                                        echo ' selected ';
                                                    }  ?>value="24">
                                                24</option>
                                            <option <?php if ($row['souvenirnum'] == 48) {
                                                        echo ' selected ';
                                                    }  ?>value="48">
                                                48</option>
                                            <option <?php if ($row['souvenirnum'] == 60) {
                                                        echo ' selected ';
                                                    }  ?>value="60">
                                                60</option>
                                            <option <?php if ($row['souvenirnum'] == 72) {
                                                        echo ' selected ';
                                                    }  ?>value="72">
                                                72</option>
                                            <option <?php if ($row['souvenirnum'] == 84) {
                                                        echo ' selected ';
                                                    }  ?>value="84">
                                                84</option>
                                            <option <?php if ($row['souvenirnum'] == 96) {
                                                        echo ' selected ';
                                                    }  ?>value="96">
                                                96</option>
                                            <option <?php if ($row['souvenirnum'] == 108) {
                                                        echo ' selected ';
                                                    }  ?>value="108">
                                                108</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5">วันที่รับเข็มที่ระลึก</label>&nbsp;
                                        <input type="text" autocomplete="off" class="form-control date1" id="receiveneedledate" aria-describedby="numberlHelp" onkeyup="" value="<?php if (!empty($row["receiveneedledate"])) {
                                                                                                                                                                                        echo date_format(date_create($row["receiveneedledate"]), "d/m/Y");
                                                                                                                                                                                    }  ?>" name="receiveneedledate">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5">เจ้าหน้าที่ผู้จ่ายเข็ม</label>
                                        <select id="receivestaffneedleid" class="form-control form-control-sm receivestaffneedleid" name="receivestaffneedleid">
                                            <option value="" selected>โปรดระบุ</option>
                                            <?php
                                            $strSQL = "SELECT * FROM staff WHERE isstaffsouvenirid = 1 ORDER BY id ASC";
                                            $objQuery = mysql_query($strSQL);
                                            while ($objResuut = mysql_fetch_array($objQuery)) {
                                            ?>
                                                <option <?php if ($objResuut["id"] == $row['receivestaffneedleid']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $objResuut['id']; ?>">
                                                    <?php echo $objResuut["name"]; ?>
                                                    <?php echo $objResuut["surname"]; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- &emsp;|&emsp; -->

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="closePageGetNeedleAndCardModal()" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal รับเข็ม/รับบัตร -->
<div class="modal fade custom-modal" id="GetNeedleAndCardModal2" role="dialog" aria-labelledby="bloodCheckModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">รับบัตรผู้บริจาค</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12 margin-top-bottom-label-10-5">
                    <div class="row">
                        <br>
                        <div class="form-group col-md-12">
                            <div class="tab">
                                <button type="button" class="tablinks_card" onclick="openTab_card(event, '1')" id="defaultOpen_card">ขอบัตรผู้บริจาค</button>
                                <button type="button" class="tablinks_card" onclick="openTab_card(event, '2')">รับบัตรผู้บริจาค</button>
                            </div>

                            <div id="1card" class="tabcontent_card">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <br>
                                        <label style="margin-top:3px;" class="form-check-label">
                                            <input class="check2" type="checkbox" id="getcard" name="getcard" onchange="auto_date_getcard()" value="1" <?php if (!empty($row['getcard'])) {
                                                                                                                                                            echo 'checked onclick="return false;"';
                                                                                                                                                        }  ?>>&nbsp;ขอบัตร
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5">วันที่ขอบัตร</label>&nbsp;
                                        <input type="text" autocomplete="off" class="form-control form-control-sm date1" id="getcarddate" aria-describedby="numberlHelp" onkeyup="" value="<?php if (!empty($row["getcarddate"])) {
                                                                                                                                                                                                echo date_format(date_create($row["getcarddate"]), "d/m/Y");
                                                                                                                                                                                            }  ?>" name="getcarddate">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5">เจ้าหน้าที่ทำเรื่องขอบัตร</label>&nbsp;
                                        <select id="staffcardid" class="form-control form-control-sm staffcardid" name="staffcardid">
                                            <option value="" selected>โปรดระบุ</option>
                                            <?php
                                            $strSQL = "SELECT * FROM staff WHERE isstaffcardid = 1 ORDER BY id ASC";
                                            $objQuery = mysql_query($strSQL);
                                            while ($objResuut = mysql_fetch_array($objQuery)) {
                                            ?>
                                                <option <?php if ($objResuut["id"] == $row['staffcardid']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $objResuut['id']; ?>">
                                                    <?php echo $objResuut["name"]; ?>
                                                    <?php echo $objResuut["surname"]; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="2card" class="tabcontent_card">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <br>
                                        <label style="margin-top:3px;" class="form-check-label">
                                            <input class="check2" type="checkbox" id="receivecard" name="receivecard" onchange="auto_date_getcard2()" value="1" <?php if (!empty($row['receivecard'])) {
                                                                                                                                                                    echo 'checked onclick="return false;"';
                                                                                                                                                                }  ?>>&nbsp;รับบัตร
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5">วันที่รับบัตร</label>&nbsp;
                                        <input type="text" autocomplete="off" class="form-control form-control-sm date1" id="receivecarddate" aria-describedby="numberlHelp" onkeyup="" value="<?php if (!empty($row["receivecarddate"])) {
                                                                                                                                                                                                    echo $row["receivecarddate"];
                                                                                                                                                                                                }  ?>" name="receivecarddate">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="margin-top-label-5">เจ้าหน้าที่ผู้จ่ายบัตร</label>&nbsp;
                                        <select id="receivestaffcardid" class="form-control form-control-sm staffcardid" name="receivestaffcardid">
                                            <option value="" selected>โปรดระบุ</option>
                                            <?php
                                            $strSQL = "SELECT * FROM staff WHERE isstaffcardid = 1 ORDER BY id ASC";
                                            $objQuery = mysql_query($strSQL);
                                            while ($objResuut = mysql_fetch_array($objQuery)) {
                                            ?>
                                                <option <?php if ($objResuut["id"] == $row['receivestaffcardid']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $objResuut['id']; ?>">
                                                    <?php echo $objResuut["name"]; ?>
                                                    <?php echo $objResuut["surname"]; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- &emsp;|&emsp; -->

                    </div>
                    <p style="color: red;">Checkbox นี่ถ้าติ๊กแล้วบันทึกข้อมูลแล้วจะแก้ไขอีกไม่ได้</p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="closePageGetNeedleAndCardModal2(1)" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                        </button>
                        <!-- <button onclick="closePageGetNeedleAndCardModal2(2)" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function auto_date_getcard() {
        var getcard = document.getElementById("getcard").checked;
        if (getcard == true) {
            document.getElementById("getcarddate").value = getDMY543();
        } else {
            document.getElementById("getcarddate").value = "";
        }
    }

    function auto_date_getcard2() {
        var getcard = document.getElementById("receivecard").checked;
        if (getcard == true) {
            document.getElementById("receivecarddate").value = getDMY543();
        } else {
            document.getElementById("receivecarddate").value = "";
        }
    }

    function auto_date_getneedle() {
        var getneedle = document.getElementById("getneedle").checked;
        if (getneedle == true) {
            document.getElementById("getneedledate").value = getDMY543();
        } else {
            document.getElementById("getneedledate").value = "";
        }
    }

    function auto_date_getneedle2() {
        var receiveneedle = document.getElementById("receiveneedle").checked;
        if (receiveneedle == true) {
            document.getElementById("receiveneedledate").value = getDMY543();
        } else {
            document.getElementById("receiveneedledate").value = "";
        }
    }

    function set_discharge(number) {
        var user = document.getElementById("name_login").innerHTML;
        var data1 = $("#isconfirmblooddonation_user").val();
        var data2 = $("#isconfirmdonorblooddonation_user").val();
        var data3 = $("#isconfirmdonorsdp_user").val();

        if (number == 1) {
            if (data1 == "") {
                $("#isconfirmblooddonation_user").val(user);
                $("#isconfirmblooddonation_datetime").val(getDMYHM543());
            } else {
                $("#isconfirmblooddonation_user").val("");
                $("#isconfirmblooddonation_datetime").val("");
            }
        } else if (number == 2) {
            if (data2 == "") {
                $("#isconfirmdonorblooddonation_user").val(user);
                $("#isconfirmdonorblooddonation_datetime").val(getDMYHM543());
            } else {
                $("#isconfirmdonorblooddonation_user").val("");
                $("#isconfirmdonorblooddonation_datetime").val("");
            }
        } else if (number == 3) {
            if (data3 == "") {
                $("#isconfirmdonorsdp_user").val(user);
                $("#isconfirmdonorsdp_datetime").val(getDMYHM543());
            } else {
                $("#isconfirmdonorsdp_user").val("");
                $("#isconfirmdonorsdp_datetime").val("");
            }
        }
    }

    function openTab_card(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent_card");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks_card");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

        if (cityName == 1) {
            document.getElementById("1card").style.display = "block";
            document.getElementById("2card").style.display = "none";

        } else if (cityName == 2) {
            document.getElementById("1card").style.display = "none";
            document.getElementById("2card").style.display = "block";

        }
    }


    function openTab_needle(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent_needle");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks_needle");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

        if (cityName == 1) {
            document.getElementById("1needle").style.display = "block";
            document.getElementById("2needle").style.display = "none";

        } else if (cityName == 2) {
            document.getElementById("1needle").style.display = "none";
            document.getElementById("2needle").style.display = "block";

        }
    }

    function setsouvenirnum2() {
        var souvenirnum2 = document.getElementById("souvenirnum2").value;

        document.getElementById("souvenirnum").value = souvenirnum2;
    }

    function setsouvenirnum() {
        var souvenirnum = document.getElementById("souvenirnum").value;

        document.getElementById("souvenirnum2").value = souvenirnum;
    }
</script>