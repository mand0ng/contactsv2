<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
</head>
<body>
    <h6>Register a User</h6>
    <form action="{{route('register.user')}}" method='POST' id='user-form'>
        @csrf
        <label for="name">Name:</label><br>
        <input name='name' type="text" placeholder='Name'>
        <br><br>

        <label for="email">Email:</label><br>
        <input id='email' name='email' type="email" placeholder='you@email.com'>
        <br><br>

        <label for="password">Password:</label><br>
        <input id='password' name='password' type="password" placeholder='&#9679;&#9679;&#9679;&#9679;&#9679;'>
        <br><br>

        
        <label for="password2">Password:</label><br>
        <input name='password2' type="password" placeholder='&#9679;&#9679;&#9679;&#9679;&#9679;'>
        <br><br>

        <input id='submit' type="submit" value='Register'>
    </form>
    <script>
        if ($("#user-form").length > 0) {
            $("#user-form").validate({
            
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
            
                mobile_number: {
                        required: true,
                        digits:true,
                        minlength: 6,
                        maxlength:12,
                    },
                email: {
                        required: true,
                        maxlength: 50,
                        email: true,
                        remote:{
                                url:"/check-email",
                                type:"get"
                        }
                    },
                password:{
                        required: true,
                        minlength:6,
                        
                },password2:{
                        required: true,
                        minlength:6,
                        equalTo: '#password'
                },
                
            },
            messages: {
            
                name: {
                    required: "Please enter name",
                    maxlength: "Your last name maxlength should be 50 characters long."
                },
                mobile_number: {
                    required: "Please enter contact number",
                    minlength: "The contact number should be 10 digits",
                    digits: "Please enter only numbers",
                    maxlength: "The contact number should be 10 digits",
                },
                email: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    maxlength: "The email name should less than or equal to 50 characters",
                    remote:'The email is already taken'
                },
                password:{
                    required: 'Please eneter password',
                    minlength: "The contact number should be 7 digits",
                        
                },
                password2:{
                        required: 'Please eneter password',
                        minlength: "The contact number should be 7 digits",
                        equalTo: 'Password does not match'
                }
                
            },
            submitHandler: function(form) { // <- pass 'form' argument in
                $("#submit").attr("disabled", true);
                form.submit(); // <- use 'form' argument here.
            }
           
            
            })
        }
    </script>
</body>
</html>