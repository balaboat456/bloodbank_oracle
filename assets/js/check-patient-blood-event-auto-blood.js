/*
function autoBlood()
{
    var antia = $("#anti-a").val();
    var antib = $("#anti-b").val();
    var acells = $("#acells").val();
    var bcells = $("#bcells").val();
  
    if((antia) && (antib) && (acells) && (bcells) 
        && (antia != "0") && (antib != "0" ) && (acells != "0") && (bcells != "0")
        )
    {
        if((antia != "1") && (antib == "1") && (acells == "1") && (bcells != "1"))
        {
            $("#bloodgroup").val("A");
            $("#confirmbloodgroup").val("A");
            $("#confirmbloodgroupshow").val($("#confirmbloodgroup").val());
        }else if((antia == "1") && (antib != "1") && (acells != "1") && (bcells == "1"))
        {
            $("#bloodgroup").val("B");
            $("#confirmbloodgroup").val("B");
            $("#confirmbloodgroupshow").val($("#confirmbloodgroup").val());
        }else if((antia == "1") && (antib == "1") && (acells != "1") && (bcells != "1"))
        {
            $("#bloodgroup").val("O");
            $("#confirmbloodgroup").val("O");
            $("#confirmbloodgroupshow").val($("#confirmbloodgroup").val());
        }else if((antia != "1") && (antib != "1") && (acells == "1") && (bcells == "1"))
        {
            $("#bloodgroup").val("AB");
            $("#confirmbloodgroup").val("AB");
            $("#confirmbloodgroupshow").val($("#confirmbloodgroup").val());
        }else
        {
            errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
            $("#bloodgroup").val(0);
            $("#confirmbloodgroup").val(0);
            $("#confirmbloodgroupshow").val($("#confirmbloodgroup").val());
        }
    }else
    {
        $("#bloodgroup").val(0);
        $("#confirmbloodgroup").val(0);
    }
    
}
*/