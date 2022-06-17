<fieldset id="dis_tab6" disabled>
    <input type="text" value="" id="requestbloodid" name="requestbloodid" hidden>
    <input type="text" value="" id="requestbloodcode" name="requestbloodcode" hidden>
    <input type="text" value="" id="hn" name="hn" hidden>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
        <div class="card mb-12 tabbody-card">

            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> ผลตรวจสอบของลูก</h3>
            </div>

            <div class="card-body">
                <div class="container-fluid">


                    <div class="form-group row">
                        <div class="col-md-6">
                            ตารางหมู่โลหิต ABO
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top:-20px">

                        <div class="form-group col-md-12">

                            <div class="table-no-scroll">
                                <table class="main-table">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Cell Grouping</th>
                                            <th colspan="3">Serum Grouping</th>
                                            <th style="width:160px !important" rowspan="2">
                                                Blood<br />Group</th>
                                            <th style="width:80px !important" rowspan="2">Anti-A1
                                            </th>
                                            <th style="width:80px !important" rowspan="2">Anti-H
                                            </th>
                                            <th style="width:80px !important" rowspan="2">A2cells
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
                                            <td class="td-table">
                                                <select onchange="autoBlood()" id="anti-a" name="antia" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select onchange="autoBlood()" id="anti-b" name="antib" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="anti-ab" name="antiab" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select onchange="autoBlood()" id="acells" name="acells" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select onchange="autoBlood()" id="bcells" name="bcells" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="ocells" name="ocells" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="bloodgroup" name="bloodgroup" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="anti-a1" name="antia1" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="anti-h" name="antih" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="a2cells" name="a2cells" class="form-control"></select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                            <div class="row" style="margin-top:5px">
                                <div class="col-md-4" align="left">
                                </div>
                                <div class="col-md-4" align="right">
                                    <div class="row">
                                        <div class="col-md-8">
                                            Confirm Blood Group :
                                        </div>
                                        <div class="col-md-4">
                                            <select id="confirmbloodgroup" onchange="confirmbloodgroupChange()" name="confirmbloodgroup" class="form-control select2"></select>
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
                                            &nbsp;&nbsp;&nbsp;Rh(D) typing <br>
                                        </div>
                                    </div>
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
                                                <button type="button" onclick="addRhTest()" class="btn btn-info btn-sm">
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
                                            <select onchange="confirmabscreenChange()" id="confirmsceen" name="confirmsceen" class="form-control"></select>
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
                                                <select id="dat_poly" name="dat_poly" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_igg" name="dat_igg" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_c3d" name="dat_c3d" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_ccc" name="dat_ccc" class="form-control"></select>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
        <div class="card mb-12 tabbody-card">

            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> ผลตรวจสอบของสามี</h3>
            </div>

            <div class="card-body">
                <div class="container-fluid">


                    <div class="form-group row">
                        <div class="col-md-6">
                            ตารางหมู่โลหิต ABO
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top:-20px">

                        <div class="form-group col-md-12">

                            <div class="table-no-scroll">
                                <table class="main-table">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Cell Grouping</th>
                                            <th colspan="3">Serum Grouping</th>
                                            <th style="width:160px !important" rowspan="2">
                                                Blood<br />Group</th>
                                            <th style="width:80px !important" rowspan="2">Anti-A1
                                            </th>
                                            <th style="width:80px !important" rowspan="2">Anti-H
                                            </th>
                                            <th style="width:80px !important" rowspan="2">A2cells
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
                                            <td class="td-table">
                                                <select onchange="autoBlood()" id="anti-a" name="antia" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select onchange="autoBlood()" id="anti-b" name="antib" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="anti-ab" name="antiab" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select onchange="autoBlood()" id="acells" name="acells" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select onchange="autoBlood()" id="bcells" name="bcells" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="ocells" name="ocells" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="bloodgroup" name="bloodgroup" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="anti-a1" name="antia1" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="anti-h" name="antih" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="a2cells" name="a2cells" class="form-control"></select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                            <div class="row" style="margin-top:5px">
                                <div class="col-md-4" align="left">
                                </div>
                                <div class="col-md-4" align="right">
                                    <div class="row">
                                        <div class="col-md-8">
                                            Confirm Blood Group :
                                        </div>
                                        <div class="col-md-4">
                                            <select id="confirmbloodgroup" onchange="confirmbloodgroupChange()" name="confirmbloodgroup" class="form-control select2"></select>
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
                                            &nbsp;&nbsp;&nbsp;Rh(D) typing
                                        </div>
                                    </div>
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
                                                <button type="button" onclick="addRhTest()" class="btn btn-info btn-sm">
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
                                            <select onchange="confirmabscreenChange()" id="confirmsceen" name="confirmsceen" class="form-control"></select>
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
                                                <select id="dat_poly" name="dat_poly" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_igg" name="dat_igg" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_c3d" name="dat_c3d" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_ccc" name="dat_ccc" class="form-control"></select>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group  col-md-12">
                            <label for="inputEmail4">Other</label>
                            <div class="col-md-12 div-anti">
                                <label id="antibodyLable"></label>
                            </div>
                            <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="antibody" name="antibody">
                            <input hidden readonly type="text" autocomplete="off" value="" class="form-control" id="patientantibody" name="patientantibody">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>