function previewSurvey(){
    const addSurveyModal = document.querySelector('.addModalContainer');
    addSurveyModal.classList.add('show');

    const cancelSurveyModal = document.querySelector('.cancel');
    cancelSurveyModal.addEventListener('click', function(){
        addSurveyModal.classList.remove('show');
    })
}