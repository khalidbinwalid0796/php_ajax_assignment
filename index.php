<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>php with ajax</title>
    <style type="text/css">
        body{
            color: #fff;
            background: #63738a;
            font-family: 'Roboto', sans-serif;
        }
        .form-control{
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }
        .form-control:focus{
            border-color: #5cb85c;
        }
        .form-control, .btn{
            border-radius: 3px;
        }
        .signup-form{
            width: 400px;
            margin: 0 auto;
            padding: 75px 0;
        }
        .signup-form h2{
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }
        .signup-form h2:before, .signup-form h2:after{
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }
        .signup-form h2:before{
            left: 0;
        }
        .signup-form h2:after{
            right: 0;
        }
        .signup-form .hint-text{
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }
        .signup-form form{
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .signup-form .form-group{
            margin-bottom: 20px;
        }

        .signup-form .btn{
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }
        .signup-form .row div:first-child{
            padding-right: 10px;
        }
        .signup-form .row div:last-child{
            padding-left: 10px;
        }
        .signup-form a{
            color: #fff;
            text-decoration: underline;
        }
        .signup-form a:hover{
            text-decoration: none;
        }
        .signup-form form a{
            color: #5cb85c;
            text-decoration: none;
        }
        .signup-form form a:hover{
            text-decoration: underline;
        }
        #thank_you_msg{color:green;}
        .field_error{color:red;}
    </style>
</head>
<body>

<div class="signup-form">
    <form method="post" id="contactForm" name="contactForm">
        <h2>Form</h2>
        <p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
            <input type="name" class="form-control name" name="name" placeholder="Name*" required>
            <span class="field_error" id="name_error"></span>
        </div>
        <div class="form-group">
            <input type="username" class="form-control username " name="username" placeholder="Username*" required>
            <span class="field_error" id="username_error"></span>
        </div>
        <div class="form-group">
            <input type="email" class="form-control email" name="email" placeholder="Email*" required>
            <span class="field_error" id="email_error"></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control mobile" name="mobile" placeholder="Mobile*" required>
            <span class="field_error" id="mobile_error"></span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control password" name="password" placeholder="Password*" required>
            <span class="field_error" id="password_error"></span>
        </div>

        <div class="form-group">
            <input type="button" id="btn" class="btn btn-success btn-lg btn-block add_data" onclick="addMore()" value="Submit Now">
        </div>
        <div id="thank_you_msg"></div>
    </form>
</div>


<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    //1st way

    $(document).ready(function(){
        jQuery('.add_data').click(function(e) {
            e.preventDefault();
            jQuery('.field_error').html('');

            var name = jQuery(".name").val();
            var username = jQuery(".username").val();
            var email = jQuery(".email").val();
            var mobile = jQuery(".mobile").val();
            var password = jQuery(".password").val();

            var is_error='';
            if(username=="" || name.length==0){
                jQuery('#name_error').html('Please enter name');
                is_error='yes';
            }if(username==""){
                jQuery('#username_error').html('Please enter username');
                is_error='yes';
            }if(email==""){
                jQuery('#email_error').html('Please enter email');
                is_error='yes';
            }if(mobile==""){
                jQuery('#mobile_error').html('Please enter mobile');
                is_error='yes';
            }if(password==""){
                jQuery('#password_error').html('Please enter password');
                is_error='yes';
            }

            if(is_error==''){
                jQuery.ajax({
                    url: 'submit.php',
                    type: 'post',
                    data: {name: name, username: username, email: email, mobile: mobile, password: password},
                    //data:'name='+name+'&username='+username+'&email='+email+'&mobile='+mobile+'&password='+password,
                    //data:jQuery('#contactForm').serialize(),
                    success: function (result) { //url theke j data pelam seta result variable ar maddhome dhorlam

                        jQuery('#contactForm')['0'].reset();

                        if (result == 'insert') {
                            jQuery("#thank_you_msg").html("Thank You");
                        }

                        // var name = jQuery(".name").val("");
                        // var username = jQuery(".username").val("");
                        // var email = jQuery(".email").val("");
                        // var mobile = jQuery(".mobile").val("");
                        // var password = jQuery(".password").val("");
                    }
                });

            }
        });

    });


    //2nd way

    // jQuery('#contactForm').on('submit',function(e){
    //
    //     jQuery.ajax({
    //         url:,
    //         type:,
    //         data:,
    //         success:function(result){
    //
    //         }
    //     });
    //     e.preventDefault();
    // });


    //3rd way

    // function addMore(){
    //
    //     if(is_error==''){
    //         jQuery.ajax({
    //             url:,
    //             type:,
    //             data:,
    //             success:function(result){
    //
    //             }
    //         });
    //     }
    // }
</script>

</body>
</html>