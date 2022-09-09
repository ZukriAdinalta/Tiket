<?php

namespace App\Http\Livewire\Backend;

use App\Models\Order as ModelsOrder;
use Livewire\Component;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '', $perpage = 10;
    public function render()
    {
        $data = [
            'Orders' => ModelsOrder::Where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('kode_order', 'like', '%' . $this->search . '%')
                ->latest()->paginate($this->perpage)
        ];
        return view('livewire.backend.order', $data)->extends('layouts.backend.index')->section('contents');;
    }
}