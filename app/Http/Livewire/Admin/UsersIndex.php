<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{

    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function buscar() {
        $this->resetPage();
        $this->emit('render');
    }

    public function render()
    {

        $users = User::where('name', 'LIKE', '%'.  trim($this->search) . '%')
                        ->orWhere('email', 'LIKE', '%'.  trim($this->search) . '%')                        
                        ->latest('id')
                        ->paginate(10);

        return view('livewire.admin.users-index', compact('users'));
    }
}
