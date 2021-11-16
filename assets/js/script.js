$(document).ready(function(){

    $('.add-to-cart').click(function(e){
        e.preventDefault();
        var p_id = $(this).attr('data-id');
        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {addCart:p_id},
            success: function(data){
                // console.log(data);
                location.reload();
            }
        });
    });







});