@extends('layouts.dashboard.dashboard')
@section('title')
    {{ __('user.user') }}
@endsection

@section('page_name')
    {{ __('user.user') }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/css-stars.css') }}">
    <style>
        .stars-card {
            min-height: 20px;
        }

        .stars-card svg {
            margin-right: 3px;
            color: #818894;
        }

        .stars-card svg.active {
            color: #ffc600;
            fill: #ffc600;
        }

        .stars-card i.active svg {
            color: #ffc600;
            fill: #ffc600;
        }
    </style>
@endsection
@section('content')
    <?php $lang = config('app.locale'); ?>
    <div class="blog-post-page-header bg-dark-blue  py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    {{-- <h1 class="mb-3">{{ ($lang == 'ar') ? $title_ar : $title_en }}</h1> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="card mt-3">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td class="width30">{{ __("user.first_name") }}</td>
                        <td>{{ $user->first_name ?? '#' }}</td>
                    </tr>
                    <tr>
                        <td class="width30">{{ __('user.last_name') }}</td>
                        <td>{{ $user->last_name ?? '#' }}</td>
                    </tr>
                    <tr>
                        <td class="width30">{{ __('user.email') }}</td>
                        <td>{{ $user->email ?? '#' }}</td>
                    </tr>
                    <tr>
                        <td class="width30">{{ __("user.phone") }}</td>
                        <td>{{ $user->phone ?? '#' }}</td>
                    </tr>
                    <tr>
                        <td class="width30">{{ __("user.role_name") }}</td>
                        <td>{{ $user->role_name ?? '#' }}</td>
                    </tr>
                    <tr>
                        <td class="width30">{{ __("user.status") }}</td>
                        <td>{{ ($user->status == 1) ? 'active' : "inactive" }}</td>
                    </tr>

                    <tr>
                        <td class="width30">{{ __("user.rate") }}</td>
                        <td>                    <div>
                            <div class="stars-card d-flex align-items-center ">
                                @php
                                    $i = 5;
    
                                    $rate = $user->rates();
                                @endphp
                                @if ($user->role_id == 3)
                                    <div class="stars-card d-flex align-items-center ">
    
    
                                        @while (--$i >= 5 - $rate)
                                            <i data-feather="star" width="20" height="20"
                                                class="active"></i>
                                        @endwhile
                                        @while ($i-- >= 0)
                                            <i data-feather="star" width="20" height="20"
                                                class=""></i>
                                        @endwhile
                                        <span
                                            class="badge badge-primary ml-10 bg-primary">{{ $rate }}</span>
    
                                    </div>
                                @endif
                            </div>
    
                        </div></td>
                    </tr>
                
                 
                    <tr>
                        <td class="width30">{{ __("user.image") }}</td>
                        <td>
                            <div class="image" >
                                <img width="100" height="100" src="{{ $user->image_url ?? "" }}" alt="Not" class="custom_img">
                                
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="width30">{{ __("user.conversations") }}</td>
                        <td>
                        @forelse ($conversations as $conversation)
                            <a href="{{ route('show_user_conversation' , $user->id) }}">
                                {{ ($conversation->sender_id == $user->id) ? __("user.conversations_with"). $conversation->recipient->first_name . ' ' .$conversation->recipient->last_name
                            :  __("user.conversations_with") . $conversation->sender->first_name . ' ' .$conversation->sender->last_name
                            }}
                            </a><br>
                        @empty
                            
                        @endforelse
                    </td>
                    </tr>
              

                </thead>
            </table>
        </div>
    </div>
@endsection
@section('js')
    {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}
    <script src="{{ asset('js/feather-icons/dist/feather.min.js') }}"></script>
    <script>
        feather.replace();
    </script>
    {{-- import feather from 'feather-icons';
    feather.replace(); --}}
@endsection