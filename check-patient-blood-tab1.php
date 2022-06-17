<input type="text" value="" id="requestbloodid" name="requestbloodid" hidden>
<input type="text" value="" id="requestbloodstatusid" name="requestbloodstatusid" hidden>
<input type="text" value="" id="requestbloodcode" name="requestbloodcode" hidden>
<input type="text" value="" id="hn" name="hn" hidden>
<input type="text" value="" id="forchildren" name="forchildren" hidden>
<input type="text" value="" id="bloodsampletube" name="bloodsampletube" hidden>

<input type="text" value="" id="isconfirmbloodgroupqueue" name="isconfirmbloodgroupqueue" hidden>
<input type="text" value="" id="isreadybloodstatus" name="isreadybloodstatus" hidden>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">


        <div class="card-body">
            <div class="container-fluid">

                <div class="form-group row">
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">วันที่รับสิ่งส่งตรวจ</label>

                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm date1" id="requestqueueblooddate" aria-describedby="numberlHelp" onkeyup="" value="" name="requestqueueblooddate">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputPassword4">เวลา</label>
                        <input readonly required type="text" autocomplete="off" class="form-control form-control-sm" id="requestqueuebloodtime" aria-describedby="numberlHelp" onkeyup="" name="requestqueuebloodtime">
                    </div>

                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <br>
                            <div class="form-group">
                                <label class="form-check-label">
                                    <input class="check5" onclick="" type="radio" id="inouttime1" name="inouttime" value="1">
                                    ในเวลา
                                </label>
                                &emsp;&emsp;
                                <label class="form-check-label">
                                    <input class="check5" onclick="" type="radio" id="inouttime2" name="inouttime" value="2">
                                    นอกเวลา
                                </label>
                            </div>
                        </div>
                    </div>

                    <div hidden class="form-group col-md-2">
                        <div class="form-group">
                            <br>
                            <div class="form-group">
                                <label class="form-check-label">
                                    <input class="check5" onclick="" type="checkbox" id="autocontrol" name="autocontrol" value="1">
                                    Auto Control
                                </label>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="form-group row" style="margin-top:-20px">

                    <div class="form-group col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                ตารางหมู่โลหิต ABO
                            </div>

                        </div>

                        <div class="table-no-scroll" style="height:220px !important">
                            <table id="list_table_abo" class="main-table">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="width:80px !important">Reagent</th>
                                        <th colspan="3">Cell Grouping</th>
                                        <th colspan="3">Serum Grouping</th>
                                        <th style="width:160px !important" rowspan="2">
                                            Blood<br />Group
                                        </th>
                                        <th style="width:40px" rowspan="2">
                                            <button id="btnAddABOTest" type="button" onclick="addABOTest()" class="btn btn-info btn-sm">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </th>

                                    </tr>
                                    <tr>

                                        <th style="width:80px !important">Anti-A</th>
                                        <th style="width:80px !important">Anti-B</th>
                                        <th style="width:80px !important">Anti-AB</th>
                                        <th style="width:80px !important">A Cells</th>
                                        <th style="width:80px !important">B Cells</th>
                                        <th style="width:80px !important">O Cells</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row" style="margin-top:5px">
                            <div class="col-md-5" align="left">
                            </div>

                            <div class="col-md-3" align="right">
                                Confirm Blood Group :
                            </div>

                            <div class="col-md-3" align="left">
                                <b>
                                    <select id="confirmbloodgroup" onchange="checkBloodGroup(this.value)" name="confirmbloodgroup" class="form-control form-control-sm select2"></select>
                                </b>
                            </div>

                            <div class="col-md-1" align="left">
                                <a role="button" href="#" onclick="checkBloodABOModalHistoryShow()" style="margin-top:0px" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span><i class="fa fa-calendar-o" aria-hidden="true"></i></a>
                            </div>

                        </div>




                    </div>

                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <br />
                            </div>

                        </div>

                        <div class="table-no-scroll">
                            <table class="main-table">
                                <thead>
                                    <tr>
                                        <th style="width:80px !important">Anti-A1
                                        </th>
                                        <th style="width:80px !important">Anti-H
                                        </th>
                                        <th style="width:80px !important">A2cells
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="td-table">
                                            <select id="anti-a1" name="antia1" class="form-control form-control-sm"></select>
                                        </td>
                                        <td class="td-table">
                                            <select id="anti-h" name="antih" class="form-control form-control-sm"></select>
                                        </td>
                                        <td class="td-table">
                                            <select id="a2cells" name="a2cells" class="form-control form-control-sm"></select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>

                    <div class="form-group col-md-12">
                        <div class="row vertical-bottom">
                            <div class="col-md-6 padding-top-top15">
                                ตารางหมู่โลหิต Rh
                            </div>

                        </div>

                        <div class="table-s-scroll">
                            <table id="list_table_rh">
                                <thead>
                                    <tr>
                                        <th>Reagent</th>
                                        <th style="width:160px">RT</th>
                                        <th style="width:160px">37C</th>
                                        <th style="width:160px">IAT</th>
                                        <th style="width:160px">CCC</th>
                                        <th style="width:160px">Result</th>
                                        <th style="width:40px">
                                            <button id="btnAddRhTest" type="button" onclick="addRhTest()" class="btn btn-info btn-sm">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <div class="row" style="margin-top:5px">
                            <div class="col-md-8" align="left">

                            </div>
                            <div class="col-md-4" align="left">
                                <div class="row">
                                    <div class="col-md-5">
                                        Confirm Rh :
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <b>
                                            <select onchange="confirmrhChange()" id="confirmrhid" name="confirmrhid" class="form-control form-control-sm"></select>
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-8">
                        <div class="row vertical-bottom ">
                            <div class="col-md-4">
                                <div class="row">

                                    <div class="padding-top-top15">
                                        &nbsp;&nbsp;&nbsp;Antibody Screening test
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-s-scroll">
                            <table id="list_table_anti_sceen" class="main-table">
                                <thead>
                                    <tr>
                                        <th>Test</th>
                                        <th style="width:100px">P1Mi(a+)</th>
                                        <th style="width:80px">O1</th>
                                        <th style="width:80px">O2</th>
                                        <th style="width:80px">O3</th>
                                        <th style="width:120px">Lotno</th>
                                        <th style="width:40px">
                                            <button id="btnAddAntiSceeningTest" type="button" onclick="addAntiSceeningTest()" class="btn btn-info btn-sm">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>


                        <div class="row" style="margin-top:5px">
                            <div class="col-md-6" align="left">
                            </div>
                            <div class="col-md-6" align="right">
                                <div class="row">
                                    <div class="col-md-5">
                                        Result :
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <b>
                                            <select onchange="confirmabscreenChange()" id="confirmsceen" name="confirmsceen" class="form-control form-control-sm"></select>
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="form-group col-md-4">
                        <div class="row">

                            <div class="col-md-12" align="right">
                                <font color="#fff">
                                    <b>&nbsp;<label id="bloodgroup" for="bloodgroup">A</label>&nbsp;</b>
                                </font>
                            </div>

                        </div>
                        <div class="table-no-scroll" style="margin-top:12px">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="4">DAT</th>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">Poly</th>
                                        <th style="width:25%">IgG</th>
                                        <th style="width:25%">C3d</th>
                                        <th style="width:25%">CCC</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="td-table">
                                            <select id="dat_poly" name="dat_poly" class="form-control form-control-sm"></select>
                                        </td>
                                        <td class="td-table">
                                            <select id="dat_igg" name="dat_igg" class="form-control form-control-sm"></select>
                                        </td>
                                        <td class="td-table">
                                            <select id="dat_c3d" name="dat_c3d" class="form-control form-control-sm"></select>
                                        </td>
                                        <td class="td-table">
                                            <select id="dat_ccc" name="dat_ccc" class="form-control form-control-sm"></select>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="form-group col-md-12">
                        <div class="row vertical-bottom">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="padding-top-top15">
                                        &nbsp;&nbsp;&nbsp;Antibody identification test
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-s-scroll">
                            <table id="list_table_anti_iden" style="margin-bottom:0px">
                                <thead>
                                    <tr>
                                        <th>Test</th>
                                        <th style="width:70px">1</th>
                                        <th style="width:70px">2</th>
                                        <th style="width:70px">3</th>
                                        <th style="width:70px">4</th>
                                        <th style="width:70px">5</th>
                                        <th style="width:70px">6</th>
                                        <th style="width:70px">7</th>
                                        <th style="width:70px">8</th>
                                        <th style="width:70px">9</th>
                                        <th style="width:70px">10</th>
                                        <th style="width:70px">11</th>
                                        <th style="width:70px">Auto</th>
                                        <th style="width:120px">Lotno</th>
                                        <th style="width:40px">
                                            <button id="btnAddAntiIdenTest" type="button" onclick="addAntiIdenTest()" class="btn btn-info btn-sm">
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


                    <div class="col-md-8">
                        <div class="form-group  col-md-12">
                            <label for="inputEmail4">Antibody</label>
                            <div class="col-md-12 div-anti">
                                <label id="antibodyLable"></label>
                            </div>
                            <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="antibody" name="antibody">
                            <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="patientantibody" name="patientantibody">
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="patientantibodyall" name="patientantibodyall">
                        </div>
                        <div class="form-group  col-md-12">
                            <label for="inputEmail4">Phenotype</label>
                            <div class="col-md-12 div-anti">
                                <label id="phenotypeLable"></label>
                            </div>
                            <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="phenotype" name="phenotype">
                            <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="phenotypedisplay" name="phenotypedisplay">
                            <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="patientphenotype" name="patientphenotype">
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="patientphenotypeall" name="patientphenotypeall">
                        </div>
                        <div class="form-group col-md-12">

                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <label class="form-check-label">
                                    <input class="check2" type="checkbox" hidden id="ischeckbloodremark" name="ischeckbloodremark" value="1">&nbsp;หมายเหตุ
                                </label>
                                &emsp;&emsp;

                            </div>
                            <input type="text" autocomplete="off" value="" class="form-control form-control-sm" id="checkbloodremark" name="checkbloodremark">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group col-md-12">
                            <br />
                            <a id="btnAntibodyModal" role="button" onclick="antibodyModal()" href="#" class="btn btn-primary" onclick=""><span class="btn-label"><i class="fa fa-check"></i></span>Antibody
                                and
                                Phenotype</a>
                        </div>
                        <div class="form-group  col-md-12">
                            <label for="inputEmail4">ผู้บันทึกผลตรวจสอบเลือดผู้ป่วย</label>
                            <select id="crossmatchuserid" name="crossmatchuserid" class="form-control form-control-sm"></select>
                            <input hidden type="text" autocomplete="off" class="form-control " value="" id="crossmatchuser" aria-describedby="numberlHelp" onkeyup="" name="crossmatchuser">
                        </div>
                        <div class="row" style="padding-left: 10px">

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">วันที่บันทึก</label>

                                <input readonly type="text" autocomplete="off" class="form-control form-control-sm" id="crossmatchdate" aria-describedby="numberlHelp" value="" name="crossmatchdate">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">เวลา</label>
                                <input readonly type="text" autocomplete="off" class="form-control form-control-sm" id="crossmatchtime" aria-describedby="numberlHelp" value="" name="crossmatchtime">
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>