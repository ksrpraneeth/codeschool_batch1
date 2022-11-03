$("document").ready(()=>{
    $.ajax({
        url:'https://randomuser.me/api/',
        dataType:'json',
        success:function(data){
            $("#fName").html(data.results[0].name.first)
            $("#lName").html(data.results[0].name.last)
            $("#gender").html(data.results[0].gender)
            $("#sName").html(data.results[0].location.street.name)
            $("#city").html(data.results[0].location.city)
            $("#cT").html(data.results[0].location.country)
            $("#cT").html(data.results[0].location.country)
            $("#mail").html(data.results[0].email)
            $("#uN").html(data.results[0].login.username)
            $("#pW").html(data.results[0].login.password)
            $("#pNo").html(data.results[0].login.phone)



        }
    });
});