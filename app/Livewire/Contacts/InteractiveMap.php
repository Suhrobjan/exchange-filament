<?php

namespace App\Livewire\Contacts;

use App\Models\RegionalOffice;
use Livewire\Component;

class InteractiveMap extends Component
{
    public $selectedRegionCode = 'UZ-TK'; // Default to Tashkent City
    public ?RegionalOffice $regionalOffice = null;

    public function mount()
    {
        $this->loadRegionData();
    }

    public function selectRegion($code)
    {
        $this->selectedRegionCode = $code;
        $this->loadRegionData();
    }

    private function loadRegionData()
    {
        // Try to find office by region_code, or fallback
        $this->regionalOffice = RegionalOffice::where('region_code', $this->selectedRegionCode)
            ->where('is_active', true)
            ->first();
    }

    public function render()
    {
        return view('livewire.contacts.interactive-map');
    }
}
