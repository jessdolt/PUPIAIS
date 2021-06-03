<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="alumni editProfile">
        <section class="heroBox behind">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
                <form action="<?php echo URLROOT; ?>/profile/editProfile/<?php echo $data['student_no']?>" method="POST" class="form" enctype="multipart/form-data">

                    <div>
                        <h2>Edit your profile</h2>
                        <p>Basic info, like your name and photo</p>
                    </div>
                    
                    <div class="questionCon">
                        <div class="questionHeader">
                            <h3>
                                Personal Information
                            </h3>
                        </div>
                        <div class="avatar">
                        <?php if (empty($data['file'])) { ?>
                            <img class="profilePic" src="<?php echo URLROOT ?>/images/default-profile-picture.png" id="myImg" width="200" height="200">
                        <?php } else { ?>
                            <img class="profilePic" src="<?php echo URLROOT ?>/uploads/<?php echo $data['file']?>" id="myImg" width="200" height="200">
                        <?php } ?>
                            <label for="profile-pic-btn">
                                <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="43" height="43" rx="21.5" fill="white"/>
                                    <path d="M21.5 2C10.7165 2 2 10.7165 2 21.5C2 32.2835 10.7165 41 21.5 41C32.2835 41 41 32.2835 41 21.5C41 10.7165 32.2835 2 21.5 2ZM27.545 11.8865C27.818 11.8865 28.091 11.984 28.325 12.1985L30.8015 14.675C31.25 15.104 31.25 15.7865 30.8015 16.196L28.8515 18.146L24.854 14.1485L26.804 12.1985C26.999 11.984 27.272 11.8865 27.545 11.8865ZM23.7035 15.2795L27.7205 19.2965L15.9035 31.1135H11.8865V27.0965L23.7035 15.2795Z" fill="#A63F3F"/>
                                </svg>
                            </label>
                            <input type="file" id="profile-pic-btn" name="fileUpload">
                        </div>
                        <div class="smallComponentsContainer">
                            <div>
                                <label for="first-name" class="outsideLabel">First Name:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="first_name" id="first-name" value="<?php echo $data['first_name']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="middle-name" class="outsideLabel">Middle Name:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="middle_name" id="middle-name" value="<?php echo $data['middle_name']?>">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="last-name" class="outsideLabel">Last Name:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="last_name" id="last-name" value="<?php echo $data['last_name']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="birth-date" class="outsideLabel">Birth Date:</label>
                                <div class="textFieldContainer">
                                    <input type="date" name="birth_date" id="birth-date" value="<?php echo $data['birth_date']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label class="outsideLabel">Employment Status:</label>
                                <fieldset class="radioBtnContainer">
                                    <input type="radio" class="eStatus" name="employment" id="employed-id" value="Employed" <?php echo ($data['employment'] == 'Employed') ? 'checked' : ''?>>
                                    <input type="radio" class="eStatus" name="employment" id="unemployed-id" value="Unemployed" <?php echo ($data['employment'] == 'Unemployed') ? 'checked' : ''?>>
                                </fieldset>
                            </div>
                            <div>
                                <label class="outsideLabel">Gender:</label>
                                <fieldset class="radioBtnContainer">
                                    <input type="radio" class="male" name="gender" id="male-id" value="Male" <?php echo ($data['gender'] == 'MALE') ? 'checked' : '' ?>>
                                    <input type="radio" class="female" name="gender" id="female-id" value="Female" <?php echo ($data['gender'] == 'FEMALE') ? 'checked' : '' ?>>
                                </fieldset>
                            </div>
                        </div>
                        
                    </div>
                    <div class="questionCon">
                        <div class="questionHeader">
                            <h3>
                                Contact Information
                            </h3>
                        </div>
                        <div class="smallComponentsContainer">
                            <div>
                                <label for="address-line1" class="outsideLabel">Street Address:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="address" id="address-line1" value="<?php echo $data['address']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="city-id" class="outsideLabel">City:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="city" id="city-id" value="<?php echo $data['city']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="spr-id" class="outsideLabel">State | Province | Region:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="region" id="spr-id" value="<?php echo $data['region']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="zpc-id" class="outsideLabel">Zip | Postal Code:</label>
                                <div class="textFieldContainer">
                                    <input type="tel" name="postal" id="zpc-id" value="<?php echo (($data['postal'] != 0) ? $data['postal'] : "") ?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="contact-num-id" class="outsideLabel">Contact Number:</label>
                                <div class="textFieldContainer">
                                    <input type="tel" name="contact_no" id="contact-num-id" value="<?php echo (($data['contact_no'] != 0) ? $data['contact_no'] : "") ?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="email-id" class="outsideLabel">Email:</label>
                                <div class="textFieldContainer">
                                    <input type="email" name="email" id="email-id" value="<?php echo $data['email']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <input type="hidden" name="isUploaded" id="hiddenBool">
                    <button>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V6L12 2.25H3.75C3.35218 2.25 2.97064 2.40804 2.68934 2.68934C2.40804 2.97064 2.25 3.35218 2.25 3.75V14.25C2.25 14.6478 2.40804 15.0294 2.68934 15.3107C2.97064 15.592 3.35218 15.75 3.75 15.75ZM5.25 3.75H8.25V5.25H9.75V3.75H11.25V6.75H5.25V3.75ZM5.25 9.75H12.75V14.25H5.25V9.75Z" fill="white"/>
                        </svg>
                        Save Changes
                    </button>
                </form>
            </div>
        </section>
    </main>

    <script>
    const fileUpload = document.getElementById('profile-pic-btn');
    const img_box = document.getElementById('myImg');
    const reader = new FileReader();

    const uploadInput = document.getElementById('hiddenBool');

    fileUpload.addEventListener('change',function(event){
        const files = event.target.files;
        const file = files[0];
        reader.readAsDataURL(file);
        reader.addEventListener('load', function(event){
            img_box.src = event.target.result;
            img_box.alt = file.name; 
        })     
        isUploaded();
    }) 

    function isUploaded(){
        if(fileUpload.files.length == 0){
            uploadInput.value = 0;
        } else {
            uploadInput.value = 1;
        }
    }

    isUploaded();
</script>

<?php require APPROOT . '/views/inc/footer_u.php'; ?>