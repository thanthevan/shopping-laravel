@if($user->count()>0)
<div class="form-control" style="padding: 5px">
<table class="table-hover">
    @foreach ($user as $us)
      
   
     <tr> 
                   <td> <h4 class="m-t-0 member-name " style="margin-right: 10px"><strong>{{$us->name}}</strong></h4> </td>
                    <td><h4 class="m-t-0 member-name " style="margin-right: 10px" ><strong>{{$us->email}}</strong></h4> </td>
                    <td> <h4 class="m-t-0 member-name " style="margin-right: 10px"><strong>{{$us->phone}}</strong></h4> </td>
                     
                      
                                                 <td><form  style="display: inline-block;" action="{{ route('user.destroy',['id'=>$us->id]) }}" method="post">
                                                      <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button onclick="return confirm('Bạn có thực sự muốn xóa thành viên');" class="btn btn-danger btn-sm">Xóa</button>
                                                </form> </td>
      </tr>
       @endforeach
</table>
</div>
@else
<ul class="result-ul form-control col-md-4">
     <li> 
             <p>Không có kết quả</p>
    </li>
</ul>
@endif