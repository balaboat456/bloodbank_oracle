// Start Set Data Tab 2
function setValueItemTab2(data)
{
    $("#adsorption2").val(data.adsorption2);
    $("#elution2").val(data.elution2);
    $("#labremark2").val(data.labremark2);

    // Phenotype
    document.getElementById('antibody2').value = data.antibody2;
    document.getElementById('antibodyLable2').innerHTML = data.antibody2;
    
    document.getElementById('phenotype2').value = data.phenotype2;
    document.getElementById('phenotypedisplay2').value = data.phenotypedisplay2;
    document.getElementById('phenotypeLable2').innerHTML = data.phenotypedisplay2;

    // ABO
    removeRowTable('list_table_abo_2');
    $.each(data.lab_abo_item_2, function (index, value) {
        addABOTest2(value);
    });
    if(data.lab_abo_item_2 == ''){
        addABOTest2();
    }
    setBloodGroup("#labconfirmbloodgroupid_2");
    $("#labconfirmbloodgroupid_2").val(data.labconfirmbloodgroupid_2);

    setABOTest0Serum("#labantia1_2");
    setABOTest0Serum("#labantih_2");
    setABOTest0Serum("#laba2cells_2");
    $("#labantia1_2").val(data.labantia1_2);
    $("#labantih_2").val(data.labantih_2);
    $("#laba2cells_2").val(data.laba2cells_2);

    // Rh
    removeRowTable('list_table_rh_2');
    $.each(data.lab_rh_item_2, function (index, value) {
        addRhTest2(value);
    });
    if(data.lab_rh_item_2 == ''){
        addRhTest2();
    }
    setRh2("#labconfirmrhid_2");
    $("#labconfirmrhid_2").val(data.labconfirmrhid_2);

    // Antibody Sceening test    
    removeRowTable('list_table_anti_sceen_2');
    $.each(data.lab_antibodysceentest_item_2, function (index, value) {
        addAntiSceeningTest2(value);
    });
    if(data.lab_antibodysceentest_item_2 == ''){
        addAntiSceeningTest2_null();
    }
    setBloodGroupSerum("#labconfirmantibodysceentestid_2",data.labconfirmantibodysceentestid_2);
    $("#labconfirmantibodysceentestid_2").val(data.labconfirmantibodysceentestid_2);

    // DAT
    setABOTest0Serum("#lab_dat_poly_2");
    setABOTest0Serum("#lab_dat_igg_2");
    setABOTest0Serum("#lab_dat_c3d_2");
    setABOTest0Serum("#lab_dat_ccc_2");
    $("#lab_dat_poly_2").val(data.lab_dat_poly_2);
    $("#lab_dat_igg_2").val(data.lab_dat_igg_2);
    $("#lab_dat_c3d_2").val(data.lab_dat_c3d_2);
    $("#lab_dat_ccc_2").val(data.lab_dat_ccc_2);

    // Antibody identification test
    removeRowTable('list_table_anti_iden_2');
    $.each(data.lab_antibodyidentificationtest_item_2, function (index, value) {
        addAntibodyIdenTest2(value);
    });
    if(data.lab_antibodyidentificationtest_item_2 == ''){
        addAntibodyIdenTest2_null();
    }

    //  Rh typing
    document.getElementById("lab_rhtype_d_2+").checked = (data.lab_rhtype_d_2 == '+')
    document.getElementById("lab_rhtype_d_2-").checked = (data.lab_rhtype_d_2 == '-')

    document.getElementById("lab_rhtype_c_2+").checked = (data.lab_rhtype_c_2 == '+')
    document.getElementById("lab_rhtype_c_2-").checked = (data.lab_rhtype_c_2 == '-')

    document.getElementById("lab_rhtype_e_2+").checked = (data.lab_rhtype_e_2 == '+')
    document.getElementById("lab_rhtype_e_2-").checked = (data.lab_rhtype_e_2 == '-')

    document.getElementById("lab_rhtype_c2_2+").checked = (data.lab_rhtype_c2_2 == '+')
    document.getElementById("lab_rhtype_c2_2-").checked = (data.lab_rhtype_c2_2 == '-')

    document.getElementById("lab_rhtype_e2_2+").checked = (data.lab_rhtype_e2_2 == '+')
    document.getElementById("lab_rhtype_e2_2-").checked = (data.lab_rhtype_e2_2 == '-')

    setRh2("#lab_rhtype_result_id_2");
    $("#lab_rhtype_result_id_2").val(data.lab_rhtype_result_id_2);

    // Saliva
    removeRowTable('list_table_saliva_2');

    if(data.lab_salivatest_item_2.length == 0)
    {
        data.lab_salivatest_item_2 = [
                                        {
                                            labsalivatestid2:'',
                                            labsalivatest2:"RT 5-60`",
                                            labsalivatestacells2:'',
                                            labsalivatestbcells2 : '',
                                            labsalivatesotcells2:''
                                        },
                                        {
                                            labsalivatestid2:'',
                                            labsalivatest2:'Control gr.A',
                                            labsalivatestacells2:'',
                                            labsalivatestbcells2 : '',
                                            labsalivatesotcells2:''
                                        },
                                        {
                                            labsalivatestid2:'',
                                            labsalivatest2:'Control gr.B',
                                            labsalivatestacells2:'',
                                            labsalivatestbcells2 : '',
                                            labsalivatesotcells2:''
                                        },
                                        {
                                            labsalivatestid2:'',
                                            labsalivatest2:'Control gr.AB',
                                            labsalivatestacells2:'',
                                            labsalivatestbcells2 : '',
                                            labsalivatesotcells2:''
                                        },
                                        {
                                            labsalivatestid2:'',
                                            labsalivatest2:'Control gr.O',
                                            labsalivatestacells2:'',
                                            labsalivatestbcells2 : '',
                                            labsalivatesotcells2:''
                                        }
                                    ];
    }

    $.each(data.lab_salivatest_item_2, function (index, value) {
        addSalivaTest2(value);
    });

    setBloodGroup("#labconfirmsalivaid_2");
    $("#labconfirmsalivaid_2").val(data.labconfirmsalivaid_2);

    // Titration 
    removeRowTable('list_table_titration_2');
    $.each(data.lab_titration_item_2, function (index, value) {
        addTitration2(value);
    });

    setRh2("#labconfirmtitrationid_2");
    $("#labconfirmtitrationid_2").val(data.labconfirmtitrationid_2);


    //    Cold agglutinin
    removeRowTable('list_table_coldagglutinin_2');

    if(data.lab_coldagglutinin_item_2.length == 0)
    {
        var aRRpush = [];

        aRRpush.push(objColdAgglutinin2('O1','2 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin2('O1','24 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin2('O2','4 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin2('O2','24 ชั่วโมง'));

        data.lab_coldagglutinin_item_2 = aRRpush ;
    }

    $.each(data.lab_coldagglutinin_item_2, function (index, value) {
        addColdAgglutinin2(value);
    });

    setRh2("#labconfirmcoldagglutininid_2");
    $("#labconfirmcoldagglutininid_2").val(data.labconfirmcoldagglutininid_2);

    // Antibody identification test Get Method
    removeRowTable('list_table_anti_iden_get_method_2');
    $.each(data.lab_antibodyidentificationtestgetmethod_item_2, function (index, value) {
        addAntibodyIdenTestGetMethod2(value);
    });

    // Antibody Sceening test Get Method   
    removeRowTable('list_table_anti_sceen_get_method_2');
    $.each(data.lab_antibodysceentestgetmethod_item_2, function (index, value) {
        addAntiSceeningTestGetMethod2(value);
    });
    setRh3("#labconfirmantibodysceentestgetmethodid_2",data.labconfirmantibodysceentestgetmethodid_2);
    $("#labconfirmantibodysceentestgetmethodid_2").val(data.labconfirmantibodysceentestgetmethodid_2);



}

function objColdAgglutinin2(O='',time='')
{
    var obj =   {
                    labcoldagglutininid2:'',
                    labcoldagglutinincode2:'',
                    labcoldagglutinino2:O,
                    labcoldagglutinintime2:time,
                    labcoldagglutinin12:'',
                    labcoldagglutinin22:'',
                    labcoldagglutinin42:'',
                    labcoldagglutinin82:'',
                    labcoldagglutinin162:'',
                    labcoldagglutinin322:'',
                    labcoldagglutinin642:'',
                    labcoldagglutinin1282:'',
                    labcoldagglutinin2562:'',
                    labcoldagglutinin5122:'',
                    labcoldagglutinin10242:'',
                    labcoldagglutinin20482:''
                };
            
    return obj;
}

// End Set Data Tab 2

// Start ABO
var abocount2 = 0;
function addABOTest2(value=[]) {

    var table = document.getElementById("list_table_abo_2").rows.length;

    if(table == 2){
        if(value.length == 0)
        {
            value = {
                        labreagent2:'CAT',
                        lababoid2:'',
                        lababocode2:'',
                        lababoantia2:'',
                        lababoantib2:'',
                        lababoantiab2: '',
                        lababoacells2:'',
                        lababobcells2:'',
                        lababoocells2:'',
                        lababobloodgroup2:''
                    };
        
        }
    }
    else{
        if(value.length == 0)
        {
            value = {
                        labreagent2:'',
                        lababoid2:'',
                        lababocode2:'',
                        lababoantia2:'',
                        lababoantib2:'',
                        lababoantiab2: '',
                        lababoacells2:'',
                        lababobcells2:'',
                        lababoocells2:'',
                        lababobloodgroup2:''
                    };
        
        }
    }

    
                      
    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table"  style="display:none;" >';
    event_data += JSON.stringify(value);
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<input type="text" id="labreagent2'+abocount2+'" value="'+value.labreagent2+'" name="labreagent2'+abocount2+'" onkeyup="setLabBloodReagent_2(this)" class="form-control">';
    
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="lababoantia2'+abocount2+'" name="lababoantia2'+abocount2+'" onchange="autoBlood2('+abocount2+',this,1)"  class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="lababoantib2'+abocount2+'" name="lababoantib2'+abocount2+'" onchange="autoBlood2('+abocount2+',this,2)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="lababoantiab2'+abocount2+'" name="lababoantiab2'+abocount2+'" onchange="autoBlood2('+abocount2+',this,3)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="lababoacells2'+abocount2+'" name="lababoacells2'+abocount2+'" onchange="autoBlood2('+abocount2+',this,4)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="lababobcells2'+abocount2+'" name="lababobcells2'+abocount2+'" onchange="autoBlood2('+abocount2+',this,5)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="lababoocells2'+abocount2+'" name="lababoocells2'+abocount2+'" onchange="autoBlood2('+abocount2+',this,6)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="lababobloodgroup2'+abocount2+'" name="lababobloodgroup2'+abocount2+'" onchange="confirmBloodgroupResult(this.value); setLabBloodABO_2(this);"  class="form-control select2"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:40px">' ;
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';
    
    $("#list_table_abo_2").append(event_data);

    setABOTest0Serum("#lababoantia2"+abocount2,value.lababoantia2);
    setABOTest0Serum("#lababoantib2"+abocount2,value.lababoantib2);
    setABOTest0Serum("#lababoantiab2"+abocount2,value.lababoantiab2);
    setABOTest0Serum("#lababoacells2"+abocount2,value.lababoacells2);
    setABOTest0Serum("#lababobcells2"+abocount2,value.lababobcells2);
    setABOTest0Serum("#lababoocells2"+abocount2,value.lababoocells2);
    setBloodGroup("#lababobloodgroup2"+abocount2,value.lababobloodgroup2);

    $("#lababoantia2"+abocount2).val(value.lababoantia2);
    $("#lababoantib2"+abocount2).val(value.lababoantib2);
    $("#lababoantiab2"+abocount2).val(value.lababoantiab2);
    $("#lababoacells2"+abocount2).val(value.lababoacells2);
    $("#lababobcells2"+abocount2).val(value.lababobcells2);
    $("#lababoocells2"+abocount2).val(value.lababoocells2);

    $("#lababobloodgroup2"+abocount2).select2({
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


    $("#lababobloodgroup2"+abocount2).val(value.lababobloodgroup2);

    abocount2++;

    // $(".select2").select2({ 
    //     width: "100%", 
    //     theme: "bootstrap",
    //     placeholder: "",
    //     allowClear:true
    // })
}

function autoBlood2(indexcount2="0",self,col='')
{

    var antia = $("#lababoantia2"+indexcount2).val();
    var antib = $("#lababoantib2"+indexcount2).val();
    var antiab = $("#lababoantiab2"+indexcount2).val();
    var acells = $("#lababoacells2"+indexcount2).val();
    var bcells = $("#lababobcells2"+indexcount2).val();
    var ocells = $("#lababoocells2"+indexcount2).val();

    var ayu = document.getElementById("patientage").innerHTML;

    if(parseInt(ayu) <= 1){
        if( (antia) && (antib)  
            && (antia != "0") && (antib != "0" ) 
            && !(acells) && !(bcells) && !(ocells) 
            )
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
                $("#labconfirmbloodgroupid_2").val("A").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("A").trigger("change");
                setBloodABO_2(self);
                noautoblood2(self);
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
                $("#labconfirmbloodgroupid_2").val("B").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("B").trigger("change");
                setBloodABO_2(self);
                noautoblood2(self);
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
                $("#labconfirmbloodgroupid_2").val("O").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("O").trigger("change");
                setBloodABO_2(self);
                noautoblood2(self);
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
                
                $("#labconfirmbloodgroupid_2").val("AB").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("AB").trigger("change");
                setBloodABO_2(self);
                noautoblood2(self);
                return false;
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_2").val("0").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("0").trigger("change");
                setBloodABO_2(self);
            }

            

        }
    
        if((antia) && (antib) && (antiab) && (acells) && (bcells) && (ocells)
            && (antia != "0") && (antib != "0" ) && (antiab != "0" ) && (acells != "0") && (bcells != "0") && (ocells != "0")
            )
        {
            if( (antia != "1" || antia != "11") && 
                (antib == "1" || antib == "11") && 
                (antiab != "1" || antiab != "11") && 
                (acells == "1" || acells == "11") && 
                (bcells != "1" || bcells != "11") && 
                (ocells == "1" || ocells == "11")
            )
            {
                $("#labconfirmbloodgroupid_2").val("A").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("A").trigger("change");
                setBloodABO_2(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_2").val("B").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("B").trigger("change");
                setBloodABO_2(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib == "1" || antib == "11") && 
                        (antiab == "1" || antiab == "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells != "1" || bcells != "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_2").val("O").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("O").trigger("change");
                setBloodABO_2(self);
            }else if(
                        (antia != "1" || antia != "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells == "1" || acells == "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11")
                    )
            {
                $("#labconfirmbloodgroupid_2").val("AB").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("AB").trigger("change");
                setBloodABO_2(self);
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_2").val("0").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("0").trigger("change");
                setBloodABO_2(self);
            }
        }else
        {
            $("#lababobloodgroup2"+indexcount2).val("0");
            setBloodABO_2(self);
        }
    }
    else{ ////// 
        if ((antia) && (antib) && (antia != "0") && (antib != "0") && (acells) && (bcells) && (acells != "0") && (bcells != "0"))
        {
            if( 
                ((antia != "11") && (antib == "11") && (bcells != "11") && (acells == "11")) ||
                ((antia != "1") && (antib == "1") && (bcells != "1") && (acells == "1"))
            )
            {
                $("#labconfirmbloodgroupid_2").val("A").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("A").trigger("change");
                setBloodABO_2(self);
                noautoblood2(self);
                return false;
            }else if(
                      ((antia == "11") && (antib != "11") && (bcells == "11") && (acells != "11")) ||
                        ((antia == "1") && (antib != "1") && (bcells == "1") && (acells != "1"))
                    )
            {
                $("#labconfirmbloodgroupid_2").val("B").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("B").trigger("change");
                setBloodABO_2(self);
                noautoblood2(self);
                return false;
            }else if(
                        ((antia == "11") && (antib == "11") && (bcells != "11") && (acells != "11")) ||
                        ((antia == "1") && (antib == "1") && (bcells != "1") && (acells != "1"))
                    )
            {
                $("#labconfirmbloodgroupid_2").val("O").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("O").trigger("change");
                setBloodABO_2(self);
                noautoblood2(self);
                return false;
            }else if(
                       ((antia != 11) && (antib != 11) && (bcells == 11) && (acells == 11)) ||
                        ((antia != 1) && (antib != 1) && (bcells == 1) && (acells == 1))
                    )
            {
                
                $("#labconfirmbloodgroupid_2").val("AB").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("AB").trigger("change");
                setBloodABO_2(self);
                noautoblood2(self);
                return false;
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_2").val("0").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("0").trigger("change");
                setBloodABO_2(self);
            }

            

        }
    
        if((antia) && (antib) && (antiab) && (acells) && (bcells) && (ocells)
            && (antia != "0") && (antib != "0" ) && (antiab != "0" ) && (acells != "0") && (bcells != "0") && (ocells != "0")
            )
        {
            if( (antia != "1" || antia != "11") && 
                (antib == "1" || antib == "11") && 
                (antiab != "1" || antiab != "11") && 
                (acells == "1" || acells == "11") && 
                (bcells != "1" || bcells != "11") && 
                (ocells == "1" || ocells == "11")
            )
            {
                $("#labconfirmbloodgroupid_2").val("A").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("A").trigger("change");
                setBloodABO_2(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_2").val("B").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("B").trigger("change");
                setBloodABO_2(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib == "1" || antib == "11") && 
                        (antiab == "1" || antiab == "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells != "1" || bcells != "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_2").val("O").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("O").trigger("change");
                setBloodABO_2(self);
            }else if(
                        (antia != "1" || antia != "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells == "1" || acells == "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11")
                    )
            {
                $("#labconfirmbloodgroupid_2").val("AB").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("AB").trigger("change");
                setBloodABO_2(self);
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_2").val("0").trigger("change");
                $("#lababobloodgroup2"+indexcount2).val("0").trigger("change");
                setBloodABO_2(self);
            }
        }else
        {
            $("#lababobloodgroup2"+indexcount2).val("0");
            setBloodABO_2(self);
        }
    }

    
    
}

function noautoblood2(self) {
    var rows = self.parentNode.parentNode;
    var item = JSON.parse(rows.cells[0].innerHTML);
    var table = document.getElementById("list_table_abo_2");
    var r = 1;
    var status0 = "";
    // alert(item.lababobloodgroup0);

    var patientbloodgroup = document.getElementById("patientbloodgroup").innerHTML;

    while (row = table.rows[r++]) {
        try {
            var blood = JSON.parse(document.getElementById("list_table_abo_2").rows[r].cells.item(0).innerHTML);  
        }
        catch(err) {
            console.log("err");
        }
        
        console.log(blood.lababobloodgroup2);
        if(item.lababobloodgroup2 != blood.lababobloodgroup2){
            // alert("5555555555");
            $("#labconfirmbloodgroupid_2").val("");
            $("#labconfirmbloodgroupid_2").trigger('change');
            return false;
        }
        else{
            if(patientbloodgroup == '-' || patientbloodgroup == '' || patientbloodgroup == 'ไม่ทราบ' || patientbloodgroup == "Discrepancy"){
                $("#labconfirmbloodgroupid_2").val(item.lababobloodgroup2);
                $("#labconfirmbloodgroupid_2").trigger('change');
            }
            else{
                if(patientbloodgroup != item.lababobloodgroup0){
                    bloodalert();
                }
                else{
                    $("#labconfirmbloodgroupid_2").val(item.lababobloodgroup2);
                    $("#labconfirmbloodgroupid_2").trigger('change');
                }
            }
        }
    }
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
var rhcount2 = 0;
function addRhTest2(value=[]) {
    var table = document.getElementById("list_table_rh_2").rows.length;

    if(table == 1){
        if(value.length == 0)
        {
            value = {
                        labrhreagent2:'CAT',
                        labrhid2:'',
                        labrhcode2:'',
                        labrhrt2:'',
                        lab37c2 : '',
                        labiat2:'',
                        labccc2:'',
                        labresult2:''
                    };
            
        }
    }
    else{
        if(value.length == 0)
        {
            value = {
                        labrhreagent2:'',
                        labrhid2:'',
                        labrhcode2:'',
                        labrhrt2:'',
                        lab37c2 : '',
                        labiat2:'',
                        labccc2:'',
                        labresult2:''
                    };
            
        }
    }


                                        
    var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input  class="form-control" id="labrhreagent2'+rhcount2+'" name="labrhreagent2'+rhcount2+'" value="'+value.labrhreagent2+'" onkeyup="setLabRhReagent_2(this)" >';
        
        event_data += '</td>'
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labrhrt2'+rhcount2+'" name="labrhrt2'+rhcount2+'"  class="form-control" onchange="setLabRhRt_2(this); setpos2('+rhcount2+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="lab37c2'+rhcount2+'" name="lab37c2'+rhcount2+'" class="form-control" onchange="setLab37C_2(this); setpos2('+rhcount2+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labiat2'+rhcount2+'" name="labiat2'+rhcount2+'" class="form-control" onchange="setLabIAT_2(this); setpos2('+rhcount2+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labccc2'+rhcount2+'" name="labccc2'+rhcount2+'" class="form-control" onchange="setLabCCC_2(this); setpos2('+rhcount2+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labresult2'+rhcount2+'" name="labresult2'+rhcount2+'" class="form-control" onchange="setLabResult_2(this);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
    
    $("#list_table_rh_2").append(event_data);

    setABOTest0Serum("#labrhrt2"+rhcount2,value.labrhrt2);
    setABOTest0Serum("#lab37c2"+rhcount2,value.lab37c2);
    setABOTest0Serum("#labiat2"+rhcount2,value.labiat2);
    setABOTest0Serum("#labccc2"+rhcount2,value.labccc2);
    setRh2("#labresult2"+rhcount2,value.labresult2);

    $("#labrhrt2"+rhcount2).val(value.labrhrt2);
    $("#lab37c2"+rhcount2).val(value.lab37c2);
    $("#labiat2"+rhcount2).val(value.labiat2);
    $("#labccc2"+rhcount2).val(value.labccc2);

    
    $("#labresult2" + rhcount2).select2({
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


    $("#labresult2"+rhcount2).val(value.labresult2);
    
    rhcount2++;
}

// function setpos2(indexcount2,self,col='')
// {
//     var labrhrt2 = $("#labrhrt2"+indexcount2).val();
//     var lab37c2 = $("#lab37c2"+indexcount2).val();
//     var labiat2 = $("#labiat2"+indexcount2).val();
//     var labccc2 = $("#labccc2"+indexcount2).val();
//     var labresult2 = $("#labresult2"+indexcount2).val();

//     if(labrhrt2 > 1 || lab37c2 > 1 || labiat2 > 1 || labccc2 > 1 || labresult2 > 1){
//         $("#labconfirmrhid_2").val("Rh+");
//     }
// }

function setpos2(indexcount2,self,col='')
{
    var labrhrt2 = $("#labrhrt2"+indexcount2).val();
    var lab37c2 = $("#lab37c2"+indexcount2).val();
    var labiat2 = $("#labiat2"+indexcount2).val();
    var labccc2 = $("#labccc2"+indexcount2).val();
    var labresult2 = $("#labresult2"+indexcount2).val();

    if(labrhrt2 > 1 || lab37c2 > 1 || labiat2 > 1  ){

        setDataModalSelectValue(`labconfirmrhid_2`, 'Rh+', 'Positive');
        setDataModalSelectValue(`labresult2`+indexcount2, 'Rh+', 'Positive');
        confirmRhResult("Rh+");
        
    }else if(labrhrt2 == 1 || lab37c2 == 1 || labiat2 == 1  ){

        setDataModalSelectValue(`labconfirmrhid_2`, 'Rh-', 'Negative');
        setDataModalSelectValue(`labresult2`+indexcount2, 'Rh-', 'Negative');
        confirmRhResult("Rh-");
        
    }else 
    {
        setDataModalSelectValue(`labconfirmrhid_2`, '', '');
        setDataModalSelectValue(`labresult2`+indexcount2, '', '');
        confirmRhResult("");
    }
    noautopos2(self);
}

function noautopos2(self){
    var rows = self.parentNode.parentNode;
    var item = JSON.parse(rows.cells[0].innerHTML);

    var table = document.getElementById("list_table_rh_2");
    var r = 0;
    var status0 = "";
    // alert(item.labresult0);

    while (row = table.rows[r++]) {
        try {
            var bloodrh = JSON.parse(document.getElementById("list_table_rh_2").rows[r].cells.item(0).innerHTML);  
        }
        catch(err) {
            console.log("err");
        }
        
        // console.log(bloodrh);
        // alert(bloodrh);
        if(item.labresult2 != bloodrh.labresult2){
            // alert("5555555555");
            $("#labconfirmrhid_2").val("");
            $("#labconfirmrhid_2").trigger('change');
            return false;
        }
        else{
            $("#labconfirmrhid_2").val(item.labresult2);
            $("#labconfirmrhid_2").trigger('change');
        }
    }
}
// End Rh

// Start AntiSceeningTest
var anticount2 = 0;
function addAntiSceeningTest2(value=[]) {

        if(value.length == 0)
        {
            value = {
                        labantibodysceentestid2:'',
                        labantibodysceentest2:'',
                        labantibodysceentestp1mi2:'',
                        labantibodysceentesto12:'',
                        labantibodysceentesto22:'',
                        labantibodysceentesto32:'',
                        labantibodysceentestlotno2:''
                    };
            
        }
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest2'+anticount2+'" name="labantibodysceentest2'+anticount2+'" onchange="setLabAntibodySceenTest_2(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestp1mi2'+anticount2+'" name="labantibodysceentestp1mi2'+anticount2+'" onchange="setLabAntibodySceenTestp1mi_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto12'+anticount2+'" name="labantibodysceentesto12'+anticount2+'" onchange="setLabAntibodySceenTestO1_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto22'+anticount2+'"  name="labantibodysceentesto22'+anticount2+'" onchange="setLabAntibodySceenTestO2_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto32'+anticount2+'"  name="labantibodysceentesto32'+anticount2+'" onchange="setLabAntibodySceenTestO3_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno2'+anticount2+'"  name="labantibodysceentestlotno2'+anticount2+'" value="'+value.labantibodysceentestlotno2+'" onkeyup="setLabAntibodySceenTestLotno_2(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_2").append(event_data);

        setBloodAntiTest("#labantibodysceentest2"+anticount2,value.labantibodysceentest2);
        setABOTest0Serum("#labantibodysceentestp1mi2"+anticount2,value.labantibodysceentestp1mi2);
        setABOTest0Serum("#labantibodysceentesto12"+anticount2,value.labantibodysceentesto12);
        setABOTest0Serum("#labantibodysceentesto22"+anticount2,value.labantibodysceentesto22);
        setABOTest0Serum("#labantibodysceentesto32"+anticount2,value.labantibodysceentesto32);


        $("#labantibodysceentest2"+anticount2).val(value.labantibodysceentest2);
        $("#labantibodysceentestp1mi2"+anticount2).val(value.labantibodysceentestp1mi2);
        $("#labantibodysceentesto12"+anticount2).val(value.labantibodysceentesto12);
        $("#labantibodysceentesto22"+anticount2).val(value.labantibodysceentesto22);
        $("#labantibodysceentesto32"+anticount2).val(value.labantibodysceentesto32);
        anticount2++;
}

function addAntiSceeningTest2_null(value=[]) {


            value = {
                        labantibodysceentestid2:'',
                        labantibodysceentest2:'13',
                        labantibodysceentestp1mi2:'',
                        labantibodysceentesto12:'',
                        labantibodysceentesto22:'',
                        labantibodysceentesto32:'',
                        labantibodysceentestlotno2:''
                    };

            
            
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest2'+anticount2+'" name="labantibodysceentest2'+anticount2+'" onchange="setLabAntibodySceenTest_2(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestp1mi2'+anticount2+'" name="labantibodysceentestp1mi2'+anticount2+'" onchange="setLabAntibodySceenTestp1mi_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto12'+anticount2+'" name="labantibodysceentesto12'+anticount2+'" onchange="setLabAntibodySceenTestO1_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto22'+anticount2+'"  name="labantibodysceentesto22'+anticount2+'" onchange="setLabAntibodySceenTestO2_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto32'+anticount2+'"  name="labantibodysceentesto32'+anticount2+'" onchange="setLabAntibodySceenTestO3_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno2'+anticount2+'"  name="labantibodysceentestlotno2'+anticount2+'" value="'+value.labantibodysceentestlotno2+'" onkeyup="setLabAntibodySceenTestLotno_2(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        $("#list_table_anti_sceen_2").append(event_data);

        setBloodAntiTest("#labantibodysceentest2"+anticount2);
        setABOTest0Serum("#labantibodysceentestp1mi2"+anticount2);
        setABOTest0Serum("#labantibodysceentesto12"+anticount2);
        setABOTest0Serum("#labantibodysceentesto22"+anticount2);
        setABOTest0Serum("#labantibodysceentesto32"+anticount2);

        $("#labantibodysceentest2"+anticount2).val("13");

        event_data = '';

        anticount2++;

        value = {
                        labantibodysceentestid2:'',
                        labantibodysceentest2:'6',
                        labantibodysceentestp1mi2:'',
                        labantibodysceentesto12:'',
                        labantibodysceentesto22:'',
                        labantibodysceentesto32:'',
                        labantibodysceentestlotno2:''
                    };

        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest2'+anticount2+'" name="labantibodysceentest2'+anticount2+'" onchange="setLabAntibodySceenTest_2(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestp1mi2'+anticount2+'" name="labantibodysceentestp1mi2'+anticount2+'" onchange="setLabAntibodySceenTestp1mi_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto12'+anticount2+'" name="labantibodysceentesto12'+anticount2+'" onchange="setLabAntibodySceenTestO1_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto22'+anticount2+'"  name="labantibodysceentesto22'+anticount2+'" onchange="setLabAntibodySceenTestO2_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto32'+anticount2+'"  name="labantibodysceentesto32'+anticount2+'" onchange="setLabAntibodySceenTestO3_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno2'+anticount2+'"  name="labantibodysceentestlotno2'+anticount2+'" value="'+value.labantibodysceentestlotno2+'" onkeyup="setLabAntibodySceenTestLotno_2(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_2").append(event_data);

        

        setBloodAntiTest("#labantibodysceentest2"+anticount2);
        setABOTest0Serum("#labantibodysceentestp1mi2"+anticount2);
        setABOTest0Serum("#labantibodysceentesto12"+anticount2);
        setABOTest0Serum("#labantibodysceentesto22"+anticount2);
        setABOTest0Serum("#labantibodysceentesto32"+anticount2);

        $("#labantibodysceentest2"+anticount2).val("6");

        anticount2++;
}
// End AntiSceeningTest

// Start Antibody identification test
var idencount2 = 0;
function addAntibodyIdenTest2(value=[]) {

        if(value.length == 0)
        {
            value = {
                labantibodyidentificationtestid2:'',
                labantibodyidentificationtest2:'',
                labantibodyidentificationtest12:'',
                labantibodyidentificationtest22 : '',
                labantibodyidentificationtest32:'',
                labantibodyidentificationtest42:'',
                labantibodyidentificationtest52:'',
                labantibodyidentificationtest62:'',
                labantibodyidentificationtest72:'',
                labantibodyidentificationtest82:'',
                labantibodyidentificationtest92:'',
                labantibodyidentificationtest102:'',
                labantibodyidentificationtest112:'',
                labantibodyidentificationtestauto2:'',
                labantibodyidentificationtestlotno2:'',
            };
        }
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest2'+idencount2+'" name="labantibodyidentificationtest2'+idencount2+'"  onchange="setLabAntibodyIdentificationTest_2(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest12'+idencount2+'" name="labantibodyidentificationtest12'+idencount2+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest22'+idencount2+'" name="labantibodyidentificationtest22'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest32'+idencount2+'" name="labantibodyidentificationtest32'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest42'+idencount2+'" name="labantibodyidentificationtest42'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest52'+idencount2+'" name="labantibodyidentificationtest52'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest62'+idencount2+'" name="labantibodyidentificationtest62'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest72'+idencount2+'" name="labantibodyidentificationtest72'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest82'+idencount2+'" name="labantibodyidentificationtest82'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest92'+idencount2+'" name="labantibodyidentificationtest92'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest102'+idencount2+'" name="labantibodyidentificationtest102'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest112'+idencount2+'" name="labantibodyidentificationtest112'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto2'+idencount2+'" name="labantibodyidentificationtestauto2'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno2'+idencount2+'" value="'+value.labantibodyidentificationtestlotno2+'" name="labantibodyidentificationtestlotno2'+idencount2+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_2(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid2'+idencount2+'" value="'+idencount2+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_iden_2").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtest2"+idencount2,value.labantibodyidentificationtest2);
        setABOTest0Serum("#labantibodyidentificationtest12"+idencount2,value.labantibodyidentificationtest12);
        setABOTest0Serum("#labantibodyidentificationtest22"+idencount2,value.labantibodyidentificationtest22);
        setABOTest0Serum("#labantibodyidentificationtest32"+idencount2,value.labantibodyidentificationtest32);
        setABOTest0Serum("#labantibodyidentificationtest42"+idencount2,value.labantibodyidentificationtest42);
        setABOTest0Serum("#labantibodyidentificationtest52"+idencount2,value.labantibodyidentificationtest52);
        setABOTest0Serum("#labantibodyidentificationtest62"+idencount2,value.labantibodyidentificationtest62);
        setABOTest0Serum("#labantibodyidentificationtest72"+idencount2,value.labantibodyidentificationtest72);
        setABOTest0Serum("#labantibodyidentificationtest82"+idencount2,value.labantibodyidentificationtest82);
        setABOTest0Serum("#labantibodyidentificationtest92"+idencount2,value.labantibodyidentificationtest92);
        setABOTest0Serum("#labantibodyidentificationtest102"+idencount2,value.labantibodyidentificationtest102);
        setABOTest0Serum("#labantibodyidentificationtest112"+idencount2,value.labantibodyidentificationtest112);
        setABOTest0Serum("#labantibodyidentificationtestauto2"+idencount2,value.labantibodyidentificationtestauto2);

        $("#labantibodyidentificationtest2"+idencount2).val(value.labantibodyidentificationtest2);
        $("#labantibodyidentificationtest12"+idencount2).val(value.labantibodyidentificationtest12);
        $("#labantibodyidentificationtest22"+idencount2).val(value.labantibodyidentificationtest22);
        $("#labantibodyidentificationtest32"+idencount2).val(value.labantibodyidentificationtest32);
        $("#labantibodyidentificationtest42"+idencount2).val(value.labantibodyidentificationtest42);
        $("#labantibodyidentificationtest52"+idencount2).val(value.labantibodyidentificationtest52);
        $("#labantibodyidentificationtest62"+idencount2).val(value.labantibodyidentificationtest62);
        $("#labantibodyidentificationtest72"+idencount2).val(value.labantibodyidentificationtest72);
        $("#labantibodyidentificationtest82"+idencount2).val(value.labantibodyidentificationtest82);
        $("#labantibodyidentificationtest92"+idencount2).val(value.labantibodyidentificationtest92);
        $("#labantibodyidentificationtest102"+idencount2).val(value.labantibodyidentificationtest102);
        $("#labantibodyidentificationtest112"+idencount2).val(value.labantibodyidentificationtest112);
        $("#labantibodyidentificationtestauto2"+idencount2).val(value.labantibodyidentificationtestauto2);
    
        idencount2++;
  }

  function addAntibodyIdenTest2_null(value=[]) {

            value = {
                labantibodyidentificationtestid2:'',
                labantibodyidentificationtest2:'13',
                labantibodyidentificationtest12:'',
                labantibodyidentificationtest22 : '',
                labantibodyidentificationtest32:'',
                labantibodyidentificationtest42:'',
                labantibodyidentificationtest52:'',
                labantibodyidentificationtest62:'',
                labantibodyidentificationtest72:'',
                labantibodyidentificationtest82:'',
                labantibodyidentificationtest92:'',
                labantibodyidentificationtest102:'',
                labantibodyidentificationtest112:'',
                labantibodyidentificationtestauto2:'',
                labantibodyidentificationtestlotno2:'',
            };

            
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest2'+idencount2+'" name="labantibodyidentificationtest2'+idencount2+'"  onchange="setLabAntibodyIdentificationTest_2(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest12'+idencount2+'" name="labantibodyidentificationtest12'+idencount2+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest22'+idencount2+'" name="labantibodyidentificationtest22'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest32'+idencount2+'" name="labantibodyidentificationtest32'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest42'+idencount2+'" name="labantibodyidentificationtest42'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest52'+idencount2+'" name="labantibodyidentificationtest52'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest62'+idencount2+'" name="labantibodyidentificationtest62'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest72'+idencount2+'" name="labantibodyidentificationtest72'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest82'+idencount2+'" name="labantibodyidentificationtest82'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest92'+idencount2+'" name="labantibodyidentificationtest92'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest102'+idencount2+'" name="labantibodyidentificationtest102'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest112'+idencount2+'" name="labantibodyidentificationtest112'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto2'+idencount2+'" name="labantibodyidentificationtestauto2'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno2'+idencount2+'" value="'+value.labantibodyidentificationtestlotno2+'" name="labantibodyidentificationtestlotno2'+idencount2+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_2(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid2'+idencount2+'" value="'+idencount2+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        $("#list_table_anti_iden_2").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtest2"+idencount2,value.labantibodyidentificationtest2);
        setABOTest0Serum("#labantibodyidentificationtest12"+idencount2,value.labantibodyidentificationtest12);
        setABOTest0Serum("#labantibodyidentificationtest22"+idencount2,value.labantibodyidentificationtest22);
        setABOTest0Serum("#labantibodyidentificationtest32"+idencount2,value.labantibodyidentificationtest32);
        setABOTest0Serum("#labantibodyidentificationtest42"+idencount2,value.labantibodyidentificationtest42);
        setABOTest0Serum("#labantibodyidentificationtest52"+idencount2,value.labantibodyidentificationtest52);
        setABOTest0Serum("#labantibodyidentificationtest62"+idencount2,value.labantibodyidentificationtest62);
        setABOTest0Serum("#labantibodyidentificationtest72"+idencount2,value.labantibodyidentificationtest72);
        setABOTest0Serum("#labantibodyidentificationtest82"+idencount2,value.labantibodyidentificationtest82);
        setABOTest0Serum("#labantibodyidentificationtest92"+idencount2,value.labantibodyidentificationtest92);
        setABOTest0Serum("#labantibodyidentificationtest102"+idencount2,value.labantibodyidentificationtest102);
        setABOTest0Serum("#labantibodyidentificationtest112"+idencount2,value.labantibodyidentificationtest112);
        setABOTest0Serum("#labantibodyidentificationtestauto2"+idencount2,value.labantibodyidentificationtestauto2);

        $("#labantibodyidentificationtest2"+idencount2).val(13);

        event_data = '';

        idencount2++;

        value = {
                labantibodyidentificationtestid2:'',
                labantibodyidentificationtest2:'6',
                labantibodyidentificationtest12:'',
                labantibodyidentificationtest22 : '',
                labantibodyidentificationtest32:'',
                labantibodyidentificationtest42:'',
                labantibodyidentificationtest52:'',
                labantibodyidentificationtest62:'',
                labantibodyidentificationtest72:'',
                labantibodyidentificationtest82:'',
                labantibodyidentificationtest92:'',
                labantibodyidentificationtest102:'',
                labantibodyidentificationtest112:'',
                labantibodyidentificationtestauto2:'',
                labantibodyidentificationtestlotno2:'',
            };

        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest2'+idencount2+'" name="labantibodyidentificationtest2'+idencount2+'"  onchange="setLabAntibodyIdentificationTest_2(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest12'+idencount2+'" name="labantibodyidentificationtest12'+idencount2+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest22'+idencount2+'" name="labantibodyidentificationtest22'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest32'+idencount2+'" name="labantibodyidentificationtest32'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest42'+idencount2+'" name="labantibodyidentificationtest42'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest52'+idencount2+'" name="labantibodyidentificationtest52'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest62'+idencount2+'" name="labantibodyidentificationtest62'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest72'+idencount2+'" name="labantibodyidentificationtest72'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest82'+idencount2+'" name="labantibodyidentificationtest82'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest92'+idencount2+'" name="labantibodyidentificationtest92'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest102'+idencount2+'" name="labantibodyidentificationtest102'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest112'+idencount2+'" name="labantibodyidentificationtest112'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto2'+idencount2+'" name="labantibodyidentificationtestauto2'+idencount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno2'+idencount2+'" value="'+value.labantibodyidentificationtestlotno2+'" name="labantibodyidentificationtestlotno2'+idencount2+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_2(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid2'+idencount2+'" value="'+idencount2+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
        
        $("#list_table_anti_iden_2").append(event_data);

        

        setBloodAntiTest("#labantibodyidentificationtest2"+idencount2,value.labantibodyidentificationtest2);
        setABOTest0Serum("#labantibodyidentificationtest12"+idencount2,value.labantibodyidentificationtest12);
        setABOTest0Serum("#labantibodyidentificationtest22"+idencount2,value.labantibodyidentificationtest22);
        setABOTest0Serum("#labantibodyidentificationtest32"+idencount2,value.labantibodyidentificationtest32);
        setABOTest0Serum("#labantibodyidentificationtest42"+idencount2,value.labantibodyidentificationtest42);
        setABOTest0Serum("#labantibodyidentificationtest52"+idencount2,value.labantibodyidentificationtest52);
        setABOTest0Serum("#labantibodyidentificationtest62"+idencount2,value.labantibodyidentificationtest62);
        setABOTest0Serum("#labantibodyidentificationtest72"+idencount2,value.labantibodyidentificationtest72);
        setABOTest0Serum("#labantibodyidentificationtest82"+idencount2,value.labantibodyidentificationtest82);
        setABOTest0Serum("#labantibodyidentificationtest92"+idencount2,value.labantibodyidentificationtest92);
        setABOTest0Serum("#labantibodyidentificationtest102"+idencount2,value.labantibodyidentificationtest102);
        setABOTest0Serum("#labantibodyidentificationtest112"+idencount2,value.labantibodyidentificationtest112);
        setABOTest0Serum("#labantibodyidentificationtestauto2"+idencount2,value.labantibodyidentificationtestauto2);

        $("#labantibodyidentificationtest2"+idencount2).val(6);
    
        idencount2++;
  }
// End Antibody identification test

// Start Saliva test
var salivacount2 = 0;
function addSalivaTest2(value=[]) {
                      
    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table"  style="display:none;" >';
    event_data += JSON.stringify(value);
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += value.labsalivatest2;
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatestacells2'+salivacount2+'" name="labsalivatestacells2'+salivacount2+'" onchange="setLabSalivatestACells_2(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatestbcells2'+salivacount2+'" name="labsalivatestbcells2'+salivacount2+'" onchange="setLabSalivatestBCells_2(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatesotcells2'+salivacount2+'" name="labsalivatesotcells2'+salivacount2+'" onchange="setLabSalivatestOCells_2(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '</tr>';
    
    $("#list_table_saliva_2").append(event_data);

    setABOTest0Serum("#labsalivatestacells2"+salivacount2,value.labsalivatestacells2);
    setABOTest0Serum("#labsalivatestbcells2"+salivacount2,value.labsalivatestbcells2);
    setABOTest0Serum("#labsalivatesotcells2"+salivacount2,value.labsalivatesotcells2);

    $("#labsalivatestacells2"+salivacount2).val(value.labsalivatestacells2);
    $("#labsalivatestbcells2"+salivacount2).val(value.labsalivatestbcells2);
    $("#labsalivatesotcells2"+salivacount2).val(value.labsalivatesotcells2);

    salivacount2++;
}
// End Saliva test


// Start Titration
var titrationcount2 = 0;
function addTitration2(value=[]) {

        if(value.length == 0)
        {
            value = {
                labtitrationid2:'',
                labtitrationantiserum2:'',
                labtitrationcell2:'',
                labtitration12:'',
                labtitration22:'',
                labtitration42:'',
                labtitration82:'',
                labtitration162:'',
                labtitration322:'',
                labtitration642:'',
                labtitration1282:'',
                labtitration2562:'',
                labtitration5122:'',
                labtitration10242:'',
                labtitration20482:'',
                labtitrationtiter2:''
            };
        }

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labtitrationantiserum2'+titrationcount2+'" name="labtitrationantiserum2'+titrationcount2+'"  onchange="setLabTitrationAntiSerum_2(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitrationcell2'+titrationcount2+'" name="labtitrationcell2'+titrationcount2+'"  class="form-control" onchange="setLabTitrationCell_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration12'+titrationcount2+'" name="labtitration12'+titrationcount2+'" class="form-control" onchange="setLabTitration1_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration22'+titrationcount2+'" name="labtitration22'+titrationcount2+'" class="form-control" onchange="setLabTitration2_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration42'+titrationcount2+'" name="labtitration42'+titrationcount2+'" class="form-control" onchange="setLabTitration4_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration82'+titrationcount2+'" name="labtitration82'+titrationcount2+'" class="form-control" onchange="setLabTitration8_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration162'+titrationcount2+'" name="labtitration162'+titrationcount2+'" class="form-control" onchange="setLabTitration16_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration322'+titrationcount2+'" name="labtitration322'+titrationcount2+'" class="form-control" onchange="setLabTitration32_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration642'+titrationcount2+'" name="labtitration642'+titrationcount2+'" class="form-control" onchange="setLabTitration64_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration1282'+titrationcount2+'" name="labtitration1282'+titrationcount2+'" class="form-control" onchange="setLabTitration128_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration2562'+titrationcount2+'" name="labtitration2562'+titrationcount2+'" class="form-control" onchange="setLabTitration256_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration5122'+titrationcount2+'" name="labtitration5122'+titrationcount2+'" class="form-control" onchange="setLabTitration512_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration10242'+titrationcount2+'" name="labtitration10242'+titrationcount2+'" class="form-control" onchange="setLabTitration1024_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration20482'+titrationcount2+'" name="labtitration20482'+titrationcount2+'" class="form-control" onchange="setLabTitration2048_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitrationtiter2'+titrationcount2+'" name="labtitrationtiter2'+titrationcount2+'" class="form-control" onchange="setLabTitrationTiter2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_titration_2").append(event_data);

        setBloodAntiTest("#labtitrationantiserum2"+titrationcount2,value.labtitrationantiserum2);
        setABOTest0Serum("#labtitrationcell2"+titrationcount2,value.labtitrationcell2);
        setABOTest0Serum("#labtitration12"+titrationcount2,value.labtitration12);
        setABOTest0Serum("#labtitration22"+titrationcount2,value.labtitration22);
        setABOTest0Serum("#labtitration42"+titrationcount2,value.labtitration42);
        setABOTest0Serum("#labtitration82"+titrationcount2,value.labtitration82);
        setABOTest0Serum("#labtitration162"+titrationcount2,value.labtitration162);
        setABOTest0Serum("#labtitration322"+titrationcount2,value.labtitration322);
        setABOTest0Serum("#labtitration642"+titrationcount2,value.labtitration642);
        setABOTest0Serum("#labtitration1282"+titrationcount2,value.labtitration1282);
        setABOTest0Serum("#labtitration2562"+titrationcount2,value.labtitration2562);
        setABOTest0Serum("#labtitration5122"+titrationcount2,value.labtitration5122);
        setABOTest0Serum("#labtitration10242"+titrationcount2,value.labtitration10242);
        setABOTest0Serum("#labtitration20482"+titrationcount2,value.labtitration20482);
        setRh2("#labtitrationtiter2"+titrationcount2,value.labtitrationtiter2);

        $("#labtitrationantiserum2"+titrationcount2).val(value.labtitrationantiserum2);
        $("#labtitrationcell2"+titrationcount2).val(value.labtitrationcell2);
        $("#labtitration12"+titrationcount2).val(value.labtitration12);
        $("#labtitration22"+titrationcount2).val(value.labtitration22);
        $("#labtitration42"+titrationcount2).val(value.labtitration42);
        $("#labtitration82"+titrationcount2).val(value.labtitration82);
        $("#labtitration162"+titrationcount2).val(value.labtitration162);
        $("#labtitration322"+titrationcount2).val(value.labtitration322);
        $("#labtitration642"+titrationcount2).val(value.labtitration642);
        $("#labtitration1282"+titrationcount2).val(value.labtitration1282);
        $("#labtitration2562"+titrationcount2).val(value.labtitration2562);
        $("#labtitration5122"+titrationcount2).val(value.labtitration5122);
        $("#labtitration10242"+titrationcount2).val(value.labtitration10242);
        $("#labtitration20482"+titrationcount2).val(value.labtitration20482);
        $("#labtitrationtiter2"+titrationcount2).val(value.labtitrationtiter2);
    
        titrationcount2++;
  }
// End Titration

// Start Titration
var coldagglutinincount2 = 0;
function addColdAgglutinin2(value=[]) {

        if(value.length == 0)
        {
            value = {
                labcoldagglutininid2:'',
                labcoldagglutinino2:'',
                labcoldagglutinintime2:'',
                labcoldagglutinin12:'',
                labcoldagglutinin22:'',
                labcoldagglutinin42:'',
                labcoldagglutinin82:'',
                labcoldagglutinin162:'',
                labcoldagglutinin322:'',
                labcoldagglutinin642:'',
                labcoldagglutinin1282:'',
                labcoldagglutinin2562:'',
                labcoldagglutinin5122:'',
                labcoldagglutinin10242:'',
                labcoldagglutinin20482:'',
                labcoldagglutinintiter2:''
            };
        }

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += value.labcoldagglutinino2;
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += value.labcoldagglutinintime2;
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin12'+coldagglutinincount2+'" name="labcoldagglutinin12'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin1_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin22'+coldagglutinincount2+'" name="labcoldagglutinin22'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin2_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin42'+coldagglutinincount2+'" name="labcoldagglutinin42'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin4_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin82'+coldagglutinincount2+'" name="labcoldagglutinin82'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin8_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin162'+coldagglutinincount2+'" name="labcoldagglutinin162'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin16_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin322'+coldagglutinincount2+'" name="labcoldagglutinin322'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin32_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin642'+coldagglutinincount2+'" name="labcoldagglutinin642'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin64_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin1282'+coldagglutinincount2+'" name="labcoldagglutinin1282'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin128_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin2562'+coldagglutinincount2+'" name="labcoldagglutinin2562'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin256_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin5122'+coldagglutinincount2+'" name="labcoldagglutinin5122'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin512_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin10242'+coldagglutinincount2+'" name="labcoldagglutinin10242'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin1024_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin20482'+coldagglutinincount2+'" name="labcoldagglutinin20482'+coldagglutinincount2+'" class="form-control" onchange="setLabColdAgglutinin2048_2(this)"></select>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_coldagglutinin_2").append(event_data);

        setABOTest0Serum("#labcoldagglutinin12"+coldagglutinincount2,value.labcoldagglutinin12);
        setABOTest0Serum("#labcoldagglutinin22"+coldagglutinincount2,value.labcoldagglutinin22);
        setABOTest0Serum("#labcoldagglutinin42"+coldagglutinincount2,value.labcoldagglutinin42);
        setABOTest0Serum("#labcoldagglutinin82"+coldagglutinincount2,value.labcoldagglutinin82);
        setABOTest0Serum("#labcoldagglutinin162"+coldagglutinincount2,value.labcoldagglutinin162);
        setABOTest0Serum("#labcoldagglutinin322"+coldagglutinincount2,value.labcoldagglutinin322);
        setABOTest0Serum("#labcoldagglutinin642"+coldagglutinincount2,value.labcoldagglutinin642);
        setABOTest0Serum("#labcoldagglutinin1282"+coldagglutinincount2,value.labcoldagglutinin1282);
        setABOTest0Serum("#labcoldagglutinin2562"+coldagglutinincount2,value.labcoldagglutinin2562);
        setABOTest0Serum("#labcoldagglutinin5122"+coldagglutinincount2,value.labcoldagglutinin5122);
        setABOTest0Serum("#labcoldagglutinin10242"+coldagglutinincount2,value.labcoldagglutinin10242);
        setABOTest0Serum("#labcoldagglutinin20482"+coldagglutinincount2,value.labcoldagglutinin20482);

        
        $("#labcoldagglutinin12"+coldagglutinincount2).val(value.labcoldagglutinin12);
        $("#labcoldagglutinin22"+coldagglutinincount2).val(value.labcoldagglutinin22);
        $("#labcoldagglutinin42"+coldagglutinincount2).val(value.labcoldagglutinin42);
        $("#labcoldagglutinin82"+coldagglutinincount2).val(value.labcoldagglutinin82);
        $("#labcoldagglutinin162"+coldagglutinincount2).val(value.labcoldagglutinin162);
        $("#labcoldagglutinin322"+coldagglutinincount2).val(value.labcoldagglutinin322);
        $("#labcoldagglutinin642"+coldagglutinincount2).val(value.labcoldagglutinin642);
        $("#labcoldagglutinin1282"+coldagglutinincount2).val(value.labcoldagglutinin1282);
        $("#labcoldagglutinin2562"+coldagglutinincount2).val(value.labcoldagglutinin2562);
        $("#labcoldagglutinin5122"+coldagglutinincount2).val(value.labcoldagglutinin5122);
        $("#labcoldagglutinin10242"+coldagglutinincount2).val(value.labcoldagglutinin10242);
        $("#labcoldagglutinin20482"+coldagglutinincount2).val(value.labcoldagglutinin20482);
    
        coldagglutinincount2++;
  }
// End Titration


// Start Antibody identification test Get Method
var idengetmethodcount2 = 0;
function addAntibodyIdenTestGetMethod2(value=[]) {

        if(value.length == 0)
        {
            value = {
                labantibodyidentificationtestgetmethodid2:'',
                labantibodyidentificationtestgetmethod2:'',
                labantibodyidentificationtestgetmethod12:'',
                labantibodyidentificationtestgetmethod22:'',
                labantibodyidentificationtestgetmethod32:'',
                labantibodyidentificationtestgetmethod42:'',
                labantibodyidentificationtestgetmethod52:'',
                labantibodyidentificationtestgetmethod62:'',
                labantibodyidentificationtestgetmethod72:'',
                labantibodyidentificationtestgetmethod82:'',
                labantibodyidentificationtestgetmethod92:'',
                labantibodyidentificationtestgetmethod102:'',
                labantibodyidentificationtestgetmethod112:'',
                labantibodyidentificationtestgetmethodauto2:'',
                labantibodyidentificationtestgetmethodantibody2:'',
                labantibodyidentificationtestgetmethodlotno2:'',
            };
        }
        			
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtestgetmethod2'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod2'+idengetmethodcount2+'"  onchange="setLabAntibodyIdentificationTestGetMethod_2(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod12'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod12'+idengetmethodcount2+'"  class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod1_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod22'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod22'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod2_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod32'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod32'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod3_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod42'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod42'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod4_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod52'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod52'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod5_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod62'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod62'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod6_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod72'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod72'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod7_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod82'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod82'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod8_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod92'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod92'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod9_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod102'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod102'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod10_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod112'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethod112'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod11_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethodauto2'+idengetmethodcount2+'" name="labantibodyidentificationtestgetmethodauto2'+idengetmethodcount2+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethodAuto_2(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestgetmethodantibody2'+idengetmethodcount2+'" value="'+value.labantibodyidentificationtestgetmethodantibody2+'" name="labantibodyidentificationtestgetmethodantibody2'+idengetmethodcount2+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestGetMethodAntibody_2(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestgetmethodlotno2'+idengetmethodcount2+'" value="'+value.labantibodyidentificationtestgetmethodlotno2+'" name="labantibodyidentificationtestgetmethodlotno2'+idengetmethodcount2+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestGetMethodLotno_2(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_iden_get_method_2").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtestgetmethod2"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod2);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod12"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod12);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod22"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod22);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod32"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod32);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod42"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod42);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod52"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod52);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod62"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod62);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod72"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod72);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod82"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod82);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod92"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod92);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod102"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod102);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod112"+idengetmethodcount2,value.labantibodyidentificationtestgetmethod112);
        setABOTest0Serum("#labantibodyidentificationtestgetmethodauto2"+idengetmethodcount2,value.labantibodyidentificationtestgetmethodauto2);

        $("#labantibodyidentificationtestgetmethod2"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod2);
        $("#labantibodyidentificationtestgetmethod12"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod12);
        $("#labantibodyidentificationtestgetmethod22"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod22);
        $("#labantibodyidentificationtestgetmethod32"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod32);
        $("#labantibodyidentificationtestgetmethod42"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod42);
        $("#labantibodyidentificationtestgetmethod52"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod52);
        $("#labantibodyidentificationtestgetmethod62"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod62);
        $("#labantibodyidentificationtestgetmethod72"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod72);
        $("#labantibodyidentificationtestgetmethod82"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod82);
        $("#labantibodyidentificationtestgetmethod92"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod92);
        $("#labantibodyidentificationtestgetmethod102"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod102);
        $("#labantibodyidentificationtestgetmethod112"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethod112);
        $("#labantibodyidentificationtestgetmethodauto2"+idengetmethodcount2).val(value.labantibodyidentificationtestgetmethodauto2);
    
        idengetmethodcount2++;
  }
// End Antibody identification test Get Method


// Start AntiSceeningTest Get Method
var anticountgetmethod2 = 0;
function addAntiSceeningTestGetMethod2(value=[]) {

        if(value.length == 0)
        {
            value = {
                        labantibodysceentestgetmethodid2:'',
                        labantibodysceentestgetmethodtest2:'',
                        labantibodysceentestgetmethodp1mi2:'',
                        labantibodysceentestgetmethodo12:'',
                        labantibodysceentestgetmethodo22:'',
                        labantibodysceentestgetmethodo32:'',
                        labantibodysceentestgetmethodenz2:'',
                        labantibodysceentestgetmethodlotno2:''
                    };
            
        }
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodtest2'+anticountgetmethod2+'" name="labantibodysceentestgetmethodtest2'+anticountgetmethod2+'" onchange="setLabAntibodySceenTestGetMethod_2(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodp1mi2'+anticountgetmethod2+'" name="labantibodysceentestgetmethodp1mi2'+anticountgetmethod2+'" onchange="setLabAntibodySceenTestGetMethodP1ma_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo12'+anticountgetmethod2+'" name="labantibodysceentestgetmethodo12'+anticountgetmethod2+'" onchange="setLabAntibodySceenTestGetMethodO1_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo22'+anticountgetmethod2+'"  name="labantibodysceentestgetmethodo22'+anticountgetmethod2+'" onchange="setLabAntibodySceenTestGetMethodO2_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo32'+anticountgetmethod2+'"  name="labantibodysceentestgetmethodo32'+anticountgetmethod2+'" onchange="setLabAntibodySceenTestGetMethodO3_2(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodenz2'+anticountgetmethod2+'"  name="labantibodysceentestgetmethodenz2'+anticountgetmethod2+'" value="'+value.labantibodysceentestgetmethodenz2+'" onkeyup="setLabAntibodySceenTestGetMethodEnz2_2(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodlotno2'+anticountgetmethod2+'"  name="labantibodysceentestgetmethodlotno2'+anticountgetmethod2+'" value="'+value.labantibodysceentestgetmethodlotno2+'" onkeyup="setLabAntibodySceenTestGetMethodLotno_2(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid2'+anticountgetmethod2+'" value="'+anticountgetmethod2+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_get_method_2").append(event_data);

        setBloodAntiTest("#labantibodysceentestgetmethodtest2"+anticountgetmethod2,value.labantibodysceentestgetmethodtest2);
        setABOTest0Serum("#labantibodysceentestgetmethodp1mi2"+anticountgetmethod2,value.labantibodysceentestgetmethodp1mi2);
        setABOTest0Serum("#labantibodysceentestgetmethodo12"+anticountgetmethod2,value.labantibodysceentestgetmethodo12);
        setABOTest0Serum("#labantibodysceentestgetmethodo22"+anticountgetmethod2,value.labantibodysceentestgetmethodo22);
        setABOTest0Serum("#labantibodysceentestgetmethodo32"+anticountgetmethod2,value.labantibodysceentestgetmethodo32);

        $("#labantibodysceentestgetmethodtest2"+anticountgetmethod2).val(value.labantibodysceentestgetmethodtest2);
        $("#labantibodysceentestgetmethodp1mi2"+anticountgetmethod2).val(value.labantibodysceentestgetmethodp1mi2);
        $("#labantibodysceentestgetmethodo12"+anticountgetmethod2).val(value.labantibodysceentestgetmethodo12);
        $("#labantibodysceentestgetmethodo22"+anticountgetmethod2).val(value.labantibodysceentestgetmethodo22);
        $("#labantibodysceentestgetmethodo32"+anticountgetmethod2).val(value.labantibodysceentestgetmethodo32);
        anticountgetmethod2++;
}
// End AntiSceeningTest Get Method

