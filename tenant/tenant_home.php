<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location:login.php');
}
include '../connection.php';
include '../css/tenant_style.css';
include '../links/tenant_links.php';

?>
<style >
       *{
            margin: 0;
            padding: 0;
            box-sizing:border-box ;
        }
        .body{
            background-image: url('../css/bg_image/apt_bg.jpeg');
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
                font-size: 2rem;
            }
        }
</style>
<body class="vh-100 gradient-custom align-items-left body" id="bod">
    <?php include 'header.php'; ?>
            
            <div class="bg_box" >
                <div class="bg_img"><p id="para">Hello <?php echo $_SESSION['username'] ?>! <br> WELCOME TO OUR APARTMENT MANAGEMENT SOFTWARE</p></div>
            </div>
        
</body>
</html>

