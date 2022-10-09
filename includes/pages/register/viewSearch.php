<?php
$title = 'View Detail';
if(!isset($_GET['name'])){
    echo "<h1 class='text-danger text-center mt-5'>Name not found</h1>";
    
} 
else {
    $name = $_GET['name'];
    $result = $crud->getRegisterSearch($name);
    if($result['first_name'] != '') {
?>

<div class='container mt-5'>
    <img src="<?php echo empty($result["profile"]) ? "./assets/uploads/avatar.png" : "./assets/uploads/".$result['profile'];  ?>" class="rounded-circle" style="width:10%; height:10%" />

    <h2><?php echo $title.' '.$result['first_name']; ?></h2>
    
    <div class="card" style="width:60%">
        <div class="card-body">
            <h5 class='card-title'>
                <?php echo $result['first_name'].' '.$result['last_name']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name_specialist']; ?>
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

            <a href="?page=viewRegister">
                <button type='button' class='btn btn-info'>Back</button>
            </a>
        </div>
    </div>
</div>

<?php } 
    else {
        echo "<h3 class='text-center mt-5 text-danger'> $name not found in our database </h3>";
    }
    
} ?>