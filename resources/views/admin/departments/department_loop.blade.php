<tr class="bg-category-step{{ $department->step }}">
    <td>
        <label>
            <input class="category_check" name="bulk_ids[]" type="checkbox" value="{{ $department->id }}" />
            #{{ $department->id }}
        </label>
    </td>
    <td>
        <p class="m-0 d-flex">

            <i class="la {{ $department->icon_class }}"></i>
            {{-- @for ($i = 0; $i <= $department->step; $i++)
                <span class="category-loop-icon">
                    @if (!$department->step)
                        @if ($department->icon_class)
                        @else
                            <i class="la la-arrow-circle-up" data-toggle="tooltip" title="Category"></i>
                        @endif
                    @endif
                    @if ($department->step == 1 && $i == 1)
                        <i class="la la-chevron-circle-right" data-toggle="tooltip" title="Sub Category"></i>
                    @endif
                    @if ($department->step == 2 && $i == 2)
                        <i class="la la-tag" data-toggle="tooltip" title="Topic"></i>
                    @endif
                </span>
            @endfor --}}

            <span>{!! $department->name_ar !!}</span>
            @if ($department->is_top == 1)
                <span class='badge badge-secondary mx-2' data-toggle='tooltip' title="{{ __('top') }}"
                    style="height:18px;"><img src='{{ url('uploads/images/top-menu.png') }}'
                        style="height:11px;margin-top:1px;" /></span>
            @endif
        </p>
    </td>
    <td>
        <p class="m-0 d-flex">

            <i class="la {{ $department->icon_class }}"></i>


            <span>{!! $department->name_en !!}</span>
            @if ($department->is_top == 1)
                <span class='badge badge-secondary mx-2' data-toggle='tooltip' title="{{ __('top') }}"
                    style="height:18px;"><img src='{{ url('uploads/images/top-menu.png') }}'
                        style="height:11px;margin-top:1px;" /></span>
            @endif
        </p>
    </td>

    <td>
        <img src="{{ $department->image_url }}" alt="" width="200px" height="150px" />

    </td>
    <td>
        <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn btn-primary btn-sm"><i
                class="la la-pencil"></i> </a>
        <a href="{{ route('admin.departments.show', $department->slug) }}" class="btn btn-outline-info btn-sm"
            target="_blank"><i class="la la-eye"></i> </a>
        <a href="{{ route('admin.departments.delete', $department->slug) }}" class="btn btn-danger btn-sm"
            title="@lang('general.delete')"><i class="la la-trash-o"></i> </a>

    </td>
</tr>
