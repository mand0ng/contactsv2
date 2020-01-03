$(document).ready(function($){
    jQuery('body').on('click', '.open-modal', function () {
        var link_id = $(this).val();
        $.get('contact/' + link_id, function (data) {
            jQuery('#contact_id').val(data.id);
            jQuery('#name').val(data.name);
            jQuery('#email').val(data.email);
            jQuery('#phone_number').val(data.phone_number);
            jQuery('#submit').val("update");
            jQuery('#contact-form').modal('show');
        })
    });

    jQuery('#modal-btn').click(function () {
        jQuery('#modalFormData').trigger("reset");
        jQuery('#contact-form').modal('show');
    });

    $('#submit').click(function(e){
        var childs = $('#modalFormData').find('span[class="text-danger"]')
        if(childs.length < 1 ){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            
            var formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                phone_number: $('#phone_number').val()

            }
            var contact_id = jQuery('#contact_id').val();
            var state = jQuery('#submit').val();
            var type = 'POST'
            var url = '/create-contact'
            if (state == "update") {
                type = "PUT";
                url = 'contact/' + contact_id;
            }
            console.log(type)
            $.ajax({
                type: type,
                url: url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    var contact = '<tr id="contact' + data.id + '"><td>' + data.name + '</td><td>' + data.email + '</td><td>' + data.phone_number + '</td>';
                    contact += '<td><button class="btn btn-primary open-modal" value="' + data.id + '">Edit</button></td>';
                    contact += '<td><button class="btn btn-danger delete-contact" value="' + data.id + '">Delete</button></td></tr>';
                    if (state == "add") {
                        jQuery('#contacts-list').append(contact);
                    } else {
                        $("#contact" + contact_id).replaceWith(contact);
                    }
                    // jQuery('#modalFormData').trigger("reset");
                    // jQuery('#linkEditorModal').modal('hide')
                    $('#contact-form').modal('hide');
                    console.log(data)
                    // setTimeout(function(){// wait for 5 secs(2)
                    //     location.reload(); // then reload the page.(3)
                    // }, 2000); 
                   
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
            console.log(formData)
           
        } 
    })

    $('#contacts-list').on('click', '.delete-contact',function(event){
    // jQuery('.delete-contact').click(function () {
        var contact_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: '/contact/' + contact_id,
            success: function (data) {
                console.log(data);
                $("#contact" + contact_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    // });
 
    $('#search').on('keyup', function(e){
        var val = $(this).val()
        var url = '/contact/search/'
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : 'POST',
            url : url,
            data:{'search':val},
            success:function(data){
                $.each(data, function(key,value){
                    console.log($(document.createElement('tr'))) 
                })
                
                
            }
            
        })
    })



})