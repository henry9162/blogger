<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
    	<meta name="author" content="">

        <title>S.O.C Blog | Contact</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/contact.css">
       
    </head>

    <body>
    	@include('partials.header')

    	@include('partials.nav')

        <div class="container contact-me">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    
                        <div class="row contact-box">
                            <div class="col-md-12">

                                {!! form::open(['route' => 'post.contact', 'class' => 'form-contact', 'method' => 'POST']) !!}
                                    <h4>Lets be in contact...</h4>
                                    <p>Leave me a message and i will get back to you as soon as possible!</p>

                                    <div class="row contact-details" style="margin-bottom:20px;">
                                        <div class="col-md-6">
                                            {{ form::label('subject', 'Subject') }}
                                            {{ form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Your name...', 'required']) }}
                                        
                                        </div>

                                        <div class="col-md-6">
                                            {{ form::label('email', 'Email') }}
                                            {{ form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Your email...', 'required']) }}
                                            
                                        </div>
                                    </div>

                                    {{ form::label('message', 'Message') }}
                                    {{ form::textarea('message', null, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Leave a message...']) }}

                                    {{ form::submit('SEND MESSAGE', ['class' => 'btn btn-primary btn-sm btn-top']) }}
                                {!! form::close() !!}

                            </div>
                        </div>


                    <div class="row contactRecentPost">
                        <div class="row">
                            <h4>Recent Posts</h4>
                        </div>
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-md-3">
                                    <div class="row recentData">
                                        <div class="latest-image">
                                            <a href="{{ route('blog.single', $post->slug) }}"><img class="img-responsive" src="{{ asset('images/' . $post->image) }}" width="100%" height="100%" /></a>
                                            <h6 class="latest-header"><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h6>
                                            <span class="latest-post-name"><i>{{ date('M j, Y', strtotime($post->created_at)) }}</i></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!-- End of latest-row -->

                </div>
            </div>
        </div>

        @include('partials.footer')
        @include('partials.javascripts')

        <script>
            $(document).ready(function(){
                $('div.alert').hide();
                var token = '{{ Session::token() }}';
                var subUrl = '{{ route('subscribersLog') }}';

                $('ul > li > .inline').click(function(event){

                    var search = $(this).html();
                    var input = $('#search-me');
                    var form = document.getElementById('searchForm');

                    var clicked = input.val( input.val() + search );

                    if( clicked ){
                        form.submit();
                    }
                    event.preventDefault();
                });

            });
        </script>

    </body>
</html>
