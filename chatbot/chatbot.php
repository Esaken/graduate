<?php
?>

<!-- chatbot -->

<div id="chatbox"></div>
  <div>
    <input type="text" id="usermsg" placeholder="Type message here..." />
    <button id="sendbtn" onclick="sendMsg()">Send</button>
  </div>

<!--  -->


.39*
*
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sendbtn').click(function() {
                var usermsg = $('#usermsg').val();
                $.get('/get', {msg: usermsg}).done(function(data) {
                    $('<p>' + usermsg + '</p>').appendTo('#chatbox');
                    $('<p>' + data + '</p>').appendTo('#chatbox');
                    $('#usermsg').val('');
                });
                return false;
            });
        });
    </script>

