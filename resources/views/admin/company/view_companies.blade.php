@include("admin.index")
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                       <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Username</th>
                                    	<th>Email</th>
                                    	<th>Phone Number</th>
                                    	<th>City</th>
                                    	<th>Address</th>
                                    	<th>Image</th>
                                    	<th>Location</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                        @if($company)
                                            @foreach($company as $list)
                                               <tr>
                                                   <td >{{$list->username}}</td>
                                                   <td >{{$list->email}}</td>
                                                   <td >{{$list->phone_number}}</td>
                                                   <td >{{$list->city}}</td>
                                                   <td >{{$list->address}}</td>
                                                   <td>
                                                       <img src="{{asset($list->image)}}" style="width:100px" />
                                                   </td>
                                                   <td ><a target="_blank" href="https://maps.google.com/?q='{{$list->latitude}},{{$list->longitude}}'"  > View Location</a></td>
                                                   <td>
                                                       @if($list->is_approved)
                                                        <a href="" class="btn btn-disabled" disabled="disabled" > Already Approved </a>
                                                       @else
                                                       <a href="{{url('approvedCompany')}}/{{$list->id}}" class="btn btn-primary"> Accept</a>
                                                       @endif
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
