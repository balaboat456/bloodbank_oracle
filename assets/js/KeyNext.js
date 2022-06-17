
$(document).ready(function () {

    $("input,select").bind("keydown", function(event) {
        if (event.which === 13) {
            event.stopPropagation();
            event.preventDefault();
           $(':input:eq(' + ($(':input').index(this) + 1) +')').focus();
        }
    });
    

});

window.addEventListener("keydown", function(e) {
  
    if(e.code == "ArrowRight" || e.code == "Enter" || e.code == "NumpadEnter")
    {
        keyArrowRight(e.target);
    }else if(e.code == "ArrowLeft")
    {   
        keyArrowLeft(e.target)
    }else if(e.code == "ArrowUp")
    {
        keyArrowUp(e.target)
    }else if(e.code == "ArrowDown")
    {
        keyArrowDown(e.target)
    }


    if(["ArrowUp","ArrowDown","ArrowLeft","ArrowRight"].indexOf(e.code) > -1) {
        e.preventDefault();
    }
}, false);


function keyArrowRight(self)
{
    var arr = [];
    if(self.name.search("remark") > 0)
    {
        arr = arrInputX3(self);
    }else if(self.name.search("rfid") > 0)
    {
        arr = arrInputX2(self);
    }else
    {
        arr = arrInputX1(self);
    }

     
    var indexNext = "";

    arr.forEach(function (item,index) {
        if(self.name == item && arr.length != (index+1))
        {
            indexNext = (index+1);
        }
    })

    if(indexNext != "")
    {
        document.getElementById(arr[indexNext]).focus();
    }

}

function keyArrowLeft(self)
{
    
    var arr = [];
    if(self.name.search("remark") > 0)
    {
        arr = arrInputX3(self);
    }else if(self.name.search("rfid") > 0)
    {
        arr = arrInputX2(self);
    }else
    {
        arr = arrInputX1(self);
    }

    var indexNext = "";

    arr.forEach(function (item,index) {
      
        if(self.name == item )
        {
            indexNext = (index-1);
        }
    })

 
    if(indexNext >= 0)
    document.getElementById(arr[indexNext]).focus();

}

function keyArrowDown(self)
{
    var count = parseInt($("#countblood2").val());
    // console.log(self.children[0].id);
    var v_input = self.name.replace(/[0-9]/g, '');
        v_input = v_input.replace("exp", '');
        v_input = v_input.replace("rfid", '');
        v_input = v_input.replace("remark", '');

       

    var arr = [];
    for(let i = 0; i < count; i++) {

        var volume_input = document.getElementById(v_input+i) ;
        var rfid_input = document.getElementById(v_input+'rfid'+i) ;
        var remark_input = document.getElementById(v_input+'remark'+i) ;

        if(volume_input != null && !volume_input.disabled)
        {
            arr.push(volume_input.name);
        }

        // if(rfid_input != null && !rfid_input.disabled)
        // {
        //     arr.push(rfid_input.name);
        // }

        // if(remark_input != null && !remark_input.disabled)
        // {
        //     arr.push(remark_input.name);
        // }

    }

    var indexNext = "";
    arr.forEach(function (item,index) {
      
        if(self.name.replace("exp", '') == item && arr.length != (index+1))
        {
            indexNext = (index+1);
        }
    })

    if(indexNext != "")
    {
        document.getElementById(arr[indexNext]).focus();
        chActiveTable(numberR(document.getElementById(arr[indexNext]).name));
    }

}

function keyArrowUp(self)
{
    var count = parseInt($("#countblood2").val());
    
    var v_input = self.name.replace(/[0-9]/g, '');
        v_input = v_input.replace("exp", '');
        v_input = v_input.replace("rfid", '');
        v_input = v_input.replace("remark", '');

       

    var arr = [];
    for(let i = 0; i < count; i++) {

        var volume_input = document.getElementById(v_input+i) ;
        var rfid_input = document.getElementById(v_input+'rfid'+i) ;
        var remark_input = document.getElementById(v_input+'remark'+i) ;

        if(volume_input != null && !volume_input.disabled)
        {
            arr.push(volume_input.name);
        }

        // if(rfid_input != null && !rfid_input.disabled)
        // {
        //     arr.push(rfid_input.name);
        // }

        // if(remark_input != null && !remark_input.disabled)
        // {
        //     arr.push(remark_input.name);
        // }

    }

    var indexNext = "";
    arr.forEach(function (item,index) {
      
        if(self.name.replace("exp", '') == item )
        {
            indexNext = (index-1);
        }
    })

  
    if(indexNext >= 0)
    {
        document.getElementById(arr[indexNext]).focus();
        chActiveTable(numberR(document.getElementById(arr[indexNext]).name));
    }
    
    

}

function arrInputX1(self)
{
    var v_index = numberR(self.name) ;
    var prc = document.getElementById("prc"+v_index) ;
    var prcexp = document.getElementById("prcexp"+v_index) ;

    var lprc = document.getElementById("lprc"+v_index) ;
    var lprcexp = document.getElementById("lprcexp"+v_index) ;

    var ffp = document.getElementById("ffp"+v_index) ;
    var ffpexp = document.getElementById("ffpexp"+v_index) ;

    var pc = document.getElementById("pc"+v_index) ;
    var pcexp = document.getElementById("pcexp"+v_index) ;

    var lppc = document.getElementById("lppc"+v_index) ;
    var lppcexp = document.getElementById("lppcexp"+v_index) ;

    var lppc_pas = document.getElementById("lppc_pas"+v_index) ;
    var lppc_pasexp = document.getElementById("lppc_pasexp"+v_index) ;

    var sdp = document.getElementById("sdp"+v_index) ;
    var sdpexp = document.getElementById("sdpexp"+v_index) ;

    var sdp_pas = document.getElementById("sdp_pas"+v_index) ;
    var sdp_pasexp = document.getElementById("sdp_pasexp"+v_index) ;

    var wb = document.getElementById("wb"+v_index) ;
    var wbexp = document.getElementById("wbexp"+v_index) ;

    var ldprc = document.getElementById("ldprc"+v_index) ;
    var ldprcexp = document.getElementById("ldprcexp"+v_index) ;

    var sdr = document.getElementById("sdr"+v_index) ;
    var sdrexp = document.getElementById("sdrexp"+v_index) ;

    var sdr = document.getElementById("sdr"+v_index) ;
    var sdrexp = document.getElementById("sdrexp"+v_index) ;

    var crp = document.getElementById("crp"+v_index) ;
    var crpexp = document.getElementById("crpexp"+v_index) ;

    var cryo = document.getElementById("cryo"+v_index) ;
    var cryoexp = document.getElementById("cryoexp"+v_index) ;

    var arr = [];
    if(prc != null)
    {
        arr.push(prc.name);
    }
    
    if(prcexp != null)
    {
        arr.push(prcexp.name);
    }
    
    if(lprc != null)
    {
        arr.push(lprc.name);
    }
    
    if(lprcexp != null)
    {
        arr.push(lprcexp.name);
    }
    
    if(ffp != null)
    {
        arr.push(ffp.name);
    }
    
    if(ffpexp != null)
    {
        arr.push(ffpexp.name);
    }
    
    if(pc != null)
    {
        arr.push(pc.name);
    }
    
    if(pcexp != null)
    {
        arr.push(pcexp.name);
    }
    
    if(lppc != null)
    {
        arr.push(lppc.name);
    }
    
    if(lppcexp != null)
    {
        arr.push(lppcexp.name);
    }
    
    if(lppc_pas != null)
    {
        arr.push(lppc_pas.name);
    }
    
    if(lppc_pasexp != null)
    {
        arr.push(lppc_pasexp.name);
    }
    
    if(sdp != null)
    {
        arr.push(sdp.name);
    }
    
    if(sdpexp != null)
    {
        arr.push(sdpexp.name);
    }
    
    if(sdp_pas != null)
    {
        arr.push(sdp_pas.name);
    }
    
    if(sdp_pasexp != null)
    {
        arr.push(sdp_pasexp.name);
    }
    
    if(wb != null)
    {
        arr.push(wb.name);
    }
    
    if(wbexp != null)
    {
        arr.push(wbexp.name);
    }
    
    if(ldprc != null)
    {
        arr.push(ldprc.name);
    }
    
    if(ldprcexp != null)
    {
        arr.push(ldprcexp.name);
    }
    
    if(sdr != null)
    {
        arr.push(sdr.name);
    }
    
    if(sdrexp != null)
    {
        arr.push(sdrexp.name);
    }

    if(crp != null)
    {
        arr.push(crp.name);
    }
    
    if(crpexp != null)
    {
        arr.push(crpexp.name);
    }


    if(cryo != null)
    {
        arr.push(cryo.name);
    }
    
    if(cryoexp != null)
    {
        arr.push(cryoexp.name);
    }

    return arr;
}

function arrInputX2(self)
{
    var v_index = numberR(self.name) ;
   
    var prcrfid = document.getElementById("prcrfid"+v_index) ;
    var lprcrfid = document.getElementById("lprcrfid"+v_index) ;
    var ffprfid = document.getElementById("ffprfid"+v_index) ;
    var pcrfid = document.getElementById("pcrfid"+v_index) ;
    var lppcrfid = document.getElementById("lppcrfid"+v_index) ;
    var lppc_pasrfid = document.getElementById("lppc_pasrfid"+v_index) ;
    var sdprfid = document.getElementById("sdprfid"+v_index) ;
    var sdp_pasrfid = document.getElementById("sdp_pasrfid"+v_index) ;
    var wbrfid = document.getElementById("wbrfid"+v_index) ;
    var ldprcrfid = document.getElementById("ldprcrfid"+v_index) ;
    var sdrrfid = document.getElementById("sdrrfid"+v_index) ;
    var crprfid = document.getElementById("crprfid"+v_index) ;
    var cryorfid = document.getElementById("cryorfid"+v_index) ;

    var arr = [];
    
    if(prcrfid != null)
    {
        arr.push(prcrfid.name);
    }
    
    if(lprcrfid != null)
    {
        arr.push(lprcrfid.name);
    }
    
    if(ffprfid != null)
    {
        arr.push(ffprfid.name);
    }
    
    if(pcrfid != null)
    {
        arr.push(pcrfid.name);
    }
    
    if(lppcrfid != null)
    {
        arr.push(lppcrfid.name);
    }
    
    if(lppc_pasrfid != null)
    {
        arr.push(lppc_pasrfid.name);
    }
    
    if(sdprfid != null)
    {
        arr.push(sdprfid.name);
    }
    
    if(sdp_pasrfid != null)
    {
        arr.push(sdp_pasrfid.name);
    }
    
    if(wbrfid != null)
    {
        arr.push(wbrfid.name);
    }
    
    if(ldprcrfid != null)
    {
        arr.push(ldprcrfid.name);
    }
    
    if(sdrrfid != null)
    {
        arr.push(sdrrfid.name);
    }

    if(crprfid != null)
    {
        arr.push(crprfid.name);
    }

    if(cryorfid != null)
    {
        arr.push(cryorfid.name);
    }

    return arr;
}

function arrInputX3(self)
{
    var v_index = numberR(self.name) ;
   
    var prcremark = document.getElementById("prcremark"+v_index) ;
    var lprcremark = document.getElementById("lprcremark"+v_index) ;
    var ffpremark = document.getElementById("ffpremark"+v_index) ;
    var pcremark = document.getElementById("pcremark"+v_index) ;
    var lppcremark = document.getElementById("lppcremark"+v_index) ;
    var lppc_pasremark = document.getElementById("lppc_pasremark"+v_index) ;
    var sdpremark = document.getElementById("sdpremark"+v_index) ;
    var sdp_pasremark = document.getElementById("sdp_pasremark"+v_index) ;
    var wbremark = document.getElementById("wbremark"+v_index) ;
    var ldprcremark = document.getElementById("ldprcremark"+v_index) ;
    var sdrremark = document.getElementById("sdrremark"+v_index) ;

    var crpremark = document.getElementById("crpremark"+v_index) ;
    var cryoremark = document.getElementById("cryoremark"+v_index) ;

    var arr = [];
    
    if(prcremark != null)
    {
        arr.push(prcremark.name);
    }
    
    if(lprcremark != null)
    {
        arr.push(lprcremark.name);
    }
    
    if(ffpremark != null)
    {
        arr.push(ffpremark.name);
    }
    
    if(pcremark != null)
    {
        arr.push(pcremark.name);
    }
    
    if(lppcremark != null)
    {
        arr.push(lppcremark.name);
    }
    
    if(lppc_pasremark != null)
    {
        arr.push(lppc_pasremark.name);
    }
    
    if(sdpremark != null)
    {
        arr.push(sdpremark.name);
    }
    
    if(sdp_pasremark != null)
    {
        arr.push(sdp_pasremark.name);
    }
    
    if(wbremark != null)
    {
        arr.push(wbremark.name);
    }
    
    if(ldprcremark != null)
    {
        arr.push(ldprcremark.name);
    }
    
    if(sdrremark != null)
    {
        arr.push(sdrremark.name);
    }


    if(crpremark != null)
    {
        arr.push(crpremark.name);
    }
    
    if(cryoremark != null)
    {
        arr.push(cryoremark.name);
    }

    return arr;
}