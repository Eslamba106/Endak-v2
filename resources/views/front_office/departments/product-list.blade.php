<div class="row" id="product-list">
    @forelse ($products as $item)
        <div class="col-md-6">
            <div class="card">
                <div class="position-relative">
                    <a href="product-details.html">
                        <img class="card-img-top" src="{{ asset('path/to/images/' . $item->image) }}" alt="img">
                    </a>
                    <span class="badge bg-secondary blog-badge">{{ $item->category->name }}</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5><a href="product-details.html">{{ $item->name }}</a></h5>
                    <div class="tx-muted">{{ $item->description }}</div>
                </div>
            </div>
        </div>
    @empty
        <p>No products found in this category.</p>
    @endforelse
</div>
