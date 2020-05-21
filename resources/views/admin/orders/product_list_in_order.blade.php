@include("admin.index")
<div class="content">
   
                <div class="row">
                     @if($status) {
             <div class="container-fluid">
                <div class="alert alert-success">
                    <strong>Success!</strong> Order already completed.
                </div>
                </div>
                @else

                    <form method="post" action="{{url('completeOrder')}}" style="text-align: end; margin-right:20px;">
                       @csrf
                    <input  type="hidden" name="order_id"  value="{{$order_id}}" />
                        <input type="submit"  class="btn btn-warning"/>
                    </form>s
                    @endif
                    <div class="col-lg-12 col-sm-12">
                       <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Product Name</th>
                                    	<th>Quanity</th>
                                    	<th>Price</th>
                                    </thead>
                                    <tbody>
                                        @if($prod)
                                            @foreach($prod as $list)
                                               <tr>
                                                   <td >{{$list->product_name}}</td>
                                                   <td >{{$list->quantity}}</td>
                                                   <td >{{$list->price}}</td>
                                                   </td>
                                               </tr>
                                            @endforeach
                                        @endif
                                       <tr>

                                       </tr>
                                    </tbody>
                                </table>

                            </div>
                    </div>
                </div>
            </div>
        </div>
