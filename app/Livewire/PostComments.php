<?php

namespace App\Livewire;
use App\Models\Post;
use GuzzleHttp\Promise\Create;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PostComments extends Component
{

    public Post $post;

    #[Rule('required|min:3|max:200')]
    public string $comment;

    public function postComment()
    {
        if (auth()->guest()) {
            return;
        }

        $this->validateOnly('comment');

        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id()
        ]);

        $this->reset('comment');
    }

    #[Computed()]
    public function comments(){
        return $this?->post?->comments()->latest()->paginate();
    }
    public function render()
    {
        return view('livewire.post-comments');
    }
}
