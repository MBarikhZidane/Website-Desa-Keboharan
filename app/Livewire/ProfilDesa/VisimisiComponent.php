<?php

namespace App\Livewire\ProfilDesa;

use Livewire\Component;
use App\Models\Visimisi;
use Livewire\WithPagination;

class VisimisiComponent extends Component
{
        use WithPagination;

        public $visi, $misi, $sejarah;
        public $isEdit = false;
        public $selectedId;
        public $showModal = false;
        public $showDeleteModal = false;

        protected $rules = [
            'visi' => 'required|string|max:1000',
            'misi' => 'required|string|max:1000',
            'sejarah' => 'required|string|max:1000',
        ];

        protected $messages = [
            'required' => ':attribute wajib diisi.',
            'integer' => ':attribute harus berupa angka.',
            'min' => ':attribute tidak boleh kurang dari 0.',
        ];

        protected $paginationTheme = 'tailwind';

        public function resetFields()
        {
            $this->visi = '';
            $this->misi = '';
            $this->sejarah = '';
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

            Visimisi::create([
                'visi' => $this->visi,
                'misi' => $this->misi,
                'sejarah' => $this->sejarah,
            ]);

            session()->flash('message', 'Data dusun berhasil ditambahkan.');
            $this->resetFields();
            $this->showModal = false;
        }

        public function edit($id)
        {
            $visimisi = Visimisi::findOrFail($id);

            $this->selectedId = $id;
            $this->visi = $visimisi->visi;
            $this->misi = $visimisi->misi;
            $this->sejarah = $visimisi->sejarah;
            $this->isEdit = true;
            $this->showModal = true;
        }

        public function update()
        {
            $this->validate();

            if ($this->selectedId) {
                $visimisi = Visimisi::find($this->selectedId);
                $visimisi->update([
                    'visi' => $this->visi,
                    'misi' => $this->misi,
                    'sejarah' => $this->sejarah,
                ]);

                session()->flash('message', 'Data berhasil diperbarui.');
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
            Visimisi::destroy($this->selectedId);
            session()->flash('message', 'Data berhasil dihapus.');
            $this->showDeleteModal = false;
        }

        public function closeModal()
        {
            $this->showDeleteModal = false;
        }


        public function render()
        {
            $visimisis = Visimisi::orderBy('id', 'desc')->paginate(10);
            return view('livewire.profil-desa.visimisi-component', compact('visimisis'));
        }

}
