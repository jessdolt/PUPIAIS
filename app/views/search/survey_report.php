<?php if(!empty($data['activeSurvey'])):?>    
    <?php foreach($data['activeSurvey'] as $survey):?>
    <li class="survey-card">
    
        <a class="card-link" href="<?php echo ($survey->s_type=='built_in') ? URLROOT.'/survey_report/view_report/'.$survey->id : $survey->google_form_editor_link.'#responses'?>" <?php echo ($survey->s_type == 'google_form') ? "target='_blank'" : ''?>>View</a>
        <svg class="card-svg" viewBox="0 0 347 313" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M196 18.5L236.5 0H347V97.5L196 18.5Z"/>
            <path d="M236.5 0L69 76.5L0 36.0239V0H236.5Z"/>
            <path d="M69 76.5L0 108V36L69 76.5Z"/>
        </svg>
            
        <h3><?php echo $survey->title?></h3>
        <p>
            <?php echo $survey->description?>
        </p>
        <div class="survey-footer">
            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.0312 2.97827H8.96875C8.48449 2.97828 8.01723 3.1417 7.65629 3.43727C7.29535 3.73285 7.06606 4.13985 7.01225 4.58046H5.46875C4.94661 4.58046 4.44585 4.77036 4.07663 5.10838C3.70742 5.44641 3.5 5.90487 3.5 6.38291V17.1977C3.5 17.6757 3.70742 18.1342 4.07663 18.4722C4.44585 18.8102 4.94661 19.0001 5.46875 19.0001H15.5312C15.7898 19.0001 16.0458 18.9535 16.2847 18.8629C16.5235 18.7723 16.7406 18.6396 16.9234 18.4722C17.1062 18.3048 17.2512 18.1061 17.3501 17.8874C17.4491 17.6687 17.5 17.4344 17.5 17.1977V6.38291C17.5 6.14621 17.4491 5.91183 17.3501 5.69314C17.2512 5.47446 17.1062 5.27576 16.9234 5.10838C16.7406 4.94101 16.5235 4.80824 16.2847 4.71766C16.0458 4.62708 15.7898 4.58046 15.5312 4.58046H13.9878C13.9339 4.13985 13.7047 3.73285 13.3437 3.43727C12.9828 3.1417 12.5155 2.97828 12.0312 2.97827ZM8.96875 4.17991H12.0312C12.2053 4.17991 12.3722 4.24321 12.4953 4.35589C12.6184 4.46856 12.6875 4.62138 12.6875 4.78073C12.6875 4.94008 12.6184 5.0929 12.4953 5.20557C12.3722 5.31825 12.2053 5.38155 12.0312 5.38155H8.96875C8.7947 5.38155 8.62778 5.31825 8.50471 5.20557C8.38164 5.0929 8.3125 4.94008 8.3125 4.78073C8.3125 4.62138 8.38164 4.46856 8.50471 4.35589C8.62778 4.24321 8.7947 4.17991 8.96875 4.17991ZM10.9375 9.58728C10.9375 9.42793 11.0066 9.27511 11.1297 9.16244C11.2528 9.04976 11.4197 8.98646 11.5938 8.98646H14.6562C14.8303 8.98646 14.9972 9.04976 15.1203 9.16244C15.2434 9.27511 15.3125 9.42793 15.3125 9.58728C15.3125 9.74663 15.2434 9.89945 15.1203 10.0121C14.9972 10.1248 14.8303 10.1881 14.6562 10.1881H11.5938C11.4197 10.1881 11.2528 10.1248 11.1297 10.0121C11.0066 9.89945 10.9375 9.74663 10.9375 9.58728ZM11.5938 13.3925H14.6562C14.8303 13.3925 14.9972 13.4558 15.1203 13.5684C15.2434 13.6811 15.3125 13.8339 15.3125 13.9933C15.3125 14.1526 15.2434 14.3055 15.1203 14.4181C14.9972 14.5308 14.8303 14.5941 14.6562 14.5941H11.5938C11.4197 14.5941 11.2528 14.5308 11.1297 14.4181C11.0066 14.3055 10.9375 14.1526 10.9375 13.9933C10.9375 13.8339 11.0066 13.6811 11.1297 13.5684C11.2528 13.4558 11.4197 13.3925 11.5938 13.3925ZM9.4325 9.21077L7.6825 10.813C7.55945 10.9255 7.39266 10.9887 7.21875 10.9887C7.04484 10.9887 6.87805 10.9255 6.755 10.813L5.88 10.0119C5.81552 9.95685 5.76381 9.89052 5.72794 9.81682C5.69207 9.74312 5.67279 9.66356 5.67123 9.58289C5.66968 9.50222 5.68589 9.42209 5.71889 9.34728C5.7519 9.27246 5.80102 9.2045 5.86334 9.14745C5.92566 9.0904 5.99989 9.04542 6.0816 9.0152C6.16332 8.98498 6.25084 8.97014 6.33896 8.97157C6.42707 8.97299 6.51397 8.99065 6.59447 9.02349C6.67497 9.05633 6.74742 9.10367 6.8075 9.1627L7.21875 9.53922L8.505 8.36161C8.56508 8.30258 8.63753 8.25523 8.71803 8.2224C8.79853 8.18956 8.88543 8.1719 8.97354 8.17048C9.06166 8.16905 9.14918 8.18389 9.2309 8.21411C9.31261 8.24433 9.38684 8.28931 9.44916 8.34636C9.51147 8.40341 9.5606 8.47137 9.59361 8.54618C9.62661 8.621 9.64282 8.70113 9.64127 8.7818C9.63971 8.86247 9.62043 8.94203 9.58456 9.01573C9.54869 9.08943 9.49698 9.15576 9.4325 9.21077ZM9.4325 12.7676C9.55539 12.8803 9.62442 13.033 9.62442 13.1922C9.62442 13.3514 9.55539 13.5041 9.4325 13.6168L7.6825 15.219C7.55945 15.3315 7.39266 15.3947 7.21875 15.3947C7.04484 15.3947 6.87805 15.3315 6.755 15.219L5.88 14.4179C5.81552 14.3629 5.76381 14.2965 5.72794 14.2228C5.69207 14.1491 5.67279 14.0696 5.67123 13.9889C5.66968 13.9082 5.68589 13.8281 5.71889 13.7533C5.7519 13.6785 5.80102 13.6105 5.86334 13.5535C5.92566 13.4964 5.99989 13.4514 6.0816 13.4212C6.16332 13.391 6.25084 13.3762 6.33896 13.3776C6.42707 13.379 6.51397 13.3967 6.59447 13.4295C6.67497 13.4623 6.74742 13.5097 6.8075 13.5687L7.21875 13.9452L8.505 12.7676C8.62805 12.6551 8.79484 12.5919 8.96875 12.5919C9.14266 12.5919 9.30945 12.6551 9.4325 12.7676Z" fill="white"/>
            </svg>
            <p>Respondents: <span><?php echo $survey->respondents?></span></p>    
        </div>
    </li>
    <?php endforeach;?>
    <?php else:?>     
    <?php endif;?>

<script src="<?php echo URLROOT;?>/js/index.js" defer></script>