function numberToWords(){
const num = document.getElementById("partyamount").value;
const partyAmountWords = (num) => {
   const single = ["Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
   const double = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
   const tens = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
   const formatTenth = (digit, prev) => {
      return 0 == digit ? "" : " " + (1 == digit ? double[prev] : tens[digit])
   };
   const formatOther = (digit, next, denom) => {
      return (0 != digit && 1 != next ? " " + single[digit] : "") + (0 != next || digit > 0 ? " " + denom : "")
   };
   let res = "";
   let index = 0;
   let digit = 0;
   let next = 0;
   let words = [];
   if (num += "", isNaN(parseInt(num))){
      res = "";
   }
   else if (parseInt(num) > 0 && num.length <= 10) {
      for (index = num.length - 1; index >= 0; index--) switch (digit = num[index] - 0, next = index > 0 ? num[index - 1] - 0 : 0, num.length - index - 1) {
         case 0:
            words.push(formatOther(digit, next, ""));
         break;
         case 1:
            words.push(formatTenth(digit, num[index + 1]));
            break;
         case 2:
            words.push(0 != digit ? " " + single[digit] + " Hundred" + (0 != num[index + 1] && 0 != num[index + 2] ? " and" : "") : "");
            break;
         case 3:
            words.push(formatOther(digit, next, "Thousand"));
            break;
         case 4:
            words.push(formatTenth(digit, num[index + 1]));
            break;
         case 5:
            words.push(formatOther(digit, next, "Lakh"));
            break;
         case 6:
            words.push(formatTenth(digit, num[index + 1]));
            break;
         case 7:
            words.push(formatOther(digit, next, "Crore"));
            break;
         case 8:
            words.push(formatTenth(digit, num[index + 1]));
            break;
         case 9:
            words.push(0 != digit ? " " + single[digit] + " Hundred" + (0 != num[index + 1] || 0 != num[index + 2] ? " and" : " Crore") : "")
      };
      res = words.reverse().join("")
   } else res = "";
   return res
};
document.getElementById("partyAmountWords1").innerHTML=(partyAmountWords(num))+"rupees";
}