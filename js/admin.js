// show password
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");
togglePassword.addEventListener("click", function (e) {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    this.classList.toggle("fa-eye-slash");
});

// Validation start

$(document).ready(function () {

    $.validator.setDefaults({
        submitHandler: function () {

        }
    });

    $("#admin-form").validate({

        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 50
            }
        },
        messages: {
            email: {
                required: "Email is must!",
                email: "Enter valid email!"
            },
            password: {
                required: "Password is must!",
                minlength: "Minimum length is 8",
                maxlength: "Maximum length is 50"
            }
        }
    });

    // Ajax start

    $("#admin").click(function () {

        const email = $("#email").val();
        const password = $("#password").val();

        if (email == '' || password == '') {
            alert("Please fill all the fields!");
        } else {

            $.ajax({
                url: "./php/admin.php",
                type: "post",
                data: $("#admin-form").serialize(),
                dataType: "JSON",
                success: function (d) {
                    if (d.status == 'success') {
                        window.location = "./php/admin-dash.php";
                    } else {
                        alert("Invalid Access!");
                    }
                }
            });
        }
    });
});