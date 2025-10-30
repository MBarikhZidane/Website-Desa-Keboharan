<?php

namespace App\Livewire\ProfilDesa;

use Livewire\Component;
use App\Models\Carousel;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CarouselComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $image;
    public $isEdit = false;
    public $selectedId;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $rules = [
        'image' => 'required|image|max:2048',
    ];

    protected $paginationTheme = 'tailwind';

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'image' => ':attribute harus berupa gambar.',
        'max' => 'Ukuran :attribute tidak boleh lebih dari 2MB.',
    ];

    public function resetFields()
    {
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

        $path = $this->image->store('carousels', 'public');

        Carousel::create([
            'image' => $path,
        ]);

        session()->flash('message', 'Gambar berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);

        $this->selectedId = $carousel->id;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $carousel = Carousel::find($this->selectedId);

            if ($this->image) {
                $path = $this->image->store('carousels', 'public');
                $carousel->update(['image' => $path]);
            }

            session()->flash('message', 'Gambar berhasil diperbarui.');
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
        Carousel::destroy($this->selectedId);
        session()->flash('message', 'Data berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->showDeleteModal = false;
    }

    public function render()
    {
        $carousels = Carousel::orderBy('id', 'desc')->paginate(8);
        return view('livewire.profil-desa.carousel-component', compact('carousels'));
    }
}
