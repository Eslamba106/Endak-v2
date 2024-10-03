@extends('layouts.home')
@section('title')
    <?php $lang = config('app.locale'); ?>
    {{ $lang == 'ar' ? 'المنشورات' : 'Posts' }}
@endsection
@section('content')
    <div class="main-content app-content">
        <section>
            <div class="section banner-4 banner-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <div class="">
                                <p class="mb-3 content-1 h5 text-white">{{ __('general.add') }} <span
                                        class="tx-info-dark">{{ __('order.order') }}</span></p>
                                {{-- <p class="mb-0 tx-28">We Fight Passionately to Get Our Clients Every Time They Deserve</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">

                        <div class="card">
                            <div class="card-body">
                                <p class="h5 mb-4">{{ __('order.add_order') }}</p>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="form-horizontal  m-t-20" action="{{ route('web.posts.store') }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf


                                    <input class="form-control" type="hidden" value="{{ $department->id }}"
                                        name="department_id">
                                    @forelse ($department->inputs as $item)
                                        <label for="">{{ __('department.input_titles.' . $item->name) }}</label>
                                        <input class="form-control" type="text" name="{{ $item->name }}"
                                            placeholder="{{ __('department.input_titles.' . $item->name) }}">
                                    @empty
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label
                                                    for="">{{ __('general.title') }}</label>
                                                <input class="form-control" type="text" name="title"
                                                    placeholder="{{ __('general.title') }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label
                                                    for="">{{ __('general.price') }}</label>
                                                <input class="form-control" type="text" name="price"
                                                    placeholder="{{ __('general.price') }}">
                                            </div>
                                        </div>
                                    @endforelse

                                    {{-- @forelse ($department->inputs as $item)
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label
                                                    for="">{{ $lang == 'ar' ? $item->title_ar : $item->title_en }}</label>
                                                <input class="form-control" type="text" name="{{ $item->name }}"
                                                    placeholder="{{ $lang == 'ar' ? $item->title_ar : $item->title_en }}">
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse --}}

                                    <div class="">
                                        <button type="submit" class="btn btn-primary">{{ __('general.save') }}</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
{{-- <?= $lang = config('app.locale') ?> 
    <?php $current_url = url()->current();
    $url = explode('/', $current_url);
    $id = (int) end($url);
    dd($id);
    $department = App\Models\Department::where('id', $id)->first();
    dd($department);
    ?> --}}
{{-- <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="title">{{ __('general.title') }}</label>
                                            <input class="form-control" type="text" name="title"
                                                placeholder="{{ __('general.title') }}">
                                            <input class="form-control" type="hidden" value="{{ $department->id }}"
                                                name="department_id">
                                        </div>
                                    </div> --}}
{{-- 
                                    
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="description">{{ __('posts.Simple_Descriptoin') }}</label>
                                            <textarea class="form-control" rows="5" placeholder="{{ __('posts.Simple_Descriptoin') }}" name="description"></textarea>
                                        </div>
                                    </div>


                                    @if ($department->name_en == 'Car Maintenance' || $department->name_en == 'Air Conditioning Repair')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="modal">{{ __('posts.modal') }}</label>
                                                <input class="form-control" type="text" name="modal"
                                                    placeholder="{{ __('posts.modal') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Air Conditioning Repair')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="count">{{ __('posts.count') }}</label>
                                                <input class="form-control" type="text" name="count"
                                                    placeholder="{{ __('posts.count') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Car Maintenance' || $department->name_en == 'Spare Parts')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label
                                                    for="manufacturing_year">{{ __('posts.manufacturing_year') }}</label>
                                                <input class="form-control" type="text" name="manufacturing_year"
                                                    placeholder="{{ __('posts.manufacturing_year') }}">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="price">{{ __('posts.price') }}</label>
                                            <input class="form-control" type="text" name="price"
                                                placeholder="{{ __('posts.price') }}">
                                        </div>
                                    </div>
                                    @if ($department->name_en == 'Car Maintenance' || $department->name_en == 'Private Lessons' || $department->name_en == 'Calligrapher And Advertising' || $department->name_en == 'Water Filters' || $department->name_en == 'Cleaning Services' || $department->name_en == 'Party Preparation' || $department->name_en == 'Garden And Agriculture Coordination' || $department->name_en == 'Pest Control' || $department->name_en == 'Productive Families' || $department->name_en == 'Daily Workers And Craftsmen' || $department->name_en == 'Contracting' || $department->name_en == 'Public Services')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="city">{{ __('posts.city') }}</label>
                                                <input class="form-control" type="text" name="city"
                                                    placeholder="{{ __('posts.city') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Car Maintenance' || $department->name_en == 'Calligrapher And Advertising' || $department->name_en == 'Water Filters' || $department->name_en == 'Private Lessons' || $department->name_en == 'Cleaning Services' || $department->name_en == 'Contracting' || $department->name_en == 'Party Preparation' || $department->name_en == 'Garden And Agriculture Coordination' || $department->name_en == 'Pest Control' || $department->name_en == 'Daily Workers And Craftsmen' || $department->name_en == 'Public Services' || $department->name_en == 'Productive Families')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="neighborhood">{{ __('posts.neighborhood') }}</label>
                                                <input class="form-control" type="text" name="neighborhood"
                                                    placeholder="{{ __('posts.neighborhood') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Spare Parts' || $department->name_en == 'Trucks')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="from_city">{{ __('posts.from_city') }}</label>
                                                <input class="form-control" type="text" name="from_city"
                                                    placeholder="{{ __('posts.from_city') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Spare Parts' || $department->name_en == 'Trucks')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="from_neighborhood">{{ __('posts.from_neighborhood') }}</label>
                                                <input class="form-control" type="text" name="from_neighborhood"
                                                    placeholder="{{ __('posts.from_neighborhood') }}">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="from_floor">{{ __('posts.from_floor') }}</label>
                                            <input class="form-control" type="text" name="from_floor"
                                                placeholder="{{ __('posts.from_floor') }}">
                                        </div>
                                    </div> 
                                     <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="from_house">{{ __('posts.from_house') }}</label>
                                            <input class="form-control" type="text" name="from_house"
                                                placeholder="{{ __('posts.from_house') }}">
                                        </div>
                                    </div> 
                                    @if ($department->name_en == 'Spare Parts' || $department->name_en == 'Trucks')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="from_city">{{ __('posts.to_city') }}</label>
                                                <input class="form-control" type="text" name="to_city"
                                                    placeholder="{{ __('posts.to_city') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Spare Parts' || $department->name_en == 'Trucks')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="to_neighborhood">{{ __('posts.to_neighborhood') }}</label>
                                                <input class="form-control" type="text" name="to_neighborhood"
                                                    placeholder="{{ __('posts.to_neighborhood') }}">
                                            </div>
                                        </div>
                                    @endif
                                     <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="to_floor">{{ __('posts.to_floor') }}</label>
                                            <input class="form-control" type="text" name="to_floor"
                                                placeholder="{{ __('posts.to_floor') }}">
                                        </div>
                                    </div> 
                                     <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="to_house">{{ __('posts.to_house') }}</label>
                                            <input class="form-control" type="text" name="to_house"
                                                placeholder="{{ __('posts.to_house') }}">
                                        </div>
                                    </div> 


                                     <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="exampleInputEmail1"></label>
                                            <input class="form-control" type="text" name="days_count"
                                                placeholder="{{ __('posts.days_count') }}">
                                        </div>
                                    </d
                                    @if ($department->name_en == 'Car Maintenance')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="explain">{{ __('posts.explain') }}</label>
                                                <input class="form-control" type="text" name="explain"
                                                    placeholder="{{ __('posts.explain') }}">
                                            </div>
                                        </div>
                                    @endif
                                     <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="section">{{ __('posts.section') }}</label>
                                            <input class="form-control" type="text" name="section"
                                                placeholder="{{ __('posts.section') }}">
                                        </div>
                                    </div> 
                                     <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="code_number">{{ __('posts.code_number') }}</label>
                                            <input class="form-control" type="text" name="code_number"
                                                placeholder="{{ __('posts.code_number') }}">
                                        </div>
                                    </div> 
                                    @if ($department->name_en == 'Spare Parts')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="name">{{ __('posts.name') }}</label>
                                                <input class="form-control" type="text" name="name"
                                                    placeholder="{{ __('posts.name') }}">
                                            </div>
                                        </div>
                                    @endif
                                     <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="cars">{{ __('posts.cars') }}</label>
                                            <input class="form-control" type="text" name="cars"
                                                placeholder="{{ __('posts.cars') }}">
                                        </div>
                                    </div> 
                                    @if ($department->name_en == 'Air Conditioning Repair')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="clean">{{ __('posts.clean') }}</label>
                                                <input class="form-control" type="text" name="clean"
                                                    placeholder="{{ __('posts.clean') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Air Conditioning Repair')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="Verion">{{ __('posts.Verion') }}</label>
                                                <input class="form-control" type="text" name="Verion"
                                                    placeholder="{{ __('posts.Verion') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Air Conditioning Repair')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="fixed">{{ __('posts.fixed') }}</label>
                                                <input class="form-control" type="text" name="fixed"
                                                    placeholder="{{ __('posts.fixed') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Surveillance System And Cameras')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="fingerprint">{{ __('posts.fingerprint') }}</label>
                                                <input class="form-control" type="text" name="fingerprint"
                                                    placeholder="{{ __('posts.fingerprint') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Surveillance System And Cameras')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="system_security">{{ __('posts.system_security') }}</label>
                                                <input class="form-control" type="text" name="system_security"
                                                    placeholder="{{ __('posts.system_security') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Surveillance System And Cameras')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="smart">{{ __('posts.smart') }}</label>
                                                <input class="form-control" type="text" name="smart"
                                                    placeholder="{{ __('posts.smart') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Surveillance System And Cameras')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="camera">{{ __('posts.camera') }}</label>
                                                <input class="form-control" type="text" name="camera"
                                                    placeholder="{{ __('posts.camera') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Spare Parts' || $department->name_en == 'Air Conditioning Repair')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="type">{{ __('posts.type') }}</label>
                                                <input class="form-control" type="text" name="type"
                                                    placeholder="{{ __('posts.type') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Surveillance System And Cameras')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="fire_system">{{ __('posts.fire_system') }}</label>
                                                <input class="form-control" type="text" name="fire_system"
                                                    placeholder="{{ __('posts.fire_system') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Surveillance System And Cameras')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="networks">{{ __('posts.networks') }}</label>
                                                <input class="form-control" type="text" name="networks"
                                                    placeholder="{{ __('posts.networks') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Private Lessons')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="gender">{{ __('posts.gender') }}</label>
                                                <input class="form-control" type="text" name="gender"
                                                    placeholder="{{ __('posts.gender') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Productive Families')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="food">{{ __('posts.food') }}</label>
                                                <input class="form-control" type="text" name="food"
                                                    placeholder="{{ __('posts.food') }}">
                                            </div>
                                        </div>
                                    @endif
                                     <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="size">{{ __('posts.size') }}</label>
                                            <input class="form-control" type="text" name="size"
                                                placeholder="{{ __('posts.size') }}">
                                        </div>
                                    </div> 
                                    @if ($department->name_en == 'Heavy Equipment' || $department->name_en == 'Party Preparation' || $department->name_en == 'Cleaning Services' || $department->name_en == 'Contracting' || $department->name_en == 'Productive Families')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="date">{{ __('posts.date') }}</label>
                                                <input class="form-control" type="date" name="date"
                                                    placeholder="{{ __('posts.date') }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($department->name_en == 'Productive Families')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="time">{{ __('posts.time') }}</label>
                                                <input class="form-control" type="text" name="time"
                                                    placeholder="{{ __('posts.time') }}">
                                            </div>
                                        </div>
                                    @endif




                                    @if ($department->name_en == 'Car Maintenance' || $department->name_en == 'Pest Control' || $department->name_en == 'Garden And Agriculture Coordination' || $department->name_en == 'Party Preparation' || $department->name_en == 'Spare Parts' || $department->name_en == 'Heavy Equipment' || $department->name_en == 'Air Conditioning Repair' || $department->name_en == 'Daily Workers And Craftsmen' || $department->name_en == 'Calligrapher And Advertising' || $department->name_en == 'Water Filters' || $department->name_en == 'Contracting' || $department->name_en == 'Public Services')
                                        <div class="mb-3">
                                            <div class="col-xs-12">
                                                <label for="image">{{ __('general.image') }}</label>
                                                <input class="form-control" type="file" name="image"
                                                    placeholder="{{ __('general.image') }}">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="notes">{{ __('posts.notes') }}</label>
                                            <textarea class="form-control" rows="5" placeholder="{{ __('posts.notes') }}" name="notes"></textarea>
                                        </div>
                                    </div>
                                    @if ($department->name_en == 'Car Maintenance' || $department->name_en == 'Heavy Equipment')
                                        <div class="card-body">
                                            <div id="upload-container" class="text-center">
                                                <button id="browseFile"
                                                    class="btn btn-primary">{{ __('posts.Brows_Course_Video') }}</button>
                                            </div>
                                            <div class="progress mt-3" style="height: 25px">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                    role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 0; height: 100%">0%</div>
                                            </div>

                                        </div>
                                    @endif --}}


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

    {{-- <script type="text/javascript">
        let browseFile = $('#browseFile');
        let resumable = new Resumable({
            target: '{{ route('web.files.upload.large') }}',
            query: {
                _token: '{{ csrf_token() }}'
            }, // CSRF token
            fileType: ['mp4'],
            headers: {
                'Accept': 'application/json'
            },
            testChunks: false,
            throttleProgressCallbacks: 1,
        });

        resumable.assignBrowse(browseFile[0]);

        resumable.on('fileAdded', function(file) { // trigger when file picked
            showProgress();
            resumable.upload() // to actually start uploading.
        });

        resumable.on('fileProgress', function(file) { // trigger when file progress update
            updateProgress(Math.floor(file.progress() * 100));
        });

        resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
            response = JSON.parse(response)
            $('#videoPreview').attr('src', response.path);
            $('.card-footer').show();
        });

        resumable.on('fileError', function(file, response) { // trigger when there is any error
            alert('file uploading error.')
        });


        let progress = $('.progress');

        function showProgress() {
            progress.find('.progress-bar').css('width', '0%');
            progress.find('.progress-bar').html('0%');
            progress.find('.progress-bar').removeClass('bg-success');
            progress.show();
        }

        function updateProgress(value) {
            progress.find('.progress-bar').css('width', $ {
                value
            } % )
            progress.find('.progress-bar').html($ {
                value
            } % )
        }

        function hideProgress() {
            progress.hide();
        }
    </script> --}}
@endsection
