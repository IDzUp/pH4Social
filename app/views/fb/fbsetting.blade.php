@layout(layouts.fbhome)


@section('content')







    <section class="blocking_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 col-md-7 col-xs-12">
                    <div class="row">
                        <h4>Block list</h4>
                        <?php if($block)
                        { ?>

                        @foreach( $block as $hello)

                            <div class="col-sm-4 col-md-4">
                                <div class="thumbnail center_box">
                                    <div class="friend_list_img">
                                        <img class="img-circle" alt=""
                                             src="{{ asset('/') }}public/{{ $hello->profile }}">
                                    </div>
                                    <div class="caption">
                                        <h3>{{ $hello->name }}</h3>
                                        <a href="{{ asset('/index.php/') }}/unblock/<?php echo $hello->uname; ?>"
                                           class="like_btn btn-lg mar_top" type="button">UnBlock</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <?php
                        }
                        else
                        {
                        ?>

                        <h1> No Block List Found</h1>

                        <?php
                        }
                        ?>


                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                    <h4><span class="glyphicon glyphicon-cog"></span> Settings</h4>
                    <div class="bg_block">
                        <div class="chat_box">
                        {{ Form:: open(array('url' => 'chatupdate' , 'method' => 'get','class' => 'myfirstform')) }} <!--contact_request is a router from Route class-->
                            @if($errors->any())

                                {{ implode('', $errors->all('<li>:message</li>'))  }}
                            @endif
                            {{ Form::token() }}

                            <label class="checkbox-inline">
                                <input type="hidden" name="id" value="<?php echo Auth::user()->id;?>"/>
                                <input type="radio" <?php if($online->chat == 0){ ?>checked="" <?php } ?> name="chat"
                                       value="0"/> Offline *
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" <?php if($online->chat == 1 || $online->chat == null){ ?>checked=""
                                       <?php } ?>name="chat" value="1"/> Online *
                            </label>
                            <label class="checkbox-inline">
                                <button style="margin-left:17px;" class="like_btn" type="submit">Submit</button>
                            </label>
                            </form>
                        </div>
                        <div class="chat_box">
                        {{ Form:: open(array('url' => 'accountupdate' , 'method' => 'get','class' => 'myfirstform')) }} <!--contact_request is a router from Route class-->
                            @if($errors->any())

                                {{ implode('', $errors->all('<li>:message</li>'))  }}
                            @endif
                            {{ Form::token() }}
                            <label class="checkbox-inline">
                                <input type="hidden" name="id" value="<?php echo Auth::user()->id;?>"/>
                                <input type="radio"
                                       <?php if($account->account == 1 || $account->account == null){ ?>checked=""
                                       <?php } ?>name="account" value="1"/> Activate
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" <?php if($account->account == 0){ ?>checked=""
                                       <?php } ?> name="account" value="0"/> Deactivate
                            </label>
                            <label class="checkbox-inline">
                                <button class="like_btn" type="submit">Submit</button>
                            </label>
                            </form>
                        </div>


                        <div class="chat_box">
                        {{ Form:: open(array('url' => 'provisiter' , 'method' => 'get','class' => 'myfirstform')) }} <!--contact_request is a router from Route class-->
                            @if($errors->any())

                                {{ implode('', $errors->all('<li>:message</li>'))  }}
                            @endif
                            {{ Form::token() }}
                            <label class="checkbox-inline">
                                <input type="hidden" name="id" value="<?php echo Auth::user()->id;?>"/>
                                <input type="radio"
                                       <?php if($account->visitors == 1 || $account->visitors == null){ ?>checked=""
                                       <?php } ?>name="account" value="1"/> Public
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" <?php if($account->visitors == 0){ ?>checked=""
                                       <?php } ?> name="account" value="0"/> Only Friends
                            </label>
                            <label class="checkbox-inline">
                                <button class="like_btn" type="submit">Submit</button>
                            </label>
                            </form>
                        </div>


                        <div class="chat_box">
                        {{ Form:: open(array('url' => 'deleteaccount' , 'method' => 'get','class' => 'myfirstform')) }} <!--contact_request is a router from Route class-->
                            @if($errors->any())

                                {{ implode('', $errors->all('<li>:message</li>'))  }}
                            @endif
                            {{ Form::token() }}
                            <label class="checkbox-inline"> Delete the Account
                                <input type="hidden" name="id" value="<?php echo Auth::user()->id;?>"/>

                            </label>

                            <label class="checkbox-inline">
                                <button style="margin-left:17px;" class="like_btn" type="submit">Delete Account</button>
                            </label>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



@endsection
