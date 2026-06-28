<?php

namespace App\Livewire\User\Search;

use Livewire\Component;
use App\Models\Block;
use App\Models\HomeList;
use App\Models\HomeCategory;

class Search extends Component
{
    public $load = 6;
    public $slug = '';
    public $sortingBy = 'default';
    public $search;
    public $filterBlock = '';
    public $availableBlocks = [];

    public function mount()
    {
        $this->search = request()->input('search');
        $this->loadBlocks();
    }

    public function updatedSlug()
    {
        $this->filterBlock = '';
        $this->loadBlocks();
    }

    private function loadBlocks()
    {
        if ($this->slug) {
            $category = HomeCategory::where('slug', $this->slug)->first();
            $this->availableBlocks = $category
                ? Block::where('home_category_id', $category->id)->get()->toArray()
                : [];
        } else {
            $this->availableBlocks = [];
        }
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
        $nameSlug   = null;

        $query = HomeList::with(['homeCategory', 'homeImage', 'block']);

        if ($this->slug) {
            $category = HomeCategory::where('slug', $this->slug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
                $nameSlug = $category->name;
            } else {
                $query->whereRaw('0=1');
            }
        }

        if ($this->filterBlock) {
            $query->where('block_id', $this->filterBlock);
        }

        if ($this->search) {
            $query->where('name', 'like', '%'.$this->search.'%');
        }

        $totalHomesCount = $query->count();
        $latestHomes     = $query->latest()->take($this->load)->get()
                                 ->sortBy($sortField, SORT_REGULAR, $sortType === 'desc');

        return view('livewire.user.search.search', compact('latestHomes', 'categories', 'nameSlug', 'totalHomesCount'));
    }
}
