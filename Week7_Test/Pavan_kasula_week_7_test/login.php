<?php 
include 'apis/db.php';
include 'apis/response.php';


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body style="background-image: url('pictures/bg3.jpg')">
    <div class="container-fluid p-0 m-0">
      <header class="bg-dark">
        <div class="row p-2">
          <div class="col-md-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="46"
              height="46"
              fill="currentColor"
              class="bi bi-gpu-card text-warning"
              viewBox="0 0 16 16"
            >
              <path
                d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"
              />
              <path
                d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5Zm5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0Z"
              />
              <path
                d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5v-1Zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5Z"
              />
            </svg>
          </div>
          <div class="d-flex col-md-3 align-items-center">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="46"
              height="46"
              fill="currentColor"
              class="bi bi-chevron-left text-white"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"
              />
            </svg>
            <h4 class="text-white">CODESCHOOL</h4>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="46"
              height="46"
              fill="currentColor"
              class="bi bi-chevron-right text-white"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
              />
            </svg>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-2">
            <a
              type="button"
              class="btn btn-warning"
              onclick="location.assign('register.php')"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="36"
                height="36"
                fill="currentColor"
                class="bi bi-cloud-arrow-up-fill"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"
                />
              </svg>
              REGISTER</a
            >
          </div>
        </div>
      </header>
      <div class="box col-md-3"></div>
      <div class="box col-md-6 bg-dark bg-opacity-50">
        <div class="email">
          <h4
            class="col-md-12 text-warning bg-white bg-opacity-25 rounded-3 p-2"
          >
            Login<svg
              xmlns="http://www.w3.org/2000/svg"
              width="26"
              height="26"
              fill="currentColor"
              class="bi bi-person-bounding-box text-warning m-1"
              viewBox="0 0 16 16"
            >
              <path
                d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"
              />
              <path
                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
              />
            </svg>
          </h4>
          <label class="col-md-12 text-white" for="userNameInput">Username </label>
          <input
            class="form-control form-control-sm col-md-12"
            type="email"
            id="userNameInput"
            placeholder="Enter Username here"
          />
        </div>
        <div class="">
          <label class="col-md-12 text-white" for="passwordInput"
            >Password
          </label>
          <input
            class="form-control form-control-sm col-md-12"
            type="text"
            id="passwordInput"
            placeholder="Enter password here"
          />
        </div>

        <div class="row">
          <p class="text-danger" id="errors"></p>                      
        </div>
        <div
          class="row justify-content-around col-md-12"
          style="margin-top: 10px"
        >
          <button class="btn btn-warning col-sm-3" id="registerButton" onclick="login()">
            LOGIN
          </button>
        </div>
        
      </div>
      <div class="col-md-3 box"></div>
    </div>
  </body>
  <style>
    .k {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .box {
      padding: 50px;
    }
  </style>
   <script>
        if (localStorage.getItem("username") != null) {
            window.location.assign("form.php");
        }
</script>
</html>
