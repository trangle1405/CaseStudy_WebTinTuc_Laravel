
@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Tin
                        <small>> Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                <strong>{{ $err }}</strong><br/>
                            @endforeach
                        </div>
                    @endif

                    @if(session('message'))
                        <div class="alert alert-success">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif
                    <form action="admin/typeOfNews/add" method="POST">
                       @csrf
                        <div class="form-group">
                            <p><label>Tên Loại Tin</label></p>
                            <input class="form-control input-width" name="name" placeholder="" />
                        </div>
                        <div class="form-group">
                            <p><label>Chọn Thể Loại</label></p>
                            <select class="form-control input-width" name="category_id">
                                @foreach($category as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
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