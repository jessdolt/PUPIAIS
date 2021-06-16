<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .dashboard-cont{
        width: 100vw;
        height: 100vh;
        background-color: lightgrey;
        display: flex;
        flex-direction: column;
    }
    .card{
        height: 80px;
        width: 500px;
        border: 1px solid black;
        padding: 20px;
        display:flex;
        justify-content: center;
        align-content:center;
    }
    .card-survey{
        height: 500px;
        width: 500px;
        border: 1px solid black;
        padding: 5px;
        text-align:left;
    }
</style>


<body>
<?php 
    $arr1 = $data['topic'];
    $arr2 = $data['comments'];
    $arr3 = $data['replies'];
    $arrMerged = array_merge($arr1,$arr2, $arr3);

    usort($arrMerged, function($a, $b) {
        return strtotime($b->rCreated_at) - strtotime($a->rCreated_at);
    });

    $forumArr = array();

    for($i = 0; $i < 4; $i++ ){
        array_push($forumArr, $arrMerged[$i]);
    } 

    array_print($forumArr);
   
    
?>
</body>


<script>


    showChart();
    function showChart(){
        const labels = [];
       
        const data = {
            labels: labels,
            datasets: [{
                //label: 'My First dataset',
                backgroundColor: [ 'rgb(243,152,152)', 'rgb(205,20,20)'],
                borderColor: ['rgb(243,152,152)','rgb(205,20,20)' ],
                hoverOffset: 10,
                data: [4,2]
            }]
        };

        const config = {
            type: 'pie',
            data,
            options: {
                
            }
        };

        var myChart = new Chart(
            document.getElementById('latestSurvey').getContext('2d'),
            config
        );
    }


</script>
</html>