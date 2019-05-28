            <div class="block">

                <?php

                if(login == 1){
                    echo'
                        <div class="titleblock">
                            <h3>معلومات العضو : '.uname.'</h3>
                        </div>
                        <div class="contblock">
                            <table width="100%">
                                <tr>
                                    <td>اسم العضويه :</td>
                                    <td>'.uname.'</td>
                                </tr>
                                <tr>
                                    <td>الايميل :</td>
                                    <td>'.uemail.'</td>
                                </tr>
                                <tr>
                                    <td>رقم العضويه :</td>
                                    <td>'.uid.'</td>
                                </tr>
                            </table>
                        </div>
                    ';
                }else{
                ?>
                    <div class="titleblock">
                        <h3>تسجيل الدخول</h3>
                    </div>
                    <div class="contblock">

                        <?php
                        if(isset($ErrorMsg)){
                            foreach($ErrorMsg as $error){
                                echo' 
                                    <div class="error">
                                        <strong>'. $error . '</strong>
                                    </div>
                                ';
                            }
                        }
                        if(isset($success)){
                            echo' 
                                <div class="successlogin">
                                    <strong>'. $success . '</strong>
                                </div>
                            ';
                        }
                        ?>

                        <form action="index.php" method="POST">
                            <table width="100%">
                                <tr>
                                    <td>اسم العضويه</td>
                                    <td><input style="border: 1px solid #CEC9C9; padding: 5px;" size="20" name="u_name" type="text"></td>
                                </tr>
                                <tr>
                                    <td>الباسوورد</td>
                                    <td><input style="border: 1px solid #CEC9C9; padding: 5px;" size="20" name="u_password" type="password"></td>
                                </tr>
                                <tr>
                                    <td><input style="width: 60px;height: 30px;" name="login" type="submit" value="دخول"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                <?php
                }
                ?>

                <div class="titleblock">
                    <h3>عنوان المقاله</h3>
                </div>
                <div class="contblock">محتوي القائمه الجانبيه</div>

            </div>
            <div class="clear"></div>