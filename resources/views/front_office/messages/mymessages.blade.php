<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>{{ __('messages.chat') }}</title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="{{ asset('css/chat/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    {{-- <?php $lang = config('app.locale');
    $user = auth()->user();
    ?>
    {{ $lang == 'ar' ? 'المحادثات' : 'Messages' }} --}}


    <div id="main-wrapper" >

        <div class="page-wrapper" >
            <!-- ============================================================== -->
            <!-- Left Part  -->
            <!-- ============================================================== -->
            <div class="left-part bg-light fixed-left-part border-top" style="margin-bottom: 50px">
                <!-- Mobile toggle button -->
                <a class="ti-menu ti-close btn btn-success show-left-part d-block d-md-none"
                    href="javascript:void(0)"></a>
                <!-- Mobile toggle button -->
                <div class="p-15">
                    <h4>{{ __('messages.chat_sidebar') }}</h4>
                    <a class="btn-lg btn-cyan text-white"  href="{{ route('home') }}">{{ __('general.back') }}</a>
                </div>
                <?php $conversations = App\Models\Conversation::get(); ?>

                <div class="scrollable position-relative">

                    <ul class="mailbox list-style-none">
                        <li>
                            <div class="message-center chat-scroll">
                                {{-- {{ dd($conversation) }} --}}
                                @forelse ($conversations as $conversation)
                                    <?php $id = (auth()->user()->id == $conversation->sender_id) ? $conversation->recipient->id : $conversation->sender->id; ?>
                                    <a href="{{ route('web.send_message', $id) }}" class="message-item" id='chat_user_1'
                                        data-user-id='1'>
                                        <span class="user-img">
                                            <img src="{{ (auth()->user()->id == $conversation->sender_id) ? $conversation->recipient->image_url : $conversation->sender->image_url }}"
                                                alt="user" class="rounded-circle">
                                            <span class="profile-status online pull-right"></span>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">
                                                {{ (auth()->user()->id == $conversation->sender_id)
                                                    ? $conversation->recipient->first_name . ' ' . $conversation->recipient->last_name
                                                    : $conversation->sender->first_name . ' ' . $conversation->sender->last_name }}
                                            </h5>

                                        </div>
                                    </a>
                                @empty
                                    {{ __('messages.there_no_conversations') }}
                                @endforelse


                            </div>
                        </li>
                        <li style="margin-bottom: 50px" class=""></li>
                        
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Left Part  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Part  Mail Compose -->
            <!-- ============================================================== -->
            <div class="right-part  border-top" >
                <div class="p-20">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('messages.chat_messages') }}</h4>
                            <div class="chat-box scrollable" style="height:calc(100vh - 300px);">
                                <!--chat Row -->
                                <ul class="chat-list" >
                                    <!--chat Row -->
                                    @forelse ($mymessages as $item)
                                        @if ($item->sender_id != auth()->user()->id)
                                            <?php $myuser = App\Models\User::where('id', $item->sender_id)->first(); ?>

                                            <li class="chat-item" >
                                                <div class="chat-img">
                                                    <img src="{{ $myuser->image_url }}" alt="user">
                                                </div>
                                                <div class="chat-content">
                                                    <h6 class="font-medium">{{ $myuser->first_name }}</h6>
                                                    <div class="box bg-light-info">{{ $item->message }}
                                                    </div>
                                                </div>
                                                <div class="chat-time">
                                                    {{ $item->created_at->shortAbsoluteDiffForHumans() }}</div>
                                            </li>
                                        @else
                                            <li class="odd chat-item">
                                                <div class="chat-content">
                                                    <div class="box bg-light-inverse">{{ $item->message }}
                                                    </div>
                                                    <br>
                                                </div>
                                            </li>
                                        @endif

                                    @empty
                                    @endforelse


                                </ul>
                            </div>
                        </div>
                        <?php
                        $current_url = url()->current();
                        $url = explode('/', $current_url);
                        $reci = (int) end($url);
                        // $reci = App\Models\User::where('id', $id)->first();
                        ?>
                        <form action="{{ route('messages.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="recipient_id" value="{{ $reci }}">
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="input-field m-t-0 m-b-0">
                                            <input id="textarea1" placeholder="Type and enter"
                                                class="form-control border-0" type="text" name="message">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <button class=" btn-lg btn-cyan float-right text-white" type="submit">
                                            {{ __('messages.send') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- @endsection --}}

    <script src="{{ asset('css/chat/jquery.min.js') }}"></script>
    <script src="{{ asset('css/chat/app.min.js') }}"></script>
    <script src="{{ asset('css/chat/app.init.js') }}"></script>
    <script src="{{ asset('css/chat/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('css/chat/custom.min.js') }}"></script>
    <script>
        $(function() {
            $(document).on('keypress', "#textarea1", function(e) {
                if (e.keyCode == 13) {
                    var id = $(this).attr("data-user-id");
                    var msg = $(this).val();
                    msg = msg_sent(msg);
                    $("#someDiv").append(msg);
                    $(this).val("");
                    $(this).focus();
                }
            });
        });
    </script>
    <script>
        // setInterval(() => {
        //     $('#main-wrapper').load(window.location.href + "#main-wrapper");
        //     // $('#unreadNotifications').load(window.location.href + '#unreadNotifications');
        // }, 20000);
    </script>
</body>

</html>
