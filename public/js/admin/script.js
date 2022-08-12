$( document ).ready(function () {
  console.log('script loaded');
  $('.roles_down_arrow').toggle( 'blind' );
});

// Roles show permission animation
$('.roles_card_heading').hover(function () {
  $(this).children().toggle( 'blind' );
});

// Remove permission to role AJAX
$('.remove_permission_for_role').click(function () {
    var role_id  = $(this).find("[name='roles_card_id_remove']").val();
    console.log(role_id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/admin/open_permissions_role/1",
        type: "POST",
        data: {id : role_id},

        success: function (responses) {
            let app = ''
            $.each(responses, function( i, value ) {
                console.log(responses[i].name);
                $('.append_added_permissions').append('<h5><input type="checkbox" name="permission_id[]" class="form-check-input" checked value="'+responses[i].id+'" >'+responses[i].name+'</h5>');
            });
        },

        error:function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }
    });
});

// Add permission to role AJAX
$('.add_permission_for_role').click(function () {
    var role_id  = $(this).find("[name='roles_card_id_add']").val();
    console.log(role_id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/admin/open_permissions_role/2",
        type: "POST",
        data: {id : role_id},

        success: function (responses) {
            let app = ''
            $.each(responses, function( i, value ) {
                console.log(responses[i].name);
                $('.append_added_permissions').append('<h5><input type="checkbox" name="permission_id[]" class="form-check-input" checked value="'+responses[i].id+'" >'+responses[i].name+'</h5>');
            });
        },

        error:function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }
    });
});


