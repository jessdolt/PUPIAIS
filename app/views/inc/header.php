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
<body>
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
        <form action="">
            <input type="search" placeholder="Search">
            <button type="submit">
                <svg class="searchIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.4999 14.0001H14.7099L14.4299 13.7301C15.6299 12.3301 16.2499 10.4201 15.9099 8.39014C15.4399 5.61014 13.1199 3.39014 10.3199 3.05014C6.08989 2.53014 2.52989 6.09014 3.04989 10.3201C3.38989 13.1201 5.60989 15.4401 8.38989 15.9101C10.4199 16.2501 12.3299 15.6301 13.7299 14.4301L13.9999 14.7101V15.5001L18.2499 19.7501C18.6599 20.1601 19.3299 20.1601 19.7399 19.7501C20.1499 19.3401 20.1499 18.6701 19.7399 18.2601L15.4999 14.0001ZM9.49989 14.0001C7.00989 14.0001 4.99989 11.9901 4.99989 9.50014C4.99989 7.01014 7.00989 5.00014 9.49989 5.00014C11.9899 5.00014 13.9999 7.01014 13.9999 9.50014C13.9999 11.9901 11.9899 14.0001 9.49989 14.0001Z"/>
                </svg>
            </button>
        </form>
        <div>
            <a href="<?php echo URLROOT; ?>/users/logout"><button>Logout</button></a>
        </div>
        <h1>Polytechnic University <br> of the Philippines</h1>
    </nav>