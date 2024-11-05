@extends('layouts.dashboard.dashboard')
@section('title')
    {{ __('department.edit_department') }}
@endsection

@section('content')
    <?php $lang = config('app.locale'); ?>
    {{-- <div class="row"> --}}
    <div class="col-md-12">

        <form action="" id="form-category" method="post" enctype="multipart/form-data"> @csrf

            <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="name_ar">@lang('department.name_ar')<em>*</em></label>
                <div class="col-sm-7">
                    <input type="text" name="name_ar" value="{{ $department->name_ar }}" placeholder="@lang('departments.name_ar')"
                        id="name_ar" class="form-control">
                    {!! $errors->has('name_ar') ? '<p class="help-block">' . $errors->first('name_ar') . '</p>' : '' !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('name_en') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="name_en">@lang('department.name_en')<em>*</em></label>
                <div class="col-sm-7">
                    <input type="text" name="name_en" value="{{ $department->name_en }}" placeholder="@lang('departments.name_en')"
                        id="name_en" class="form-control">
                    {!! $errors->has('name_en') ? '<p class="help-block">' . $errors->first('name_en') . '</p>' : '' !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('parent') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="parent">@lang('department.parent')</label>
                <div class="col-sm-7">
                    <select name="parent" id="parent" class="form-control select2">
                        <option value="0">@lang('department.main')</option>
                        @if ($departments->count() > 0)
                            @foreach ($departments as $parent)
                                <option value="{{ $parent->id }}">
                                    {{ $lang == 'ar' ? $parent->name_ar : $parent->name_en }} </option>

                                @foreach ($parent->sub_Departments as $subDepartment)
                                    <option value="{{ $subDepartment->id }}"
                                        {{ selected($department->department_id, $subDepartment->id) }}> &nbsp;&nbsp;&nbsp;
                                        &raquo; {!! $lang == 'ar' ? $subDepartment->name_ar : $subDepartment->name_en !!} </option>
                                @endforeach
                            @endforeach
                        @endif
                    </select>

                    {!! $errors->has('parent') ? '<p class="help-block">' . $errors->first('parent') . '</p>' : '' !!}
                </div>
            </div>

            {{-- <div class="form-group row">
                    <label class="col-sm-3 control-label">{{__('select_icon')}}</label>
                    <div class="col-sm-7">
                        <select class="form-control select2icon" name="icon_class">
                            <option value="0">{{__('select_icon')}}</option>
                            @foreach (icon_classes() as $icon => $val)
                                <option value="{{$icon}}" {{selected($icon, $department->icon_class)}} data-icon="{{$icon}}">{{$icon}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

            <div class="form-group row {{ $errors->has('image') ? 'has-error' : '' }} image-container-row">
                <label class="col-sm-3 control-label">{{ __('department.image') }} <em>*</em></label>
                <div class="col-sm-7">
                    {{-- {!! 'image', $department->image_url, !!} --}}
                    <input type="file" name="image" class="form-control">
                    {!! $errors->has('image') ? '<p class="help-block">' . $errors->first('image') . '</p>' : '' !!}
                </div>
            </div>

            {{-- <div class="form-group row {{ $errors->has('title')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="title">@lang('admin.title') 
                        <br /><span><small class="help-text text-muted">{{ __('max_100_chars') }}</small></span>
                    </label>
                    <div class="col-sm-7">
                        <input type="text" name="title" value="{{ ($department->title) ? $department->title : '' }}" placeholder="@lang('admin.title')" id="title" class="form-control">
                        {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':'' !!}
                    </div>
                </div> --}}
            <div class="form-group row {{ $errors->has('description_ar') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="description_ar">@lang('department.description_ar') </label>
                <div class="col-sm-7">
                    <textarea name="description_ar" placeholder="@lang('department.description_ar')" id="description_ar" class="form-control">{{ $department->description_ar ? $department->description_ar : '' }}</textarea>
                    {!! $errors->has('description_ar') ? '<p class="help-block">' . $errors->first('description_ar') . '</p>' : '' !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('description_en') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="description_en">@lang('department.description_en') </label>
                <div class="col-sm-7">
                    <textarea name="description_en" placeholder="@lang('department.description_en')" id="description_en" class="form-control">{{ $department->description_en ? $department->description_en : '' }}</textarea>
                    {!! $errors->has('description_en') ? '<p class="help-block">' . $errors->first('description_en') . '</p>' : '' !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('topics') ? ' has-error' : '' }}">
                <label class="mb-3 col-sm-3 control-label">{{ __('topics') }} <span style="color:red;">*</span></label>
                <div class="col-sm-7">
                    <?php $categories = App\Models\Category::get(); ?>


                    @if ($categories->count())
                        <select name="topics[]" id="tags" class="form-control topics select2" multiple="multiple">
                            <option value="">{{ __('category.select_category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ($department->topics) ? selected($department->topics->contains($category->id))  : '' }}>{{ $category->category_name_ar }}</option>
                 
                            @endforeach
                        </select>
                    @endif
                    @if ($errors->has('category_id'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('inputs') ? ' has-error' : '' }}">
                <label class="mb-3 col-sm-3 control-label">{{ __('inputs') }} <span style="color:red;">*</span></label>
                <div class="col-sm-7">
                    <?php $all_inputs = App\Models\Inputs::get(); ?>


                    @if ($all_inputs->count())
                        <select name="inputs[]" id="inputs" class="form-control inputs select2" multiple="multiple">
                            <option value="">{{ __('department.select_input') }}</option>
                            @foreach ($all_inputs as $input)
                                <option value="{{ $input->id }}" {{ ($department->inputs) ? selected($department->inputs->contains($input->id))  : '' }}>{{ $input->title_ar }}</option>
                 
                            @endforeach
                        </select>
                    @endif
                    @if ($errors->has('inputs'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('inputs') }}</strong></span>
                    @endif
                </div>
            </div>
{{-- 
            <div class="form-group row {{ $errors->has('products') ? ' has-error' : '' }}">
                <label class="mb-3 col-sm-3 control-label">{{ __('products') }} <span style="color:red;">*</span></label>
                <div class="col-sm-7">
                    <?php $all_products = App\Models\Product::get(); ?>


                    @if ($all_products->count())
                        <select name="products[]" id="product" class="form-control products select2" multiple="multiple">
                            <option value="">{{ __('category.select_category') }}</option>
                            @foreach ($all_products as $product)
                                <option value="{{ $product->id }}" {{ ($department->products) ? selected($department->products->contains($product->id))  : '' }}>
                                    {{ ($lang == 'ar') ? $product->name_ar : $product->name_en }}</option>
                 
                            @endforeach
                        </select>
                    @endif
                    @if ($errors->has('products'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('products') }}</strong></span>
                    @endif
                </div>
            </div> --}}

                    {{-- @if ($categories->count())
                        <select name="topics[]" id="topics" class="form-control topics" multiple="multiple">
                            <option value="">{{ __('category.select_category') }}</option>
                            @foreach ($categories as $category)
                                <optgroup label="{{ $category->category_name_ar }}">
                                    <option value="{{ $category->id }}">
                                        {{ $category->category_name_ar }}
                                    </option>

                                    @if ($category->sub_categories->count())
                                        @foreach ($category->sub_categories as $sub_category)
                                                <option value="{{ $sub_category->id }}" >
                                                    {{ $sub_category->category_name }}
                                                </option>
                                                {{ $sub_category->category_name }}
                                         
                                            @if ($sub_category->sub_categories->count())
                                                @foreach ($sub_category->sub_categories as $inner_sub_category)
                                                    <option value="{{ $inner_sub_category->id }}">
                                                        {{ $inner_sub_category->category_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </optgroup>
                            @endforeach
                        </select>
                    @endif --}}
            {{-- <div class="form-group {{ $errors->has('topics') ? ' has-error' : '' }} row">


                <label class="col-sm-3 control-label" for="status">{{ __a('topics') }} <span
                        style="color:red;">*</span></label>
                <div class="col-sm-7">
                    <?php $categories = App\Category::get(); ?>
                    @if ($categories->count())
                        <select name="topics[]" id="topics" class="form-control select2" multiple>
                            <option value="">{{ __t('select_category') }}</option>
                            @foreach ($categories as $category)
                                <optgroup label="{{ $category->category_name }}">
                                    @if ($category->sub_categories->count())
                                        @foreach ($category->sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}"
                                                {{ $offer->topics ? selected($offer->topics->contains($sub_category->id)) : '' }}>
                                                &nbsp;&nbsp;&nbsp;&nbsp;{{ $sub_category->category_name }}
                                            </option>
                                            @if ($sub_category->sub_categories->count())
                                                @foreach ($sub_category->sub_categories as $sub_category)
                                                    <option value="{{ $sub_category->id }}">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $sub_category->category_name }}
                                                    </option>
                                                @endforeach
                                            @endif

                                            <!-- <option value="{{ $sub_category->id }}">
                                       {{ $sub_category->category_name }}
                                   </option> -->
                                        @endforeach
                                    @endif
                                </optgroup>
                            @endforeach
                        </select>
                    @endif
                    
                    @if ($errors->has('category_id'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                    @endif
                </div>
            </div> --}}

            <div class="form-group row">
                <label class="col-sm-3 control-label">@lang('department.status')</label>
                <div class="col-sm-7">
                    <label><input type="radio" name="status" value="1"
                            @if ($department->status == 1) checked="checked" @endif> {{ __('publish') }}</label> <br />
                    <label><input type="radio" name="status" value="0"
                            @if ($department->status == 0) checked="checked" @endif> {{ __('unpublish') }}</label>
                </div>
            </div>



            <div class="form-group row">
                <div class="col-sm-7 offset-3">
                    <button type="submit" form="form-category" class="btn btn-success btn-xl" data-toggle="tooltip"
                        title="@lang('general.save')"> <i class="la la-save"></i> {{ __('general.save') }} </button>
                </div>
                {{-- </div> --}}

        </form>


    </div>


    </div>



@endsection

{{-- @section('js')
    <script src="{{ asset('js/tagify.js') }}"></script>
    <script src="{{ asset('js/tagify.polyfills.min.js') }}"></script>
    <script>
        var inputElm = document.querySelector('[id=tags]');
        tagify = new Tagify(inputElm);
    </script>
@endsection --}}
@section('js')
    <script>
        $(".topics").select2({
            topics: true,
            tokenSeparators: [',', ' ']
        })
    </script>
    <script type="text/javascript">
        $(document).on('change', '#parent', function(e) {
            if ($(this).val() != 0) {
                $('.image-container-row').hide();
                $('#category_image').val(0);
            } else {
                $('.image-container-row').show();
            }
        });
        $('#parent').trigger('change');
    </script>
    <script>
        $(".inputs").select2({
            topics: true,
            tokenSeparators: [',', ' ']
        })
    </script>
    <script>
        $(".products").select2({
            topics: true,
            tokenSeparators: [',', ' ']
        })
    </script>

@endsection 
            <!--    {{-- <optgroup">
                                    @if ($category->sub_categories->count())
                                        @foreach ($category->sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}">
                                                {{-- {{ $department->topics ? @selected($department->topics->contains($sub_category->id)) : '' }}> --}}
                                                {{-- {{ $sub_category->category_name }} --}}
                                            </option>
                                            {{-- @if ($sub_category->sub_categories->count())
                                                @foreach ($sub_category->sub_categories as $sub_category)
                                                    <option value="{{ $sub_category->id }}">
                                                        {{ $sub_category->category_name }}
                                                    </option>
                                                @endforeach
                                            @endif --}}

                                            {{-- <option value="{{ $sub_category->id }}">
                                            {{ $sub_category->category_name }}
                                        </option>  
                                        @endforeach
                                    @endif
                                    </optgroup> --}} -->