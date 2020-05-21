@include("admin.index")
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                       <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Product Name</th>
                                    	<th>Price</th>
                                    	<th>Stock</th>
                                    	<th>Image</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                        @if($products)
                                            @foreach($products as $list)
                                               <tr>
                                                   <td >{{$list->product_name}}</td>
                                                   <td >{{$list->price}}</td>
                                                   <td >{{$list->stock}}</td>
                                                   <td>
                                                       <img src="{{asset($list->image)}}" style="width:100px" />
                                                   </td>
                                                   <td>
                                                   <a href="{{url('editProductview')}}/{{$list->id}}" class="btn btn-primary"> Edit</a>
                                                   <a href="{{url('deletecategory')}}/{{$list->id}}" class="btn btn-danger"> Delete</a>
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
