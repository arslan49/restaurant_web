@include("admin.index")
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                       <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Name</th>
                                    	<th>Icon</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                        @if($cat)
                                            @foreach($cat as $list)
                                               <tr>
                                                   <td >{{$list->cate_name}}</td>
                                                   <td>
                                                       <img src="{{$list->image}}" style="width:100px" />
                                                   </td>
                                                   <td>
                                                   <a href="{{url('editcategoryview')}}/{{$list->id}}" class="btn btn-primary"> Edit</a>
                                                   <a href="{{url('getproductsview')}}/{{$list->id}}" class="btn btn-info">View Products</a>
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
