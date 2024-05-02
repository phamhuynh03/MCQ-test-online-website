<!DOCTYPE html>
<html>
    <head>
        <title>Thông tin cá nhân</title>
        <meta name="viewport" charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://code.jquery.com/ui/1.13.2/themes/black-tie/jquery-ui.css" rel="stylesheet">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>
        <?php include('./navbar/header.php');
            $conn = mysqli_connect("localhost", "root", "", "assignment");
        
            if(mysqli_connect_errno()){
                echo "Failed to connect: ".mysqli_connect_error();
                exit();
            }
        
            $sql = "SELECT * FROM teacher WHERE TID = '$tid'";
            $result = mysqli_query($conn, $sql); 
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            mysqli_close($conn);
        ?>

        <div class="container-fluid px-5 py-4">
            <h1 class="text-primary">Chỉnh sửa thông tin</h1>
        </div>
        <div class="container-fluid p-5 bg-secondary bg-opacity-10 text-primary">
            <div class="row gx-3 mb-4">
                <div class="col-md-7"></div>
                <div class="col-md-3">
                    <a href="profile.php" class="btn btn-md bg-primary bg-opacity-25 float-end">Trở lại</a>
                </div>
                <div class="col-md-2"></div>
            </div>
            <form action="./controller/password_change_processing.php" method="POST">
                <div class="row gx-3 mb-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label class="mb-1" for="Oldpass1">Mật khẩu cũ</label>
                        <input class="form-control" name="Oldpass1" id="Oldpass1" type="password" placeholder="Mật khẩu cũ">
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row gx-3 mb-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label class="mb-1" for="Oldpass2">Nhập lại mật khẩu cũ</label>
                        <input class="form-control" name="Oldpass2" id="Oldpass2" type="password" placeholder="Nhập lại mật khẩu cũ">
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row gx-3 mb-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label class="mb-1" for="Newpass1">Mật khẩu mới</label>
                        <input class="form-control" name="Newpass1" id="Newpass1" type="password" placeholder="Mật khẩu mới">
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row gx-3 mb-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label class="mb-1" for="Newpass2">Nhập lại mật khẩu mới</label>
                        <input class="form-control" name="Newpass2" id="Newpass2" type="password" placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <?php if(isset($_GET['error'])){?>
                    <p class="text-center text-danger" id="message"><?php echo $_GET['error']; ?></p>
                <?php }?>
                                    
                <?php if(isset($_GET['success'])){?>
                    <p class="text-center text-success" id="message"><?php echo $_GET['success']; ?></p>
                <?php }?>
                
                <div class="d-grid gap-2 col-md-2 col-sm-4 mx-auto">
                    <button class="btn btn-md bg-primary bg-opacity-25" id="change_pass">Lưu thay đổi</button>
                </div>
                <script>
                    var log = document.getElementById('change_pass');

                    log.addEventListener('click', function(e){
                        var Oldpass1 = document.getElementById('Oldpass1').value;  
                        var Oldpass2 = document.getElementById('Oldpass2').value;  
                        var Newpass1 = document.getElementById('Newpass1').value; 
                        var Newpass2 = document.getElementById('Newpass2').value;
                                            
                        var check_pass = /^(?=.*[A-Z])[A-Za-z\d@$!%*?&]{8,}$/;
    
                        if(Oldpass1 == ""){  
                            alert("Vui lòng nhập mật khẩu cũ!"); 
                            e.preventDefault();
                        }
                        else if(Oldpass2 == ""){  
                            alert("Vui lòng nhập lại mật khẩu cũ!"); 
                            e.preventDefault();
                        }
                        else if(Newpass1 == ""){  
                            alert("Vui lòng nhập mật khẩu mới!"); 
                            e.preventDefault();
                        }  
                        else if(Newpass2 == ""){  
                            alert("Vui lòng nhập lại mật khẩu mới!"); 
                            e.preventDefault();
                        }
                        else if(Oldpass1.length < 8){  
                            alert("Mật khẩu phải chứa ít nhất 8 ký tự!");
                            e.preventDefault();
                        }
                        else if(!check_pass.test(Oldpass1)){  
                            alert("Mật khẩu phải chứa ít nhất 1 ký tự in hoa!");
                            e.preventDefault();
                        }
                        else if(Oldpass1 != Oldpass2){  
                            alert("Mật khẩu cũ của bạn không khớp! Vui lòng nhập lại!");
                            e.preventDefault();
                        }
                        else if(Newpass1.length < 8){  
                            alert("Mật khẩu phải chứa ít nhất 8 ký tự!");
                            e.preventDefault();
                        }
                        else if(!check_pass.test(Newpass1)){  
                            alert("Mật khẩu phải chứa ít nhất 1 ký tự in hoa!");
                            e.preventDefault();
                        }
                        else if(Newpass1 != Newpass2){  
                            alert("Mật khẩu mới của bạn không khớp! Vui lòng nhập lại!");
                            e.preventDefault();
                        }
                    });
                                    
                    setTimeout(function(){document.getElementById('message').style.display = 'none';}, 3000);
                </script>
            </form>
        </div>

        <?php include('./navbar/footer.php'); ?>
    </body>
</html>