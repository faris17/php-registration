<?php
$title = 'View Edit';
if(!isset($_GET['id'])){
    echo "<h1 class='text-danger text-center mt-5'>Details not found</h1>";
} 
else {
    $id = $_GET['id'];
    $result = $crud->getRegisterDetail($id);
    $specialist = $crud->getSpecialist();
?>
<h1 class="text-center"><?php echo $title; ?></h1>

<form id='formSubmit' class="m-5" method="post" action="?page=submitRegister">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="<?php echo $result['first_name']; ?>">
    </div>

    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="<?php echo $result['last_name']; ?>">
    </div>

    <div class="mb-3">
        <label for="lastName" class="form-label">Gender</label>
            <label class="form-check-label" for="male">
            <input class="form-check-input" type="radio" value='male' name="gender" id="gender" <?php if($result['gender']=='male') echo "checked='checked'";?>>
                Male
            </label>
            <label class="form-check-label" for="female">
            <input class="form-check-input" value="female" type="radio" name="gender" id="gender" <?php if($result['gender']=='female') echo "checked='checked'";?>>
            
                Female
        </label>
        <span id="errorRadio"></span>
        
    </div>

    <div class="mb-3">
        <label for="dateBirt" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="datepicker" placeholder="Date of Birth" name="date" value="<?php echo date('d-m-Y', strtotime($result['birth'])) ;?>">
    </div>

    <div class="mb-3">
        <label for="specialist" class="form-label">Specialist</label>
        <select class="form-select" aria-label="Default select example" id="specialist" name="specialist">
            <option selected>Choose your specialist</option>
            <?php while($row = $specialist->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $row['id'];?>" 
            <?php if($result['specialist_id']== $row['id']) echo "selected='selected'"; ?>
            ><?php echo $row['name_specialist']; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="emailAddress" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?php echo $result['email'];?>">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="mb-3">
        <label for="contactNumber" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="phoneNumber" value="<?php echo $result['contactNumber']; ?>">
        <small id="helpNumber" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descript yourself</label>
        <textarea class="form-control" id="aboutme" name="aboutme" rows="3" placeholder="Descript yourself"><?php echo $result['aboutme']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="contactNumber" class="form-label">Photo</label>
        <input type="file" class="form-control" id="file" name="file">
    </div>
    <input type="hidden" name="idbiodata" value="<?php echo $result['id']; ?>" />
    <button type='submit' name='update' value="update" class='btn btn-primary form-control'>Update</button>
</form>

<?php } ?>