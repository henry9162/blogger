<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="_token" content="{!! csrf_token() !!}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php $titleTag = htmlspecialchars($post->title); ?>
        <title>S.O.C Blog | {{ $titleTag }}</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/single.css') }}">
       
    </head>

    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid header">
                    <h1 class="text-center" id="animate-header">Welcome To My Blog</h1>
                    <p class="text-center" id="animate-para">I am Ekwonwa Henry</p>
                    <img class="img-responsive" id="animate-image" src="{{ asset('images/henry-code.jpg') }}" alt="">          
                </div>
            </div>
        </div>