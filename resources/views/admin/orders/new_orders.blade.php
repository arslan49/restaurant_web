@include("admin.index")
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                       <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>UserName</th>
                                    	<th>Email</th>
                                    	<th>Phone Number</th>
                                    	<th>City</th>
                                    	<th>Address</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                        @if($order)
                                            @foreach($order as $list)
                                               <tr>
                                                   <?php
                                                        $user  = $list->user;
                                                   ?>
                                                   <td >{{$user->name}}</td>
                                                   <td >{{$user->email}}</td>
                                                   <td >{{$user->phone_number}}</td>
                                                   <td >{{$user->city}}</td>
                                                   <td >{{$user->address}}</td>
                                                   <td>
                                                   <a href="{{url('getorderdetails')}}/{{$user->id}}/{{$list->id}}/{{$list->is_delivered}}" class="btn btn-primary">Order Details</a>
                                                   <a href="{{url('carddetails')}}/{{$list->id}}" class="btn btn-danger"> Card Details</a>
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
