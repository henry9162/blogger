<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="_token" content="{!! csrf_token() !!}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
    	<meta name="author" content="">

        <title>S.O.C Blog @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        
         @yield('stylesheets')
        <!--<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple"> -->
       
    </head>