<!DOCTYPE html>
<html lang="en">
<head>
        <title>Thêm câu hỏi</title>
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
    <?php
    // Start the session if not already started
    ?>
    <div class="container-fluid px-5 py-4">
            <h1 class="text-primary">Thêm câu hỏi</h1>
        </div>

<?php
  $ti = $_SESSION['TID'];
  $Num = $_SESSION['Num_ques']
?>

<?php
echo ' 
<div class="row">
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="./controller/addquestion_processing.php"  method="POST" enctype="multipart/form-data">
';

echo '<a style="font-weight: bold";>Chủ đề câu hỏi về :</><br />
<div class="form-group">
  <label class="col-md-  control-label" for="topic"></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="topic" class="form-control" placeholder="Nhập chủ đề"></textarea>  
  </div>
  <br>
</div>';

for($i=1;$i<=$Num;$i++)
{
echo '<a style="font-weight: bold";>Câu hỏi '.$i.':</a><br />
<div class="form-group">
  <label class="col-md- control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Nhập câu hỏi"></textarea>  
  </div>
</div>

<div class="form-group">
  <label class="col-md- control-label" for="img'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="1" cols="5" name="img'.$i.'" class="form-control" placeholder="Link hỉnh ảnh (nếu có)"></textarea>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Nhập câu a" class="form-control input-md" type="text">
  <div class="col-md-6">
    <input  type="file" name="f'.$i.'1" class="form-control input-md">
  </div>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Nhập câu b" class="form-control input-md" type="text">
  <div class="col-md-6">
    <input  type="file" name="f'.$i.'2" class="form-control input-md">
  </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Nhập câu c" class="form-control input-md" type="text">
  <div class="col-md-6">
    <input  type="file" name="f'.$i.'3" class="form-control input-md">
  </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Nhập câu d" class="form-control input-md" type="text">
  <div class="col-md-6">
    <input  type="file" name="f'.$i.'4" class="form-control input-md">
  </div>
  </div>
</div>
<br />
<a style="font-weight: bold";>Đáp án</a>:<br />
<select id="ans'.$i.'" name="ans'.$i.'"  class="form-control input-md" >
   <option value="a">Đáp án đúng</option>
  <option value="A">Câu a</option>
  <option value="B">Câu b</option>
  <option value="C">Câu c</option>
  <option value="D">Câu d</option> </select><br />
  
  <a style="font-weight: bold";>Độ khó</a><br />
<select id="ans'.$i.'" name="level'.$i.'"  class="form-control input-md" >
   <option value="Dễ">Chọn độ khó</option>
  <option value="Dễ">Dễ</option>
  <option value="Vừa">Vừa</option>
  <option value="Khó">Khó</option> </select><br /><br />'; 

  }
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12" style="padding-bottom:100px;"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</form></div>';


?>

<!-- <script>
function submitAllForms() {
    // Loop through each form and submit
    for (let i = 1; i <= <?php echo $Num_ques; ?>; i++) {
        document.getElementById('questionForm' + i).submit();
    }
}

function showForm(questionNumber) {
    // Hide all forms
    document.querySelectorAll('form').forEach(function(form) {
        form.style.display = 'none';
    });
    // Show the selected form
    var formId = 'questionForm' + questionNumber;
    var form = document.getElementById(formId);
    if (form) {
        form.style.display = 'block';
    }
}

// Call the function to append forms to questionForms div
showForm(1); -->
<!-- </script> -->
<?php include('./navbar/footer.php'); ?>
</body>
</html>


