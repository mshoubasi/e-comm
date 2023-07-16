<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminEditHomeSlideComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $top_title;
    public $sub_title;
    public $offer;
    public $link;
    public $status;
    public $image;
    public $new_image;
    public $slide_id;

    public function mount($slide_id)
    {
        $slide = HomeSlider::find($slide_id);
        $this->title = $slide->title;
        $this->top_title = $slide->top_title;
        $this->sub_title = $slide->sub_title;
        $this->offer = $slide->offer;
        $this->link = $slide->link;
        $this->status = $slide->status;
        $this->image = $slide->image;
        $this->slide_id = $slide->id;
    }

    public function updateSlider()
    {
        $this->validate([
            'title' => 'required',
            'top_title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'link' => 'required',
            'status' => 'required',
            'new_image' => 'nullable|image',
        ]);

        $slide = HomeSlider::find($this->slide_id);

        if (!$slide) {
            return;
        }
        $imageName = '';
        if ($this->new_image) {
            $imageName = Carbon::now()->timestamp . '.' . $this->new_image->extension();

            // Check if file exists before deleting
            $existingImagePath = 'assets/imgs/slider/' . $slide->image;
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }

            // Use Storage facade to store file
             $this->new_image->storeAs('slider', $imageName);
        }

        $slide->update([
            'title'     => $this->title,
            'top_title' => $this->top_title,
            'sub_title' => $this->sub_title,
            'offer'     => $this->offer,
            'link'      => $this->link,
            'status'    => $this->status,
            'image'     => $imageName  ?: $slide->image,
        ]);
        session()->flash('message', 'Slide Updated');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slide-component');
    }
}
