<?php require APPROOT . '/views/inc/header_admin.php';?>
    <main class="admin jobPortalAdd dataInput">
            <section class="pageSpecificHeader">
                
            </section>
            <section class="mainContent adminForm">
                <form action="<?php echo URLROOT;?>/job_portals/add" method="POST" enctype="multipart/form-data">
                <div class="form">
                    <h2>
                        Content
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.47149 19.0139C9.23783 19.0143 9.0114 18.9329 8.83149 18.7839C8.73023 18.6999 8.64653 18.5968 8.58517 18.4805C8.52382 18.3641 8.48603 18.2368 8.47395 18.1058C8.46187 17.9749 8.47576 17.8428 8.5148 17.7172C8.55385 17.5916 8.61728 17.4749 8.70149 17.3739L13.1815 12.0139L8.86149 6.64386C8.77842 6.54157 8.71639 6.42387 8.67896 6.29753C8.64153 6.17119 8.62943 6.0387 8.64337 5.90767C8.65731 5.77665 8.69701 5.64966 8.76018 5.53403C8.82335 5.41839 8.90876 5.31638 9.01149 5.23386C9.11495 5.14282 9.23612 5.07415 9.36738 5.03216C9.49864 4.99017 9.63717 4.97577 9.77426 4.98986C9.91135 5.00394 10.0441 5.04621 10.164 5.11401C10.284 5.18181 10.3887 5.27368 10.4715 5.38386L15.3015 11.3839C15.4486 11.5628 15.529 11.7872 15.529 12.0189C15.529 12.2505 15.4486 12.4749 15.3015 12.6539L10.3015 18.6539C10.2012 18.7749 10.0737 18.8705 9.92953 18.9331C9.78532 18.9956 9.62839 19.0233 9.47149 19.0139Z" fill="#A63F3F"/>
                        </svg>
                        Add
                    </h2>
                    <h3>primary details:</h3>
                    <label for="job-title" class="outsideLabel">Job Title:</label>
                    <div class="textFieldContainer">
                        <input type="text" name="job_title" id="job-title"required>
                        <span class="error"></span>
                    </div> 
                    <label for="company-name" class="outsideLabel">Company Name:</label>
                    <div class="textFieldContainer">
                        <input type="text" name="company_name" id="company-name"required>
                        <span class="error"></span>
                    </div>
                    <div class="smallComponentsContainer">
                        <div>
                            <label class="outsideLabel">Work Type:</label>
                            <fieldset class="radioBtnContainer">
                                <input type="radio" class="workType" name="work_status" id="full-time" value="Full-Time" checked>
                                <input type="radio" class="workType" name="work_status" id="part-time" value="Part-Time">
                            </fieldset>
                        </div>
                        <div>
                            <label class="outsideLabel">Status:</label>
                            <fieldset class="radioBtnContainer">
                                <input type="radio" class="status" name="job_status" id="open-status" value="Active" checked>
                                <input type="radio" class="status" name="job_status" id="closed-status" value="Archived">
                            </fieldset>
                        </div>
                        <div>
                            <label class="outsideLabel">Available Positions:</label>
                            <input type="number" name="avail_pos" id="available-position" placeholder="000"min="0">
                        </div>
                    </div>
                    <h3>full details:</h3>
                    <label for="description" class="outsideLabel">Description:</label>

                        <div class="richTfContainer">
                                <textarea name="job_description" id="" cols="30" rows="10"></textarea>
                        </div>
                    <label for="others" class="outsideLabel">Others:</label>

                        <div class="richTfContainer">
                                <textarea name="others" id="" cols="30" rows="10"></textarea>
                        </div>
                    
                </div>
                <div class="form">
                    <a href="<?php echo URLROOT;?>/admin/job_portal" class="closeIcon">
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.7624 15L22.1374 9.63749C22.3728 9.40211 22.505 9.08287 22.505 8.74999C22.505 8.41711 22.3728 8.09787 22.1374 7.86249C21.902 7.62711 21.5828 7.49487 21.2499 7.49487C20.917 7.49487 20.5978 7.62711 20.3624 7.86249L14.9999 13.2375L9.63742 7.86249C9.40204 7.62711 9.0828 7.49487 8.74992 7.49487C8.41705 7.49487 8.0978 7.62711 7.86242 7.86249C7.62704 8.09787 7.49481 8.41711 7.49481 8.74999C7.49481 9.08287 7.62704 9.40211 7.86242 9.63749L13.2374 15L7.86242 20.3625C7.74526 20.4787 7.65227 20.6169 7.58881 20.7693C7.52535 20.9216 7.49268 21.085 7.49268 21.25C7.49268 21.415 7.52535 21.5784 7.58881 21.7307C7.65227 21.883 7.74526 22.0213 7.86242 22.1375C7.97863 22.2547 8.11688 22.3476 8.2692 22.4111C8.42153 22.4746 8.58491 22.5072 8.74992 22.5072C8.91494 22.5072 9.07832 22.4746 9.23064 22.4111C9.38297 22.3476 9.52122 22.2547 9.63742 22.1375L14.9999 16.7625L20.3624 22.1375C20.4786 22.2547 20.6169 22.3476 20.7692 22.4111C20.9215 22.4746 21.0849 22.5072 21.2499 22.5072C21.4149 22.5072 21.5783 22.4746 21.7306 22.4111C21.883 22.3476 22.0212 22.2547 22.1374 22.1375C22.2546 22.0213 22.3476 21.883 22.411 21.7307C22.4745 21.5784 22.5072 21.415 22.5072 21.25C22.5072 21.085 22.4745 20.9216 22.411 20.7693C22.3476 20.6169 22.2546 20.4787 22.1374 20.3625L16.7624 15Z" fill="black" fill-opacity="0.87"/>
                        </svg>
                            
                    </a>
                    <div class="imageInputContainer">
                        <img src="" id="myImg">
                        <label for="fileUpload" class="fileUploadBtn">
                            Edit
                            <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.2411 2.00903L16.4911 4.25903L14.7759 5.97503L12.5259 3.72503L14.2411 2.00903Z" fill="white"/>
                                <path d="M6 12.4999H8.25L13.7153 7.03467L11.4652 4.78467L6 10.2499V12.4999Z" fill="white"/>
                                <path d="M14.25 14.75H6.1185C6.099 14.75 6.07875 14.7575 6.05925 14.7575C6.0345 14.7575 6.00975 14.7507 5.98425 14.75H3.75V4.25H8.88525L10.3853 2.75H3.75C2.92275 2.75 2.25 3.422 2.25 4.25V14.75C2.25 15.578 2.92275 16.25 3.75 16.25H14.25C14.6478 16.25 15.0294 16.092 15.3107 15.8107C15.592 15.5294 15.75 15.1478 15.75 14.75V8.249L14.25 9.749V14.75Z" fill="white"/>
                            </svg>
                        </label>
                        <input type="file" name="fileUpload" id="fileUpload" accept="image/*">
                    </div>
                    <label>Company Logo:</label>
                    <div class="btnGroupContainer">
                        <button class="reset">
                            <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 6C13.9477 3.78 11.6527 2.25 9 2.25C8.11358 2.25 7.23583 2.42459 6.41689 2.76381C5.59794 3.10303 4.85382 3.60023 4.22703 4.22703C3.60023 4.85382 3.10303 5.59794 2.76381 6.41689C2.42459 7.23583 2.25 8.11358 2.25 9C2.25 9.88642 2.42459 10.7642 2.76381 11.5831C3.10303 12.4021 3.60023 13.1462 4.22703 13.773C4.85382 14.3998 5.59794 14.897 6.41689 15.2362C7.23583 15.5754 8.11358 15.75 9 15.75C10.7902 15.75 12.5071 15.0388 13.773 13.773C15.0388 12.5071 15.75 10.7902 15.75 9M15.75 2.25V6.75H11.25" stroke="black" stroke-opacity="0.87" stroke-width="2"/>
                            </svg>
                            reset
                        </button>
                        <button class="save">
                            <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V6L12 2.25H3.75C3.35218 2.25 2.97064 2.40804 2.68934 2.68934C2.40804 2.97064 2.25 3.35218 2.25 3.75V14.25C2.25 14.6478 2.40804 15.0294 2.68934 15.3107C2.97064 15.592 3.35218 15.75 3.75 15.75ZM5.25 3.75H8.25V5.25H9.75V3.75H11.25V6.75H5.25V3.75ZM5.25 9.75H12.75V14.25H5.25V9.75Z" fill="white"/>
                            </svg>
                            SAVE
                        </button>
                    </div>
                    </form>
            </section>
        </main>
    </div>
</div>
        <script>
            CKEDITOR.replace( 'job_description' );
            CKEDITOR.replace( 'others' );
            CKEDITOR.config.height = '40vh';
        </script>

<?php require APPROOT . '/views/inc/footer.php';?>