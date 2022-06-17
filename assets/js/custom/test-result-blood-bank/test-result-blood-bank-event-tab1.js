// Start Set Data Tab 1
function setValueItemTab1(data)
{
    $("#adsorption1").val(data.adsorption1);
    $("#elution1").val(data.elution1);
    $("#labremark1").val(data.labremark1);

    // Phenotype
    document.getElementById('antibody1').value = data.antibody1;
    document.getElementById('antibodyLable1').innerHTML = data.antibody1;
    
    document.getElementById('phenotype1').value = data.phenotype1;
    document.getElementById('phenotypedisplay1').value = data.phenotypedisplay1;
    document.getElementById('phenotypeLable1').innerHTML = data.phenotypedisplay1;
    
    // ABO
    removeRowTable('list_table_abo_1');
    $.each(data.lab_abo_item_1, function (index, value) {
        addABOTest1(value);
    });
    if(data.lab_abo_item_1 == ''){
        addABOTest1();
    }
    
    setBloodGroup("#labconfirmbloodgroupid_1");
    $("#labconfirmbloodgroupid_1").val(data.labconfirmbloodgroupid_1);

    setABOTest0Serum("#labantia1_1");
    setABOTest0Serum("#labantih_1");
    setABOTest0Serum("#laba2cells_1");
    $("#labantia1_1").val(data.labantia1_1);
    $("#labantih_1").val(data.labantih_1);
    $("#laba2cells_1").val(data.laba2cells_1);

    // Rh
    removeRowTable('list_table_rh_1');
    $.each(data.lab_rh_item_1, function (index, value) {
        addRhTest1(value);
    });
    if(data.lab_rh_item_1 == ''){
        addRhTest1();
    }

    setRh2("#labconfirmrhid_1");

    $("#labconfirmrhid_1").val(data.labconfirmrhid_1);

    // Antibody Sceening test    
    removeRowTable('list_table_anti_sceen_1');
    $.each(data.lab_antibodysceentest_item_1, function (index, value) {
        addAntiSceeningTest1(value);
    });
    if(data.lab_antibodysceentest_item_1 == ''){
        addAntiSceeningTest1_null();
    }
    setBloodGroupSerum("#labconfirmantibodysceentestid_1",data.labconfirmantibodysceentestid_1);
    $("#labconfirmantibodysceentestid_1").val(data.labconfirmantibodysceentestid_1);
    
    // DAT
    setABOTest0Serum("#lab_dat_poly_1");
    setABOTest0Serum("#lab_dat_igg_1");
    setABOTest0Serum("#lab_dat_c3d_1");
    setABOTest0Serum("#lab_dat_ccc_1");
    $("#lab_dat_poly_1").val(data.lab_dat_poly_1);
    $("#lab_dat_igg_1").val(data.lab_dat_igg_1);
    $("#lab_dat_c3d_1").val(data.lab_dat_c3d_1);
    $("#lab_dat_ccc_1").val(data.lab_dat_ccc_1);

    // Antibody identification test
    removeRowTable('list_table_anti_iden_1');
    $.each(data.lab_antibodyidentificationtest_item_1, function (index, value) {
        addAntibodyIdenTest1(value);
    });
    if(data.lab_antibodyidentificationtest_item_1 == ''){
        addAntibodyIdenTest1_null();
    }

    //  Rh typing
    document.getElementById("lab_rhtype_d_1+").checked = (data.lab_rhtype_d_1 == '+')
    document.getElementById("lab_rhtype_d_1-").checked = (data.lab_rhtype_d_1 == '-')

    document.getElementById("lab_rhtype_c_1+").checked = (data.lab_rhtype_c_1 == '+')
    document.getElementById("lab_rhtype_c_1-").checked = (data.lab_rhtype_c_1 == '-')

    document.getElementById("lab_rhtype_e_1+").checked = (data.lab_rhtype_e_1 == '+')
    document.getElementById("lab_rhtype_e_1-").checked = (data.lab_rhtype_e_1 == '-')

    document.getElementById("lab_rhtype_c2_1+").checked = (data.lab_rhtype_c2_1 == '+')
    document.getElementById("lab_rhtype_c2_1-").checked = (data.lab_rhtype_c2_1 == '-')

    document.getElementById("lab_rhtype_e2_1+").checked = (data.lab_rhtype_e2_1 == '+')
    document.getElementById("lab_rhtype_e2_1-").checked = (data.lab_rhtype_e2_1 == '-')


    settritation("#lab_rhtype_result_id_1");
    $("#lab_rhtype_result_id_1").val(data.lab_rhtype_result_id_1);

    // Saliva
    removeRowTable('list_table_saliva_1');

    if(data.lab_salivatest_item_1.length == 0)
    {
        data.lab_salivatest_item_1 = [
                                        {
                                            labsalivatestid1:'',
                                            labsalivatest1:"RT 5-60`",
                                            labsalivatestacells1:'',
                                            labsalivatestbcells1 : '',
                                            labsalivatesotcells1:''
                                        },
                                        {
                                            labsalivatestid1:'',
                                            labsalivatest1:'Control gr.A',
                                            labsalivatestacells1:'',
                                            labsalivatestbcells1 : '',
                                            labsalivatesotcells1:''
                                        },
                                        {
                                            labsalivatestid1:'',
                                            labsalivatest1:'Control gr.B',
                                            labsalivatestacells1:'',
                                            labsalivatestbcells1 : '',
                                            labsalivatesotcells1:''
                                        },
                                        {
                                            labsalivatestid1:'',
                                            labsalivatest1:'Control gr.AB',
                                            labsalivatestacells1:'',
                                            labsalivatestbcells1 : '',
                                            labsalivatesotcells1:''
                                        },
                                        {
                                            labsalivatestid1:'',
                                            labsalivatest1:'Control gr.O',
                                            labsalivatestacells1:'',
                                            labsalivatestbcells1 : '',
                                            labsalivatesotcells1:''
                                        }
                                    ];
    }

    $.each(data.lab_salivatest_item_1, function (index, value) {
        addSalivaTest1(value);
    });

    setBloodGroup("#labconfirmsalivaid_1");
    $("#labconfirmsalivaid_1").val(data.labconfirmsalivaid_1);

    // Titration 
    removeRowTable('list_table_titration_1');
    $.each(data.lab_titration_item_1, function (index, value) {
        addTitration1(value);
    });

    settritation("#labconfirmtitrationid_1");
    $("#labconfirmtitrationid_1").val(data.labconfirmtitrationid_1);



    //    Cold agglutinin
    removeRowTable('list_table_coldagglutinin_1');

    if(data.lab_coldagglutinin_item_1.length == 0)
    {
        var aRRpush = [];

        aRRpush.push(objColdAgglutinin1('O1','2 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin1('O1','24 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin1('O2','4 ชั่วโมง'));
        aRRpush.push(objColdAgglutinin1('O2','24 ชั่วโมง'));

        data.lab_coldagglutinin_item_1 = aRRpush ;
    }

    $.each(data.lab_coldagglutinin_item_1, function (index, value) {
        addColdAgglutinin1(value);
    });


    // setRh2("#labconfirmcoldagglutininid_1");
    $("#labconfirmcoldagglutininid_1").val(data.labconfirmcoldagglutininid_1);

    // Antibody identification test Get Method
    removeRowTable('list_table_anti_iden_get_method_1');
    $.each(data.lab_antibodyidentificationtestgetmethod_item_1, function (index, value) {
        addAntibodyIdenTestGetMethod1(value);
    });

    // Antibody Sceening test Get Method   
    removeRowTable('list_table_anti_sceen_get_method_1');
    $.each(data.lab_antibodysceentestgetmethod_item_1, function (index, value) {
        addAntiSceeningTestGetMethod1(value);
    });
    setRh3("#labconfirmantibodysceentestgetmethodid_1",data.labconfirmantibodysceentestgetmethodid_1);
    $("#labconfirmantibodysceentestgetmethodid_1").val(data.labconfirmantibodysceentestgetmethodid_1);



}

function objColdAgglutinin1(O='',time='')
{
    var obj =   {
                    labcoldagglutininid1:'',
                    labcoldagglutinincode1:'',
                    labcoldagglutinino1:O,
                    labcoldagglutinintime1:time,
                    labcoldagglutinin11:'',
                    labcoldagglutinin21:'',
                    labcoldagglutinin41:'',
                    labcoldagglutinin81:'',
                    labcoldagglutinin161:'',
                    labcoldagglutinin321:'',
                    labcoldagglutinin641:'',
                    labcoldagglutinin1281:'',
                    labcoldagglutinin2561:'',
                    labcoldagglutinin5121:'',
                    labcoldagglutinin10241:'',
                    labcoldagglutinin20481:''
                };
            
    return obj;
}

// End Set Data Tab 1

// Start ABO
var abocount1 = 0;
function addABOTest1(value=[]) {
    var table = document.getElementById("list_table_abo_1").rows.length;

    if(table == 2){
        if(value.length == 0)
            {
                value = {
                            labreagent1:'CAT',
                            lababoid1:'',
                            lababocode1:'',
                            lababoantia1:'',
                            lababoantib1:'',
                            lababoantiab1 : '',
                            lababoacells1:'',
                            lababobcells1:'',
                            lababoocells1:'',
                            lababobloodgroup1:''
                        };
                
            }
    }
    else{
        if(value.length == 0)
            {
                value = {
                            labreagent1:'',
                            lababoid1:'',
                            lababocode1:'',
                            lababoantia1:'',
                            lababoantib1:'',
                            lababoantiab1 : '',
                            lababoacells1:'',
                            lababobcells1:'',
                            lababoocells1:'',
                            lababobloodgroup1:''
                        };
                
            }
    }

    
                      
    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table"  style="display:none;" >';
    event_data += JSON.stringify(value);
    event_data += '</td>';

    event_data += '<td class="td-table">';
    
    event_data += '<input type="text" id="labreagent1'+abocount1+'" value="'+value.labreagent1+'" name="labreagent1'+abocount1+'" onkeyup="setLabBloodReagent_1(this)" class="form-control">';
    
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababoantia1'+abocount1+'" name="lababoantia1'+abocount1+'" onchange="autoBlood1('+abocount1+',this,1)"  class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababoantib1'+abocount1+'" name="lababoantib1'+abocount1+'" onchange="autoBlood1('+abocount1+',this,2)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababoantiab1'+abocount1+'" name="lababoantiab1'+abocount1+'" onchange="autoBlood1('+abocount1+',this,3)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababoacells1'+abocount1+'" name="lababoacells1'+abocount1+'" onchange="autoBlood1('+abocount1+',this,4)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababobcells1'+abocount1+'" name="lababobcells1'+abocount1+'" onchange="autoBlood1('+abocount1+',this,5)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababoocells1'+abocount1+'" name="lababoocells1'+abocount1+'" onchange="autoBlood1('+abocount1+',this,6)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<select id="lababobloodgroup1'+abocount1+'" name="lababobloodgroup1'+abocount1+'" onchange="confirmBloodgroupResult(this.value); setLabBloodABO_1(this);"  class="form-control select2"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table">' ;
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';
    
    $("#list_table_abo_1").append(event_data);

    setABOTest0Serum("#lababoantia1"+abocount1,value.lababoantia1);
    setABOTest0Serum("#lababoantib1"+abocount1,value.lababoantib1);
    setABOTest0Serum("#lababoantiab1"+abocount1,value.lababoantiab1);
    setABOTest0Serum("#lababoacells1"+abocount1,value.lababoacells1);
    setABOTest0Serum("#lababobcells1"+abocount1,value.lababobcells1);
    setABOTest0Serum("#lababoocells1"+abocount1,value.lababoocells1);
    setBloodGroup("#lababobloodgroup1"+abocount1,value.lababobloodgroup1);

    $("#lababoantia1"+abocount1).val(value.lababoantia1);
    $("#lababoantib1"+abocount1).val(value.lababoantib1);
    $("#lababoantiab1"+abocount1).val(value.lababoantiab1);
    $("#lababoacells1"+abocount1).val(value.lababoacells1);
    $("#lababobcells1"+abocount1).val(value.lababobcells1);
    $("#lababoocells1"+abocount1).val(value.lababoocells1);
    $("#lababobloodgroup1"+abocount1).val(value.lababobloodgroup1);

    $("#lababobloodgroup1"+abocount1).select2({
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

    abocount1++;
    // $(".select2").select2({ 
    //     width: "100%", 
    //     theme: "bootstrap",
    //     placeholder: "",
    //     allowClear:true
    // })
}

function autoBlood1(indexcount1="0",self,col='')
{

    var antia = $("#lababoantia1"+indexcount1).val();
    var antib = $("#lababoantib1"+indexcount1).val();
    var antiab = $("#lababoantiab1"+indexcount1).val();
    var acells = $("#lababoacells1"+indexcount1).val();
    var bcells = $("#lababobcells1"+indexcount1).val();
    var ocells = $("#lababoocells1"+indexcount1).val();

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
                $("#labconfirmbloodgroupid_1").val("A").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("A").trigger("change");
                setBloodABO_1(self);
                noautoblood1(self);
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
                $("#labconfirmbloodgroupid_1").val("B").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("B").trigger("change");
                setBloodABO_1(self);
                noautoblood1(self);
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
                $("#labconfirmbloodgroupid_1").val("O").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("O").trigger("change");
                setBloodABO_1(self);
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
                
                $("#labconfirmbloodgroupid_1").val("AB").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("AB").trigger("change");
                setBloodABO_1(self);
                noautoblood1(self);
                return false;
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_1").val("0").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("0").trigger("change");
                setBloodABO_1(self);
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
                $("#labconfirmbloodgroupid_1").val("A").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("A").trigger("change");
                setBloodABO_1(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_1").val("B").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("B").trigger("change");
                setBloodABO_1(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib == "1" || antib == "11") && 
                        (antiab == "1" || antiab == "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells != "1" || bcells != "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_1").val("O").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("O").trigger("change");
                setBloodABO_1(self);
            }else if(
                        (antia != "1" || antia != "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells == "1" || acells == "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11")
                    )
            {
                $("#labconfirmbloodgroupid_1").val("AB").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("AB").trigger("change");
                setBloodABO_1(self);
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_1").val("0").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("0").trigger("change");
                setBloodABO_1(self);
            }
        }else
        {
            $("#lababobloodgroup1"+indexcount1).val("0");
            setBloodABO_1(self);
        }
    }
    else{
        if ((antia) && (antib) && (antia != "0") && (antib != "0") && (acells) && (bcells) && (acells != "0") && (bcells != "0"))
        {
            if( 
                ((antia != "11") && (antib == "11") && (bcells != "11") && (acells == "11")) ||
                ((antia != "1") && (antib == "1") && (bcells != "1") && (acells == "1"))
            )
            {
                $("#labconfirmbloodgroupid_1").val("A").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("A").trigger("change");
                setBloodABO_1(self);
                noautoblood1(self);
                return false;
            }else if(
                        ((antia == "11") && (antib != "11") && (bcells == "11") && (acells != "11")) ||
                        ((antia == "1") && (antib != "1") && (bcells == "1") && (acells != "1"))
                    )
            {
                $("#labconfirmbloodgroupid_1").val("B").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("B").trigger("change");
                setBloodABO_1(self);
                noautoblood1(self);
                return false;
            }else if(
                        ((antia == "11") && (antib == "11") && (bcells != "11") && (acells != "11")) ||
                        ((antia == "1") && (antib == "1") && (bcells != "1") && (acells != "1"))
                    )
            {
                $("#labconfirmbloodgroupid_1").val("O").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("O").trigger("change");
                setBloodABO_1(self);
                noautoblood1(self);
                return false;
            }else if(
                       ((antia != 11) && (antib != 11) && (bcells == 11) && (acells == 11)) ||
                        ((antia != 1) && (antib != 1) && (bcells == 1) && (acells == 1))
                    )
            {
                
                $("#labconfirmbloodgroupid_1").val("AB").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("AB").trigger("change");
                setBloodABO_1(self);
                noautoblood1(self);
                return false;
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_1").val("0").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("0").trigger("change");
                setBloodABO_1(self);
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
                $("#labconfirmbloodgroupid_1").val("A").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("A").trigger("change");
                setBloodABO_1(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_1").val("B").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("B").trigger("change");
                setBloodABO_1(self);
            }else if(
                        (antia == "1" || antia == "11") && 
                        (antib == "1" || antib == "11") && 
                        (antiab == "1" || antiab == "11") && 
                        (acells != "1" || acells != "11") && 
                        (bcells != "1" || bcells != "11") && 
                        (ocells == "1" || ocells == "11"))
            {
                $("#labconfirmbloodgroupid_1").val("O").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("O").trigger("change");
                setBloodABO_1(self);
            }else if(
                        (antia != "1" || antia != "11") && 
                        (antib != "1" || antib != "11") && 
                        (antiab != "1" || antiab != "11") && 
                        (acells == "1" || acells == "11") && 
                        (bcells == "1" || bcells == "11") && 
                        (ocells == "1" || ocells == "11")
                    )
            {
                $("#labconfirmbloodgroupid_1").val("AB").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("AB").trigger("change");
                setBloodABO_1(self);
            }else
            {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#labconfirmbloodgroupid_1").val("0").trigger("change");
                $("#lababobloodgroup1"+indexcount1).val("0").trigger("change");
                setBloodABO_1(self);
            }
        }else
        {
            $("#lababobloodgroup1"+indexcount1).val("0");
            setBloodABO_1(self);
        }
    }


    
    
}

function noautoblood1(self) {
    var rows = self.parentNode.parentNode;
    var item = JSON.parse(rows.cells[0].innerHTML);
    var table = document.getElementById("list_table_abo_1");
    var r = 1;
    var status0 = "";
    // alert(item.lababobloodgroup0);

    var patientbloodgroup = document.getElementById("patientbloodgroup").innerHTML;

    while (row = table.rows[r++]) {
        try {
            var blood = JSON.parse(document.getElementById("list_table_abo_1").rows[r].cells.item(0).innerHTML);  
        }
        catch(err) {
            console.log("err");
        }
        
        console.log(blood.lababobloodgroup1);
        if(item.lababobloodgroup1 != blood.lababobloodgroup1){
            // alert("5555555555");
            $("#labconfirmbloodgroupid_1").val("");
            $("#labconfirmbloodgroupid_1").trigger('change');
            return false;
        }
        else{
            if(patientbloodgroup == '-' || patientbloodgroup == '' || patientbloodgroup == 'ไม่ทราบ' || patientbloodgroup == "Discrepancy"){
                $("#labconfirmbloodgroupid_1").val(item.lababobloodgroup1);
                $("#labconfirmbloodgroupid_1").trigger('change');
            }
            else{
                if(patientbloodgroup != item.lababobloodgroup0){
                    bloodalert();
                }
                else{
                    $("#labconfirmbloodgroupid_1").val(item.lababobloodgroup1);
                    $("#labconfirmbloodgroupid_1").trigger('change');
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
var rhcount1 = 0;
function addRhTest1(value=[]) {
    var table = document.getElementById("list_table_rh_1").rows.length;

    if(table == 1){
        if(value.length == 0)
        {
            value = {
                        labrhreagent1:'CAT',
                        labrhid1:'',
                        labrhcode1:'',
                        labrhrt1:'',
                        lab37c1 : '',
                        labiat1:'',
                        labccc1:'',
                        labresult1:''
                    };
        }
    }
    else{
        if(value.length == 0)
        {
            value = {
                        labrhreagent1:'',
                        labrhid1:'',
                        labrhcode1:'',
                        labrhrt1:'',
                        lab37c1 : '',
                        labiat1:'',
                        labccc1:'',
                        labresult1:''
                    };
        }
    }
                                        
    var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input  class="form-control" id="labrhreagent1'+rhcount1+'" name="labrhreagent1'+rhcount1+'" value="'+value.labrhreagent1+'" onkeyup="setLabRhReagent_1(this)" >';
        event_data += '</td>'
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labrhrt1'+rhcount1+'" name="labrhrt1'+rhcount1+'"  class="form-control" onchange="setLabRhRt_1(this); setpos1('+rhcount1+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="lab37c1'+rhcount1+'" name="lab37c1'+rhcount1+'" class="form-control" onchange="setLab37C_1(this); setpos1('+rhcount1+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labiat1'+rhcount1+'" name="labiat1'+rhcount1+'" class="form-control" onchange="setLabIAT_1(this); setpos1('+rhcount1+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labccc1'+rhcount1+'" name="labccc1'+rhcount1+'" class="form-control" onchange="setLabCCC_1(this); setpos1('+rhcount1+',this,3);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="labresult1'+rhcount1+'" name="labresult1'+rhcount1+'" class="form-control" onchange="setLabResult_1(this);"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
    
    $("#list_table_rh_1").append(event_data);

    setABOTest0Serum("#labrhrt1"+rhcount1,value.labrhrt1);
    setABOTest0Serum("#lab37c1"+rhcount1,value.lab37c1);
    setABOTest0Serum("#labiat1"+rhcount1,value.labiat1);
    setABOTest0Serum("#labccc1"+rhcount1,value.labccc1);
    setRh2("#labresult1"+rhcount1,value.labresult1);

    $("#labrhrt1"+rhcount1).val(value.labrhrt1);
    $("#lab37c1"+rhcount1).val(value.lab37c1);
    $("#labiat1"+rhcount1).val(value.labiat1);
    $("#labccc1"+rhcount1).val(value.labccc1);


    $("#labresult1" + rhcount1).select2({
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

    $("#labresult1"+rhcount1).val(value.labresult1);
    
    rhcount1++;
}
// End Rh

// Start AntiSceeningTest
var anticount1 = 0;
function addAntiSceeningTest1(value=[]) {

        if(value.length == 0)
        {
            value = {
                        labantibodysceentestid1:'',
                        labantibodysceentest1:'',
                        labantibodysceentestp1mi1:'',
                        labantibodysceentesto11 : '',
                        labantibodysceentesto21:'',
                        labantibodysceentesto31:'',
                        labantibodysceentestlotno1:''
                    };
            
        }
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest1'+anticount1+'" name="labantibodysceentest1'+anticount1+'" onchange="setLabAntibodySceenTest_1(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestp1mi1'+anticount1+'" name="labantibodysceentestp1mi1'+anticount1+'" onchange="setLabAntibodySceenTestp1mi_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto11'+anticount1+'" name="labantibodysceentesto11'+anticount1+'" onchange="setLabAntibodySceenTestO1_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto21'+anticount1+'"  name="labantibodysceentesto21'+anticount1+'" onchange="setLabAntibodySceenTestO2_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto31'+anticount1+'"  name="labantibodysceentesto31'+anticount1+'" onchange="setLabAntibodySceenTestO3_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno1'+anticount1+'"  name="labantibodysceentestlotno1'+anticount1+'" value="'+value.labantibodysceentestlotno1+'" onkeyup="setLabAntibodySceenTestLotno_1(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_1").append(event_data);

        setBloodAntiTest("#labantibodysceentest1"+anticount1,value.labantibodysceentest1);
        setABOTest0Serum("#labantibodysceentestp1mi1"+anticount1,value.labantibodysceentestp1mi1);
        setABOTest0Serum("#labantibodysceentesto11"+anticount1,value.labantibodysceentesto11);
        setABOTest0Serum("#labantibodysceentesto21"+anticount1,value.labantibodysceentesto21);
        setABOTest0Serum("#labantibodysceentesto31"+anticount1,value.labantibodysceentesto31);

        $("#labantibodysceentest1"+anticount1).val(value.labantibodysceentest1);
        $("#labantibodysceentestp1mi1"+anticount1).val(value.labantibodysceentestp1mi1);
        $("#labantibodysceentesto11"+anticount1).val(value.labantibodysceentesto11);
        $("#labantibodysceentesto21"+anticount1).val(value.labantibodysceentesto21);
        $("#labantibodysceentesto31"+anticount1).val(value.labantibodysceentesto31);
        anticount1++;

}

function addAntiSceeningTest1_null(value=[]) {

            value = {
                        labantibodysceentestid1:'',
                        labantibodysceentest1:'13',
                        labantibodysceentestp1mi1:'',
                        labantibodysceentesto11 : '',
                        labantibodysceentesto21:'',
                        labantibodysceentesto31:'',
                        labantibodysceentestlotno1:'',
                    };

            
            
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest1'+anticount1+'" name="labantibodysceentest1'+anticount1+'" onchange="setLabAntibodySceenTest_1(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestp1mi1'+anticount1+'" name="labantibodysceentestp1mi1'+anticount1+'" onchange="setLabAntibodySceenTestp1mi_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto11'+anticount1+'" name="labantibodysceentesto11'+anticount1+'" onchange="setLabAntibodySceenTestO1_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto21'+anticount1+'"  name="labantibodysceentesto21'+anticount1+'" onchange="setLabAntibodySceenTestO2_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto31'+anticount1+'"  name="labantibodysceentesto31'+anticount1+'" onchange="setLabAntibodySceenTestO3_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno1'+anticount1+'"  name="labantibodysceentestlotno1'+anticount1+'" value="'+value.labantibodysceentestlotno1+'" onkeyup="setLabAntibodySceenTestLotno_1(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        $("#list_table_anti_sceen_1").append(event_data);

        setBloodAntiTest("#labantibodysceentest1"+anticount1,value.labantibodysceentest1);
        setABOTest0Serum("#labantibodysceentestp1mi1"+anticount1,value.labantibodysceentestp1mi1);
        setABOTest0Serum("#labantibodysceentesto11"+anticount1,value.labantibodysceentesto11);
        setABOTest0Serum("#labantibodysceentesto21"+anticount1,value.labantibodysceentesto21);
        setABOTest0Serum("#labantibodysceentesto31"+anticount1,value.labantibodysceentesto31);

        $("#labantibodysceentest1"+anticount1).val("13");

        event_data = '';

        anticount1++;

        value = {
                        labantibodysceentestid1:'',
                        labantibodysceentest1:'6',
                        labantibodysceentestp1mi1:'',
                        labantibodysceentesto11 : '',
                        labantibodysceentesto21:'',
                        labantibodysceentesto31:'',
                        labantibodysceentestlotno1:'',
                    };

        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentest1'+anticount1+'" name="labantibodysceentest1'+anticount1+'" onchange="setLabAntibodySceenTest_1(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestp1mi1'+anticount1+'" name="labantibodysceentestp1mi1'+anticount1+'" onchange="setLabAntibodySceenTestp1mi_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto11'+anticount1+'" name="labantibodysceentesto11'+anticount1+'" onchange="setLabAntibodySceenTestO1_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto21'+anticount1+'"  name="labantibodysceentesto21'+anticount1+'" onchange="setLabAntibodySceenTestO2_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentesto31'+anticount1+'"  name="labantibodysceentesto31'+anticount1+'" onchange="setLabAntibodySceenTestO3_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestlotno1'+anticount1+'"  name="labantibodysceentestlotno1'+anticount1+'" value="'+value.labantibodysceentestlotno1+'" onkeyup="setLabAntibodySceenTestLotno_1(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';


        $("#list_table_anti_sceen_1").append(event_data);

        

        setBloodAntiTest("#labantibodysceentest1"+anticount1,value.labantibodysceentest1);
        setABOTest0Serum("#labantibodysceentestp1mi1"+anticount1,value.labantibodysceentestp1mi1);
        setABOTest0Serum("#labantibodysceentesto11"+anticount1,value.labantibodysceentesto11);
        setABOTest0Serum("#labantibodysceentesto21"+anticount1,value.labantibodysceentesto21);
        setABOTest0Serum("#labantibodysceentesto31"+anticount1,value.labantibodysceentesto31);

        $("#labantibodysceentest1"+anticount1).val("6");

        anticount1++;
}
// End AntiSceeningTest

// Start Antibody identification test
var idencount1 = 0;
function addAntibodyIdenTest1(value=[]) {

        if(value.length == 0)
        {
            value = {
                labantibodyidentificationtestid1:'',
                labantibodyidentificationtest1:'',
                labantibodyidentificationtest11:'',
                labantibodyidentificationtest21 : '',
                labantibodyidentificationtest31:'',
                labantibodyidentificationtest41:'',
                labantibodyidentificationtest51:'',
                labantibodyidentificationtest61:'',
                labantibodyidentificationtest71:'',
                labantibodyidentificationtest81:'',
                labantibodyidentificationtest91:'',
                labantibodyidentificationtest101:'',
                labantibodyidentificationtest111:'',
                labantibodyidentificationtestauto1:'',
                labantibodyidentificationtestlotno1:'',
            };
        }
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest1'+idencount1+'" name="labantibodyidentificationtest1'+idencount1+'"  onchange="setLabAntibodyIdentificationTest_1(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest11'+idencount1+'" name="labantibodyidentificationtest11'+idencount1+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest21'+idencount1+'" name="labantibodyidentificationtest21'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest31'+idencount1+'" name="labantibodyidentificationtest31'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest41'+idencount1+'" name="labantibodyidentificationtest41'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest51'+idencount1+'" name="labantibodyidentificationtest51'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest61'+idencount1+'" name="labantibodyidentificationtest61'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest71'+idencount1+'" name="labantibodyidentificationtest71'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest81'+idencount1+'" name="labantibodyidentificationtest81'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest91'+idencount1+'" name="labantibodyidentificationtest91'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest101'+idencount1+'" name="labantibodyidentificationtest101'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest111'+idencount1+'" name="labantibodyidentificationtest111'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto1'+idencount1+'" name="labantibodyidentificationtestauto1'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno1'+idencount1+'" value="'+value.labantibodyidentificationtestlotno1+'" name="labantibodyidentificationtestlotno1'+idencount1+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_1(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_iden_1").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtest1"+idencount1,value.labantibodyidentificationtest1);
        setABOTest0Serum("#labantibodyidentificationtest11"+idencount1,value.labantibodyidentificationtest11);
        setABOTest0Serum("#labantibodyidentificationtest21"+idencount1,value.labantibodyidentificationtest21);
        setABOTest0Serum("#labantibodyidentificationtest31"+idencount1,value.labantibodyidentificationtest31);
        setABOTest0Serum("#labantibodyidentificationtest41"+idencount1,value.labantibodyidentificationtest41);
        setABOTest0Serum("#labantibodyidentificationtest51"+idencount1,value.labantibodyidentificationtest51);
        setABOTest0Serum("#labantibodyidentificationtest61"+idencount1,value.labantibodyidentificationtest61);
        setABOTest0Serum("#labantibodyidentificationtest71"+idencount1,value.labantibodyidentificationtest71);
        setABOTest0Serum("#labantibodyidentificationtest81"+idencount1,value.labantibodyidentificationtest81);
        setABOTest0Serum("#labantibodyidentificationtest91"+idencount1,value.labantibodyidentificationtest91);
        setABOTest0Serum("#labantibodyidentificationtest101"+idencount1,value.labantibodyidentificationtest101);
        setABOTest0Serum("#labantibodyidentificationtest111"+idencount1,value.labantibodyidentificationtest111);
        setABOTest0Serum("#labantibodyidentificationtestauto1"+idencount1,value.labantibodyidentificationtestauto1);

        $("#labantibodyidentificationtest1"+idencount1).val(value.labantibodyidentificationtest1);
        $("#labantibodyidentificationtest11"+idencount1).val(value.labantibodyidentificationtest11);
        $("#labantibodyidentificationtest21"+idencount1).val(value.labantibodyidentificationtest21);
        $("#labantibodyidentificationtest31"+idencount1).val(value.labantibodyidentificationtest31);
        $("#labantibodyidentificationtest41"+idencount1).val(value.labantibodyidentificationtest41);
        $("#labantibodyidentificationtest51"+idencount1).val(value.labantibodyidentificationtest51);
        $("#labantibodyidentificationtest61"+idencount1).val(value.labantibodyidentificationtest61);
        $("#labantibodyidentificationtest71"+idencount1).val(value.labantibodyidentificationtest71);
        $("#labantibodyidentificationtest81"+idencount1).val(value.labantibodyidentificationtest81);
        $("#labantibodyidentificationtest91"+idencount1).val(value.labantibodyidentificationtest91);
        $("#labantibodyidentificationtest101"+idencount1).val(value.labantibodyidentificationtest101);
        $("#labantibodyidentificationtest111"+idencount1).val(value.labantibodyidentificationtest111);
        $("#labantibodyidentificationtestauto1"+idencount1).val(value.labantibodyidentificationtestauto1);
    
        idencount1++;
  }

  function addAntibodyIdenTest1_null(value=[]) {

        
            value = {
                labantibodyidentificationtestid1:'',
                labantibodyidentificationtest1:'13',
                labantibodyidentificationtest11:'',
                labantibodyidentificationtest21 : '',
                labantibodyidentificationtest31:'',
                labantibodyidentificationtest41:'',
                labantibodyidentificationtest51:'',
                labantibodyidentificationtest61:'',
                labantibodyidentificationtest71:'',
                labantibodyidentificationtest81:'',
                labantibodyidentificationtest91:'',
                labantibodyidentificationtest101:'',
                labantibodyidentificationtest111:'',
                labantibodyidentificationtestauto1:'',
                labantibodyidentificationtestlotno1:'',
            };
        
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest1'+idencount1+'" name="labantibodyidentificationtest1'+idencount1+'"  onchange="setLabAntibodyIdentificationTest_1(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest11'+idencount1+'" name="labantibodyidentificationtest11'+idencount1+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest21'+idencount1+'" name="labantibodyidentificationtest21'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest31'+idencount1+'" name="labantibodyidentificationtest31'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest41'+idencount1+'" name="labantibodyidentificationtest41'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest51'+idencount1+'" name="labantibodyidentificationtest51'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest61'+idencount1+'" name="labantibodyidentificationtest61'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest71'+idencount1+'" name="labantibodyidentificationtest71'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest81'+idencount1+'" name="labantibodyidentificationtest81'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest91'+idencount1+'" name="labantibodyidentificationtest91'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest101'+idencount1+'" name="labantibodyidentificationtest101'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest111'+idencount1+'" name="labantibodyidentificationtest111'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto1'+idencount1+'" name="labantibodyidentificationtestauto1'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno1'+idencount1+'" value="'+value.labantibodyidentificationtestlotno1+'" name="labantibodyidentificationtestlotno1'+idencount1+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_1(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        $("#list_table_anti_iden_1").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtest1"+idencount1,value.labantibodyidentificationtest1);
        setABOTest0Serum("#labantibodyidentificationtest11"+idencount1,value.labantibodyidentificationtest11);
        setABOTest0Serum("#labantibodyidentificationtest21"+idencount1,value.labantibodyidentificationtest21);
        setABOTest0Serum("#labantibodyidentificationtest31"+idencount1,value.labantibodyidentificationtest31);
        setABOTest0Serum("#labantibodyidentificationtest41"+idencount1,value.labantibodyidentificationtest41);
        setABOTest0Serum("#labantibodyidentificationtest51"+idencount1,value.labantibodyidentificationtest51);
        setABOTest0Serum("#labantibodyidentificationtest61"+idencount1,value.labantibodyidentificationtest61);
        setABOTest0Serum("#labantibodyidentificationtest71"+idencount1,value.labantibodyidentificationtest71);
        setABOTest0Serum("#labantibodyidentificationtest81"+idencount1,value.labantibodyidentificationtest81);
        setABOTest0Serum("#labantibodyidentificationtest91"+idencount1,value.labantibodyidentificationtest91);
        setABOTest0Serum("#labantibodyidentificationtest101"+idencount1,value.labantibodyidentificationtest101);
        setABOTest0Serum("#labantibodyidentificationtest111"+idencount1,value.labantibodyidentificationtest111);
        setABOTest0Serum("#labantibodyidentificationtestauto1"+idencount1,value.labantibodyidentificationtestauto1);

        $("#labantibodyidentificationtest1"+idencount1).val(13);

        event_data = '';

        idencount1++;

        value = {
                labantibodyidentificationtestid1:'',
                labantibodyidentificationtest1:'6',
                labantibodyidentificationtest11:'',
                labantibodyidentificationtest21 : '',
                labantibodyidentificationtest31:'',
                labantibodyidentificationtest41:'',
                labantibodyidentificationtest51:'',
                labantibodyidentificationtest61:'',
                labantibodyidentificationtest71:'',
                labantibodyidentificationtest81:'',
                labantibodyidentificationtest91:'',
                labantibodyidentificationtest101:'',
                labantibodyidentificationtest111:'',
                labantibodyidentificationtestauto1:'',
                labantibodyidentificationtestlotno1:'',
            };

        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtest1'+idencount1+'" name="labantibodyidentificationtest1'+idencount1+'"  onchange="setLabAntibodyIdentificationTest_1(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest11'+idencount1+'" name="labantibodyidentificationtest11'+idencount1+'"  class="form-control" onchange="setLabAntibodyIdentificationTest1_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest21'+idencount1+'" name="labantibodyidentificationtest21'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest2_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest31'+idencount1+'" name="labantibodyidentificationtest31'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest3_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest41'+idencount1+'" name="labantibodyidentificationtest41'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest4_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest51'+idencount1+'" name="labantibodyidentificationtest51'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest5_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest61'+idencount1+'" name="labantibodyidentificationtest61'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest6_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest71'+idencount1+'" name="labantibodyidentificationtest71'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest7_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest81'+idencount1+'" name="labantibodyidentificationtest81'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest8_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest91'+idencount1+'" name="labantibodyidentificationtest91'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest9_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest101'+idencount1+'" name="labantibodyidentificationtest101'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest10_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtest111'+idencount1+'" name="labantibodyidentificationtest111'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTest11_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestauto1'+idencount1+'" name="labantibodyidentificationtestauto1'+idencount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestAuto_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestlotno1'+idencount1+'" value="'+value.labantibodyidentificationtestlotno1+'" name="labantibodyidentificationtestlotno1'+idencount1+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestLotno_1(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        $("#list_table_anti_iden_1").append(event_data);

        

        setBloodAntiTest("#labantibodyidentificationtest1"+idencount1,value.labantibodyidentificationtest1);
        setABOTest0Serum("#labantibodyidentificationtest11"+idencount1,value.labantibodyidentificationtest11);
        setABOTest0Serum("#labantibodyidentificationtest21"+idencount1,value.labantibodyidentificationtest21);
        setABOTest0Serum("#labantibodyidentificationtest31"+idencount1,value.labantibodyidentificationtest31);
        setABOTest0Serum("#labantibodyidentificationtest41"+idencount1,value.labantibodyidentificationtest41);
        setABOTest0Serum("#labantibodyidentificationtest51"+idencount1,value.labantibodyidentificationtest51);
        setABOTest0Serum("#labantibodyidentificationtest61"+idencount1,value.labantibodyidentificationtest61);
        setABOTest0Serum("#labantibodyidentificationtest71"+idencount1,value.labantibodyidentificationtest71);
        setABOTest0Serum("#labantibodyidentificationtest81"+idencount1,value.labantibodyidentificationtest81);
        setABOTest0Serum("#labantibodyidentificationtest91"+idencount1,value.labantibodyidentificationtest91);
        setABOTest0Serum("#labantibodyidentificationtest101"+idencount1,value.labantibodyidentificationtest101);
        setABOTest0Serum("#labantibodyidentificationtest111"+idencount1,value.labantibodyidentificationtest111);
        setABOTest0Serum("#labantibodyidentificationtestauto1"+idencount1,value.labantibodyidentificationtestauto1);

        $("#labantibodyidentificationtest1"+idencount1).val(6);
        
    
        idencount1++;
  }
// End Antibody identification test

// Start Saliva test
var salivacount1 = 0;
function addSalivaTest1(value=[]) {
                      
    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table"  style="display:none;" >';
    event_data += JSON.stringify(value);
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += value.labsalivatest1;
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatestacells1'+salivacount1+'" name="labsalivatestacells1'+salivacount1+'" onchange="setLabSalivatestACells_1(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatestbcells1'+salivacount1+'" name="labsalivatestbcells1'+salivacount1+'" onchange="setLabSalivatestBCells_1(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<select id="labsalivatesotcells1'+salivacount1+'" name="labsalivatesotcells1'+salivacount1+'" onchange="setLabSalivatestOCells_1(this)" class="form-control"></select>';
    event_data += '</td>';

    event_data += '</tr>';
    
    $("#list_table_saliva_1").append(event_data);

    setABOTest0Serum("#labsalivatestacells1"+salivacount1,value.labsalivatestacells1);
    setABOTest0Serum("#labsalivatestbcells1"+salivacount1,value.labsalivatestbcells1);
    setABOTest0Serum("#labsalivatesotcells1"+salivacount1,value.labsalivatesotcells1);

    $("#labsalivatestacells1"+salivacount1).val(value.labsalivatestacells1);
    $("#labsalivatestbcells1"+salivacount1).val(value.labsalivatestbcells1);
    $("#labsalivatesotcells1"+salivacount1).val(value.labsalivatesotcells1);

    salivacount1++;
}
// End Saliva test


// Start Titration
var titrationcount1 = 0;
function addTitration1(value=[]) {

        if(value.length == 0)
        {
            value = {
                labtitrationid1:'',
                labtitrationantiserum1:'',
                labtitrationcell1:'',
                labtitration11 : '',
                labtitration21:'',
                labtitration41:'',
                labtitration81:'',
                labtitration161:'',
                labtitration321:'',
                labtitration641:'',
                labtitration1281:'',
                labtitration2561:'',
                labtitration5121:'',
                labtitration10241:'',
                labtitration20481:'',
                labtitrationtiter1:''
            };
        }

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labtitrationantiserum1'+titrationcount1+'" name="labtitrationantiserum1'+titrationcount1+'"  onchange="setLabTitrationAntiSerum_1(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitrationcell1'+titrationcount1+'" name="labtitrationcell1'+titrationcount1+'"  class="form-control" onchange="setLabTitrationCell_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration11'+titrationcount1+'" name="labtitration11'+titrationcount1+'" class="form-control" onchange="setLabTitration1_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration21'+titrationcount1+'" name="labtitration21'+titrationcount1+'" class="form-control" onchange="setLabTitration2_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration41'+titrationcount1+'" name="labtitration41'+titrationcount1+'" class="form-control" onchange="setLabTitration4_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration81'+titrationcount1+'" name="labtitration81'+titrationcount1+'" class="form-control" onchange="setLabTitration8_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration161'+titrationcount1+'" name="labtitration161'+titrationcount1+'" class="form-control" onchange="setLabTitration16_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration321'+titrationcount1+'" name="labtitration321'+titrationcount1+'" class="form-control" onchange="setLabTitration32_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration641'+titrationcount1+'" name="labtitration641'+titrationcount1+'" class="form-control" onchange="setLabTitration64_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration1281'+titrationcount1+'" name="labtitration1281'+titrationcount1+'" class="form-control" onchange="setLabTitration128_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration25611'+titrationcount1+'" name="labtitration25611'+titrationcount1+'" class="form-control" onchange="setLabTitration256_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration51211'+titrationcount1+'" name="labtitration51211'+titrationcount1+'" class="form-control" onchange="setLabTitration512_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration10241'+titrationcount1+'" name="labtitration10241'+titrationcount1+'" class="form-control" onchange="setLabTitration1024_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitration20481'+titrationcount1+'" name="labtitration20481'+titrationcount1+'" class="form-control" onchange="setLabTitration2048_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labtitrationtiter1'+titrationcount1+'" name="labtitrationtiter1'+titrationcount1+'" class="form-control" onchange="setLabTitrationTiter1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_titration_1").append(event_data);

        setBloodAntiTest("#labtitrationantiserum1"+titrationcount1,value.labtitrationantiserum1);
        setABOTest0Serum("#labtitrationcell1"+titrationcount1,value.labtitrationcell1);
        setABOTest0Serum("#labtitration11"+titrationcount1,value.labtitration11);
        setABOTest0Serum("#labtitration21"+titrationcount1,value.labtitration21);
        setABOTest0Serum("#labtitration41"+titrationcount1,value.labtitration41);
        setABOTest0Serum("#labtitration81"+titrationcount1,value.labtitration81);
        setABOTest0Serum("#labtitration161"+titrationcount1,value.labtitration161);
        setABOTest0Serum("#labtitration321"+titrationcount1,value.labtitration321);
        setABOTest0Serum("#labtitration641"+titrationcount1,value.labtitration641);
        setABOTest0Serum("#labtitration1281"+titrationcount1,value.labtitration1281);
        setABOTest0Serum("#labtitration25611"+titrationcount1,value.labtitration25611);
        setABOTest0Serum("#labtitration51211"+titrationcount1,value.labtitration51211);
        setABOTest0Serum("#labtitration10241"+titrationcount1,value.labtitration10241);
        setABOTest0Serum("#labtitration20481"+titrationcount1,value.labtitration20481);
        setRh2("#labtitrationtiter1"+titrationcount1,value.labtitrationtiter1);

        $("#labtitrationantiserum1"+titrationcount1).val(value.labtitrationantiserum1);
        $("#labtitrationcell1"+titrationcount1).val(value.labtitrationcell1);
        $("#labtitration11"+titrationcount1).val(value.labtitration11);
        $("#labtitration21"+titrationcount1).val(value.labtitration21);
        $("#labtitration41"+titrationcount1).val(value.labtitration41);
        $("#labtitration81"+titrationcount1).val(value.labtitration81);
        $("#labtitration161"+titrationcount1).val(value.labtitration161);
        $("#labtitration321"+titrationcount1).val(value.labtitration321);
        $("#labtitration641"+titrationcount1).val(value.labtitration641);
        $("#labtitration1281"+titrationcount1).val(value.labtitration1281);
        $("#labtitration25611"+titrationcount1).val(value.labtitration25611);
        $("#labtitration51211"+titrationcount1).val(value.labtitration51211);
        $("#labtitration10241"+titrationcount1).val(value.labtitration10241);
        $("#labtitration20481"+titrationcount1).val(value.labtitration20481);
        $("#labtitrationtiter1"+titrationcount1).val(value.labtitrationtiter1);
    
        titrationcount1++;
  }
// End Titration

// Start Titration
var coldagglutinincount1 = 0;
function addColdAgglutinin1(value=[]) {

        if(value.length == 0)
        {
            value = {
                labcoldagglutininid1:'',
                labcoldagglutinino1:'',
                labcoldagglutinintime1:'',
                labcoldagglutinin11 : '',
                labcoldagglutinin21:'',
                labcoldagglutinin41:'',
                labcoldagglutinin81:'',
                labcoldagglutinin161:'',
                labcoldagglutinin321:'',
                labcoldagglutinin641:'',
                labcoldagglutinin1281:'',
                labcoldagglutinin2561:'',
                labcoldagglutinin5121:'',
                labcoldagglutinin10241:'',
                labcoldagglutinin20481:'',
                labcoldagglutinintiter1:''
            };
        }

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += value.labcoldagglutinino1;
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += value.labcoldagglutinintime1;
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin11'+coldagglutinincount1+'" name="labcoldagglutinin11'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin1_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin21'+coldagglutinincount1+'" name="labcoldagglutinin21'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin2_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin41'+coldagglutinincount1+'" name="labcoldagglutinin41'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin4_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin81'+coldagglutinincount1+'" name="labcoldagglutinin81'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin8_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin161'+coldagglutinincount1+'" name="labcoldagglutinin161'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin16_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin321'+coldagglutinincount1+'" name="labcoldagglutinin321'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin32_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin641'+coldagglutinincount1+'" name="labcoldagglutinin641'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin64_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin1281'+coldagglutinincount1+'" name="labcoldagglutinin1281'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin128_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin2561'+coldagglutinincount1+'" name="labcoldagglutinin2561'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin256_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin5121'+coldagglutinincount1+'" name="labcoldagglutinin5121'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin512_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin10241'+coldagglutinincount1+'" name="labcoldagglutinin10241'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin1024_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labcoldagglutinin20481'+coldagglutinincount1+'" name="labcoldagglutinin20481'+coldagglutinincount1+'" class="form-control" onchange="setLabColdAgglutinin2048_1(this)"></select>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_coldagglutinin_1").append(event_data);

        setABOTest0Serum("#labcoldagglutinin11"+coldagglutinincount1,value.labcoldagglutinin11);
        setABOTest0Serum("#labcoldagglutinin21"+coldagglutinincount1,value.labcoldagglutinin21);
        setABOTest0Serum("#labcoldagglutinin41"+coldagglutinincount1,value.labcoldagglutinin41);
        setABOTest0Serum("#labcoldagglutinin81"+coldagglutinincount1,value.labcoldagglutinin81);
        setABOTest0Serum("#labcoldagglutinin161"+coldagglutinincount1,value.labcoldagglutinin161);
        setABOTest0Serum("#labcoldagglutinin321"+coldagglutinincount1,value.labcoldagglutinin321);
        setABOTest0Serum("#labcoldagglutinin641"+coldagglutinincount1,value.labcoldagglutinin641);
        setABOTest0Serum("#labcoldagglutinin1281"+coldagglutinincount1,value.labcoldagglutinin1281);
        setABOTest0Serum("#labcoldagglutinin2561"+coldagglutinincount1,value.labcoldagglutinin2561);
        setABOTest0Serum("#labcoldagglutinin5121"+coldagglutinincount1,value.labcoldagglutinin5121);
        setABOTest0Serum("#labcoldagglutinin10241"+coldagglutinincount1,value.labcoldagglutinin10241);
        setABOTest0Serum("#labcoldagglutinin20481"+coldagglutinincount1,value.labcoldagglutinin20481);

        
        $("#labcoldagglutinin11"+coldagglutinincount1).val(value.labcoldagglutinin11);
        $("#labcoldagglutinin21"+coldagglutinincount1).val(value.labcoldagglutinin21);
        $("#labcoldagglutinin41"+coldagglutinincount1).val(value.labcoldagglutinin41);
        $("#labcoldagglutinin81"+coldagglutinincount1).val(value.labcoldagglutinin81);
        $("#labcoldagglutinin161"+coldagglutinincount1).val(value.labcoldagglutinin161);
        $("#labcoldagglutinin321"+coldagglutinincount1).val(value.labcoldagglutinin321);
        $("#labcoldagglutinin641"+coldagglutinincount1).val(value.labcoldagglutinin641);
        $("#labcoldagglutinin1281"+coldagglutinincount1).val(value.labcoldagglutinin1281);
        $("#labcoldagglutinin2561"+coldagglutinincount1).val(value.labcoldagglutinin2561);
        $("#labcoldagglutinin5121"+coldagglutinincount1).val(value.labcoldagglutinin5121);
        $("#labcoldagglutinin10241"+coldagglutinincount1).val(value.labcoldagglutinin10241);
        $("#labcoldagglutinin20481"+coldagglutinincount1).val(value.labcoldagglutinin20481);
    
        coldagglutinincount1++;
  }
// End Titration


// Start Antibody identification test Get Method
var idengetmethodcount1 = 0;
function addAntibodyIdenTestGetMethod1(value=[]) {

        if(value.length == 0)
        {
            value = {
                labantibodyidentificationtestgetmethodid1:'',
                labantibodyidentificationtestgetmethod1:'',
                labantibodyidentificationtestgetmethod11:'',
                labantibodyidentificationtestgetmethod21 : '',
                labantibodyidentificationtestgetmethod31:'',
                labantibodyidentificationtestgetmethod41:'',
                labantibodyidentificationtestgetmethod51:'',
                labantibodyidentificationtestgetmethod61:'',
                labantibodyidentificationtestgetmethod71:'',
                labantibodyidentificationtestgetmethod81:'',
                labantibodyidentificationtestgetmethod91:'',
                labantibodyidentificationtestgetmethod101:'',
                labantibodyidentificationtestgetmethod111:'',
                labantibodyidentificationtestgetmethodauto1:'',
                labantibodyidentificationtestgetmethodantibody1:'',
                labantibodyidentificationtestgetmethodlotno1:'',
            };
        }
        

											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select  class="form-control" id="labantibodyidentificationtestgetmethod1'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod1'+idengetmethodcount1+'"  onchange="setLabAntibodyIdentificationTestGetMethod_1(this)"></select>';
        event_data += '</td>'
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod11'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod11'+idengetmethodcount1+'"  class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod1_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod21'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod21'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod2_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod31'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod31'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod3_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod41'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod41'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod4_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod51'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod51'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod5_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod61'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod61'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod6_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod71'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod71'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod7_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod81'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod81'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod8_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod91'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod91'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod9_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod101'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod101'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod10_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethod111'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethod111'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethod111_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select id="labantibodyidentificationtestgetmethodauto1'+idengetmethodcount1+'" name="labantibodyidentificationtestgetmethodauto1'+idengetmethodcount1+'" class="form-control" onchange="setLabAntibodyIdentificationTestGetMethodAuto_1(this)"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestgetmethodantibody1'+idengetmethodcount1+'" value="'+value.labantibodyidentificationtestgetmethodantibody1+'" name="labantibodyidentificationtestgetmethodantibody1'+idengetmethodcount1+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestGetMethodAntibody_1(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:120px">';
        event_data += '<input id="labantibodyidentificationtestgetmethodlotno1'+idengetmethodcount1+'" value="'+value.labantibodyidentificationtestgetmethodlotno1+'" name="labantibodyidentificationtestgetmethodlotno1'+idengetmethodcount1+'" class="form-control" onkeyup="setLabAntibodyIdentificationTestGetMethodLotno_1(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_iden_get_method_1").append(event_data);

        setBloodAntiTest("#labantibodyidentificationtestgetmethod1"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod1);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod11"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod11);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod21"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod21);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod31"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod31);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod41"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod41);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod51"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod51);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod61"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod61);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod71"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod71);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod81"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod81);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod91"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod91);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod101"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod101);
        setABOTest0Serum("#labantibodyidentificationtestgetmethod111"+idengetmethodcount1,value.labantibodyidentificationtestgetmethod111);
        setABOTest0Serum("#labantibodyidentificationtestgetmethodauto1"+idengetmethodcount1,value.labantibodyidentificationtestgetmethodauto1);

        $("#labantibodyidentificationtestgetmethod1"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod1);
        $("#labantibodyidentificationtestgetmethod11"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod11);
        $("#labantibodyidentificationtestgetmethod21"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod21);
        $("#labantibodyidentificationtestgetmethod31"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod31);
        $("#labantibodyidentificationtestgetmethod41"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod41);
        $("#labantibodyidentificationtestgetmethod51"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod51);
        $("#labantibodyidentificationtestgetmethod61"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod61);
        $("#labantibodyidentificationtestgetmethod71"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod71);
        $("#labantibodyidentificationtestgetmethod81"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod81);
        $("#labantibodyidentificationtestgetmethod91"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod91);
        $("#labantibodyidentificationtestgetmethod101"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod101);
        $("#labantibodyidentificationtestgetmethod111"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethod111);
        $("#labantibodyidentificationtestgetmethodauto1"+idengetmethodcount1).val(value.labantibodyidentificationtestgetmethodauto1);
    
        idengetmethodcount1++;
  }
// End Antibody identification test Get Method


// Start AntiSceeningTest Get Method
var anticountgetmethod1 = 0;
function addAntiSceeningTestGetMethod1(value=[]) {

        if(value.length == 0)
        {
            value = {
                        labantibodysceentestgetmethodid1:'',
                        labantibodysceentestgetmethodtest1:'',
                        labantibodysceentestgetmethodp1mi1:'',
                        labantibodysceentestgetmethodo11 : '',
                        labantibodysceentestgetmethodo21:'',
                        labantibodysceentestgetmethodo31:'',
                        labantibodysceentestgetmethodenz1:'',
                        labantibodysceentestgetmethodlotno1:''
                    };
            
        }
											
        var event_data = '';
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodtest1'+anticountgetmethod1+'" name="labantibodysceentestgetmethodtest1'+anticountgetmethod1+'" onchange="setLabAntibodySceenTestGetMethod_1(this)"  class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodp1mi1'+anticountgetmethod1+'" name="labantibodysceentestgetmethodp1mi1'+anticountgetmethod1+'" onchange="setLabAntibodySceenTestGetMethodP1ma_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo11'+anticountgetmethod1+'" name="labantibodysceentestgetmethodo11'+anticountgetmethod1+'" onchange="setLabAntibodySceenTestGetMethodO1_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo21'+anticountgetmethod1+'"  name="labantibodysceentestgetmethodo21'+anticountgetmethod1+'" onchange="setLabAntibodySceenTestGetMethodO2_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<select id="labantibodysceentestgetmethodo31'+anticountgetmethod1+'"  name="labantibodysceentestgetmethodo31'+anticountgetmethod1+'" onchange="setLabAntibodySceenTestGetMethodO3_1(this)" class="form-control"></select>';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodenz1'+anticountgetmethod1+'"  name="labantibodysceentestgetmethodenz1'+anticountgetmethod1+'" value="'+value.labantibodysceentestgetmethodenz1+'" onkeyup="setLabAntibodySceenTestGetMethodEnz1_1(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        event_data += '<input id="labantibodysceentestgetmethodlotno1'+anticountgetmethod1+'"  name="labantibodysceentestgetmethodlotno1'+anticountgetmethod1+'" value="'+value.labantibodysceentestgetmethodlotno1+'" onkeyup="setLabAntibodySceenTestGetMethodLotno_1(this)" class="form-control">';
        event_data += '</td>';
        event_data += '<td class="td-table" style="width:40px">' ;
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ' ;
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';

        
        $("#list_table_anti_sceen_get_method_1").append(event_data);

        setBloodAntiTest("#labantibodysceentestgetmethodtest1"+anticountgetmethod1,value.labantibodysceentestgetmethodtest1);
        setABOTest0Serum("#labantibodysceentestgetmethodp1mi1"+anticountgetmethod1,value.labantibodysceentestgetmethodp1mi1);
        setABOTest0Serum("#labantibodysceentestgetmethodo11"+anticountgetmethod1,value.labantibodysceentestgetmethodo11);
        setABOTest0Serum("#labantibodysceentestgetmethodo21"+anticountgetmethod1,value.labantibodysceentestgetmethodo21);
        setABOTest0Serum("#labantibodysceentestgetmethodo31"+anticountgetmethod1,value.labantibodysceentestgetmethodo31);

        $("#labantibodysceentestgetmethodtest1"+anticountgetmethod1).val(value.labantibodysceentestgetmethodtest1);
        $("#labantibodysceentestgetmethodp1mi1"+anticountgetmethod1).val(value.labantibodysceentestgetmethodp1mi1);
        $("#labantibodysceentestgetmethodo11"+anticountgetmethod1).val(value.labantibodysceentestgetmethodo11);
        $("#labantibodysceentestgetmethodo21"+anticountgetmethod1).val(value.labantibodysceentestgetmethodo21);
        $("#labantibodysceentestgetmethodo31"+anticountgetmethod1).val(value.labantibodysceentestgetmethodo31);
        anticountgetmethod1++;
}

function setpos1(indexcount1,self,col='')
{
    var labrhrt1 = $("#labrhrt1"+indexcount1).val();
    var lab37c1 = $("#lab37c1"+indexcount1).val();
    var labiat1 = $("#labiat1"+indexcount1).val();
    var labccc1 = $("#labccc1"+indexcount1).val();
    var labresult1 = $("#labresult1"+indexcount1).val();

    // if(labrhrt1 > 1 || lab37c1 > 1 || labiat1 > 1 || labccc1 > 1 || labresult1 > 1){
    //     $("#labconfirmrhid_1").val("Rh+");
    // }
    if(labrhrt1 > 1 || lab37c1 > 1 || labiat1 > 1  ){

        setDataModalSelectValue(`labconfirmrhid_1`, 'Rh+', 'Positive');
        setDataModalSelectValue(`labresult1`+indexcount1, 'Rh+', 'Positive');
        confirmRhResult("Rh+");
        
    }else if(labrhrt1 == 1 || lab37c1 == 1 || labiat1 == 1  ){

        setDataModalSelectValue(`labconfirmrhid_1`, 'Rh-', 'Negative');
        setDataModalSelectValue(`labresult1`+indexcount1, 'Rh-', 'Negative');
        confirmRhResult("Rh-");
        
    }else 
    {
        setDataModalSelectValue(`labconfirmrhid_1`, '', '');
        setDataModalSelectValue(`labresult1`+indexcount1, '', '');
        confirmRhResult("");
    }
    noautopos1(self);
}

function noautopos1(self){
    var rows = self.parentNode.parentNode;
    var item = JSON.parse(rows.cells[0].innerHTML);

    var table = document.getElementById("list_table_rh_1");
    var r = 0;
    var status0 = "";
    // alert(item.labresult0);

    while (row = table.rows[r++]) {
        try {
            var bloodrh = JSON.parse(document.getElementById("list_table_rh_1").rows[r].cells.item(0).innerHTML);  
        }
        catch(err) {
            console.log("err");
        }
        
        // console.log(bloodrh);
        // alert(bloodrh);
        if(item.labresult1 != bloodrh.labresult1){
            // alert("5555555555");
            $("#labconfirmrhid_1").val("");
            $("#labconfirmrhid_1").trigger('change');
            return false;
        }
        else{
            $("#labconfirmrhid_1").val(item.labresult1);
            $("#labconfirmrhid_1").trigger('change');
        }
    }
}
// End AntiSceeningTest Get Method

