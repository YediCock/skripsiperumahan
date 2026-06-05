<?php

namespace App\Livewire\User\Search;

use Livewire\Component;
use App\Models\HomeList;
use App\Models\HomeCategory;

class Search extends Component
{
    public $load = 6; 
    public $slug = '';
    public $sortingBy = 'default';
    public $search;
    public function mount()
    {
        $this->search = request()->input('search');
    }
    public function loadMore(){
        $this->load += 6;
    }
    public function render()
    {
        switch ($this->sortingBy) {
            case 'low-high':
                $sortField = 'price';
                $sortType = 'asc';
                break;
            case 'high-low':
                $sortField = 'price';
                $sortType = 'desc';
                break;
            default:
                $sortField = 'id';
                $sortType = 'asc';
        }

        $categories = HomeCategory::latest()->get();
        $nameSlug = null;
        $latestHomes = HomeList::with('homeCategory')->latest()->take($this->load)->get();
        $totalHomesCount = HomeList::with('homeCategory')->count();

        if ($this->slug) {
            $category = HomeCategory::where('slug', $this->slug)->first();
            if ($category) {
                $latestHomes = HomeList::with('homeCategory')->where('category_id', $category->id)
                                ->take($this->load)
                                ->get();
                $nameSlug = $category->name;
                $totalHomesCount = HomeList::with('homeCategory')->where('category_id', $category->id)->count();
            } else {
                $latestHomes = collect();
            }
        }

        if ($this->search) {
            $latestHomes = HomeList::with('homeCategory')->latest()
                            ->where('name', 'like', '%'.$this->search.'%')
                            ->take($this->load)
                            ->get();
            $totalHomesCount = HomeList::with('homeCategory')->where('name', 'like', '%'.$this->search.'%')->count();
        }

        // Sort collection using sortBy()
        $latestHomes = $latestHomes->sortBy($sortField, SORT_REGULAR, $sortType === 'desc');

        return view('livewire.user.search.search', compact('latestHomes','categories','nameSlug','totalHomesCount'));
    }
}
