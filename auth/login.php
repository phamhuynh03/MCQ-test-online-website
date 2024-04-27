<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <meta name="viewport" charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href = "https://code.jquery.com/ui/1.13.2/themes/black-tie/jquery-ui.css" rel = "stylesheet">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./style.css">
    </head>
    <style>

</style>
    <body>
    <?php 
        include('./header.php');
    ?>
    <div class="container main">
        <div class="row main2">
            <div class="col-md-6 right">      
                <div class="input-box">
                   <header>Đăng nhập</header>
                   <form action="login_processing.php"  method="post">
                   <div class="input-field">
                        <input type="email" class="input" id="email" name="email" required="">
                        <label for="email">Email</label> 
                    </div> 
                   <div class="input-field">
                        <input type="password" class="input" id="password" name="password" required="">
                        <label for="pass">Password</label>
                    </div> 
                   <div class="input-field">
                        <input type="submit" class="submit" value="Đăng nhập">
                   </div> 
                    </form>
                   <div class="signin">
                    <span>Chưa có tài khoản? <a href="./register.php">Đăng ký</a></span>
                   </div>
                </div>  
            </div>
        </div>
    </div>
    <?php 
        include('./footer.php');
    ?>
    </body>
</html>
