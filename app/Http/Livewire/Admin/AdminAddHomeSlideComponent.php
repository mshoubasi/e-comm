<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminAddHomeSlideComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $top_title;
    public $sub_title;
    public $offer;
    public $link;
    public $status;
    public $image;

    public function addSlider()
    {
        $this->validate([
            'title' => 'required',
            'top_title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'link' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slider', $imageName);
        HomeSlider::create([
            'title'     => $this->title,
            'top_title' => $this->top_title,
            'sub_title' => $this->sub_title,
            'offer'     => $this->offer,
            'link'      => $this->link,
            'status'    => $this->status,
            'image'     => $imageName,
        ]);
        session()->flash('message', 'Slider Added');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slide-component');
    }
}
