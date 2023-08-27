<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title fs-5" id="exampleModalLabel">XÓA DANH MỤC</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="destroyCategory">
              <div class="modal-body">
                <h6>Bạn có chắc muốn xóa danh mục này?</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                <button type="submit"  class="btn btn-primary">Xóa</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Danh mục sản phẩm <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">Thêm danh mục</a></h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Danh mục</th>
                                <th>Trạng thái</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status == '1' ? 'Tạm dừng':'Đã kích hoạt' }}</td>
                                <td>
                                    <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-success">Sửa</a>
                                    <a href="#" wire:click="deleteCategory({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Xóa</a>
                                    <!-- <button wire:click="deleteCategory({{ $category->id }})" class="btn btn-danger">Xóa</button> -->
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {!! $categories->links() !!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>
@push('script')
    <script>
        window.addEventListener('close-modal',event =>{
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush