<?php
require 'files/header.php';

if(login == 1){

    setcookie("uid","",time()+60*60*25);
    setcookie("login","",time()+60*60*25);

    echo '
        <div class="success" style="float: right;">
            <strong>تم تسجيل الخروج بنجاح :)</strong>
        </div>
    ';
    header('refresh:3;index.php');
}else{

    echo '
        <div class="error" style="float: right;width: 50%;">
            <strong>الصفحه المطلوبه غير موجوده :)</strong>
        </div>
    ';

}

include 'files/block.php';
include 'files/footer.php';
?>