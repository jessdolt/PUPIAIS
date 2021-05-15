<?php require APPROOT . '/views/inc/header.php'; ?>
    
<main class="home">
        <section class="heroBox">
            <div class="container">
              <!--   <h1 class="heroBoxText">PUP Institute of Technology <br> Alumni Information System</h1> -->
                <h1>Welcome, <?php echo $_SESSION['name'] ?></h1>
            </div>
        </section>
    </main>

<?php require APPROOT . '/views/inc/footer.php'; ?>