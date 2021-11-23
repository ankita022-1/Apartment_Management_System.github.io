<?php
session_start();
if(!isset($_SESSION['adm_username'])){
    header('Location:login.php');
}
include '../connection.php';
include '../css/admin_style.css';
include '../links/admin_links.php';

?>
<style >
       *{
            margin: 0;
            padding: 0;
            box-sizing:border-box ;
        }
        .body{
            background-image: url('../css/bg_image/apt_bg3.jpeg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;

        }
        .bg_box{            
            width: 95vw;
            height: 95vh;
           display: flex;
           justify-content: center;
           align-items: center;
        }
        .bg_img{            
            background-color: black;
            border-radius: 20px;
            opacity: 0.8;            
            animation-name: img;
            animation-duration: 3s;
            animation-fill-mode: forwards;
            animation-timing-function: ease-out;
        }
        #t_form{
            position: relative;
            border: 2px solid black;
            /*width: 90%;*/
            display: flex;
            justify-content: center;
            align-items: center;
            top: 10px;
            right: 10px;
        }
        .t_form_btn{
            margin: 0px 2px;
        }
        #para{
            text-align: center;
            color: white;            
            font-weight: bold;
            margin: 5px;
        }
        @keyframes img{
            0%{
              font-size: 0rem;  
            }
            100%{
                font-size: 1.5rem;
            }
        }
</style>
<body class="vh-100 gradient-custom align-items-left body" id="bod">
    <?php include 'header.php'; ?>
    
        <div class="bg_box" >
                <div class="bg_img"><p id="para">Hello <?php echo $_SESSION['adm_username'] ?>! <br> WELCOME TO OUR APARTMENT MANAGEMENT SYSTEM</p></div>
            </div>
</body>
</html>


