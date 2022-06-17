<div class="modal fade blood-invest-modal" id="stock-ag-modal" tabindex="-1" role="dialog"
    aria-labelledby="bloodModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">สร้างตาราง Phenotype</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-check-square-o"></i> Phenotype&nbsp;&nbsp;
                            <label id="AG_phenoLabel" class="label-model"></label>
                            <input type="hidden" id="AG_pheno" name="AG_pheno" value="">
                        </h3>
                        </div>

                        <div class="card-body">

                            <table id="AG_phenoTable1" style="margin-bottom:0px" class="table table-bordered">
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
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="D(+)" id="(D+)"
                                                    name="D">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="C(+)" id="(C+)"
                                                    name="C">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="E(+)" id="E(+)"
                                                    name="E">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="c(+)" id="c(+)"
                                                    name="c">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="e(+)" id="e(+)"
                                                    name="e">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="M(+)" id="M(+)"
                                                    name="M">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="N(+)" id="N(+)"
                                                    name="N">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="S(+)" id="S(+)"
                                                    name="S">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="s(+)" id="s(+)"
                                                    name="s">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="P1(+)" id="P1(+)"
                                                    name="P1">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Mi(a+)" id="Mi(a+)"
                                                    name="Mi(a+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="K(+)" id="K(+)"
                                                    name="K">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="k(+)" id="k(+)"
                                                    name="k">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Jk(a+)" id="Jk(a+)"
                                                    name="Jka">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Jk(b+)" id="Jk(b+)"
                                                    name="Jkb">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Fy(a+)" id="Fy(a+)"
                                                    name="Fya">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Fy(b+)" id="Fy(b+)"
                                                    name="Fyb">&nbsp;+
                                            </label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="td-table">
                                            <label class="form-check-label">
                                                <input type="radio"  onclick=checkBoxAgInOut(this) value="D(-)" id="D(-)"
                                                    name="D">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="C(-)" id="C(-)"
                                                    name="C">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="E(-)" id="E(-)"
                                                    name="E">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="c(-)" id="c(-)"
                                                    name="c">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="e(-)" id="e(-)"
                                                    name="e">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="M(-)" id="M(-)"
                                                    name="M">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="N(-)" id="N(-)"
                                                    name="N">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="S(-)" id="S(-)"
                                                    name="S">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="s(-)" id="s(-)"
                                                    name="s">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="P1(-)" id="P1(-)"
                                                    name="P1">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Mi(a-)" id="Mi(a-)"
                                                    name="Mia">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="K(-)" id="K(-)"
                                                    name="K">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="k(-)" id="k(-)"
                                                    name="k">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Jk(a-)" id="Jk(a-)"
                                                    name="Jka">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Jk(b-)" id="Jk(b-)"
                                                    name="Jkb">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Fy(a-)" id="Fy(a-)"
                                                    name="Fya">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Fy(b-)" id="Fy(b-)"
                                                    name="Fyb">&nbsp;-
                                            </label>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                            <table id="AG_phenoTable2" style="margin-bottom:0px" class="table table-bordered">
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
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Le(a+)" id="Le(a+)"
                                                    name="Lea">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Le(b+)" id="Le(b+)"
                                                    name="Leb">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Di(a+)" id="Di(a+)"
                                                    name="Dia">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Di(b+)" id="Di(b+)"
                                                    name="Dib">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Kp(a+)" id="Kp(a+)"
                                                    name="Kpa">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Kp(b+)" id="Kp(b+)"
                                                    name="Kpb">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Js(a+)" id="Js(a+)"
                                                    name="Jsa">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Js(b+)" id="Js(b+)"
                                                    name="Jsb">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Lu(a+)" id="Lu(a+)"
                                                    name="Lua">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Lu(b+)" id="Lu(b+)"
                                                    name="Lub">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Co(a+)" id="Co(a+)"
                                                    name="Coa">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Co(b+)" id="Co(b+)"
                                                    name="Cob">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="I(+)" id="I(+)"
                                                    name="I">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="i(+)" id="i(+)"
                                                    name="i">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="A1(+)" id="A1(+)"
                                                    name="rouleaux">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="H(+)" id="H(+)"
                                                    name="H">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Xg(a+)" id="Xg(a+)"
                                                    name="Xga">&nbsp;+
                                            </label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Le(a-)" id="Le(a-)"
                                                    name="Lea">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Le(b-)" id="Le(b-)"
                                                    name="Leb">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Di(a-)" id="Di(a-)"
                                                    name="Dia">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Di(b-)" id="Di(b-)"
                                                    name="Dib">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Kp(a-)" id="Kp(a-)"
                                                    name="Kpa">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Kp(b-)" id="Kp(b-)"
                                                    name="Kpb">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Js(a-)" id="Js(a-)"
                                                    name="Jsa">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Js(b-)" id="Js(b-)"
                                                    name="Jsb">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Lu(a-)" id="Lu(a-)"
                                                    name="Lua">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Lu(b-)" id="Lu(b-)"
                                                    name="Lub">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Co(a-)" id="Co(a-)"
                                                    name="Coa">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Co(b-)" id="Co(b-)"
                                                    name="Cob">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="I(-)" id="I(-)"
                                                    name="I">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="i(-)" id="i(-)"
                                                    name="i">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="A1(-)" id="A1(-)"
                                                    name="rouleaux">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="H(-)" id="H(-)"
                                                    name="H">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBoxAgInOut(this) value="Xg(a-)" id="Xg(a-)"
                                                    name="Xga">&nbsp;-
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
                    <button class="btn btn-secondary" onclick="PhenotypeAgInOutGroupingRemove()" type="button">
                        <span class="btn-label"><i class="fa fa-minus-circle"></i></span>Clear Phenotype
                    </button>
                </div>
                <div align="right" class="form-group col-md-6">
                    <button onclick="PhenotypeAgInOutGroupingSave()" class="btn btn-primary" type="submit">
                        <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-warning m-l-5">
                        <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>