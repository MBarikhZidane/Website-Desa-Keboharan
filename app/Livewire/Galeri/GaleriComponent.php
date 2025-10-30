<?php

namespace App\Livewire\Galeri;

use App\Models\Galeri;
use Livewire\Component;
use App\Models\Carousel;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class GaleriComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $caption, $image, $selectedId;
    public $isEdit = false;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'caption' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048', 
    ];

    protected $messages = [
        'caption.required' => 'Caption wajib diisi.',
        'image.image' => 'File harus berupa gambar.',
        'image.max' => 'Ukuran gambar maksimal 2MB.',
    ];

    public function resetFields()
    {
        $this->caption = '';
        $this->image = null;
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

        $imagePath = $this->image
            ? $this->image->store('galeri', 'public')
            : null;

        Galeri::create([
            'caption' => $this->caption,
            'image' => $imagePath,
        ]);

        session()->flash('message', 'Gambar berhasil ditambahkan!');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        $this->selectedId = $id;
        $this->caption = $galeri->caption;
        $this->image = null;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate([
            'caption' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $galeri = Galeri::findOrFail($this->selectedId);
        $imagePath = $galeri->image;

        if ($this->image) {
            $imagePath = $this->image->store('galeri', 'public');
        }

        $galeri->update([
            'caption' => $this->caption,
            'image' => $imagePath,
        ]);

        session()->flash('message', 'Data galeri berhasil diperbarui!');
        $this->resetFields();
        $this->showModal = false;
    }

    public function confirmDelete($id)
    {
        $this->selectedId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed()
    {
        Galeri::destroy($this->selectedId);
        session()->flash('message', 'Data galeri berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->showDeleteModal = false;
    }

    public function render()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('livewire.galeri.galeri-component', compact('galeris'));
    }
}
