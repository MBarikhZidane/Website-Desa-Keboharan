<?php

namespace App\Livewire\UmkmDesa;

use App\Models\Produk;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ProdukComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $name, $image, $price, $description, $contact;
    public $isEdit = false;
    public $selectedId;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
        'contact' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'numeric' => ':attribute harus berupa angka.',
        'image' => 'File harus berupa gambar.',
    ];

    public function resetFields()
    {
        $this->reset(['name', 'image', 'price', 'description', 'contact', 'isEdit', 'selectedId']);
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        $path = $this->image ? $this->image->store('produk', 'public') : null;

        Produk::create([
            'name' => $this->name,
            'image' => $path,
            'price' => $this->price,
            'description' => $this->description,
            'contact' => $this->contact,
        ]);

        session()->flash('message', 'Produk berhasil ditambahkan.');
        $this->resetFields();
        $this->showModal = false;
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $produk->name;
        $this->price = $produk->price;
        $this->description = $produk->description;
        $this->contact = $produk->contact;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $produk = Produk::find($this->selectedId);

            $path = $produk->image;
            if ($this->image) {
                $path = $this->image->store('produk', 'public');
            }

            $produk->update([
                'name' => $this->name,
                'image' => $path,
                'price' => $this->price,
                'description' => $this->description,
                'contact' => $this->contact,
            ]);

            session()->flash('message', 'Produk berhasil diperbarui.');
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
        Produk::destroy($this->selectedId);
        session()->flash('message', 'Produk berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }

    public function render()
    {
        $produks = Produk::orderBy('id', 'desc')->paginate(10);
        return view('livewire.umkm-desa.produk-component', compact('produks'));
    }
}
