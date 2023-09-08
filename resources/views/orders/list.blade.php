@forelse($orders as $order)
<tr data-id="{{$order['id']}}" data-final="{{$order['FinalTotalAmount']}}"> 
    <td>{{$order['CustomerName']}}</td>
    <td><select name="Product_Name" class="form-control Product_Name" id="Product_Name_{{$order['id']}}">
            <option value="">--Select Product--</option>
            @foreach($products as $product)
            <option data-rate = "{{$product->Rate}}" data-unit = "{{$product->Unit}}" value="{{$product->Product_ID}}" @if($order['Product_Name'] == $product->Product_ID) selected @endif>
            	{{$product->Product_Name}}
            </option>
            @endforeach
        </select>
    </td>
    <td id="Rate_{{$order['id']}}">{{$order['Rate']}}</td>
    <td id="Unit_{{$order['id']}}">{{$order['Unit']}}</td>
    <td><input class="form-control Qty" id="Qty_{{$order['id']}}" value="{{$order['Qty']}}"></td>
    <td><input class="form-control Disc_Percentage" id="Disc_Percentage_{{$order['id']}}" value="{{$order['Disc_Percentage']}}"></td>
    <td id="NetAmount_{{$order['id']}}">{{$order['NetAmount']}}</td>
    <td class="TotalAmount" id="TotalAmount_{{$order['id']}}">{{$order['TotalAmount']}}</td>
    <td>
        <a class="btn btn-rose btn-sm btn-round" href="javascript:void(0);" data-action="{{route('orders.edit',$order['id'])}}" id="RemoveOrder"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@empty
<tr><td colspan="9"><center>No Prodcut found</center></td></tr>
@endforelse

@if(empty($orders))
	<script type="text/javascript">
		$('#final_submit').hide();
	</script>
@else
	<script type="text/javascript">
		$('#final_submit').show();
	</script>
@endif