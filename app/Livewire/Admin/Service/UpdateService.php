<?php

namespace App\Livewire\Admin\Service;

use App\Models\Service;
use App\Models\ServiceLender;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateService extends Component
{
    use WithFileUploads;

    public int $serviceId;

    public string $title = '';

    public string $slug = '';

    public ?string $primary_section = null;

    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $featured_image = null;

    public ?string $existing_featured_image = null;

    public array $secondary_sections = [];

    public array $tertiary_sections = [];

	public array $lenders = [];

    protected function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'slug' => 'required|string|unique:services,slug,' . $this->serviceId,
            'primary_section' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'secondary_sections' => 'array',
            'secondary_sections.*.title' => 'nullable|string',
            'secondary_sections.*.items' => 'array',
            'secondary_sections.*.items.*.key' => 'nullable|string',
            'secondary_sections.*.items.*.value' => 'nullable|string',
            'tertiary_sections' => 'array',
            'tertiary_sections.*.title' => 'nullable|string',
            'tertiary_sections.*.description' => 'nullable|string',
            'tertiary_sections.*.items' => 'array',
            'tertiary_sections.*.items.*.key' => 'nullable|string',
            'tertiary_sections.*.items.*.value' => 'nullable|string',
			'lenders' => 'array',
			'lenders.*.name' => 'nullable|string|max:255',
			'lenders.*.age_limit' => 'nullable|string|max:255',
            'lenders.*.effective_interest_rate' => 'nullable|string|max:255',
			'lenders.*.repayment_period' => 'nullable|string|max:255',
            'lenders.*.description' => 'nullable|string',
            'lenders.*.logo' => 'nullable|image|max:2048',
        ];
    }

    public function mount(int $serviceId): void
    {
        $this->serviceId = $serviceId;

        $service = Service::findOrFail($serviceId);

        $this->title = (string) $service->title;
        $this->slug = (string) $service->slug;
        $this->primary_section = $service->primary_section;
        $this->existing_featured_image = $service->featured_image;
        $this->secondary_sections = $service->secondary_sections ?? [];
        $this->tertiary_sections = $service->tertiary_sections ?? [];
        $this->lenders = $service->lenders
            ->map(function ($lender) {
                return [
                    'name' => $lender->name,
                    'age_limit' => $lender->age_limit,
					'effective_interest_rate' => $lender->effective_interest_rate,
                    'repayment_period' => $lender->repayment_period,
                    'description' => $lender->description,
                    'existing_logo' => $lender->logo,
                    'logo' => null,
                ];
            })
            ->toArray();

        if ($this->lenders === []) {
            $this->addLender();
        }
    }

    public function updatedTitle(): void
    {
            $this->slug = Str::slug($this->title);
        
    }

    public function addSecondarySection(): void
    {
        $this->secondary_sections[] = [
            'title' => '',
            'items' => [
                ['key' => '', 'value' => ''],
            ],
        ];
    }

    public function removeSecondarySection(int $index): void
    {
        unset($this->secondary_sections[$index]);
        $this->secondary_sections = array_values($this->secondary_sections);
    }

    public function addSecondaryItem(int $sectionIndex): void
    {
        $this->secondary_sections[$sectionIndex]['items'][] = ['key' => '', 'value' => ''];
    }

    public function removeSecondaryItem(int $sectionIndex, int $itemIndex): void
    {
        unset($this->secondary_sections[$sectionIndex]['items'][$itemIndex]);
        $this->secondary_sections[$sectionIndex]['items'] = array_values($this->secondary_sections[$sectionIndex]['items']);
    }

    public function addTertiarySection(): void
    {
        $this->tertiary_sections[] = [
            'title' => '',
            'description' => '',
            'items' => [
                ['key' => '', 'value' => ''],
            ],
        ];
    }

    public function removeTertiarySection(int $index): void
    {
        unset($this->tertiary_sections[$index]);
        $this->tertiary_sections = array_values($this->tertiary_sections);
    }

    public function addTertiaryItem(int $sectionIndex): void
    {
        $this->tertiary_sections[$sectionIndex]['items'][] = ['key' => '', 'value' => ''];
    }

    public function removeTertiaryItem(int $sectionIndex, int $itemIndex): void
    {
        unset($this->tertiary_sections[$sectionIndex]['items'][$itemIndex]);
        $this->tertiary_sections[$sectionIndex]['items'] = array_values($this->tertiary_sections[$sectionIndex]['items']);
    }

    public function addLender(): void
    {
        $this->lenders[] = [
            'name' => '',
            'age_limit' => '',
			'effective_interest_rate' => '',
            'repayment_period' => '',
            'description' => '',
            'existing_logo' => null,
            'logo' => null,
        ];
    }

    public function removeLender(int $index): void
    {
        unset($this->lenders[$index]);
        $this->lenders = array_values($this->lenders);
    }

    public function save(): void
    {
        $validated = $this->validate();

        $service = Service::findOrFail($this->serviceId);

        $featuredPath = $this->existing_featured_image;
        if (! empty($validated['featured_image'])) {
            $featuredPath = $validated['featured_image']->store('services', 'public');
        }

        $secondary = collect($this->secondary_sections)
            ->map(function ($section) {
                $items = collect($section['items'] ?? [])
                    ->filter(fn ($item) => ($item['key'] ?? '') !== '' || ($item['value'] ?? '') !== '')
                    ->values()
                    ->all();

                return [
                    'title' => $section['title'] ?? '',
                    'items' => $items,
                ];
            })
            ->filter(fn ($section) => $section['title'] !== '' || count($section['items']) > 0)
            ->values()
            ->all();

        $tertiary = collect($this->tertiary_sections)
            ->map(function ($section) {
                $items = collect($section['items'] ?? [])
                    ->filter(fn ($item) => ($item['key'] ?? '') !== '' || ($item['value'] ?? '') !== '')
                    ->values()
                    ->all();

                return [
                    'title' => $section['title'] ?? '',
                    'description' => $section['description'] ?? '',
                    'items' => $items,
                ];
            })
            ->filter(fn ($section) => $section['title'] !== '' || $section['description'] !== '' || count($section['items']) > 0)
            ->values()
            ->all();

        $service->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'primary_section' => $validated['primary_section'] ?? null,
            'featured_image' => $featuredPath,
            'secondary_sections' => $secondary,
            'tertiary_sections' => $tertiary,
        ]);

        // sync lenders: simple delete & recreate based on current form
        $service->lenders()->delete();

        collect($this->lenders)
            ->filter(function ($lender) {
                $name = trim($lender['name'] ?? '');
                $age = trim($lender['age_limit'] ?? '');
                $rate = trim($lender['effective_interest_rate'] ?? '');
                $repayment = trim($lender['repayment_period'] ?? '');
                $desc = trim($lender['description'] ?? '');

				return $name !== '' || $age !== '' || $rate !== '' || $repayment !== '' || $desc !== '';
            })
            ->each(function ($lender) use ($service) {
                $logoPath = null;
                if (! empty($lender['logo'])) {
                    $logoPath = $lender['logo']->store('service-lenders', 'public');
                } elseif (! empty($lender['existing_logo'])) {
                    $logoPath = $lender['existing_logo'];
                }

                ServiceLender::create([
                    'service_id' => $service->id,
                    'name' => $lender['name'] ?? '',
                    'age_limit' => $lender['age_limit'] ?? null,
					'effective_interest_rate' => $lender['effective_interest_rate'] ?? null,
                    'repayment_period' => $lender['repayment_period'] ?? null,
                    'description' => $lender['description'] ?? null,
                    'logo' => $logoPath,
                ]);
            });

        $this->dispatch('toast-show', [
            'message' => 'Service updated successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->redirectRoute('admin.services');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.service.update-service');
    }
}
