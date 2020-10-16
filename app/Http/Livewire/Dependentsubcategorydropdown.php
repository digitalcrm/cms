<?php

namespace App\Http\Livewire;

use App\Category;
use App\Subcategory;
use Livewire\Component;

class Dependentsubcategorydropdown extends Component
{
    public $category;
    public $subcategories = [];
    public $subcategory;

    public function mount($category = null, $subcategory = null) {
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    public function render()
    {
        if(!empty($this->category)) {
            $this->subcategories = Subcategory::where('category_id', $this->category)->get();
            // dd($this->category, $this->subcategories);
            // dd(count($this->subcategories));
        }
        return view('livewire.dependentsubcategorydropdown')->withCategories(Category::has('subcategories')->get());
        // return view('livewire.dependentsubcategorydropdown')->withCategories(Category::get());
    }


}
