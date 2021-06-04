<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="shortcut icon" href="<?php echo URLROOT;?>/images/logo-32px.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">
    <script src="<?php echo URLROOT;?>/js/index.js" defer></script>
    <script
     src="https://code.jquery.com/jquery-3.6.0.min.js"
     integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
     crossorigin="anonymous"></script>
     <script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
</head>

<?php   
    $url= rtrim($_GET['url'],'/');
    $url= explode('/', $url);
?>

<body id="<?php echo $_SESSION['user_type']?>">
    <header class="mainHeader" <?php echo ($url[0] == 'survey_widget') ? 'userSurvey': ''?>>
        <h1>Polytechnic University of the Philippines</h1>
        <svg class="icon hamburgerIcon" tabindex="0" viewBox="0 0 44 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.3333 32H29.0286C29.7619 32 30.3619 31.4 30.3619 30.6667C30.3619 29.9333 29.7619 29.3333 29.0286 29.3333H13.3333C12.6 29.3333 12 29.9333 12 30.6667C12 31.4 12.6 32 13.3333 32ZM13.3333 25.3333H34.6667C35.4 25.3333 36 24.7333 36 24C36 23.2667 35.4 22.6667 34.6667 22.6667H13.3333C12.6 22.6667 12 23.2667 12 24C12 24.7333 12.6 25.3333 13.3333 25.3333ZM12 17.3333C12 18.0667 12.6 18.6667 13.3333 18.6667H29.0286C29.7619 18.6667 30.3619 18.0667 30.3619 17.3333C30.3619 16.6 29.7619 16 29.0286 16L13.3333 16C12.6 16 12 16.6 12 17.3333Z"/>
        </svg>
    </header>
    <div class="headerShadow"></div>
    <nav class="mainNav">
        <svg class="icon closeIcon" tabindex="0" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M32.6007 15.413C32.0683 14.8805 31.2082 14.8805 30.6758 15.413L24 22.0751L17.3242 15.3993C16.7918 14.8669 15.9317 14.8669 15.3993 15.3993C14.8669 15.9317 14.8669 16.7918 15.3993 17.3242L22.0751 24L15.3993 30.6758C14.8669 31.2082 14.8669 32.0683 15.3993 32.6007C15.9317 33.1331 16.7918 33.1331 17.3242 32.6007L24 25.9249L30.6758 32.6007C31.2082 33.1331 32.0683 33.1331 32.6007 32.6007C33.1331 32.0683 33.1331 31.2082 32.6007 30.6758L25.9249 24L32.6007 17.3242C33.1195 16.8055 33.1195 15.9317 32.6007 15.413V15.413Z"/>
        </svg>
        <ul>
            <?php if($url[0] != 'survey_widget') {?>
                <li><a href="<?php echo URLROOT; ?>/pages/home" <?php if($url[1] == "home") { echo 'class="active"'; }?>>Home</a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/news" <?php if($url[1] == "news") { echo 'class="active"'; }?>>News</a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/events" <?php if($url[1] == "events") { echo 'class="active"'; }?>>Events</a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/jobs" <?php if($url[1] == "jobs") { echo 'class="active"'; }?>>Jobs</a></li>
            <?php } ?>
        </ul>
        <button type="button"><?php echo $_SESSION['name'] ?></button>
        <div class="userContainer">
            <p class="studentId"><?php echo $_SESSION['student_no'] ?></p>
            <a href="<?php echo URLROOT; ?>/profile/viewProfile/<?php echo $_SESSION['alumni_id'] ?>" class="profile">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4C14.21 4 16 5.79 16 8C16 10.21 14.21 12 12 12C9.79 12 8 10.21 8 8C8 5.79 9.79 4 12 4ZM12 20C12 20 20 20 20 18C20 15.6 16.1 13 12 13C7.9 13 4 15.6 4 18C4 20 12 20 12 20Z" fill="black" fill-opacity="0.87"/>
                </svg>
                Profile
            </a>
            <a href="#" class="changePass">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.43284 17.3252L3.07884 19.8002C3.05696 19.9539 3.07113 20.1105 3.12023 20.2577C3.16934 20.4049 3.25202 20.5386 3.36174 20.6483C3.47146 20.7581 3.60522 20.8407 3.75241 20.8898C3.89961 20.9389 4.05622 20.9531 4.20984 20.9312L6.68484 20.5772C7.05984 20.5242 7.99984 18.0002 7.99984 18.0002C7.99984 18.0002 8.47184 18.4052 8.66484 18.4662C9.07684 18.5962 9.47784 18.1922 9.61284 17.7822L9.99984 16.0102C9.99984 16.0102 10.5768 16.3022 10.7858 16.3452C11.0518 16.4002 11.3098 16.2362 11.4928 16.0522C11.6028 15.9427 11.6853 15.8087 11.7338 15.6612L11.9998 14.0102C11.9998 14.0102 12.6748 14.1972 12.9058 14.2242C13.1688 14.2542 13.4248 14.1202 13.6128 13.9312L14.7508 12.7942C15.7141 13.1064 16.7449 13.1467 17.7296 12.9106C18.7143 12.6745 19.6148 12.1712 20.3318 11.4562C21.3615 10.4239 21.9398 9.02532 21.9398 7.56724C21.9398 6.10916 21.3615 4.7106 20.3318 3.67824C19.2995 2.64856 17.9009 2.07031 16.4428 2.07031C14.9848 2.07031 13.5862 2.64856 12.5538 3.67824C11.8386 4.39517 11.3353 5.29563 11.0992 6.28039C10.8631 7.26515 10.9035 8.29597 11.2158 9.25924L3.71484 16.7592C3.56173 16.9122 3.46272 17.1109 3.43284 17.3252ZM18.5038 5.50624C19.0494 6.05341 19.3558 6.79457 19.3558 7.56724C19.3558 8.33992 19.0494 9.08108 18.5038 9.62825L14.3818 5.50624C14.929 4.96069 15.6702 4.65433 16.4428 4.65433C17.2155 4.65433 17.9567 4.96069 18.5038 5.50624Z" fill="black" fill-opacity="0.87"/>
                </svg>
                Change Password
            </a>
            <a href="<?php echo URLROOT; ?>/users/logout" class="logout">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.625 16.875H7.875C7.57672 16.8747 7.29075 16.7561 7.07983 16.5452C6.86892 16.3343 6.7503 16.0483 6.75 15.75V14.0625H7.875V15.75H14.625V2.25H7.875V3.9375H6.75V2.25C6.7503 1.95172 6.86892 1.66575 7.07983 1.45483C7.29075 1.24392 7.57672 1.1253 7.875 1.125H14.625C14.9233 1.1253 15.2093 1.24392 15.4202 1.45483C15.6311 1.66575 15.7497 1.95172 15.75 2.25V15.75C15.7497 16.0483 15.6311 16.3343 15.4202 16.5452C15.2093 16.7561 14.9233 16.8747 14.625 16.875Z" fill="black" fill-opacity="0.87"/>
                <path d="M6.42037 11.5796L4.40325 9.5625H12.375V8.4375H4.40325L6.42037 6.42037L5.625 5.625L2.25 9L5.625 12.375L6.42037 11.5796Z" fill="black" fill-opacity="0.87"/>
                </svg>
                Logout
            </a>
        </div>
        <a href="<?php echo URLROOT; ?>/admin/dashboard" class="dashboardLink">Admin Dashboard</a>
        <h1>Polytechnic University <br> of the Philippines</h1>
    </nav>