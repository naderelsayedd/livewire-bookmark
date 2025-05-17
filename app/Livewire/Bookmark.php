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
    public $editingBookmarkId = null;
    public $editingTitle = '';
    public $editingUrl = '';
    public $editingNotes = '';

    public function save()
    {
        $this->validate();
        ModelsBookmark::create($this->only(['title', 'url', 'notes']));

        session()->flash('message', 'Bookmark created successfully.');
        $this->reset();
    }

    public function edit($id)
    {
        $bookmark = ModelsBookmark::findOrFail($id);
        $this->editingBookmarkId = $id;
        $this->editingTitle = $bookmark->title;
        $this->editingUrl = $bookmark->url;
        $this->editingNotes = $bookmark->notes;
    }

    public function update()
    {
        $this->validate([
            'editingTitle' => 'required|min:3',
            'editingUrl' => 'required|min:5|url',
            'editingNotes' => 'nullable'
        ]);

        $bookmark = ModelsBookmark::findOrFail($this->editingBookmarkId);
        $bookmark->update([
            'title' => $this->editingTitle,
            'url' => $this->editingUrl,
            'notes' => $this->editingNotes
        ]);

        $this->cancelEdit();
        session()->flash('message', 'Bookmark updated successfully.');
    }

    public function cancelEdit()
    {
        $this->editingBookmarkId = null;
        $this->editingTitle = '';
        $this->editingUrl = '';
        $this->editingNotes = '';
    }

    public function delete($id)
    {
        $bookmark = ModelsBookmark::findOrFail($id);
        $bookmark->delete();
        session()->flash('message', 'Bookmark deleted successfully.');

        $this->redirect('/');
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
