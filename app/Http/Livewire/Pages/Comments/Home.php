<?php

namespace App\Http\Livewire\Pages\Comments;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        $this->resetPage();
    }

    public function deleteComment($id)
    {
        $this->emit('deleteListener', $id);
    }

    public function switchStatus($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = !$comment->status;
        $comment->save();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.pages.comments.home', [
            'comments' => Comment::with(['user', 'field'])->paginate(10),
        ])->layout('layouts.admin');
    }
}
