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
              <li class="breadcrumb-item active">Data</li>
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
                <h3 class="card-title">The list of book catgeory</h3>
                <p align="right">
                  <button class="btn btn-primary" class="btn btn-default" data-toggle="modal" data-target="#modal-create">
                    Add Book
                  </button>
                </p>
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
                      <th>Name</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $key => $item)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->category}}</td>
                          <td>Rp.{{number_format($item->price)}}</td>
                          <td>
                            <img src="{{$item->image}}" style="width: 20%;max-height: 200px;">
                          </td>
                          <td>
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$item->id}}">
                              <i class="fa fa-edit"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a class="btn btn-sm btn-danger" 
                               onclick="return confirm('Yakin ingin menghapus?')"
                               href="{{url('backend_book_list_delete/'.$item->id)}}">
                              <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        </tr>

                         <!-- modal -->
                        <div class="modal fade" id="modal-edit{{$item->id}}">
                            <div class="modal-dialog modal-xl">
                              <form action="{{url('backend_book_list_update/'.$item->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit list {{$item->name}}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="modal-body">
                                      <div class="input-group mb-3">
                                      <select class="form-control" name="category_id" required>
                                        @foreach($category as $ct)
                                        <option value="{{$ct->id}}" {{$ct->id == $item->category_id?'selected':''}}>
                                          {{$ct->name}}
                                        </option>
                                        @endforeach
                                      </select>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fa fa-list"></span>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required value="{{$item->name}}">
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fa fa-book"></span>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Price" name="price" required value="{{$item->price}}">
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fa fa-money"></span>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="image" >
                                         <input type="hidden" class="form-control" name="old_image" value="{{$item->image}}">
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fa fa-file"></span>
                                          </div>
                                      </div>
                                    </div>
                                     <small>Change image when image want change</small>
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

    <!-- modal -->
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-xl">
            <form action="{{url('backend_book_list_store/')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah list </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                </div>
              <div class="modal-body">
                  <div class="input-group mb-3">
                  <select class="form-control" name="category_id" required>
                    @foreach($category as $ct)
                    <option value="{{$ct->id}}">
                      {{$ct->name}}
                    </option>
                    @endforeach
                  </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-list"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-book"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Price" name="price" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-money"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="image" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-file"></span>
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

