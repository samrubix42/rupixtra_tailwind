<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting as SettingModel;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Setting extends Component
{
    use WithFileUploads;

    public ?string $app_name = null;
    public ?string $company_name = null;
    public ?string $ceo_name = null;
    public ?string $contact_email = null;
    public ?string $contact_address = null;
    public ?string $footer_text = null;

    public ?string $phone_number = null;
    public ?string $whatsapp_number = null;
    public ?string $seo_title = null;
    public ?string $seo_description = null;
    public ?string $seo_keywords = null;

    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $logo = null;

    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $favicon = null;

    public ?string $logo_path = null;
    public ?string $favicon_path = null;

    public function mount(): void
    {
        $settings = SettingModel::query()->pluck('value', 'key')->toArray();

        $this->app_name = $settings['app_name'] ?? null;
        $this->company_name = $settings['company_name'] ?? null;
        $this->ceo_name = $settings['ceo_name'] ?? null;
        $this->contact_email = $settings['contact_email'] ?? null;
        $this->contact_address = $settings['contact_address'] ?? null;
        $this->footer_text = $settings['footer_text'] ?? null;

        $this->phone_number = $settings['phone_number'] ?? null;
        $this->whatsapp_number = $settings['whatsapp_number'] ?? null;
        $this->seo_title = $settings['seo_title'] ?? null;
        $this->seo_description = $settings['seo_description'] ?? null;
        $this->seo_keywords = $settings['seo_keywords'] ?? null;

        $this->logo_path = $settings['site_logo'] ?? null;
        $this->favicon_path = $settings['site_favicon'] ?? null;
    }

    protected function rules(): array
    {
        return [
            'app_name' => ['nullable', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'ceo_name' => ['nullable', 'string', 'max:255'],
            'contact_email' => ['nullable', 'string', 'max:255'],
            'contact_address' => ['nullable', 'string'],
            'footer_text' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:50'],
            'whatsapp_number' => ['nullable', 'string', 'max:50'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'favicon' => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function save(): void
    {
        $this->validate();

        $settings = [
            'app_name' => $this->app_name,
            'company_name' => $this->company_name,
            'ceo_name' => $this->ceo_name,
            'contact_email' => $this->contact_email,
            'contact_address' => $this->contact_address,
            'footer_text' => $this->footer_text,
            'phone_number' => $this->phone_number,
            'whatsapp_number' => $this->whatsapp_number,
            'seo_title' => $this->seo_title,
            'seo_description' => $this->seo_description,
            'seo_keywords' => $this->seo_keywords,
        ];

        if ($this->logo) {
            if ($this->logo_path) {
                Storage::disk('public')->delete($this->logo_path);
            }

            $path = $this->logo->store('settings', 'public');
            $this->logo_path = $path;
            $settings['site_logo'] = $path;
        }

        if ($this->favicon) {
            if ($this->favicon_path) {
                Storage::disk('public')->delete($this->favicon_path);
            }

            $path = $this->favicon->store('settings', 'public');
            $this->favicon_path = $path;
            $settings['site_favicon'] = $path;
        }

        foreach ($settings as $key => $value) {
            SettingModel::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $this->dispatch('toast-show', [
            'message' => 'Settings updated successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.setting.setting');
    }
}
