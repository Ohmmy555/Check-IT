$('#username').keyup(function(){
    var value = $(this).val()
    if(value == ""){
        $(this).addClass('border-danger')
        $('#massage_username').html('Please Enter Username')
        $('#massage_username').addClass('text-danger')
        $('.btn-submit').attr('disabled',true)
    }else{
        $.ajax({
            method: 'POST',
            url: 'register_check.php',
            data: {datarow:value, function:'checkusername'},
            success: function(data){
                if(data > 0){
                    $('#massage_username').html('Please Enter Username')
                    $('#massage_username').addClass('text-danger')
                }
            }
        })
    }
})