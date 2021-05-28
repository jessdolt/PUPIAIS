<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="alumni">
    
        <section class="heroBox">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
               
                <form action="" class="form">

                    <h1>PUP-Institute of Technology Survey</h1>
                    <p>Before you continue, we need you to partake in the following survey/s</p>
                    
                    <?php foreach($data['surveyList'] as $survey):?>
                        <?php if(!isset($data['answers'][$survey->id])):?>
                            <div class="questionCon surveyCard">
                                <div class="questionHeader">
                                    <h3><?php echo $survey->title?></h3>
                                </div>
                                <p class="description">
                                    <?php echo $survey->description?>
                                </p>
                                <a href="<?php echo URLROOT;?>/survey_widget/answer_survey/<?php echo $survey->id?>">Start</a>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>

                </form>
            </div>
            
        </section>
    </main>


<?php require APPROOT . '/views/inc/footer_u.php'; ?>