<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">

                        <div class="form-group col-md-6"><label>หน่วยงาน</label>
                            <input hidden type="text" autocomplete="off" value="1" class="form-control" id="searchlabunitid"
                                name="searchlabunitid">
                            <input readonly type="text" autocomplete="off" value="Blood Bank" class="form-control" id="searchlabunitname"
                                name="searchlabunitname">
                        </div>

                        <div class="form-group col-md-6"><label>ประเภทงาน</label>
                            <input hidden type="text" autocomplete="off" value="1" class="form-control" id="searchlabjobtypeid"
                                name="searchlabjobtypeid">
                            <input readonly type="text" autocomplete="off" value="Blood Bank" class="form-control" id="searchlabjobtypename"
                                name="searchlabjobtypename">
                        </div>
                        
                        <div class="form-group col-md-3"><label>วันที่ส่งตรวจ</label>
                            <input type="text" autocomplete="off" value="<?php echo dateNowDMY(); ?>" class="form-control date"
                                id="searchfromdate" onkeyup="getDate8('searchfromdate')" name="searchfromdate">
                        </div>

                        <div class="form-group col-md-3"><label>เวลา</label>
                            <input type="time" autocomplete="off" value="00:00" class="form-control"
                                id="searchfromtime"  name="searchfromtime">
                        </div>

                        <div class="form-group col-md-3"><label>-</label>
                            <input type="text" autocomplete="off" value="<?php echo dateNowDMY(); ?>" class="form-control date"
                                id="searchtodate" onkeyup="getDate8('searchtodate')" name="searchtodate">
                        </div>

                        <div class="form-group col-md-3"><label>เวลา</label>
                            <input type="time" autocomplete="off" value="23:59" class="form-control"
                                id="searchtotime"  name="searchtotime">
                        </div>

                        <div class="form-group col-md-6"><label>สถานะสิ่งส่งตรวจ</label>
                            <select id="searchcheckresultbloodstatusid" class="form-control" name="searchcheckresultbloodstatusid"></select>
                        </div>


                        <div class="form-group col-md-6"><label>หน่วยงานส่งตรวจ</label>
                            <select id="searchlabunitroomid" class="form-control" name="searchlabunitroomid"></select>
                        </div>

                        <div class="form-group col-md-3"><label>LN</label>
                            <input type="text" autocomplete="off" value="" class="form-control"
                                id="searchfromln"  name="searchfromln">
                        </div>


                        <div class="form-group col-md-3"><label>-</label>
                            <input type="text" autocomplete="off" value="" class="form-control"
                                id="searchtoln"  name="searchtoln">
                        </div>

                        <div class="form-group col-md-6"><label>ชื่อ-สกุล</label>
                            <input type="text" autocomplete="off" value="" class="form-control"
                                id="searchpatientfullname"  name="searchpatientfullname">
                        </div>

                        <div class="form-group col-md-3"><label>HN</label>
                            <input type="text" autocomplete="off" value="" class="form-control"
                                id="searchhn"  name="searchhn">
                        </div>


                        <div class="form-group col-md-3"><label>AN</label>
                            <input type="text" autocomplete="off" value="" class="form-control"
                                id="searchan"  name="searchan">
                        </div>


                    </div>
                </div>
                

                

            </div>
        </div><!-- end card-->
    </div>
</div>
<div class="div-save">
    <div class="save-bottom">
        <div class="form-group text-right m-b-0">
            <div>
                <button onclick="loadTable()" class="btn btn-info" type="button">
                    <span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล
                </button>
            </div>

        </div>

    </div>
</div>