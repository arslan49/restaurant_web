@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @include('error')
                <div class="card-body">
                    <form method="POST"   enctype="multipart/form-data" action="{{url('registercompany')}}">
                        @csrf
                         <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="name"  required autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="phone_number" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="city" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('password') is-invalid @enderror" name="address" required autocomplete="current-password">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Latitude</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('password') is-invalid @enderror" name="latitude" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Longitude</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="longitude" required autocomplete="current-password">
                            </div>
                        </div>
                           <div class="form-group row">
                                 <div class="col-md-12" style="text-align:center">
                                                <label class="control-label mb-1">Company Logo</label><Br><Br>
                                                    <input data-preview="#preview" name="logo"  onchange="loadFile(event)" accept="image/*" type="file" id="imageInput" required>
                                                        <br><Br>
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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                               
                            </div>
                        </div>
                        <br />
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                             <a href="{{url('/')}}" class="btn btn-link">Already have a account </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
