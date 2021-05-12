<?php require APPROOT . '/views/inc/header.php'; ?>
    

    <h1><?php echo $data['title']?></h1>
    <div class="container">
        <a href="<?php echo URLROOT;?>/events" >Events</a>
        <a href="<?php echo URLROOT;?>/job_portals" >Job Portal</a>
        <a href="<?php echo URLROOT;?>/users" >Users</a>
        <a href="<?php echo URLROOT;?>/surveys" >Survey</a>
    </div>
    
<?php require APPROOT . '/views/inc/footer.php'; ?>