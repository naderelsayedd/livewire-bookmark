<div>
    <form wire:submit="save" style="width: 50%;margin:auto;" class="text-center mt-5">
        <h3>Add Bookmarks</h3>
        <input type="text" wire:model="title" placeholder="Title" class="form-control mt-3">
        <div>
            @error('title')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <input type="url" wire:model="url" placeholder="URL" class="form-control mt-3">
        <div>
            @error('url')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <textarea placeholder="Any notes ?" wire:model="notes" class="form-control mt-3"></textarea>
        <div>
            @error('notes')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3 form-control">Save Bookmark</button>
        @if (session()->has('message'))
            <div class="m-3 alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </form>

    <div class="mt-4" style="width: 50%; margin: auto">
        <input type="text" wire:model.live="search" class="form-control" placeholder="Search posts...">
    </div>

    @if (count($bookmarks) != 0)
        <table class="table table-striped mt-4" style="width:50% ; margin :auto">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookmarks as $item)
                    <tr wire:key="{{ $item->id }}" wire:transition>
                        <td>{{ $item->title }}</td>
                        <td><a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></td>
                        <td>{{ $item->notes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4 class="m-5  text-center text-primary">No posts here</h4>
    @endif
</div>
