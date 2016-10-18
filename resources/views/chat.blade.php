<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('libs/reset.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css" media="all" />
    <!-- Add fancyBox styles -->
    <link rel="stylesheet" href="{{ asset('libs/fancybox/source/jquery.fancybox.css?v=2.1.5') }}" type="text/css" media="screen" />
</head>
<body>
    <h1>Stupid chat bot</h1>
    <div id="chat">
        <div id="messages">
        </div>
        <form id="sendMessageForm" method="POST">
            <input name='firstName' type='text' placeholder='Имя'/>
            <input name='secondName' type='text' placeholder='Фамиилия'/>
            <input name='messageText' type='text' placeholder='Введите текст сообщения'/>
            <button name="submit">отправить</button>
        </form>
    </div>
    <a href="{{ url('/allMessages') }}" id="showAllMessages">Посмотреть все сообщения</a>
<!-- Scripts -->
<script src="{{ asset('libs/jquery-3.1.0.min.js') }}"/></script>
<script type="text/javascript" src="{{ asset('libs/fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"/></script>
<script>
    $(function(){
        // set token for ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // get new messages in chat
        function getNewMessage(){            
            $.ajax({
                url: "/getNewMessage",
                method: "GET",

                success: function(data){
                    printMessage(data.message.firstName + ' ' + data.message.secondName, data.message.messageText, 'message', 'left_arrow');
                },
            });
        };
        setInterval(getNewMessage , 5000);

        // check form and send message to server
        $('#sendMessageForm').submit(function(e){
            var formSubmit = true;
            
            // fields shouldn't be empty
            var fields = [ $(this).find("input[name=firstName]"), $(this).find("input[name=secondName]"), $(this).find("input[name=messageText]") ];

            // check are fields empty or not
            $.each(fields, function(index, value) {
                if ($(value).val() == ''){
                    $(value).css('border-color', 'red');
                    formSubmit = false;
                };
            });
            
            if (!formSubmit) return formSubmit;
            
            // If it is OK send to server and save in DB
            $.ajax({
                url: '/createMessage',
                method: "POST",
                data: $('#sendMessageForm').serialize(),

                success: function() {
                    printMessage($(fields[0]).val() + ' ' + $(fields[1]).val(), $(fields[2]).val(), 'message my', 'right_arrow');
                    // clear message
                    $(fields[2]).val('');
                }
            });

            return false;
        });

        $('#sendMessageForm input[type=text]').focus(function(){
            $(this).css('border-color', '#dde0e3');
        });

        // add message to list
        function printMessage(name, text, className, imgFileName) {
            var html = $('<div />', { "class": className });
            $(html).append("<img src='img/" + imgFileName + ".jpg' />");
            $(html).append($("<p />", { 'class': 'messageName', text: name }));
            $(html).append($("<p />", { 'class': 'messageText', text: text }));
            $('#messages').append(html);
            scrollToLastMessage();
        };

        // scroll to last message
        function scrollToLastMessage() {
            $('#messages').scrollTop($('#messages').get(0).scrollHeight);
        }
    });
</script>
</body>
</html>