<?php
    session_start();
    $username="";
    if(isset($_SESSION['Email']) && $_SESSION['Email']!="")
        $username = $_SESSION['First_name'];

    if($username!="")
        $logined = "Chào ".$username."!";
    else
        $logined = "Login";
?>

<header>
    <nav class="navbar navbar-expand-sm sticky-top bg-dark">
        <div class="container-fluid">
            <img src="./asset/img/logo_dark.svg" alt="QuizBK" title="QuizBK">
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a class="nav-link text-white" href="index.php?page=index">Trang chủ</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-white" href="index.php?page=course">Các khóa học</a>
                    </li>

                    <?php
                        if(isset($logined) && $logined != "Login"){?>
                            <li class="nav-item px-2">
                                <a class="nav-link text-white" href="index.php?page=mycourse">Khóa học của tôi</a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link text-white" href="index.php?page=profile">Thông tin cá nhân</a>
                            </li>
                    <?php }?>

                </ul>
                
                <ul class="navbar-nav ms-auto">
                    
                    <?php
                        if(isset($logined) && $logined != "Login"){?>
                            <li class="nav-item px-2">
                                <a class="nav-link text-white"><?php echo $logined; ?></a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link text-white" href="index.php?page=auth/logout">Đăng xuất</a>
                            </li>
                    <?php }
                        else{?>
                            <li class="nav-item px-2">
                                <a class="nav-link text-white" href="index.php?page=auth/login">Đăng nhập</a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link text-white" href="index.php?page=auth/register">Đăng ký</a>
                            </li>
                    <?php }?>

                </ul>
            </div>
        </div>
    </nav>

    <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            header("Location: $page.php");
        }
    ?>
</header>