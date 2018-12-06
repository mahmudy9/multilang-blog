
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <ul>
        <li>
            Name: {{$name}}
        </li>
        <hr>
        <li>
            Email: {{$email}}
        </li>
        <hr>
        <li>
            Phone: {{$phone}}
        </li>
        <hr>
        <li>
            Activity: {{$activity}}
        </li>
        <hr>
        <li>
            Photography:
            <ul>
            @foreach($photos as $photo)
                <li>{{$photo}}</li>
            @endforeach
            </ul>
        </li>
<hr>
        <li>
            Cinema:
            <ul>
            @foreach($cinemas as $cinema)
                <li>{{$cinema}}</li>
            @endforeach
            </ul>
        </li>
        <hr>
        <li>
            Graphic Design:
            <ul>
            @foreach($gds as $gd)
                <li>{{$gd}}</li>
            @endforeach
            </ul>
        </li>

    </ul>
</body>
</html>