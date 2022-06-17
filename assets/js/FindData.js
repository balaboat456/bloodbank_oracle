function  getIndex ( arr, prop,value) {
        for(var i = 0; i < arr.length; i++) 
        {
                if(arr[i][prop] == value) 
                {
                    return i;
                }
        }
}

function  getRow(arr, prop,value) {
        for(var i = 0; i < arr.length; i++) 
        {
                if(arr[i][prop] == value) 
                {
                    return arr[i];
                }
        }
                
}

function getMaxValue(arr, prop){
        var max = 0;
        for(var i = 0; i < arr.length; i++) 
        {
                if(arr[i][prop] > max) 
                {
                    max = arr[i][prop];
                }
        }

        return max;
                
}

function deleteIndex(arr, index){
        var arrItem = [] ;
        for(var i = 0; i < arr.length; i++) 
        {

                if(i != index) 
                {
                   arrItem.push(arr[i]);
                }
        }
        return arrItem;
                
}
