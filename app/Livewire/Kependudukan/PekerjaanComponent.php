<?php

namespace App\Livewire\Kependudukan;

use App\Models\Jenispekerjaan;
use App\Models\Jumlahpekerjaan;
use Livewire\Component;
use Livewire\WithPagination;

class PekerjaanComponent extends Component
{
    use WithPagination;

    public $jumlah, $pekerjaan_id;
    public $isEdit = false;
    public $selectedId;
    public $pekerjaans;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $rules = [
        'pekerjaan_id' => 'required',
        'jumlah' => 'required|integer|min:0',
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'integer' => ':attribute harus berupa angka.',
        'min' => ':attribute tidak boleh kurang dari 0.',
    ];

    protected $paginationTheme = 'tailwind';

    public function resetFields()
    {
        $this->pekerjaan_id = '';
        $this->jumlah = '';
        $this->isEdit = false;
        $this->selectedId = null;
    }

    public function mount()
    {
        $this->pekerjaans = Jenispekerjaan::all();
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        Jumlahpekerjaan::create([
            'pekerjaan_id' => $this->pekerjaan_id,
            'jumlah' => $this->jumlah,
        ]);

        session()->flash('message', 'Data berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $agama = Jumlahpekerjaan::findOrFail($id);

        $this->selectedId = $id;
        $this->pekerjaan_id = $agama->pekerjaan_id;
        $this->jumlah = $agama->jumlah;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $agama = Jumlahpekerjaan::find($this->selectedId);
            $agama->update([
                'pekerjaan_id' => $this->pekerjaan_id,
                'jumlah' => $this->jumlah,
            ]);

            session()->flash('message', 'Data Agama berhasil diperbarui.');
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
        Jumlahpekerjaan::destroy($this->selectedId);
        session()->flash('message', 'Data Agama berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }


    public function render()
    {
        $jumlahs = Jumlahpekerjaan::with('jenispekerjaan')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.kependudukan.pekerjaan-component', compact('jumlahs'));
    }
}
