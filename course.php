<!DOCTYPE html>
<html>
    <head>
        <title>Các khóa học</title>
        <meta name="viewport" charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href = "https://code.jquery.com/ui/1.13.2/themes/black-tie/jquery-ui.css" rel = "stylesheet">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <?php include('./navbar/header.php'); ?>
        
        <div class="container-fluid px-5 py-4">
            <h1 class="text-primary">Các khóa học hiện có</h1>
        </div>
        <div class="container-fluid p-5 bg-secondary bg-opacity-10 text-white">
            
            <?php if(isset($_GET['error'])){?>
                <p class="text-center" id="message"><?php echo $_GET['error']; ?></p>
            <?php }?>

            <script>
                setTimeout(function(){document.getElementById('message').style.display = 'none';}, 3000);
            </script>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3" id="course-list">
                    <script>
                        $(document).ready(function(){
                            $.ajax({
                                url: 'get_course.php',
                                dataType: 'xml',
                                success: function(data){
                                    $(data).find('course').each(function(){
                                        var course_name = $(this).find('course_name').text();
                                        var description = $(this).find('description').text();
                                        var num_ques = $(this).find('num_ques').text();
                                        var teacher = $(this).find('teacher').text();
                                        var school = $(this).find('school').text();
                                        var courseHTML = '<div class="col p-2">' 
                                                            + '<div class="card h-100">' 
                                                                + '<img class="card-img-top" src="./asset/img/course/' + Math.floor(Math.random() * 6 + 1) + '.svg" alt="Card image cap">'
                                                                + ' <div class="card-body bg-primary bg-opacity-75">' 
                                                                    + '<h4 class="card-title lh-sm text-white">' + course_name + '</h4>'
                                                                    + '<p class="card-text lh-sm text-white">' + description + '</p>' 
                                                                    + '<p class="card-text lh-sm text-white">Số câu hỏi: ' + num_ques + ' câu</p>'
                                                                    + '<h6 class="card-text lh-sm text-white">Giảng viên: ' + teacher + '</h6>'
                                                                    + '<h6 class="card-text lh-sm text-white">' + school + '</h6>'
                                                                + '</div>'
                                                                + ' <div class="card-footer">' 
                                                                    + '<a href="#" class="btn btn-md bg-primary text-white float-end">Làm bài</a>'
                                                                + '</div>' 
                                                            + '</div>' 
                                                        + '</div>';
                                        $('#course-list').append(courseHTML);
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error fetching courses:", error);
                                    $('#course-error').append('<li>Error fetching courses. Please try again later.</li>');
                                }
                            });
                        });
                    </script>
                </div>
            </div>            
        </div>

        <?php include('./navbar/footer.php'); ?>
    </body>
</html>