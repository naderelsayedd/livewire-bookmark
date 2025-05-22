
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
        <input type="text" wire:model.live="search" class="form-control" placeholder="Search Your Bookmarks...">
    </div>

    @if (count($bookmarks) != 0)
        <table class="table table-striped mt-4" style="width:100% ; margin :auto">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookmarks as $item)
                    <tr wire:key="{{ $item->id }}" wire:transition>
                        <td>
                            @if ($editingBookmarkId === $item->id)
                                <input type="text" wire:model="editingTitle" class="form-control">
                                @error('editingTitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @else
                                {{ $item->title }}
                            @endif
                        </td>
                        <td>
                            @if ($editingBookmarkId === $item->id)
                                <input type="url" wire:model="editingUrl" class="form-control">
                                @error('editingUrl')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @else
                                <a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a>
                            @endif
                        </td>
                        <td>
                            @if ($editingBookmarkId === $item->id)
                                <textarea wire:model="editingNotes" class="form-control"></textarea>
                                @error('editingNotes')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @else
                                {{ $item->notes }}
                            @endif
                        </td>
                        <td>
                            @if ($editingBookmarkId === $item->id)
                                <button wire:click="update" class="btn btn-success m-1">Save</button>
                                <button wire:click="cancelEdit" class="btn btn-secondary m-1">Cancel</button>
                            @else
                                <button wire:click="edit({{ $item->id }})" class="btn btn-info m-1">Edit</button>
                                <button wire:click="delete({{ $item->id }})" class="btn btn-danger m-1"
                                    onclick="return confirm('Are you sure you want to delete this bookmark?')">Delete</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4 class="m-5  text-center text-primary">No Bookmarks here</h4>
    @endif
</div>
