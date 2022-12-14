@extends('admin.master.masterar')
@section('name')
الوظائف
@endsection
@section('content')
<div class="row">
    <div class="col-12">


      <div class="card">
        <div class="card-header">
          <h3 class="card-title" style="float: right;">جميع الوظائف</h3><br/>
          <a href="{{ route('admin.jop.create') }}" style="float: right" class="btn btn-info">اضافة وظيفة</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>id</th>
              <th>الاسم العربي </th>
              <th>الاسم الانجليزي </th>
              <th>تعديل-</th>
            </tr>
            </thead>
            <tbody>
@foreach ($jops as $jop)
<tr>
    <td>{{ $jop->id }}</td>
      <td>{{ $jop->name_ar }}</td>
      <td>{{ $jop->name_en }}</td>

      <td>
        <a href="{{ route('admin.jop.edit',$jop->id) }}" class="btn btn-info sm"><i class=" fas fa-edit"></i></a>
        <br>
        {{-- <a href="{{ route('admin.jop.delete',$jop->id) }}" id="delete" class="btn btn-danger sm"><i class="fas fa-trash-alt"></i></a> --}}
      </td>
    </tr>

@endforeach


            </tbody>
            <tfoot>
            <tr>
              <th>id</th>
              <th>الاسم العربي </th>
              <th>الاسم الانجليزي </th>
              <th>تعديل-حزف</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection

@section('script')
<!-- DataTables -->
<script src="/dashboard/plugins/datatables/jquery.dataTables.js"></script>
<script src="/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'هل انت متاكد من مسح هذا  ؟',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'الغاء',
                    confirmButtonText: 'تنفيذ المسح'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  })


    });

  });
</script>




<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>
@endsection
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
@endsection
