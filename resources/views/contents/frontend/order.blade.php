@extends('layouts.frontend.header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@section('content')
    <!-- ENDS blocks -->
    <!-- slideshow -->

        <div class="contact" >
      <h5 class="custom"> My Order</h5>
      <!-- form -->

            <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Order Id</th>
                      <th>Member</th>
                      <th>List Book Order</th>
                      <th>Status</th>

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
                        </tr>

                      @endforeach
                     </tbody>
                  </table>
                </div>
      <!-- ENDS form -->
    </div>

    <!-- ENDS slideshow -->
@endsection

@section('script')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#example1').DataTable();
});
</script>
@endsection