(function ($, window, document) {
    $(() => {
        window.bankData = [];
        window.ifscCodeValid = false;
        console.log("DOM is ready");

        // Hide sidebar
        $("#sidebarToggler").click(() => {
            $("#sidebar").toggleClass("hide");
        });

        // Submit button action
        $("#submitButton").click(() => {
            var errorsElement = $("#errorList");
            let errors = [];
            errorsElement.addClass("d-none");

            // Getting values
            let name = $("#nameField").val();
            let relation = $("#relationField").val();
            let number = $("#phoneField").val();
            let acno = $("#bankacnoField").val();
            let confirmAcno = $("#confirmBankacnoField").val();
            let ifscCode = $("#ifscCodeField").val();

            // validations

            // Name Validation
            if (name.length == 0 || name.length > 20) {
                errors.push(
                    "Name should be greater than 0 and less than 20 characters"
                );
            }

            // Number Validation
            if (number.length != 10 || isNaN(number) == true) {
                errors.push("Number is wrong");
            }

            // Relation Validation
            if (relation.length == 0 || relation.length > 20) {
                errors.push(
                    "Relation should be greater than 0 and less than 20 characters"
                );
            }

            // Account Number Validation
            if (acno.length == 0) {
                errors.push("Account Number shouldn't be empty");
            }
            if (isNaN(acno)) {
                errors.push("Account Number should be Number");
            }
            if (acno != confirmAcno) {
                errors.push("Account numbers should be same");
            }

            // IFSC Code Validation
            if (ifscCode.length != 11) {
                errors.push("Please check IFSC Code");
            }
            if (window.ifscCodeValid == false) {
                errors.push("Please enter and search for a valid IFSC Code");
            }

            // Checkign if errors exist
            if (errors.length > 0) {
                errorsElement.html("");

                // Setting errors
                errors.forEach((error) => {
                    errorsElement.append(`<li>${error}</li>`);
                });

                // showing it
                errorsElement.removeClass("d-none");
            } else {
                bankData.push({
                    name,
                    relation,
                    number,
                    acno,
                    ifscCode,
                });
                renderTable()
                $("#addLegalHeirModal").modal("hide");
                $("#nameField").val("");
                $("#relationField").val("");
                $("#phoneField").val("");
                $("#bankacnoField").val("");
                $("#confirmBankacnoField").val("");
                $("#ifscCodeField").val("");
            }
        });

        // IFSC Code search button clicked
        $("#ifscCodeSearchButton").click(() => {
            let IFSCCode = $("#ifscCodeField").val();
            let bankName = $("#bankNameField");
            let bankBranch = $("#bankBranchField");
            if (
                IFSCCode.length == 11 &&
                /^[a-zA-Z()]+$/.test(IFSCCode.slice(0, 4)) &&
                IFSCCode.charAt(4) == "0"
            ) {
                bankName.html("SBI");
                bankBranch.html("Hyderabad");
                window.ifscCodeValid = true;
            } else {
                bankName.html("Please Enter IFSC Code first to get Bank Name");
                bankBranch.html(
                    "Please Enter IFSC Code first to get Bank Branch"
                );
            }
        });

        $("#ifscCodeField").on("input", () => {
            let bankName = $("#bankNameField");
            let bankBranch = $("#bankBranchField");
            bankName.html("Please Enter IFSC Code first to get Bank Name");
            bankBranch.html("Please Enter IFSC Code first to get Bank Branch");
            window.ifscCodeValid = false;
        });

        function renderTable() {
            window.bankData.forEach((bank) => {
                $("#legalHeirTable").append(`<tr>
                <td>${bank.name}</td>
                <td>${bank.relation}</td>
                <td>${bank.number}</td>
                <td>${bank.acno}</td>
                <td>${bank.ifscCode}</td>
                </tr>`);
            });
        }
    });
})(window.jQuery, window, document);
