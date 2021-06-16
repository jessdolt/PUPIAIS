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
    array_print($data);
    $arr1 = $data['topic'];
    $arr2 = $data['comments'];
    $arr3 = $data['replies'];

    if($arr2 != 0 && $arr3 != 0){
        echo 'all got entries';
        $arrMerged = array_merge($arr1,$arr2, $arr3);
    }
    else if ($arr2 != 0 && $arr3 == 0){
        echo 'only comments';
        $arrMerged = array_merge($arr1,$arr2);
    }
    else {
        echo 'only topic';
        $arrMerged = $arr1;
        

    }
        usort($arrMerged, function($a, $b) {
            return strtotime($b->rCreated_at) - strtotime($a->rCreated_at);
        });

        $forumArr = array();

        
        if(count($arrMerged) > 4){
            $arrMerged = limitArray($arrMerged);

        }
        
        for($i = 0; $i < count($arrMerged) ; $i++ ){
            array_push($forumArr, $arrMerged[$i]);
        } 
        array_print($forumArr);

    function limitArray($arr){
        $newArr = array();
        for($i = 0; $i < 4; $i++){
            array_push($newArr, $arr[$i]);
        }

        return $newArr;
    }
    // $arrMerged = array_merge($arr1,$arr2, $arr3);

    // usort($arrMerged, function($a, $b) {
    //     return strtotime($b->rCreated_at) - strtotime($a->rCreated_at);
    // });

    // $forumArr = array();

    // for($i = 0; $i < 4; $i++ ){
    //     array_push($forumArr, $arrMerged[$i]);
    // } 

    // array_print($forumArr);
   
    
?>
</body>


<script>


</script>
</html>