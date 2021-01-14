<?php

namespace App\Http\Livewire;

use App\Models\Laundry;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PendingLaundry extends Component
{
    public function render()
    {
        $laundry = Laundry::where('id_user', '=', Auth::user()->id)->get();
        $laundries = json_decode($laundry[0]);
        return view('livewire.pending-laundry', [
            'laundry' => $laundries,
        ]);
    }
}
