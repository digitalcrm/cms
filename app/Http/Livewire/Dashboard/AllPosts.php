<?php

namespace App\Http\Livewire\Dashboard;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AllPosts extends Component
{
    use WithPagination;
    
    public $limit = 10;
    public $searchKeyword;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $query = Post::query();

        //Refactor code
        $query->activePost(request('filterByactive'));

        $query->inactivePost(request('filterByinactive'));

        $query->draftPost(request('draftPost'));

        $query->trashPost(request('trashPost'));

        if(auth()->user()->hasRole('superadmin')) {

            $allPosts = $query->orderBy('id','desc')->search($this->searchKeyword)->paginate($this->limit)->withQueryString();
        } else {

            $allPosts = $query->where('user_id',auth()->user()->id)->latest()->search($this->searchKeyword)->paginate($this->limit)->withQueryString();
        }

        return view('livewire.dashboard.all-posts',compact('allPosts'));
    }
}
