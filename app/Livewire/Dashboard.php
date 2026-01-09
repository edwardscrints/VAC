<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    /**
     * Return the sale collection.
     */

    public function getInstagramUrlProperty()
    {
        return config('services.instagram.url');
    }

    public function getSpotifyPodcastUrlProperty()
    {
        return config('services.spotify.podcast_url');
    }


    public function getCategoriesProperty()
    {
        $collections = \Lunar\Models\Collection::with(['products' => function($query) {
            $query->limit(4);
        }])
        ->whereHas('products')
        ->inRandomOrder()
        ->limit(4)
        ->get();
        
        return $collections;
    }

    public function render()
    {
          return view('livewire.dashboard', [
        'categories' => $this->categories,
    ]);
    }
}
