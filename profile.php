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
                    <a href="password_change.php" class="btn btn-md bg-primary bg-opacity-25 float-end">Thay đổi mật khẩu</a>
                </div>
                <div class="col-md-2"></div>
            </div>
            <form action="./controller/profile_processing.php" method="POST">
                <div class="row gx-3 mb-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label class="mb-1" for="Email">Email</label>
                        <input class="form-control" name="Email" id="Email" type="email" placeholder="Email" value="<?php echo $row['Email']; ?>">
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row gx-3 mb-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label class="mb-1" for="LastName">Họ và tên đệm</label>
                        <input class="form-control" name="LastName" id="LastName" type="text" placeholder="Họ và tên đệm" value="<?php echo $row['Last_name']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1" for="FirstName">Tên</label>
                        <input class="form-control" name="FirstName" id="FirstName" type="text" placeholder="Tên" value="<?php echo $row['First_name']; ?>">
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row gx-3 mb-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label class="mb-1" for="School">Trường</label>
                        <input class="form-control" name="School" id="School" type="text" placeholder="Trường" value="<?php echo $row['School']; ?>">
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <?php if(isset($_GET['error'])){?>
                    <p class="text-center text-danger" id="message"><?php echo $_GET['error']; ?></p>
                <?php }?>
                                    
                <?php if(isset($_GET['success'])){?>
                    <p class="text-center text-success" id="message"><?php echo $_GET['success']; ?></p>
                <?php }?>
                
                <script>
                    setTimeout(function(){document.getElementById('message').style.display = 'none';}, 3000);
                </script>
                <div class="d-grid gap-2 col-md-2 col-sm-4 mx-auto">
                    <button class="btn btn-md bg-primary bg-opacity-25">Lưu thay đổi</button>
                </div>
            </form>
        </div>

        <?php include('./navbar/footer.php'); ?>
    </body>
</html>