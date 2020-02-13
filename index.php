<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="./resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    session_start();
    if (!$_SESSION["loggedin"] === true) {
        header("location: login.php");
        exit;
    }
    $success = NULL;
    $success1 = NULL;
    require_once('./core/database.php');
    if (isset($_POST['submit'])) {
        $empid = $_POST['empid'];
        $names = $_POST['empname'];
        $dob = $_POST['empdob'];
        $nic = $_POST['empnic'];
        $contact = $_POST['empcon'];
        $sql = "INSERT INTO emp (empno, name, nic, contact, dob)
                VALUES ($empid,'$names','$nic', $contact, '$dob')";
        if (mysqli_query($conn, $sql)) {
            $success = '<div class="alert alert-primary" role="alert">Record Succesfully Added!</div>';
        } else {
            $success = '<div class="alert alert-danger" role="alert">Record Not Added!</div>';
        }
    }

    $select = "SELECT * FROM emp ORDER BY ind DESC LIMIT 10";
    $result = mysqli_query($conn, $select);

    if (isset($_POST['delete'])) {
        $deldt = $_POST['name3'];
        $delete = "DELETE FROM emp WHERE ind = $deldt ";
        if (mysqli_query($conn, $delete)) {
            $success1 = '<div class="alert alert-primary" role="alert">Record Succesfully Added!</div>';
        } else {
            $success1 = '<div class="alert alert-danger" role="alert">Record Not Added!</div>';
        }
    }
    ?>
    <div class="container"><br>
        <center>
            <h4>Employee Management</h4>
            <a href="./index.php">Employee Management</a> |
            <a href="./salary.php">Salary Management</a> |
            <a href="./logout.php">Logout</a>
        </center>
        <hr>
        <div class="row">
            <div class="col-4 mt-4">
                <form method="POST">
                    <?php echo $success; ?>
                    <div class="form-group">
                        <label for="">Employee Number :</label>
                        <input name="empid" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Name :</label>
                        <input name="empname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Date of birth :</label>
                        <input name="empdob" placeholder="YYYY/MM/DD" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">NIC No :</label>
                        <input name="empnic" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Contact No :</label>
                        <input name="empcon" class="form-control">
                    </div>
                    <di class="row">
                        <div class="col-6">
                            <button type="submit" name="submit" class="btn btn-success btn-block">Add Employee</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Clear Data</button>
                        </div>
                    </di>
                </form>
            </div>
            <div class="col-8 mt-4">
                <?php echo $success1; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">NIC</th>
                            <th scope="col">Contact No</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <th><?php echo $row['empno'] ?></th>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['dob'] ?></td>
                                <td><?php echo $row['nic'] ?></td>
                                <td><?php echo $row['contact'] ?></td>
                                <form method="post">
                                    <td>
                                        <button name="delete" type="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                    <td><input type="hidden" name="name3" value="<?php echo $row['ind']; ?>"></td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>