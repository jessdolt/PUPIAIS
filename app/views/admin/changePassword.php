<?php require APPROOT . '/views/inc/header_adminManage.php';?>
<main class="admin managePage"><!-- remove cont-creator to access all-->
    <section class="card-con">
        <div class="header-con">
            <h1>Change Password</h1>
            <span>Choose a strong password and don’t reuse it for other accounts.</span>
        </div>
        <form action="<?php echo URLROOT ?>/admin_manage/changePassword" id="change-pass-form" method="POST">
            <div>
                <label for="old-password" class="outsideLabel">Old Password:</label>
                <div class="textFieldContainer">
                    <input type="password" name="oldPassword" id="old-password"required>
                    <span class="error"><?php echo $data['oldPassword_error']?></span>
                </div>
            </div>
            <div>
                <label for="new-password" class="outsideLabel">New Password:</label>
                <div class="textFieldContainer">
                    <input type="password" name="password" id="new-password"required>
                    <span class="error"><?php echo $data['password_error']?></span>
                </div>
            </div>
            <div>
                <label for="confirm-password" class="outsideLabel">Confirm Password:</label>
                <div class="textFieldContainer">
                    <input type="password" name="confirmPassword" id="confirm-password"required>
                    <span class="error"><?php echo $data['confirmPassword_error']?></span>
                </div>
            </div>
        </form>
        <div class="btn-con">
            <button class="changePass" form="change-pass-form">Change Password</button>
        </div>
    </section>
    <p>Polytechnic University Institute of Technology Alumni Information System (PUP-IAIS)</p>
</main>
<?php require APPROOT . '/views/inc/footer_adminManage.php';?>