@csrf


@if (is_array($fav_suburb) || is_object($fav_suburb))

    @forelse ($fav_suburb as $suburb)
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <form action="" method="POST">
                @method('DELETE')
                @csrf
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="uil uil-check me-2"></i>
                    {{ $suburb->name }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </form>
        </div>
    @empty
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>No Favourite Suburb!</strong>
        </div>
    @endforelse
@endif
