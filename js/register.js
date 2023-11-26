$(document).ready(function(){
    $('#registrationForm').submit(function(e){
        e.preventDefault(); // Prevent form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            type: 'POST',
            url: 'php/register.php',
            data: formData,
            success: function(response){
                // Handle success
                console.log(response);
                if(response.trim() === "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Registration successful!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "login.html";
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Registration failed',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(error){
                // Handle errors, like displaying an error message
                console.log(error);
            }
        });
    });
});
