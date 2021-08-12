
<?php
require('User.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$bio = $_POST['bio'];

//check for empty values before db update
if($name == '' || $email == '' || $phone == '' || $dob == '' || $bio == '') {
    echo 'You cannot have a section set as empty';
    return;
}

//attempting to create a user object, and saving the details to the db through that obj.
$userobj = new User($name, $email, $phone, $dob, $bio);

$userobj->updateUser();
?>
