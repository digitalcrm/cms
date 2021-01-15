<?php

namespace App\Http\Livewire\Report;

use App\Page;
use App\Post;
use Livewire\Component;

class TopViewedPost extends Component
{
    public $topViewedPost;
    public $topPageViewed;
    public $filterArray = ['viewed','liked','featured'];
    public $selectValue;
    public $fetchData = false; // This will used for if you want to fire an event using listener

    protected $listeners = [
        'postReport',
    ];

    public function postReport()
    {
        $this->fetchData = true;
        $query = Post::withCount(['category','likes' => function($query){
            $query->where('liked', '>', 0);
        }]);
        switch ($this->selectValue) {
            case 'viewed':
                return $query->activeArticle()->popularPost()->take(10)->latest()->get();
                break;
            case 'liked':
                return $query->has('likes')->activeArticle()->take(10)->latest()->get();
                break;
            case 'featured':
                return $query->activeArticle()->featuredPost()->take(10)->latest()->get();
                break;
            default:
                return $query->activeArticle()->popularPost()->take(10)->latest()->get();
                break;
        }
    }

    public function pageReport()
    {
        return Page::isActive()->topViewed()->take(10)->latest()->get();
    }

    public function render()
    {
        $this->topViewedPost = $this->postReport();
        $this->topPageViewed = $this->pageReport();
        return view('livewire.report.top-viewed-post');
    }
}
