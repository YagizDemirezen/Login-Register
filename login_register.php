<?php   
    include("server.php");

    if(isset($_POST["login_submit"])){
        $username_login = $_POST["username_login"];
        $password_login = $_POST["password_login"];

        $query_login = "SELECT * FROM kullanicilar WHERE kullanici_adi='$username_login' and kullanici_sifre='$password_login'";
        $executequery_login = mysqli_query($connection, $query_login);
        
        if(!empty($username_login) && !empty($password_login)){
            if($executequery_login && mysqli_num_rows($executequery_login) > 0){
                echo "
                    <script>
                        alert('Giriş Başarılı. Anasayfaya dönüyorsunuz.');
                    </script>
                ";
                session_start();
                $_SESSION['user'] = $username_login;
                header("refresh:1; url=login_register.php"); /*Anasayfa.html olarak değiştirilecek*/
            }
            else{
                echo "
                <script>
                    alert('Giriş Başarısız. Kullanıcı Adı veya Şifre yanlış.');
                </script>
            ";
            }
        }
        else{
            echo "
            <script>
                alert('Lütfen Kullanıcı Adınızı ve Şifrenizi Giriniz.');
            </script>
        ";
        }

    }
    
        if(isset($_POST["register_submit"])){
            $username_register = $_POST["username_register"];
            $email_register = $_POST["user_email_register"];
            $password_register = $_POST["password_register"];

            $query_register = "INSERT INTO kullanicilar (kullanici_adi,email,kullanici_sifre) VALUES ('$username_register','$email_register','$password_register')";
            $executequery_register = mysqli_query($connection, $query_register);
            if(!empty($username_register) && !empty($email_register) && !empty($password_register)){
                if($executequery_register){
                    echo "
                        <script>
                            alert('Kayıt İşlemini Başarı İle Gerçekleştirdiniz. Anasayfaya dönüyorsunuz.');
                        </script>
                    ";
                    session_start();
                    $_SESSION['user'] = $username_register;
                    header("refresh:1; url=login_register.php"); /*Anasayfa.html olarak değişecek.*/
                }
            }
            else{
                echo "
                    <script>
                        alert('Kayıt İşlemi Başarısız. Lütfen Sonra Yeniden Deneyiniz.');
                    </script>
                ";
            }
        }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Giriş Yap/Kayıt Ol</title>
        <link rel="icon" href="gorseller/trendol_icon.jpg">
        <link rel="stylesheet" href="login_register.css">
    </head>
    <body>
        <div class="main">
            <div class="formbox">
                <div class="buttonbox">
                    <div id="btn"></div>
                    <button  onclick="register_change()"type="button" class="btn">Giriş Yap</button>
                    <button  onclick="login_change()" type="button" class="btn">Kayıt Ol</button>
                </div>
                <div class="socials">
                    <dotlottie-player src="https://lottie.host/db7bb7ac-bbe5-49bb-9dd1-0483f1161c21/R0ryPZeL65.json" background="transparent" speed="1" style="width: 40px; height: 40px;" loop autoplay></dotlottie-player>
                    <dotlottie-player src="https://lottie.host/9e837224-dc34-470c-be25-8b3771b22b19/h1Yfd6d9j1.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></dotlottie-player>
                    <dotlottie-player src="https://lottie.host/5fc6604f-3027-45d0-84f9-b5890c29255c/3dexhjV7Gn.json" background="transparent" speed="1" style="width: 80px; height: 80px;" loop autoplay></dotlottie-player>
                    <a href="https://www.linkedin.com/in/yağız-demirezen-8642192b5/">
                        <dotlottie-player src="https://lottie.host/36803ffd-6794-4338-9817-4fb112bfa48c/zAerrcEw3g.json" background="transparent" speed="1" style="width: 70px; height: 70px;" loop autoplay></dotlottie-player>
                    </a>
                    <a href="https://github.com/YagizDemirezen">
                        <dotlottie-player src="https://lottie.host/aebad289-1908-4c55-9a0a-cbae7dacf9ac/tLYAql1k7L.json" background="transparent" speed="1" style="width: 50px; height: 50px;" loop autoplay></dotlottie-player>
                    </a>
                </div>
                <div>
                    <form id="id_login" class="inputs" action="login_register.php" method="POST">
                        <img src="gorseller/user.png" class="user">
                        <input class="input-area" type="text" placeholder="Kullanıcı Adı" required name="username_login">
                        <img src="gorseller/password.png" class="password" >
                        <input class="input-area" type="password" placeholder="Şifre" required name="password_login">
                        <a href="#" class="forgotpassword">Şifremi Unuttum</a>
                        <button type="submit" class="submitbutton" name="login_submit">Giriş Yap</button>
                    </form>

                    <form id="id_register" class="inputs" action="login_register.php" method="POST">
                        <img src="gorseller/user.png" class="user">
                        <input class="input-area" type="text" placeholder="Kullanıcı Adı" required name="username_register">
                        <img src="gorseller/email_f.png" class="email_f">
                        <input class="input-area" type="email" placeholder="E-Mail" required name="user_email_register">
                        <img src="gorseller/password.png" class="password2">
                        <input class="input-area" type="password" placeholder="Şifre" required name="password_register">
                        <button type="submit" class="submitbutton2" name="register_submit">Kayıt Ol</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
   
        <script>

            window.onload = function() {
            login_control.style.left = "10px";
            register_control.style.left = "-500px";
            }


            let login_control = document.getElementById("id_login");
            let register_control = document.getElementById("id_register");
            let button_control = document.getElementById("btn");

            function register_change(){ /*Giriş Yap*/
                login_control.style.left = "10px";
                register_control.style.left = "-450px";
                button_control.style.left = "0px";
            }

            function login_change(){ /*Kayıt Yap*/
                login_control.style.left = "-500px";
                register_control.style.left = "10px";
                button_control.style.left = "150px";
            }

        </script>

    </body>
</html>
