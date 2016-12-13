<div class="row replyLoop">
    <div class="col-md-12">
        <ul class="media-list">
            <li class="media">
                <a class="media-left" href="#">
                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTVhOGM5N2I3NCB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NWE4Yzk3Yjc0Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxNC41IiB5PSIzNi41Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" />
                </a>
                
                <div class="media-body media-datails" data-commentid = "{{ $comment->id }}">
                    <h6 class="media-heading">{{ $comment->name }}</h6>
                    <span class="comment-body">{{ $comment->comment }}</span>
                    <p>
                        <span class="comment-post-name">
                            <i>
                                <span>{{ date('F nS, Y @ g:iA', strtotime($comment->created_at)) }}</span> &nbsp; &nbsp; 
                                <a href="#" class="commentLiking">Like </a>&nbsp; &nbsp; &nbsp; 
                                <span>@include('commentLikeCount')</span>
                            </i> &nbsp; &nbsp;
                        </span>
                    </p>
                    <div class="show_hide">reply</div>

                    @include('partials.reply-box')
                    <div class="loopReply">
                        @each('repliesLoop', $comment->replies, 'reply') 
                    </div>                                                                                
                </div>
            </li>
        </ul>
    </div>
</div><!-- End comment with reply -->

