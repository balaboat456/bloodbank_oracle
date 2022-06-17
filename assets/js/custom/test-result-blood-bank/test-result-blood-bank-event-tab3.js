// Start Set Data Tab 3
function setValueItemTab3(data)
{
    $("#adsorption3").val(data.adsorption3);
    $("#elution3").val(data.elution3);
    $("#labremark3").val(data.labremark3);

    // Phenotype
    document.getElementById('antibody3').value = data.antibody3;
    document.getElementById('antibodyLable3').innerHTML = data.antibody3;
    
    document.getElementById('phenotype3').value = data.phenotype3;
    document.getElementById('phenotypedisplay3').value = data.phenotypedisplay3;
    document.getElementById('phenotypeLable3').innerHTML = data.phenotypedisplay3;

    // ABO
    removeRowTable('list_table_abo_3');
    $.each(data.lab_abo_item_3, function (index, value) {
        addABOTest3(value);
    });
    if(data.lab_abo_item_3 == ''){
        addABOTest3();
    }
    setBloodGroup("#labconfirmbloodgroupid_3");
    $("#labconfirmbloodgroupid_3").val(data.labconfirmbloodgroupid_3);

    setABOTest0Serum("#labantia1_3");
    setABOTest0Serum("#labantih_3");
    setABOTest0Serum("#laba2cells_3");
    $("#labantia1_3").val(data.labantia1_3);
    $("#labantih_3").val(data.labantih_3);
    $("#laba2cells_3").val(data.laba2cells_3);

    // Rh
    removeRowTable('list_table_rh_3');
    $.each(data.lab_rh_item_3, function (index, value) {
        addRhTest3(value);
    });
    if(data.lab_rh_item_3 == ''){
        addRhTest3();
    }
    setRh2("#labconfirmrhid_3");
    $("#labconfirmrhid_3").val(data.labconfirmrhid_3);

    // Antibody Sceening test    
    removeRowTable('list_table_anti_sceen_3');
    $.each(data.lab_antibodysceentest_item_3, function (index, value) {
        addAntiSceeningTest3(value);
    });
    if(data.lab_antibodysceentest_item_3 == ''){
        addAntiSceeningTest3_null();
    }
    setBloodGroupSerum("#labconfirmantibodysceentestid_3",data.labconfirmantibodysceentestid_3);
    $("#labconfirmantibodysceentestid_3").val(data.labconfirmantibodysceentestid_3);

    // DAT
    setABOTest0Serum("#lab_dat_poly_3");
    setABOTest0Serum("#lab_dat_igg_3");
    setABOTest0Serum("#lab_dat_c3d_3");
    setABOTest0Serum("#lab_dat_ccc_3");
    $("#lab_dat_poly_3").val(data.lab_dat_poly_3);
    $("#lab_dat_igg_3").val(data.lab_dat_igg_3);
    $("#lab_dat_c3d_3").val(data.lab_dat_c3d_3);
    $("#lab_dat_ccc_3").val(data.lab_dat_ccc_3);

    // Antibody identification test
    removeRowTable('list_table_anti_iden_3');
    $.each(data.lab_antibodyidentificationtest_item_3, function (index, value) {
        addAntibodyIdenTest3(value);
    });
    if(data.lab_antibodyidentificationtest_item_3 == ''){
        addAntibodyIdenTest3_null();
    }

    //  Rh typing
    document.getElementById("lab_rhtype_d_3+").checked = (data.lab_rhtype_d_3 == '+')
    document.getElementById("lab_rhtype_d_3-").checked = (data.lab_rhtype_d_3 == '-')

    document.getElementById("lab_rhtype_c_3+").checked = (data.lab_rhtype_c_3 == '+')
    document.getElementById("lab_rhtype_c_3-").checked = (data.lab_rhtype_c_3 == '-')

    document.getElementById("lab_rhtype_e_3+").checked = (data.lab_rhtype_e_3 == '+')
    document.getElementById("lab_rhtype_e_3-").checked = (data.lab_rhtype_e_3 == '-')

    document.getElementById("lab_rhtype_c2_3+").checked = (data.lab_rhtype_c2_3 == '+')
    document.getElementById("lab_rhtype_c2_3-").checked = (data.lab_rhtype_c2_3 == '-')

    document.getElementById("lab_rhtype_e2_3+").checked = (data.lab_rhtype_e2_3 == '+')
    document.getElementById("lab_rhtype_e2_3-").checked = (data.lab_rhtype_e2_3 == '-')

    setRh2("#lab_rhtype_result_id_3");
    $("#lab_rhtype_result_id_3").val(data.lab_rhtype_result_id_3);

    // Saliva
    removeRowTable('list_table_saliva_3');

    if(data.lab_salivatest_item_3.length == 0)
    {
        data.lab_salivatest_item_3 = [
                                        {
                                            labsalivatestid3:'',
                                            labsalivatest3:"RT 5-60`",
                                            labsalivatestacells3:'',
                                            labsalivatestbcells3:'',
                                            labsalivatesotcells3:''
                                        },
                                        {
                                            labsalivatestid3:'',
                                            labsalivatest3:'Control gr.A',
                                            labsalivatestacells3:'',
                                            labsalivatestbcells3:'',
                                            labsalivatesotcells3:''
                                        },
                                        {
                                            labsalivatestid3:'',
                                            labsalivatest3:'Control gr.B',
                                            labsalivatestacells3:'',
                                            labsalivatestbcells3:'',
                                            labsalivatesotcells3:''
                                        },
                                        {
                                            labsalivatestid3:'',
                                            labsalivatest3:'Control gr.AB',
                                            labsalivatestacells3:'',
                                            labsalivatestbcells3:'',
                                            labsalivatesotcells3:''
                                        },
                                        {
                                            labsalivatestid3:'',
                                            labsalivatest3:'Control gr.O',
                                            labsalivatestacells3:'',
                                            labsalivatestbcells3:'',
                                            labsalivatesotcells3:''
                                        }
                                    ];
    }

    $.each(data.lab_salivatest_item_3, function (index, value) {
        addSalivaTest3(value);
    });

    setBloodGroup("#labconfirmsalivaid_3");
    $("#labconfirmsalivaid_3").val(data.labconfirmsalivaid_3);

    // Titration 
    removeRowTable('list_table_titration_3');
    $.each(data.lab_titration_item_3, function (index, value) {
        addTitration3(value);
    });

    setRh2("#labconfirmtitrationid_3");
    $("#labconfirmtitrationid_3").val(data.labconfirmtitrationid_3);


    //    Cold agglutinin
    removeRowTable('list_table_coldagglutinin_3');

    if(data.lab_coldagglutinin_item_3.length == 0)
    {
        var aRRpush = [];

        aRRpush.push(objColdAgglutinin3('O1','2 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin3('O1','24 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin3('O2','4 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin3('O2','24 ชั่วโมง'));

        data.lab_coldagglutinin_item_3 = aRRpush ;
    }

    $.each(data.lab_coldagglutinin_item_3, function (index, value) {
        addColdAgglutinin3(value);
    });

    setRh2("#labconfirmcoldagglutininid_3");
    $("#labconfirmcoldagglutininid_3").val(data.labconfirmcoldagglutininid_3);

    // Antibody identification test Get Method
    removeRowTable('list_table_anti_iden_get_method_3');
    $.each(data.lab_antibodyidentificationtestgetmethod_item_3, function (index, value) {
        addAntibodyIdenTestGetMethod3(value);
    });

    // Antibody Sceening test Get Method   
    removeRowTable('list_table_anti_sceen_get_method_3');
    $.each(data.lab_antibodysceentestgetmethod_item_3, function (index, value) {
        addAntiSceeningTestGetMethod3(value);
    });
    setRh3("#labconfirmantibodysceentestgetmethodid_3",data.labconfirmantibodysceentestgetmethodid_3);
    $("#labconfirmantibodysceentestgetmethodid_3").val(data.labconfirmantibodysceentestgetmethodid_3);



}

function objColdAgglutinin3(O='',time='')
{
    var obj =   {
                    labcoldagglutininid3:'',
                    labcoldagglutinincode3:'',
                    labcoldagglutinino3:O,
                    labcoldagglutinintime3:time,
                    labcoldagglutinin13:'',
                    labcoldagglutinin23:'',
                    labcoldagglutinin43:'',
                    labcoldagglutinin83:'',
                    labcoldagglutinin163:'',
                    labcoldagglutinin323:'',
                    labcoldagglutinin643:'',
                    labcoldagglutinin1283:'',
                    labcoldagglutinin2563:'',
                    labcoldagglutinin5123:'',
                    labcoldagglutinin10243:'',
                    labcoldagglutinin20483:''
                };
            
    return obj;
}

// End Set Data Tab 3

// Start ABO
var abocount3 = 0;
function addABOTest3(value=[]) {

    var table = document.getElementById("list_table_abo_3").rows.length;

    if(table == 2){
        if(value.length == 0)
        {
            value = {
                        labreagent3:'CAT',
                        lababoid3:'',
                        lababocode3:'',
                        lababoantia3:'',
                        lababoantib3:'',
                        lababoantiab3: '',
                        lababoacells3:'',
                        lababobcells3:'',
                        lababoocells3:'',
                        lababobloodgroup3:''
                    };
        
        }
    }
    else{
        if(value.length == 0)
        {
            value = {
                        labreagent3:'',
                        lababoid3:'',
                        lababocode3:'',
                        lababoantia3:'',
                        lababoantib3:'',
                        lababoantiab3: '',
                        lababoacells3:'',
                        lababobcells3:'',
                        lababoocells3:'',
                        lababobloodgroup3:''
                    };
        
        }  
    }
                      
    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table"  style="display:none;" >';
    event_data += JSON.stringify(value);
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<input type="text" id="labreagent3'+abocount3+'" value="'+value.labreagent3+'" name="labreagent3'+abocount3+'" onkeyup="setLabBloodReagent_3(this)" class="form-control">';
    
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="lababoantia3'+abocount3+'" name="lababoantia3'+abocount3+'" onchange="autoBlood3('+abocount3+',this,1)"  class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababoantib3'+abocount3+'" name="lababoantib3'+abocount3+'" onchange="autoBlood3('+abocount3+',this,2)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababoantiab3'+abocount3+'" name="lababoantiab3'+abocount3+'" onchange="autoBlood3('+abocount3+',this,3)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababoacells3'+abocount3+'" name="lababoacells3'+abocount3+'" onchange="autoBlood3('+abocount3+',this,4)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababobcells3'+abocount3+'" name="lababobcells3'+abocount3+'" onchange="autoBlood3('+abocount3+',this,5)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababoocells3'+abocount3+'" name="lababoocells3'+abocount3+'" onchange="autoBlood3('+abocount3+',this,6)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababobloodgroup3'+abocount3+'" name="lababobloodgroup3'+abocount3+'" onchange="confirmBloodgroupResult(this.value); setLabBloodABO_3(this);"  class="form-control select2"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">' ;
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';
    
    $("#list_table_abo_3").append(event_data);

    setABOTest0Serum("#lababoantia3"+abocount3,value.lababoantia3);
    setABOTest0Serum("#lababoantib3"+abocount3,value.lababoantib3);
    setABOTest0Serum("#lababoantiab3"+abocount3,value.lababoantiab3);
    setABOTest0Serum("#lababoacells3"+abocount3,value.lababoacells3);
    setABOTest0Serum("#lababobcells3"+abocount3,value.lababobcells3);
    setABOTest0Serum("#lababoocells3"+abocount3,value.lababoocells3);
    setBloodGroup("#lababobloodgroup3"+abocount3,value.lababobloodgroup3);

    $("#lababoantia3"+abocount3).val(value.lababoantia3);
    $("#lababoantib3"+abocount3).val(value.lababoantib3);
    $("#lababoantiab3"+abocount3).val(value.lababoantiab3);
    $("#lababoacells3"+abocount3).val(value.lababoacells3);
    $("#lababobcells3"+abocount3).val(value.lababobcells3);
    $("#lababoocells3"+abocount3).val(value.lababoocells3);
    

    $("#lababobloodgroup3"+abocount3).select2({
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

    $("#lababobloodgroup3"+abocount3).val(value.lababobloodgroup3);


    abocount3++;

    
    // $(".select2").select2({ 
    //     width: "100%", 
    //     theme: "bootstrap",
    //     placeholder: "",
    //     allowClear:true
    // })
}

function autoBlood3(indexcount3="0",self,col='')
{

    var antia = $("#lababoantia3"+indexcount3).val();
    var antib = $("#lababoantib3"+indexcount3).val();
    var antiab = $("#lababoantiab3"+indexcount3).val();
    var acells = $("#lababoacells3"+indexcount3).val();
    var bcells = $("#lababobcells3"+indexcount3).val();
    var ocells = $("#lababoocells3"+indexcount3).val();

    var ayu = document.getElementById("patientage").innerHTML;

    if(ayu == '1'){
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
                $("#labconfirmbloodgroupid_3").val("A").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("A").trigger("change");
                setBloodABO_3(self);
                noautoblood3(self);
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
                $("#labconfirmbloodgroupid_3").val("B").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("B").trigger("change");
                setBloodABO_3(self);
                noautoblood3(self);
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
                $("#labconfirmbloodgroupid_3").val("O").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("O").trigger("change");
                setBloodABO_3(self);
                noautoblood3(self);
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
                
                $("#labconfirmbloodgroupid_3").val("AB").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("AB").trigger("change");
                setBloodABO_3(self);
                noautoblood3(self);
                return false;
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_3").val("0").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("0").trigger("change");
                setBloodABO_3(self);
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
                $("#labconfirmbloodgroupid_3").val("A").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("A").trigger("change");
                setBloodABO_3(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_3").val("B").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("B").trigger("change");
                setBloodABO_3(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib == "1" || antib == "11") && 
                        (antiab == "1" || antiab == "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells != "1" || bcells != "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_3").val("O").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("O").trigger("change");
                setBloodABO_3(self);
            }else if(
                        (antia != "1" || antia != "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells == "1" || acells == "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11")
                    )
            {
                $("#labconfirmbloodgroupid_3").val("AB").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("AB").trigger("change");
                setBloodABO_3(self);
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_3").val("0").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("0").trigger("change");
                setBloodABO_3(self);
            }
        }else
        {
            $("#lababobloodgroup3"+indexcount3).val("0");
            setBloodABO_3(self);
        }
    }//////////////////
    else{
            if ((antia) && (antib) && (antia != "0") && (antib != "0") && (acells) && (bcells) && (acells != "0") && (bcells != "0"))
        {
            if( 
                ((antia != "11") && (antib == "11") && (bcells != "11") && (acells == "11")) ||
                ((antia != "1") && (antib == "1") && (bcells != "1") && (acells == "1"))
            )
            {
                $("#labconfirmbloodgroupid_3").val("A").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("A").trigger("change");
                setBloodABO_3(self);
                noautoblood3(self);
                return false;
            }else if(
                        ((antia == "11") && (antib != "11") && (bcells == "11") && (acells != "11")) ||
                        ((antia == "1") && (antib != "1") && (bcells == "1") && (acells != "1"))
                    )
            {
                $("#labconfirmbloodgroupid_3").val("B").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("B").trigger("change");
                setBloodABO_3(self);
                noautoblood3(self);
                return false;
            }else if(
                        ((antia == "11") && (antib == "11") && (bcells != "11") && (acells != "11")) ||
                        ((antia == "1") && (antib == "1") && (bcells != "1") && (acells != "1"))
                    )
            {
                $("#labconfirmbloodgroupid_3").val("O").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("O").trigger("change");
                setBloodABO_3(self);
                noautoblood3(self);
                return false;
            }else if(
                        ((antia != 11) && (antib != 11) && (bcells == 11) && (acells == 11)) ||
                        ((antia != 1) && (antib != 1) && (bcells == 1) && (acells == 1))
                    )
            {
                
                $("#labconfirmbloodgroupid_3").val("AB").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("AB").trigger("change");
                setBloodABO_3(self);
                noautoblood3(self);
                return false;
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_3").val("0").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("0").trigger("change");
                setBloodABO_3(self);
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
                $("#labconfirmbloodgroupid_3").val("A").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("A").trigger("change");
                setBloodABO_3(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_3").val("B").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("B").trigger("change");
                setBloodABO_3(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib == "1" || antib == "11") && 
                        (antiab == "1" || antiab == "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells != "1" || bcells != "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_3").val("O").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("O").trigger("change");
                setBloodABO_3(self);
            }else if(
                        (antia != "1" || antia != "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells == "1" || acells == "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11")
                    )
            {
                $("#labconfirmbloodgroupid_3").val("AB").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("AB").trigger("change");
                setBloodABO_3(self);
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_3").val("0").trigger("change");
                $("#lababobloodgroup3"+indexcount3).val("0").trigger("change");
                setBloodABO_3(self);
            }
        }else
        {
            $("#lababobloodgroup3"+indexcount3).val("0");
            setBloodABO_3(self);
        }
    }
   
}

function noautoblood3(self) {
    var rows = self.parentNode.parentNode;
    var item = JSON.parse(rows.cells[0].innerHTML);
    var table = document.getElementById("list_table_abo_3");
    var r = 1;
    var status0 = "";
    // alert(item.lababobloodgroup0);

    var patientbloodgroup = document.getElementById("patientbloodgroup").innerHTML;

    while (row = table.rows[r++]) {
        try {
            var blood = JSON.parse(document.getElementById("list_table_abo_3").rows[r].cells.item(0).innerHTML);  
        }
        catch(err) {
            console.log("err");
        }
        
        console.log(blood.lababobloodgroup3);
        if(item.lababobloodgroup3 != blood.lababobloodgroup3){
            // alert("5555555555");
            $("#labconfirmbloodgroupid_3").val("");
            $("#labconfirmbloodgroupid_3").trigger('change');
            return false;
        }
        else{
            if(patientbloodgroup == '-' || patientbloodgroup == '' || patientbloodgroup == 'ไม่ทราบ' || patientbloodgroup == "Discrepancy"){
                $("#labconfirmbloodgroupid_3").val(item.lababobloodgroup3);
                $("#labconfirmbloodgroupid_3").trigger('change');
            }
            else{
                if(patientbloodgroup != item.lababobloodgroup0){
                    bloodalert();
                }
                else{
                    $("#labconfirmbloodgroupid_3").val(item.lababobloodgroup3);
                    $("#labconfirmbloodgroupid_3").trigger('change');
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
var rhcount3 = 0;
function addRhTest3(value=[]) {
    var table = document.getElementById("list_table_rh_3").rows.length;

    if(table == 1){
        if(value.length == 0)
        {
            value = {
                        labrhreagent3:'CAT',
                        labrhid3:'',
                        labrhcode3:'',
                        labrhrt3:'',
                        lab37c3 : '',
                        labiat3:'',
                        labccc3:'',
                        labresult3:''
                    };
            
        }
    }
    else{
        if(value.length == 0)
        {
            value = {
                        labrhreagent3:'',
                        labrhid3:'',
                        labrhcode3:'',
                        labrhrt3:'',
                        lab37c3 : '',
                        labiat3:'',
                        labccc3:'',
                        labresult3:''
                    };
            
        }
    }
                                        
    var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        if(rhcount3 == 0){
        event_data += '<input  class="form-control" id="labrhreagent3'+rhcount3+'" name="labrhreagent3'+rhcount3+'" value="CAT" onkeyup="setLabRhReagent_3(this)" >';
        }
        else{
        event_data += '<input  class="form-control" id="labrhreagent3'+rhcount3+'" name="labrhreagent3'+rhcount3+'" value="'+value.labrhreagent3+'" onkeyup="setLabRhReagent_3(this)" >';
        }
        event_data += '</td>'
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labrhrt3'+rhcount3+'" name="labrhrt3'+rhcount3+'"  class="form-control" onchange="setLabRhRt_3(this); setpos3('+rhcount3+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="lab37c3'+rhcount3+'" name="lab37c3'+rhcount3+'" class="form-control" onchange="setLab37C_3(this); setpos3('+rhcount3+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labiat3'+rhcount3+'" name="labiat3'+rhcount3+'" class="form-control" onchange="setLabIAT_3(this); setpos3('+rhcount3+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labccc3'+rhcount3+'" name="labccc3'+rhcount3+'" class="form-control" onchange="setLabCCC_3(this); setpos3('+rhcount3+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labresult3'+rhcount3+'" name="labresult3'+rhcount3+'" class="form-control" onchange="setLabResult_3(this); "></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
    
    $("#list_table_rh_3").append(event_data);

    setABOTest0Serum("#labrhrt3"+rhcount3,value.labrhrt3);
    setABOTest0Serum("#lab37c3"+rhcount3,value.lab37c3);
    setABOTest0Serum("#labiat3"+rhcount3,value.labiat3);
    setABOTest0Serum("#labccc3"+rhcount3,value.labccc3);
    setRh2("#labresult3"+rhcount3,value.labresult3);

    $("#labrhrt3"+rhcount3).val(value.labrhrt3);
    $("#lab37c3"+rhcount3).val(value.lab37c3);
    $("#labiat3"+rhcount3).val(value.labiat3);
    $("#labccc3"+rhcount3).val(value.labccc3);

    $("#labresult3" + rhcount3).select2({
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


    $("#labresult3"+rhcount3).val(value.labresult3);
    
    rhcount3++;
}
// End Rh

// function setpos3(indexcount3,self,col='')
// {
//     var labrhrt3 = $("#labrhrt3"+indexcount3).val();
//     var lab37c3 = $("#lab37c3"+indexcount3).val();
//     var labiat3 = $("#labiat3"+indexcount3).val();
//     var labccc3 = $("#labccc3"+indexcount3).val();
//     var labresult3 = $("#labresult3"+indexcount3).val();

//     if(labrhrt3 > 1 || lab37c3 > 1 || labiat3 > 1 || labccc3 > 1 || labresult3 > 1){
//         $("#labconfirmrhid_3").val("Rh+");
//     }
// }

function setpos3(indexcount3,self,col='')
{
    var labrhrt3 = $("#labrhrt3"+indexcount3).val();
    var lab37c3 = $("#lab37c3"+indexcount3).val();
    var labiat3 = $("#labiat3"+indexcount3).val();
    var labccc3 = $("#labccc3"+indexcount3).val();
    var labresult3 = $("#labresult3"+indexcount3).val();

    if(labrhrt3 > 1 || lab37c3 > 1 || labiat3 > 1  ){

        setDataModalSelectValue(`labconfirmrhid_3`, 'Rh+', 'Positive');
        setDataModalSelectValue(`labresult3`+indexcount3, 'Rh+', 'Positive');
        confirmRhResult("Rh+");
        
    }else if(labrhrt3 == 1 || lab37c3 == 1 || labiat3 == 1  ){

        setDataModalSelectValue(`labconfirmrhid_3`, 'Rh-', 'Negative');
        setDataModalSelectValue(`labresult3`+indexcount3, 'Rh-', 'Negative');
        confirmRhResult("Rh-");
        
    }else 
    {
        setDataModalSelectValue(`labconfirmrhid_3`, '', '');
        setDataModalSelectValue(`labresult3`+indexcount3, '', '');
        confirmRhResult("");
    }
    noautopos3(self);
}

function noautopos3(self){
    var rows = self.parentNode.parentNode;
    var item = JSON.parse(rows.cells[0].innerHTML);

    var table = document.getElementById("list_table_rh_3");
    var r = 0;
    var status0 = "";
    // alert(item.labresult0);

    while (row = table.rows[r++]) {
        try {
            var bloodrh = JSON.parse(document.getElementById("list_table_rh_3").rows[r].cells.item(0).innerHTML);  
        }
        catch(err) {
            console.log("err");
        }
        
        // console.log(bloodrh);
        // alert(bloodrh);
        if(item.labresult3 != bloodrh.labresult3){
            // alert("5555555555");
            $("#labconfirmrhid_3").val("");
            $("#labconfirmrhid_3").trigger('change');
            return false;
        }
        else{
            $("#labconfirmrhid_3").val(item.labresult3);
            $("#labconfirmrhid_3").trigger('change');
        }
    }
}

// Start AntiSceeningTest
var anticount3 = 0;
function addAntiSceeningTest3(value=[]) {

        if(value.length == 0)
        {
            value = {
                        labantibodysceentestid3:'',
                        labantibodysceentest3:'',
                        labantibodysceentestp1mi3:'',
                        labantibodysceentesto13:'',
                        labantibodysceentesto23:'',
                        labantibodysceentesto33:'',
                        labantibodysceentestlotno3:''
                    };
            
        }
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest3'+anticount3+'" name="labantibodysceentest3'+anticount3+'" onchange="setLabAntibodySceenTest_3(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestp1mi3'+anticount3+'" name="labantibodysceentestp1mi3'+anticount3+'" onchange="setLabAntibodySceenTestp1mi_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto13'+anticount3+'" name="labantibodysceentesto13'+anticount3+'" onchange="setLabAntibodySceenTestO1_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto23'+anticount3+'"  name="labantibodysceentesto23'+anticount3+'" onchange="setLabAntibodySceenTestO2_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto33'+anticount3+'"  name="labantibodysceentesto33'+anticount3+'" onchange="setLabAntibodySceenTestO3_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno3'+anticount3+'"  name="labantibodysceentestlotno3'+anticount3+'" value="'+value.labantibodysceentestlotno3+'" onkeyup="setLabAntibodySceenTestLotno_3(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_3").append(event_data);

        setBloodAntiTest("#labantibodysceentest3"+anticount3,value.labantibodysceentest3);
        setABOTest0Serum("#labantibodysceentesto13"+anticount3,value.labantibodysceentesto13);
        setABOTest0Serum("#labantibodysceentesto23"+anticount3,value.labantibodysceentesto23);
        setABOTest0Serum("#labantibodysceentesto33"+anticount3,value.labantibodysceentesto33);

        $("#labantibodysceentest3"+anticount3).val(value.labantibodysceentest3);
        $("#labantibodysceentesto13"+anticount3).val(value.labantibodysceentesto13);
        $("#labantibodysceentesto23"+anticount3).val(value.labantibodysceentesto23);
        $("#labantibodysceentesto33"+anticount3).val(value.labantibodysceentesto33);
        anticount3++;
}

function addAntiSceeningTest3_null(value=[]) {

       
            value = {
                        labantibodysceentestid3:'',
                        labantibodysceentest3:'13',
                        labantibodysceentestp1mi3:'',
                        labantibodysceentesto13:'',
                        labantibodysceentesto23:'',
                        labantibodysceentesto33:'',
                        labantibodysceentestlotno3:''
                    };

            
            
        
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest3'+anticount3+'" name="labantibodysceentest3'+anticount3+'" onchange="setLabAntibodySceenTest_3(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestp1mi3'+anticount3+'" name="labantibodysceentestp1mi3'+anticount3+'" onchange="setLabAntibodySceenTestp1mi_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto13'+anticount3+'" name="labantibodysceentesto13'+anticount3+'" onchange="setLabAntibodySceenTestO1_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto23'+anticount3+'"  name="labantibodysceentesto23'+anticount3+'" onchange="setLabAntibodySceenTestO2_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto33'+anticount3+'"  name="labantibodysceentesto33'+anticount3+'" onchange="setLabAntibodySceenTestO3_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno3'+anticount3+'"  name="labantibodysceentestlotno3'+anticount3+'" value="'+value.labantibodysceentestlotno3+'" onkeyup="setLabAntibodySceenTestLotno_3(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        $("#list_table_anti_sceen_3").append(event_data);

        setBloodAntiTest("#labantibodysceentest3"+anticount3,value.labantibodysceentest3);
        setABOTest0Serum("#labantibodysceentestp1mi3"+anticount3,value.labantibodysceentestp1mi3);
        setABOTest0Serum("#labantibodysceentesto13"+anticount3,value.labantibodysceentesto13);
        setABOTest0Serum("#labantibodysceentesto23"+anticount3,value.labantibodysceentesto23);
        setABOTest0Serum("#labantibodysceentesto33"+anticount3,value.labantibodysceentesto33);

        $("#labantibodysceentest3"+anticount3).val("13");

        event_data = '';

        anticount3++;

        value = {
                        labantibodysceentestid3:'',
                        labantibodysceentest3:'6',
                        labantibodysceentestp1mi3:'',
                        labantibodysceentesto13:'',
                        labantibodysceentesto23:'',
                        labantibodysceentesto33:'',
                        labantibodysceentestlotno3:''
                    };

        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest3'+anticount3+'" name="labantibodysceentest3'+anticount3+'" onchange="setLabAntibodySceenTest_3(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestp1mi3'+anticount3+'" name="labantibodysceentestp1mi3'+anticount3+'" onchange="setLabAntibodySceenTestp1mi_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto13'+anticount3+'" name="labantibodysceentesto13'+anticount3+'" onchange="setLabAntibodySceenTestO1_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto23'+anticount3+'"  name="labantibodysceentesto23'+anticount3+'" onchange="setLabAntibodySceenTestO2_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto33'+anticount3+'"  name="labantibodysceentesto33'+anticount3+'" onchange="setLabAntibodySceenTestO3_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno3'+anticount3+'"  name="labantibodysceentestlotno3'+anticount3+'" value="'+value.labantibodysceentestlotno3+'" onkeyup="setLabAntibodySceenTestLotno_3(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
        
        $("#list_table_anti_sceen_3").append(event_data);

        

        setBloodAntiTest("#labantibodysceentest3"+anticount3,value.labantibodysceentest3);
        setABOTest0Serum("#labantibodysceentestp1mi3"+anticount3,value.labantibodysceentestp1mi3);
        setABOTest0Serum("#labantibodysceentesto13"+anticount3,value.labantibodysceentesto13);
        setABOTest0Serum("#labantibodysceentesto23"+anticount3,value.labantibodysceentesto23);
        setABOTest0Serum("#labantibodysceentesto33"+anticount3,value.labantibodysceentesto33);

        $("#labantibodysceentest3"+anticount3).val("4");
        anticount3++;
}
// End AntiSceeningTest

// Start Antibody identification test
var idencount3 = 0;
function addAntibodyIdenTest3(value=[]) {

        if(value.length == 0)
        {
            value = {
                labantibodyidentificationtestid3:'',
                labantibodyidentificationtest3:'',
                labantibodyidentificationtest13:'',
                labantibodyidentificationtest23:'',
                labantibodyidentificationtest33:'',
                labantibodyidentificationtest43:'',
                labantibodyidentificationtest53:'',
                labantibodyidentificationtest63:'',
                labantibodyidentificationtest73:'',
                labantibodyidentificationtest83:'',
                labantibodyidentificationtest93:'',
                labantibodyidentificationtest13:'',
                labantibodyidentificationtest11:'',
                labantibodyidentificationtestauto3:'',
                labantibodyidentificationtestlotno3:'',
            };
        }
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest3'+idencount3+'" name="labantibodyidentificationtest3'+idencount3+'"  onchange="setLabAntibodyIdentificationTest_3(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest13'+idencount3+'" name="labantibodyidentificationtest13'+idencount3+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest23'+idencount3+'" name="labantibodyidentificationtest23'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest33'+idencount3+'" name="labantibodyidentificationtest33'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest43'+idencount3+'" name="labantibodyidentificationtest43'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest53'+idencount3+'" name="labantibodyidentificationtest53'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest63'+idencount3+'" name="labantibodyidentificationtest63'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest73'+idencount3+'" name="labantibodyidentificationtest73'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest83'+idencount3+'" name="labantibodyidentificationtest83'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest93'+idencount3+'" name="labantibodyidentificationtest93'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest103'+idencount3+'" name="labantibodyidentificationtest103'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest113'+idencount3+'" name="labantibodyidentificationtest113'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto3'+idencount3+'" name="labantibodyidentificationtestauto3'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno3'+idencount3+'" value="'+value.labantibodyidentificationtestlotno3+'" name="labantibodyidentificationtestlotno3'+idencount3+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_3(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_iden_3").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtest3"+idencount3,value.labantibodyidentificationtest3);
        setABOTest0Serum("#labantibodyidentificationtest13"+idencount3,value.labantibodyidentificationtest13);
        setABOTest0Serum("#labantibodyidentificationtest23"+idencount3,value.labantibodyidentificationtest23);
        setABOTest0Serum("#labantibodyidentificationtest33"+idencount3,value.labantibodyidentificationtest33);
        setABOTest0Serum("#labantibodyidentificationtest43"+idencount3,value.labantibodyidentificationtest43);
        setABOTest0Serum("#labantibodyidentificationtest53"+idencount3,value.labantibodyidentificationtest53);
        setABOTest0Serum("#labantibodyidentificationtest63"+idencount3,value.labantibodyidentificationtest63);
        setABOTest0Serum("#labantibodyidentificationtest73"+idencount3,value.labantibodyidentificationtest73);
        setABOTest0Serum("#labantibodyidentificationtest83"+idencount3,value.labantibodyidentificationtest83);
        setABOTest0Serum("#labantibodyidentificationtest93"+idencount3,value.labantibodyidentificationtest93);
        setABOTest0Serum("#labantibodyidentificationtest103"+idencount3,value.labantibodyidentificationtest103);
        setABOTest0Serum("#labantibodyidentificationtest113"+idencount3,value.labantibodyidentificationtest113);
        setABOTest0Serum("#labantibodyidentificationtestauto3"+idencount3,value.labantibodyidentificationtestauto3);

        $("#labantibodyidentificationtest3"+idencount3).val(value.labantibodyidentificationtest3);
        $("#labantibodyidentificationtest13"+idencount3).val(value.labantibodyidentificationtest13);
        $("#labantibodyidentificationtest23"+idencount3).val(value.labantibodyidentificationtest23);
        $("#labantibodyidentificationtest33"+idencount3).val(value.labantibodyidentificationtest33);
        $("#labantibodyidentificationtest43"+idencount3).val(value.labantibodyidentificationtest43);
        $("#labantibodyidentificationtest53"+idencount3).val(value.labantibodyidentificationtest53);
        $("#labantibodyidentificationtest63"+idencount3).val(value.labantibodyidentificationtest63);
        $("#labantibodyidentificationtest73"+idencount3).val(value.labantibodyidentificationtest73);
        $("#labantibodyidentificationtest83"+idencount3).val(value.labantibodyidentificationtest83);
        $("#labantibodyidentificationtest93"+idencount3).val(value.labantibodyidentificationtest93);
        $("#labantibodyidentificationtest103"+idencount3).val(value.labantibodyidentificationtest103);
        $("#labantibodyidentificationtest113"+idencount3).val(value.labantibodyidentificationtest113);
        $("#labantibodyidentificationtestauto3"+idencount3).val(value.labantibodyidentificationtestauto3);
    
        idencount3++;
  }

  function addAntibodyIdenTest3_null(value=[]) {

        
            value = {
                labantibodyidentificationtestid3:'',
                labantibodyidentificationtest3:'13',
                labantibodyidentificationtest13:'',
                labantibodyidentificationtest23:'',
                labantibodyidentificationtest33:'',
                labantibodyidentificationtest43:'',
                labantibodyidentificationtest53:'',
                labantibodyidentificationtest63:'',
                labantibodyidentificationtest73:'',
                labantibodyidentificationtest83:'',
                labantibodyidentificationtest93:'',
                labantibodyidentificationtest13:'',
                labantibodyidentificationtest11:'',
                labantibodyidentificationtestauto3:'',
                labantibodyidentificationtestlotno3:'',
            };
        
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest3'+idencount3+'" name="labantibodyidentificationtest3'+idencount3+'"  onchange="setLabAntibodyIdentificationTest_3(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest13'+idencount3+'" name="labantibodyidentificationtest13'+idencount3+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest23'+idencount3+'" name="labantibodyidentificationtest23'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest33'+idencount3+'" name="labantibodyidentificationtest33'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest43'+idencount3+'" name="labantibodyidentificationtest43'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest53'+idencount3+'" name="labantibodyidentificationtest53'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest63'+idencount3+'" name="labantibodyidentificationtest63'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest73'+idencount3+'" name="labantibodyidentificationtest73'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest83'+idencount3+'" name="labantibodyidentificationtest83'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest93'+idencount3+'" name="labantibodyidentificationtest93'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest103'+idencount3+'" name="labantibodyidentificationtest103'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest113'+idencount3+'" name="labantibodyidentificationtest113'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto3'+idencount3+'" name="labantibodyidentificationtestauto3'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno3'+idencount3+'" value="'+value.labantibodyidentificationtestlotno3+'" name="labantibodyidentificationtestlotno3'+idencount3+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_3(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        $("#list_table_anti_iden_3").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtest3"+idencount3,value.labantibodyidentificationtest3);
        setABOTest0Serum("#labantibodyidentificationtest13"+idencount3,value.labantibodyidentificationtest13);
        setABOTest0Serum("#labantibodyidentificationtest23"+idencount3,value.labantibodyidentificationtest23);
        setABOTest0Serum("#labantibodyidentificationtest33"+idencount3,value.labantibodyidentificationtest33);
        setABOTest0Serum("#labantibodyidentificationtest43"+idencount3,value.labantibodyidentificationtest43);
        setABOTest0Serum("#labantibodyidentificationtest53"+idencount3,value.labantibodyidentificationtest53);
        setABOTest0Serum("#labantibodyidentificationtest63"+idencount3,value.labantibodyidentificationtest63);
        setABOTest0Serum("#labantibodyidentificationtest73"+idencount3,value.labantibodyidentificationtest73);
        setABOTest0Serum("#labantibodyidentificationtest83"+idencount3,value.labantibodyidentificationtest83);
        setABOTest0Serum("#labantibodyidentificationtest93"+idencount3,value.labantibodyidentificationtest93);
        setABOTest0Serum("#labantibodyidentificationtest103"+idencount3,value.labantibodyidentificationtest103);
        setABOTest0Serum("#labantibodyidentificationtest113"+idencount3,value.labantibodyidentificationtest113);
        setABOTest0Serum("#labantibodyidentificationtestauto3"+idencount3,value.labantibodyidentificationtestauto3);

        $("#labantibodyidentificationtest3"+idencount3).val(13);

        event_data = '';

        idencount3++;

        value = {
                labantibodyidentificationtestid3:'',
                labantibodyidentificationtest3:'6',
                labantibodyidentificationtest13:'',
                labantibodyidentificationtest23:'',
                labantibodyidentificationtest33:'',
                labantibodyidentificationtest43:'',
                labantibodyidentificationtest53:'',
                labantibodyidentificationtest63:'',
                labantibodyidentificationtest73:'',
                labantibodyidentificationtest83:'',
                labantibodyidentificationtest93:'',
                labantibodyidentificationtest13:'',
                labantibodyidentificationtest11:'',
                labantibodyidentificationtestauto3:'',
                labantibodyidentificationtestlotno3:'',
            };

        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest3'+idencount3+'" name="labantibodyidentificationtest3'+idencount3+'"  onchange="setLabAntibodyIdentificationTest_3(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest13'+idencount3+'" name="labantibodyidentificationtest13'+idencount3+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest23'+idencount3+'" name="labantibodyidentificationtest23'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest33'+idencount3+'" name="labantibodyidentificationtest33'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest43'+idencount3+'" name="labantibodyidentificationtest43'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest53'+idencount3+'" name="labantibodyidentificationtest53'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest63'+idencount3+'" name="labantibodyidentificationtest63'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest73'+idencount3+'" name="labantibodyidentificationtest73'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest83'+idencount3+'" name="labantibodyidentificationtest83'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest93'+idencount3+'" name="labantibodyidentificationtest93'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest103'+idencount3+'" name="labantibodyidentificationtest103'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest113'+idencount3+'" name="labantibodyidentificationtest113'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto3'+idencount3+'" name="labantibodyidentificationtestauto3'+idencount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno3'+idencount3+'" value="'+value.labantibodyidentificationtestlotno3+'" name="labantibodyidentificationtestlotno3'+idencount3+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_3(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_iden_3").append(event_data);

        
        setBloodAntiTest("#labantibodyidentificationtest3"+idencount3,value.labantibodyidentificationtest3);
        setABOTest0Serum("#labantibodyidentificationtest13"+idencount3,value.labantibodyidentificationtest13);
        setABOTest0Serum("#labantibodyidentificationtest23"+idencount3,value.labantibodyidentificationtest23);
        setABOTest0Serum("#labantibodyidentificationtest33"+idencount3,value.labantibodyidentificationtest33);
        setABOTest0Serum("#labantibodyidentificationtest43"+idencount3,value.labantibodyidentificationtest43);
        setABOTest0Serum("#labantibodyidentificationtest53"+idencount3,value.labantibodyidentificationtest53);
        setABOTest0Serum("#labantibodyidentificationtest63"+idencount3,value.labantibodyidentificationtest63);
        setABOTest0Serum("#labantibodyidentificationtest73"+idencount3,value.labantibodyidentificationtest73);
        setABOTest0Serum("#labantibodyidentificationtest83"+idencount3,value.labantibodyidentificationtest83);
        setABOTest0Serum("#labantibodyidentificationtest93"+idencount3,value.labantibodyidentificationtest93);
        setABOTest0Serum("#labantibodyidentificationtest103"+idencount3,value.labantibodyidentificationtest103);
        setABOTest0Serum("#labantibodyidentificationtest113"+idencount3,value.labantibodyidentificationtest113);
        setABOTest0Serum("#labantibodyidentificationtestauto3"+idencount3,value.labantibodyidentificationtestauto3);

        $("#labantibodyidentificationtest3"+idencount3).val(6);
    
        idencount3++;
  }
// End Antibody identification test

// Start Saliva test
var salivacount3 = 0;
function addSalivaTest3(value=[]) {
                      
    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table"  style="display:none;" >';
    event_data += JSON.stringify(value);
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += value.labsalivatest3;
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatestacells3'+salivacount3+'" name="labsalivatestacells3'+salivacount3+'" onchange="setLabSalivatestACells_3(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatestbcells3'+salivacount3+'" name="labsalivatestbcells3'+salivacount3+'" onchange="setLabSalivatestBCells_3(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatesotcells3'+salivacount3+'" name="labsalivatesotcells3'+salivacount3+'" onchange="setLabSalivatestOCells_3(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '</tr>';
    
    $("#list_table_saliva_3").append(event_data);

    setBloodGroupSerum("#labsalivatestacells3"+salivacount3,value.labsalivatestacells3);
    setBloodGroupSerum("#labsalivatestbcells3"+salivacount3,value.labsalivatestbcells3);
    setBloodGroupSerum("#labsalivatesotcells3"+salivacount3,value.labsalivatesotcells3);

    $("#labsalivatestacells3"+salivacount3).val(value.labsalivatestacells3);
    $("#labsalivatestbcells3"+salivacount3).val(value.labsalivatestbcells3);
    $("#labsalivatesotcells3"+salivacount3).val(value.labsalivatesotcells3);

    salivacount3++;
}
// End Saliva test


// Start Titration
var titrationcount3 = 0;
function addTitration3(value=[]) {

        if(value.length == 0)
        {
            value = {
                labtitrationid3:'',
                labtitrationantiserum3:'',
                labtitrationcell3:'',
                labtitration13:'',
                labtitration23:'',
                labtitration43:'',
                labtitration83:'',
                labtitration163:'',
                labtitration323:'',
                labtitration643:'',
                labtitration1283:'',
                labtitration2563:'',
                labtitration5123:'',
                labtitration10243:'',
                labtitration20483:'',
                labtitrationtiter3:''
            };
        }

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labtitrationantiserum3'+titrationcount3+'" name="labtitrationantiserum3'+titrationcount3+'"  onchange="setLabTitrationAntiSerum_3(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitrationcell3'+titrationcount3+'" name="labtitrationcell3'+titrationcount3+'"  class="form-control" onchange="setLabTitrationCell_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration13'+titrationcount3+'" name="labtitration13'+titrationcount3+'" class="form-control" onchange="setLabTitration1_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration23'+titrationcount3+'" name="labtitration23'+titrationcount3+'" class="form-control" onchange="setLabTitration2_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration43'+titrationcount3+'" name="labtitration43'+titrationcount3+'" class="form-control" onchange="setLabTitration4_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration83'+titrationcount3+'" name="labtitration83'+titrationcount3+'" class="form-control" onchange="setLabTitration8_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration163'+titrationcount3+'" name="labtitration163'+titrationcount3+'" class="form-control" onchange="setLabTitration16_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration323'+titrationcount3+'" name="labtitration323'+titrationcount3+'" class="form-control" onchange="setLabTitration32_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration643'+titrationcount3+'" name="labtitration643'+titrationcount3+'" class="form-control" onchange="setLabTitration64_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration1283'+titrationcount3+'" name="labtitration1283'+titrationcount3+'" class="form-control" onchange="setLabTitration128_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration2563'+titrationcount3+'" name="labtitration2563'+titrationcount3+'" class="form-control" onchange="setLabTitration256_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration5123'+titrationcount3+'" name="labtitration5123'+titrationcount3+'" class="form-control" onchange="setLabTitration512_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration10243'+titrationcount3+'" name="labtitration10243'+titrationcount3+'" class="form-control" onchange="setLabTitration1024_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration20483'+titrationcount3+'" name="labtitration20483'+titrationcount3+'" class="form-control" onchange="setLabTitration2048_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitrationtiter3'+titrationcount3+'" name="labtitrationtiter3'+titrationcount3+'" class="form-control" onchange="setLabTitrationTiter3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid3'+titrationcount3+'" value="'+titrationcount3+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_titration_3").append(event_data);

        setBloodAntiTest("#labtitrationantiserum3"+titrationcount3,value.labtitrationantiserum3);
        setABOTest0Serum("#labtitrationcell3"+titrationcount3,value.labtitrationcell3);
        setABOTest0Serum("#labtitration13"+titrationcount3,value.labtitration13);
        setABOTest0Serum("#labtitration23"+titrationcount3,value.labtitration23);
        setABOTest0Serum("#labtitration43"+titrationcount3,value.labtitration43);
        setABOTest0Serum("#labtitration83"+titrationcount3,value.labtitration83);
        setABOTest0Serum("#labtitration163"+titrationcount3,value.labtitration163);
        setABOTest0Serum("#labtitration323"+titrationcount3,value.labtitration323);
        setABOTest0Serum("#labtitration643"+titrationcount3,value.labtitration643);
        setABOTest0Serum("#labtitration1283"+titrationcount3,value.labtitration1283);
        setABOTest0Serum("#labtitration2563"+titrationcount3,value.labtitration2563);
        setABOTest0Serum("#labtitration5123"+titrationcount3,value.labtitration5123);
        setABOTest0Serum("#labtitration10243"+titrationcount3,value.labtitration10243);
        setABOTest0Serum("#labtitration20483"+titrationcount3,value.labtitration20483);
        setRh2("#labtitrationtiter3"+titrationcount3,value.labtitrationtiter3);

        $("#labtitrationantiserum3"+titrationcount3).val(value.labtitrationantiserum3);
        $("#labtitrationcell3"+titrationcount3).val(value.labtitrationcell3);
        $("#labtitration13"+titrationcount3).val(value.labtitration13);
        $("#labtitration23"+titrationcount3).val(value.labtitration23);
        $("#labtitration43"+titrationcount3).val(value.labtitration43);
        $("#labtitration83"+titrationcount3).val(value.labtitration83);
        $("#labtitration163"+titrationcount3).val(value.labtitration163);
        $("#labtitration323"+titrationcount3).val(value.labtitration323);
        $("#labtitration643"+titrationcount3).val(value.labtitration643);
        $("#labtitration1283"+titrationcount3).val(value.labtitration1283);
        $("#labtitration2563"+titrationcount3).val(value.labtitration2563);
        $("#labtitration5123"+titrationcount3).val(value.labtitration5123);
        $("#labtitration10243"+titrationcount3).val(value.labtitration10243);
        $("#labtitration20483"+titrationcount3).val(value.labtitration20483);
        $("#labtitrationtiter3"+titrationcount3).val(value.labtitrationtiter3);
    
        titrationcount3++;
  }
// End Titration

// Start Titration
var coldagglutinincount3 = 0;
function addColdAgglutinin3(value=[]) {

        if(value.length == 0)
        {
            value = {
                labcoldagglutininid3:'',
                labcoldagglutinino3:'',
                labcoldagglutinintime3:'',
                labcoldagglutinin13:'',
                labcoldagglutinin23:'',
                labcoldagglutinin43:'',
                labcoldagglutinin83:'',
                labcoldagglutinin163:'',
                labcoldagglutinin323:'',
                labcoldagglutinin643:'',
                labcoldagglutinin1283:'',
                labcoldagglutinin2563:'',
                labcoldagglutinin5123:'',
                labcoldagglutinin10243:'',
                labcoldagglutinin20483:'',
                labcoldagglutinintiter3:''
            };
        }

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += value.labcoldagglutinino3;
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += value.labcoldagglutinintime3;
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin13'+coldagglutinincount3+'" name="labcoldagglutinin13'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin1_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin23'+coldagglutinincount3+'" name="labcoldagglutinin23'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin2_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin43'+coldagglutinincount3+'" name="labcoldagglutinin43'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin4_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin83'+coldagglutinincount3+'" name="labcoldagglutinin83'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin8_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin163'+coldagglutinincount3+'" name="labcoldagglutinin163'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin16_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin323'+coldagglutinincount3+'" name="labcoldagglutinin323'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin32_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin643'+coldagglutinincount3+'" name="labcoldagglutinin643'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin64_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin1283'+coldagglutinincount3+'" name="labcoldagglutinin1283'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin128_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin2563'+coldagglutinincount3+'" name="labcoldagglutinin2563'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin256_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin5123'+coldagglutinincount3+'" name="labcoldagglutinin5123'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin512_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin10243'+coldagglutinincount3+'" name="labcoldagglutinin10243'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin1024_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin20483'+coldagglutinincount3+'" name="labcoldagglutinin20483'+coldagglutinincount3+'" class="form-control" onchange="setLabColdAgglutinin2048_3(this)"></select>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_coldagglutinin_3").append(event_data);

        setABOTest0Serum("#labcoldagglutinin13"+coldagglutinincount3,value.labcoldagglutinin13);
        setABOTest0Serum("#labcoldagglutinin23"+coldagglutinincount3,value.labcoldagglutinin23);
        setABOTest0Serum("#labcoldagglutinin43"+coldagglutinincount3,value.labcoldagglutinin43);
        setABOTest0Serum("#labcoldagglutinin83"+coldagglutinincount3,value.labcoldagglutinin83);
        setABOTest0Serum("#labcoldagglutinin163"+coldagglutinincount3,value.labcoldagglutinin163);
        setABOTest0Serum("#labcoldagglutinin323"+coldagglutinincount3,value.labcoldagglutinin323);
        setABOTest0Serum("#labcoldagglutinin643"+coldagglutinincount3,value.labcoldagglutinin643);
        setABOTest0Serum("#labcoldagglutinin1283"+coldagglutinincount3,value.labcoldagglutinin1283);
        setABOTest0Serum("#labcoldagglutinin2563"+coldagglutinincount3,value.labcoldagglutinin2563);
        setABOTest0Serum("#labcoldagglutinin5123"+coldagglutinincount3,value.labcoldagglutinin5123);
        setABOTest0Serum("#labcoldagglutinin10243"+coldagglutinincount3,value.labcoldagglutinin10243);
        setABOTest0Serum("#labcoldagglutinin20483"+coldagglutinincount3,value.labcoldagglutinin20483);

        
        $("#labcoldagglutinin13"+coldagglutinincount3).val(value.labcoldagglutinin13);
        $("#labcoldagglutinin23"+coldagglutinincount3).val(value.labcoldagglutinin23);
        $("#labcoldagglutinin43"+coldagglutinincount3).val(value.labcoldagglutinin43);
        $("#labcoldagglutinin83"+coldagglutinincount3).val(value.labcoldagglutinin83);
        $("#labcoldagglutinin163"+coldagglutinincount3).val(value.labcoldagglutinin163);
        $("#labcoldagglutinin323"+coldagglutinincount3).val(value.labcoldagglutinin323);
        $("#labcoldagglutinin643"+coldagglutinincount3).val(value.labcoldagglutinin643);
        $("#labcoldagglutinin1283"+coldagglutinincount3).val(value.labcoldagglutinin1283);
        $("#labcoldagglutinin2563"+coldagglutinincount3).val(value.labcoldagglutinin2563);
        $("#labcoldagglutinin5123"+coldagglutinincount3).val(value.labcoldagglutinin5123);
        $("#labcoldagglutinin10243"+coldagglutinincount3).val(value.labcoldagglutinin10243);
        $("#labcoldagglutinin20483"+coldagglutinincount3).val(value.labcoldagglutinin20483);
    
        coldagglutinincount3++;
  }
// End Titration


// Start Antibody identification test Get Method
var idengetmethodcount3 = 0;
function addAntibodyIdenTestGetMethod3(value=[]) {

        if(value.length == 0)
        {
            value = {
                labantibodyidentificationtestgetmethodid3:'',
                labantibodyidentificationtestgetmethod3:'',
                labantibodyidentificationtestgetmethod13:'',
                labantibodyidentificationtestgetmethod23: '',
                labantibodyidentificationtestgetmethod33:'',
                labantibodyidentificationtestgetmethod43:'',
                labantibodyidentificationtestgetmethod53:'',
                labantibodyidentificationtestgetmethod63:'',
                labantibodyidentificationtestgetmethod73:'',
                labantibodyidentificationtestgetmethod83:'',
                labantibodyidentificationtestgetmethod93:'',
                labantibodyidentificationtestgetmethod103:'',
                labantibodyidentificationtestgetmethod113:'',
                labantibodyidentificationtestgetmethodauto3:'',
                labantibodyidentificationtestgetmethodantibody3:'',
                labantibodyidentificationtestgetmethodlotno3:'',
            };
        }
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtestgetmethod3'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod3'+idengetmethodcount3+'"  onchange="setLabAntibodyIdentificationTestGetMethod_3(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod13'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod13'+idengetmethodcount3+'"  class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod1_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod23'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod23'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod2_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod33'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod33'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod3_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod43'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod43'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod4_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod53'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod53'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod5_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod63'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod63'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod6_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod73'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod73'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod7_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod83'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod83'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod8_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod93'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod93'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod9_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod103'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod103'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod10_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod113'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethod113'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod11_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethodauto3'+idengetmethodcount3+'" name="labantibodyidentificationtestgetmethodauto3'+idengetmethodcount3+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethodAuto_3(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestgetmethodantibody3'+idengetmethodcount3+'" value="'+value.labantibodyidentificationtestgetmethodantibody3+'" name="labantibodyidentificationtestgetmethodantibody3'+idengetmethodcount3+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestGetMethodAntibody_3(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestgetmethodlotno3'+idengetmethodcount3+'" value="'+value.labantibodyidentificationtestgetmethodlotno3+'" name="labantibodyidentificationtestgetmethodlotno3'+idengetmethodcount3+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestGetMethodLotno_3(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid3'+idengetmethodcount3+'" value="'+idengetmethodcount3+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_iden_get_method_3").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtestgetmethod3"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod3);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod13"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod13);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod23"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod23);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod33"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod33);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod43"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod43);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod53"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod53);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod63"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod63);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod73"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod73);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod83"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod83);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod93"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod93);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod103"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod103);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod113"+idengetmethodcount3,value.labantibodyidentificationtestgetmethod113);
        setABOTest0Serum("#labantibodyidentificationtestgetmethodauto3"+idengetmethodcount3,value.labantibodyidentificationtestgetmethodauto3);

        $("#labantibodyidentificationtestgetmethod3"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod3);
        $("#labantibodyidentificationtestgetmethod13"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod13);
        $("#labantibodyidentificationtestgetmethod23"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod23);
        $("#labantibodyidentificationtestgetmethod33"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod33);
        $("#labantibodyidentificationtestgetmethod43"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod43);
        $("#labantibodyidentificationtestgetmethod53"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod53);
        $("#labantibodyidentificationtestgetmethod63"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod63);
        $("#labantibodyidentificationtestgetmethod73"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod73);
        $("#labantibodyidentificationtestgetmethod83"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod83);
        $("#labantibodyidentificationtestgetmethod93"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod93);
        $("#labantibodyidentificationtestgetmethod103"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod103);
        $("#labantibodyidentificationtestgetmethod113"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethod113);
        $("#labantibodyidentificationtestgetmethodauto3"+idengetmethodcount3).val(value.labantibodyidentificationtestgetmethodauto3);
    
        idengetmethodcount3++;
  }
// End Antibody identification test Get Method


// Start AntiSceeningTest Get Method
var anticountgetmethod3 = 0;
function addAntiSceeningTestGetMethod3(value=[]) {

        if(value.length == 0)
        {
            value = {
                        labantibodysceentestgetmethodid3:'',
                        labantibodysceentestgetmethodtest3:'',
                        labantibodysceentestgetmethodp1mi3:'',
                        labantibodysceentestgetmethodo13:'',
                        labantibodysceentestgetmethodo23:'',
                        labantibodysceentestgetmethodo33:'',
                        labantibodysceentestgetmethodenz3:'',
                        labantibodysceentestgetmethodlotno3:''
                    };
            
        }
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodtest3'+anticountgetmethod3+'" name="labantibodysceentestgetmethodtest3'+anticountgetmethod3+'" onchange="setLabAntibodySceenTestGetMethod_3(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodp1mi3'+anticountgetmethod3+'" name="labantibodysceentestgetmethodp1mi3'+anticountgetmethod3+'" onchange="setLabAntibodySceenTestGetMethodP1ma_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo13'+anticountgetmethod3+'" name="labantibodysceentestgetmethodo13'+anticountgetmethod3+'" onchange="setLabAntibodySceenTestGetMethodO1_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo23'+anticountgetmethod3+'"  name="labantibodysceentestgetmethodo23'+anticountgetmethod3+'" onchange="setLabAntibodySceenTestGetMethodO2_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo33'+anticountgetmethod3+'"  name="labantibodysceentestgetmethodo33'+anticountgetmethod3+'" onchange="setLabAntibodySceenTestGetMethodO3_3(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodenz3'+anticountgetmethod3+'"  name="labantibodysceentestgetmethodenz3'+anticountgetmethod3+'" value="'+value.labantibodysceentestgetmethodenz3+'" onkeyup="setLabAntibodySceenTestGetMethodEnz3_3(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodlotno3'+anticountgetmethod3+'"  name="labantibodysceentestgetmethodlotno3'+anticountgetmethod3+'" value="'+value.labantibodysceentestgetmethodlotno3+'" onkeyup="setLabAntibodySceenTestGetMethodLotno_3(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<input type="hidden"  name="donateantisceenid3'+anticountgetmethod3+'" value="'+anticountgetmethod3+'" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_get_method_3").append(event_data);

        setBloodAntiTest("#labantibodysceentestgetmethodtest3"+anticountgetmethod3,value.labantibodysceentestgetmethodtest3);
        setABOTest0Serum("#labantibodysceentestgetmethodp1mi3"+anticountgetmethod3,value.labantibodysceentestgetmethodp1mi3);
        setABOTest0Serum("#labantibodysceentestgetmethodo13"+anticountgetmethod3,value.labantibodysceentestgetmethodo13);
        setABOTest0Serum("#labantibodysceentestgetmethodo23"+anticountgetmethod3,value.labantibodysceentestgetmethodo23);
        setABOTest0Serum("#labantibodysceentestgetmethodo33"+anticountgetmethod3,value.labantibodysceentestgetmethodo33);

        $("#labantibodysceentestgetmethodtest3"+anticountgetmethod3).val(value.labantibodysceentestgetmethodtest3);
        $("#labantibodysceentestgetmethodp1mi3"+anticountgetmethod3).val(value.labantibodysceentestgetmethodp1mi3);
        $("#labantibodysceentestgetmethodo13"+anticountgetmethod3).val(value.labantibodysceentestgetmethodo13);
        $("#labantibodysceentestgetmethodo23"+anticountgetmethod3).val(value.labantibodysceentestgetmethodo23);
        $("#labantibodysceentestgetmethodo33"+anticountgetmethod3).val(value.labantibodysceentestgetmethodo33);
        anticountgetmethod3++;
}
// End AntiSceeningTest Get Method

