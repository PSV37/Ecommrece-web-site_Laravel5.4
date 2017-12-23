

<table style="width:100%" class="table table-hover table-striped" >
@foreach($data as $pro)

<tr  style="height:50px">
    <td style="padding:10px">{{$pro->pro_name}}</td>
    <td style="padding:10px">{{$pro->pro_code}}</td>
    <td style="padding:10px">{{$pro->pro_price}}</td>
    <td style="padding:10px">{{$pro->cat->cat_name}}</td>
    <td><a class="btn btn-sm btn-fill btn-primary" href="{{url('/admin/editProduct')}}/{{$pro->id}}">Edit</td>
    <td><a class="btn btn-sm btn-fill btn-danger" href="{{url('/admin/deleteProduct')}}/{{$pro->id}}">Delete</td>
  </tr>
@endforeach

</table>

