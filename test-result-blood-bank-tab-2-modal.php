<div class="modal fade blank-modal" id="testrequestbloodlabmodal_2" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ผลการทดสอบ Special Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="row vertical-bottom">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="padding-top-top15">
                                        &nbsp;&nbsp;&nbsp;Cold agglutinin
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-s-scroll" style="height:215px !important">
                            <table id="list_table_coldagglutinin_0" style="margin-bottom:0px">
                                <thead>
                                    <tr>
                                        <th style="width:25px"></th>
                                        <th style="width:120px">Time</th>
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
                                        <select id="labconfirmcoldagglutininid_0" name="labconfirmcoldagglutininid_0" class="form-control" onchange="confirmColdAgglutininResult(this.value)"></select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-12">
                        <div class="row vertical-bottom">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="padding-top-top15">
                                        &nbsp;&nbsp;&nbsp;Antibody identification test (Tube Method)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-s-scroll">
                            <table id="list_table_anti_iden_get_method_0" style="margin-bottom:0px">
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
                                        <th hidden style="width:120px">Antibody</th>
                                        <th style="width:120px">Lotno</th>
                                        <th style="width:40px">
                                            <button type="button" onclick="addAntibodyIdenTestGetMethod0()" class="btn btn-info btn-sm">
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
                                    <div class="col-md-9">
                                        Result : <label id="antibody_text2_1"></label>
                                        <input hidden type="text" id="antibodyidentificationtestTubeMethod0" name="antibodyidentificationtestTubeMethod0" onchange="confirm_antibodyidentificationtestTubeMethod(this.value)">
                                    </div>
                                    <div class="col-md-2">
                                        <a role="button" onclick="antibodyModal2()" style="margin-top:8px" href="#" class="btn btn-primary" onclick=""><span class="btn-label"><i class="fa fa-check"></i></span>Antibody</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="form-group col-md-8">
                        <div class="row vertical-bottom ">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="padding-top-top15">
                                        &nbsp;&nbsp;&nbsp;Antibody Screening test (Tube Method)
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-s-scroll">
                            <table id="list_table_anti_sceen_get_method_0" class="main-table">
                                <thead>
                                    <tr>
                                        <th>Test</th>
                                        <th style="width:100px">P1Mi(a+)</th>
                                        <th style="width:80px">O1</th>
                                        <th style="width:80px">O2</th>
                                        <th style="width:80px">O3</th>
                                        <th style="width:120px">ENZ</th>
                                        <th style="width:120px">Lotno</th>
                                        <th style="width:40px">
                                            <button type="button" onclick="addAntiSceeningTestGetMethod0()" class="btn btn-info btn-sm">
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
                                        <select id="labconfirmantibodysceentestgetmethodid_0" name="labconfirmantibodysceentestgetmethodid_0" class="form-control" onchange="confirmAntibodyScreeningTubeMethodResult(this.value)"></select>
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
                                            <select id="lab_dat_poly_modal_0" name="lab_dat_poly_modal_0" class="form-control" onchange="confirmDATResult(this.value)"></select>
                                        </td>
                                        <td class="td-table">
                                            <select id="lab_dat_igg_modal_0" name="lab_dat_igg_modal_0" class="form-control" onchange="confirmIgGResult(this.value)"></select>
                                        </td>
                                        <td class="td-table">
                                            <select id="lab_dat_c3d_modal_0" name="lab_dat_c3d_modal_0" class="form-control" onchange="confirmC3dResult(this.value)"></select>
                                        </td>
                                        <td class="td-table">
                                            <select id="lab_dat_ccc_modal_0" name="lab_dat_ccc_modal_0" class="form-control"></select>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="row vertical-bottom ">
                            <div class="col-md-4">
                                <div class="row">

                                    <div class="padding-top-top15">
                                        &nbsp;&nbsp;&nbsp;Saliva test
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-s-scroll" style="height:280px">
                            <table id="list_table_saliva_0" class="main-table">
                                <thead>
                                    <tr>
                                        <th>Test</th>
                                        <th style="width:300px">A cells</th>
                                        <th style="width:300px">B cells</th>
                                        <th style="width:300px">O cells</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>


                        <div class="row" style="margin-top:5px">
                            <div class="col-md-6" align="left">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5" align="right">
                                        Result :
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <b>
                                            <select id="labconfirmsalivaid_0" name="labconfirmsalivaid_0" class="form-control" onchange="confirmSalivaTestResult(this.value)"></select>
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4">

                        <div class="form-group row">
                            <div class="form-group col-md-12"><label>Adsorption</label>
                                <input type="text" autocomplete="off" value="" class="form-control" id="adsorption0" name="adsorption0" onkeyup="confirmAdsorptionResult(this.value)">
                            </div>
                            <div class="form-group col-md-12"><label>Elution</label>
                                <input type="text" autocomplete="off" value="" class="form-control" id="elution0" name="elution0" onkeyup="confirmElutionResult(this.value)">
                            </div>

                        </div>

                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button data-dismiss="modal" aria-label="Close" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                        </button>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>