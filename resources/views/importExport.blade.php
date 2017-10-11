@extends('layouts.app')


        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vilniaus gyventojai</title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"> Atsiųsti gyventojų sąrašą </a>
        </div>
    </div>
</nav>

<div class="container">
    <a href="{{URL::to('downloadExcel/xls')}}"><button class="btn bnt-success">Download Excel xls</button></a>
    <a href="{{URL::to('downloadExcel/xlsx')}}"><button class="btn bnt-success">Download Excel xlsx</button></a>
    <a href="{{URL::to('downloadExcel/csv')}}"><button class="btn bnt-success">Download Excel csv</button></a>
<br>
    <br>
    <a class="btn btn-info" href="{{$back}}">Back to list</a>



{{--<form action="{{URL::to('importExcel')}}" method="post" enctype="multipart/form-data">--}}
    {{--{{ csrf_field() }}--}}
    {{--<input type="file" name="import_file"/>--}}
   {{--<button class="btn btn-primary">Import</button>--}}
{{--</form>--}}
</div>

{{--{!! Form::open(['action'=>'MaatwebsiteController@importExcel']) !!}--}}
{{--{{ csrf_field() }}--}}
{{--<div class="form-group">--}}
    {{--<input type="file" name="fileToUpload" id="fileToUpload">--}}
{{--</div>--}}

{{--<button type="submit" class="btn btn-primary">Submit</button>--}}

{{--{!! Form::close() !!}--}}
</body>
</html>