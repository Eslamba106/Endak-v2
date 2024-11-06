@extends('layouts.home')
@section('title')
    {{ __('department.departments') }}
@endsection

@section('style')
    <!-- CSS Bootstrap -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <!-- JavaScript Bootstrap و JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('content')
    <?php
    $lang = config('app.locale');
    $current_url = url()->current();
    $url = explode('/', $current_url);
    $id = (int) end($url);
    // $main_department = App\Models\Department::where('id', $id)->first();
    
    ?>
    <div class="main-content app-content">
        <section>
            <div class="section banner-4 banner-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <div class="">
                                <p class="mb-3 content-1 h5 text-white">{{ __('department.departments') }} <span
                                        class="tx-info-dark">{{ __('general.center') }}</span></p>
                                {{-- <p class="mb-0 tx-28">We Fight Passionately to Get Our Clients Every Time They Deserve</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <form action="" method="get">
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="section">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="row">
                                                @forelse ($products as $item)
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            @if ($item->image)
                                                                <div class="position-relative">
                                                                    <a href="blog-details.html">
                                                                        <img class="card-img-top"
                                                                            src="{{ $item->image_url }}" alt="img">
                                                                    </a>
                                                                    {{-- <span class="badge bg-secondary blog-badge"></span> --}}
                                                                </div>
                                                            @endif
                                                            <div class="card-body d-flex flex-column">
                                                                <h5><a
                                                                        href="">{{ $lang == 'ar' ? $item->name_ar : $item->name_en }}</a>
                                                                </h5>
                                                                <div class="tx-muted">
                                                                    {{ $lang == 'ar' ? $item->description_ar : $item->description_en }}
                                                                </div>
                                                                <div class="d-flex align-items-center pt-4 mt-auto">
                                                                    {{-- <div class="avatar me-3 cover-image rounded-circle">
                                                                        <img src="../assets/images/profile/1.jpg"
                                                                            class="rounded-circle" alt="img"
                                                                            width="40">
                                                                    </div> --}}
                                                                    <div>
                                                                        {{-- <a href="javascript:void(0);" class="h6">{{ $item->author->name }}</a> --}}
                                                                        <small
                                                                            class="d-block tx-muted">{{ $item->created_at->diffForHumans() }}</small>
                                                                    </div>
                                                                    {{-- <div class="ms-auto">
                                                                        <a href="javascript:void(0)"
                                                                            class="icon d-inline-block tx-muted">
                                                                            <i
                                                                                class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i>
                                                                        </a>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    {!! no_data() !!}
                                                @endforelse

                                                {{-- {!! $products->links() !!} --}}
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="h5 mb-4">Tags</p>
                                                    <div class="tags">

                                                        @foreach ($categories as $category)
                                                            {{-- <div> --}}
                                                            <div class="tag">
                                                                <input type="checkbox" name="category[]"
                                                                    value="{{ $category->id }}"
                                                                    {{ in_array('category', request('category', [])) ? 'checked' : '' }}>
                                                                <label for="category-{{ $category->id }}">
                                                                    {{ $lang == 'ar' ? $category->category_name_ar : $category->category_name_en }}
                                                                </label>
                                                            </div>

                                                            {{-- </div> --}}
                                                        @endforeach
                                                    </div>
                                                    <button type="submit" name="bulk_action_btn" value="filter"
                                                        class="btn btn-primary mt-3 mr-2">
                                                        <i class="la la-refresh"></i>{{ __('products.filter') }}
                                                    </button>
                                                </div>
                                            </div>
                                            @if (auth()->check())
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="m-2 d-inline">
                                                            <a href="#"
                                                                class="btn btn-sm btn-outline-primary mr-2 mb-4"
                                                                data-category_id="" data-toggle="modal"
                                                                data-target="#category_id">{{ __('order.add_order') }}</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>




                    </div>
                </div>
            </section>
        </form>


        <div class="modal fade" id="category_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('order_item') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">{{ __('general.title') }}</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('general.price') }}</label>
                                <input class="form-control" type="text" name="price">
                                <input class="form-control" type="hidden" name="department_id" value="{{ $id }}">
                            </div>
                            @foreach ($products as $product)
                                <div class="form-group mt-2 d-flex align-items-center">
                                    <!-- خانة اختيار متعددة للمنتج -->
                                    <input type="checkbox" name="selected_products[]" id="product-{{ $product->id }}"
                                        value="{{ $product->id }}" class="m-2">

                                    <!-- اسم المنتج وحقل إدخال الكمية -->
                                    <div class="d-flex align-items-center justify-content-between m-2">
                                        <label for="product-{{ $product->id }}" class="ml-2 mr-3">
                                            {{ $lang == 'ar' ? $product->name_ar : $product->name_en }}
                                        </label>

                                        <!-- حقل إدخال الكمية -->
                                        <input class="form-control m-2" type="number"
                                            name="quantities[{{ $product->id }}]" placeholder="Enter quantity"
                                            style="display: none; width: 100px;" id="quantity-{{ $product->id }}"
                                            min="1">
                                    </div>
                                </div>
                            @endforeach







                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('general.cancel') }}</button>
                            <button type="submit" class="btn btn-success">{{ __('general.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.querySelectorAll('input[type=checkbox][name="selected_products[]"]').forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                const quantityInput = document.getElementById(`quantity-${this.value}`);
                if (this.checked) {
                    quantityInput.style.display = 'block';
                } else {
                    quantityInput.style.display = 'none';
                    quantityInput.value = '';
                }
            });
        });
    </script>
    {{-- <script>
        document.querySelectorAll('input[type=radio][name=selected_product]').forEach((radio) => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('input[type=number][name^=quantities]').forEach((input) => {
                    input.style.display = 'none';
                    input.value = ''; 
                });
              
                document.getElementById(`quantity-${this.value}`).style.display = 'block';
            });
        });
    </script> --}}
@endsection
