<div class="modal fade blank-modal" id="testrequestbloodlabmodal_5" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Follow 3 Special Test</h5>
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
                            <table id="list_table_coldagglutinin_3" style="margin-bottom:0px">
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
                                        <select id="labconfirmcoldagglutininid_3" name="labconfirmcoldagglutininid_3" class="form-control"></select>
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
                            <table id="list_table_anti_iden_get_method_3" style="margin-bottom:0px">
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
                                        <th style="width:120px">Antibody</th>
                                        <th style="width:120px">Lotno</th>
                                        <th style="width:40px">
                                            <button type="button" onclick="addAntibodyIdenTestGetMethod3()" class="btn btn-info btn-sm">
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

                    <div class="form-group col-md-6">
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
                            <table id="list_table_saliva_3" class="main-table">
                                <thead>
                                    <tr>
                                        <th>Test</th>
                                        <th style="width:100px">A cells</th>
                                        <th style="width:100px">B cells</th>
                                        <th style="width:100px">O cells</th>
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
                                        <select id="labconfirmsalivaid_3" name="labconfirmsalivaid_3" class="form-control"></select>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="form-group col-md-6">
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
                            <table id="list_table_anti_sceen_get_method_3" class="main-table">
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
                                            <button type="button" onclick="addAntiSceeningTestGetMethod3()" class="btn btn-info btn-sm">
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
                                        <select id="labconfirmantibodysceentestgetmethodid_3" name="labconfirmantibodysceentestgetmethodid_3" class="form-control"></select>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="form-group col-md-4">

                        <div class="form-group row">
                            <div class="form-group col-md-12"><label>Adsorption</label>
                                <input type="text" autocomplete="off" value="" class="form-control" id="adsorption3" name="adsorption3">
                            </div>
                            <div class="form-group col-md-12"><label>Elution</label>
                                <input type="text" autocomplete="off" value="" class="form-control" id="elution3" name="elution3">
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