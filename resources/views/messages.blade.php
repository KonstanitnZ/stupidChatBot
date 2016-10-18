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
    <div class="container">
        <table class="table table-condensed table-striped table-bordered">
        <tr>
            <th>id</th>
            <th>Имя Фамилия</th>
            <th>Текст сообщения</th>
            <th>Дата сообщения</th>
        </tr>
        @foreach ($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->userfirstname }} {{ $message->usersecondname }}</td>
                <td>{{ $message->text }}</td>
                <td>{{ $message->created_at }}</td>
            </tr>            
        @endforeach
        </table>
        {{ $messages->links() }}
    </div>
    <!-- Scripts -->
    <script src="{{ asset('libs/jquery-3.1.0.min.js') }}"/></script>
    <script type="text/javascript" src="{{ asset('libs/fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"/></script>
</body>
</html>