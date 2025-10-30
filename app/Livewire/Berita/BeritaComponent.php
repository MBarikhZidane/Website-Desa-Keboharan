<?php

namespace App\Livewire\Berita;

use App\Models\Berita;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class BeritaComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $title, $author, $category, $image, $description, $slug;
    public $isEdit = false;
    public $selectedId;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category' => 'required|in:berita,wisata,potensi_desa',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'image' => 'File harus berupa gambar.',
        'in' => ':attribute tidak valid.',
    ];

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function resetFields()
    {
        $this->reset(['title', 'author', 'category', 'image', 'description', 'slug', 'isEdit', 'selectedId']);
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        $path = $this->image ? $this->image->store('berita', 'public') : null;

        Berita::create([
            'title' => $this->title,
            'author' => $this->author,
            'category' => $this->category,
            'description' => $this->description,
            'image' => $path,
            'slug' => Str::slug($this->title),
        ]);

        session()->flash('message', 'Berita berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        $this->selectedId = $id;
        $this->title = $berita->title;
        $this->author = $berita->author;
        $this->category = $berita->category;
        $this->description = $berita->description;
        $this->slug = $berita->slug;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $berita = Berita::find($this->selectedId);
            $path = $berita->image;

            if ($this->image) {
                $path = $this->image->store('berita', 'public');
            }

            $berita->update([
                'title' => $this->title,
                'author' => $this->author,
                'category' => $this->category,
                'description' => $this->description,
                'image' => $path,
                'slug' => Str::slug($this->title),
            ]);

            session()->flash('message', 'Berita berhasil diperbarui.');
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
        Berita::destroy($this->selectedId);
        session()->flash('message', 'Berita berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }

    public function render()
    {
        $beritas = Berita::orderBy('id', 'desc')->paginate(10);
        return view('livewire.berita.berita-component', compact('beritas'));
    }
}
