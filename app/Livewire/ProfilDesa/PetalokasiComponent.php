<?php

namespace App\Livewire\ProfilDesa;

use App\Models\Petalokasi;
use Livewire\Component;
use Livewire\WithPagination;

class PetalokasiComponent extends Component
{
    use WithPagination;

    public $utara, $selatan, $barat, $timur, $luas_desa;
    public $isEdit = false;
    public $selectedId;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $rules = [
        'utara' => 'required|string|max:255',
        'selatan' => 'required',
        'barat' => 'required|string|max:255',
        'timur' => 'required',
        'luas_desa' => 'required',
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'numeric' => ':attribute harus berupa angka.',
        'min' => ':attribute tidak boleh kurang dari 0.',
    ];

    protected $paginationTheme = 'tailwind';

    public function resetFields()
    {
        $this->utara = '';
        $this->selatan = '';
        $this->timur = '';
        $this->barat = '';
        $this->luas_desa = '';
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

        Petalokasi::create([
            'utara' => $this->utara,
            'selatan' => $this->selatan,
            'timur' => $this->timur,
            'barat' => $this->barat,
            'luas_desa' => $this->luas_desa,
        ]);

        session()->flash('message', 'Data dusun berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $pendapatan = Petalokasi::findOrFail($id);

        $this->selectedId = $id;
        $this->utara = $pendapatan->utara;
        $this->selatan = $pendapatan->selatan;
        $this->barat = $pendapatan->barat;
        $this->timur = $pendapatan->timur;
        $this->luas_desa = $pendapatan->luas_desa;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $pendapatan = Petalokasi::find($this->selectedId);
            $pendapatan->update([
            'utara' => $this->utara,
            'selatan' => $this->selatan,
            'timur' => $this->timur,
            'barat' => $this->barat,
            'luas_desa' => $this->luas_desa,
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
        Petalokasi::destroy($this->selectedId);
        session()->flash('message', 'Data  berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }


    public function render()
    {
        $lokasis = Petalokasi::orderBy('id', 'desc')->paginate(10);
        return view('livewire.profil-desa.petalokasi-component', compact('lokasis'));
    }

}
