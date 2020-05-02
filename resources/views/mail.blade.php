<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>

<body>
@if(isset($e_name))
    Client Name : {{$e_name}}
    <br>
@endif

<div style="text-align: right;">
{!! nl2br(e($e_message)) !!}
</div>
<br>
<img src="{{$img}}" style="height: 15%; width: 15%; text-align: right; float: right;">
</body>
</html>