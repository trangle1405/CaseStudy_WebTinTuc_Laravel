@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể Loại
                        <small>> Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    <!-- Check các lỗi nhập liệu như bao nhiêu ký tự, bắt buộc nhập (nếu có) -->
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                <strong>{{$err}}</strong><br>
                            @endforeach
                        </div>
                    @endif

                    <form action="admin/category/add" method="POST">
                        @csrf
                        <div class="form-group">
                            <p><label>Tên Thể Loại</label></p>
                            <input class="form-control input-width" name="name" value="{{old('name')}}" placeholder="Nhập tên Thể Loại.." />
                        </div>

                        <button type="submit" class="btn btn-default">Thêm</button>

                        <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
