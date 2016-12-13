<li><a href="#" data-toggle="modal" data-target="#myModal2">Sign in/ Sign up</a></li>
                
    <div class="modal fade" id="myModal2">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only"></span>
                    </button>
                    <h4 class="modal-title text-center">Sign in</h4>
                </div>
                <div class="modal-body">
                    <!-- Signin form -->
                    {!! form::open(['route' => 'auth.signin', 'method' => 'POST']) !!}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('email', 'Email') }}
                                </div>
                                <div class="col-md-6">
                                    {{ form::email('email', null, ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('password', 'Password') }}
                                </div>
                                <div class="col-md-6">
                                    {{ form::password('password', ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    {{  form::checkbox('remember') }} &nbsp;{{ form::label('remember', 'Remember me') }}
                                </div>
                            </div>
                         </div>

                         <div class="form-group">
                            <div class="row">                
                                <p class="text-center"> {{  form::submit('Login', ['class' => 'btn btn-primary btn-sm btn-block']) }}</p>                                        
                            </div>
                         </div>    

                    {!! form::close() !!}
                    <hr>

                    <!-- Register form -->
                    <div class="sign-up" style="display:none;">
                        <h4 class="text-center">OR Sign up!</h4>
                        <hr>
                        {!! form::open(['route' => 'auth.signup', 'method' => 'POST']) !!}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        {{ form::label('name', 'Name') }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ form::text('name', null, ['class' => 'form-control', 'required']) }}
                                    </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        {{ form::label('email', 'Email') }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ form::email('email', null, ['class' => 'form-control', 'required']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        {{ form::label('password', 'Password') }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ form::password('password', ['class' => 'form-control', 'required']) }}
                                    </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        {{ form::label('password_confirmation', 'Confirm Password') }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ form::password('password_confirmation', ['class' => 'form-control', 'required']) }}
                                    </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="row">                
                                    <p class="text-center"> {{  form::submit('Sign up', ['class' => 'btn btn-primary btn-sm']) }}</p>                                        
                                </div>
                             </div>    

                        {!! form::close() !!}
                    </div>

                </div>
                
            </div>
        </div>
    </div><!-- End of modal div -->