<?php

namespace App\Livewire\Organisasi;

use Livewire\Component;
use App\Models\Organisasi;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class OrganisasiComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $name, $jabatan, $image;
    public $isEdit = false;
    public $selectedId;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'image' => ':attribute harus berupa file gambar.',
        'max' => 'Ukuran :attribute tidak boleh lebih dari 2MB.',
    ];

    protected $paginationTheme = 'tailwind';

    public function resetFields()
    {
        $this->name = '';
        $this->jabatan = '';
        $this->image = '';
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

        $path = $this->image ? $this->image->store('organisasi', 'public') : null;

        Organisasi::create([
            'name' => $this->name,
            'jabatan' => $this->jabatan,
            'image' => $path,
        ]);

        session()->flash('message', 'Data organisasi berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $org = Organisasi::findOrFail($id);

        $this->selectedId = $org->id;
        $this->name = $org->name;
        $this->jabatan = $org->jabatan;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->selectedId) {
            $org = Organisasi::find($this->selectedId);

            $path = $this->image ? $this->image->store('organisasi', 'public') : $org->image;

            $org->update([
                'name' => $this->name,
                'jabatan' => $this->jabatan,
                'image' => $path,
            ]);

            session()->flash('message', 'Data organisasi berhasil diperbarui.');
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
        Organisasi::destroy($this->selectedId);
        session()->flash('message', 'Data organisasi berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->showDeleteModal = false;
    }

    public function render()
    {
        $organisasis = Organisasi::orderBy('id', 'desc')->paginate(8);
        return view('livewire.organisasi.organisasi-component', compact('organisasis'));
    }
}
