<?php

namespace App\Livewire\Pengaturan;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class PengaturanComponent extends Component
{
    use WithPagination;

    public $color_theme, $nav_type;
    public $isEdit = false;
    public $selectedId;
    public $agamas;
    public $showModal = false;
    public $showDeleteModal = false;

    protected $rules = [
        'nav_type' => 'required',
        'color_theme' => 'required',
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'integer' => ':attribute harus berupa angka.',
        'min' => ':attribute tidak boleh kurang dari 0.',
    ];

    protected $paginationTheme = 'tailwind';

    public function resetFields()
    {
        $this->color_theme = '';
        $this->nav_type = '';
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

        Setting::create([
            'color_theme' => $this->color_theme,
            'nav_type' => $this->nav_type,
        ]);

        session()->flash('message', 'Data berhasil ditambahkan.');
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
        Setting::destroy($this->selectedId);
        session()->flash('message', 'Data berhasil dihapus.');
        $this->showDeleteModal = false;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }


    public function render()
    {
        $pemeluks = Setting::orderBy('id', 'desc')->paginate(10);
        return view('livewire.pengaturan.pengaturan-component', compact('pemeluks'));
    }
}
