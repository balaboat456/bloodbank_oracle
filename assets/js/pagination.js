function pagination(p)
{

    var pagination = document.getElementById("pagination");
    while (pagination.firstChild) {
        pagination.removeChild(pagination.firstChild);
    }
    var pagination_data = '';
    if(p.count_page > 1)
    {
        pagination_data += '<a onclick="loadTable(1)" href="#">&laquo;</a>';
        for (var i = 1; i <= p.count_page; i++) {
            pagination_data += '<a href="#" onclick="loadTable('+i+')" '+((p.active == i)?'class="active" ':'')+'>'+i+'</a>';
        }
        pagination_data += '<a onclick="loadTable('+p.count_page+')" href="#">&raquo;</a>';
    }
   
    $("#pagination").append(pagination_data);
}