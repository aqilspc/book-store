@extends('layouts.backend.header')

@section('content')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">List</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">The list of book order</h3>
                @if($message=Session::get('success'))
                <p align="center">
                  <div class="alert alert-success">
                      {{$message}}
                  </div>
                </p>
                @endif
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Order Id</th>
                      <th>Member</th>
                      <th>List Book Order</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php $model = new App\Models\User(); @endphp
                      @foreach($data as $key => $item)
                      @php $list = $model->getItemOrder($item->id) @endphp
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$item->order_id}}</td>
                          <td>{{$item->name}}</td>
                          <td><?php echo $list?></td>
                          <td>{{ucwords($item->status)}}</td>
                          <td>
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$item->id}}">
                              Edit Status
                              <i class="fa fa-edit"></i>
                            </a>
                          </td>
                        </tr>

                         <!-- modal -->
                        <div class="modal fade" id="modal-edit{{$item->id}}">
                            <div class="modal-dialog modal-xl">
                              <form action="{{url('backend_book_order_update/'.$item->id)}}" method="post">
                                @csrf
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Status {{$item->order_id}}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                   <div class="input-group mb-3">
                                    @php $status = ['unpaid', 'paid', 'delivered', 'arrived']; @endphp
                                      <select class="form-control" name="status" required>
                                        @foreach($status as $ct)
                                        <option value="{{$ct}}" {{$ct == $item->status?'selected':''}}>
                                          {{ucwords($ct)}}
                                        </option>
                                        @endforeach
                                      </select>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fa fa-list"></span>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                              </div>
                              </form>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                      @endforeach
                     </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection

