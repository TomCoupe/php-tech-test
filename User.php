<?php
class User {
    protected $name;
    protected $email;
    protected $phone;
    protected $dob;
    protected $bio;

    public function __construct($name, $email, $phone, $dob, $bio) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->dob = $dob;
        $this->bio = $bio;
    }

    public function updateUser() {


        echo $this->name . $this->email;
        // require_once('mysqli_connect.php');
        // $query = "UPDATE users SET 
        // name = `$this->name`,
        // email = `$this->email`, 
        // phoneNumber = `$this->phone`, 
        // dateOfBirth = `$this->dob`, 
        // bio = `$this->bio` WHERE users.id = 1;";
        // $result = mysqli_query($dbc, $query);

        $db_found = new mysqli('localhost', 'studentdb', 'secret123', 'Users', 3306);


        if ($db_found->connect_error) {
            die("Connection failed: " . $db_found->connect_error);
        } else {
            echo "SUCCESS";
        }

        $SQL = $db_found->prepare("UPDATE users SET name=?, email=?, phoneNumber=?, dateOfBirth=?, bio=?, pfpPath=? WHERE id=1");

        $SQL->bind_param('ssssss',$this->name, $this->email, $this->phone, $this->dob, $this->bio, $this->pfpPath);

        $SQL->execute();

        //this keeps returning false indicating the update fails to the database.
        $result = $SQL->get_result();

        var_dump($result);



        if($SQL){
            echo "Records were updated successfully.";
        } else {
            echo "ERROR: Could not able to execute $db_found. " . mysqli_error($SQL);
        }

        $SQL->close();

        // var_dump($result);

    }

    public function getUserByName($name) {
        require_once('mysqli_connect.php');
        $query = "SELECT * FROM users WHERE name = $name";
        $user = @mysqli_query($dbc, $query);
        return $user;
    }
}
?>