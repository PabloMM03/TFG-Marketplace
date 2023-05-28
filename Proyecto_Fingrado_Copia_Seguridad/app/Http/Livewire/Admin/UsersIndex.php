<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";


    //Reset page to find users
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //Search for users by name or email and display them
        $users = User::where('name', 'LIKE' ,'%'.$this->search.'%')
                      ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                      ->paginate();
        return view('livewire.admin.users-index', compact('users'));
    }
}
