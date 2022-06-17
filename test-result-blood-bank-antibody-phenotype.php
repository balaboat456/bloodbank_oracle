<input type="hidden" id="bloodinvestmodaltype" name="bloodinvestmodaltype">
<input type="hidden" id="pheno" name="pheno">

<div class="modal fade blood-invest-modal" id="modalAntibodyPhenotype" tabindex="-1" role="dialog" aria-labelledby="bloodModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ข้อมูล Antibody and Phenotype</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow: auto;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-check-square-o"></i> Antibody&nbsp;&nbsp;
                                <label id="antiLabel" class="label-model"></label>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="antiTable1" style="margin-bottom:0px" class="table table-bordered">
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
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-A1" id="Anti-A1_antibody0" name="Anti-A1">&nbsp;&nbsp;A1
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-H" id="Anti-H_antibody0" name="Anti-H">&nbsp;&nbsp;H
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-D" id="Anti-D_antibody0" name="Anti-D">&nbsp;&nbsp;D
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-C" id="Anti-C_antibody0" name="Anti-C">&nbsp;&nbsp;C
                                            </label>

                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-c" id="Anti-c_antibody0" name="Anti-c">&nbsp;&nbsp;c
                                            </label>

                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-E" id="Anti-E_antibody0" name="Anti-E">&nbsp;&nbsp;E
                                            </label>

                                        </td>
                                        <td><label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-e" id="Anti-e_antibody0" name="Anti-e">&nbsp;&nbsp;e
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-M" id="Anti-M_antibody0" name="Anti-M">&nbsp;&nbsp;M
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-N" id="Anti-N_antibody0" name="Anti-N">&nbsp;&nbsp;N
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-S" id="Anti-S_antibody0" name="Anti-S">&nbsp;&nbsp;S
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-s" id="Anti-s_antibody0" name="Anti-s">&nbsp;&nbsp;s
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Mi<sup>a</sup>" id="Anti-Mi<sup>a</sup>_antibody0" name="Anti-Mi<sup>a</sup>">&nbsp;&nbsp;Mi<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-P1" id="Anti-P1_antibody0" name="Anti-P1">&nbsp;&nbsp;P1
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Tj<sup>a</sup>" id="Anti-Tj<sup>a</sup>_antibody0" name="Anti-Tj<sup>a</sup>">&nbsp;&nbsp;Tj<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Xg<sup>a</sup>" id="Anti-Xg<sup>a</sup>_antibody0" name="Anti-Xg<sup>a</sup>">&nbsp;&nbsp;Xg<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Lu<sup>a</sup>" id="Anti-Lu<sup>a</sup>_antibody0" name="Anti-Lu<sup>a</sup>">&nbsp;&nbsp;Lu<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Lu<sup>b</sup>" id="Anti-Lu<sup>b</sup>_antibody0" name="Anti-Lu<sup>b</sup>">&nbsp;&nbsp;Lu<sup>b</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-I" id="Anti-I_antibody0" name="Anti-I">&nbsp;&nbsp;I
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-IH" id="Anti-IH_antibody0" name="Anti-IH">&nbsp;&nbsp;IH
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="antiTable2" style="margin-bottom:0px" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Kell</th>
                                        <th colspan="2">Diego</th>
                                        <th colspan="2">Lewis</th>
                                        <th colspan="2">Coton</th>
                                        <th colspan="3">Kidd</th>
                                        <th colspan="3">Duffy</th>
                                        <th colspan="3">Autoantibody</th>
                                        <th colspan="5">Other</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-K" id="Anti-K_antibody0" name="Anti-K">&nbsp;&nbsp;K
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-k" id="Anti-k_antibody0" name="Anti-k">&nbsp;&nbsp;k
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Di<sup>a</sup>" id="Anti-Di<sup>a</sup>_antibody0" name="Anti-Di<sup>a</sup>">&nbsp;&nbsp;Di<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Di<sup>b</sup>" id="Anti-Di<sup>b</sup>_antibody0" name="Anti-Di<sup>b</sup>">&nbsp;&nbsp;Di<sup>b</sup>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Le<sup>a</sup>" id="Anti-Le<sup>a</sup>_antibody0" name="Anti-Le<sup>a</sup>">&nbsp;&nbsp;Le<sup>a</sup>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Le<sup>b</sup>" id="Anti-Le<sup>b</sup>_antibody0" name="Anti-Le<sup>b</sup>">&nbsp;&nbsp;Le<sup>b</sup>
                                            </label>

                                        </td>
                                        <td><label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Co<sup>a</sup>" id="Anti-Co<sup>a</sup>_antibody0" name="Anti-Co<sup>a</sup>">&nbsp;&nbsp;Co<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Co<sup>b</sup>" id="Anti-Co<sup>b</sup>_antibody0" name="Anti-Co<sup>b</sup>">&nbsp;&nbsp;Co<sup>b</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Jk<sup>a</sup>" id="Anti-Jk<sup>a</sup>_antibody0" name="Anti-Jk<sup>a</sup>">&nbsp;&nbsp;Jk<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Jk<sup>b</sup>" id="Anti-Jk<sup>b</sup>_antibody0" name="Anti-Jk<sup>b</sup>">&nbsp;&nbsp;Jk<sup>b</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Jk<sup>3</sup>" id="Anti-Jk<sup>3</sup>_antibody0" name="Anti-Jk<sup>3</sup>">&nbsp;&nbsp;Jk<sup>3</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Fy<sup>a</sup>" id="Anti-Fy<sup>a</sup>_antibody0" name="Anti-Fy<sup>a</sup>">&nbsp;&nbsp;Fy<sup>a</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Fy<sup>b</sup>" id="Anti-Fy<sup>b</sup>_antibody0" name="Anti-Fy<sup>b</sup>">&nbsp;&nbsp;Fy<sup>b</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Fy<sup>3</sup>" id="Anti-Fy<sup>3</sup>_antibody0" name="Anti-Fy<sup>3</sup>">&nbsp;&nbsp;Fy<sup>3</sup>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-CT" id="Anti-CT_antibody0" name="Anti-CT">&nbsp;&nbsp;CT
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-WT" id="Anti-WT_antibody0" name="Anti-WT">&nbsp;&nbsp;WT
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Anti-Hemolysis" id="Anti-Hemolysis_antibody0" name="Anti-Hemolysis">&nbsp;&nbsp;Hemolysis
                                            </label>
                                        </td>

                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Autoimmune" id="Anti-Autoimmune_antibody0" name="Anti-Autoimmune">&nbsp;&nbsp;Autoimmune
                                            </label>
                                        </td>

                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Unidentified" id="Anti-Unidentified_antibody0" name="Anti-Unidentified">&nbsp;&nbsp;Unidentified
                                            </label>
                                        </td>

                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="ROU" id="Anti-ROU_antibody0" name="Anti-ROU">&nbsp;&nbsp;ROU
                                            </label>
                                        </td>

                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Negative" id="Anti-Negative_antibody0" name="Anti-Negative">&nbsp;&nbsp;Negative
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                <input type="checkbox" onclick="checkAnti()" value="Cold" id="Anti-Cold_antibody0" name="Anti-Cold">&nbsp;&nbsp;Cold
                                            </label>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div><!-- end card-->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-check-square-o"></i> Phenotype&nbsp;&nbsp;
                                <label id="phenoLabel" class="label-model"></label>
                                <input id="phenoText" type="hidden">
                            </h3>
                        </div>

                        <div class="card-body">

                            <table id="phenoTable1" style="margin-bottom:0px" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="td-table-17">D</th>
                                        <th class="td-table-17">C</th>
                                        <th class="td-table-17">E</th>
                                        <th class="td-table-17">c</th>
                                        <th class="td-table-17">e</th>
                                        <th class="td-table-17">M</th>
                                        <th class="td-table-17">N</th>

                                        <th class="td-table-17">S</th>
                                        <th class="td-table-17">s</th>
                                        <th class="td-table-17">P1</th>
                                        <th class="td-table-17">Mi<sup>a</sup></th>
                                        <th class="td-table-17">K</th>
                                        <th class="td-table-17">k</th>
                                        <th class="td-table-17">Jk<sup>a</sup></th>

                                        <th class="td-table-17">Jk<sup>b</sup></th>
                                        <th class="td-table-17">Fy<sup>a</sup></th>
                                        <th class="td-table-17">Fy<sup>b<sup></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="td-table">
                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="D(+)" id="(D+)_phenotype0" name="D">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="C(+)" id="(C+)_phenotype0" name="C">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="E(+)" id="E(+)_phenotype0" name="E">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="c(+)" id="c(+)_phenotype0" name="c">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="e(+)" id="e(+)_phenotype0" name="e">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="M(+)" id="M(+)_phenotype0" name="M">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="N(+)" id="N(+)_phenotype0" name="N">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="S(+)" id="S(+)_phenotype0" name="S">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="s(+)" id="s(+)_phenotype0" name="s">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="P1(+)" id="P1(+)_phenotype0" name="P1">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Mi(a+)" id="Mi(a+)_phenotype0" name="Mia">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="K(+)" id="K(+)_phenotype0" name="K">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="k(+)" id="k(+)_phenotype0" name="k">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Jk(a+)" id="Jk(a+)_phenotype0" name="Jka">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Jk(b+)" id="Jk(b+)_phenotype0" name="Jkb">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Fy(a+)" id="Fy(a+)_phenotype0" name="Fya">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Fy(b+)" id="Fy(b+)_phenotype0" name="Fyb">&nbsp;+
                                            </label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="td-table">
                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="D(-)" id="D(-)_phenotype0" name="D">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="C(-)" id="C(-)_phenotype0" name="C">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="E(-)" id="E(-)_phenotype0" name="E">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="c(-)" id="c(-)_phenotype0" name="c">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="e(-)" id="e(-)_phenotype0" name="e">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="M(-)" id="M(-)_phenotype0" name="M">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="N(-)" id="N(-)_phenotype0" name="N">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="S(-)" id="S(-)_phenotype0" name="S">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="s(-)" id="s(-)_phenotype0" name="s">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="P1(-)" id="P1(-)_phenotype0" name="P1">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Mi(a-)" id="Mi(a-)_phenotype0" name="Mia">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="K(-)" id="K(-)_phenotype0" name="K">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="k(-)" id="k(-)_phenotype0" name="k">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Jk(a-)" id="Jk(a-)_phenotype0" name="Jka">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Jk(b-)" id="Jk(b-)_phenotype0" name="Jkb">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Fy(a-)" id="Fy(a-)_phenotype0" name="Fya">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Fy(b-)" id="Fy(b-)_phenotype0" name="Fyb">&nbsp;-
                                            </label>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                            <table id="phenoTable2" style="margin-bottom:0px" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="td-table-17">Le<sup>a</sup></th>
                                        <th class="td-table-17">Le<sup>b</sup></th>
                                        <th class="td-table-17">Di<sup>a</sup></th>
                                        <th class="td-table-17">Di<sup>b</sup></th>
                                        <th class="td-table-17">Kp<sup>a</sup></th>
                                        <th class="td-table-17">Kp<sup>b</sup></th>
                                        <th class="td-table-17">Js<sup>a</sup></th>

                                        <th class="td-table-17">Js<sup>b</sup></th>
                                        <th class="td-table-17">Lu<sup>a</sup></th>
                                        <th class="td-table-17">Lu<sup>b</sup></th>
                                        <th class="td-table-17">Co<sup>a</sup></th>
                                        <th class="td-table-17">Co<sup>b</sup></th>
                                        <th class="td-table-17">I</th>
                                        <th class="td-table-17">i</th>

                                        <th class="td-table-17">A1</th>
                                        <th class="td-table-17">H</th>
                                        <th class="td-table-17">Xg<sup>a</sup></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Le(a+)" id="Le(a+)_phenotype0" name="Lea">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Le(b+)" id="Le(b+)_phenotype0" name="Leb">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Di(a+)" id="Di(a+)_phenotype0" name="Dia">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Di(b+)" id="Di(b+)_phenotype0" name="Dib">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Kp(a+)" id="Kp(a+)_phenotype0" name="Kpa">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Kp(b+)" id="Kp(b+)_phenotype0" name="Kpb">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Js(a+)" id="Js(a+)_phenotype0" name="Jsa">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Js(b+)" id="Js(b+)_phenotype0" name="Jsb">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Lu(a+)" id="Lu(a+)_phenotype0" name="Lua">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Lu(b+)" id="Lu(b+)_phenotype0" name="Lub">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Co(a+)" id="Co(a+)_phenotype0" name="Coa">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Co(b+)" id="Co(b+)_phenotype0" name="Cob">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="I(+)" id="I(+)_phenotype0" name="I">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="i(+)" id="i(+)_phenotype0" name="i">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="A1(+)" id="A1(+)_phenotype0" name="rouleaux">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="H(+)" id="H(+)_phenotype0" name="H">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Xg(a+)" id="Xg(a+)_phenotype0" name="Xga">&nbsp;+
                                            </label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Le(a-)" id="Le(a-)_phenotype0" name="Lea">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Le(b-)" id="Le(b-)_phenotype0" name="Leb">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Di(a-)" id="Di(a-)_phenotype0" name="Dia">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Di(b-)" id="Di(b-)_phenotype0" name="Dib">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Kp(a-)" id="Kp(a-)_phenotype0" name="Kpa">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Kp(b-)" id="Kp(b-)_phenotype0" name="Kpb">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Js(a-)" id="Js(a-)_phenotype0" name="Jsa">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Js(b-)" id="Js(b-)_phenotype0" name="Jsb">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Lu(a-)" id="Lu(a-)_phenotype0" name="Lua">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Lu(b-)" id="Lu(b-)_phenotype0" name="Lub">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Co(a-)" id="Co(a-)_phenotype0" name="Coa">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Co(b-)" id="Co(b-)_phenotype0" name="Cob">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="I(-)" id="I(-)_phenotype0" name="I">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="i(-)" id="i(-)_phenotype0" name="i">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="A1(-)" id="A1(-)_phenotype0" name="rouleaux">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="H(-)" id="H(-)_phenotype0" name="H">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Xg(a-)" id="Xg(a-)_phenotype0" name="Xga">&nbsp;-
                                            </label>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                            <div id="divPhenoTable3">
                                <table id="phenoTable3" style="margin-bottom:0px" class="table table-bordered">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="row" style="margin-left:20px">

                            <div class="form-group col-md-2">
                                <input id="phenotypecode" name="phenotypecode" type="text" autocomplete="off" class="form-control" placeholder="เพิ่ม Phenotype" value="">
                            </div>
                            <div class="form-group col-md-2">

                                <button type="button" onclick="addPhenotype()" class="btn btn-info btn-sm">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                    </div><!-- end card-->
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group col-md-6">
                    <button class="btn btn-secondary" onclick="removeAntiBody()" type="button">
                        <span class="btn-label"><i class="fa fa-minus-circle"></i></span>Clear Antibody
                    </button>
                    <button class="btn btn-secondary" onclick="removePhenotype()" type="button">
                        <span class="btn-label"><i class="fa fa-minus-circle"></i></span>Clear Phenotype
                    </button>
                </div>
                <div align="right" class="form-group col-md-6">
                    <button class="btn btn-success" onclick="confirmAntiPheno()" type="button">
                        <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>