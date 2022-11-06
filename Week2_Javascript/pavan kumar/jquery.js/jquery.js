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
            $("#id").html(data.data.id)
            $("#mail").html(data.data.email)
            $("#fName").html(data.data.first_name)
            $("#lName").html(data.data.last_name)
            $("#img").attr("src",data.data.avatar)
            $("#url").html(data.support.url)
            $("#text").html(data.support.text)
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

  const showSuccess = (...success) => {
    alert(success)
    console.log(success)
  }


  $(() => {

    let error = false

    const monthlyInstallMent = document.getElementById("monthly");
    const totalAmount = document.getElementById("totalAmount")
    const enterDiscription = document.getElementById("eD")
    
    
    $("#submit").click(function (e) {

        if (monthlyInstallMent.value !== "^(0|[1-9][0-9]*)$" && 
            totalAmount.value !== "^(0|[1-9][0-9]*)$" &&
            enterDiscription.value === NaN) {
            showError("Enter only Numbers and Special Charators are Not allowd in Description");
            error = true;
        } else {
            showSuccess(monthlyInstallMent.value, enterDiscription.value , totalAmount.value);
        }

        if (error === false){
            var form1 = $("#form");
                var url = form1.attr('action');
                $.ajax({
                    type: "POST",
                    url: 'https://reqres.in/api/users',
                    data: showSuccess(),
                    success: function (data) {
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
        }
        
        
    });
});



