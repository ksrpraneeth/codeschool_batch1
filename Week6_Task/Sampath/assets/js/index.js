$("document").ready(() => {
    // Error Types
    window.errorTypes = {
        usernameError: {
            container: "usernameErrorText",
            input: "username",
        },
        passwordError: {
            container: "passwordErrorText",
            input: "password",
        },
        mainError: {
            container: "mainErrorText",
        },
    };

    /**
     * Shows Error by Error type
     * @param {string} errorType
     * @return {none}
     */
    function showError(errorType, errMessage) {
        $("#" + window.errorTypes[errorType].container).html(errMessage);
        if (window.errorTypes[errorType].input) {
            $("#" + window.errorTypes[errorType].input).addClass("is-invalid");
        }
    }

    /**
     * Hides all Error from error types
     * @param {none}
     * @return {none}
     */
    function hideAllErrors() {
        Object.keys(window.errorTypes).forEach((key) => {
            $("#" + window.errorTypes[key].container).text("");
            if (window.errorTypes[key].input) {
                $("#" + window.errorTypes[key].input).removeClass("is-invalid");
            }
        });
    }

    /**
     * Performs Login Ajax Call
     * @param {none}
     * @return {none}
     */
    $("#loginBtn").click(async () => {
        let username = $("#username").val();
        let password = $("#password").val();
        await hideAllErrors();

        let isErrorOccurs = false;
        if (!username) {
            showError("usernameError", "Please enter username");
            isErrorOccurs = true;
        }
        if (!password) {
            showError("passwordError", "Please enter password");
            isErrorOccurs = true;
        }

        if (isErrorOccurs) {
            return;
        }
        showLoading();
        await $.ajax({
            url: "./api/login.php",
            type: "POST",
            data: {
                username,
                password,
            },
            success: (data) => {
                data = JSON.parse(data);
                if (data.status == false) {
                    showError("mainError", data.message);
                    hideLoading();
                } else {
                    window.location.href = "./dashboard.php";
                    hideLoading();
                }
            },
            error: () => {
                showError("mainError", "Something went wrong!");
                hideLoading();
            },
        });
    });
});
