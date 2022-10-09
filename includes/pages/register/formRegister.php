<?php
$results = $crud->getSpecialist();
?>
<h1 class="text-center">Registration</h1>

<form id='formSubmit' class="m-5" method="post" action="?page=submitRegister" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">
    </div>

    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
            <label class="form-check-label" for="male">
            <input class="form-check-input" type="radio" value='male' name="gender" id="gender">
                Male
            </label>
            <label class="form-check-label" for="female">
            <input class="form-check-input" value="female" type="radio" name="gender" id="gender">
            
                Female
        </label>
        <span id="errorRadio"></span>
        
    </div>

    <div class="mb-3">
        <label for="dateBirt" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="datepicker" placeholder="Date of Birth" name="date">
    </div>

    <div class="mb-3">
        <label for="specialist" class="form-label">Specialist</label>
        <select class="form-select" aria-label="Default select example" id="specialist" name="specialist">
            <option selected>Choose your specialist</option>
            <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name_specialist']; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="emailAddress" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="mb-3">
        <label for="contactNumber" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="phoneNumber" maxlength="12">
        <small id="helpNumber" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descript yourself</label>
        <textarea class="form-control" id="aboutme" name="aboutme" rows="3" placeholder="Descript yourself"></textarea>
    </div>

    <div class="custom-file mb-3">
        <label for="contactNumber" class="form-label">Photo (Optional)</label>
        <input type="file" class="form-control" id="file" name="avatar">
    </div>

    <button type='submit' name='submit' class='btn btn-primary form-control'>Save</button>
</form>
