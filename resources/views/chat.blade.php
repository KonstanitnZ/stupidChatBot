<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset="UTF-8">
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
            <div class="message">
                <img src="{{ asset('img/left_arrow.jpg') }}"/>
                <p class="messageName">Иванов Иван</p>
                <p class="messageText">Иногда депрессия сопровождается сильной тревогой или двигательным возбуждением, при котором человек мечется, рыдает, рвет на себе одежду.</p>
            </div>
            <div class="message">
                <img src="{{ asset('img/left_arrow.jpg') }}"/>
                <p class="messageName">Иванов Иван</p>
                <p class="messageText">Иногда депрессия сопровождается сильной тревогой или двигательным возбуждением, при котором человек мечется, рыдает, рвет на себе одежду.</p>
            </div>
            <div class="message my">
                <img src="{{ asset('img/right_arrow.jpg') }}"/>
                <p class="messageName">Иванов Иван</p>
                <p class="messageText">Иногда депрессия сопровождается сильной тревогой или двигательным возбуждением, при котором человек мечется, рыдает, рвет на себе одежду.</p>
            </div>
        </div>
        <form id="sendMessageForm" method="POST">
            <input name='firstName' type='text' placeholder='Имя'/>
            <input name='secondName' type='text' placeholder='Фамиилия'/>
            <input name='messageText' type='text' placeholder='Введите текст сообщения'/>
            <button name="submit">отправить</button>
        </form>
    </div>
<!-- Scripts -->
<script src="{{ asset('libs/jquery-3.1.0.min.js') }}"/></script>
<script type="text/javascript" src="{{ asset('libs/fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"/></script>
<script>
    $(function(){

        $('#sendMessageForm').submit(function(e){
            var formSubmit = true;
            // fields shouldn't be empty
            var fields = [ $(this).find("input[name=firstName]"), $(this).find("input[name=secondName]"), $(this).find("input[name=messageText]") ];

            $.each(fields, function(index, value) {
                if ($(value).val() == ''){
                    $(value).css('border-color', 'red');
                    formSubmit = false;
                };
            });
            
            if (!formSubmit) return formSubmit;

            printMyMessage($(fields[0]).val() + ' ' + $(fields[1]).val(), $(fields[2]).val());
            // clear message
            $(fields[2]).val('');

            return false;
        });

        $('#sendMessageForm input[type=text]').focus(function(){
            $(this).css('border-color', '#dde0e3');
        });
        // add my message to list
        function printMyMessage(name, text) {
            var html = $('<div />', { "class": 'message my' });
            $(html).append("<img src='img/right_arrow.jpg' />");
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