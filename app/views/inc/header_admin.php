<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="<?php echo URLROOT;?>/images/logo-32px.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">
    <script src="<?php echo URLROOT;?>/js/clock.js"></script>
    <script src="<?php echo URLROOT;?>/js/index.js" defer></script>
    <script src="<?php echo URLROOT;?>/js/image_render.js" defer></script>
    <script src="<?php echo URLROOT;?>/js/survey.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script
     src="https://code.jquery.com/jquery-3.6.0.min.js"
     integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
     crossorigin="anonymous"></script>
     <script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
</head>
<body id="Admin">
    <div class="fullscreen">
        <header class="adminHeader">
            <div class="hamburgerAdmin">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="<?php echo URLROOT;?>/pages/home" class="logo"></a>
            <h1>PUP Institute of Technology</h1>
            <span>Admin Page</span>
            <a href="<?php echo URLROOT;?>/pages/home">Switch to homepage</a>
        </header>
            <div class="main users">
                <nav class="adminNav">
                    <div class="accountNameContainer">
                        <div class="imageContainer">
                            <?php if(empty($_SESSION['image'])) :?>
                            <img src="<?php echo URLROOT?>/images/official-default-avatar.svg">
                            <?php else: ?>
                            <img src="<?php echo URLROOT?>/uploads/<?php echo $_SESSION['image']?>">
                            <?php endif; ?>
                        </div>
                        <h3><?php echo $_SESSION['name']?></h3>
                        <a href="<?php echo URLROOT?>/admin_manage/manage">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.7133 10.4801L19.48 9.81344C19.3256 9.27431 19.1132 8.7535 18.8466 8.2601L19.94 6.21344C19.981 6.13618 19.996 6.04776 19.9828 5.96129C19.9696 5.87482 19.9289 5.79492 19.8666 5.73344L18.2733 4.13344C18.2118 4.07121 18.1319 4.03048 18.0455 4.01727C17.959 4.00406 17.8706 4.01908 17.7933 4.0601L15.76 5.14677C15.2617 4.86721 14.7341 4.64363 14.1866 4.4801L13.52 2.27344C13.4918 2.19211 13.4385 2.12183 13.3678 2.07272C13.2971 2.0236 13.2127 1.99817 13.1266 2.0001H10.8733C10.7867 2.00051 10.7026 2.02853 10.633 2.08008C10.5635 2.13164 10.5122 2.20405 10.4866 2.28677L9.81998 4.48677C9.26799 4.64942 8.73582 4.87302 8.23331 5.15344L6.23331 4.07344C6.15606 4.03241 6.06764 4.01739 5.98117 4.0306C5.8947 4.04381 5.81479 4.08455 5.75331 4.14677L4.13331 5.72677C4.07109 5.78825 4.03035 5.86815 4.01714 5.95462C4.00393 6.04109 4.01896 6.12951 4.05998 6.20677L5.13998 8.20677C4.86002 8.70716 4.63643 9.23707 4.47331 9.78677L2.26665 10.4534C2.18393 10.479 2.11152 10.5303 2.05996 10.5998C2.0084 10.6693 1.98038 10.7535 1.97998 10.8401V13.0934C1.98038 13.18 2.0084 13.2642 2.05996 13.3337C2.11152 13.4033 2.18393 13.4546 2.26665 13.4801L4.48665 14.1468C4.65154 14.6873 4.8751 15.2082 5.15331 15.7001L4.05998 17.7934C4.01896 17.8707 4.00393 17.9591 4.01714 18.0456C4.03035 18.1321 4.07109 18.212 4.13331 18.2734L5.72665 19.8668C5.78813 19.929 5.86803 19.9697 5.9545 19.9829C6.04097 19.9961 6.12939 19.9811 6.20665 19.9401L8.26665 18.8401C8.75396 19.1031 9.26799 19.3131 9.79998 19.4668L10.4666 21.7134C10.4922 21.7962 10.5435 21.8686 10.613 21.9201C10.6826 21.9717 10.7667 21.9997 10.8533 22.0001H13.1066C13.1932 21.9997 13.2774 21.9717 13.3469 21.9201C13.4165 21.8686 13.4678 21.7962 13.4933 21.7134L14.16 19.4601C14.6874 19.3057 15.197 19.0956 15.68 18.8334L17.7533 19.9401C17.8306 19.9811 17.919 19.9961 18.0055 19.9829C18.0919 19.9697 18.1718 19.929 18.2333 19.8668L19.8266 18.2734C19.8889 18.212 19.9296 18.1321 19.9428 18.0456C19.956 17.9591 19.941 17.8707 19.9 17.7934L18.7933 15.7268C19.0582 15.2419 19.2705 14.7301 19.4266 14.2001L21.6733 13.5334C21.756 13.5079 21.8284 13.4566 21.88 13.3871C21.9316 13.3175 21.9596 13.2333 21.96 13.1468V10.8734C21.9639 10.7905 21.9424 10.7084 21.8983 10.6381C21.8542 10.5678 21.7897 10.5127 21.7133 10.4801ZM12 15.6668C11.2748 15.6668 10.5659 15.4517 9.96289 15.0488C9.35991 14.6459 8.88994 14.0733 8.61242 13.4033C8.3349 12.7333 8.26229 11.996 8.40377 11.2848C8.54525 10.5735 8.89446 9.92017 9.40725 9.40738C9.92005 8.89459 10.5734 8.54537 11.2846 8.40389C11.9959 8.26241 12.7332 8.33502 13.4032 8.61254C14.0731 8.89007 14.6458 9.36003 15.0487 9.96301C15.4516 10.566 15.6666 11.2749 15.6666 12.0001C15.6666 12.9726 15.2803 13.9052 14.5927 14.5928C13.9051 15.2805 12.9724 15.6668 12 15.6668Z"/>
                            </svg>
                        </a>
                    </div>
                    <ul class="mainCategoryList">

                        <?php   $url= rtrim($_GET['url'],'/');
                                $url= explode('/', $url);
                        ?>
                        <?php if(userType() == "Admin" || userType() == "Super Admin") : ?>
                        <li class="mainCategory <?php echo ($url[1] == 'dashboard') ? 'open' : ' '?>" >
                            <div class="categoryContainer">
                                <a href="<?php echo URLROOT;?>/admin/dashboard">Dashboard</a>
                            </div>
                        </li>
                        <li class="mainCategory <?php echo ($url[1] == 'alumni' || $url[0] == 'alumni') ? 'open' : ' '?>" tabindex="0">
                            <div class="categoryContainer">
                                <a href="<?php echo URLROOT;?>/admin/alumni">Alumni</a>
                            </div>
                        </li>
                        <li class="mainCategory 
                        <?php echo ($url[1] == 'events' || $url[1] == 'news' || $url[1] == 'job_portal' || $url[0] == 'events' || $url[0] == 'news' || $url[0] =='job_portal') ? 'open' : ' '?>" tabindex="0">
                            <div class="categoryContainer">
                                <span>Contents</span>
                                <span class="icon dropArrow">
                                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 21.3333C15.6885 21.3339 15.3866 21.2254 15.1467 21.0266L7.14671 14.36C6.87442 14.1336 6.70319 13.8084 6.67068 13.4559C6.63817 13.1033 6.74706 12.7522 6.97338 12.48C7.19969 12.2077 7.52491 12.0364 7.87748 12.0039C8.23005 11.9714 8.58109 12.0803 8.85338 12.3066L16 18.28L23.1467 12.52C23.2831 12.4092 23.44 12.3265 23.6085 12.2766C23.7769 12.2267 23.9536 12.2106 24.1283 12.2291C24.303 12.2477 24.4723 12.3007 24.6265 12.3849C24.7807 12.4691 24.9167 12.583 25.0267 12.72C25.1488 12.8571 25.2413 13.0179 25.2984 13.1924C25.3554 13.3669 25.3758 13.5513 25.3583 13.734C25.3408 13.9168 25.2857 14.094 25.1965 14.2544C25.1073 14.4149 24.986 14.5552 24.84 14.6666L16.84 21.1066C16.5933 21.274 16.2975 21.3538 16 21.3333Z"/>
                                    </svg>
                                </span>
                            </div>
                            <ul class="subCategoryList">
                                <li><a href="<?php echo URLROOT;?>/admin/news">News</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/events">Events</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/gallery">Gallery</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/job_portal">Job Portal</a></li>
                            </ul>
                        </li>
                        <li class="mainCategory <?php echo ($url[1] == 'survey_list' || $url[1] == 'survey_report' || $url[0] == 'surveys' ) ? 'open' : ' '?>" tabindex="0">
                            <div class="categoryContainer">
                                <span>Survey</span>
                                <span class="icon dropArrow">
                                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 21.3333C15.6885 21.3339 15.3866 21.2254 15.1467 21.0266L7.14671 14.36C6.87442 14.1336 6.70319 13.8084 6.67068 13.4559C6.63817 13.1033 6.74706 12.7522 6.97338 12.48C7.19969 12.2077 7.52491 12.0364 7.87748 12.0039C8.23005 11.9714 8.58109 12.0803 8.85338 12.3066L16 18.28L23.1467 12.52C23.2831 12.4092 23.44 12.3265 23.6085 12.2766C23.7769 12.2267 23.9536 12.2106 24.1283 12.2291C24.303 12.2477 24.4723 12.3007 24.6265 12.3849C24.7807 12.4691 24.9167 12.583 25.0267 12.72C25.1488 12.8571 25.2413 13.0179 25.2984 13.1924C25.3554 13.3669 25.3758 13.5513 25.3583 13.734C25.3408 13.9168 25.2857 14.094 25.1965 14.2544C25.1073 14.4149 24.986 14.5552 24.84 14.6666L16.84 21.1066C16.5933 21.274 16.2975 21.3538 16 21.3333Z"/>
                                    </svg>
                                </span>
                            </div>
                            <ul class="subCategoryList ">
                                <li><a href="<?php echo URLROOT;?>/admin/survey_list">Survey List</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/survey_report">Survey Report</a></li>
                            </ul>
                        </li>
                        <li class="mainCategory" >
                            <div class="categoryContainer">
                                <a href="<?php echo URLROOT;?>/admin/notif">Send Email</a>
                            </div>
                        </li>

                        <li class="mainCategory" >
                            <div class="categoryContainer">
                                <a href="<?php echo URLROOT;?>/admin/api_test">API TEST</a>
                            </div>
                        </li>

                        <?php else :?>
                            <li class="mainCategory 
                        <?php echo ($url[1] == 'events' || $url[1] == 'news' || $url[1] == 'job_portal' || $url[0] == 'events' || $url[0] == 'news' || $url[0] =='job_portal') ? 'open' : ' '?>" tabindex="0">
                            <div class="categoryContainer">
                                <span>Contents</span>
                                <span class="icon dropArrow">
                                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 21.3333C15.6885 21.3339 15.3866 21.2254 15.1467 21.0266L7.14671 14.36C6.87442 14.1336 6.70319 13.8084 6.67068 13.4559C6.63817 13.1033 6.74706 12.7522 6.97338 12.48C7.19969 12.2077 7.52491 12.0364 7.87748 12.0039C8.23005 11.9714 8.58109 12.0803 8.85338 12.3066L16 18.28L23.1467 12.52C23.2831 12.4092 23.44 12.3265 23.6085 12.2766C23.7769 12.2267 23.9536 12.2106 24.1283 12.2291C24.303 12.2477 24.4723 12.3007 24.6265 12.3849C24.7807 12.4691 24.9167 12.583 25.0267 12.72C25.1488 12.8571 25.2413 13.0179 25.2984 13.1924C25.3554 13.3669 25.3758 13.5513 25.3583 13.734C25.3408 13.9168 25.2857 14.094 25.1965 14.2544C25.1073 14.4149 24.986 14.5552 24.84 14.6666L16.84 21.1066C16.5933 21.274 16.2975 21.3538 16 21.3333Z"/>
                                    </svg>
                                </span>
                            </div>
                            <ul class="subCategoryList">
                                <li><a href="<?php echo URLROOT;?>/admin/news">News</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/events">Events</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/job_portal">Job Portal</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                    
                    <button class="btnLogout">
                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.625 16.875H7.875C7.57672 16.8747 7.29075 16.7561 7.07983 16.5452C6.86892 16.3343 6.7503 16.0483 6.75 15.75V14.0625H7.875V15.75H14.625V2.25H7.875V3.9375H6.75V2.25C6.7503 1.95172 6.86892 1.66575 7.07983 1.45483C7.29075 1.24392 7.57672 1.1253 7.875 1.125H14.625C14.9233 1.1253 15.2093 1.24392 15.4202 1.45483C15.6311 1.66575 15.7497 1.95172 15.75 2.25V15.75C15.7497 16.0483 15.6311 16.3343 15.4202 16.5452C15.2093 16.7561 14.9233 16.8747 14.625 16.875Z"/>
                            <path d="M6.42037 11.5796L4.40325 9.5625H12.375V8.4375H4.40325L6.42037 6.42037L5.625 5.625L2.25 9L5.625 12.375L6.42037 11.5796Z" />
                        </svg>
                        Logout
                    </button>
                </nav>

          