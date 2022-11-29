@extends('admin.master.masterar')
@section('name')
الشركات
@endsection
@section('content')

<div class="row">

    <!-- right column -->
    <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title" style="float: right;">اضافة شركة</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <!-- /.card-header -->
        <div class="card-body">
          <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.brand.store') }}">
            @csrf
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>الاسم العربي</label>
                  <input type="text" class="form-control" name="name_ar" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>الاسم الانجليزي</label>
                  <input type="text" class="form-control" name="name_en" placeholder="Enter ...">
                </div>
              </div>

            </div>
              <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>الصورة</label>
                    <input type="file" class="form-control" name="img" placeholder="Enter ...">
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">

                    <input type="submit" class="btn btn-info" name="" value="اضف شركة" placeholder="Enter ...">
                  </div>
                </div>

              </div>






          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
  <br>
  <br>
  <br>
  <br>
@endsection
