<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url() ?>/assets/css/login.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/assets/css/animate.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <!-- <h2>SAFLC</h2> -->
        <svg viewBox="0 0 1320 300">
            <text x="50%" y="50%" dy="40px" text-anchor="middle">
                SAFLC
            </text> 
        </svg>
                <div class="error"> 
                    <?php   echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  ?>
                </div>
        
        <form method="POST" action="<?php echo base_url("login_validation") ?>">
            <div class="row">
                <div class="input-box">
                    <input type="text" name="username" required>
                    <label> Username </label>
                    <span class="text-danger"><?php echo form_error('username'); ?></span>   
                </div>
            </div>
            <div class="row">
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label> Password </label>
                    <span class="text-danger"><?php echo form_error('password'); ?></span>  
                </div>
            </div>
            <button type="submit" class="loginButton">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
               Submit</button>
            
        </form>
    </div>

</body>

</html>