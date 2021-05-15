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
</head>
<body id="<?php echo $_SESSION['user_type']?>">
<header class="mainHeader">
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
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Jobs</a></li>
        </ul>

            <a href="<?php echo URLROOT; ?>/admin/dashboard" class="dashboardLink">Admin Dashboard</a>
            <a href="<?php echo URLROOT; ?>/users/logout" class="logout">Logout</a>

        <h1>Polytechnic University <br> of the Philippines</h1>
    </nav>
