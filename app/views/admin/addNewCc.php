<?php require APPROOT . '/views/inc/header_adminManage.php';?>
<main class="admin managePage"><!-- remove cont-creator to access all-->
    <section class="card-con">
        <div class="header-con">
            <h1>New Admin Account</h1>
            <span>Fill the required Details to create account</span>
        </div>
        <form action="<?php echo URLROOT ?>/admin_manage/addCc" id="add-new-account" method="POST">
            <div>
                <label for="full-name" class="outsideLabel">Full Name:</label>
                <div class="textFieldContainer">
                    <input type="text" name="name" id="full-name" required>
                    <span class="error"><?php echo $data['name_err']?></span>
                </div>
            </div>
            <div>
                <label for="email-id" class="outsideLabel">Email:</label>
                <div class="textFieldContainer">
                    <input type="email" name="email" id="email-id"required>
                    <span class="error"><?php echo $data['email_err']?></span>
                </div>
            </div>
            <div>
                <label for="new-password" class="outsideLabel">New Password:</label>
                <div class="textFieldContainer">
                    <input type="password" name="password" id="new-password"required>
                    <span class="error"><?php echo $data['password_err']?></span>
                </div>
            </div>
            <div>
                <label for="confirm-password" class="outsideLabel">Confirm Password:</label>
                <div class="textFieldContainer">
                    <input type="password" name="confirmPassword" id="confirm-password"required>
                    <span class="error"><?php echo $data['confirmPassword_err']?></span>
                </div>
            </div>
        </form>
        <div class="btn-con">
            <button class="changePass" form="add-new-account">Add New Account</button>
        </div>
    </section>
    <p>Polytechnic University Institute of Technology Alumni Information System (PUP-IAIS)</p>
</main>
<?php require APPROOT . '/views/inc/footer_adminManage.php';?>