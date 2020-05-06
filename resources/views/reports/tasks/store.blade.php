<!DOCTYPE html>
<html>
<head>
</head>
<body>

    @foreach ($tasks as $task)
       {{ $task->solution }} <br />
    @endforeach

</body>
</html>