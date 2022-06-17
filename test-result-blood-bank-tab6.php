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

                        <div class="form-group col-md-8">

                            <div class="table-no-scroll" style="height:220px !important">
                                <table id="list_table_abo_child" class="main-table">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="width:80px !important">Reagent</th>
                                            <th colspan="3">Cell Grouping</th>
                                            <th colspan="3">Serum Grouping</th>
                                            <th style="width:160px !important" rowspan="2">
                                                Blood<br />Group
                                            </th>
                                            <th style="width:40px" rowspan="2">
                                                <button type="button" onclick="addABOTest_child()" class="btn btn-info btn-sm">
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
                                        <select id="confirmbloodgroup_child" onchange="" name="confirmbloodgroup_child" class="form-control select2"></select>
                                    </b>
                                </div>

                            </div>


                        </div>
                        <div class="form-group col-md-4">


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
                                                <select id="antia1_child" name="antia1_child" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="antih_child" name="antih_child" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="a2cells_child" name="a2cells_child" class="form-control"></select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <!-- ///////////////////////////////////////////////////// -->
                    </div>

                    <div class="form-group row" style="margin-top:-20px">
                        <div class="form-group col-md-12">
                            ตารางหมู่โลหิต Rh
                        </div>
                        <div class="form-group col-md-8">
                            <div class="table-no-scroll">
                                <table id="list_table_rh_child">
                                    <thead>
                                        <tr>
                                            <th>Reagent</th>
                                            <th style="width:160px">RT</th>
                                            <th style="width:160px">37C</th>
                                            <th style="width:160px">IAT</th>
                                            <th style="width:160px">CCC</th>
                                            <th style="width:160px">Result</th>
                                            <th style="width:40px">
                                                <button type="button" onclick="addRhTest_child()" class="btn btn-info btn-sm">
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
                                            Confirm Rh :
                                        </div>
                                        <div class="col-md-7" align="left">
                                            <b>
                                                <select onchange="" id="confirmrh_child" name="confirmrh_child" class="form-control"></select>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="form-group col-md-4">
                            <div class="table-no-scroll">
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
                                                <select id="dat_poly_child" name="dat_poly_child" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_igg_child" name="dat_igg_child" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_c3d_child" name="dat_c3d_child" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_ccc_child" name="dat_ccc_child" class="form-control"></select>
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

                        <div class="form-group col-md-8">

                            <div class="table-no-scroll" style="height:220px !important">
                                <table id="list_table_abo_father" class="main-table">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="width:80px !important">Reagent</th>
                                            <th colspan="3">Cell Grouping</th>
                                            <th colspan="3">Serum Grouping</th>
                                            <th style="width:160px !important" rowspan="2">
                                                Blood<br />Group
                                            </th>
                                            <th style="width:40px" rowspan="2">
                                                <button type="button" onclick="addABOTest_father()" class="btn btn-info btn-sm">
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
                                        <select id="confirmbloodgroup_father" onchange="" name="confirmbloodgroup_father" class="form-control select2"></select>
                                    </b>
                                </div>

                            </div>


                        </div>
                        <div class="form-group col-md-4">


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
                                                <select id="antia1_father" name="antia1_father" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="antih_father" name="antih_father" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="a2cells_father" name="a2cells_father" class="form-control"></select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>

                        <!-- /////////////////////////////////////////////////////////////////////////////// -->
                    </div>
                    <div class="form-group row" style="margin-top:-20px">
                        <div class="form-group col-md-8">
                            ตารางหมู่โลหิต Rh
                        </div>
                        <div class="form-group col-md-8">
                            <div class="table-no-scroll">
                                <table id="list_table_rh_father">
                                    <thead>
                                        <tr>
                                            <th>Reagent</th>
                                            <th style="width:160px">RT</th>
                                            <th style="width:160px">37C</th>
                                            <th style="width:160px">IAT</th>
                                            <th style="width:160px">CCC</th>
                                            <th style="width:160px">Result</th>
                                            <th style="width:40px">
                                                <button type="button" onclick="addRhTest_father()" class="btn btn-info btn-sm">
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
                                            Confirm Rh :
                                        </div>
                                        <div class="col-md-7" align="left">
                                            <b>
                                                <select onchange="" id="confirmrh_father" name="confirmrh_father" class="form-control"></select>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="table-no-scroll">
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
                                                <select id="dat_poly_father" name="dat_poly_father" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_igg_father" name="dat_igg_father" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_c3d_father" name="dat_c3d_father" class="form-control"></select>
                                            </td>
                                            <td class="td-table">
                                                <select id="dat_ccc_father" name="dat_ccc_father" class="form-control"></select>
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