$(document).ready(function(){
    //add image
    $("#profile_picture").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){

        }
        else{
            var url = URL.createObjectURL(event.target.files[0]);
            $("#img_profile_picture").attr("src", url);
        }
    });

    //check dob
    $("#dob").change(function(){
        var dob = new Date(this.value);
        var today = new Date();

        var age = today - dob;
        if(age<0){
            $('#dob_error').html('Invalid date of birth');
            $("#dob_error").css('display', 'block');
            $('#dob_error').css('color', 'red');
            $("#dob").css('border-color', 'red');
        }
        else{
            $("#dob_error").css('display', 'none');
            $("#dob").css('border-color', 'green');
        }
    });
});//jQuery