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
    <title>Register</title>

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
    <div class="container-fluid m-0 p-0">
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
              onclick="location.assign('login.php')"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="26"
                height="26"
                fill="currentColor"
                class="bi bi-cursor-fill"
                viewBox="0 0 16 16"
              >
                <path
                  d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"
                />
              </svg>
              LOGIN</a
            >
          </div>
        </div>
      </header>
      <div class="row mt-3">
        <div class="box col-md-3"></div>
        <div class="boxs col-md-6 bg-dark bg-opacity-50 p-4">
          <div class="email">
            <h5
              class="col-md-12 text-warning bg-secondary bg-opacity-25 rounded-3 p-2"
              for="emailInput"
            >
              REGISTER
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="26"
                height="26"
                fill="currentColor"
                class="bi bi-hand-index-thumb-fill text-warning"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8.5 1.75v2.716l.047-.002c.312-.012.742-.016 1.051.046.28.056.543.18.738.288.273.152.456.385.56.642l.132-.012c.312-.024.794-.038 1.158.108.37.148.689.487.88.716.075.09.141.175.195.248h.582a2 2 0 0 1 1.99 2.199l-.272 2.715a3.5 3.5 0 0 1-.444 1.389l-1.395 2.441A1.5 1.5 0 0 1 12.42 16H6.118a1.5 1.5 0 0 1-1.342-.83l-1.215-2.43L1.07 8.589a1.517 1.517 0 0 1 2.373-1.852L5 8.293V1.75a1.75 1.75 0 0 1 3.5 0z"
                />
              </svg>
            </h5>
            <label class="col-md-12 text-white" for="username">Username </label>
            <input
              class="form-control form-control-sm col-md-12"
              type="email"
              id="userNameInput"
              placeholder="Enter Username here"
            />
          </div>
          <div class="">
            <label class="col-md-12 text-white" for="PasswordInput"
              >Password
            </label>
            <input
              class="form-control form-control-sm col-md-12"
              type="text"
              id="passwordInput"
              placeholder="Enter password here"
            />
          </div>
          <div class="">
                <label class="col-md-12 text-white" for="confirmpasswordInput">Confirm Password </label>
                <input
                    class="form-control form-control-sm col-md-12"
                    type="text"
                    id="confirmPasswordInput"
                    placeholder="Enter Confirm password here"
                />
            </div>
          <div class="">
            <label class="col-md-12 text-white" for="emailInput"> Email </label>
            <input
              class="form-control form-control-sm col-md-12"
              type="text"
              id="emailInput"
              placeholder="Enter Email here"
            />
          </div>
          <div class="">
            <label class="col-md-12 text-white" for="NumberInput"
              >Phone Number
            </label>
            <input
              class="form-control form-control-sm col-md-12"
              type="text"
              id="phoneNumberInput"
              placeholder="Enter Number here"
            />
            <p class="col-sm text-danger" id="errors"></p>
          </div>

          <div
            class="row justify-content-center col-md-3"
            style="margin-top: 10px"
          >
            <button class="btn btn-primary col-md-10" id="registerButton" onclick="register()">
              REGISTER
            </button>
          </div>
        </div>
        <div class="col-3 box"></div>
      </div>
    </div>
  </body>
  <style></style>
</html>
