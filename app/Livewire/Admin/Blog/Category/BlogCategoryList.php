<?php

namespace App\Livewire\Admin\Blog\Category;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\BlogCategory;

class BlogCategoryList extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public ?int $BlogCategoryId = null;

    public string $title = '';
    public string $slug = '';
    public string $description = '';
    public bool $status = true;
    public ?int $deleteId = null;


    protected function rules()
    {
        return [
            'title' => 'required|min:3',
            'slug' => 'required|unique:blog_categories,slug,' . $this->BlogCategoryId,
        ];
    }

    /* -------------------------
        Modal handlers
    --------------------------*/


    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed()
    {
        BlogCategory::findOrFail($this->deleteId)->delete();

        $this->reset('deleteId');
        $this->dispatch('toast-show', [
            'message' => 'Blog Category deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',

        ]);

        $this->dispatch('close-delete-modal');
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->dispatch('open-modal');
    }

    public function openEditModal(int $id)
    {

        $BlogCategory = BlogCategory::findOrFail($id);

        $this->BlogCategoryId = $BlogCategory->id;
        $this->title = $BlogCategory->title;
        $this->slug = $BlogCategory->slug;
        $this->description = $BlogCategory->description;
        $this->status = $BlogCategory->status;
    }

    public function closeModal()
    {
        $this->dispatch('close-modal');
    }

    /* -------------------------
        CRUD
    --------------------------*/

    public function save()
    {
        $this->validate();

        BlogCategory::updateOrCreate(
            ['id' => $this->BlogCategoryId],
            [
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'status' => $this->status,
            ]
        );

        $this->dispatch('toast-show', [
            'message' => 'Blog Category saved successfully!',
            'type' => 'success',
            'position' => 'top-right',

        ]);

        $this->closeModal();
        $this->resetForm();
    }

    public function delete(int $id)
    {
        BlogCategory::findOrFail($id)->delete();
    }

    private function resetForm()
    {
        $this->reset(['BlogCategoryId', 'title', 'slug', 'description', 'status']);
        $this->status = true;
    }
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.category.blog-category-list', [
            'categories' => BlogCategory::where('title', 'like', "%{$this->search}%")
                ->latest()
                ->paginate(10),
        ]);
    }
}
