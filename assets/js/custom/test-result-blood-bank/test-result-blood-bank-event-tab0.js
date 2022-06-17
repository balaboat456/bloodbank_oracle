// Start Set Data Tab 0
function setValueItemTab0(data)
{
    $("#adsorption0").val(data.adsorption0);
    $("#elution0").val(data.elution0);
    $("#labremark0").val(data.labremark0);

    // Phenotype
    document.getElementById('antibody0').value = data.antibody0;
    document.getElementById('antibodyLable0').innerHTML = data.antibody0;

    // setModalantibody0(data.antibody0);
    
    document.getElementById('phenotype0').value = data.phenotype0;
    document.getElementById('phenotypedisplay0').value = data.phenotypedisplay0;
    document.getElementById('phenotypeLable0').innerHTML = data.phenotypedisplay0;

    // setModalphenotype0(data.phenotype0);

    // ABO
    removeRowTable('list_table_abo_0');
    $.each(data.lab_abo_item_0, function (index, value) {
        addABOTest0(value);
    });
    ///////////
    if(data.lab_abo_item_0 == ''){
        addABOTest0();
    }
//////////
    setBloodGroupConfirm("#labconfirmbloodgroupid_0");
    $("#labconfirmbloodgroupid_0").val(data.labconfirmbloodgroupid_0);

    setABOTest0Serum("#labantia1_0");
    setABOTest0Serum("#labantih_0");
    setABOTest0Serum("#laba2cells_0");
    $("#labantia1_0").val(data.labantia1_0);
    $("#labantih_0").val(data.labantih_0);
    $("#laba2cells_0").val(data.laba2cells_0);

    // Rh
    removeRowTable('list_table_rh_0');
    $.each(data.lab_rh_item_0, function (index, value) {
        addRhTest0(value);
    });
    if(data.lab_rh_item_0 == ''){
        addRhTest0();
    }
    setRhConfirm("#labconfirmrhid_0");
    // settritation("#labconfirmrhid_0");
    $("#labconfirmrhid_0").val(data.labconfirmrhid_0);

    // Antibody Sceening test    
    removeRowTable('list_table_anti_sceen_0');
    $.each(data.lab_antibodysceentest_item_0, function (index, value) {
        addAntiSceeningTest0(value);
    });
    if(data.lab_antibodysceentest_item_0 == ''){
        addAntiSceeningTest0_null();
    }
    
    setBloodGroupSerumConfirm("#labconfirmantibodysceentestid_0",data.labconfirmantibodysceentestid_0);
    $("#labconfirmantibodysceentestid_0").val(data.labconfirmantibodysceentestid_0);

    //Antibody identification test (Gel test)
    document.getElementById('antibody_text2').innerHTML = data.labconfirmantibodyidentificationtest_0;
    if(document.getElementById('antibody_text2').innerHTML == 'undefined'){
        document.getElementById('antibody_text2').innerHTML = '';
    }
    $("#labconfirmantibodyidentificationtest_0").val(data.labconfirmantibodyidentificationtest_0);

    setModallabconfirmantibodyidentificationtest_0(data.labconfirmantibodyidentificationtest_0);

    document.getElementById('antibody_text2_1').innerHTML = data.antibodyidentificationtestTubeMethod0;
    if(document.getElementById('antibody_text2').innerHTML == 'undefined'){
        document.getElementById('antibody_text2').innerHTML = '';
    }
    $("#antibodyidentificationtestTubeMethod0").val(data.antibodyidentificationtestTubeMethod0);

    setModalantibodyidentificationtestTubeMethod0(data.antibodyidentificationtestTubeMethod0);

    // DAT
    setABOTest0SerumConfirm("#lab_dat_poly_0");
    setABOTest0SerumConfirm("#lab_dat_igg_0");
    setABOTest0SerumConfirm("#lab_dat_c3d_0");
    setABOTest0SerumConfirm("#lab_dat_ccc_0");
    
    $("#lab_dat_poly_0").val(data.lab_dat_poly_0);
    $("#lab_dat_igg_0").val(data.lab_dat_igg_0);
    $("#lab_dat_c3d_0").val(data.lab_dat_c3d_0);
    $("#lab_dat_ccc_0").val(data.lab_dat_ccc_0);

    setABOTest0Serum("#lab_dat_poly_modal_0");
    setABOTest0Serum("#lab_dat_igg_modal_0");
    setABOTest0Serum("#lab_dat_c3d_modal_0");
    setABOTest0Serum("#lab_dat_ccc_modal_0");
    
    $("#lab_dat_poly_modal_0").val(data.lab_dat_poly_modal_0);
    $("#lab_dat_igg_modal_0").val(data.lab_dat_igg_modal_0);
    $("#lab_dat_c3d_modal_0").val(data.lab_dat_c3d_modal_0);
    $("#lab_dat_ccc_modal_0").val(data.lab_dat_ccc_modal_0);

    // Antibody identification test
    removeRowTable('list_table_anti_iden_0');
    $.each(data.lab_antibodyidentificationtest_item_0, function (index, value) {
        addAntibodyIdenTest0(value);
    });






    //  Rh typing
    document.getElementById("lab_rhtype_d_0+").checked = (data.lab_rhtype_d_0 == 'D(+)')
    document.getElementById("lab_rhtype_d_0-").checked = (data.lab_rhtype_d_0 == 'D(-)')

    document.getElementById("lab_rhtype_c_0+").checked = (data.lab_rhtype_c_0 == 'C(+)')
    document.getElementById("lab_rhtype_c_0-").checked = (data.lab_rhtype_c_0 == 'C(-)')

    document.getElementById("lab_rhtype_e_0+").checked = (data.lab_rhtype_e_0 == 'E(+)')
    document.getElementById("lab_rhtype_e_0-").checked = (data.lab_rhtype_e_0 == 'E(-)')

    document.getElementById("lab_rhtype_c2_0+").checked = (data.lab_rhtype_c2_0 == 'c(+)')
    document.getElementById("lab_rhtype_c2_0-").checked = (data.lab_rhtype_c2_0 == 'c(-)')

    document.getElementById("lab_rhtype_e2_0+").checked = (data.lab_rhtype_e2_0 == 'e(+)')
    document.getElementById("lab_rhtype_e2_0-").checked = (data.lab_rhtype_e2_0 == 'e(-)')

    // setRh2("#lab_rhtype_result_id_0");
    settritation("#lab_rhtype_result_id_0");
    $("#lab_rhtype_result_id_0").val(data.lab_rhtype_result_id_0);

    // Saliva
    removeRowTable('list_table_saliva_0');

    if(data.lab_salivatest_item_0.length == 0)
    {
        data.lab_salivatest_item_0 = [
                                        {
                                            labsalivatestid0:'',
                                            labsalivatest0:"RT 5-60`",
                                            labsalivatestacells0:'',
                                            labsalivatestbcells0 : '',
                                            labsalivatesotcells0:''
                                        },
                                        {
                                            labsalivatestid0:'',
                                            labsalivatest0:'Control gr.A',
                                            labsalivatestacells0:'',
                                            labsalivatestbcells0 : '',
                                            labsalivatesotcells0:''
                                        },
                                        {
                                            labsalivatestid0:'',
                                            labsalivatest0:'Control gr.B',
                                            labsalivatestacells0:'',
                                            labsalivatestbcells0 : '',
                                            labsalivatesotcells0:''
                                        },
                                        {
                                            labsalivatestid0:'',
                                            labsalivatest0:'Control gr.O',
                                            labsalivatestacells0:'',
                                            labsalivatestbcells0 : '',
                                            labsalivatesotcells0:''
                                        },
                                        {
                                            labsalivatestid0:'',
                                            labsalivatest0:'Control gr.AB',
                                            labsalivatestacells0:'',
                                            labsalivatestbcells0 : '',
                                            labsalivatesotcells0:''
                                        }
                                    ];
    }

    $.each(data.lab_salivatest_item_0, function (index, value) {
        addSalivaTest0(value);
    });

    setBloodGroup("#labconfirmsalivaid_0");
    $("#labconfirmsalivaid_0").val(data.labconfirmsalivaid_0);

    // Titration 
    removeRowTable('list_table_titration_0');
    $.each(data.lab_titration_item_0, function (index, value) {
        addTitration0(value);
    });

    // setRh2("#labconfirmtitrationid_0");
    settritation("#labconfirmcoldagglutininid_0");
    $("#labconfirmtitrationid_0").val(data.labconfirmtitrationid_0);


    //    Cold agglutinin
    removeRowTable('list_table_coldagglutinin_0');

    if(data.lab_coldagglutinin_item_0.length == 0)
    {
        var aRRpush = [];

        aRRpush.push(objColdAgglutinin0('O1','2 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin0('O1','24 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin0('O2','2 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin0('O2','24 ชั่วโมง'));

        data.lab_coldagglutinin_item_0 = aRRpush ;
    }

    $.each(data.lab_coldagglutinin_item_0, function (index, value) {
        addColdAgglutinin0(value);
    });

    // setRh2("#labconfirmcoldagglutininid_0");
    // settritation("#labconfirmcoldagglutininid_0");
    $("#labconfirmcoldagglutininid_0").val(data.labconfirmcoldagglutininid_0);

    // Antibody identification test Get Method
    removeRowTable('list_table_anti_iden_get_method_0');
    $.each(data.lab_antibodyidentificationtestgetmethod_item_0, function (index, value) {
        addAntibodyIdenTestGetMethod0(value);
    });

    // Antibody Sceening test Get Method   
    removeRowTable('list_table_anti_sceen_get_method_0');
    $.each(data.lab_antibodysceentestgetmethod_item_0, function (index, value) {
        addAntiSceeningTestGetMethod0(value);
    });
    if(data.lab_antibodysceentestgetmethod_item_0 == ''){
        addAntiSceeningTestGetMethod0_null();
    }
    setBloodGroupSerumConfirm("#labconfirmantibodysceentestgetmethodid_0",data.labconfirmantibodysceentestgetmethodid_0);
    // setBloodGroupSerum("#labconfirmantibodysceentestgetmethodid_0",data.labconfirmantibodysceentestgetmethodid_0);
    $("#labconfirmantibodysceentestgetmethodid_0").val(data.labconfirmantibodysceentestgetmethodid_0);



}

function objColdAgglutinin0(O='',time='')
{
    var obj =   {
                    labcoldagglutininid0:'',
                    labcoldagglutinincode0:'',
                    labcoldagglutinino0:O,
                    labcoldagglutinintime0:time,
                    labcoldagglutinin10:'',
                    labcoldagglutinin20:'',
                    labcoldagglutinin40:'',
                    labcoldagglutinin80:'',
                    labcoldagglutinin160:'',
                    labcoldagglutinin320:'',
                    labcoldagglutinin640:'',
                    labcoldagglutinin1280:'',
                    labcoldagglutinin2560:'',
                    labcoldagglutinin5120:'',
                    labcoldagglutinin10240:'',
                    labcoldagglutinin20480:''
                };
            
    return obj;
}

// End Set Data Tab 0

// Start ABO
var abocount0 = 0;
function addABOTest0(value=[]) {

    var table = document.getElementById("list_table_abo_0").rows.length;

    // alert(table);

    var event_data = '';

    if(table == 2){
        if(value.length == 0)
            {
                
                value = {
                        labreagent0:'CAT',
                        lababoid0:'',
                        lababocode0:'',
                        lababoantia0:'',
                        lababoantib0:'',
                        lababoantiab0 : '',
                        lababoacells0:'',
                        lababobcells0:'',
                        lababoocells0:'',
                        lababobloodgroup0:''
                    };
            }
    }
    else{
        if(value.length == 0)
            {
                
                value = {
                        labreagent0:'',
                        lababoid0:'',
                        lababocode0:'',
                        lababoantia0:'',
                        lababoantib0:'',
                        lababoantiab0 : '',
                        lababoacells0:'',
                        lababobcells0:'',
                        lababoocells0:'',
                        lababobloodgroup0:''
                    };
            }
    }

    
        event_data += '<tr>';

        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';

        event_data += '<td class="td-table">';
        event_data += '<input type="text" id="labreagent0'+abocount0+'" name="labreagent0'+abocount0+'" value="'+value.labreagent0+'" onkeyup="setLabBloodReagent_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="lababoantia0'+abocount0+'" name="lababoantia0'+abocount0+'" onchange="autoBlood0('+abocount0+',this,1)"  class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table">';
        event_data += '<select id="lababoantib0'+abocount0+'" name="lababoantib0'+abocount0+'" onchange="autoBlood0('+abocount0+',this,2)" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table">';
        event_data += '<select id="lababoantiab0'+abocount0+'" name="lababoantiab0'+abocount0+'" onchange="autoBlood0('+abocount0+',this,3)" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table">';
        event_data += '<select id="lababoacells0'+abocount0+'" name="lababoacells0'+abocount0+'" onchange="autoBlood0('+abocount0+',this,4)" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table">';
        event_data += '<select id="lababobcells0'+abocount0+'" name="lababobcells0'+abocount0+'" onchange="autoBlood0('+abocount0+',this,5)" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table">';
        event_data += '<select id="lababoocells0'+abocount0+'" name="lababoocells0'+abocount0+'" onchange="autoBlood0('+abocount0+',this,6)" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table">';
        event_data += '<select id="lababobloodgroup0'+abocount0+'" name="lababobloodgroup0'+abocount0+'" onchange="confirmBloodgroupResult(this.value); setLabBloodABO_0(this);"   class="form-control select2"></select>';
        // event_data += '<select id="lababobloodgroup0'+abocount0+'" name="lababobloodgroup0'+abocount0+'" onchange="confirmBloodgroupResult(this.value);setDataModalSelectValue(`labconfirmbloodgroupid_0`, this.value, this.value);setLabBloodABO_0(this)"   class="form-control select2"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table">' ;
        event_data += '<input type="hidden"  name="lababoid0'+abocount0+'" value="'+abocount0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
    
    $("#list_table_abo_0").append(event_data);

    setABOTest0Serum("#lababoantia0"+abocount0,value.lababoantia0);
    setABOTest0Serum("#lababoantib0"+abocount0,value.lababoantib0);
    setABOTest0Serum("#lababoantiab0"+abocount0,value.lababoantiab0);
    setABOTest0Serum("#lababoacells0"+abocount0,value.lababoacells0);
    setABOTest0Serum("#lababobcells0"+abocount0,value.lababobcells0);
    setABOTest0Serum("#lababoocells0"+abocount0,value.lababoocells0);
    setBloodGroup("#lababobloodgroup0"+abocount0,value.lababobloodgroup0);
    setDataModalSelectValue('lababobloodgroup0'+abocount0,value.lababobloodgroup0,value.lababobloodgroup0);

    $("#lababoantia0"+abocount0).val(value.lababoantia0);
    $("#lababoantib0"+abocount0).val(value.lababoantib0);
    $("#lababoantiab0"+abocount0).val(value.lababoantiab0);
    $("#lababoacells0"+abocount0).val(value.lababoacells0);
    $("#lababobcells0"+abocount0).val(value.lababobcells0);
    $("#lababoocells0"+abocount0).val(value.lababoocells0);
    $("#lababobloodgroup0"+abocount0).val(value.lababobloodgroup0);

    $("#lababobloodgroup0"+abocount0).select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });

    abocount0++;
}


function autoBlood0(indexcount0="",self,col='')
{

    console.log("*********1**********");

    var antia = $("#lababoantia0"+indexcount0).val();
    var antib = $("#lababoantib0"+indexcount0).val();
    var antiab = $("#lababoantiab0"+indexcount0).val();
    var acells = $("#lababoacells0"+indexcount0).val();
    var bcells = $("#lababobcells0"+indexcount0).val();
    var ocells = $("#lababoocells0"+indexcount0).val();

    var ayu = document.getElementById("patientage").innerHTML;


    if(parseInt(ayu) <= 1){

        console.log("*********2**********");

        if( (antia) && (antib)  && (antia != "0") && (antib != "0" ) && !(acells) && !(bcells) )
        {
            if( 
                ((antia != "11") && 
                (antib == "11") 
                ) ||
                ((antia != "1") && 
                (antib == "1") 
                )
            )
            {
                $("#labconfirmbloodgroupid_0").val("A");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('labconfirmbloodgroupid_0'+indexcount0, 'A', 'A');
                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'A', 'A');

                confirmBloodgroupResult("A");
                setBloodABO_0(self);
                noautoblood0(self);
                return false;
            }else if(
                        (
                            (antia == "11") && 
                            (antib != "11") 
                        ) ||
                        (
                            (antia == "1") && 
                            (antib != "1") 
                        )
                    )
            {
                $("#labconfirmbloodgroupid_0").val("B");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'B', 'B');
                confirmBloodgroupResult("B");
                setBloodABO_0(self);
                noautoblood0(self);
                return false;
            }else if(
                        (
                            (antia == "11") && 
                            (antib == "11")
                        ) ||
                        (
                            (antia == "1") && 
                            (antib == "1")
                        )
                        
                    )
            {
                $("#labconfirmbloodgroupid_0").val("O");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'O', 'O');


                confirmBloodgroupResult("O");
                setBloodABO_0(self);
                noautoblood0(self);
                return false;
            }else if(
                        
                        (
                            (antia > 11) && 
                            (antib > 11)
                        ) ||
                        (
                            (antia > 1 && antia < 11) && 
                            (antib > 1 && antib < 11)
                        )
                        
                    )
            {
                
                $("#labconfirmbloodgroupid_0").val("AB");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'AB', 'AB');

                confirmBloodgroupResult("AB");
                setBloodABO_0(self);
                noautoblood0(self);
                return false;
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_0").val("");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, '', '');

                setBloodABO_0(self);
                confirmBloodgroupResult("");
            }

            

        }

        console.log("*********4**********");

        if((antia) && (antib)  && (acells) && (bcells) 
        && (antia != "0") && (antib != "0" )  && (acells != "0") && (bcells != "0") 
        )
        {
            if( (antia != "1" || antia != "11") && 
                (antib == "1" || antib == "11") && 
                (acells == "1" || acells == "11") && 
                (bcells != "1" || bcells != "11")
            )
            {
                console.log("*********5**********");
                $("#labconfirmbloodgroupid_0").val("A");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'A', 'A');

                confirmBloodgroupResult("A");
                setBloodABO_0(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib != "1" || antib != "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells == "1" || bcells == "11") )
            {
                console.log("*********6**********");
                $("#labconfirmbloodgroupid_0").val("B");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'B', 'B');
                confirmBloodgroupResult("B");
                setBloodABO_0(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib == "1" || antib == "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells != "1" || bcells != "11") )
            {
                console.log("*********6**********");
                $("#labconfirmbloodgroupid_0").val("O");
                $("#labconfirmbloodgroupid_0").trigger('change');


                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'O', 'O');
                confirmBloodgroupResult("O");
                setBloodABO_0(self);
            }else if(
                        (antia != "1" || antia != "11") && 
                        (antib != "1" || antib != "11") && 
                        (acells == "1" || acells == "11") && 
                        (bcells == "1" || bcells == "11") 
                    )
            {
                console.log("*********7**********");
                $("#labconfirmbloodgroupid_0").val("AB");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'AB', 'AB');
                confirmBloodgroupResult("AB");
                setBloodABO_0(self);
            }else
            {
                console.log("*********8**********");
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_0").val("");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, '', '');

                confirmBloodgroupResult("");
                setBloodABO_0(self);
            }
        }else
        {
            console.log("*********9**********");
            setDataModalSelectValue('lababobloodgroup0'+indexcount0, '', '');
            confirmBloodgroupResult("");
            setBloodABO_0(self);
        }

    }// if อายุ
    else{

        if ((antia) && (antib) && (antia != "0") && (antib != "0") && (acells) && (bcells) && (acells != "0") && (bcells != "0"))
        {
            if( 
                ((antia != "11") && (antib == "11") && (bcells != "11") && (acells == "11")) ||
                ((antia != "1") && (antib == "1") && (bcells != "1") && (acells == "1"))
            )
            {
                $("#labconfirmbloodgroupid_0").val("A");
                $("#labconfirmbloodgroupid_0").trigger('change');
                
                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'A', 'A');

                confirmBloodgroupResult("A");
                setBloodABO_0(self);
                noautoblood0(self);
                return false;
            }else if(
                        ((antia == "11") && (antib != "11") && (bcells == "11") && (acells != "11")) ||
                        ((antia == "1") && (antib != "1") && (bcells == "1") && (acells != "1"))
                    )
            {
                $("#labconfirmbloodgroupid_0").val("B");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'B', 'B');

                confirmBloodgroupResult("B");
                setBloodABO_0(self);
                noautoblood0(self);
                return false;
            }else if(
                        ((antia == "11") && (antib == "11") && (bcells != "11") && (acells != "11")) ||
                        ((antia == "1") && (antib == "1") && (bcells != "1") && (acells != "1"))
                    )
            {
                $("#labconfirmbloodgroupid_0").val("O");
                $("#labconfirmbloodgroupid_0").trigger('change');

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'O', 'O');

                confirmBloodgroupResult("O");
                setBloodABO_0(self);
                noautoblood0(self);
                return false;
            }else if(
                       ((antia != 11) && (antib != 11) && (bcells == 11) && (acells == 11)) ||
                        ((antia != 1) && (antib != 1) && (bcells == 1) && (acells == 1))
                    )
            {
                
                $("#labconfirmbloodgroupid_0").val("AB");
                $("#labconfirmbloodgroupid_0").trigger('change');
                

                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'AB', 'AB');

                confirmBloodgroupResult("AB");
                setBloodABO_0(self);
                noautoblood0(self);
                return false;
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_0").val("");
                $("#labconfirmbloodgroupid_0").trigger('change');
                
                setDataModalSelectValue('lababobloodgroup0'+indexcount0, '', '');

                setBloodABO_0(self);
                confirmBloodgroupResult("");
            }

            

        }

        if((antia) && (antib)  && (acells) && (bcells) 
        && (antia != "0") && (antib != "0" )  && (acells != "0") && (bcells != "0") 
        )
        {
            if( (antia != "1" || antia != "11") && 
                (antib == "1" || antib == "11") && 
                (acells == "1" || acells == "11") && 
                (bcells != "1" || bcells != "11")
            )
            {
                $("#labconfirmbloodgroupid_0").val("A");
                $("#labconfirmbloodgroupid_0").trigger('change');
                
                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'A', 'A');

                confirmBloodgroupResult("A");
                setBloodABO_0(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib != "1" || antib != "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells == "1" || bcells == "11"))
            {
                $("#labconfirmbloodgroupid_0").val("B");
                $("#labconfirmbloodgroupid_0").trigger('change');
                
                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'B', 'B');

                confirmBloodgroupResult("B");
                setBloodABO_0(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib == "1" || antib == "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells != "1" || bcells != "11"))
            {
                $("#labconfirmbloodgroupid_0").val("O");
                $("#labconfirmbloodgroupid_0").trigger('change');
                
                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'O', 'O');
                
                confirmBloodgroupResult("O");
                setBloodABO_0(self);
            }else if(
                        (antia != "1" || antia != "11") && 
                        (antib != "1" || antib != "11") && 
                        (acells == "1" || acells == "11") && 
                        (bcells == "1" || bcells == "11")
                    )
            {
                $("#labconfirmbloodgroupid_0").val("AB");
                $("#labconfirmbloodgroupid_0").trigger('change');
                
                setDataModalSelectValue('lababobloodgroup0'+indexcount0, 'AB', 'AB');

                confirmBloodgroupResult("AB");
                setBloodABO_0(self);
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_0").val("");
                $("#labconfirmbloodgroupid_0").trigger('change');
                
                setDataModalSelectValue('lababobloodgroup0'+indexcount0, '', '');

                confirmBloodgroupResult("");
                setBloodABO_0(self);
            }
        }else
        {
            setDataModalSelectValue('lababobloodgroup0'+indexcount0, '', '');

            confirmBloodgroupResult("");
            setBloodABO_0(self);
        }

    }// else อายุ 

    
}

function noautoblood0(self) {
    var rows = self.parentNode.parentNode;
    var item = JSON.parse(rows.cells[0].innerHTML);
    var table = document.getElementById("list_table_abo_0");
    var r = 1;
    var status0 = "";
    // alert(item.lababobloodgroup0);

    var patientbloodgroup = document.getElementById("patientbloodgroup").innerHTML;


    while (row = table.rows[r++]) {
        try {
            var blood = JSON.parse(document.getElementById("list_table_abo_0").rows[r].cells.item(0).innerHTML);  
        }
        catch(err) {
            console.log("err");
        }
        
        console.log(blood.lababobloodgroup0);
        if(item.lababobloodgroup0 != blood.lababobloodgroup0){
            // alert("5555555555");
            $("#labconfirmbloodgroupid_0").val("");
            $("#labconfirmbloodgroupid_0").trigger('change');
            confirmBloodgroupResult("");
            return false;
        }
        else{
            // alert(patientbloodgroup);
            if(patientbloodgroup == '-' || patientbloodgroup == '' || patientbloodgroup == 'ไม่ทราบ' || patientbloodgroup == "Discrepancy"){
                $("#labconfirmbloodgroupid_0").val(item.lababobloodgroup0);
                $("#labconfirmbloodgroupid_0").trigger('change');
                confirmBloodgroupResult(item.lababobloodgroup0);
            }
            else{
                if(patientbloodgroup != item.lababobloodgroup0){
                    bloodalert();
                }
                else{
                    $("#labconfirmbloodgroupid_0").val(item.lababobloodgroup0);
                    $("#labconfirmbloodgroupid_0").trigger('change');
                    confirmBloodgroupResult(item.lababobloodgroup0);
                }
            }
            
        }
    }
}

function bloodalert() {
    swal({
        title: 'หมู่เลือดไม่ตรงกับคนไข้',
        type: 'warning',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    });
   

}


function errorSwal($msg = "") {
    swal({
        title: $msg,
        type: 'warning',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    });
   

}
// End ABO

// Start Rh
var rhcount0 = 0;
function addRhTest0(value=[]) {

    var table = document.getElementById("list_table_rh_2").rows.length;

    if(table == 1){
        if(value.length == 0)
        {
            value = {
                        labrhreagent0:'CAT',
                        labrhid0:'',
                        labrhcode0:'',
                        labrhrt0:'',
                        lab37c0 : '',
                        labiat0:'',
                        labccc0:'',
                        labresult0:''
                    };
        }
    }
    else{
        if(value.length == 0)
        {
            value = {
                        labrhreagent0:'',
                        labrhid0:'',
                        labrhcode0:'',
                        labrhrt0:'',
                        lab37c0 : '',
                        labiat0:'',
                        labccc0:'',
                        labresult0:''
                    };
        }
    }
    
    
                                        
    var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input  class="form-control" id="labrhreagent0'+rhcount0+'" name="labrhreagent0'+rhcount0+'" value="'+value.labrhreagent0+'" onkeyup="setLabRhReagent_0(this); setpos0('+rhcount0+',this,3);" >';
        event_data += '</td>'
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labrhrt0'+rhcount0+'" name="labrhrt0'+rhcount0+'"  class="form-control" onchange="setLabRhRt_0(this); setpos0('+rhcount0+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="lab37c0'+rhcount0+'" name="lab37c0'+rhcount0+'" class="form-control" onchange="setLab37C_0(this); setpos0('+rhcount0+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labiat0'+rhcount0+'" name="labiat0'+rhcount0+'" class="form-control" onchange="setLabIAT_0(this); setpos0('+rhcount0+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labccc0'+rhcount0+'" name="labccc0'+rhcount0+'" class="form-control" onchange="setLabCCC_0(this);" ></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labresult0'+rhcount0+'" name="labresult0'+rhcount0+'" class="form-control" onchange="setLabResult_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+rhcount0+'" value="'+rhcount0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
    
    $("#list_table_rh_0").append(event_data);

    setABOTest0Serum("#labrhrt0"+rhcount0,value.labrhrt0);
    setABOTest0Serum("#lab37c0"+rhcount0,value.lab37c0);
    setABOTest0Serum("#labiat0"+rhcount0,value.labiat0);
    setABOTest0Serum("#labccc0"+rhcount0,value.labccc0);
    setRh2("#labresult0"+rhcount0,value.labresult0);

    $("#labrhrt0"+rhcount0).val(value.labrhrt0);
    $("#lab37c0"+rhcount0).val(value.lab37c0);
    $("#labiat0"+rhcount0).val(value.labiat0);
    $("#labccc0"+rhcount0).val(value.labccc0);
    $("#labresult0"+rhcount0).val(value.labresult0);

    $("#labresult0" + rhcount0).select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });
    
    rhcount0++;
}
// End Rh

function setpos0(indexcount0,self,col='')
{
    var labrhrt0 = $("#labrhrt0"+indexcount0).val();
    var lab37c0 = $("#lab37c0"+indexcount0).val();
    var labiat0 = $("#labiat0"+indexcount0).val();
    var labccc0 = $("#labccc0"+indexcount0).val();
    var labresult0 = $("#labresult0"+indexcount0).val();

    if(labrhrt0 > 1 || lab37c0 > 1 || labiat0 > 1  ){

        setDataModalSelectValue(`labconfirmrhid_0`, 'Rh+', 'Positive');
        setDataModalSelectValue(`labresult0`+indexcount0, 'Rh+', 'Positive');
        confirmRhResult("Rh+");
        
    }else if(labrhrt0 == 1 || lab37c0 == 1 || labiat0 == 1  ){

        setDataModalSelectValue(`labconfirmrhid_0`, 'Rh-', 'Negative');
        setDataModalSelectValue(`labresult0`+indexcount0, 'Rh-', 'Negative');
        confirmRhResult("Rh-");
        
    }else 
    {
        setDataModalSelectValue(`labconfirmrhid_0`, '', '');
        setDataModalSelectValue(`labresult0`+indexcount0, '', '');
        confirmRhResult("");
    }
    noautopos0(self);
}
function noautopos0(self){
    var rows = self.parentNode.parentNode;
    var item = JSON.parse(rows.cells[0].innerHTML);

    var table = document.getElementById("list_table_rh_0");
    var r = 0;
    var status0 = "";
    // alert(item.labresult0);

    while (row = table.rows[r++]) {
        try {
            var bloodrh = JSON.parse(document.getElementById("list_table_rh_0").rows[r].cells.item(0).innerHTML);  
        }
        catch(err) {
            console.log("err");
        }
        
        // console.log(bloodrh);
        // alert(bloodrh);
        if(item.labresult0 != bloodrh.labresult0){
            // alert("5555555555");
            $("#labconfirmrhid_0").val("");
            $("#labconfirmrhid_0").trigger('change');
            return false;
        }
        else{
            $("#labconfirmrhid_0").val(item.labresult0);
            $("#labconfirmrhid_0").trigger('change');
        }
    }
}

function setResultAntibodySceen_pos(indexcount0,self,col='')
{
    var labantibodysceentestpimi0 = $("#labantibodysceentestpimi0"+indexcount0).val();
    var labantibodysceentesto10 = $("#labantibodysceentesto10"+indexcount0).val();
    var labantibodysceentesto20 = $("#labantibodysceentesto20"+indexcount0).val();
    var labantibodysceentesto30 = $("#labantibodysceentesto30"+indexcount0).val();

    if(labantibodysceentestpimi0 > 1 || labantibodysceentesto10 > 1 || labantibodysceentesto20 > 1 || labantibodysceentesto30 > 1 ){
        // $("#labconfirmantibodysceentestid_0").val("11");
    }
    else{
        // $("#labconfirmantibodysceentestid_0").val("1");
        // confirmAntibodySceeningTestResult("1");
    }
    setResultAntibodySceen_posTable();
}

function setResultAntibodySceen_posTable()
{
    var v = 0;
    var rows = document.getElementById("list_table_anti_sceen_0").rows;
    for (var i = 1; i < rows.length; i++) {

            if(parseInt(rows[i].cells[2].children[0].value) > v)
            {
                v = parseInt(rows[i].cells[2].children[0].value);
            }
            
            if(parseInt(rows[i].cells[3].children[0].value) > v)
            {
                v = parseInt(rows[i].cells[3].children[0].value);
            }
            
            if(parseInt(rows[i].cells[4].children[0].value) > v)
            {
                v = parseInt(rows[i].cells[4].children[0].value);
            }
            
            if(parseInt(rows[i].cells[5].children[0].value) > v)
            {
                v = parseInt(rows[i].cells[5].children[0].value);
            }

    }

    $("#labconfirmantibodysceentestid_0").val(v);
    confirmAntibodySceeningTestResult(v);

    // if(neg && !pos)
    // {
    //     setDataModalSelectValue(`labconfirmantibodysceentestid_0`, 1, 'Negative');
    // }else
    // {
    //     setDataModalSelectValue(`labconfirmantibodysceentestid_0`, '', '');
    // }
  
}

function setResultAntibodySceen_pos2(indexcount0,self,col='',value=[])
{
    var labantibodysceentestgetmethodp1mi0 = $("#labantibodysceentestgetmethodp1mi0"+indexcount0).val();
    var labantibodysceentestgetmethodo10 = $("#labantibodysceentestgetmethodo10"+indexcount0).val();
    var labantibodysceentestgetmethodo20 = $("#labantibodysceentestgetmethodo20"+indexcount0).val();
    var labantibodysceentestgetmethodo30 = $("#labantibodysceentestgetmethodo30"+indexcount0).val();

    var labconfirmantibodysceentestgetmethodid_0 = $("#labconfirmantibodysceentestgetmethodid_0").val();

    console.log(self.value);

    if(self.value > labconfirmantibodysceentestgetmethodid_0){
        $("#labconfirmantibodysceentestgetmethodid_0").val(self.value);
    }
    
}


// Start AntiSceeningTest
var anticount0 = 0;
function addAntiSceeningTest0(value=[]) {

        if(value.length == 0)
        {
            value = {
                        labantibodysceentestid0:'',
                        labantibodysceentestpimi0:'',
                        labantibodysceentest0:'',
                        labantibodysceentestp1mi0:'',
                        labantibodysceentesto10 : '',
                        labantibodysceentesto20:'',
                        labantibodysceentesto30:'',
                        labantibodysceentestlotno0:''
                    };
            
        }
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest0'+anticount0+'" name="labantibodysceentest0'+anticount0+'" onchange="setLabAntibodySceenTest_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestpimi0'+anticount0+'" name="labantibodysceentestpimi0'+anticount0+'" onchange="setLabAntibodySceenTestP1Mi_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto10'+anticount0+'" name="labantibodysceentesto10'+anticount0+'" onchange="setLabAntibodySceenTestO1_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto20'+anticount0+'"  name="labantibodysceentesto20'+anticount0+'" onchange="setLabAntibodySceenTestO2_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto30'+anticount0+'"  name="labantibodysceentesto30'+anticount0+'" onchange="setLabAntibodySceenTestO3_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno0'+anticount0+'"  name="labantibodysceentestlotno0'+anticount0+'" value="'+value.labantibodysceentestlotno0+'" onkeyup="setLabAntibodySceenTestLotno_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+anticount0+'" value="'+anticount0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_0").append(event_data);

        setBloodAntiTest("#labantibodysceentest0"+anticount0,value.labantibodysceentest0);
        setABOTest0Serum("#labantibodysceentestpimi0"+anticount0,value.labantibodysceentestpimi0);
        setABOTest0Serum("#labantibodysceentesto10"+anticount0,value.labantibodysceentesto10);
        setABOTest0Serum("#labantibodysceentesto20"+anticount0,value.labantibodysceentesto20);
        setABOTest0Serum("#labantibodysceentesto30"+anticount0,value.labantibodysceentesto30);

        $("#labantibodysceentest0"+anticount0).val(value.labantibodysceentest0);
        $("#labantibodysceentestpimi0"+anticount0).val(value.labantibodysceentestpimi0);
        anticount0++;
}

function addAntiSceeningTest0_null(value=[]) {

        
        value = {
                        labantibodysceentestid0:'',
                        labantibodysceentestpimi0:'',
                        labantibodysceentest0:'13',
                        labantibodysceentestp1mi0:'',
                        labantibodysceentesto10 : '',
                        labantibodysceentesto20:'',
                        labantibodysceentesto30:'',
                        labantibodysceentestlotno0:''
                    };

        
            
        
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest0'+anticount0+'" name="labantibodysceentest0'+anticount0+'" onchange="setLabAntibodySceenTest_0(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestpimi0'+anticount0+'" name="labantibodysceentestpimi0'+anticount0+'" onchange="setLabAntibodySceenTestP1Mi_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto10'+anticount0+'" name="labantibodysceentesto10'+anticount0+'" onchange="setLabAntibodySceenTestO1_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto20'+anticount0+'"  name="labantibodysceentesto20'+anticount0+'" onchange="setLabAntibodySceenTestO2_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto30'+anticount0+'"  name="labantibodysceentesto30'+anticount0+'" onchange="setLabAntibodySceenTestO3_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno0'+anticount0+'"  name="labantibodysceentestlotno0'+anticount0+'" value="'+value.labantibodysceentestlotno0+'" onkeyup="setLabAntibodySceenTestLotno_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+anticount0+'" value="'+anticount0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';


        $("#list_table_anti_sceen_0").append(event_data);

        setBloodAntiTest("#labantibodysceentest0"+anticount0);

        $("#labantibodysceentest0"+anticount0).val("13");
        setABOTest0Serum("#labantibodysceentestpimi0"+anticount0,value.labantibodysceentestpimi0);
        setABOTest0Serum("#labantibodysceentesto10"+anticount0,value.labantibodysceentesto10);
        setABOTest0Serum("#labantibodysceentesto20"+anticount0,value.labantibodysceentesto20);
        setABOTest0Serum("#labantibodysceentesto30"+anticount0,value.labantibodysceentesto30);

        anticount0++;

        event_data = '';

        value = {
                        labantibodysceentestid0:'',
                        labantibodysceentestpimi0:'',
                        labantibodysceentest0:'6',
                        labantibodysceentestp1mi0:'',
                        labantibodysceentesto10 : '',
                        labantibodysceentesto20:'',
                        labantibodysceentesto30:'',
                        labantibodysceentestlotno0:''
                    };

        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest0'+anticount0+'" name="labantibodysceentest0'+anticount0+'" onchange="setLabAntibodySceenTest_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestpimi0'+anticount0+'" name="labantibodysceentestpimi0'+anticount0+'" onchange="setLabAntibodySceenTestP1Mi_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto10'+anticount0+'" name="labantibodysceentesto10'+anticount0+'" onchange="setLabAntibodySceenTestO1_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto20'+anticount0+'"  name="labantibodysceentesto20'+anticount0+'" onchange="setLabAntibodySceenTestO2_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto30'+anticount0+'"  name="labantibodysceentesto30'+anticount0+'" onchange="setLabAntibodySceenTestO3_0(this); setResultAntibodySceen_pos('+anticount0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno0'+anticount0+'"  name="labantibodysceentestlotno0'+anticount0+'" value="'+value.labantibodysceentestlotno0+'" onkeyup="setLabAntibodySceenTestLotno_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+anticount0+'" value="'+anticount0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_0").append(event_data);

        
        // setBloodAntiTest("#labantibodysceentest01");
        // $("#labantibodysceentest01").val("6");
        // setABOTest0Serum("#labantibodysceentestpimi01",value.labantibodysceentestpimi0);
        // setABOTest0Serum("#labantibodysceentesto101",value.labantibodysceentesto10);
        // setABOTest0Serum("#labantibodysceentesto201",value.labantibodysceentesto20);
        // setABOTest0Serum("#labantibodysceentesto301",value.labantibodysceentesto30);


        setBloodAntiTest("#labantibodysceentest0"+anticount0);

        $("#labantibodysceentest0"+anticount0).val("6");
        setABOTest0Serum("#labantibodysceentestpimi0"+anticount0,value.labantibodysceentestpimi0);
        setABOTest0Serum("#labantibodysceentesto10"+anticount0,value.labantibodysceentesto10);
        setABOTest0Serum("#labantibodysceentesto20"+anticount0,value.labantibodysceentesto20);
        setABOTest0Serum("#labantibodysceentesto30"+anticount0,value.labantibodysceentesto30);
        anticount0++;

}
// End AntiSceeningTest

// Start Antibody identification test
var idencount0 = 0;
function addAntibodyIdenTest0(value=[]) {

        if(value.length == 0)
        {
            value = {
                labantibodyidentificationtestid0:'',
                labantibodyidentificationtest0:'',
                labantibodyidentificationtest10:'',
                labantibodyidentificationtest20 : '',
                labantibodyidentificationtest30:'',
                labantibodyidentificationtest40:'',
                labantibodyidentificationtest50:'',
                labantibodyidentificationtest60:'',
                labantibodyidentificationtest70:'',
                labantibodyidentificationtest80:'',
                labantibodyidentificationtest90:'',
                labantibodyidentificationtest10:'',
                labantibodyidentificationtest11:'',
                labantibodyidentificationtestauto0:'',
                labantibodyidentificationtestlotno0:'',
            };
        }
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest0'+idencount0+'" name="labantibodyidentificationtest0'+idencount0+'"  onchange="setLabAntibodyIdentificationTest_0(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest10'+idencount0+'" name="labantibodyidentificationtest10'+idencount0+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest20'+idencount0+'" name="labantibodyidentificationtest20'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest30'+idencount0+'" name="labantibodyidentificationtest30'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest40'+idencount0+'" name="labantibodyidentificationtest40'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest50'+idencount0+'" name="labantibodyidentificationtest50'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest60'+idencount0+'" name="labantibodyidentificationtest60'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest70'+idencount0+'" name="labantibodyidentificationtest70'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest80'+idencount0+'" name="labantibodyidentificationtest80'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest90'+idencount0+'" name="labantibodyidentificationtest90'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest100'+idencount0+'" name="labantibodyidentificationtest100'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest110'+idencount0+'" name="labantibodyidentificationtest110'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto0'+idencount0+'" name="labantibodyidentificationtestauto0'+idencount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno0'+idencount0+'" value="'+value.labantibodyidentificationtestlotno0+'" name="labantibodyidentificationtestlotno0'+idencount0+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_0(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+idencount0+'" value="'+idencount0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_iden_0").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtest0"+idencount0,value.labantibodyidentificationtest0);
        setABOTest0Serum("#labantibodyidentificationtest10"+idencount0,value.labantibodyidentificationtest10);
        setABOTest0Serum("#labantibodyidentificationtest20"+idencount0,value.labantibodyidentificationtest20);
        setABOTest0Serum("#labantibodyidentificationtest30"+idencount0,value.labantibodyidentificationtest30);
        setABOTest0Serum("#labantibodyidentificationtest40"+idencount0,value.labantibodyidentificationtest40);
        setABOTest0Serum("#labantibodyidentificationtest50"+idencount0,value.labantibodyidentificationtest50);
        setABOTest0Serum("#labantibodyidentificationtest60"+idencount0,value.labantibodyidentificationtest60);
        setABOTest0Serum("#labantibodyidentificationtest70"+idencount0,value.labantibodyidentificationtest70);
        setABOTest0Serum("#labantibodyidentificationtest80"+idencount0,value.labantibodyidentificationtest80);
        setABOTest0Serum("#labantibodyidentificationtest90"+idencount0,value.labantibodyidentificationtest90);
        setABOTest0Serum("#labantibodyidentificationtest100"+idencount0,value.labantibodyidentificationtest100);
        setABOTest0Serum("#labantibodyidentificationtest110"+idencount0,value.labantibodyidentificationtest110);
        setABOTest0Serum("#labantibodyidentificationtestauto0"+idencount0,value.labantibodyidentificationtestauto0);

        $("#labantibodyidentificationtest0"+idencount0).val(value.labantibodyidentificationtest0);
        $("#labantibodyidentificationtest10"+idencount0).val(value.labantibodyidentificationtest10);
        $("#labantibodyidentificationtest20"+idencount0).val(value.labantibodyidentificationtest20);
        $("#labantibodyidentificationtest30"+idencount0).val(value.labantibodyidentificationtest30);
        $("#labantibodyidentificationtest40"+idencount0).val(value.labantibodyidentificationtest40);
        $("#labantibodyidentificationtest50"+idencount0).val(value.labantibodyidentificationtest50);
        $("#labantibodyidentificationtest60"+idencount0).val(value.labantibodyidentificationtest60);
        $("#labantibodyidentificationtest70"+idencount0).val(value.labantibodyidentificationtest70);
        $("#labantibodyidentificationtest80"+idencount0).val(value.labantibodyidentificationtest80);
        $("#labantibodyidentificationtest90"+idencount0).val(value.labantibodyidentificationtest90);
        $("#labantibodyidentificationtest100"+idencount0).val(value.labantibodyidentificationtest100);
        $("#labantibodyidentificationtest110"+idencount0).val(value.labantibodyidentificationtest110);
        $("#labantibodyidentificationtestauto0"+idencount0).val(value.labantibodyidentificationtestauto0);
    
        idencount0++;
  }
// End Antibody identification test

// Start Saliva test
var salivacount = 0;
function addSalivaTest0(value=[]) {
                      
    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table"  style="display:none;" >';
    event_data += JSON.stringify(value);
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += value.labsalivatest0;
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatestacells0'+salivacount+'" name="labsalivatestacells0'+salivacount+'" onchange="setLabSalivatestACells_0(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatestbcells0'+salivacount+'" name="labsalivatestbcells0'+salivacount+'" onchange="setLabSalivatestBCells_0(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatesotcells0'+salivacount+'" name="labsalivatesotcells0'+salivacount+'" onchange="setLabSalivatestOCells_0(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '</tr>';
    
    $("#list_table_saliva_0").append(event_data);

    setABOTest0Serum("#labsalivatestacells0"+salivacount,value.labsalivatestacells0);
    setABOTest0Serum("#labsalivatestbcells0"+salivacount,value.labsalivatestbcells0);
    setABOTest0Serum("#labsalivatesotcells0"+salivacount,value.labsalivatesotcells0);

    $("#labsalivatestacells0"+salivacount).val(value.labsalivatestacells0);
    $("#labsalivatestbcells0"+salivacount).val(value.labsalivatestbcells0);
    $("#labsalivatesotcells0"+salivacount).val(value.labsalivatesotcells0);

    salivacount++;
}
// End Saliva test


// Start Titration
var titrationcount0 = 0;
function addTitration0(value=[]) {

        if(value.length == 0)
        {
            value = {
                labtitrationid0:'',
                labtitrationantiserum0:'',
                labtitrationcell0:'',
                labtitration10 : '',
                labtitration20:'',
                labtitration40:'',
                labtitration80:'',
                labtitration160:'',
                labtitration320:'',
                labtitration640:'',
                labtitration1280:'',
                labtitration2560:'',
                labtitration5120:'',
                labtitration10240:'',
                labtitration20480:'',
                labtitrationtiter0:''
            };
        }

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labtitrationantiserum0'+titrationcount0+'" name="labtitrationantiserum0'+titrationcount0+'"  onkeyup="setLabTitrationAntiSerum_0(this)" class="form-control">';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<input id="labtitrationcell0'+titrationcount0+'" name="labtitrationcell0'+titrationcount0+'"  onkeyup="setLabTitrationCell_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration10'+titrationcount0+'" name="labtitration10'+titrationcount0+'" class="form-control" onchange="setLabTitration1_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration20'+titrationcount0+'" name="labtitration20'+titrationcount0+'" class="form-control" onchange="setLabTitration2_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration40'+titrationcount0+'" name="labtitration40'+titrationcount0+'" class="form-control" onchange="setLabTitration4_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration80'+titrationcount0+'" name="labtitration80'+titrationcount0+'" class="form-control" onchange="setLabTitration8_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration160'+titrationcount0+'" name="labtitration160'+titrationcount0+'" class="form-control" onchange="setLabTitration16_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration320'+titrationcount0+'" name="labtitration320'+titrationcount0+'" class="form-control" onchange="setLabTitration32_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration640'+titrationcount0+'" name="labtitration640'+titrationcount0+'" class="form-control" onchange="setLabTitration64_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration1280'+titrationcount0+'" name="labtitration1280'+titrationcount0+'" class="form-control" onchange="setLabTitration128_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration25600'+titrationcount0+'" name="labtitration25600'+titrationcount0+'" class="form-control" onchange="setLabTitration256_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration51200'+titrationcount0+'" name="labtitration51200'+titrationcount0+'" class="form-control" onchange="setLabTitration512_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration10240'+titrationcount0+'" name="labtitration10240'+titrationcount0+'" class="form-control" onchange="setLabTitration1024_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration20480'+titrationcount0+'" name="labtitration20480'+titrationcount0+'" class="form-control" onchange="setLabTitration2048_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitrationtiter0'+titrationcount0+'" name="labtitrationtiter0'+titrationcount0+'" class="form-control" onchange="setLabTitrationTiter0(this); setcomfirmtitration0(this);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+titrationcount0+'" value="'+titrationcount0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_titration_0").append(event_data);

        setBloodAntiTest("#labtitrationantiserum0"+titrationcount0,value.labtitrationantiserum0);
        setABOTest0Serum("#labtitrationcell0"+titrationcount0,value.labtitrationcell0);
        setABOTest0Serum("#labtitration10"+titrationcount0,value.labtitration10);
        setABOTest0Serum("#labtitration20"+titrationcount0,value.labtitration20);
        setABOTest0Serum("#labtitration40"+titrationcount0,value.labtitration40);
        setABOTest0Serum("#labtitration80"+titrationcount0,value.labtitration80);
        setABOTest0Serum("#labtitration160"+titrationcount0,value.labtitration160);
        setABOTest0Serum("#labtitration320"+titrationcount0,value.labtitration320);
        setABOTest0Serum("#labtitration640"+titrationcount0,value.labtitration640);
        setABOTest0Serum("#labtitration1280"+titrationcount0,value.labtitration1280);
        setABOTest0Serum("#labtitration25600"+titrationcount0,value.labtitration25600);
        setABOTest0Serum("#labtitration51200"+titrationcount0,value.labtitration51200);
        setABOTest0Serum("#labtitration10240"+titrationcount0,value.labtitration10240);
        setABOTest0Serum("#labtitration20480"+titrationcount0,value.labtitration20480);
        // setRh2("#labtitrationtiter0"+titrationcount0,value.labtitrationtiter0);
        settritation("#labtitrationtiter0"+titrationcount0,value.labtitrationtiter0);

        $("#labtitrationantiserum0"+titrationcount0).val(value.labtitrationantiserum0);
        $("#labtitrationcell0"+titrationcount0).val(value.labtitrationcell0);
        $("#labtitration10"+titrationcount0).val(value.labtitration10);
        $("#labtitration20"+titrationcount0).val(value.labtitration20);
        $("#labtitration40"+titrationcount0).val(value.labtitration40);
        $("#labtitration80"+titrationcount0).val(value.labtitration80);
        $("#labtitration160"+titrationcount0).val(value.labtitration160);
        $("#labtitration320"+titrationcount0).val(value.labtitration320);
        $("#labtitration640"+titrationcount0).val(value.labtitration640);
        $("#labtitration1280"+titrationcount0).val(value.labtitration1280);//////
        $("#labtitration25600"+titrationcount0).val(value.labtitration2560);
        $("#labtitration51200"+titrationcount0).val(value.labtitration5120);
        $("#labtitration10240"+titrationcount0).val(value.labtitration10240);
        $("#labtitration20480"+titrationcount0).val(value.labtitration20480);
        $("#labtitrationtiter0"+titrationcount0).val(value.labtitrationtiter0);
    
        titrationcount0++;
  }

  function setcomfirmtitration0(self){
      var result = self.value;
      $("#labconfirmtitrationid_0").val(self.value);

      var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationtiter0 = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    confirmTitrationResult1(result);

    console.log(self.value);
  }
// End Titration

// Start Titration
var coldagglutinincount = 0;
function addColdAgglutinin0(value=[]) {

        if(value.length == 0)
        {
            value = {
                labcoldagglutininid0:'',
                labcoldagglutinino0:'',
                labcoldagglutinintime0:'',
                labcoldagglutinin10 : '',
                labcoldagglutinin20:'',
                labcoldagglutinin40:'',
                labcoldagglutinin80:'',
                labcoldagglutinin160:'',
                labcoldagglutinin320:'',
                labcoldagglutinin640:'',
                labcoldagglutinin1280:'',
                labcoldagglutinin2560:'',
                labcoldagglutinin5120:'',
                labcoldagglutinin10240:'',
                labcoldagglutinin20480:'',
                labcoldagglutinintiter0:''
            };
        }

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += value.labcoldagglutinino0;
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += value.labcoldagglutinintime0;
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin10'+coldagglutinincount+'" name="labcoldagglutinin10'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin1_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin20'+coldagglutinincount+'" name="labcoldagglutinin20'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin2_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin40'+coldagglutinincount+'" name="labcoldagglutinin40'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin4_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin80'+coldagglutinincount+'" name="labcoldagglutinin80'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin8_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin160'+coldagglutinincount+'" name="labcoldagglutinin160'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin16_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin320'+coldagglutinincount+'" name="labcoldagglutinin320'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin32_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin640'+coldagglutinincount+'" name="labcoldagglutinin640'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin64_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin1280'+coldagglutinincount+'" name="labcoldagglutinin1280'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin128_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin25600'+coldagglutinincount+'" name="labcoldagglutinin25600'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin256_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin51200'+coldagglutinincount+'" name="labcoldagglutinin51200'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin512_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin10240'+coldagglutinincount+'" name="labcoldagglutinin10240'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin1024_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin20480'+coldagglutinincount+'" name="labcoldagglutinin20480'+coldagglutinincount+'" class="form-control" onchange="setLabColdAgglutinin2048_0(this)"></select>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_coldagglutinin_0").append(event_data);

        setABOTest0Serum("#labcoldagglutinin10"+coldagglutinincount,value.labcoldagglutinin10);
        setABOTest0Serum("#labcoldagglutinin20"+coldagglutinincount,value.labcoldagglutinin20);
        setABOTest0Serum("#labcoldagglutinin40"+coldagglutinincount,value.labcoldagglutinin40);
        setABOTest0Serum("#labcoldagglutinin80"+coldagglutinincount,value.labcoldagglutinin80);
        setABOTest0Serum("#labcoldagglutinin160"+coldagglutinincount,value.labcoldagglutinin160);
        setABOTest0Serum("#labcoldagglutinin320"+coldagglutinincount,value.labcoldagglutinin320);
        setABOTest0Serum("#labcoldagglutinin640"+coldagglutinincount,value.labcoldagglutinin640);
        setABOTest0Serum("#labcoldagglutinin1280"+coldagglutinincount,value.labcoldagglutinin1280);
        setABOTest0Serum("#labcoldagglutinin25600"+coldagglutinincount,value.labcoldagglutinin25600);
        setABOTest0Serum("#labcoldagglutinin51200"+coldagglutinincount,value.labcoldagglutinin51200);
        setABOTest0Serum("#labcoldagglutinin10240"+coldagglutinincount,value.labcoldagglutinin10240);
        setABOTest0Serum("#labcoldagglutinin20480"+coldagglutinincount,value.labcoldagglutinin20480);

        
        $("#labcoldagglutinin10"+coldagglutinincount).val(value.labcoldagglutinin10);
        $("#labcoldagglutinin20"+coldagglutinincount).val(value.labcoldagglutinin20);
        $("#labcoldagglutinin40"+coldagglutinincount).val(value.labcoldagglutinin40);
        $("#labcoldagglutinin80"+coldagglutinincount).val(value.labcoldagglutinin80);
        $("#labcoldagglutinin160"+coldagglutinincount).val(value.labcoldagglutinin160);
        $("#labcoldagglutinin320"+coldagglutinincount).val(value.labcoldagglutinin320);
        $("#labcoldagglutinin640"+coldagglutinincount).val(value.labcoldagglutinin640);
        $("#labcoldagglutinin1280"+coldagglutinincount).val(value.labcoldagglutinin1280);
        $("#labcoldagglutinin25600"+coldagglutinincount).val(value.labcoldagglutinin25600);
        $("#labcoldagglutinin51200"+coldagglutinincount).val(value.labcoldagglutinin51200);
        $("#labcoldagglutinin10240"+coldagglutinincount).val(value.labcoldagglutinin10240);
        $("#labcoldagglutinin20480"+coldagglutinincount).val(value.labcoldagglutinin20480);
    
        coldagglutinincount++;
  }
// End Titration


// Start Antibody identification test Get Method
var idengetmethodcount0 = 0;
function addAntibodyIdenTestGetMethod0(value=[]) {

        if(value.length == 0)
        {
            value = {
                labantibodyidentificationtestgetmethodid0:'',
                labantibodyidentificationtestgetmethod0:'',
                labantibodyidentificationtestgetmethod10:'',
                labantibodyidentificationtestgetmethod20 : '',
                labantibodyidentificationtestgetmethod30:'',
                labantibodyidentificationtestgetmethod40:'',
                labantibodyidentificationtestgetmethod50:'',
                labantibodyidentificationtestgetmethod60:'',
                labantibodyidentificationtestgetmethod70:'',
                labantibodyidentificationtestgetmethod80:'',
                labantibodyidentificationtestgetmethod90:'',
                labantibodyidentificationtestgetmethod10:'',
                labantibodyidentificationtestgetmethod11:'',
                labantibodyidentificationtestgetmethodauto0:'',
                labantibodyidentificationtestgetmethodantibody0:'',
                labantibodyidentificationtestgetmethodlotno0:'',
            };
        }
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtestgetmethod0'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod0'+idengetmethodcount0+'"  onchange="setLabAntibodyIdentificationTestGetMethod_0(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod10'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod10'+idengetmethodcount0+'"  class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod1_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod20'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod20'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod2_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod30'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod30'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod3_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod40'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod40'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod4_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod50'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod50'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod5_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod60'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod60'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod6_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod70'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod70'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod7_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod80'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod80'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod8_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod90'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod90'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod9_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod100'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod100'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod10_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod110'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethod110'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod11_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethodauto0'+idengetmethodcount0+'" name="labantibodyidentificationtestgetmethodauto0'+idengetmethodcount0+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethodAuto_0(this)"></select>';
        event_data += '</td>';
        event_data += '<td hidden class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestgetmethodantibody0'+idengetmethodcount0+'" value="'+value.labantibodyidentificationtestgetmethodantibody0+'" name="labantibodyidentificationtestgetmethodantibody0'+idengetmethodcount0+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestGetMethodAntibody_0(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestgetmethodlotno0'+idengetmethodcount0+'" value="'+value.labantibodyidentificationtestgetmethodlotno0+'" name="labantibodyidentificationtestgetmethodlotno0'+idengetmethodcount0+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestGetMethodLotno_0(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+idengetmethodcount0+'" value="'+idengetmethodcount0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_iden_get_method_0").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtestgetmethod0"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod0);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod10"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod10);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod20"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod20);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod30"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod30);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod40"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod40);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod50"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod50);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod60"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod60);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod70"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod70);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod80"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod80);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod90"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod90);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod100"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod100);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod110"+idengetmethodcount0,value.labantibodyidentificationtestgetmethod110);
        setABOTest0Serum("#labantibodyidentificationtestgetmethodauto0"+idengetmethodcount0,value.labantibodyidentificationtestgetmethodauto0);

        $("#labantibodyidentificationtestgetmethod0"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod0);
        $("#labantibodyidentificationtestgetmethod10"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod10);
        $("#labantibodyidentificationtestgetmethod20"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod20);
        $("#labantibodyidentificationtestgetmethod30"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod30);
        $("#labantibodyidentificationtestgetmethod40"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod40);
        $("#labantibodyidentificationtestgetmethod50"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod50);
        $("#labantibodyidentificationtestgetmethod60"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod60);
        $("#labantibodyidentificationtestgetmethod70"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod70);
        $("#labantibodyidentificationtestgetmethod80"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod80);
        $("#labantibodyidentificationtestgetmethod90"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod90);
        $("#labantibodyidentificationtestgetmethod100"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod100);
        $("#labantibodyidentificationtestgetmethod110"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethod110);
        $("#labantibodyidentificationtestgetmethodauto0"+idengetmethodcount0).val(value.labantibodyidentificationtestgetmethodauto0);
    
        idengetmethodcount0++;
  }
// End Antibody identification test Get Method


// Start AntiSceeningTest Get Method
var anticountgetmethod0 = 0;
function addAntiSceeningTestGetMethod0(value=[]) {

        if(value.length == 0)
        {
            value = {
                        labantibodysceentestgetmethodid0:'',
                        labantibodysceentestgetmethodtest0:'',
                        labantibodysceentestgetmethodp1mi0:'',
                        labantibodysceentestgetmethodo10 : '',
                        labantibodysceentestgetmethodo20:'',
                        labantibodysceentestgetmethodo30:'',
                        labantibodysceentestgetmethodenz0:'',
                        labantibodysceentestgetmethodlotno0:''
                    };
            
        }
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodtest0'+anticountgetmethod0+'" name="labantibodysceentestgetmethodtest0'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethod_0(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodp1mi0'+anticountgetmethod0+'" name="labantibodysceentestgetmethodp1mi0'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodP1ma_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo10'+anticountgetmethod0+'" name="labantibodysceentestgetmethodo10'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodO1_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo20'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodo20'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodO2_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo30'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodo30'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodO3_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodenz0'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodenz0'+anticountgetmethod0+'" value="'+value.labantibodysceentestgetmethodenz0+'" onkeyup="setLabAntibodySceenTestGetMethodEnz0_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodlotno0'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodlotno0'+anticountgetmethod0+'" value="'+value.labantibodysceentestgetmethodlotno0+'" onkeyup="setLabAntibodySceenTestGetMethodLotno_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+anticountgetmethod0+'" value="'+anticountgetmethod0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_get_method_0").append(event_data);

        setBloodAntiTest("#labantibodysceentestgetmethodtest0"+anticountgetmethod0,value.labantibodysceentestgetmethodtest0);
        setABOTest0Serum("#labantibodysceentestgetmethodp1mi0"+anticountgetmethod0,value.labantibodysceentestgetmethodp1mi0);
        setABOTest0Serum("#labantibodysceentestgetmethodo10"+anticountgetmethod0,value.labantibodysceentestgetmethodo10);
        setABOTest0Serum("#labantibodysceentestgetmethodo20"+anticountgetmethod0,value.labantibodysceentestgetmethodo20);
        setABOTest0Serum("#labantibodysceentestgetmethodo30"+anticountgetmethod0,value.labantibodysceentestgetmethodo30);

        $("#labantibodysceentestgetmethodtest0"+anticountgetmethod0).val(value.labantibodysceentestgetmethodtest0);
        $("#labantibodysceentestgetmethodp1mi0"+anticountgetmethod0).val(value.labantibodysceentestgetmethodp1mi0);
        $("#labantibodysceentestgetmethodo10"+anticountgetmethod0).val(value.labantibodysceentestgetmethodo10);
        $("#labantibodysceentestgetmethodo20"+anticountgetmethod0).val(value.labantibodysceentestgetmethodo20);
        $("#labantibodysceentestgetmethodo30"+anticountgetmethod0).val(value.labantibodysceentestgetmethodo30);
        anticountgetmethod0++;
}
// End AntiSceeningTest Get Method
function addAntiSceeningTestGetMethod0_null(value=[]) {

        
            value = {
                        labantibodysceentestgetmethodid0:'',
                        labantibodysceentestgetmethodtest0:'13',
                        labantibodysceentestgetmethodp1mi0:'',
                        labantibodysceentestgetmethodo10 : '',
                        labantibodysceentestgetmethodo20:'',
                        labantibodysceentestgetmethodo30:'',
                        labantibodysceentestgetmethodenz0:'',
                        labantibodysceentestgetmethodlotno0:''
                    };

            					
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodtest0'+anticountgetmethod0+'" name="labantibodysceentestgetmethodtest0'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethod_0(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodp1mi0'+anticountgetmethod0+'" name="labantibodysceentestgetmethodp1mi0'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodP1ma_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo10'+anticountgetmethod0+'" name="labantibodysceentestgetmethodo10'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodO1_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo20'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodo20'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodO2_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo30'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodo30'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodO3_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodenz0'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodenz0'+anticountgetmethod0+'" value="'+value.labantibodysceentestgetmethodenz0+'" onkeyup="setLabAntibodySceenTestGetMethodEnz0_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodlotno0'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodlotno0'+anticountgetmethod0+'" value="'+value.labantibodysceentestgetmethodlotno0+'" onkeyup="setLabAntibodySceenTestGetMethodLotno_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+anticountgetmethod0+'" value="'+anticountgetmethod0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        $("#list_table_anti_sceen_get_method_0").append(event_data);

        setBloodAntiTest("#labantibodysceentestgetmethodtest0"+anticountgetmethod0);
        setABOTest0Serum("#labantibodysceentestgetmethodp1mi0"+anticountgetmethod0);
        setABOTest0Serum("#labantibodysceentestgetmethodo10"+anticountgetmethod0);
        setABOTest0Serum("#labantibodysceentestgetmethodo20"+anticountgetmethod0);
        setABOTest0Serum("#labantibodysceentestgetmethodo30"+anticountgetmethod0);

        $("#labantibodysceentestgetmethodtest0"+anticountgetmethod0).val("13");

        event_data = '';


        anticountgetmethod0++;
        ///////////////////////////////////////////////////////////////////////

        value = {
                        labantibodysceentestgetmethodid0:'',
                        labantibodysceentestgetmethodtest0:'6',
                        labantibodysceentestgetmethodp1mi0:'',
                        labantibodysceentestgetmethodo10 : '',
                        labantibodysceentestgetmethodo20:'',
                        labantibodysceentestgetmethodo30:'',
                        labantibodysceentestgetmethodenz0:'',
                        labantibodysceentestgetmethodlotno0:''
                    };

        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodtest0'+anticountgetmethod0+'" name="labantibodysceentestgetmethodtest0'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethod_0(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodp1mi0'+anticountgetmethod0+'" name="labantibodysceentestgetmethodp1mi0'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodP1ma_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo10'+anticountgetmethod0+'" name="labantibodysceentestgetmethodo10'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodO1_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo20'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodo20'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodO2_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo30'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodo30'+anticountgetmethod0+'" onchange="setLabAntibodySceenTestGetMethodO3_0(this); setResultAntibodySceen_pos2('+anticountgetmethod0+',this,3);" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodenz0'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodenz0'+anticountgetmethod0+'" value="'+value.labantibodysceentestgetmethodenz0+'" onkeyup="setLabAntibodySceenTestGetMethodEnz0_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodlotno0'+anticountgetmethod0+'"  name="labantibodysceentestgetmethodlotno0'+anticountgetmethod0+'" value="'+value.labantibodysceentestgetmethodlotno0+'" onkeyup="setLabAntibodySceenTestGetMethodLotno_0(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid0'+anticountgetmethod0+'" value="'+anticountgetmethod0+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_get_method_0").append(event_data);

        setBloodAntiTest("#labantibodysceentestgetmethodtest0"+anticountgetmethod0);
        setABOTest0Serum("#labantibodysceentestgetmethodp1mi0"+anticountgetmethod0);
        setABOTest0Serum("#labantibodysceentestgetmethodo10"+anticountgetmethod0);
        setABOTest0Serum("#labantibodysceentestgetmethodo20"+anticountgetmethod0);
        setABOTest0Serum("#labantibodysceentestgetmethodo30"+anticountgetmethod0);

        $("#labantibodysceentestgetmethodtest0"+anticountgetmethod0).val("6");

        anticountgetmethod0++;
}

function setModallabconfirmantibodyidentificationtest_0(val){
    var antibody = val.split(",");

    // alert(antibody.length);

    for (i = 0; i < antibody.length; i++) {
        // alert(antibody[i]+"_labconfirmantibodyidentificationtest_0");
        try {
        document.getElementById(antibody[i]+"_labconfirmantibodyidentificationtest_0").checked = true;
        
        }
        catch(err) {
        console.log('err_anti____'+i);
        }
        // alert(antibody[i]);
    }
}

function setModalantibodyidentificationtestTubeMethod0(val){
    var antibody = val.split(",");

    for (i = 0; i < antibody.length; i++) {
        // alert(antibody[i]);
        try {
        document.getElementById(antibody[i]+"_antibodyidentificationtestTubeMethod0").checked = true;
        }
        catch(err) {
        console.log('err');
        }
        // document.getElementById(antibody[i]+"_antibodyidentificationtestTubeMethod0").checked = true;
    }
}

// function setModalantibody0(val){
//     var antibody = val.split(",");

//     for (i = 0; i < antibody.length; i++) {
//         // alert(antibody[i]);
//         document.getElementById(antibody[i]+"_antibody0").checked = true;
//     }
// }

// function setModalphenotype0(val){
//     var antibody = val.split(",");

//     for (i = 0; i < antibody.length; i++) {
//         // alert(antibody[i]);
//         document.getElementById(antibody[i]+"_phenotype0").checked = true;
//     }
// }
