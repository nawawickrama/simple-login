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
    require_once('./core/database.php');
    $sele = "SELECT * FROM emp";
    $result = mysqli_query($conn, $sele);
    if (isset($_POST['submit'])) {
        $empid = $_POST['ayesh'];
        $names = $_POST['salary'];
        $sql = "INSERT INTO salary (empno,salary)
                VALUES ($empid,$names)";
        if (mysqli_query($conn, $sql)) {
            $success = '<div class="alert alert-primary" role="alert">Record Succesfully Added!</div>';
        } else {
            $success = '<div class="alert alert-danger" role="alert">Record Not Added!</div>';
        }
    }

    ?>
    <div class="container"><br>
        <center>
            <h4>Salary Management</h4>
            <a href="./index.php">Employee Management</a> |
            <a href="./salary.php">Salary Management</a> |
            <a href="./logout.php">Logout</a>
        </center>
        <hr>
        <div class="row">
            <div class="col-4 mt-4">
                <?php echo $success; ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Select The Employee :</label>
                        <select name="ayesh" id="" class="form-control">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['empno'] ?>"><?php echo $row['nic'] . '-' . $row['name']; ?></option>
                            <?php } ?>
                        </select>


                    </div>
                    <div class="form-group">
                        <label for="">Monthly Salary :</label>
                        <input type="number" name="salary" id="" class="form-control">
                    </div>
                    <di class="row">
                        <div class="col-6">
                            <button type="submit" name="submit" class="btn btn-success btn-block">Add Salary</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Clear Data</button>
                        </div>
                    </di>
                </form>
            </div>
            <div class="col-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Emp No</th>
                            <th scope="col">Salary(Monthly)</th>
                            <th scope="col">Salary(Anually)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $success1 = NUll;
                        $sele = "SELECT * FROM salary";
                        $result1 = mysqli_query($conn, $sele);

                        if (isset($_POST['delete'])) {
                            $deldt = $_POST['name3'];
                            $delete = "DELETE FROM salary WHERE indexno = $deldt ";
                            if (mysqli_query($conn, $delete)) {
                                $success1 = '<div class="alert alert-danger" role="alert">Record Succesfully Deleted!</div>';
                            } else {
                                $success1 = '<div class="alert alert-warning" role="alert">Record Not Deleted!</div>';
                            }
                        }


                        while ($row = mysqli_fetch_assoc($result1)) { ?>
                            <tr>
                                <th><?php echo $row['empno'] ?></th>
                                <td><?php echo 'රු ' . $row['salary'] ?></td>
                                <td><?php echo 'රු ' . $row['salary']*12 ?></td>
                                <form method="post">
                                    <td>
                                        <button name="delete" type="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                    <td><input type="hidden" name="name3" value="<?php echo $row['indexno']; ?>"></td>

                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo $success1; ?>
            </div>
        </div>
    </div>
</body>