<?php
require_once('User.php');
require_once('mysqli_connect.php');
$query = "SELECT * FROM users WHERE id = 1";
$user = @mysqli_query($dbc, $query);

$query = "SELECT * FROM follows WHERE followerID = 1";
$following = @mysqli_query($dbc, $query);
// $profileUser = mysqli_fetch_array($user);

// $data = $profileUser;
// $formatted = json_encode($profileUser);
$arr = [];
while ($row = mysqli_fetch_assoc($user)) {
    $arr = [
    'name' => $row['name'], 'email' => $row['email'],
    'phone' => $row['phoneNumber'], 'dateOfBirth' => $row['dateOfBirth'],
    'bio' => $row['bio'], 'path' => $row['pfpPath']
    ];
}
$followArr = [];
while ($row = mysqli_fetch_assoc($following)) {
    $followArr[] = [
    'following' => $row['following'],
    ];
}
// $userobj = new User($arr['name'], $arr['email'], $arr['phoneNumber'], $arr['dateOfBirth'], $arr['bio'], $arr['path']);
?>

<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<body>
    <div class="card mx-auto col-6">
        <div class="card-header">
            <h5 class="card-title text-center">
                <b><?=$arr['name']?></b>
        
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div>
                        <img src="<? echo $arr['path'] . ".jpeg" ?>" width="150" height="150">
                    </div>
                    <br>
                    <div class="d-grid gap-2">
                        <div>
                            <form>
                                <input type="text" class="form-control" name="pfp" value="<?= $arr['path']?>">
                                <button action="profile.php?user_id=<?= $arr['id']?>" type="submit" class="btn btn-dark">Upload Picture</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"><b>Followers:</b></h6>
                        </div>
                        <div class="card-body">
                        <ul>
                            <?php
                            foreach ($followArr as $follow) {
                                echo "<li><a href='index.php'>" .$follow['following']. "</a></li>";
                            }
                            ?>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <form action="formHandler.php" method="POST">
                    
                        <b>Name: </b><input name="name" type="text" class="form-control" value="<?= $arr['name'] ?>"> <br>

                        <b>Email: </b><input name="email" type="text" class="form-control" value="<?= $arr['email'] ?>"> <br>

                        <b>Phone No.: </b><input name="phone" type="text" class="form-control" value="<?= $arr['phone'] ?>"> <br>

                        <b>Date of Birth: </b><input name="dob" type="text" class="form-control" value="<?= $arr['dateOfBirth'] ?>"> <br>
                    
                        <b>Bio: </b><input name="bio" type="text" class="form-control" value="<?= $arr['bio'] ?>"> <br>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Update</button>
                       
                            <button class="btn btn-danger" type="submit">Delete Profile</button>
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>