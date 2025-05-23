@extends('Front-end.layouts.master')
@section('main-content')
<script>
function closethisasap(){
document.forms["redirectpost"].submit();
}
</script>
<body onload="closethisasap()">
<h1>Please wait You Will be redirected soon to <br> EasyPaisa PAyment </h1>

<form method="POST" name="redirectpost" action="{{Config::get('constants.easypay.POST_BACK_URL1')}}">
<?php
$post_data= Session::get('poat_data');
    echo '<pre>';
    print($post_data);
    echo '</pre>';
?>

@foreach ($post_data as  $key => $value)
<input type="hidden" name="{{$Key}}" value="{{$value}}">
@endforeach
</form>
@endsection
</body>