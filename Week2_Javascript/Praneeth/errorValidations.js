

function convertToWords(){
    document.getElementById('status').innerHTML = InWords()
}
function InWords() {
    var data = document.getElementById("amount").value;
    if (data) {
        if (typeof (data) === 'undefined') {
            return "";
        }
        function getwords(e) {

            if (parseInt(e) == 0) {
                return "ZERO";
            } else {
                e = e.toString();
                var splite = e.split(".");
                e = splite[0];

                if (splite[1] == '00') {
                    var u = '';
                } else {
                    if (splite[1]) {
                        var u = ' RUPEES ' + getnum(splite[1]) + ' PAISE';
                    } else {
                        var u = '';
                    }
                }


                var t = "";
                if (e.length == 2) {
                } else if (e.length == 1) {
                    e = 0 + e
                } else if (e.length % 2 === 0) {
                    e = 0 + e
                }
                var n = e.substr(-2, 2);
                t = t + getnum(n);
                if (e.length >= 3) {
                    var r = "0" + e.substr(-3, 1);
                    if (r == "00") {
                    } else {
                        t = getnum(r) + " HUNDRED" + t
                    }
                }
                if (e.length >= 5) {
                    var i = e.substr(-5, 2);
                    if (i == "00") {
                    } else {
                        t = getnum(i) + " THOUSAND" + t
                    }
                }
                if (e.length >= 7) {
                    var s = e.substr(-7, 2);
                    if (s == "00") {
                    } else {
                        t = getnum(s) + " LAKH" + t
                    }
                }
                if (e.length > 7) {
                    var o = e.substr(0, e.length - 7);
                    t = getwords(o) + " CRORE" + t
                }
                return t + ' ' + u
            }

            function getnum(e) {
                var t = "";
                ones = e.substr(1, 1);
                tens = e.substr(0, 1);
                if (tens == "0") {
                    switch (ones) {
                        case "0":
                            t = "";
                            break;
                        case "1":
                            t = " ONE";
                            break;
                        case "2":
                            t = " TWO";
                            break;
                        case "3":
                            t = " THREE";
                            break;
                        case "4":
                            t = " FOUR";
                            break;
                        case "5":
                            t = " FIVE";
                            break;
                        case "6":
                            t = " SIX";
                            break;
                        case "7":
                            t = " SEVEN";
                            break;
                        case "8":
                            t = " EIGHT";
                            break;
                        case "9":
                            t = " NINE";
                            break
                    }
                } else if (tens == "1") {
                    switch (ones) {
                        case "0":
                            t = " TEN";
                            break;
                        case "1":
                            t = " ELEVEN";
                            break;
                        case "2":
                            t = " TWELVE";
                            break;
                        case "3":
                            t = " THIRTEEN";
                            break;
                        case "4":
                            t = " FOURTEEN";
                            break;
                        case "5":
                            t = " FIFTEEN";
                            break;
                        case "6":
                            t = " SIXTEEN";
                            break;
                        case "7":
                            t = " SEVENTEEN";
                            break;
                        case "8":
                            t = " EIGHTEEN";
                            break;
                        case "9":
                            t = "NINETEEN";
                            break
                    }
                } else {
                    switch (tens) {
                        case "2":
                            t = " TWENTY";
                            break;
                        case "3":
                            t = " THIRTY";
                            break;
                        case "4":
                            t = " FORTY";
                            break;
                        case "5":
                            t = " FIFTY";
                            break;
                        case "6":
                            t = " SIXTY";
                            break;
                        case "7":
                            t = " SEVENTY";
                            break;
                        case "8":
                            t = " EIGHTY";
                            break;
                        case "9":
                            t = " NINTY";
                            break
                    }
                    switch (ones) {
                        case "0":
                            t = t + "";
                            break;
                        case "1":
                            t = t + " ONE";
                            break;
                        case "2":
                            t = t + " TWO";
                            break;
                        case "3":
                            t = t + " THREE";
                            break;
                        case "4":
                            t = t + " FOUR";
                            break;
                        case "5":
                            t = t + " FIVE";
                            break;
                        case "6":
                            t = t + " SIX";
                            break;
                        case "7":
                            t = t + " SEVEN";
                            break;
                        case "8":
                            t = t + " EIGHT";
                            break;
                        case "9":
                            t = t + " NINE";
                            break
                    }
                }
                return t
            }
        }

        data = Math.abs(data);

        return getwords(data);
    } else {
        if (data == 0) {
            return "ZERO";
        }
        return "";
    }
}
