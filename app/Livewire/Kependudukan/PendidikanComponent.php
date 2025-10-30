<?php

namespace App\Livewire\Kependudukan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jenispendidikan;
use App\Models\Jumlahpendidikan;

class PendidikanComponent extends Component
{
    use WithPagination;

    public $jumlah, $pendidikan_id;
    public $isEdit = false;
    public $selectedId;
    public $pendidikans;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $rules = [
        'pendidikan_id' => 'required',
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
        $this->pendidikans = Jenispendidikan::all();
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        Jumlahpendidikan::create([
            'pendidikan_id' => $this->pendidikan_id,
            'jumlah' => $this->jumlah,
        ]);

        session()->flash('message', 'Data Agama berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $agama = Jumlahpendidikan::findOrFail($id);

        $this->selectedId = $id;
        $this->pendidikan_id = $agama->pendidikan_id;
        $this->jumlah = $agama->jumlah;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $agama = Jumlahpendidikan::find($this->selectedId);
            $agama->update([
                'pendidikan_id' => $this->pendidikan_id,
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
        Jumlahpendidikan::destroy($this->selectedId);
        session()->flash('message', 'Data Agama berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }


    public function render()
    {
        $jumlahs = Jumlahpendidikan::with('jenispendidikan')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.kependudukan.pendidikan-component', compact('jumlahs'));
    }
}
