$("document").ready(function () {
});

function login() {
    var LoginData = {
        username : $("#userNameInput").val(),
        password : $("#passwordInput").val(),
    };

    if(LoginData.username == ""){
      $("#errors").html("*Please Enter username*");
      return;
    };
    if(LoginData.password == ""){
      $("#errors").html("*Please Enter  password*");
      return;
    };

    console.log(LoginData);
    $.ajax({
        url: "apis/login.php",
        method: "POST",
        //dataType: "JSON",
        data: LoginData,
        success: function (responseData) {
        responseData = JSON.parse(responseData);
          if (!responseData.status) {
            $("#errors").text(responseData.message);
          } else {
            localStorage.setItem('username',JSON.stringify(responseData.data[0]));
            window.location.assign("form.php");
          }
        },
        error: function () {},
      });

}


function register() {
    var registerData = {
        username : $("#userNameInput").val(),
        password : $("#passwordInput").val(),
        email : $("#emailInput").val(),
        phoneNumber : $("#phoneNumberInput").val(),
    };
    console.log(registerData);

      if(registerData.username == ""){
        $("#errors").html("*Please Enter username*");
        return;
      };
      if(registerData.password == ""){
        $("#errors").html("*Please Enter password*");
        return;
      };

      if(registerData.password !=  $("#confirmPasswordInput").val()){
        $("#errors").html("*Password and Confirm Password is Not Matching*");
        return;
      }
      if(registerData.email == ""){
        $("#errors").html("*Please Enter Email*");
        return;
      };
      if(registerData.phoneNumber == ""){
        $("#errors").html("*Please Enter phoneNumber*");
        return;
      };


    $.ajax({
        method: "POST",
        url: "apis/register.php",
        dataType: "JSON",
        data: registerData,
       
        success: function (responseData) {
          if (!responseData.status) {
            $("#errors").text(responseData.message);
          } else {
            window.location.assign("login.php");
          }
        },
        error: function () {},
      });

}

function addEmployees(){
  var employeeData = {
    firstName : $("#firstNameInput").val(),
    lastName : $("#lastNameInput").val(),
    Aadhaar : $("#aadhaarInput").val(),
    phoneNumber : $("#phoneNumberInput").val(),
    designation : $("#selectDesignation").val(),
    department : $("#selectDepartment").val(),
  }

  if(employeeData.firstName == ""){
    $("#errors").html("*Please Enter First Name*");
    return;
  };

  if(employeeData.lastName == ""){
    $("#errors").html("*Please Enter Last Name*");
    return;
  };

  if(employeeData.Aadhaar == ""){
    $("#errors").html("*Please Enter Aadhaar Number*");
    return;
  };

  if(employeeData.phoneNumber == ""){
    $("#errors").html("*Please Enter Phone Number*");
    return;
  };
  if(employeeData.department == null){
    $("#errors").html("*Please Select department *");
    return;
  };
  if(employeeData.designation == null){
    $("#errors").html("*Please Select Designations*");
    return;
  };

  

  $.ajax({
    method: "POST",
    url: "apis/add_employee.php",
    dataType: "JSON",
    data: employeeData,
   
    success: function (responseData) {
      if (!responseData.status) {
        $("#errors").text(responseData.message);
      } else {
        $("#errors").text(responseData.message);
        location.reload();

      }
    },
    error: function () {},
  });
}


function getAllDetails() {
  $.ajax({
    url:"apis/get_details.php",
    method:"POST",
    dataType: "JSON",
      success: function(responseData){
        if(!responseData.status){
          $("#errors").text(responseData.message);
        }else{
        //  $("#passbookTable").html(``);
        console.log(responseData);
          for (let i = 0; i < responseData.data.length; i++) {
            $("#passbookTable").append(`
            <tr>
              <td> ${responseData.data[i].id}
          </td>
              <td> ${responseData.data[i].firstName}  
          </td>
          <td> ${responseData.data[i].lastname}
          </td>
              <td> ${responseData.data[i].aadharNumber}  
          </td>
          <td> ${responseData.data[i].phoneNumber}
          </td>
              <td> ${responseData.data[i].department}  
          </td>
          <td> ${responseData.data[i].designation}  
          </td
              </tr>  
              `);
          }
        }
      }

  })
};
