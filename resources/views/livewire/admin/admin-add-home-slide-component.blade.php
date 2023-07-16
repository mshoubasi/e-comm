<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Add New Slide
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                All Slides
                                <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.home.slider') }}" class="btn btn-success float-end">All Slides</a>
                                </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                           <form wire:submit.prevent='addSlider'>
                            <div class="mb-3 mt-3">
                                <label for="title" class="form-name">Title</label>
                                <input type="text" class="form-control" placeholder="Enter slide title" wire:model='title'>
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="top_title" class="form-name">Top Title</label>
                                <input type="text" class="form-control" placeholder="Enter slide top title" wire:model='top_title'>
                                @error('top_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="sub_title" class="form-name"> Sub Title</label>
                                <input type="text" class="form-control" placeholder="Enter slide sub title" wire:model='sub_title'>
                                @error('sub_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="offer" class="form-name">Offer</label>
                                <input type="text" class="form-control" placeholder="Enter slide offer" wire:model='offer'>
                                @error('offer')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="link" class="form-name">Link</label>
                                <input type="text" class="form-control" placeholder="Enter slide link" wire:model='link'>
                                @error('link')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="status" class="form-name">Status</label>
                                <select class="form-select" wire:model='status'>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="image" class="form-slug">image</label>
                                <input type="file" name="image" class="form-control" wire:model="image">
                                @if ($image)
                                    <img src="{{ $image->temporaryurl() }}" width="120">
                                @endif
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                           </form>
                        </div>
                </div>
            </div>
        </section>
    </main>
</div>
