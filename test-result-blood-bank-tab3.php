<fieldset id="dis_tab3" disabled>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
        <div class="card mb-12 tabbody-card">

            <div class="card-body">
                <div class="container-fluid">

                    <div class="form-group row">
                        <div class="form-group col-md-2"><label>วันที่รับสิ่งส่งตรวจ</label>
                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="labgetdatetime1" name="labgetdatetime1">
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
                                <table id="list_table_abo_1" class="main-table">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="width:80px !important">Reagent</th>
                                            <th colspan="3">Cell Grouping</th>
                                            <th colspan="3">Serum Grouping</th>
                                            <th style="width:160px !important" rowspan="2">
                                                Blood<br />Group
                                            </th>
                                            <th style="width:40px" rowspan="2">
                                                <button type="button" onclick="addABOTest1()" class="btn btn-info btn-sm">
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
                                <div class="col-md-6" align="left">
                                </div>

                                <div class="col-md-3" align="right">
                                    Confirm Blood Group :
                                </div>

                                <div class="col-md-3" align="left">
                                    <b>
                                        <select id="labconfirmbloodgroupid_1" name="labconfirmbloodgroupid_1" class="form-control select2"></select>
                                    </b>
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
                                                <select id="labantia1_1" name="labantia1_1" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="labantih_1" name="labantih_1" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="laba2cells_1" name="laba2cells_1" class="form-control"></select>
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
                                <table id="list_table_rh_1">
                                    <thead>
                                        <tr>
                                            <th>Reagent</th>
                                            <th style="width:160px">RT</th>
                                            <th style="width:160px">37C</th>
                                            <th style="width:160px">IAT</th>
                                            <th style="width:160px">CCC</th>
                                            <th style="width:160px">Result</th>
                                            <th style="width:40px">
                                                <button type="button" onclick="addRhTest1()" class="btn btn-info btn-sm">
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
                                <div class="col-md-4" align="right">
                                    <div class="row">
                                        <div class="col-md-5">
                                            Confirm Rh :
                                        </div>
                                        <div class="col-md-7" align="left">
                                            <b>
                                                <select id="labconfirmrhid_1" name="labconfirmrhid_1" class="form-control"></select>
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
                                            &nbsp;&nbsp;&nbsp;Antibody Screening test (Gel test)
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="table-s-scroll">
                                <table id="list_table_anti_sceen_1" class="main-table">
                                    <thead>
                                        <tr>
                                            <th>Test</th>
                                            <th>P1Mi(a+)</th>
                                            <th>O1</th>
                                            <th>O2</th>
                                            <th>O3</th>
                                            <th>Lotno</th>
                                            <th style="width:40px">
                                                <button type="button" onclick="addAntiSceeningTest1()" class="btn btn-info btn-sm">
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
                                        <div class="col-md-7">
                                            <select id="labconfirmantibodysceentestid_1" name="labconfirmantibodysceentestid_1" class="form-control"></select>
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
                                                <select id="lab_dat_poly_1" name="lab_dat_poly_1" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="lab_dat_igg_1" name="lab_dat_igg_1" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="lab_dat_c3d_1" name="lab_dat_c3d_1" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="lab_dat_ccc_1" name="lab_dat_ccc_1" class="form-control"></select>
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
                                <table id="list_table_anti_iden_1" style="margin-bottom:0px">
                                    <thead>
                                        <tr>
                                            <th>Test</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>6</th>
                                            <th>7</th>
                                            <th>8</th>
                                            <th>9</th>
                                            <th>10</th>
                                            <th>11</th>
                                            <th>Auto</th>
                                            <th style="width:120px">Lotno</th>
                                            <th style="width:40px">
                                                <button type="button" onclick="addAntibodyIdenTest1()" class="btn btn-info btn-sm">
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

                        <div hidden class="form-group col-md-6">
                            <div class="row vertical-bottom">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="padding-top-top15">
                                            &nbsp;&nbsp;&nbsp;Rh typing
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div hidden class="table-no-scroll">
                                <table id="list_table_anti_iden" style="margin-bottom:0px">
                                    <thead>
                                        <tr>
                                            <th style="width:60px">D</th>
                                            <th style="width:60px">C</th>
                                            <th style="width:60px">E</th>
                                            <th style="width:60px">c</th>
                                            <th style="width:60px">e</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>
                                                <label class="form-check-label"><input type="radio" id="lab_rhtype_d_1+" name="lab_rhtype_d_1" value="+">+</label>
                                                <label class="form-check-label"><input type="radio" id="lab_rhtype_d_1-" name="lab_rhtype_d_1" value="-">-</label>
                                            </th>
                                            <th>
                                                <label class="form-check-label"><input type="radio" id="lab_rhtype_c_1+" name="lab_rhtype_c_1" value="+">+</label>
                                                <label class="form-check-label"><input type="radio" id="lab_rhtype_c_1-" name="lab_rhtype_c_1" value="-">-</label>
                                            </th>
                                            <th>
                                                <label class="form-check-label"><input type="radio" id="lab_rhtype_e_1+" name="lab_rhtype_e_1" value="+">+</label>
                                                <label class="form-check-label"><input type="radio" id="lab_rhtype_e_1-" name="lab_rhtype_e_1" value="-">-</label>
                                            </th>
                                            <th><label class="form-check-label"><input type="radio" id="lab_rhtype_c2_1+" name="lab_rhtype_c2_1" value="+">+</label>
                                                <label class="form-check-label"><input type="radio" id="lab_rhtype_c2_1-" name="lab_rhtype_c2_1" value="-">-</label>
                                            </th>
                                            <th><label class="form-check-label"><input type="radio" id="lab_rhtype_e2_1+" name="lab_rhtype_e2_1" value="+">+</label>
                                                <label class="form-check-label"><input type="radio" id="lab_rhtype_e2_1-" name="lab_rhtype_e2_1" value="-">-</label>
                                            </th>
                                            <th>
                                                <select id="lab_rhtype_result_id_1" name="lab_rhtype_result_id_1" class="form-control"></select>
                                            </th>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div hidden class="form-group col-md-12">
                            <div class="row vertical-bottom">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="padding-top-top15">
                                            &nbsp;&nbsp;&nbsp;Titration
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div hidden class="table-s-scroll">
                                <table id="list_table_titration_1" style="margin-bottom:0px">
                                    <thead>
                                        <tr>
                                            <th>Anti-serum</th>
                                            <th>Testcell</th>
                                            <th>1:1</th>
                                            <th>1:2</th>
                                            <th>1:4</th>
                                            <th>1:8</th>
                                            <th>1:16</th>
                                            <th>1:32</th>
                                            <th>1:64</th>
                                            <th>1:128</th>
                                            <th>1:256</th>
                                            <th>1:512</th>
                                            <th>1:1024</th>
                                            <th>1:2048</th>
                                            <th style="width:100px">Titer</th>
                                            <th style="width:40px">
                                                <button type="button" onclick="addTitration1()" class="btn btn-info btn-sm">
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
                                        <div class="col-md-7">
                                            <select id="labconfirmtitrationid_1" name="labconfirmtitrationid_1" class="form-control"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-8">
                            <div class="form-group  col-md-12">
                                <label for="inputEmail4">Antibody</label>
                                <div class="col-md-12 div-anti">
                                    <label id="antibodyLable1"></label>
                                </div>
                                <input hidden type="text" autocomplete="off" value="" class="form-control" id="antibody1" name="antibody1">
                            </div>
                            <div class="form-group  col-md-12">
                                <label for="inputEmail4">Phenotype</label>
                                <div class="col-md-12 div-anti">
                                    <label id="phenotypeLable1"></label>
                                </div>
                                <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="phenotype1" name="phenotype1">
                                <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="phenotypedisplay1" name="phenotypedisplay1">
                                <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="patientphenotype1" name="patientphenotype1">
                            </div>
                            <div class="form-group col-md-12">

                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <label class="form-check-label">
                                        หมายเหตุ
                                    </label>
                                    &emsp;&emsp;

                                </div>
                                <input type="text" autocomplete="off" value="" class="form-control" id="labremark1" name="labremark1">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <br />
                                <a role="button" onclick="antibodyModal('1')" style="margin-top:8px" href="#" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>Antibody
                                    and
                                    Phenotype</a>
                            </div>
                            <div class="form-group col-md-12">
                                <br /><br /><br /><br />
                                <a hidden role="button" onclick="openSpecialTest('3')" style="margin-top:8px" href="#" class="btn btn-primary" onclick=""><span class="btn-label"><i class="fa fa-check"></i></span>Special Test</a>
                            </div>
                            <div class="form-group  col-md-12">

                            </div>

                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>