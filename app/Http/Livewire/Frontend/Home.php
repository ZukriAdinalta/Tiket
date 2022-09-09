<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Concert;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Str;

class Home extends Component
{
    public $id_concert, $nama, $tgl_lahir, $tmp_lahir, $email, $alamat, $kode_order;
    public $search, $data = true, $order = false, $kode = false;

    protected $rules = [
        'nama'  => 'required',
        'tgl_lahir'  => 'required',
        'tmp_lahir'  => 'required',
        'email'  => 'required',
        'alamat'  => 'required',
    ];
    protected $validationAttributes = [
        'nama'      => 'Nama',
        'tgl_lahir' => 'Tanggal Lahir',
        'tmp_lahir' => 'Tanggal Lahir',
        'email'     => 'Email',
        'alamat'    => 'Alamat',
    ];

    protected $messages = [
        'required'      => ':attribute wajib diisi',
    ];


    public function updated($fild)
    {
        $this->validateOnly($fild);
    }

    public function Order($id)
    {
        $this->order = true;
        $this->data = false;
        $this->kode = false;
        $data = Concert::find($id);
        $this->id_concert = $data->id;
        $this->namkor = $data->namkor;
        $this->jadwal = $data->jadwal;
    }
    public function resetForm()
    {
        $this->nama = '';
        $this->tgl_lahir = '';
        $this->tmp_lahir = '';
        $this->email = '';
        $this->alamat = '';
        $this->resetErrorBag();
    }
    public function Kembali()
    {
        $this->data = true;
        $this->order = false;
        $this->kode = false;
    }
    public function Simpan()
    {
        $data = Order::latest()->first();
        $validatinData =  $this->validate();
        if (!$data) {
            $validatinData['kode_order'] = 'INV0001';
        } else {
            $kode = preg_replace("/[^0-9\.]/", '', $data->kode_order);
            $validatinData['kode_order'] = 'INV' . sprintf('%04d', $kode + 1);
        }
        $validatinData['nama'] = Str::title($this->nama);
        $validatinData['id_concert'] = $this->id_concert;
        Order::create($validatinData);
        $this->resetForm();
        $this->kode = true;
        $this->data = false;
        $this->order = false;
        $this->kode_order = $validatinData['kode_order'];
        session()->flash('pesan', 'Data berhasil disimpan');
        $this->emit('alert_remove');
    }

    public function render()
    {
        $data = [
            'Concerts' => Concert::Where('namkor', 'like', '%' . $this->search . '%')->latest()->paginate(8)
        ];
        return view('livewire.frontend.home', $data)->extends('layouts.frontend.index')->section('contents');
    }
}