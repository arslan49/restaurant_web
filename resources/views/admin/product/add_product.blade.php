@include("admin.index")
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="content">
                                <form action="{{url('addproductaction')}}"   enctype="multipart/form-data" method="post">
                                  @csrf
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Name</label>
                                        <input type="text"  placeholder="Enter Product Name" required  class="form-control" name="name" /> 
                                    </div>
                                    <div class="col-md-5">
                                        <label>Price</label>
                                        <input type="number"  placeholder="Price" required  class="form-control" name="price" /> 
                                    </div>
                                      <div class="col-md-5" style="margin-left:10px;">
                                        <label>Stock</label>
                                        <input type="number"  placeholder="Stock" required  class="form-control" name="stock" /> 
                                    </div>
                                      <div class="col-md-5" style="margin-left:10px;">
                                        <label>select Category</label>
                                          <select class="form-control" name="category">
                                              @if($cat)
                                                 @foreach($cat as $list)
                                                    <option value="{{$list->id}}">{{$list->cate_name}}</option>
                                                  @endforeach
                                              @endif
                                          </select>
                                    </div>
                                    <div class="col-md-12 col-md-12" style="text-align: center;" >
                                            <div class="form-group">
                                                <label class="control-label mb-1"> Category icon (<b>height=230px, width=230px</b>)</label><Br>
                                                    <input data-preview="#preview" name="splash_logo" style="    text-align: center;
    margin-left: 500px" onchange="loadFile(event)" accept="image/*" type="file" id="imageInput" required>
                                                        <br>
                                                    <img id="output" width="230px" height="230px" style="height: 230px;width: 230px; border-style: solid;
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
