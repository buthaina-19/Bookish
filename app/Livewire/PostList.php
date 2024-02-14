<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

class PostList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort='desc';

    #[Url()]
    public $search='';

      #[Url()]
    public $category='';

    public function setSort($sort) {
        $this->sort=($sort === 'desc')? 'desc': 'asc' ;
        $this->resetPage();

    }
     #[On('search')]
    public function updateSearch($search)
    {
        $this ->search=$search;

    }

    #[Computed()]
    public function posts(){
        return Post::posted()
        ->orderBy('posted_at', $this->sort)
        ->when($this->activeCate, function($query){
            $query->WithCategory($this->category);
        })
        ->where('title', 'like',"%{$this->search}%" )
        ->paginate(3);
    }


    #[Computed()]
    public function activeCate(){
         return Category::where('slug',$this->category)->first();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
