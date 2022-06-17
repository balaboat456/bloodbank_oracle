$(document).ready(function() {
    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

function numberR(str) {


    var str2 = '';
    for (i = 0; i < str.length; i++) {
        str2 = str2 + ((!isNaN(parseInt(str.charAt(i)))) ? str.charAt(i) : '');
    }

    return str2;

}

function numnerPoint(str) {

    str = str.replace(/[^a-zA-Z0-9\s]/gi, '');

    str = str.toLocaleUpperCase();
    str = str.split(".").join("");

    if (str.length == 13 && str.substring(0, 1) == 'B' && str.substring(12, 13) == 'C') {
        str = str.substring(1, str.length - 1);
    } else if (str.substring(0, 1) == 'B') {
        str = str.substring(1, str.length);
    }

    var str2 = '';
    for (i = 0; i < str.length && i < 11; i++) {

        if (i == 3 || i == 5 || i == 6) {
            str2 = str2 + ".";
        }
        str2 = str2 + str.charAt(i);
    }

    return str2;

}


function numnerPoint2(str) {

    str = str.replace(/[^a-zA-Z0-9\s]/gi, '');

    str = str.toLocaleUpperCase();
    str = str.split(".").join("");
    var str2 = '';
    for (i = 0; i < str.length && i < 11; i++) {

        if (i == 3 || i == 5 || i == 6) {
            str2 = str2 + ".";
        }
        str2 = str2 + str.charAt(i);
    }

    return str2;

}


function numnerPointBC(str) {

    str = str.replace(/[^a-zA-Z0-9\s]/gi, '');

    str = str.toLocaleUpperCase();
    str = str.split(".").join("");
    var str2 = '';
    for (i = 0; i < str.length && i < 13; i++) {

        if (i == 4 || i == 6 || i == 7) {
            str2 = str2 + ".";
        }
        str2 = str2 + str.charAt(i);
    }

    return str2;

}

function dateField(str) {
    str = numberR(str);
    var str2 = '';
    for (i = 0; i < str.length; i++) {

        if (i == 2 || i == 4) {
            str2 = str2 + "/";
        }
        if (i == 8) {
            str2 = str2 + " ";
        }
        if (i == 10) {
            str2 = str2 + ":";
        }
        str2 = str2 + str.charAt(i);
    }

    return str2;

}


function timeField(self) {
    var str = numberR(self.value);
    console.log(str);
    var str2 = '';
    for (i = 0; i < str.length ; i++) {
        if(i <= 3)
        {
            if (i == 2 ) {
                str2 = str2 + ":";
            }
            str2 = str2 + str.charAt(i);
        }
        
    }
    self.value = str2;

}


function lastString(str = '') {
    if (str.length > 0)
        str = str.substring(0, str.length - 1);
    return str;
}

function realMerge(to, from) {

    for (n in from) {

        if (typeof to[n] != 'object') {
            to[n] = from[n];
        } else if (typeof from[n] == 'object') {
            to[n] = realMerge(to[n], from[n]);
        }
    }
    return to;
}

function replaceComma(text) {
    var str = text.replace(/,/g, '');
    return str;

}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function replaceDecimal(self, digit = 2) {

    var num = self.value.split(".");
    var number = "";
    if (num.length >= 2) {
        number = num[0] + '.' + num[1].substring(0, digit);
    } else {
        number = num[0];
    }

    self.value = number;
}


function setNewHN(self) {
    self.value = replaceHN(self.value);
}

function replaceHN(text) {
    var newtext = text;
    var str = text.replace(/-/g, '');
    if (str.length == 8) {
        if (text.substring(2, 3) == "-") {
            var arrayText = text.split("-");
            newtext = arrayText[1] + '-' + arrayText[0]
        } else if (text.search("-") < 0) {
            newtext = text.substring(2, 8) + '-' + text.substring(0, 2);
        }
    } else if (text.length > 9) {
        newtext = text.substring(0, 9);
    }
    return newtext;
}

function makeid(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
}