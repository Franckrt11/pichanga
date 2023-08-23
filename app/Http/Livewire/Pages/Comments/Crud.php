<?php

namespace App\Http\Livewire\Pages\Comments;

use Livewire\Component;
use App\Models\Comment;

class Crud extends Component
{
    public $typecrud;
    public $data;
    public $comment;
    public $switchLabel;

    public function mount($id)
    {
        $this->typecrud = 'ID: '.$id;
        $this->comment = Comment::findOrFail($id);
        $this->data = [
            'score' => $this->comment->score,
            'content' => $this->comment->content,
            'status' => $this->comment->status
        ];
    }

    public function save()
    {

        $this->comment->score = $this->data['score'];
        $this->comment->content = $this->data['content'];
        $this->comment->status = $this->data['status'];
        $this->comment->save();
        return redirect()->route('comments.crud', [ 'id' => $this->comment->id ]);
    }

    public function delete()
    {
        $this->comment->delete();
        return redirect()->route('comments');
    }

    public function render()
    {
        $this->switchLabel = $this->data['status'] == TRUE ? 'HABILITADO' : 'INHABILITADO';
        return view('livewire.pages.comments.crud')->layout('layouts.admin');
    }
}
