@extends('layouts.home')
@section('title')
    <?php $lang = config('app.locale'); ?>
    {{ $lang == 'ar' ? 'تعديل الصفحة الشخصية' : 'Edit Profile' }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('css/css-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('css/video-js.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <style>
        .profile-cover-container {
            position: relative;
            width: 100%;
            height: 400px;
            background-color: #f5f5f5;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            /* لتكون الصورة دائرية */
            margin: 0 auto;
            display: block;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-content {
            padding-top: 20px;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-info .user-name {
            font-size: 22px;
            color: #333;
            margin-top: 15px;
        }

        .user-info .user-role {
            font-size: 16px;
            color: #777;
        }

        .user-stats .stat-item {
            text-align: center;
            margin-right: 20px;
        }

        .user-stats .stat-value {
            font-size: 24px;
            color: #333;
        }

        .user-stats .stat-label {
            font-size: 14px;
            color: #777;
        }

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
    <section class="profile-cover-container"  style="height:800px;">

        <div class="profile-content pt-40"  >
            <div  class="container position-relative d-flex justify-content-center " >
                <?php $user = auth()->user(); ?>
                <form action="{{ route('web.profile.update') }}" method="POST" enctype="multipart/form-data" style="width:700px"   class="profile-card rounded-lg shadow-xs bg-white p-15 p-md-30" >
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name">{{ __('user.first_name') }} : </label>
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">{{ __('user.last_name') }} : </label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">{{ __('user.phone') }} : </label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">{{ __('user.email') }} : </label>
                        <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">{{ __('user.about_me') }} : </label>
                        <textarea class="form-control" name="about_me" id="" cols="30" rows="10">{{ old('email', $user->about_me) }}</textarea>
                        {{-- <input type="text" class="form-control" name="about_me"> --}}
                    </div>

                    <div class="form-group mt-2">
                        <label for="name">{{ __('user.image') }} : </label>
                        <input type="file" class="form-control" name="image" value="{{ old('image', $user->image) }}">
                    </div>
                    <div class="form-group mt-2"  style="text-align: right;margin-right:10px">
                        <button class="btn btn-primary mt-2" >{{ __('general.save') }}</button>
                    </div>
                </form>
           

            </div>


        </div>


    </section>
    @if (Session::has('success'))
        <script>
            swal("Message", "{{ Session::get('success') }}", 'success', {
                button: true,
                button: "Ok",
                timer: 3000,
            })
        </script>
    @endif
    @if (Session::has('info'))
        <script>
            swal("Message", "{{ Session::get('info') }}", 'info', {
                button: true,
                button: "Ok",
                timer: 3000,
            })
        </script>
    @endif
@endsection
@section('script')
    <script src="{{ asset('js/feather-icons/dist/feather.min.js') }}"></script>
    <script>
        feather.replace();
    </script>

@endsection
