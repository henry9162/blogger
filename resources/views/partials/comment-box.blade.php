<!--Comment-box -->
<div class="row comment-box">
    <div class="col-md-12">

        {!! form::open(['class' => 'form-comment', 'method' => 'POST']) !!}

            <h4>Add a comment</h4>
            <p>Your email address wil not be made public.</p>

                {{ form::label('comment', 'Comment') }}
                {{ form::textarea('comment', null, ['class' => 'form-control', 'rows' => '4', 'name' => 'comment', 'id' => 'comment-box', 'placeholder' => 'Write a comment...']) }}

            <div class="row comment-details">
                <div class="col-md-6">
                    {{ form::label('name', 'Name') }}
                    {{ form::text('name', null, ['class' => 'form-control', 'name' => 'name', 'id' => 'name-box', 'placeholder' => 'Your name...', 'required']) }}
                </div>

                <div class="col-md-6">
                    {{ form::label('email', 'Email') }}
                    {{ form::text('email', null, ['class' => 'form-control', 'name' => 'email', 'id' => 'email-box', 'placeholder' => 'Your email...', 'required']) }}
                </div>
                {{ form::hidden('postId', $post->id) }}
                {{ form::hidden('token', Session::token() ) }}

            </div>

            {{ form::submit('SUBMIT COMMENT', ['class' => 'btn btn-primary btn-sm button', 'id' => 'comment-save']) }}
        {!! form::close() !!}

    </div>
</div>
<!-- End of Comment-box -->