$( document ).ready(function () {
  $('.roles_down_arrow').toggle( 'blind' );
});

// Roles show permission animation
$('.roles_card_heading').hover(function () {
  $(this).children().toggle( 'blind' );
});

// Add or Remove permission to role AJAX
$('.add_remove_permission_for_role').on('click', function () {
    let url = "/admin/open_permissions_role";

    // Ajax for roles and permission add or remove
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: "GET",

        success: function (responses) {
            $.each(responses, function( i, value ) {
                $('.append_added_permissions').append('<h5><input type="checkbox" name="permission_id[]" class="form-check-input" value="'+responses[i].id+'" >'+responses[i].name+'</h5>');
            });
        },
        error:function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }
    });
});


