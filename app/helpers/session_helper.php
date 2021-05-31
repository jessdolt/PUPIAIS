<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    function userType() {
        if ($_SESSION['user_type'] == "Admin") {
            return 'Admin';
        } elseif ($_SESSION['user_type'] == "Alumni") {
            return 'Alumni';
        } elseif ($_SESSION['user_type'] == "Content Creator") {
            return 'Content Creator';
        }

    }

    function isAdmin() {
        if ($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Content Creator") {
            return true;
        } else {
            return false;
        }
    }