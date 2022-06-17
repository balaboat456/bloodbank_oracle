<script src="<?php echo $socket_io_url_config; ?>/socket.io/socket.io.js"></script>
<script>
    var socket = io.connect("<?php echo $socket_io_url_config; ?>", {
        transport: ['websocket']
    });
</script>
<div id="headerbarElement" class="headerbar">

    <div class="headerbar-left">
        <a href="<?php if ($_SESSION['rolename'] == 'Nurse') {
                        echo 'askforblood.php';
                    } else {
                        echo 'dashboard.php';
                    }  ?> " class="logo">
            <img alt="Logo" src="assets/images/avatars/RJlogocut.png" /> <span>
            </span></a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">
            <?php if (checkPermission("BK_DONATE_MAIN", "VW")) { ?>
                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">

                        <button onclick="clickMenu(1)" class="dropbtn">งานรับบริจาคโลหิต</button>
                        <div id="menuDropdown1" class="dropdown-content dropdown-content1">
                            <?php if (checkPermission("BK_DONATE", "VW")) { ?>
                                <a href="#" onclick="onclickDationMenu(1)">บันทึกผู้มาบริจาค</a>
                                <a href="#" onclick="onclickDationMenu(2)">บันทึกผู้มาบริจาค (หน่วยเคลื่อนที่)</a>
                                <a href="#" onclick="onclickDationMenu(3)">บันทึกผู้มาบริจาค (กิจกรรม)</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_BLOOD_RESULT", "VW")) { ?>
                                <a href="blood-investigate.php">บันทึกผลตรวจเลือดผู้มาบริจาค</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_COMPONENTS", "VW")) { ?>
                                <a href="blood-donor-record-list2.php">บันทึกแยกส่วนประกอบ</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_BLOOD_INFECT", "VW")) { ?>
                                <a href="blood-Infected.php">บันทึกเลือดติดเชื้อ</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <?php if (checkPermission("BK_STOCK_MAIN", "VW")) { ?>
                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">
                        <button onclick="clickMenu(2)" class="dropbtn">คลังเลือด</button>
                        <div id="menuDropdown2" class="dropdown-content dropdown-content2">
                            <?php if (checkPermission("BK_BLOOD_STOCK", "VW")) { ?>
                                <a href="inventory-blood-bank.php">คลังเลือด</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_WITHDRAW", "VW")) { ?>
                                <a href="blood-borrow.php">บันทึกการเบิก/ยืมเลือด</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_ASK_NUMBER", "VW")) { ?>
                                <a href="query-bag-number.php">สอบถามหมายเลขถุง</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if (checkPermission("BK_INTERNAL", "VW") && $_SESSION['rolename'] != 'Nurse') { ?>
                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">
                        <button onclick="clickMenu(3)" class="dropbtn">งานจ่ายเลือดให้กับหน่วยงานภายใน</button>
                        <div id="menuDropdown3" class="dropdown-content dropdown-content3">
                            <?php if (checkPermission("BK_BLOOD_REQUEST", "VW")) { ?>
                                <a href="askforblood.php">บันทึกขอเลือด/แพ้เลือด/คืนเลือด</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_BLOOD_QUEUE", "VW")) { ?>
                                <a href="blood-queue.php">ลำดับคิวขอเลือด</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_CROSSMATCH", "VW")) { ?>
                                <a href="check-patient-blood.php">บันทึกผลการตรวจเลือดผู้ป่วย/ผลการ crossmatch</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_BLOOD_DISCHARGE", "VW")) { ?>
                                <a href="blood-disconnect.php">บันทึกปลดเลือด</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_BLOOD_EM_DISCHARG", "VW")) { ?>
                                <a href="blood-emergency-room.php">บันทึกปลดเลือด(ห้องฉุกเฉิน)</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_BLOOD_RETURN", "VW")) { ?>
                                <a href="blood-return.php">บันทึกการรับคืนเลือด</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if (checkPermission("BK_NURSE", "VW") && $_SESSION['rolename'] != 'Nurse') { ?>
                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">
                        <button onclick="clickMenu(7)" class="dropbtn">งานพยาบาล</button>
                        <div id="menuDropdown7" class="dropdown-content dropdown-content7">
                            <?php if (checkPermission("BK_CONFIRM_USE", "VW")) { ?>
                                <a href="blood-queue-nurse.php">บันทึกการยืนยันการใช้เลือด</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <a hidden id="button_nurse1" href="askforblood.php">บันทึกขอเลือด/แพ้เลือด/คืนเลือด</a>
            <a hidden id="button_nurse2" href="blood-queue-nurse.php">บันทึกการยืนยันการใช้เลือด</a>

            <?php if ($_SESSION['rolename'] == 'Nurse') { ?>
                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">
                        <button onclick="clickMenu_nurse1('1');" class="dropbtn">บันทึกขอเลือด/แพ้เลือด/คืนเลือด</button>
                    </div>
                </li>

                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">
                        <button onclick="clickMenu_nurse1('2');" class="dropbtn">บันทึกการยืนยันการใช้เลือด</button>
                    </div>
                </li>



            <?php } ?>

            <?php if (checkPermission("BK_TREATMENT", "VW")) { ?>
                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">
                        <button onclick="clickMenu(4)" class="dropbtn">การรักษาผู้ป่วย</button>
                        <div id="menuDropdown4" class="dropdown-content dropdown-content4">
                            <?php if (checkPermission("BK_BLOOD_LETTING", "VW")) { ?>
                                <a href="blood-letting.php">บันทึกข้อมูลการทำ Blood Letting</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_EXCHANGE", "VW")) { ?>
                                <a href="blood-exchange.php">บันทึกข้อมูล Exchange</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_WA_RED_CELL", "VW")) { ?>
                                <a href="blood-washed-red-cell.php">บันทึกการทำ Washed Red Cell</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_SERUM_TEAR", "VW")) { ?>
                                <a href="blood-serum-tear.php">บันทึกข้อมูล Serum Tear</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if (checkPermission("BK_LAB", "VW")) { ?>
                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">
                        <button onclick="clickMenu(5)" class="dropbtn">งานตรวจทางห้องปฏิบัติการ</button>
                        <div id="menuDropdown5" class="dropdown-content dropdown-content5">
                            <?php if (checkPermission("BK_REQUEST_LAB", "VW")) { ?>
                                <a href="request-blood-lab.php">บันทึกขอตรวจทางห้องปฏิบัติการ</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_RECEIVE_LAB", "VW")) { ?>
                                <a href="get-request-blood-lab.php">บันทึกรับสิ่งส่งตรวจจากห้องปฏิบัติการ</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_RESULT_LAB", "VW")) { ?>
                                <!-- <a href="record-request-blood-lab.php">บันทึกผลการตรวจทางห้องปฏิบัติการ</a> -->
                            <?php } ?>
                            <?php if (checkPermission("BK_RESULT_RECODE_LAB", "VW")) { ?>
                                <a href="test-result-blood-bank.php">บันทึกผลการตรวจทางห้องปฏิบัติการ</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_ASK_RESULT_LAB", "VW")) { ?>
                                <a href="query-result-test-lab.php">สอบถามผลชันสูตรโรค</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_PATIENT", "VW")) { ?>
                                <a href="patient-list.php">รายชื่อผู้ป่วย</a>
                            <?php } ?>
                            <?php if (checkPermission("BK_PATIENT", "VW")) { ?>
                                <a href="patient-info.php">ข้อมูลผู้ป่วย</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if (checkPermission("BK_REPORT", "VW")) { ?>
                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">
                        <button onclick="clickMenu(6)" class="dropbtn">รายงาน</button>

                        <div id="menuDropdown6_4" class="dropdown-content dropdown-content-right4 dropdown-content6">
                            <label class="title-list-menu"><b>รายงานการรับบริจาคโลหิต</b></label>
                            <a href="report_blood_colection_page.php">1.รายงาน Blood Collection</a>
                            <a href="blood-report-form.php?report=15">2.รายงานผู้ที่สามารถบริจาคเลือดได้</a>
                            <a href="blood-report-form.php?report=14">3.รายงานผู้ที่ไม่สามารถบริจาคเลือดได้</a>
                            <a href="blood-report-form.php?report=17">4.รายงานสถิติสาเหตุที่ไม่สามารถบริจาคเลือดได้</a>
                            <a href="blood-report-form.php?report=16">5.รายงานเจ้าหน้าที่ที่มาบริจาคโลหิต</a>
                            <a href="blood-report-form.php?report=18">6.รายงานกิจกรรมการบริจาคโลหิต</a>
                            <a href="blood-donation-check-blood-for-relatives.php">7.ใบตอบรับการบริจาคโลหิตทดแทน</a>
                            <a href="blood-report-form.php?report=3">8.รายงานการรับบริจาคโลหิตทดแทนญาติ</a>
                            <!-- <a href="blood-report-form.php?report=4">9.รายงานรายชื่อผู้บริจาคโลหิตติดเชื้อ</a> -->
                            <a href="report_blood_donate_infect.php">9.รายงานรายชื่อผู้บริจาคโลหิตติดเชื้อ</a>
                            <a href="blood-report-donate-problems-form.php">10.รายงานปัญหาของการรับบริจาคทั่วไป</a>
                            <a href="blood-blood-donation-tracking-gift-needle.php">11.รายการรับเข็มที่ระลึกตามจำนวนครั้งของการบริจาค</a>
                            <a href="report_privilege.php">12.รายงานขอบัตรแข็งของศูนย์บริการโลหิตแห่งชาติสภาชาดไทย</a>
                            <a href="blood-report-form.php?report=27">13.รายงานอุบัติการณ์</a>
                            <a href="blood-report-form.php?report=28">14.รายงานการขอใบรับรองการบริจาค</a>
                            <a href="blood-blood-donation-tracking-letter.php">15.จดหมายติดตามผู้บริจาคโลหิต</a>


                        </div>

                        <div id="menuDropdown6_3" class="dropdown-content dropdown-content-right3 dropdown-content6">
                            <label class="title-list-menu"><b>รายงานการรับบริจาคโลหิต</b></label>
                            <a href="blood-donation-check-blood-letter.php">16.จดหมายติดตามผู้บริจาคโลหิตมาตรวจเลือดซ้ำ</a>
                            <a href="report_static_fragment_blood.php">17.รายงานสถิติการเตรียมส่วนประกอบโลหิต</a>
                            <a href="report_static_fragment_blood_lppc.php">18.รายงานสถิติการเตรียม LPPC / LPPC(PAS)</a>
                            <a href="report-blood-firsttime.php">19.รายงานผู้มาบริจาคโลหิตครั้งแรกที่โรงพยาบาลราชวิถี</a>
                            <a href="blood-report-repeat-antibody.php">20.รายงานการ Repeat Antibody Screening Test</a>
                            <a href="blood-donor-record-docment-form-emtry-report.php">21.แบบฟอร์มส่งตรวจคัดกรองโลหิต</a>
                            <a href="report_appointment.php">22.รายงานการนัดหมายผู้มาบริจาค</a>
                            <a href="report_static_fragment_blood_ffp.php">23.รายงานการคัดแยก FFP พร้อมใช้</a>
                        </div>

                        <div id="menuDropdown6" class="dropdown-content dropdown-content-right dropdown-content6">
                            <label class="title-list-menu"><b>รายงานคลังเลือด</b></label>
                            <a href="blood-report-form.php?report=10">1.รายงานการรับเลือดเข้าคลังประจำวัน</a>
                            <a href="blood-report-form.php?report=13">2.รายงานการรับเลือดเข้าคลังประจำเดือน</a>
                            <a href="blood-report-pay-return-static-form.php">3.รายงานสรุปการยืม/คืนเลือดกับสถานพยาบาลอื่น</a>
                            <a href="blood-report-pay-return-exchange-form.php">4.รายงานสรุปการแลกเลือดกับสถานพยาบาลอื่น</a>
                            <a href="blood-report-pay-return-loan-form.php">5.รายงานสรุปการให้ยืมเลือดกับสถานพยาบาลอื่น</a>
                            <a href="blood-report-pay-static-form.php">6.รายงานการจ่ายเลือดประจำวัน</a>
                            <a href="blood-report-form.php?report=31">7.รายงานการขอเบิก-รับโลหิตพิเศษ</a>
                            <a href="blood-report-summary-not-receive.php">8.รายงานสถิติถุงเลือดที่รอยืนยันเข้าคลัง</a>
                            <a href="blood-report-summary-not-ready.php">9.รายงานเลือดไม่พร้อมจ่าย</a>
                            <a href="blood-report-withdraw-borrow-return-form.php">10.รายงานสรุปการยืม/คืน/แลก เลือดกับสถานพยาบาลอื่น</a>
                            <label class="title-list-menu"><b>รายงานการรักษา</b></label>
                            <a href="blood-report-form.php?report=26&reportsub=1">1.รายงานการทำ Blood Letting</a>
                            <a href="blood-report-form.php?report=26&reportsub=2">2.รายงานการทำ Exchange</a>
                            <a href="blood-report-form.php?report=26&reportsub=3">3.รายงานการทำ Washed Red Cell</a>
                            <a href="blood-report-form.php?report=26&reportsub=4">4.รายงานการทำ Serum Tear</a>
                        </div>
                        <div id="menuDropdown6_2" class="dropdown-content dropdown-content-right2 dropdown-content6">
                            <label class="title-list-menu"><b>รายงานจ่ายเลือดให้กับหน่วยงานภายใน</b></label>
                            <a href="blood-report-form.php?report=25">1.รายงานสรุปจำนวน crossmatch และจำนวนที่จ่ายจริง</a>
                            <a href="blood-report-refuse-cancel-ask-blood-form.php">2.รายงานปฏิเสธ-ยกเลิก-การขอเลือด</a>
                            <a href="blood-report-form.php?report=32">3.รายงานการแพ้เลือดประจำเดือน</a>
                            <label class="title-list-menu"><b>รายงานตรวจทางห้องปฏิบัติการ</b></label>
                            <a href="blood-report-request-cure-lab-form.php">1.รายงานตรวจทางห้องปฏิบัติการ</a>

                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if (checkPermission("BK_STATISTICS", "VW")) { ?>
                <li class="list-inline-item dropdown notif">
                    <div class="dropdown">
                        <button onclick="clickMenu(8)" class="dropbtn">สถิติ</button>
                        <div id="menuDropdown8" class="dropdown-content dropdown-content-right2 dropdown-content8">
                            <a href="blood-report-form.php?report=6">1.สถิติ Statistic Of Single Donor Platelet Process</a>
                            <a href="blood-report-form.php?report=9">2.สถิติห้องรับบริจาคเกล็ดเลือดประจำปี</a>
                            <a href="blood-report-form.php?report=19">3.สถิติปัญหาแทรกซ้อนจากบริจาคเกล็ดโลหิต</a>
                            <a href="blood-report-form.php?report=23">4.สถิติเลือดหมดอายุในคลัง</a>
                            <a href="blood-report-request-cure-lab-year-form.php">5.สถิติการตรวจทางห้องปฏิบัติการ</a>

                            <a href="blood-report-form.php?report=29">6.สถิติการจ่ายเลือด</a>
                            <a href="blood-report-form.php?report=30">7.สถิติการขอใช้เลือด</a>
                            <a href="blood report patient cure static.php">8.สถิติการรักษาผู้ป่วยประจำปี</a>
                            <a href="blood report receive static.php">9.สถิติการรับเลือดประจำปี</a>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/avatars/avatar9.png" alt="Profile image" class="avatar-rounded">
                    <b id="name_login" style="-webkit-text-stroke: 1px black;"><?php echo $_SESSION["fullname"]; ?></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">

                    <!-- <a href="#" onclick="showPrinterSettingModal()" class="dropdown-item notify-item" style="color: black;">
                        <i class="fa fa-print"></i> <span>Printer Setting</span>
                    </a> -->
                    <a href="setting-unit.php" class="dropdown-item notify-item" style="color: black;">
                        <i class="fa fa-cog"></i> <span>ตั้งค่าหน่วยงาน</span>
                    </a>
                    <a href="change-password.php" class="dropdown-item notify-item" style="color: black;">
                        <i class="fa fa-key"></i> <span>เปลี่ยนรหัสผ่าน</span>
                    </a>
                    <a href="#" onclick="click_logout()" class="dropdown-item notify-item" style="color: black;">
                        <i class="fa fa-power-off"></i> <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>


    </nav>

</div>

<div id="pointwardLable" class="ward-lable">
    <label id="pointward" class="ward-lable-text"></label>
</div>

<style>
    .ward-lable {
        z-index: 100000;
        position: fixed;
        bottom: 0px;
        right: 20px;
    }

    .ward-lable-text {
        font-size: 12px;
        color: black;
    }
</style>

<script>
    function clickMenu_nurse1(id) {
        try {
            if (id == 1) {
                // document.getElementById('button_nurse1').click();
                window.location.href = "askforblood.php";
            } else if (id == 2) {
                // document.getElementById('button_nurse2').click();
                window.location.href = "blood-queue-nurse.php";
            }
        } catch {
            alert('9999');
        }

    }


    function onclickDationMenu(type) {
        localStorage.setItem("placeid", type);
        window.location = 'blood-donor-record.php';

    }

    if (localStorage.getItem("pointwardid", ''))
        document.getElementById('pointward').innerHTML = localStorage.getItem("pointwardname", '');
</script>

<script>
    var session_username = "<?php echo $_SESSION['username']; ?>";
    localStorage.setItem("session_username", session_username);

    socket.on('logout', function(data) {
        console.log(data);
        if (localStorage.getItem("session_username", '') == data) {
            window.location.reload();
        }

    });


    function click_logout() {
        $.ajax({
            type: 'POST',
            url: 'logout.php',
            dataType: 'json',
            success: function(data) {
                socket.emit('logout', data.username);
                window.location.reload();
            },
            error: function(data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    }
</script>

<?php if ($dbname_config == 'bloodbank_uat') { ?>
    <style>
        .uat-lable {
            z-index: 100000;
            position: fixed;
            top: 70px;
            left: 250px;
            text-shadow: 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black, 0 0 4px black;
        }

        .uat-lable-text {
            font-size: 30px;
            color: red;
        }
    </style>
    <div id="uatLable" class="uat-lable">
        <label class="uat-lable-text">UAT ใช้สำหรับทดสอบเท่านั้น</label>

    </div>

    <script>
        dragElement(document.getElementById("uatLable"));

        function dragElement(elmnt) {
            var pos1 = 0,
                pos2 = 0,
                pos3 = 0,
                pos4 = 0;
            if (document.getElementById(elmnt.id + "header")) {
                // if present, the header is where you move the DIV from:
                document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
            } else {
                // otherwise, move the DIV from anywhere inside the DIV:
                elmnt.onmousedown = dragMouseDown;
            }

            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();
                // get the mouse cursor position at startup:
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                // call a function whenever the cursor moves:
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                // set the element's new position:
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
            }

            function closeDragElement() {
                // stop moving when mouse button is released:
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }
    </script>


<?php } ?>




<?php include('printer-setting-modal.php'); ?>