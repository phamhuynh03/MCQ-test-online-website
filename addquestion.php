<!DOCTYPE html>
<html>
    <head>
        <title>Thêm câu hỏi</title>
        <meta name="viewport" charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://code.jquery.com/ui/1.13.2/themes/black-tie/jquery-ui.css" rel="stylesheet">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>
        <?php include('./navbar/header.php'); ?>
        
        <div class="container-fluid px-5 py-4">
            <h1 class="text-primary">Thêm câu hỏi</h1>
        </div>

        <?php
            $ti = $_SESSION['TID'];
            $Num = $_SESSION['Num_ques'];
            $cid = $_GET['cid'];

            echo '<div class="container-fluid p-5 bg-secondary bg-opacity-10 text-primary">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form class="form-horizontal title1" name="form" action="./controller/addquestion_processing.php?cid='.$cid.'" method="POST" enctype="multipart/form-data">';
                            for($i = 1; $i <= $Num; $i++){
                                echo '<br>
                                    <h4 class="text-primary">Câu hỏi số '.$i.'</h4>
                                    <div class="form-group">
                                        <h6>Chủ đề</h6>
                                        <div class="col-md-12">
                                            <textarea rows="3" cols="5" name="topic" class="form-control" placeholder="Nhập chủ đề"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h6>Nội dung câu hỏi</h6>
                                        <div class="col-md-12">
                                            <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Nhập câu hỏi"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                                <input  type="file" name="fqns'.$i.'" class="form-control input-md">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h6>Link hỉnh ảnh (nếu có)</h6>
                                        <div class="col-md-12">
                                            <textarea rows="1" cols="5" name="img'.$i.'" class="form-control" placeholder="Link hỉnh ảnh"></textarea>  
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h6>Đáp án A</h6>
                                        <div class="col-md-12">
                                            <input id="'.$i.'1" name="'.$i.'1" placeholder="Đáp án A" class="form-control input-md" type="text">  
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h6>Đáp án B</h6>
                                        <div class="col-md-12">
                                            <input id="'.$i.'2" name="'.$i.'2" placeholder="Đáp án B" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h6>Đáp án C</h6> 
                                        <div class="col-md-12">
                                            <input id="'.$i.'3" name="'.$i.'3" placeholder="Đáp án C" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h6>Đáp án D</h6>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'4" name="'.$i.'4" placeholder="Đáp án D" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <br>
                                    <h6>Đáp án đúng</h6>  
                                    <select id="ans'.$i.'" name="ans'.$i.'" class="form-control input-md">
                                        <option value="A">Đáp án đúng</option>
                                        <option value="A">Câu A</option>
                                        <option value="B">Câu B</option>
                                        <option value="C">Câu C</option>
                                        <option value="D">Câu D</option>
                                    </select>
                                    <br>
                                    <h6>Độ khó</h6>  
                                    <select id="ans'.$i.'" name="level'.$i.'" class="form-control input-md">
                                        <option value="Dễ">Chọn độ khó</option>
                                        <option value="Dễ">Dễ</option>
                                        <option value="Vừa">Vừa</option>
                                        <option value="Khó">Khó</option>
                                    </select>
                                    <br>'; 
                            }
                        echo '<div class="form-group">
                                <div class="d-grid gap-2 col-md-2 col-sm-4 mx-auto">
                                    <button class="btn btn-md bg-primary bg-opacity-25">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>        
                </div>
            </div>';
        ?>

        <?php include('./navbar/footer.php'); ?>
    </body>
</html>
