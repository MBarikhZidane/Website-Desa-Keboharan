<?php

namespace App\Livewire\Anggaran;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pendapatan;

class PendapatanComponent extends Component
{
    use WithPagination;

    public $name, $tahun, $total_anggaran, $realisasi, $sisa;
    public $isEdit = false;
    public $selectedId;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'tahun' => 'required',
        'total_anggaran' => 'required|numeric|min:0',
        'realisasi' => 'required|numeric|min:0',
        'sisa' => 'required|numeric|min:0',
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'numeric' => ':attribute harus berupa angka.',
        'min' => ':attribute tidak boleh kurang dari 0.',
    ];

    protected $paginationTheme = 'tailwind';

    public function resetFields()
    {
        $this->name = '';
        $this->tahun = '';
        $this->total_anggaran = '';
        $this->realisasi = '';
        $this->sisa = '';
        $this->isEdit = false;
        $this->selectedId = null;
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        Pendapatan::create([
            'name' => $this->name,
            'tahun' => $this->tahun,
            'total_anggaran' => $this->total_anggaran,
            'realisasi' => $this->realisasi,
            'sisa' => $this->sisa,
        ]);

        session()->flash('message', 'Data dusun berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $pendapatan = Pendapatan::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $pendapatan->name;
        $this->tahun = $pendapatan->tahun;
        $this->total_anggaran = $pendapatan->total_anggaran;
        $this->realisasi = $pendapatan->realisasi;
        $this->sisa = $pendapatan->sisa;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $pendapatan = Pendapatan::find($this->selectedId);
            $pendapatan->update([
                'name' => $this->name,
                'tahun' => $this->tahun,
                'total_anggaran' => $this->total_anggaran,
                'realisasi' => $this->realisasi,
                'sisa' => $this->sisa,
            ]);

            session()->flash('message', 'Data dusun berhasil diperbarui.');
            $this->resetFields();
            $this->showModal = false;
        }
    }

    public function confirmDelete($id)
    {
        $this->selectedId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed()
    {
        Pendapatan::destroy($this->selectedId);
        session()->flash('message', 'Data dusun berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }


    public function render()
    {
        $pendapatans = Pendapatan::orderBy('id', 'desc')->paginate(10);
        return view('livewire.anggaran.pendapatan-component', compact('pendapatans'));
    }
}
