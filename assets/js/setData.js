function dateExp(type='',startdate='')
{
    var plusDay = 0;
    if(type == 'CRYO' || type == 'CRP' || type == 'HTFDC' || type == 'FFP')
    {
        plusDay = 365;
    }else if(type == 'LDSDR' || type == 'LPRC' || type == 'LDPRC' || type == 'SDR')
    {
        plusDay = 42 ;
    }else if(type == 'LDPPC' || type == 'LDPPC_PAS' || type == 'PC' || type == 'LPPC' || type == 'SDP')
    {
        plusDay = 5 ;
    }else if(type == 'PRC' || type == 'WB')
    {
        plusDay = 35 ;
    }

    var today = new Date(new Date(startdate.replace( /(\d{2})\/(\d{2})\/(\d{4})/, "$2/$1/$3")));
    var tomorrow = new Date(today ) ;
    tomorrow.setDate(tomorrow.getDate() + plusDay);
    if(today == 'Invalid Date')
    {
        return '';
    }else
    {
        return tomorrow;
    }
    
}