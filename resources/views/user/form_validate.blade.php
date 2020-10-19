<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script>
    $(function() {
        $("#validate_form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                name: {
                    required: "Please enter your username.",
                    minlength: "Username must consist of two letters."
                },
                password: {
                    required: "Please enter a password.",
                    minlength: "The password length cannot be less than 5 letters."
                },
                confirm_password: {
                    required: "Please enter a password again.",
                    minlength: "The password length cannot be less than 5 letters.",
                    equalTo: "The two password are inconsistent."
                },
                email: "Please enter a correct email address."
            }
        });
    });
</script>
