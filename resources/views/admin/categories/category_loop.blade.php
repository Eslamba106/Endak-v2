<tr class="bg-category-step{{$category->step}}">
    <td>
        <label>
            <input class="category_check" name="bulk_ids[]" type="checkbox" value="{{$category->id}}" /> #{{$category->id}}
        </label>
    </td>
    <td>
        <p class="m-0 d-flex">

            @for($i = 0; $i<=$category->step; $i++)
                <span class="category-loop-icon">
                    @if( ! $category->step)
                        @if($category->icon_class)
                            <i class="la {{$category->icon_class}}" data-toggle="tooltip" title="Category"></i>
                        @else
                            <i class="la la-arrow-circle-up" data-toggle="tooltip" title="Category"></i>
                        @endif
                    @endif
                    @if( $category->step == 1 && $i == 1)
                        <i class="la la-chevron-circle-right" data-toggle="tooltip" title="Sub Category"></i>
                    @endif
                    @if( $category->step == 2 && $i == 2)
                        <i class="la la-tag" data-toggle="tooltip" title="Topic"></i>
                    @endif
                </span>
            @endfor

            <span>{!! $category->category_name_ar !!}</span>
            @if($category->is_top == 1)
                <span class='badge badge-secondary mx-2'  data-toggle='tooltip' title="{{ __('top') }}" style="height:18px;"><img src='{{ url("uploads/images/top-menu.png") }}' style="height:11px;margin-top:1px;"/></span>
            @endif
        </p>
    </td>
    <td>
        <p class="m-0 d-flex">

            @for($i = 0; $i<=$category->step; $i++)
                <span class="category-loop-icon">
                    @if( ! $category->step)
                        @if($category->icon_class)
                            <i class="la {{$category->icon_class}}" data-toggle="tooltip" title="Category"></i>
                        @else
                            <i class="la la-arrow-circle-up" data-toggle="tooltip" title="Category"></i>
                        @endif
                    @endif
                    @if( $category->step == 1 && $i == 1)
                        <i class="la la-chevron-circle-right" data-toggle="tooltip" title="Sub Category"></i>
                    @endif
                    @if( $category->step == 2 && $i == 2)
                        <i class="la la-tag" data-toggle="tooltip" title="Topic"></i>
                    @endif
                </span>
            @endfor

            <span>{!! $category->category_name_en !!}</span>
            @if($category->is_top == 1)
                <span class='badge badge-secondary mx-2'  data-toggle='tooltip' title="{{ __('top') }}" style="height:18px;"><img src='{{ url("uploads/images/top-menu.png") }}' style="height:11px;margin-top:1px;"/></span>
            @endif
        </p>
    </td>
    {{-- <td>
        @if($category->image_id)
            <img src="{{  $category->image_url }}" alt="" class="img-thumbnail img-50X50" />
        @endif
    </td>
    <td>
        @if($category->step == 0)
        <img src="{{$category->image_url}}" alt="" class="img-thumbnail img-50X50" />
        @endif
    </td> --}}
    <td>
        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i> </a>
        {{-- <a href="#" class=" ml-1 mb-2 btn btn-danger btn_delete" data-toggle="tooltip" title="@lang('admin.delete')"><i class="la la-trash-o"></i> </a> --}}

        <a href="{{route('admin.categories.delete', $category->slug)}}" class="btn btn-danger btn-sm" target="_blank"><i class="la la-trash-o"></i> </a>
    </td>
</tr>
