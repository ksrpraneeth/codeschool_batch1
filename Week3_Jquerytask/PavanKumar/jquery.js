const hoaList = [
    {
        frist4: 1234,
        sec2:56,
        third:789,
        fouth:23,
        fifth:45,
        sixth:78,
        seven:146
    },
    {
        frist4: 1958,
        sec2:45,
        third:678,
        fouth:45,
        fifth:34,
        sixth:78,
        seven:561
    },
    {
        frist4: 3456,
        sec2:56,
        third:461,
        fouth:00,
        fifth:02,
        sixth:78,
        seven:475
    }
]

$("document").ready(()=>{
    $.ajax({
        url:'https://reqres.in/api/users/2',
        dataType:'json',
        success:function(data){
            $("#ppo_id").html(data.data.id)
            $("#ppo_number").html(data.data.email)
            $("#type").html(data.data.first_name)
            $("#pensioncategory").html(data.data.last_name)
            $("#img").attr("src",data.data.avatar)
            $("#recruitment").html(data.support.url)
            $("#pensiondate").html(data.support.text)
            
        },
        error:function(err){
            alert("Get Api Failed");
            console.log(err)
        }
    });
});

const fillValues = (values) => {

            document.getElementById("input1").value=values.frist4;
            document.getElementById("input2").value=values.sec2;
            document.getElementById("input3").value=values.third;
            document.getElementById("input4").value=values.fouth;
            document.getElementById("input5").value=values.fifth;
            document.getElementById("input6").value=values.sixth;
            document.getElementById("input7").value=values.seven;

}


function onClickFillHoa(){
   
    if(document.getElementById("hoa").value === "link1"){
        const firstLinkList = hoaList[0]

        fillValues(firstLinkList)
    }
    else if (document.getElementById("hoa").value === "link2") {
        const secoundLink = hoaList[1]
        fillValues(secoundLink)
           
    }

    else if (document.getElementById("hoa").value === "link3") {
        const thirdLink = hoaList[2]
        fillValues(thirdLink)
    }
    

}

$(function() {
    $( "#datepicker" ).datepicker({  maxDate: 0 });
  });

  const showError = (fail) => {
        alert(fail)
        console.log(fail)
  }

  const showSuccess = (success) => {
    
    console.log(success)
  }


const onclickValidate = () => {


    let error = false
        const monthlyInstallMent = document.getElementById("monthly");
        const totalAmount = document.getElementById("totalAmount")
        const enterDiscription = document.getElementById("eD")
        const totalAmountValue = ""
        const monthlyAmountValue = ""
        const discriptionValue = ""

            if (totalAmount.value === "") {
                
                document.getElementById("errorTotal").innerHTML= '*Enter Amount'
                document.getElementById("errorTotal").style.color = "red";
                error = true;
            }
    
            else if (totalAmount.value === "^[0-9]*$" ){   
                console.log(2)
                document.getElementById("errorTotal").innerHTML = "Please Enter Only Numbers"
                document.getElementById("errorTotal").style.color = "red";
                
                error = true;
            }
            else {
                
                totalAmount.value = totalAmountValue
                document.getElementById("errorTotal").innerHTML= ''
                document.getElementById("errorTotal").style.color = "red";
                console.log(3)
                // error=false
            }
    
            if (monthlyInstallMent.value === "") {
                console.log(4)
                document.getElementById("errorMonthly").innerHTML = "please Enter Value"
                document.getElementById("errorMonthly").style.color = "red";
                error = true;
            }
            else if (monthlyInstallMent.value === "^[0-9]*$" ){
                console.log(5)
                document.getElementById("errorMonthly").innerHTML = "please Enter Numbers Only"
                document.getElementById("errorMonthly").style.color = "red";
                error = true;
            }
            else {
                console.log(7)
                monthlyInstallMent.value = monthlyAmountValue
                document.getElementById("errorMonthly").innerHTML= ''
                document.getElementById("errorMonthly").style.color = "red";
                // error=false
            }
            
            if (enterDiscription.value === ""){
                document.getElementById("errorDisscription").innerHTML = "please Enter Value"
                document.getElementById("errorDisscription").style.color = "red";
                error = true;  
            }
    
           else if (enterDiscription.value === "[a-zA-Z]"){
                console.log(8)
                document.getElementById("errorDisscription").innerHTML = "please Enter Value"
                document.getElementById("errorDisscription").style.color = "red";
                error = true;   
            }
            else {
                console.log(9)
                enterDiscription.value = discriptionValue
                document.getElementById("errorDisscription").innerHTML= ''
                document.getElementById("errorDisscription").style.color = "red";
                // error=false
            }
    
            if(error===false){
                //ajax post submit
                $(() => {
                    // function will get executed
                    // on click of submit button
                    $("#submit").click(function  (e) {
                        // var form1 = $("#form");
                        // // console.log(form1)
                        // var url = form1.attr('action');
                         $.ajax ({
                            type: "POST",
                            url: 'https://reqres.in/api/users',
                             data: {
                                      amountTotal: totalAmountValue,
                                      monthlyAmount: monthlyAmountValue,
                                      description: discriptionValue
                                    },
                            success: function  (data) {
                                console.log(data);
        
                                // Ajax call completed successfully
                                alert("Form Submited Successfully");
                            },
                            error: function (data) {
                                console.log(data);
                                // Some error in ajax call
                                alert("some Error");
                            }
                        });
                    });
                });

                // $("submit").click(function(){
                //     $.post("dhttps://reqres.in/api/users",
                //     {
                //       amountTotal: totalAmountValue,
                //       monthlyAmount: monthlyAmountValue,
                //       description: discriptionValue
                //     },
                //     function(data, status){
                //       alert("Data: " + data + "\nStatus: " + status);
                //     });
                //   });
            }

}

