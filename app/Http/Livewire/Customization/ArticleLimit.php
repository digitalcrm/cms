<?php

namespace App\Http\Livewire\Customization;

use App\ArticleLimit as AppArticleLimit;
use Livewire\Component;

class ArticleLimit extends Component
{
    public $limittable;
    public $notFoundFirstRow;
    public $posts_limit;
    public $category_limit;
    public $removeFlashMessage;

    /** For real time validation */
    public function updated()
    {
        $this->validate([
            'posts_limit' => 'required|numeric|digits_between:1,2',
            'category_limit' => 'required|numeric|digits_between:1,2',
        ]);
    }

    public function mount($firsRowFoundOrNot = null)
    {
        try {
            $firsRowFoundOrNot = AppArticleLimit::first();

            $this->posts_limit = $firsRowFoundOrNot->posts_limit;
            $this->category_limit = $firsRowFoundOrNot->category_limit;

        } catch (\Throwable $th) {
            $this->notFoundFirstRow = $th->getMessage();
        }
    }

    /**For storing first row if data is not found */
    public function store()
    {
        $validatedData = $this->validate([
            'posts_limit' => 'required|numeric|digits_between:1,2',
            'category_limit' => 'required|numeric|digits_between:1,2',
        ]);

        AppArticleLimit::create($validatedData);

        session()->flash('message', 'First Row Data Created Successfully');

        $this->reset();

    }

    /**For updating first row if data is not found */
    public function update()
    {
        $validatedData = $this->validate([
            'posts_limit' => 'required|numeric|digits_between:1,2',
            'category_limit' => 'required|numeric|digits_between:1,2',
        ]);

        $findFirstRow = AppArticleLimit::first();
        $findFirstRow->update($validatedData);

        session()->flash('message', 'Row Data Updated Successfully');
    }

    public function render()
    {
        return view('livewire.customization.article-limit');
    }
}
