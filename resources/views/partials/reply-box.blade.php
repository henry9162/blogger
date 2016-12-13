 <!-- reply-box -->
<div class="row reply_form" style="display:none;">
    <div class="col-md-12">
        {!! form::open(['class' => 'form-comment replyForm', 'name' => 'replyForm']) !!}

            <h4>Add a reply</h4>
            <p>Your email address wil not be made public.</p>

                {{ form::label('reply', 'Reply') }}
                {{ form::textarea('reply', null, ['class' => 'form-control', 'rows' => '4', 'name' => 'reply', 'placeholder' => 'Add a reply...']) }}

            <div class="row comment-details">
                <div class="col-md-6">
                    {{ form::label('name', 'Name') }}
                    {{ form::text('name', null, ['class' => 'form-control', 'name' => 'name', 'placeholder' => 'Your name...', 'required']) }}
                </div>

                <div class="col-md-6">
                    {{ form::label('email', 'Email') }}
                    {{ form::text('email', null, ['class' => 'form-control', 'name' => 'email', 'placeholder' => 'Your email...', 'required']) }}
                </div>
            </div>
                {{ form::hidden('commentId', $comment->id) }}
                {{ form::hidden('token', Session::token() ) }}

            {{ form::submit('Reply to Comment', ['class' => 'btn btn-primary btn-sm button reply-save']) }}
        {!! form::close() !!}
    </div>
</div>
<!-- End reply-box -->