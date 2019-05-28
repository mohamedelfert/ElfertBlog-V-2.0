<?php

require 'files/header.php';

if(login == 1){
    echo'
            <div class="error" style="float: right; width: 50%;">
                <strong>لا يمكنك الدخول الي هذه الصفحه :(</strong>
            </div>
        ';
    header('refresh:2;index.php');
}else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = filter_var($_POST['u_name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['u_email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['u_password'], FILTER_SANITIZE_STRING);
        $ErrorMsg = array();

        if (empty($username)) {

            $ErrorMsg[] = "من فضلك أدخل اسم المستخدم :(";

        } elseif (strlen($username) > 10) {

            $ErrorMsg[] = "يجب أن يكون اسم المستخدم أقل من 10 أحرف :(";

        } elseif (strlen($username) < 4) {

            $ErrorMsg[] = "يجب أن يكون اسم المستخدم أكبر من 3 أحرف :(";

        } elseif (empty($email)) {

            $ErrorMsg[] = "من فضلك اكتب البريد الالكتروني :(";

        } elseif (empty($password)) {

            $ErrorMsg[] = "يجب كتابه الباسوورد :(";

        } elseif (strlen($password) < 6) {

            $ErrorMsg[] = "يجب أن يكون الباسوورد أكبر من 5 أحرف :(";

        } elseif (strlen($password) > 15) {

            $ErrorMsg[] = "يجب أن يكون الباسوورد أقل من 15 حرف :(";

        } else {

            $stmnt = $conn->prepare("INSERT INTO users (u_name,u_email,u_password,u_level) VALUE ('$username','$email','$password','1')");
            $stmnt->execute();
            echo '
                <div class="success" style="float: right;">
                    <strong>تم التسجيل بنجاح يمكنك الأن الدخول :)</strong>
                </div>
            ';

            include 'files/block.php';
            include 'files/footer.php';
            exit();
        }

    }

    ?>

    <div style="float: right;">

        <?php
        if (isset($ErrorMsg)) {
            foreach ($ErrorMsg as $error) {
                echo ' 
                    <div class="error">
                        <strong>' . $error . '</strong>
                    </div>
                ';
            }
        }
        ?>

        <form action="" method="POST">
            <table width="130%">
                <tr>
                    <td>اسم العضويه</td>
                    <td><input style="border: 1px solid #CEC9C9; padding: 8px;" size="30" name="u_name" type="text">
                    </td>
                </tr>
                <tr>
                    <td>البريد الالكتروني</td>
                    <td><input style="border: 1px solid #CEC9C9; padding: 8px;" size="30" name="u_email" type="email">
                    </td>
                </tr>
                <tr>
                    <td>الباسوورد</td>
                    <td><input style="border: 1px solid #CEC9C9; padding: 8px;" size="30" name="u_password"
                               type="password"></td>
                </tr>
                <tr>
                    <td><input style="width: 60px;height: 30px;" name="signup" type="submit" value="تسجيل"></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
}
    include 'files/block.php';
    include 'files/footer.php';
?>