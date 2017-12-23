

<table style="width:100%" class="table table-hover table-striped" >
@foreach($data as $cat)

<tr  style="height:50px">
    <td style="padding:10px">{{$cat->cat_name}}</td>
    <td><a class="btn btn-sm btn-fill btn-primary" href="{{url('/admin/editProduct')}}/{{$cat->id}}">Edit</td>
  </tr>
@endforeach

</table>

