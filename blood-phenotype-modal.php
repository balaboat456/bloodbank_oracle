<input type="hidden" id="bloodinvestmodaltype" name="bloodinvestmodaltype">
<div class="modal fade blood-invest-modal" id="bloodinvestModal" tabindex="-1" role="dialog"
    aria-labelledby="bloodModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ข้อมูล Phenotype</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-check-square-o"></i> Phenotype&nbsp;&nbsp;
                            <label id="phenoLabel" class="label-model"></label>
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
                                        <th class="td-table-17">JK<sup>a</sup></th>

                                        <th class="td-table-17">Jk<sup>b</sup></th>
                                        <th class="td-table-17">Fy<sup>a</sup></th>
                                        <th class="td-table-17">Fy<sup>b<sup></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr hidden>
                                        <td class="td-table">
                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="D(+)" id="(D+)"
                                                    name="D">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="C(+)" id="(C+)"
                                                    name="C">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="E(+)" id="E(+)"
                                                    name="E">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="c(+)" id="c(+)"
                                                    name="c">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="e(+)" id="e(+)"
                                                    name="e">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="M(+)" id="M(+)"
                                                    name="M">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="N(+)" id="N(+)"
                                                    name="N">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="S(+)" id="S(+)"
                                                    name="S">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="s(+)" id="s(+)"
                                                    name="s">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="P1(+)" id="P1(+)"
                                                    name="P1">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Mi(a+)" id="Mi(a+)"
                                                    name="Mi(a+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="K(+)" id="K(+)"
                                                    name="K">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="k(+)" id="k(+)"
                                                    name="k">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Jk(a+)" id="Jk(a+)"
                                                    name="Jk(a+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Jk(b+)" id="Jk(b+)"
                                                    name="Jk(b+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Fy(a+)" id="Fy(a+)"
                                                    name="Pya">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Fy(b+)" id="Fy(b+)"
                                                    name="Fy(b+)">&nbsp;+
                                            </label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="td-table">
                                            <label class="form-check-label">
                                                <input type="radio"  onclick=checkBox(this) value="D(-)" id="D(-)"
                                                    name="D">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="C(-)" id="C(-)"
                                                    name="C">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="E(-)" id="E(-)"
                                                    name="E">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="c(-)" id="c(-)"
                                                    name="c">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="e(-)" id="e(-)"
                                                    name="e">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="M(-)" id="M(-)"
                                                    name="M">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="N(-)" id="N(-)"
                                                    name="N">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="S(-)" id="S(-)"
                                                    name="S">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="s(-)" id="s(-)"
                                                    name="s">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="P1(-)" id="P1(-)"
                                                    name="P1">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Mi(a-)" id="Mi(a-)"
                                                    name="Mi(a-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="K(-)" id="K(-)"
                                                    name="K">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="k(-)" id="k(-)"
                                                    name="k">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Jk(a-)" id="Jk(a-)"
                                                    name="Jk(a-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Jk(b-)" id="Jk(b-)"
                                                    name="Jk(b-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Fy(a-)" id="Fy(a-)"
                                                    name="Fy(a-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Fy(b-)" id="Fy(b-)"
                                                    name="Fy(b-)">&nbsp;-
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
                                    <tr hidden>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Le(a+)" id="Le(a+)"
                                                    name="Le(a+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Le(b+)" id="Le(b+)"
                                                    name="Le(b+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Di(a+)" id="Di(a+)"
                                                    name="Di(a+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Di(b+)" id="Di(b+)"
                                                    name="Di(b+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Kp(a+)" id="Kp(a+)"
                                                    name="Kpa">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Kp(b+)" id="Kp(b+)"
                                                    name="Kp(b+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Js(a+)" id="Js(a+)"
                                                    name="Js(a+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Js(b+)" id="Js(b+)"
                                                    name="Js(b+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Lu(a+)" id="Lu(a+)"
                                                    name="Lu(a+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Lu(b+)" id="Lu(b+)"
                                                    name="Lu(b+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Co(a+)" id="Co(a+)"
                                                    name="Co(a+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Co(b+)" id="Co(b+)"
                                                    name="Co(b+)">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="I(+)" id="I(+)"
                                                    name="I">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="i(+)" id="i(+)"
                                                    name="i">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="A1(+)" id="A1(+)"
                                                    name="rouleaux">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="H(+)" id="H(+)"
                                                    name="H">&nbsp;+
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Xg(a+)" id="Xg(a+)"
                                                    name="Xg(a+)">&nbsp;+
                                            </label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Le(a-)" id="Le(a-)"
                                                    name="Le(a-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Le(b-)" id="Le(b-)"
                                                    name="Le(b-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Di(a-)" id="Di(a-)"
                                                    name="Di(a-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Di(b-)" id="Di(b-)"
                                                    name="Di(b-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Kp(a-)" id="Kp(a-)"
                                                    name="Kp(a-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Kp(b-)" id="Kp(b-)"
                                                    name="Kp(b-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Js(a-)" id="Js(a-)"
                                                    name="Js(a-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Js(b-)" id="Js(b-)"
                                                    name="Js(b-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Lu(a-)" id="Lu(a-)"
                                                    name="Lu(a-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Lu(b-)" id="Lu(b-)"
                                                    name="Lu(b-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Co(a-)" id="Co(a-)"
                                                    name="Co(a-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Co(b-)" id="Co(b-)"
                                                    name="Co(b-)">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="I(-)" id="I(-)"
                                                    name="I">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="i(-)" id="i(-)"
                                                    name="i">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="A1(-)" id="A1(-)"
                                                    name="rouleaux">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="H(-)" id="H(-)"
                                                    name="H">&nbsp;-
                                            </label>
                                        </td>
                                        <td class="td-table">

                                            <label class="form-check-label">
                                                <input type="radio" onclick=checkBox(this) value="Xg(a-)" id="Xg(a-)"
                                                    name="Xg(a-)">&nbsp;-
                                            </label>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                            <div id="divPhenoTable3">
                            <table id="phenoTable3" style="margin-bottom:0px" class="table table-bordered" >
                                <thead>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            </div>


                        </div>
                        <div class="row" style="margin-left:20px">

                            <div class="form-group col-md-2">
                                    <input id="phenotypecode" name="phenotypecode" type="text" autocomplete="off"
                                        class="form-control" placeholder="เพิ่ม Phenotype" value="">
                            </div>
                            <div class="form-group col-md-2">

                                    <!-- <button type="button" onclick="addPhenotype()" class="btn btn-info btn-sm">
                                        <i class="fa fa-plus"></i>
                                    </button> -->
                                    <button type="button" onclick="addPhenotype_New()" class="btn btn-info btn-sm">
                                        <i class="fa fa-plus"></i>
                                    </button>
                            </div>
                        </div>

                    </div><!-- end card-->
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group col-md-6">
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