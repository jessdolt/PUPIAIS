<?php require APPROOT . '/views/inc/header_admin.php';?>
<?php 
    $url= rtrim($_GET['url'],'/');
    $url= explode('/', $url);
?>
            
    <section class="filterNav">
            <div class="btnContainer">
                <a href="<?php echo URLROOT;?>/group/new_dept" class="addNewGroup">
                    Add Department
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12H8M12 8V12V8ZM12 12V16V12ZM12 12H16H12Z" stroke="black" stroke-opacity="0.87" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-opacity="0.87" stroke-width="2"/>
                    </svg>
                </a>
                <a href="<?php echo URLROOT;?>/group/new_batch" class="addNewGroup">
                    Add Batch
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12H8M12 8V12V8ZM12 12V16V12ZM12 12H16H12Z" stroke="black" stroke-opacity="0.87" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-opacity="0.87" stroke-width="2"/>
                    </svg>
                </a>
                <a href="<?php echo URLROOT;?>/admin/alumni"class="allUser">
                    All Alumni 
                    <span class="allUserCount"><?php echo (!empty($data['alumniCount']) ?  $data['alumniCount'] : '0')?></span>
                </a>
            </div>
            <ul class="groupList">
                <?php foreach($data['department'] as $department): ?>
                <li class="group">
                    <button class="groupHeader <?php echo ($url[2] == $department->id) ? 'active' : ' ' ?>">
                        <?php echo $department->dept_code?> 
                       
                        <span class="icon dropArrow">
                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 21.3333C15.6885 21.3339 15.3866 21.2254 15.1467 21.0266L7.14671 14.36C6.87442 14.1336 6.70319 13.8084 6.67068 13.4559C6.63817 13.1033 6.74706 12.7522 6.97338 12.48C7.19969 12.2077 7.52491 12.0364 7.87748 12.0039C8.23005 11.9714 8.58109 12.0803 8.85338 12.3066L16 18.28L23.1467 12.52C23.2831 12.4092 23.44 12.3265 23.6085 12.2766C23.7769 12.2267 23.9536 12.2106 24.1283 12.2291C24.303 12.2477 24.4723 12.3007 24.6265 12.3849C24.7807 12.4691 24.9167 12.583 25.0267 12.72C25.1488 12.8571 25.2413 13.0179 25.2984 13.1924C25.3554 13.3669 25.3758 13.5513 25.3583 13.734C25.3408 13.9168 25.2857 14.094 25.1965 14.2544C25.1073 14.4149 24.986 14.5552 24.84 14.6666L16.84 21.1066C16.5933 21.274 16.2975 21.3538 16 21.3333Z"/>
                            </svg>
                        </span>
                        <span class="groupUserCount">30</span>
                    </button>
                    <ul class="subGroupList">
                    
                    <?php foreach($data['classification'] as $class): ?> 
                        <?php if($department->id == $class->dept_id){ ?>
                        <li class="subGroup">  
                            <a href="<?php echo URLROOT;?>/alumni/show/<?php echo $department->id?>/<?php echo $class->batch_id ?>">Batch <?php echo $class->year ?></a>
                        <?php }?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
            </ul>
</section>

    <main class="admin">
            <section class="pageSpecificHeader">
         
                <div>
                    <h2>
                        <span class="department"><?php echo $data['title']?></span>
                             <?php if(!empty($data['batch'])): ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.47246 19.0139C9.23881 19.0143 9.01237 18.9329 8.83246 18.7839C8.7312 18.6999 8.6475 18.5968 8.58615 18.4805C8.5248 18.3641 8.487 18.2368 8.47493 18.1058C8.46285 17.9749 8.47673 17.8428 8.51578 17.7172C8.55482 17.5916 8.61826 17.4749 8.70246 17.3739L13.1825 12.0139L8.86246 6.64386C8.7794 6.54157 8.71737 6.42387 8.67993 6.29753C8.6425 6.17119 8.63041 6.0387 8.64435 5.90767C8.65829 5.77665 8.69798 5.64966 8.76116 5.53403C8.82433 5.41839 8.90974 5.31638 9.01246 5.23386C9.11593 5.14282 9.23709 5.07415 9.36836 5.03216C9.49962 4.99017 9.63814 4.97577 9.77524 4.98986C9.91233 5.00394 10.045 5.04621 10.165 5.11401C10.285 5.18181 10.3897 5.27368 10.4725 5.38386L15.3025 11.3839C15.4495 11.5628 15.53 11.7872 15.53 12.0189C15.53 12.2505 15.4495 12.4749 15.3025 12.6539L10.3025 18.6539C10.2021 18.7749 10.0747 18.8705 9.9305 18.9331C9.78629 18.9956 9.62937 19.0233 9.47246 19.0139Z" fill="white"/>
                        </svg>
                        <span class="batch">
                            Batch <?php echo $data['batch']?>
                        </span>
                          <?php endif; ?>
                    </h2>
                    <div class="btnContainer">
                        <a href="<?php echo URLROOT;?>/alumni/add/">
                            Add
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12H8M12 8V12V8ZM12 12V16V12ZM12 12H16H12Z" stroke="black" stroke-opacity="0.87" stroke-width="2" stroke-linecap="round"/>
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-opacity="0.87" stroke-width="2"/>
                            </svg>
                        </a>
                        <?php   

                                if(!empty($url[2])):
                        ?>
                        <!-- JessForm -->
                        <form action="<?php echo URLROOT;?>/alumni/previeww/<?php echo $url[2]?>/<?php echo $url[3]?>" id="preview-form-hidden" method="POST" enctype="multipart/form-data">
                        <?php  else:?>
                        <form action="<?php echo URLROOT;?>/alumni/preview" id="preview-form-hidden" method="POST" enctype="multipart/form-data">
                        <?php endif;?>

                            <button type="button" class="importBtn">
                                import
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 18L16 13H13V2H11V13H8L12 18Z" fill="black" fill-opacity="0.87"/>
                                    <path d="M19 9H15V11H19V20H5V11H9V9H5C3.897 9 3 9.897 3 11V20C3 21.103 3.897 22 5 22H19C20.103 22 21 21.103 21 20V11C21 9.897 20.103 9 19 9Z" fill="black" fill-opacity="0.87"/>
                                </svg>
                            </button>
                            <input type="file" class="input-file-hidden" accept=".csv" name="csv_file">
                        </form>
                        <button>
                            print
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 17.5V18.75C18 19.3467 17.7629 19.919 17.341 20.341C16.919 20.7629 16.3467 21 15.75 21H8.25C7.65326 21 7.08097 20.7629 6.65901 20.341C6.23705 19.919 6 19.3467 6 18.75V17.499L4.25 17.5C3.65326 17.5 3.08097 17.2629 2.65901 16.841C2.23705 16.419 2 15.8467 2 15.25V9.254C2 8.39205 2.34241 7.5654 2.9519 6.9559C3.5614 6.34641 4.38805 6.004 5.25 6.004L5.999 6.003L6 5.25C6 4.65326 6.23705 4.08097 6.65901 3.65901C7.08097 3.23705 7.65326 3 8.25 3H15.752C16.3487 3 16.921 3.23705 17.343 3.65901C17.7649 4.08097 18.002 4.65326 18.002 5.25V6.003H18.752C19.614 6.00353 20.4405 6.34605 21.0502 6.95537C21.6599 7.56469 22.0029 8.39103 22.004 9.253L22.007 15.25C22.0071 15.5453 21.9491 15.8378 21.8362 16.1107C21.7233 16.3836 21.5577 16.6316 21.349 16.8406C21.1402 17.0495 20.8924 17.2153 20.6196 17.3284C20.3468 17.4416 20.0543 17.4999 19.759 17.5H18ZM15.75 13.5H8.25C8.05109 13.5 7.86032 13.579 7.71967 13.7197C7.57902 13.8603 7.5 14.0511 7.5 14.25V18.75C7.5 19.164 7.836 19.5 8.25 19.5H15.75C15.9489 19.5 16.1397 19.421 16.2803 19.2803C16.421 19.1397 16.5 18.9489 16.5 18.75V14.25C16.5 14.0511 16.421 13.8603 16.2803 13.7197C16.1397 13.579 15.9489 13.5 15.75 13.5ZM15.752 4.5H8.25C8.05109 4.5 7.86032 4.57902 7.71967 4.71967C7.57902 4.86032 7.5 5.05109 7.5 5.25L7.499 6.003H16.502V5.25C16.502 5.05109 16.423 4.86032 16.2823 4.71967C16.1417 4.57902 15.9509 4.5 15.752 4.5Z" fill="black" fill-opacity="0.87"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="container">
                    <div class="textFieldContainer">
                        <input type="search" name="searchNews" id="search-news" placeholder="Search">
                        <label class="icon" for="search-news">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5001 13.9999H14.7101L14.4301 13.7299C15.6301 12.3299 16.2501 10.4199 15.9101 8.38989C15.4401 5.60989 13.1201 3.38989 10.3201 3.04989C6.09014 2.52989 2.53014 6.08989 3.05014 10.3199C3.39014 13.1199 5.61014 15.4399 8.39014 15.9099C10.4201 16.2499 12.3301 15.6299 13.7301 14.4299L14.0001 14.7099V15.4999L18.2501 19.7499C18.6601 20.1599 19.3301 20.1599 19.7401 19.7499C20.1501 19.3399 20.1501 18.6699 19.7401 18.2599L15.5001 13.9999ZM9.50014 13.9999C7.01014 13.9999 5.00014 11.9899 5.00014 9.49989C5.00014 7.00989 7.01014 4.99989 9.50014 4.99989C11.9901 4.99989 14.0001 7.00989 14.0001 9.49989C14.0001 11.9899 11.9901 13.9999 9.50014 13.9999Z" fill="black" fill-opacity="0.6"/>
                            </svg>
                        </label>
                    </div>
                </div>
            </section>
            <section class="mainContent">
                <form action="" class="table-form">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Course</th>
                            <th>Batch</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(count($data['alumni']) > 0) :?>
                    <?php foreach($data['alumni'] as $alumni):?>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td><p class="studentID"><?php echo $alumni->student_no?></p></td>
                                <td><p class="studentName"><?php echo $alumni->first_name  . ' ' . substr($alumni->middle_name,0,1).'.' . ' ' . $alumni->last_name?></p></td>
                                <td><p class="studentEmail"><?php echo $alumni->email ?></p></td>
                                <td><p class="gender"><?php echo $alumni->gender ?></p></td>
                                <td><p class="course"><?php echo $alumni->dept_code?></p></td>
                                <td><p class="batch"><?php echo $alumni->year?></p></td>
                                <td><div class="option" tabindex="0">
                                    <span class="optionSpan icon">&#8942</span>
                                    <div class="optionModal">
                                        <a href="#">View</a>
                                        <a href="<?php echo URLROOT;?>/alumni/edit/<?php echo $alumni->alumni_id?>">
                                            <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.8233 1.67676L18.3233 4.17676L16.4175 6.08342L13.9175 3.58342L15.8233 1.67676Z" fill="black" fill-opacity="0.87"/>
                                                <path d="M6.6665 13.3332H9.1665L15.239 7.26074L12.739 4.76074L6.6665 10.8332V13.3332Z" fill="black" fill-opacity="0.87"/>
                                                <path d="M15.8333 15.8333H6.79833C6.77667 15.8333 6.75417 15.8417 6.7325 15.8417C6.705 15.8417 6.6775 15.8342 6.64917 15.8333H4.16667V4.16667H9.8725L11.5392 2.5H4.16667C3.2475 2.5 2.5 3.24667 2.5 4.16667V15.8333C2.5 16.7533 3.2475 17.5 4.16667 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0118C17.3244 16.6993 17.5 16.2754 17.5 15.8333V8.61L15.8333 10.2767V15.8333Z" fill="black" fill-opacity="0.87"/>
                                            </svg>
                                        </a>
                                        
                                        <button class="btnDeleteInline">
                                            <svg viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.75 1.875H2.25C1.62868 1.875 1.125 2.43464 1.125 3.125V3.75C1.125 4.44036 1.62868 5 2.25 5H15.75C16.3713 5 16.875 4.44036 16.875 3.75V3.125C16.875 2.43464 16.3713 1.875 15.75 1.875Z"/>
                                                <path d="M2.61724 6.25C2.57772 6.24977 2.53859 6.25879 2.50242 6.27648C2.46624 6.29417 2.43383 6.32014 2.40729 6.35268C2.38076 6.38523 2.36069 6.42362 2.34841 6.46536C2.33612 6.5071 2.33189 6.55125 2.33599 6.59493L3.26095 16.4606C3.26076 16.4634 3.26076 16.4663 3.26095 16.4691C3.30928 16.9255 3.50672 17.3462 3.81579 17.6514C4.12486 17.9567 4.52404 18.1252 4.93755 18.125H13.0618C13.4752 18.125 13.8742 17.9564 14.1831 17.6512C14.4921 17.3459 14.6894 16.9253 14.7377 16.4691V16.4609L15.6613 6.59493C15.6654 6.55125 15.6611 6.5071 15.6488 6.46536C15.6366 6.42362 15.6165 6.38523 15.59 6.35268C15.5634 6.32014 15.531 6.29417 15.4948 6.27648C15.4587 6.25879 15.4195 6.24977 15.38 6.25H2.61724ZM11.3662 13.3082C11.4197 13.3659 11.4623 13.4349 11.4916 13.5111C11.5209 13.5873 11.5362 13.6692 11.5367 13.752C11.5373 13.8349 11.523 13.917 11.4947 13.9937C11.4664 14.0703 11.4246 14.1399 11.3719 14.1985C11.3192 14.2571 11.2565 14.3034 11.1875 14.3348C11.1185 14.3662 11.0446 14.3821 10.97 14.3814C10.8955 14.3808 10.8217 14.3637 10.7532 14.3312C10.6846 14.2986 10.6226 14.2512 10.5706 14.1918L8.99986 12.4465L7.42872 14.1918C7.32275 14.3062 7.18051 14.3697 7.03276 14.3685C6.885 14.3674 6.74359 14.3016 6.63908 14.1856C6.53458 14.0695 6.47537 13.9124 6.47426 13.7482C6.47315 13.5841 6.53022 13.426 6.63314 13.3082L8.20427 11.5625L6.63314 9.8168C6.53022 9.699 6.47315 9.54093 6.47426 9.37676C6.47537 9.21259 6.53458 9.05549 6.63908 8.93942C6.74359 8.82336 6.885 8.75764 7.03276 8.75648C7.18051 8.75532 7.32275 8.8188 7.42872 8.93321L8.99986 10.6785L10.5706 8.93321C10.6766 8.8188 10.8188 8.75532 10.9666 8.75648C11.1144 8.75764 11.2558 8.82336 11.3603 8.93942C11.4648 9.05549 11.524 9.21259 11.5251 9.37676C11.5262 9.54093 11.4691 9.699 11.3662 9.8168L9.79509 11.5625L11.3662 13.3082Z"/>
                                            </svg>
                                        </button>
                                    
                                    </div>
                                </div></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </tbody>
                </table>
                
                <div class="pagination">
                    <button class="selectAll">Select All</button>
                    <button class="deleteSelected"><svg viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.75 1.875H2.25C1.62868 1.875 1.125 2.43464 1.125 3.125V3.75C1.125 4.44036 1.62868 5 2.25 5H15.75C16.3713 5 16.875 4.44036 16.875 3.75V3.125C16.875 2.43464 16.3713 1.875 15.75 1.875Z"/>
                        <path d="M2.61724 6.25C2.57772 6.24977 2.53859 6.25879 2.50242 6.27648C2.46624 6.29417 2.43383 6.32014 2.40729 6.35268C2.38076 6.38523 2.36069 6.42362 2.34841 6.46536C2.33612 6.5071 2.33189 6.55125 2.33599 6.59493L3.26095 16.4606C3.26076 16.4634 3.26076 16.4663 3.26095 16.4691C3.30928 16.9255 3.50672 17.3462 3.81579 17.6514C4.12486 17.9567 4.52404 18.1252 4.93755 18.125H13.0618C13.4752 18.125 13.8742 17.9564 14.1831 17.6512C14.4921 17.3459 14.6894 16.9253 14.7377 16.4691V16.4609L15.6613 6.59493C15.6654 6.55125 15.6611 6.5071 15.6488 6.46536C15.6366 6.42362 15.6165 6.38523 15.59 6.35268C15.5634 6.32014 15.531 6.29417 15.4948 6.27648C15.4587 6.25879 15.4195 6.24977 15.38 6.25H2.61724ZM11.3662 13.3082C11.4197 13.3659 11.4623 13.4349 11.4916 13.5111C11.5209 13.5873 11.5362 13.6692 11.5367 13.752C11.5373 13.8349 11.523 13.917 11.4947 13.9937C11.4664 14.0703 11.4246 14.1399 11.3719 14.1985C11.3192 14.2571 11.2565 14.3034 11.1875 14.3348C11.1185 14.3662 11.0446 14.3821 10.97 14.3814C10.8955 14.3808 10.8217 14.3637 10.7532 14.3312C10.6846 14.2986 10.6226 14.2512 10.5706 14.1918L8.99986 12.4465L7.42872 14.1918C7.32275 14.3062 7.18051 14.3697 7.03276 14.3685C6.885 14.3674 6.74359 14.3016 6.63908 14.1856C6.53458 14.0695 6.47537 13.9124 6.47426 13.7482C6.47315 13.5841 6.53022 13.426 6.63314 13.3082L8.20427 11.5625L6.63314 9.8168C6.53022 9.699 6.47315 9.54093 6.47426 9.37676C6.47537 9.21259 6.53458 9.05549 6.63908 8.93942C6.74359 8.82336 6.885 8.75764 7.03276 8.75648C7.18051 8.75532 7.32275 8.8188 7.42872 8.93321L8.99986 10.6785L10.5706 8.93321C10.6766 8.8188 10.8188 8.75532 10.9666 8.75648C11.1144 8.75764 11.2558 8.82336 11.3603 8.93942C11.4648 9.05549 11.524 9.21259 11.5251 9.37676C11.5262 9.54093 11.4691 9.699 11.3662 9.8168L9.79509 11.5625L11.3662 13.3082Z"/>
                        </svg>
                        </button>
                    <span class="currentRows">1-20 of 120</span>
                    <button class="start">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 3C5.75507 3.00003 5.51866 3.08996 5.33563 3.25272C5.15259 3.41547 5.03566 3.63975 5.007 3.883L5 4V20C5.00028 20.2549 5.09788 20.5 5.27285 20.6854C5.44782 20.8707 5.68695 20.9822 5.94139 20.9972C6.19584 21.0121 6.44638 20.9293 6.64183 20.7657C6.83729 20.6021 6.9629 20.3701 6.993 20.117L7 20V4C7 3.73478 6.89464 3.48043 6.70711 3.29289C6.51957 3.10536 6.26522 3 6 3ZM18.707 3.293C18.5348 3.12082 18.3057 3.01739 18.0627 3.00211C17.8197 2.98683 17.5794 3.06075 17.387 3.21L17.293 3.293L9.293 11.293C9.12082 11.4652 9.01739 11.6943 9.00211 11.9373C8.98683 12.1803 9.06075 12.4206 9.21 12.613L9.293 12.707L17.293 20.707C17.473 20.8863 17.7144 20.9905 17.9684 20.9982C18.2223 21.006 18.4697 20.9168 18.6603 20.7488C18.8508 20.5807 18.9703 20.3464 18.9944 20.0935C19.0185 19.8406 18.9454 19.588 18.79 19.387L18.707 19.293L11.414 12L18.707 4.707C18.8945 4.51947 18.9998 4.26516 18.9998 4C18.9998 3.73484 18.8945 3.48053 18.707 3.293Z" fill="black" fill-opacity="0.87"/>
                        </svg>
                    </button>
                    <button class="previous">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.0625 3.00197C16.3056 3.01725 16.5347 3.12068 16.7069 3.29286C16.8943 3.48039 16.9996 3.7347 16.9996 3.99986C16.9996 4.26503 16.8943 4.51933 16.7069 4.70686L9.41386 11.9999L16.7069 19.2929L16.7899 19.3869C16.9453 19.5879 17.0184 19.8405 16.9943 20.0934C16.9702 20.3463 16.8507 20.5806 16.6601 20.7486C16.4696 20.9166 16.2222 21.0058 15.9682 20.9981C15.7143 20.9903 15.4728 20.8862 15.2929 20.7069L7.29286 12.7069L7.20986 12.6129C7.06061 12.4205 6.98669 12.1802 7.00197 11.9372C7.01725 11.6942 7.12068 11.4651 7.29286 11.2929L15.2929 3.29286L15.3869 3.20986C15.5793 3.06061 15.8195 2.98669 16.0625 3.00197Z" fill="black" fill-opacity="0.87"/>
                        </svg> 
                    </button>
                    <button class="next">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.29279 3.29311C7.46498 3.12093 7.69408 3.0175 7.93711 3.00222C8.18013 2.98694 8.42038 3.06085 8.61279 3.21011L8.70679 3.29311L16.7068 11.2931C16.879 11.4653 16.9824 11.6944 16.9977 11.9374C17.013 12.1805 16.939 12.4207 16.7898 12.6131L16.7068 12.7071L8.70679 20.7071C8.52683 20.8865 8.28535 20.9906 8.0314 20.9983C7.77745 21.0061 7.53007 20.9169 7.33951 20.7489C7.14894 20.5808 7.02948 20.3466 7.00539 20.0936C6.98129 19.8407 7.05437 19.5881 7.20979 19.3871L7.29279 19.2931L14.5858 12.0001L7.29279 4.70711C7.10532 4.51958 7 4.26527 7 4.00011C7 3.73494 7.10532 3.48063 7.29279 3.29311Z" fill="black" fill-opacity="0.87"/>
                        </svg>
                    </button>
                    <button class="end">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 3C18.245 3.00003 18.4814 3.08996 18.6644 3.25272C18.8474 3.41547 18.9644 3.63975 18.993 3.883L19 4V20C18.9997 20.2549 18.9022 20.5 18.7272 20.6854C18.5522 20.8707 18.3131 20.9822 18.0586 20.9972C17.8042 21.0121 17.5537 20.9293 17.3582 20.7657C17.1627 20.6021 17.0371 20.3701 17.007 20.117L17 20V4C17 3.73478 17.1054 3.48043 17.2929 3.29289C17.4805 3.10536 17.7348 3 18 3ZM5.29303 3.293C5.46522 3.12082 5.69432 3.01739 5.93735 3.00211C6.18038 2.98683 6.42063 3.06075 6.61303 3.21L6.70703 3.293L14.707 11.293C14.8792 11.4652 14.9826 11.6943 14.9979 11.9373C15.0132 12.1803 14.9393 12.4206 14.79 12.613L14.707 12.707L6.70703 20.707C6.52707 20.8863 6.2856 20.9905 6.03165 20.9982C5.7777 21.006 5.53032 20.9168 5.33975 20.7488C5.14919 20.5807 5.02973 20.3464 5.00563 20.0935C4.98154 19.8406 5.05462 19.588 5.21003 19.387L5.29303 19.293L12.586 12L5.29303 4.707C5.10556 4.51947 5.00024 4.26516 5.00024 4C5.00024 3.73484 5.10556 3.48053 5.29303 3.293Z" fill="black" fill-opacity="0.87"/>
                        </svg>
                    </button>
                </div>
                </form>
            </section>
        </main>
    </div>
</div>


<div class="modalContainer">
        <div class="modalPreview">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Batch</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(count($data['alumniList'])):?>
                    <?php foreach($data['alumniList'] as $alumni): ?>
                        <tr>
                            <td><p class="studentID"><?php echo $alumni[0]?></p></td>
                            <td><p class="studentName"><?php echo $alumni[2] . ' '. substr($alumni[3],0,1) . '.' . ' ' . $alumni[1] ?></p></td>
                            <td><p class="studentEmail"><?php echo $alumni[5]?></p></td>
                            <td><p class="gender"><?php echo $alumni[4]?></p></td>
                            <td><p class="course"><?php echo $alumni[8]?></p></td>
                            <td><p class="batch"><?php echo $alumni[9]?></p></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif;?>
                </tbody>
            </table>
            
            <div class="pagination">
                <h3>Import Review</h3>
                <div class="fileNameCon">
                    <span>From:</span>
                    <span class="filename">
                        <?php if(!empty($data['fileName'])): echo $data['fileName'] ?>
                        <?php endif;?>
                    </span>
                </div>
                <div class="btnContainer">
                    <button class="cancel" id="cancelModal">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4086 8.99915L14.7045 4.71268C14.8926 4.52453 14.9983 4.26935 14.9983 4.00326C14.9983 3.73718 14.8926 3.482 14.7045 3.29385C14.5164 3.1057 14.2612 3 13.9952 3C13.7291 3 13.474 3.1057 13.2859 3.29385L9 7.59031L4.71414 3.29385C4.52602 3.1057 4.27087 3 4.00483 3C3.73878 3 3.48363 3.1057 3.29551 3.29385C3.10739 3.482 3.0017 3.73718 3.0017 4.00326C3.0017 4.26935 3.10739 4.52453 3.29551 4.71268L7.59136 8.99915L3.29551 13.2856C3.20187 13.3785 3.12755 13.489 3.07683 13.6108C3.02611 13.7325 3 13.8631 3 13.995C3 14.1269 3.02611 14.2575 3.07683 14.3793C3.12755 14.501 3.20187 14.6116 3.29551 14.7044C3.38839 14.7981 3.49888 14.8724 3.62062 14.9232C3.74236 14.9739 3.87294 15 4.00483 15C4.13671 15 4.26729 14.9739 4.38903 14.9232C4.51077 14.8724 4.62127 14.7981 4.71414 14.7044L9 10.408L13.2859 14.7044C13.3787 14.7981 13.4892 14.8724 13.611 14.9232C13.7327 14.9739 13.8633 15 13.9952 15C14.1271 15 14.2576 14.9739 14.3794 14.9232C14.5011 14.8724 14.6116 14.7981 14.7045 14.7044C14.7981 14.6116 14.8724 14.501 14.9232 14.3793C14.9739 14.2575 15 14.1269 15 13.995C15 13.8631 14.9739 13.7325 14.9232 13.6108C14.8724 13.489 14.7981 13.3785 14.7045 13.2856L10.4086 8.99915Z"/>
                        </svg>
                        Cancel
                    </button>
                    <button class="upload" form="hidden-form-id">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 11.25V13.5H4.5V11.25H3V13.5C3 14.325 3.675 15 4.5 15H13.5C14.325 15 15 14.325 15 13.5V11.25H13.5ZM5.25 6.75L6.3075 7.8075L8.25 5.8725V12H9.75V5.8725L11.6925 7.8075L12.75 6.75L9 3L5.25 6.75Z"/>
                        </svg>
                        Upload
                    </button>
                </div>
            </div>
        </div>

        <form action="<?php echo URLROOT;?>/alumni/addBulk" class="hidden-form" id="hidden-form-id" method="POST">
                <?php if(!empty($data['alumniList'])):?>
                <?php foreach($data['alumniList'] as $key => $value){?>
                        <input type="hidden" name="alumni[<?php echo $key?>][student_no]" value="<?php echo $value[0]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][last_name]" value="<?php echo $value[1]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][first_name]" value="<?php echo $value[2]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][middle_name]" value="<?php echo $value[3]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][gender]" value="<?php echo $value[4]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][email]" value="<?php echo $value[5]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][contact_no]" value="<?php echo $value[6]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][employment]" value="<?php echo $value[7]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][department]" value="<?php echo $value[8]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][batch]" value="<?php echo $value[9]?>">
                <?php }?>
                <?php endif; ?>
        </form>
    </div>
    <input type="hidden" value="<?php echo $data['isPreview']?>" id="isPreview">
    
<script>
    document.addEventListener("DOMContentLoaded", function(){
        let isPrev = document.getElementById('isPreview').value;
        const alumniModal = document.querySelector('.modalContainer');
        const cancelModal = document.getElementById('cancelModal');
        if(isPrev == 1){
            console.log('hey');
            alumniModal.classList.add('show');
        }
        
        cancelModal.addEventListener('click', function(){
            isPrev = 0;
            console.log(isPrev);
            <?php if(!empty($url[2])):?>
            window.location.replace('<?php echo URLROOT;?>/alumni/show/<?php echo $url[2]?>/<?php echo $url[3]?>')
            <?php else: ?>
            window.location.replace('<?php echo URLROOT;?>/admin/alumni');
            
            <?php endif; ?>
        })


    })
</script>
<?php require APPROOT . '/views/inc/footer.php';?>