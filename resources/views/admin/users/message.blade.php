@extends('layouts.dashboard.dashboard')
@section('title')
    {{ __('messages.chat_messages') }}
@endsection

@section('page_name')
    {{ __('messages.chat_messages') }}
@endsection

@section('content')
    <?php $lang = config('app.locale'); ?>



    <div class="card mt-3">
        <div class="card-body">
            <div class="right-part border-top">
                <div class="p-20">
                    <div class="card">
                        <div class="card-body">
                            <div class="chat-box" style="overflow-y: auto; height: calc(100vh - 300px);">
                                <!--chat Row -->
                                <ul class="chat-list">
                                    <!--chat Row -->
                                    @forelse ($conversations[0]->messages as $item)
                                        <li class="chat-item">
                                            @if ($item->senderMessage->image)
                                                <div class="chat-img">
                                                    <img src="{{ $item->senderMessage->image_url }}" width="40px" height="40px" alt="user">
                                                </div>
                                            @endif
                                            <div class="chat-content">
                                                <h6 class="font-medium">
                                                    {{ $item->senderMessage->first_name . ' ' . $item->senderMessage->last_name }}
                                                </h6>
                                                <div class="box bg-light-info">{{ $item->message }}</div>
                                            </div>
                                            <div class="chat-time">
                                                {{ $item->created_at->shortAbsoluteDiffForHumans() }}</div>
                                        </li>
                                        <hr>
                                    @empty
                                        <li class="chat-item">لا توجد رسائل</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('js')
    <script src="{{ asset('css/chat/perfect-scrollbar.jquery.min.js') }}"></script>
@endsection
