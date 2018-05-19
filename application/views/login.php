<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <script language="JavaScript" src="<?php echo base_url('assets/css/jquery3.3.1.js'); ?>"></script>
    <script language="JavaScript" src="<?php echo base_url('assets/css/jquery.validate.min.js'); ?>"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <?php
                $success_msg= $this->session->flashdata('success_msg');
                $error_msg= $this->session->flashdata('error_msg');

                if($success_msg){
                    ?>
                    <div class="alert alert-success">
                        <?php echo $success_msg; ?>
                    </div>
                    <?php
                }
                if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                    <?php
                }
                ?>

                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('user/login_user'); ?>">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="E-mail" name="user_email" type="email" data-required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="user_password" type="password" value="" data-required>
                            </div>


                            <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                        </fieldset>
                    </form>
                    <br>
                    </b><center><a href="<?php echo base_url('user/index'); ?>">Register here</a></center><!--for centered text-->

                </div>
            </div>
        </div>
    </div>
</div>
 <script>
    $(document).ready(function(){
        $('form').validate({
            onKeyup: true,
            eachValidField: function() {
                $(this).removeClass('error').addClass('success');
            },
            eachInvalidField: function() {

                $(this).removeClass('success').addClass('error');
            },
            // Conditional dùng để tạo các rule kiểm tra điều kiện riêng
            // và kết quả trả về của mỗi rule là true/false
            // Mỗi rule sẽ có tên trùng với khai báo data-conditional="checkpassword"
            conditional: {
                checkpassword : function() {
                    return $(this).val() == $('#password').val();
                }
            }
        });
    });
</script>

</body>
</html>
