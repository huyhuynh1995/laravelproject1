<!-- form create -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Brand</h5>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="storeBrand">
        <div class="modal-body">
          <div class="mb-3">
            <label for="">Chọn danh mục</label>
            <select wire:model.defer="category_id" required class="form-control">
              <option value="">--Chọn danh mục--</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
          </div>
          <div class="mb-3">
            <label for="">Brand Name</label>
            <input type="text" wire:model.defer="name" class="form-control">
            @error('name') <small class="text-danger"> {{ $message }}</small> @enderror
          </div>
          <div class="mb-3">
            <label for="">Brand Slug</label>
            <input type="text" wire:model.defer="slug" class="form-control">
            @error('slug') <small class="text-danger"> {{ $message }}</small> @enderror
          </div>
          <div class="mb-3">
            <label for="">Status</label>
            <input type="checkbox" wire:model.defer="status" > Checked=Hidden, Un-Checked=Visible
            @error('status') <small class="text-danger"> {{ $message }}</small> @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save </button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<!-- form edit -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading class="p-2">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>Loading...
      </div> 
      <div wire:loading.remove>
        <form wire:submit.prevent="updateBrand">
          <div class="modal-body">
            <div class="mb-3">
              <label for="">Chọn danh mục</label>
              <select wire:model.defer="category_id" required class="form-control">
                <option value="">--Chọn danh mục--</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label for="">Brand Name</label>
              <input type="text" wire:model.defer="name" class="form-control">
              @error('name') <small class="text-danger"> {{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label for="">Brand Slug</label>
              <input type="text" wire:model.defer="slug" class="form-control">
              @error('slug') <small class="text-danger"> {{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label for="">Status</label>
              <input type="checkbox" wire:model.defer="status" > Checked=Hidden, Un-Checked=Visible
              @error('status') <small class="text-danger"> {{ $message }}</small> @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update </button>
          </div>
        </form>
      </div>       
      
      
    </div>
  </div>
</div>

<!-- modal delete -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Brand</h5>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading class="p-2">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>Loading...
      </div> 
      <div wire:loading.remove>
        <form wire:submit.prevent="destroyBrand">
          <div class="modal-body">
            <h4>Bạn có muốn xóa brand này ?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
            <button type="submit" class="btn btn-primary">Xóa </button>
          </div>
        </form>
      </div>       
      
      
    </div>
  </div>
</div>