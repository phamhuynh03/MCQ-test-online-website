<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Đăng ký</title>
        <meta name="viewport" charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://code.jquery.com/ui/1.13.2/themes/black-tie/jquery-ui.css" rel="stylesheet">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>
        <div class="login">
            <div class="position-relative">
                <div class="position-absolute top-0 end-0">
                    <a href="../index.php"><img src="../asset/img/return.svg"></a>
                </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <div class="login-form row border rounded-4 p-5 shadow box-area">
                    <form action="register_processing.php" method="POST">
                        <div class="header-text text-center">
                            <h2>Đăng ký</h2>
                            <p>Vui lòng điền đầy đủ thông tin phía bên dưới!</p>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="First_name" id="First_name" placeholder="Tên" class="form-control form-control-lg bg-light fs-6"
                                <?php if(isset($_SESSION['first'])) echo "value='{$_SESSION['first']}'"; ?>>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="Last_name" id="Last_name" placeholder="Họ và tên đệm" class="form-control form-control-lg bg-light fs-6"
                                <?php if(isset($_SESSION['last'])) echo "value='{$_SESSION['last']}'"; ?>>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="School" id="School" placeholder="Trường" class="form-control form-control-lg bg-light fs-6"
                                <?php if(isset($_SESSION['school'])) echo "value='{$_SESSION['school']}'"; ?>>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="Email" id="Email" placeholder="Email" class="form-control form-control-lg bg-light fs-6"
                                <?php if(isset($_SESSION['reg_mail'])) echo "value='{$_SESSION['reg_mail']}'"; ?>>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="Password" id="Password" placeholder="Mật khẩu" class="form-control form-control-lg bg-light fs-6"
                                <?php if(isset($_SESSION['reg_pass'])) echo "value='{$_SESSION['reg_pass']}'"; ?>>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="Confirm_pass" id="Confirm_pass" placeholder="Nhập lại mật khẩu" class="form-control form-control-lg bg-light fs-6"
                                <?php if(isset($_SESSION['confirm_pass'])) echo "value='{$_SESSION['confirm_pass']}'"; ?>>
                        </div>

                        <?php if(isset($_GET['error'])){?>
                            <p class="text-center text-danger" id="message"><?php echo $_GET['error']; ?></p>
                        <?php }?>

                        <div class="mb-3">
                            <button class="btn btn-lg w-100 bg-primary bg-opacity-10" id="login_btn">Xác nhận</button>
                        </div>
                        <div class="row">
                            <p>Bạn đã có tài khoản? <a href="./login.php">Đăng nhập ngay</a></p>
                        </div>

                        <?php
                            $_SESSION['login_email'] = "";
                            $_SESSION['login_pass'] = "";
                            $_SESSION['first'] = "";
                            $_SESSION['last'] = "";
                            $_SESSION['school'] = "";
                            $_SESSION['reg_mail'] = "";
                            $_SESSION['reg_pass'] = "";
                            $_SESSION['confirm_pass'] = "";
                        ?>
    
                        <script>
                            var log = document.getElementById('login_btn');

                            log.addEventListener('click', function(e){
                                var firstname = document.getElementById('First_name').value;  
                                var lastname = document.getElementById('Last_name').value;  
                                var school = document.getElementById('School').value; 
                                var username = document.getElementById('Email').value;  
                                var password = document.getElementById('Password').value;  
                                var confirm_pass = document.getElementById('Confirm_pass').value;
                                        
                                var check_email = /\S+@\S+\.\S+/;
                                var check_pass = /^(?=.*[A-Z])[A-Za-z\d@$!%*?&]{8,}$/;
 
                                if(firstname == ""){  
                                    alert("Please enter your first name!"); 
                                    e.preventDefault();
                                }
                                else if(lastname == ""){  
                                    alert("Please enter your last name!"); 
                                    e.preventDefault();
                                }
                                else if(school == ""){  
                                    alert("Please enter your school!"); 
                                    e.preventDefault();
                                }   
                                else if(username == ""){  
                                    alert("Please enter your email!");
                                    e.preventDefault();
                                }
                                else if(!check_email.test(username)){  
                                    alert("Please enter a valid email address!");
                                    e.preventDefault();
                                }   
                                else if(password == ""){  
                                    alert("Please enter your password!");
                                    e.preventDefault();
                                }
                                else if(password.length < 8){  
                                    alert("Password must be at least 8 characters!");
                                    e.preventDefault();
                                }
                                else if(!check_pass.test(password)){  
                                    alert("Password contain at least 1 uppercase letter!");
                                    e.preventDefault();
                                }
                                else if(confirm_pass == ""){  
                                    alert("Please confirm your password!");
                                    e.preventDefault();
                                }
                                else if(password != confirm_pass){  
                                    alert("Your password does not match! Please try again!");
                                    e.preventDefault();
                                }
                            });
                                    
                            setTimeout(function(){document.getElementById('message').style.display = 'none';}, 3000);
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <footer class="footer py-2">
        <div class="container bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <div class="footer-logo-wrapper text-center text-start">
                        <img src="../asset/img/logo_light.svg" alt="QuizBK" title="QuizBK">
                    </div>
                </div>
                <div class="col">
                    <div class="container bg-white">
                        <div class="footer-copyright-wrapper text-center">
                            &copy; 2024. All Rights Reserved.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <ul class="nav justify-content-center justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link link-secondary" href="https://github.com/phamhuynh03/MCQ-test-online-website">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-secondary" href="https://forms.gle/ECY1mcd2bYUtwokEA">Báo cáo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</html>
