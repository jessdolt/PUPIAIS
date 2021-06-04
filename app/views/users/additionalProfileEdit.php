<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="alumni editProfile">
        <section class="heroBox behind">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
                <form action="<?php echo URLROOT;?>/users/profileAdditional/<?php echo $_SESSION['alumni_id'] ?>" method="POST" enctype="multipart/form-data" class="form">
                    <div>
                        <h2>Additional Information</h2>
                        <p>Since you are employed, we would like you to answer this short survey</p>
                    </div>
                    <div class="questionCon addInfo">
                        <div class="smallComponentsContainer">
                            <div>
                                <label for="grad-date" class="outsideLabel">Date of Graduation:</label>
                                <div class="textFieldContainer">
                                    <input type="date" name="gradDate" id="grad-date"required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="first-emp-date" class="outsideLabel">Date of 1st Employment:</label>
                                <div class="textFieldContainer">
                                    <input type="date" name="firstEmpDate" id="first-emp-date"required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="current-emp-date" class="outsideLabel">Date of Current Employment:</label>
                                <div class="textFieldContainer">
                                    <input type="date" name="currentEmpDate" id="current-emp-date"required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="type-of-work" class="outsideLabel">Current Nature/Type of Work:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="typeOfWork" id="type-of-work"required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="work-position" class="outsideLabel">Current Plantilla Item/Work Position:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="workPosition" id="work-position"required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="cur-monthly-income" class="outsideLabel">Current Monthly Income:</label>
                                <div class="textFieldContainer">
                                    <input type="number" name="curMonthlyIncome" id="cur-monthly-income"required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label class="outsideLabel">Is your job or/work related to their undergradute program:</label>
                                <fieldset class="radioBtnContainer">
                                    <input type="radio" class="related" name="related" id="yes-id" value="yes" checked>
                                    <input type="radio" class="related" name="related" id="no-id" value="no">
                                </fieldset>
                            </div>
                        </div>
                        <div class="imageInputContainer">
                            <label for="news-image-input">Company ID:</label>
                            <img src="">
                            <label for="news-image-input" class="fileUploadBtn">
                                Edit
                                <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.2411 2.00903L16.4911 4.25903L14.7759 5.97503L12.5259 3.72503L14.2411 2.00903Z" fill="white"/>
                                    <path d="M6 12.4999H8.25L13.7153 7.03467L11.4652 4.78467L6 10.2499V12.4999Z" fill="white"/>
                                    <path d="M14.25 14.75H6.1185C6.099 14.75 6.07875 14.7575 6.05925 14.7575C6.0345 14.7575 6.00975 14.7507 5.98425 14.75H3.75V4.25H8.88525L10.3853 2.75H3.75C2.92275 2.75 2.25 3.422 2.25 4.25V14.75C2.25 15.578 2.92275 16.25 3.75 16.25H14.25C14.6478 16.25 15.0294 16.092 15.3107 15.8107C15.592 15.5294 15.75 15.1478 15.75 14.75V8.249L14.25 9.749V14.75Z" fill="white"/>
                                </svg>
                            </label>
                            <input type="file" name="newsImageInput" id="news-image-input" accept=".jpg, .png">
                        </div>
                    </div>
                    <button>
                        Submit Response
                    </button>
                </form>
            </div>
        </section>
    </main>

<?php require APPROOT . '/views/inc/footer_u.php'; ?>