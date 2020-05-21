
                     @if (count($errors) > 0)
                                    
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger" role="alert">
                                                    <li>{{ $error }}</li>
                                                </div>
                                            @endforeach
                                @endif
                                @if(session()->has("error"))
                                    <div class="alert alert-danger" role="alert">
                                        {{session('error')}}
                                    </div>
                                @endif
                                @if(session()->has("success"))
                                    <div class="alert alert-success" role="alert">
                                        {{session('success')}}
                                    </div>
                                @endif
