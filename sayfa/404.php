<style>
    html {
        box-sizing: border-box;
    }

    html,
    body {
        height: 100%;
    }

    body {
        margin: 0;
        background: #efefef;
        font-family: IBM Plex serif;
        font-size: 20px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        margin: 0;
        height: 100%;
        flex-direction: column;
    }

    @keyframes slideInFromLeft {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(0);
        }
    }

    @keyframes slideInFromRight {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(0);
        }
    }

    .left {
        font-size: 200px;
        color: #10bc69;
        text-shadow: 1px 1px 10px rgba(#CD99DB, 1);
        animation: 1.2s ease-out 0s 1 slideInFromLeft;
        margin-bottom: -70px;
    }

    .right {
        animation: 1.2s ease-out 0s 1 slideInFromRight;
        color: #10bc69;
    }

    @keyframes grow {
        0% {
            transform: scale(1);
        }

        60% {
            color: rgb(128, 250, 191);
        }

        100% {
            transform: scale(1.2);
            color: rgb(128, 250, 191);
        }
    }

    .fa-heart {
        margin-top: 5px;
        margin-bottom: 5px;
        color: #10bc69;
        font-size: 50px;
        top: 200px;
        animation: grow 1s ease infinite;
    }
</style>



<?php require_once 'inc/ust.php'; ?>


<?php 
$redirectUrl = isset($_SESSION['login']['id']) ? 'index.php?url=Forum' : 'index.php?url=Anasayfa';
?>
<div class="container">
    <span style="user-select: none;" class="left">404</span><br>
    <p style="user-select: none;">Whoops! This isn't the right place...</p>
    <div class="pulse">
        <button class="btn btn-outline-success" onclick="location.href='<?php echo $redirectUrl; ?>';">Home
            Page</button>
    </div>
</div>