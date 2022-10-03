<?php
$title = 'View Detail';
if(!isset($_GET['id'])){
    echo "<h1 class='text-danger text-center mt-5'>Details not found</h1>";
    
} else {
    $id = $_GET['id'];
    $result = $crud->getRegisterDetail($id);
?>

<div class='container mt-5'>
    <h2><?php echo $title.' '.$result['first_name']; ?></h2>
    
    <div class="card" style="width:60%">
        <div class="card-body">
            <h5 class='card-title'>
                <?php echo $result['first_name'].' '.$result['last_name']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['first_name']; ?>
            </h6>
            <p class="card-text">
            Date Of Birth: <?php echo date('d/m/Y', strtotime($result['date'])); ?>
            </p>
            <p class="card-text">
            Email Address: <?php echo $result['email']; ?>
            </p>

            <p class="card-text">
            Contact Number: <?php echo $result['contactNumber']; ?>
            </p>

            <p class="card-text">
            About Me: <?php echo $result['aboutme']; ?>
            </p>

        </div>
    </div>
</div>

<?php } ?>