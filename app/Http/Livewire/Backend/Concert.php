<?php

namespace App\Http\Livewire\Backend;

use App\Models\Concert as ModelsConcert;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Concert extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '', $perpage = 10;
    public $namkor, $jadwal, $id_konser;
    public $create = false, $update = false;

    protected $rules = [
        'namkor'  => 'required',
        'jadwal'  => 'required',
    ];
    protected $validationAttributes = [
        'namkor' => 'Nama Konser',
        'jadwal' => 'Jadwal Konser',
    ];

    protected $messages = [
        'required'      => ':attribute wajib diisi',
    ];

    public function Create()
    {
        $this->create = true;
        $this->update = false;
        $this->resetErrorBag();
    }
    public function resetForm()
    {
        $this->namkor = '';
        $this->jadwal = '';
        $this->resetErrorBag();
    }
    public function Close()
    {
        $this->create = false;
        $this->update = false;
        $this->resetForm();
        $this->resetErrorBag();
    }

    public function Simpan()
    {
        $validatinData =  $this->validate();
        $validatinData['namkor'] = Str::title($this->namkor);
        $validatinData['jadwal'] = Str::title($this->jadwal);
        ModelsConcert::create($validatinData);
        $this->resetForm();
        session()->flash('pesan', 'Data berhasil disimpan');
        $this->emit('alert_remove');
    }

    public function Edit($id)
    {
        $this->update = true;
        $data = ModelsConcert::find($id);
        $this->id_konser = $data->id;
        $this->namkor = $data->namkor;
        $this->jadwal = $data->jadwal;
    }
    public function Update($id)
    {
        $validatinData =  $this->validate();
        $validatinData['namkor'] = Str::title($this->namkor);
        $validatinData['jadwal'] = Str::title($this->jadwal);
        ModelsConcert::where('id', $id)->update($validatinData);
        $this->resetform();
        $this->resetErrorBag();
        $this->update = false;
        session()->flash('pesan', 'Data berhasil diedit');
        $this->emit('alert_remove');
    }

    public function DeleteData($id)
    {
        $this->create = false;
        $this->update = false;
        $data = ModelsConcert::find($id);
        $this->id_konser = $data->id;
        $this->namkor = $data->namkor;
        $this->jadwal = $data->jadwal;
    }

    public function Delete($id)
    {
        ModelsConcert::destroy($id);
        $this->resetForm();
        session()->flash('hapus', 'Data berhasil dihapus');
        $this->emit('alert_remove');
        $this->emit('delete');
    }
    public function render()
    {
        $data = [
            'Concerts' => ModelsConcert::Where('namkor', 'like', '%' . $this->search . '%')->latest()->paginate($this->perpage)
        ];
        return view('livewire.backend.concert', $data)->extends('layouts.backend.index')->section('contents');
    }
}