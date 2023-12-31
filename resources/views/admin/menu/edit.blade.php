@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="{{ URL::current() }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input type="text" name="name" value="{{$menu->name}}" class="form-control" placeholder="Nhập tên danh mục">
            </div>

            {{-- <div class="form-group">
                <label>Danh mục</label>
                <select name="parent_id" class="form-control">
                    <option value="0" {{$menu->parent_id == 0 ? 'selected' : ''}}>Danh mục cha</option>
                    @foreach ($menus as $menuParent)
                        <option value="{{$menuParent->id}}" {{$menu->parent_id == $menuParent->id ? 'selected' : ''}}>
                            {{$menuParent->name}}
                        </option>
                    @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{$menu->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{$menu->content}}</textarea>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <div class="form-control" style="padding: 3px 2px;">
                    <input type="file" name="image" id="">
                </div>
                <img src="{{ asset($menu->menu_image) }}" alt="">
            </div>

            <div class="form-group">
                <label>kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{$menu->active == 1 ? 'checked=""' : ''}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{$menu->active == 0 ? 'checked=""' : ''}} >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
