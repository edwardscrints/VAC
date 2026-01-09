<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;
use Lunar\Models\Collection;

class Navigation extends Component
{
    /**
     * The search term for the search input.
     *
     * @var string
     */
    public $term = null;

    /**
     * {@inheritDoc}
     */
    protected $queryString = [
        'term',
    ];

    /**
     * Return the collections in a tree.
     */
    public function getCollectionsProperty()
    {
        $allCollections = Collection::with(['defaultUrl'])->get();
        
        // Find "Descuentos" collection by translated name
        $discountsCollection = $allCollections->first(function ($collection) {
            $name = $collection->translateAttribute('name');
            return $name === 'Descuentos';
        });
        
        // Get 4 random collections excluding "Descuentos"
        $randomCollections = $allCollections->filter(function ($collection) {
            $name = $collection->translateAttribute('name');
            return $name !== 'Descuentos';
        })->shuffle()->take(4);
        
        // Combine: random collections + discounts at the end
        $collections = $randomCollections->values();
        if ($discountsCollection) {
            $collections->push($discountsCollection);
        }
        
        return $collections;
    }

    public function render(): View
    {
        return view('livewire.components.navigation');
    }
}
