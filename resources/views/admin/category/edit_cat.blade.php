@include("admin.index")
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="content">
                                <form action="{{url('editcategoryaction')}}"   enctype="multipart/form-data" method="post">
                                  @csrf
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Name</label>
                                        <input type="hidden" name="id"  value="{{$cat->id}}" />
                                        <input type="text"  value="{{$cat->cate_name}}"  placeholder="Enter Category Name" required  class="form-control" name="name" /> 
                                    </div>
                                    <div class="col-md-6 col-md-6" style="text-align: center;" >
                                            <div class="form-group">
                                                <label class="control-label mb-1"> Category icon (<b>height=230px, width=230px</b>)</label><Br>
                                                    <input data-preview="#preview" name="splash_logo" style="    text-align: center;
    margin-left: 150px" onchange="loadFile(event)" accept="image/*"  type="file" id="imageInput" >
                                                        <br>
                                                    <img id="output" src="{{asset($cat->image)}}" width="230px" height="230px" style="height: 230px;width: 230px; border-style: solid;
  border-width: 1px;"/>
                                                    <script>
                                                        var loadFile = function(event) {
                                                            var output = document.getElementById('output');
                                                            output.src = URL.createObjectURL(event.target.files[0]);
                                                        };
                                                    </script>
                                            </div>
                                        </div>
                                </div>
                                <div class="row" style="text-align: center;">
                                    <input  type="submit" name="submit" class="btn btn-primary">
                                 </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
