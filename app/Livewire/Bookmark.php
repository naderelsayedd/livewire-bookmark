<?php

namespace App\Livewire;

use App\Models\Bookmark as ModelsBookmark;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Bookmark extends Component
{
    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('required|min:5|url')]
    public $url = '';

    #[Validate('nullable')]
    public $notes = '';

    public $search = '';
    public function save()
    {
        $this->validate();
        ModelsBookmark::create($this->only(['title', 'url', 'notes']));

        session()->flash('message', 'Bookmark created successfully.');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.bookmark', [
            "bookmarks" => ModelsBookmark::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('url', 'like', '%' . $this->search . '%')
                ->get()
        ]);
    }
}
