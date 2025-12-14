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
        return \Lunar\Models\Collection::with('products')
            ->whereHas('products')
            ->get();
    }

    public function render()
    {
          return view('livewire.dashboard', [
        'categories' => $this->categories,
    ]);
    }
}
