<div class="modal fade blood-invest-modal" id="bloodinvestModal" tabindex="-1" role="dialog" aria-labelledby="bloodModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ข้อมูล Antibody and Phenotype</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-check-square-o"></i> Antibody&nbsp;&nbsp;
                                <label id="antiLabel_0" class="label-model"></label>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="antiTable1_0" style="margin-bottom:0px" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">ABO</th>
                                        <th colspan="5">Rh</th>
                                        <th colspan="5">MNSs</th>
                                        <th colspan="2">P</th>
                                        <th>Xg<sup>a</sup></th>
                                        <th colspan="2">Lutheran</th>
                                        <th colspan="2">I</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-A1" id="Anti-A1_labconfirmantibodyidentificationtest_0" name="Anti-A1">&nbsp;&nbsp;A1
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-H" id="Anti-H_labconfirmantibodyidentificationtest_0" name="Anti-H">&nbsp;&nbsp;H
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-D" id="Anti-D_labconfirmantibodyidentificationtest_0" name="Anti-D">&nbsp;&nbsp;D
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-C" id="Anti-C_labconfirmantibodyidentificationtest_0" name="Anti-C">&nbsp;&nbsp;C
                                            </label>

                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-c" id="Anti-c_labconfirmantibodyidentificationtest_0" name="Anti-c">&nbsp;&nbsp;c
                                            </label>

                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-E" id="Anti-E_labconfirmantibodyidentificationtest_0" name="Anti-E">&nbsp;&nbsp;E
                                            </label>

                                        </td>
                                        <td><label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-e" id="Anti-e_labconfirmantibodyidentificationtest_0" name="Anti-e">&nbsp;&nbsp;e
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-M" id="Anti-M_labconfirmantibodyidentificationtest_0" name="Anti-M">&nbsp;&nbsp;M
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-N" id="Anti-N_labconfirmantibodyidentificationtest_0" name="Anti-N">&nbsp;&nbsp;N
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-S" id="Anti-S_labconfirmantibodyidentificationtest_0" name="Anti-S">&nbsp;&nbsp;S
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-s" id="Anti-s_labconfirmantibodyidentificationtest_0" name="Anti-s">&nbsp;&nbsp;s
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Mi<sup>a</sup>" id="Anti-Mi<sup>a</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Mi<sup>a</sup>">&nbsp;&nbsp;Mi<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-P1" id="Anti-P1_labconfirmantibodyidentificationtest_0" name="Anti-P1">&nbsp;&nbsp;P1
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Tj<sup>a</sup>" id="Anti-Tj<sup>a</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Tj<sup>a</sup>">&nbsp;&nbsp;Tj<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Xg<sup>a</sup>" id="Anti-Xg<sup>a</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Xg<sup>a</sup>">&nbsp;&nbsp;Xg<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Lu<sup>a</sup>" id="Anti-Lu<sup>a</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Lu<sup>a</sup>">&nbsp;&nbsp;Lu<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Lu<sup>b</sup>" id="Anti-Lu<sup>b</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Lu<sup>b</sup>">&nbsp;&nbsp;Lu<sup>b</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-I" id="Anti-I_labconfirmantibodyidentificationtest_0" name="Anti-I">&nbsp;&nbsp;I
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-IH" id="Anti-IH_labconfirmantibodyidentificationtest_0" name="Anti-IH">&nbsp;&nbsp;IH
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="antiTable2_0" style="margin-bottom:0px" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Kell</th>
                                        <th colspan="2">Diego</th>
                                        <th colspan="2">Lewis</th>
                                        <th colspan="2">Coton</th>
                                        <th colspan="3">Kidd</th>
                                        <th colspan="3">Duffy</th>
                                        <th colspan="3">Autoantibody</th>
                                        <th colspan="4">Other</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-K" id="Anti-K_labconfirmantibodyidentificationtest_0" name="Anti-K">&nbsp;&nbsp;K
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-k" id="Anti-k_labconfirmantibodyidentificationtest_0" name="Anti-k">&nbsp;&nbsp;k
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Di<sup>a</sup>" id="Anti-Di<sup>a</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Di<sup>a</sup>">&nbsp;&nbsp;Di<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Di<sup>b</sup>" id="Anti-Di<sup>b</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Di<sup>b</sup>">&nbsp;&nbsp;Di<sup>b</sup>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Le<sup>a</sup>" id="Anti-Le<sup>a</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Le<sup>a</sup>">&nbsp;&nbsp;Le<sup>a</sup>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Le<sup>b</sup>" id="Anti-Le<sup>b</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Le<sup>b</sup>">&nbsp;&nbsp;Le<sup>b</sup>
                                            </label>

                                        </td>
                                        <td><label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Co<sup>a</sup>" id="Anti-Co<sup>a</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Co<sup>a</sup>">&nbsp;&nbsp;Co<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Co<sup>b</sup>" id="Anti-Co<sup>b</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Co<sup>b</sup>">&nbsp;&nbsp;Co<sup>b</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Jk<sup>a</sup>" id="Anti-Jk<sup>a</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Jk<sup>a</sup>">&nbsp;&nbsp;Jk<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Jk<sup>b</sup>" id="Anti-Jk<sup>b</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Jk<sup>b</sup>">&nbsp;&nbsp;Jk<sup>b</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Jk<sup>3</sup>" id="Anti-Jk<sup>3</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Jk<sup>3</sup>">&nbsp;&nbsp;Jk<sup>3</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Fy<sup>a</sup>" id="Anti-Fy<sup>a</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Fy<sup>a</sup>">&nbsp;&nbsp;Fy<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Fy<sup>b</sup>" id="Anti-Fy<sup>b</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Fy<sup>b</sup>">&nbsp;&nbsp;Fy<sup>b</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Fy<sup>3</sup>" id="Anti-Fy<sup>3</sup>_labconfirmantibodyidentificationtest_0" name="Anti-Fy<sup>3</sup>">&nbsp;&nbsp;Fy<sup>3</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-CT" id="Anti-CT_labconfirmantibodyidentificationtest_0" name="Anti-CT">&nbsp;&nbsp;CT
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-WT" id="Anti-WT_labconfirmantibodyidentificationtest_0" name="Anti-WT">&nbsp;&nbsp;WT
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Anti-Hemolysis" id="Anti-Hemolysis_labconfirmantibodyidentificationtest_0" name="Anti-Hemolysis">&nbsp;&nbsp;Hemolysis
                                            </label>
                                        </td>

                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Autoimmune" id="Autoimmune_labconfirmantibodyidentificationtest_0" name="Anti-Autoimmune">&nbsp;&nbsp;Autoimmune
                                            </label>
                                        </td>

                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Unidentified" id="Unidentified_labconfirmantibodyidentificationtest_0" name="Anti-Unidentified">&nbsp;&nbsp;Unidentified
                                            </label>
                                        </td>

                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="ROU" id="ROU_labconfirmantibodyidentificationtest_0" name="Anti-ROU">&nbsp;&nbsp;ROU
                                            </label>
                                        </td>

                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti1()" value="Negative" id="Negative_labconfirmantibodyidentificationtest_0" name="Anti-Negative">&nbsp;&nbsp;Negative
                                            </label>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div><!-- end card-->
                </div>
            </div>


            <div class="modal-footer">
                <div class="form-group col-md-6">
                    <button class="btn btn-secondary" onclick="removeAntiBody1()" type="button">
                        <span class="btn-label"><i class="fa fa-minus-circle"></i></span>Clear Antibody
                    </button>
                </div>
                <div align="right" class="form-group col-md-6">
                    <button class="btn btn-success" onclick="confirmAntiPheno1()" type="button">
                        <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    function antibodyModal1() {

        $("#bloodinvestModal").modal('show');
    }

    function confirmAntiPheno1() {

        $("#bloodinvestModal").modal("hide");
    }

    function removeAntiBody1() {
        removeCheckBox1(document.getElementById("antiTable1_0"));
        removeCheckBox1(document.getElementById("antiTable2_0"));
        antiBody1();
    }

    function removeCheckBox1(table) {
        var anti = '';

        var r = 1;
        while (row = table.rows[r++]) {
            var c = 0;
            while (cell = row.cells[c++]) {
                if (cell.getElementsByTagName('input')[0] != undefined)
                    cell.getElementsByTagName('input')[0].checked = false;
            }
        }
        return anti;

    }

    function antiBody1() {
        var anti = '';
        anti += findAntibody1(document.getElementById("antiTable1_0"));
        anti += findAntibody1(document.getElementById("antiTable2_0"));
        document.getElementById('antiLabel_0').innerHTML = lastString(anti);
        document.getElementById('labconfirmantibodyidentificationtest_0').value = lastString(anti);
        document.getElementById('antibody_text2').innerHTML = lastString(anti);

        getTYPE_OF_REQUEST("list_table_test_item", 8920, lastString(anti), lastString(anti));
        getTYPE_OF_REQUEST("list_table_test_item", 8918, lastString(anti), lastString(anti));
    }

    function findAntibody1(table) {
        var anti = '';

        var r = 1;
        while (row = table.rows[r++]) {
            var c = 0;
            while (cell = row.cells[c++]) {
                if (cell.getElementsByTagName('input')[0] != undefined)
                    if (cell.getElementsByTagName('input')[0].checked)
                        anti += cell.getElementsByTagName('input')[0].value + ',';
            }
        }
        return anti;

    }

    function checkAnti1() {
        antiBody1();
    }
</script>