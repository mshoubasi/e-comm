<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Edit Category
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Edit Categories
                                <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.categories') }}" class="btn btn-success float-end">All Categories</a>
                                </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                           <form wire:submit.prevent='updateCategory'>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Category Name" wire:model='name' wire:keyup='generateSlug'>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="slug" class="form-slug">slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="Enter Category Slug" wire:model='slug'>
                                @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="newImage" class="form-slug">Image</label>
                                <input type="file" class="form-control" wire:model='newImage'>
                                @if ($newImage)
                                    <img src="{{ $newImage->temporaryurl() }}" width="120">
                                @else
                                    <img src="{{ asset('assets/imgs/category') }}/{{ $image }}" width="120">
                                @endif
                                @error('newImage')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="is_popular" class="form-slug">Popular</label>
                                <select name="is_popular" class="form-control" wire:model='is_popular'>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('is_popular')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                           </form>
                        </div>
                </div>
            </div>
        </section>
    </main>
</div>
