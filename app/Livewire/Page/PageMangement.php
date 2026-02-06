<?php

namespace App\Livewire\Page;

use App\Models\Page;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Livewire\Component;

class PageMangement extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public ?int $pageId = null;

    public string $title = '';
    public string $slug = '';
    public ?string $meta_description = null;
    public ?string $meta_keywords = null;
    public ?string $meta_title = null;
    public ?int $deleteId = null;

    protected function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'slug' => 'required|unique:pages,slug,' . $this->pageId,
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_title' => 'nullable|string',
        ];
    }

    /* -------------------------
        Modal handlers
    --------------------------*/

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed(): void
    {
        Page::findOrFail($this->deleteId)->delete();

        $this->reset('deleteId');

        $this->dispatch('toast-show', [
            'message' => 'Page deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->dispatch('close-delete-modal');
    }

    public function openCreateModal(): void
    {
        $this->resetForm();
        $this->dispatch('open-modal');
    }

    public function openEditModal(int $id): void
    {
        $page = Page::findOrFail($id);

        $this->pageId = $page->id;
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->meta_description = $page->meta_description;
        $this->meta_keywords = $page->meta_keywords;
        $this->meta_title = $page->meta_title;
    }

    public function closeModal(): void
    {
        $this->dispatch('close-modal');
    }

    /* -------------------------
        CRUD
    --------------------------*/

    public function updatedTitle(): void
    {
        $this->slug = Str::slug($this->title);
    }

    public function save(): void
    {
        $this->validate();

        Page::updateOrCreate(
            ['id' => $this->pageId],
            [
                'title' => $this->title,
                'slug' => $this->slug,
                'meta_description' => $this->meta_description,
                'meta_keywords' => $this->meta_keywords,
                'meta_title' => $this->meta_title,
            ]
        );

        $this->dispatch('toast-show', [
            'message' => 'Page saved successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->closeModal();
        $this->resetForm();
    }

    public function delete(int $id): void
    {
        Page::findOrFail($id)->delete();
    }

    public function resetForm(): void
    {
        $this->reset([
            'pageId',
            'title',
            'slug',
            'meta_description',
            'meta_keywords',
            'meta_title',
        ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.page.page-mangement', [
            'pages' => Page::query()
                ->when($this->search !== '', function ($query) {
                    $query->where(function ($q) {
                        $q->where('title', 'like', "%{$this->search}%")
                          ->orWhere('slug', 'like', "%{$this->search}%");
                    });
                })
                ->latest()
                ->paginate(10),
        ]);
    }
}
