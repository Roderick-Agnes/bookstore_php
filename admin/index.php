<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <title>Login with admin account</title>

    <?php
    session_start();
    if (isset($_POST['txtusername'])) {
        require_once "../config/dbhelper.php";
        $username = $_POST['txtusername'];
        $password = $_POST['txtpassword'];

        $sql = "SELECT username, pass FROM tblusers WHERE username = '$username' AND pass = '$password'";
        $rs = executeResult($sql);
        if (count($rs) > 0) {
            $_SESSION['username'] = $username;
            header("Location:main.php");
        } else {
            echo "<script>alert('Username or password not exists');</script>";
        }
    }
    ?>

</head>

<body>

    <center>
        <form name='frmLogin' method='post'>
            <div class="panel panel-primary alert alert-info" style="width: 30%;margin-top:50px;">
                <div class="panel-heading alert alert-primary">
                    Login
                </div>
                <div>
                    <div>
                        <table class="table table-hover ">
                            <tbody>
                                <tr>
                                    <td>Account</td>
                                    <td>
                                        <input type="text" class="form-control" id="inputSuccess" name="txtusername" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>
                                        <input type="password" class="form-control" id="inputSuccess" name="txtpassword" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="checkLogin()">Login</button>
                                        &nbsp;&nbsp; <button type="reset" class="btn btn-warning">Reset</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </center>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>


    <script>
        function checkLogin() {
            if (document.frmLogin.txtusername.value == "") {
                alert("Please enter a username");
                document.frmLogin.txtusername.focus();
                return;
            }
            if (document.frmLogin.txtpassword.value == "") {
                alert("Please enter a password");
                document.frmLogin.txtpassword.focus();
                return;
            }
            document.frmLogin.submit();
        }
    </script>
</body>

</html>