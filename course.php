<!DOCTYPE html>
<html>
    <head>
        <title>Các khóa học</title>
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
            <h1 class="text-primary">Các khóa học hiện có</h1>
        </div>
        <script>
            $(function(){
                $("#Course_search").autocomplete({source: './controller/search_course_auto.php'});
                $("#School_search").autocomplete({source: './controller/search_school_auto.php'});
                $("#Teacher_search").autocomplete({source: './controller/search_teacher_auto.php'});
            });
        </script>
        <div class="container-fluid px-5 bg-secondary bg-opacity-10 text-primary">
            <form action="./controller/search_processing.php" method="POST">
                <div class="row row-cols-1 px-5 py-2 ms-1">
                    <div class="col-xl-3 ps-2 py-1">
                        <input class="form-control" type="Search" name="Course_search" id="Course_search" placeholder="Khóa học" aria-label="Course_search"
                            <?php if(isset($_SESSION['Course_search'])) echo "value='{$_SESSION['Course_search']}'"; ?>>
                    </div>
                    <div class="col-xl-3 ps-2 py-1">
                        <input class="form-control" type="Search" name="School_search" id="School_search" placeholder="Trường" aria-label="School_search"
                            <?php if(isset($_SESSION['School_search'])) echo "value='{$_SESSION['School_search']}'"; ?>>
                    </div>
                    <div class="col-xl-2 ps-2 py-1">
                        <input class="form-control" type="Search" name="Teacher_search" id="Teacher_search" placeholder="Giảng viên" aria-label="Teacher_search"
                            <?php if(isset($_SESSION['Teacher_search'])) echo "value='{$_SESSION['Teacher_search']}'"; ?>>
                    </div>
                    <div class="col-xl-1 ps-2 py-1">
                        <button class="btn bg-primary bg-opacity-10" type="Submit"><img src="./asset/img/search.svg"></button>
                    </div>
                </div>
            </form>

            <?php if(isset($_SESSION['Check']) && ($_SESSION['Check'] == False)){?>
                <h3 class="text-center text-dark vh-100">No course found!</h3>
            <?php }else{?>
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3" id="course-list">
                        <script>
                            $(document).ready(function(){
                                $.ajax({
                                    url: './controller/get_course.php',
                                    dataType: 'xml',
                                    success: function(data){
                                        $(data).find('course').each(function(){
                                            var checkTID = $(this).find('checkTID').text();
                                            var CID = $(this).find('CID').text();
                                            var course_name = $(this).find('course_name').text();
                                            var description = $(this).find('description').text();
                                            var num_ques = $(this).find('num_ques').text();
                                            var teacher = $(this).find('teacher').text();
                                            var school = $(this).find('school').text();
                                            var courseHTML = '<div class="col p-2">' 
                                                                + '<div class="card h-100">' 
                                                                    + '<img class="card-img-top" src="./asset/img/course/' + Math.floor(Math.random() * 6 + 1) + '.svg" alt="' + course_name + '" title="' + course_name + '">'
                                                                    + ' <div class="card-body bg-primary bg-opacity-10">' 
                                                                        + '<h4 class="card-title lh-sm text-dark">' + course_name + '</h4>'
                                                                        + '<p class="card-text lh-sm text-secondary">' + description + '</p>' 
                                                                        + '<p class="card-text lh-sm text-secondary">Số câu hỏi: ' + num_ques + ' câu</p>'
                                                                        + '<h6 class="card-text lh-sm text-dark">Giảng viên: ' + teacher + '</h6>'
                                                                        + '<h6 class="card-text lh-sm text-dark">' + school + '</h6>'
                                                                    + '</div>'
                                                                    + ' <div class="card-footer">';
                                                        if(checkTID == 'True'){
                                                            courseHTML += '<a href="./controller/delete_processing.php?cid=' + CID + '&page=course" class="btn btn-md bg-primary bg-opacity-25 float-end m-1">Xóa</a>'
                                                                        + '<a href="#" class="btn btn-md bg-primary bg-opacity-25 float-end m-1">Chỉnh sửa</a>'
                                                                        + '<a href="#" class="btn btn-md bg-primary bg-opacity-25 float-end m-1">Xuất</a>';
                                                        }
                                                            courseHTML += '<a href="./controller/create_queslist.php?name=' + course_name + '&cid=' + CID + '&nq=' + num_ques + '" class="btn btn-md bg-primary bg-opacity-25 float-end m-1">Làm bài</a>'
                                                                    + '</div>' 
                                                                + '</div>' 
                                                            + '</div>';
                                            $('#course-list').append(courseHTML);
                                        });
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            <?php }?>
        </div>

        <?php include('./navbar/footer.php'); ?>
    </body>
</html>