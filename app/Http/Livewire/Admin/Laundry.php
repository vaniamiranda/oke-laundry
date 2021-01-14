<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Laundry extends Component
{
    use WithPagination;
    public $search;
    public $paginate = 10;
    protected $queryString = ['search'];

    public function render()
    {
        $data = User::select('users.id', 'users.name', 'users.email', 'users.role', 'users.profile_photo_path')
            ->where('users.role', '=', 'laundry')
            ->Where('users.email', 'like', '%'.$this -> search.'%')
            ->paginate($this -> paginate);
        return view('livewire.admin.laundry', [
            'data' => $data
        ]);
    }

    public function paginateKurang()
    {
        if ($this -> paginate == 1) {
            $this -> paginate == 1;
        }else{
            $this -> paginate--;
        }
    }
    public function paginateTambah()
    {
        if ($this -> paginate == 100) {
            $this -> paginate == 100;
        }else{
            $this -> paginate++;
        }
    }
}
