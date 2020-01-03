if ($("#modalFormData").length > 0) {
    $("#modalFormData").validate({
    errorClass: 'text-danger',
    errorElement: 'span',
    
    rules: {
        name: {
            required: true,
            maxlength: 50,
            minlength: 3
        },
    
        phone_number: {
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
            required: "Name is required",
            maxlength: "Your last name maxlength should be 50 characters long.",
            minlength: "The name should be 3 digits",
        },
        phone_number: {
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