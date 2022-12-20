// $("#butsave").click(function (e) {
//     e.preventDefault();
//     console.log("Save Button CLicked");

//     let name = $("#name").val();
//     let phone_no = $("#phone_no").val();
//     let emp_code = $("#emp_code").val();
//     let earnings_id = $("#earnings_id").val();
//     let deduction_id = $("#deduction_id").val();
//     let basic_salary = $("#basic_salary").val();

//     mydata = {name: name, phone_no: phone_no , emp_code:emp_code, earnings_id:earnings_id, deduction_id:deduction_id, basic_salary:basic_salary} ;
//     console.log(mydata);
    
//     $.ajax({
//         url: "insertemp.php",
//         method: "POST",
//         data: JSON.stringify(mydata),
//         success: function (data) {
//             console.log(data);
//             $("#myform")[0].reset();
//         }
//     });
// });