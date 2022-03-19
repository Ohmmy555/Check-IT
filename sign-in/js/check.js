$('#username').keyup(function(){
    var value = $(this).val()
    if(value == ""){
        $(this).addClass('border-danger')
        $('#massage_username').html('Please Enter Username')
        $('#massage_username').addClass('text-danger')
        $('.btn-submit').attr('disabled',true)
    }else{
        $('#massage_username').html('')
        $(this).removeClass('border-danger')
        $('.btn-submit').attr('disabled',false)
    }
    
})

$('#fname').keyup(function(){
    var value = $(this).val()
    if(value == ""){
        $(this).addClass('border-danger')
        $('#massage_fname').html('Please Enter First name')
        $('#massage_fname').addClass('text-danger')
        $('.btn-submit').attr('disabled',true)
    }else{
        $('#massage_fname').html('')
        $(this).removeClass('border-danger')
        $('.btn-submit').attr('disabled',false)
    }
    
})

$('#lname').keyup(function(){
    var value = $(this).val()
    if(value == ""){
        $(this).addClass('border-danger')
        $('#massage_lname').html('Please Enter Last name')
        $('#massage_lname').addClass('text-danger')
        $('.btn-submit').attr('disabled',true)
    }else{
        $('#massage_lname').html('')
        $(this).removeClass('border-danger')
        $('.btn-submit').attr('disabled',false)
    }
    
})

$('#stdid').keyup(function(){
    var value = $(this).val()
    if(value == ""){
        $(this).addClass('border-danger')
        $('#massage_stdid').html('Please Enter ID Student')
        $('#massage_stdid').addClass('text-danger')
        $('.btn-submit').attr('disabled',true)
    }else{
        $('#massage_stdid').html('')
        $(this).removeClass('border-danger')
        $('.btn-submit').attr('disabled',false)
    }
    
})

$('#password').keyup(function(){
    var value = $(this).val()
    if(value == ""){
        $(this).addClass('border-danger')
        $('#massage_password').html('Please Enter ID password')
        $('#massage_password').addClass('text-danger')
        $('.btn-submit').attr('disabled',true)
    }else{
        $('#massage_password').html('')
        $(this).removeClass('border-danger')
        $('.btn-submit').attr('disabled',false)
    }
    
})
