<?php

require 'files/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = filter_var($_POST['u_name'],FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['u_password'],FILTER_SANITIZE_STRING);
    $ErrorMsg = array();

    if(empty($username)){

        $ErrorMsg[] = "من فضلك أدخل اسم مستخدم :(";

    }elseif(empty($password)){

        $ErrorMsg[] = "من فضلك أدخل الباسوورد :(";

    }else{

        $stmnt = $conn->prepare("SELECT * FROM users WHERE u_name = :username and u_password = :password");
        $stmnt->bindParam(':username',$username,PDO::PARAM_STR);
        $stmnt->bindParam(':password',$password,PDO::PARAM_STR);
        $stmnt->execute();
        $row   = $stmnt->fetch(PDO::FETCH_OBJ);
        $count = $stmnt->rowCount();

        if ($count > 0) {

            setcookie("uid",$uid,time()+60*60*25);
            setcookie("login",1,time()+60*60*25);
            $success = 'تم الدخول بنجاح جاري تحويلك للصفحه الرئيسيه :)';
            header('refresh:3;index.php');


        } else{

            $ErrorMsg[] = "البيانات المدخله خاطئه :(";

        }

    }

}

?>
           
            <div class="rightcon">
               <div class="T_Info">
                    <div class="title">
                        <h3> عنوان المقاله</h3>
                    </div>
                    <div class="info">
                                بواسطه : mohamed elfert
                        التاريخ : 13/3/2017
                    </div>
                </div>
                <div class="P_C_more">
                    <div class="pic"><img src="images/header-face.jpg" alt="image"></div>
                    <div class="cont">
                        <p>
                            هفقره فقرهفقره فقره فقره فقره فقره فقره فقرهفقره ره فقره فقره فقره فقرهفقره فقره فقره فقرهفقرهفقره فقره فقره فقره فقره فقره فقره فقره فقره فقرهفقره فقره فقره فقره فقره فقره فقرهفقرهره فقره فقره 
                        </p>
                    </div>
                    <div class="more"><a href="#">اقرا المزيد</a></div>
                </div>
            </div>

<?php include 'files/block.php' ?>
<?php include 'files/footer.php' ?>

