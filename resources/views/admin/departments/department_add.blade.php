@extends('layouts.dashboard.dashboard')

@section('title')
    {{ __('department.create_department') }}
@endsection

@section('content')
    <?php $lang = config('app.locale'); ?>

    <a href="{{ route('admin.departments') }}" class="btn btn-secondary btn-xl mr-1" data-toggle="tooltip"
        title="@lang('department.departments')"> <i class="la la-folder-open"></i> </a>

    {{-- <button type="submit" form="form-department" class="btn btn-success btn-xl" data-toggle="tooltip" title="@lang('departments.save')"> <i class="la la-save"></i> </button> --}}
    <form action="{{ route('admin.departments.store') }}" id="form-departments" method="post" enctype="multipart/form-data">
        @csrf

        {{-- <div class="row"> --}}

        <div class="col-md-12">

            <div class="form-group row {{ $errors->has('name_ar') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="department_name">@lang('department.name_ar') <em>*</em></label>
                <div class="col-sm-7">
                    <input type="text" name="name_ar" value="" placeholder="@lang('department.name_ar')"
                        id="department_name_ar" class="form-control">
                    {!! $errors->has('name_ar') ? '<p class="help-block">' . $errors->first('name_ar') . '</p>' : '' !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('name_en') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="department_name_en">@lang('department.name_en') <em>*</em></label>
                <div class="col-sm-7">
                    <input type="text" name="name_en" value="" placeholder="@lang('department.name_en')"
                        id="department_name_en" class="form-control">
                    {!! $errors->has('name_en') ? '<p class="help-block">' . $errors->first('name_en') . '</p>' : '' !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('parent') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="parent">@lang('department.parent') </label>
                <div class="col-sm-7">
                    <select name="parent" id="parent" class="form-control select2">
                        <option value="0">@lang('department.main')</option>
                        @if ($departments->count() > 0)
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"> {!! $lang == 'ar' ? $department->name_ar : $department->name_en !!} </option>
                                @foreach ($department->sub_Departments as $sub_Department)
                                    <option value="{{ $sub_Department->id }}"> &nbsp;&nbsp;&nbsp; &raquo;
                                        {!! $lang == 'ar' ? $sub_Department->name_ar : $sub_Department->name_en !!} </option>
                                @endforeach
                            @endforeach
                        @endif
                    </select>

                    {!! $errors->has('parent') ? '<p class="help-block">' . $errors->first('parent') . '</p>' : '' !!}
                </div>
            </div>


            {{-- <div class="form-group row">
                    <label class="col-sm-3 control-label">{{__('department.select_icon')}}</label>
                    <div class="col-sm-7">
                        <select class="form-control select2icon" name="icon_class">
                            <option value="0">{{__('department.select_icon')}}</option>
                            @foreach (icon_classes() as $icon => $val)
                                <option value="{{ $icon }}" data-icon="{{ $icon }}">{{ $icon }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

            {{-- <div class="form-group row {{ $errors->has('image')? 'has-error':'' }} image-container-row">
                    <label class="col-sm-3 control-label">{{__('image')}} <em>*</em></label>
                    <div class="col-sm-7">
                        {!! image_upload_form('image', null, [750,422]) !!}
                        {!! $errors->has('image')? '<p class="help-block">'.$errors->first('image').'</p>':'' !!}
                    </div>
                </div> --}}

            <div class="form-group row {{ $errors->has('image') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="image">@lang('department.image')
                    {{-- <br /><span><small class="help-text text-muted">{{ __('max_100_chars') }}</small></span> --}}
                </label>
                <div class="col-sm-7">
                    <input type="file" name="image" value="" placeholder="@lang('department.image')" id="image"
                        class="form-control">
                    {!! $errors->has('image') ? '<p class="help-block">' . $errors->first('image') . '</p>' : '' !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('description_ar') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="description_ar">@lang('department.description_ar') </label>
                <div class="col-sm-7">
                    <textarea name="description_ar" placeholder="@lang('department.description_ar')" id="description_ar" class="form-control"></textarea>
                    {!! $errors->has('description_ar') ? '<p class="help-block">' . $errors->first('description_ar') . '</p>' : '' !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('description_en') ? 'has-error' : '' }} ">
                <label class="col-sm-3 control-label" for="description_en">@lang('department.description_en') </label>
                <div class="col-sm-7">
                    <textarea name="description_en" placeholder="@lang('department.description_en')" id="description_en" class="form-control"></textarea>
                    {!! $errors->has('description_en') ? '<p class="help-block">' . $errors->first('description_en') . '</p>' : '' !!}
                </div>
            </div>
            {{-- <div class="form-group row {{ $errors->has('topics') ? ' has-error' : '' }}">
                <label class="mb-3 col-sm-3 control-label">{{ __('topics') }} <span style="color:red;">*</span></label>
                <div class="col-sm-7">
                    <?php $categories = App\Models\Category::get(); ?>


                    @if ($categories->count())
                        <select name="topics[]" id="tags" class="form-control topics select2" multiple="multiple">
                            <option value="">{{ __('category.select_category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ ($lang == 'ar') ? $category->category_name_ar : $category->category_name_en }}</option>
                 
                            @endforeach
                        </select>
                    @endif
                    @if ($errors->has('category_id'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                    @endif
                </div>
            </div> --}}
            {{-- <div class="form-group row {{ $errors->has('topics') ? ' has-error' : '' }}">
                <label class="mb-3 col-sm-3 control-label">{{ __('category.topics') }} <span style="color:red;">*</span></label>
                <?php $categories = App\Models\Category::get(); ?>
                <div class="col-sm-7">
                    @if ($categories->count())
                        <select name="topics[]" id="topics" class="form-control topics" multiple="multiple">
                            <option value="">{{ __('category.select_category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name_ar }}</option>
                                <optgroup">
                                    @if ($category->sub_categories->count())
                                        @foreach ($category->sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}">
                                                {{ $sub_category->category_name }}
                                            </option>
                                            @if ($sub_category->sub_categories->count())
                                                @foreach ($sub_category->sub_categories as $sub_category)
                                                    <option value="{{ $sub_category->id }}">
                                                        {{ $sub_category->category_name }}
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
                </div> --}}

            {{-- </div> --}}
            <div class="form-group row {{ $errors->has('inputs') ? ' has-error' : '' }}">
                <label class="mb-3 col-sm-3 control-label">{{ __('department.inputs') }} <span style="color:red;">*</span></label>
                <div class="col-sm-7">
                    <?php $all_inputs = App\Models\Inputs::get(); ?>

                    @if ($all_inputs->count() != 0)
                        <select name="inputs[]" id="tags" class="form-control inputs select2" multiple="multiple">
                            <option value="">{{ __('department.select_input') }}</option>
                            @foreach ($all_inputs as $input)
                                <option value="{{ $input->id }}" >
                                    {{ ($lang == 'ar') ? $input->title_ar : $input->title_en }}</option>
                            @endforeach
                        </select>
                    @endif
                
                </div>
            </div>


            <div class="form-group row {{ $errors->has('products') ? ' has-error' : '' }}">
                <label class="mb-3 col-sm-3 control-label">{{ __('products.products') }} <span style="color:red;">*</span></label>
                <div class="col-sm-7">
                    <?php $all_products = App\Models\Product::get(); ?>


                    @if ($all_products->count())
                        <select name="products[]" id="tags" class="form-control products select2" multiple="multiple">
                            <option value="">{{ __('department.select_product') }}</option>
                            @foreach ($all_products as $product)
                                <option value="{{ $product->id }}" >
                                    {{ ($lang == 'ar') ? $product->name_ar : $product->name_en }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @if ($errors->has('category_id'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                    @endif
                </div>
            </div>
            {{-- <select class="form-control tags" multiple="multiple">
                    <option selected="selected">orange</option>
                    <option>white</option>
                    <option selected="selected">purple</option>
                  </select> --}}
            <div class="form-group row">
                <label class="col-sm-3 control-label" for="description">@lang('department.status')</label>
                <div class="col-sm-7">
                    <label><input type="radio" name="status" value="1" checked="checked">
                        {{ __('publish') }}</label> <br />
                    <label><input type="radio" name="status" value="0"> {{ __('unpublish') }}</label>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-7 offset-3">
                    <button type="submit" class="btn btn-success btn-xl" title="@lang('department.save')"> <i
                            class="la la-save"></i> {{ __('save') }} </button>
                </div>
            </div>


        </div>

        {{-- </div> --}}

    </form>

@endsection

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
                $('#department_image').val(0);
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
