<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="alumni alumniNews">
        <section class="heroBox">
            <div class="tint">
                <div class="container">
                    <h1 class="heroBoxText">University News and Articles</h1>
                    <div class="textFieldContainer">
                        <input type="search" name="searchNews" id="search-news" placeholder="Search">
                        <label class="icon" for="search-news">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5001 13.9999H14.7101L14.4301 13.7299C15.6301 12.3299 16.2501 10.4199 15.9101 8.38989C15.4401 5.60989 13.1201 3.38989 10.3201 3.04989C6.09014 2.52989 2.53014 6.08989 3.05014 10.3199C3.39014 13.1199 5.61014 15.4399 8.39014 15.9099C10.4201 16.2499 12.3301 15.6299 13.7301 14.4299L14.0001 14.7099V15.4999L18.2501 19.7499C18.6601 20.1599 19.3301 20.1599 19.7401 19.7499C20.1501 19.3399 20.1501 18.6699 19.7401 18.2599L15.5001 13.9999ZM9.50014 13.9999C7.01014 13.9999 5.00014 11.9899 5.00014 9.49989C5.00014 7.00989 7.01014 4.99989 9.50014 4.99989C11.9901 4.99989 14.0001 7.00989 14.0001 9.49989C14.0001 11.9899 11.9901 13.9999 9.50014 13.9999Z" fill="black" fill-opacity="0.6"/>
                            </svg>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section class="mainContent">
            <div class="container newsCon">
                <h3>
                    Latest News and Articles
                </h3>
                <?php foreach($data['latestNews'] as $news) : ?>
                <article class="card news">
                    <img class="card-img" src="<?php echo URLROOT; ?>/uploads/<?php echo($news->image); ?>" alt=" ">
                    <div class="card-body">
                        <h3><?php echo($news->title) ?></h3>
                        <div class="caption">
                            <span class="author"><?php echo($news->author) ?></span>
                            <span class="date-posted">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.75 14.3572V3.85718C15.75 3.02993 15.0773 2.35718 14.25 2.35718H12.75V0.857178H11.25V2.35718H6.75V0.857178H5.25V2.35718H3.75C2.92275 2.35718 2.25 3.02993 2.25 3.85718V14.3572C2.25 15.1844 2.92275 15.8572 3.75 15.8572H14.25C15.0773 15.8572 15.75 15.1844 15.75 14.3572ZM6.75 12.8572H5.25V11.3572H6.75V12.8572ZM6.75 9.85718H5.25V8.35718H6.75V9.85718ZM9.75 12.8572H8.25V11.3572H9.75V12.8572ZM9.75 9.85718H8.25V8.35718H9.75V9.85718ZM12.75 12.8572H11.25V11.3572H12.75V12.8572ZM12.75 9.85718H11.25V8.35718H12.75V9.85718ZM14.25 6.10718H3.75V4.60718H14.25V6.10718Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                                Posted <?php echo time_elapsed_string($news->created_at); ?>
                            </span>
                        </div>
                        <p class="description">
                        <?php 
                                $checkDescription = $news->description;
                                $description = strip_tags($checkDescription);    
                                $str = '';
                                    if(strlen($description) > 500) {
                                        $str = substr($description,0,499) . '..';
                                    } 
                                    else {
                                        $str = $description;
                                    }
                                        echo $str;                
                            ?>
                        </p>
                        <a href="newsView.html">Read more 
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.9688 12.125H14.1562C14.0485 12.125 13.9452 12.1678 13.869 12.244C13.7928 12.3202 13.75 12.4235 13.75 12.5312V15.375H5.625V7.25H9.28125C9.38899 7.25 9.49233 7.2072 9.56851 7.13101C9.6447 7.05483 9.6875 6.95149 9.6875 6.84375V6.03125C9.6875 5.92351 9.6447 5.82017 9.56851 5.74399C9.49233 5.6678 9.38899 5.625 9.28125 5.625H5.21875C4.89552 5.625 4.58552 5.7534 4.35696 5.98196C4.1284 6.21052 4 6.52052 4 6.84375V15.7812C4 16.1045 4.1284 16.4145 4.35696 16.643C4.58552 16.8716 4.89552 17 5.21875 17H14.1562C14.4795 17 14.7895 16.8716 15.018 16.643C15.2466 16.4145 15.375 16.1045 15.375 15.7812V12.5312C15.375 12.4235 15.3322 12.3202 15.256 12.244C15.1798 12.1678 15.0765 12.125 14.9688 12.125ZM16.3906 4H13.1406C12.598 4 12.3269 4.65787 12.709 5.04102L13.6162 5.94822L7.42773 12.1344C7.37092 12.191 7.32585 12.2583 7.29509 12.3323C7.26434 12.4064 7.2485 12.4858 7.2485 12.566C7.2485 12.6462 7.26434 12.7257 7.29509 12.7997C7.32585 12.8738 7.37092 12.9411 7.42773 12.9977L8.00334 13.5723C8.05995 13.6291 8.12722 13.6742 8.20129 13.7049C8.27536 13.7357 8.35478 13.7515 8.43498 13.7515C8.51518 13.7515 8.5946 13.7357 8.66867 13.7049C8.74274 13.6742 8.81001 13.6291 8.86662 13.5723L15.052 7.38508L15.959 8.29102C16.3398 8.67188 17 8.40527 17 7.85938V4.60938C17 4.44776 16.9358 4.29276 16.8215 4.17848C16.7072 4.0642 16.5522 4 16.3906 4V4Z" fill="#A63F3F"/>
                            </svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </section>
        <section id="redirect" class="moreContent">
            <div class="container additional">
                <h3>More News and Articles</h3>
                <ul>
                    <?php foreach($data['oldNews'] as $oldNews) : ?>
                        <li>
                            <a href="<?php echo URLROOT?>/pages/singleNews/"<?php echo $oldNews->id; ?>><?php echo $oldNews->title; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="pagination">
                    <span class="currentRows"><?php echo $data['start'] . '-' . $data['limit'] . ' of ' . $data['total']?></span>
                    <a href="<?php echo URLROOT; ?>/pages/news<?php echo $data['first'] ?>#redirect" class="start">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 3C5.75507 3.00003 5.51866 3.08996 5.33563 3.25272C5.15259 3.41547 5.03566 3.63975 5.007 3.883L5 4V20C5.00028 20.2549 5.09788 20.5 5.27285 20.6854C5.44782 20.8707 5.68695 20.9822 5.94139 20.9972C6.19584 21.0121 6.44638 20.9293 6.64183 20.7657C6.83729 20.6021 6.9629 20.3701 6.993 20.117L7 20V4C7 3.73478 6.89464 3.48043 6.70711 3.29289C6.51957 3.10536 6.26522 3 6 3ZM18.707 3.293C18.5348 3.12082 18.3057 3.01739 18.0627 3.00211C17.8197 2.98683 17.5794 3.06075 17.387 3.21L17.293 3.293L9.293 11.293C9.12082 11.4652 9.01739 11.6943 9.00211 11.9373C8.98683 12.1803 9.06075 12.4206 9.21 12.613L9.293 12.707L17.293 20.707C17.473 20.8863 17.7144 20.9905 17.9684 20.9982C18.2223 21.006 18.4697 20.9168 18.6603 20.7488C18.8508 20.5807 18.9703 20.3464 18.9944 20.0935C19.0185 19.8406 18.9454 19.588 18.79 19.387L18.707 19.293L11.414 12L18.707 4.707C18.8945 4.51947 18.9998 4.26516 18.9998 4C18.9998 3.73484 18.8945 3.48053 18.707 3.293Z"/>
                        </svg>
                    </a>
                    <a href="<?php echo URLROOT; ?>/pages/news<?php echo $data['previous'] ?>#redirect" class="previous">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.0625 3.00197C16.3056 3.01725 16.5347 3.12068 16.7069 3.29286C16.8943 3.48039 16.9996 3.7347 16.9996 3.99986C16.9996 4.26503 16.8943 4.51933 16.7069 4.70686L9.41386 11.9999L16.7069 19.2929L16.7899 19.3869C16.9453 19.5879 17.0184 19.8405 16.9943 20.0934C16.9702 20.3463 16.8507 20.5806 16.6601 20.7486C16.4696 20.9166 16.2222 21.0058 15.9682 20.9981C15.7143 20.9903 15.4728 20.8862 15.2929 20.7069L7.29286 12.7069L7.20986 12.6129C7.06061 12.4205 6.98669 12.1802 7.00197 11.9372C7.01725 11.6942 7.12068 11.4651 7.29286 11.2929L15.2929 3.29286L15.3869 3.20986C15.5793 3.06061 15.8195 2.98669 16.0625 3.00197Z"/>
                        </svg> 
                    </a>
                    <a href="<?php echo URLROOT; ?>/pages/news<?php echo $data['next'] ?>#redirect" class="next">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.29279 3.29311C7.46498 3.12093 7.69408 3.0175 7.93711 3.00222C8.18013 2.98694 8.42038 3.06085 8.61279 3.21011L8.70679 3.29311L16.7068 11.2931C16.879 11.4653 16.9824 11.6944 16.9977 11.9374C17.013 12.1805 16.939 12.4207 16.7898 12.6131L16.7068 12.7071L8.70679 20.7071C8.52683 20.8865 8.28535 20.9906 8.0314 20.9983C7.77745 21.0061 7.53007 20.9169 7.33951 20.7489C7.14894 20.5808 7.02948 20.3466 7.00539 20.0936C6.98129 19.8407 7.05437 19.5881 7.20979 19.3871L7.29279 19.2931L14.5858 12.0001L7.29279 4.70711C7.10532 4.51958 7 4.26527 7 4.00011C7 3.73494 7.10532 3.48063 7.29279 3.29311Z"/>
                        </svg>
                    </a>
                    <a href="<?php echo URLROOT; ?>/pages/news<?php echo $data['last'] ?>#redirect" class="end">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 3C18.245 3.00003 18.4814 3.08996 18.6644 3.25272C18.8474 3.41547 18.9644 3.63975 18.993 3.883L19 4V20C18.9997 20.2549 18.9022 20.5 18.7272 20.6854C18.5522 20.8707 18.3131 20.9822 18.0586 20.9972C17.8042 21.0121 17.5537 20.9293 17.3582 20.7657C17.1627 20.6021 17.0371 20.3701 17.007 20.117L17 20V4C17 3.73478 17.1054 3.48043 17.2929 3.29289C17.4805 3.10536 17.7348 3 18 3ZM5.29303 3.293C5.46522 3.12082 5.69432 3.01739 5.93735 3.00211C6.18038 2.98683 6.42063 3.06075 6.61303 3.21L6.70703 3.293L14.707 11.293C14.8792 11.4652 14.9826 11.6943 14.9979 11.9373C15.0132 12.1803 14.9393 12.4206 14.79 12.613L14.707 12.707L6.70703 20.707C6.52707 20.8863 6.2856 20.9905 6.03165 20.9982C5.7777 21.006 5.53032 20.9168 5.33975 20.7488C5.14919 20.5807 5.02973 20.3464 5.00563 20.0935C4.98154 19.8406 5.05462 19.588 5.21003 19.387L5.29303 19.293L12.586 12L5.29303 4.707C5.10556 4.51947 5.00024 4.26516 5.00024 4C5.00024 3.73484 5.10556 3.48053 5.29303 3.293Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>

<?php require APPROOT . '/views/inc/footer_u.php'; ?>