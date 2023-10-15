<table class="list-table table table-hover my">
  <thead class="">
    <th>Product</th>
    <th>Category</th>
    <th>Price</th>
    <th>Image</th>
    <th>Status</th>
    <th>Action</th>
  </thead>
  <tbody id="table_data">@forelse($products as $product)
    <tr data-id="{{$product['id']}}"> 
        <td>{{$product['name']}}</td>
        <td>{{$product['category']['name']}}</td>
        <td>${{$product['price']}}</td>
        <td>
            <a data-fancybox="gallery" href="{{$product['image']}}"><img src="{{$product['image']}}" style="width:50%"></a>
        </td>
        <td>
            <div class="togglebutton">
              <label>
                <input type="checkbox" class="switch_check" data-id="{{$product['id']}}" data-url="{{route('products.update',$product['id'])}}" @if($product['is_active']) checked="checked" @endif>
                  <span class="toggle"></span>
              </label>
            </div>
        </td>
        <td style="width:20%">
            <a class="btn btn-info btn-sm btn-round view" href="javascript:void(0);" data-action="{{route('products.show',$product['id'])}}" id="{{$product['id']}}"><i class="fa fa-eye"></i></a>
            <a class="btn btn-warning btn-sm btn-round edit" href="javascript:void(0);" data-action="{{route('products.edit',$product['id'])}}" id="{{$product['id']}}"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-rose btn-sm btn-round delete" href="javascript:void(0);" data-action="{{route('products.destroy',$product['id'])}}" id="{{$product['id']}}"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @empty
    <tr><td colspan="9"><center>No Prodcut found</center></td></tr>
    @endforelse
  </tbody>
</table>
@if(!empty($products))
    {{$products->links('pagination::bootstrap-4')}}
@endif