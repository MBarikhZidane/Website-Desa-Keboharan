<?php

namespace App\Livewire\Kependudukan;

use App\Models\Dusun;
use Livewire\Component;
use Livewire\WithPagination;

class DusunComponent extends Component
{
    use WithPagination;

    public $name, $total_pria, $total_perempuan, $total_kepalakeluarga;
    public $isEdit = false;
    public $selectedId;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'total_pria' => 'required|integer|min:0',
        'total_perempuan' => 'required|integer|min:0',
        'total_kepalakeluarga' => 'required|integer|min:0',
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'integer' => ':attribute harus berupa angka.',
        'min' => ':attribute tidak boleh kurang dari 0.',
    ];

    protected $paginationTheme = 'tailwind';

    public function resetFields()
    {
        $this->name = '';
        $this->total_pria = '';
        $this->total_perempuan = '';
        $this->total_kepalakeluarga = '';
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

        Dusun::create([
            'name' => $this->name,
            'total_pria' => $this->total_pria,
            'total_perempuan' => $this->total_perempuan,
            'total_kepalakeluarga' => $this->total_kepalakeluarga,
        ]);

        session()->flash('message', 'Data dusun berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $dusun = Dusun::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $dusun->name;
        $this->total_pria = $dusun->total_pria;
        $this->total_perempuan = $dusun->total_perempuan;
        $this->total_kepalakeluarga = $dusun->total_kepalakeluarga;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $dusun = Dusun::find($this->selectedId);
            $dusun->update([
                'name' => $this->name,
                'total_pria' => $this->total_pria,
                'total_perempuan' => $this->total_perempuan,
                'total_kepalakeluarga' => $this->total_kepalakeluarga,
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
        Dusun::destroy($this->selectedId);
        session()->flash('message', 'Data dusun berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }


    public function render()
    {
        $dusuns = Dusun::orderBy('id', 'desc')->paginate(10);
        return view('livewire.kependudukan.dusun-component', compact('dusuns'));
    }
}
