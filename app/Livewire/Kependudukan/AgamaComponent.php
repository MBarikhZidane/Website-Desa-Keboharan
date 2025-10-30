<?php

namespace App\Livewire\Kependudukan;

use App\Models\Agama;
use Livewire\Component;
use App\Models\Pemelukagama;
use Livewire\WithPagination;

class AgamaComponent extends Component
{
    use WithPagination;

    public $jumlah, $agama_id;
    public $isEdit = false;
    public $selectedId;
    public $agamas;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $rules = [
        'agama_id' => 'required',
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
        $this->agama_id = '';
        $this->jumlah = '';
        $this->isEdit = false;
        $this->selectedId = null;
    }

    public function mount()
    {
        $this->agamas = Agama::all();
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        Pemelukagama::create([
            'agama_id' => $this->agama_id,
            'jumlah' => $this->jumlah,
        ]);

        session()->flash('message', 'Data Agama berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $agama = Pemelukagama::findOrFail($id);

        $this->selectedId = $id;
        $this->agama_id = $agama->agama_id;
        $this->jumlah = $agama->jumlah;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $agama = Pemelukagama::find($this->selectedId);
            $agama->update([
                'agama_id' => $this->agama_id,
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
        Pemelukagama::destroy($this->selectedId);
        session()->flash('message', 'Data Agama berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }


    public function render()
    {
        $pemeluks = Pemelukagama::with('agama')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.kependudukan.agama-component', compact('pemeluks'));
    }
}
