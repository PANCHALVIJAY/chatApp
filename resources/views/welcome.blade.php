<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chat App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12" id="chat-box">
                    
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" name="sendbox" id="sendboc" class="form-control">
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.socket.io/4.4.0/socket.io.min.js" integrity="sha384-1fOn6VtTq3PWwfsOrk45LnYcGosJwzMHv+Xh/Jx5303FVOXzEnw0EpLv30mtjmlj" crossorigin="anonymous"></script>

        <!-- Tutorial Link https://youtu.be/MNf0piqRdHg -->

        <script>
            $(function() {
                let ipAddress = '127.0.0.1';
                let socketPort = '3000';
                let socket = io(ipAddress + ":" + socketPort);

                $("#sendboc").keypress(function(e){
                    if (e.which === 13) 
                    {
                        socket.emit("sendChatToServer",$("#sendboc").val());
                        $("#sendboc").val("");
                        return false;
                    }
                });

                socket.on('sendChatToClient', (message) => {
                    $("#chat-box").append(`<p class="mb-0 py-2">${message}</p>`);
                });
            });
        </script>
    </body>
</html>
