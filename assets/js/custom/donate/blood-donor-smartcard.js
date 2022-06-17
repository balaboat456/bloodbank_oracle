function loadSmartCard()
{
    $.ajax({
        url: cardreader_config,
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
            if(obj.success)
            {
                var imagePofile = 'data:image/jpeg;base64,' + obj.data.photo;
                    document.getElementById('smartcardprofile').src = imagePofile;

                    document.getElementById('smartcardfullname').innerHTML = obj.data.fullname_th;
                    document.getElementById('smartcardcitizenid').innerHTML  = obj.data.citizenid;
                    document.getElementById('smartcarddob').innerHTML  = obj.data.dob;
                    document.getElementById('smartcardgender_th').innerHTML  = obj.data.gender_th;
                    document.getElementById('smartcardaddress').innerHTML  = obj.data.address;

                    
                
            }else
            {
                document.getElementById('smartcardprofile').src = "assets/images/profile.png";
                document.getElementById('smartcardfullname').innerHTML = "-";
                document.getElementById('smartcardcitizenid').innerHTML  = "-";
                document.getElementById('smartcarddob').innerHTML  = "-";
                document.getElementById('smartcardgender_th').innerHTML  = "-";
                document.getElementById('smartcardaddress').innerHTML  = "-";
            }
        },
        error: function (d) {
            IntervalState = false;
            console.log("error");
        }
    });
}