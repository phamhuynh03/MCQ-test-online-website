<!DOCTYPE html>
<html>
    <head>
        <title>Thêm khóa học</title>
        <meta name="viewport" charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href = "https://code.jquery.com/ui/1.13.2/themes/black-tie/jquery-ui.css" rel = "stylesheet">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>
        <?php include('./navbar/header.php'); ?>
        
        <div class="container-fluid px-5 py-4">
            <h1 class="text-primary">Thêm khóa học</h1>
        </div>
        <div class="container-fluid p-5 bg-secondary bg-opacity-10 text-primary">
            <div class="row justify-content-center">    
                <div class="col-md-8">
                    <div class="text-center ">
                        <h2>Thông tin khóa học</h2>
                    </div>
                    <form action="./controller/addcourse_processing.php" method="post">
                        <div class="form-group">
                            <label class="col-md-12 control-label"></label>  
                            <div class="col-md-12">
                                <input id="name" name="name" placeholder="Nhập tên khóa học" class="form-control input-md" type="text">  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label"></label>  
                            <div class="col-md-12">
                                <input id="total" name="total" placeholder="Nhập số câu hỏi" class="form-control input-md" type="number">        
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label"></label>  
                            <div class="col-md-12">
                                <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Mô tả"></textarea>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label"></label>
                            <div class="d-grid gap-2 col-md-2 col-sm-4 mx-auto">
                                <button class="btn btn-md bg-primary bg-opacity-25">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include('./navbar/footer.php'); ?>
    </body>
</html>