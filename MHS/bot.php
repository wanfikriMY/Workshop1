<?php
include "usernavbar.html";
include "footer.html";

session_start();
?>
<!DOCTYPE html>
<head>
    <title>MEDICAL HEALTHCARE BOT</title>
    <link rel="stylesheet" href="mystyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<br>
<body>
    <div class="body">
    <div class="box">
    <div class="wrapper">
        <div class="title">MEDICAL HEALTHCARE BOT</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon1">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Welcome to Medical Healthcare System</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $reply = '<div class="bot-inbox inbox"><div class="icon2"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($reply);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    </div>
</div>
</body>
</html>
