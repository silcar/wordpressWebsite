/**
 * Created by probee on 02/11/2016.
 */
wrapper = function (number){
    var digits = Array.from(number);
    //console.log(digits);
    var digit_count = digits.length;
    var output ='';
    var j = 0;
    while(digit_count >= 0){
        j++;
        if(j==4){
            output = "<span class='digit-unit'>digits[digit_count]</span><span class='separator'></span>" + output;
            j = 1;
        }else {
            output = "<span class='digit-unit'>digits[digit_count]</span>" . output;
        }
        digit_count -=1;
    }
    return output;
};