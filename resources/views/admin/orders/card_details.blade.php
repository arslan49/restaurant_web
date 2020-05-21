@include("admin.index")
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                       <div class="content table-responsive table-full-width">
                           <div class="row">
                               <div class="col-md-6">
                                 <b>  Secure Token </b>
                               </div>
                               <div class="col-md-6">
                                   {{$order->token_id}} 
                               </div>
                                <br /><br>
                               <div class="col-md-6">
                                 <b>  Address </b>
                               </div>
                               <div class="col-md-6">
                                   {{$order->address}} 
                               </div>
                                 <br /><br>
                               <div class="col-md-6">
                                 <b> Order Created </b>
                               </div>
                               <div class="col-md-6">
                                   <?php
                                     echo explode("GMT",$order->created)[0];
                                   ?>

                               </div>
                               <br /><br>
                               <div class="col-md-6">
                                 <b> Brand </b>
                               </div>
                               <div class="col-md-6">
                                 {{$order->brand}}
                               </div>
                               <br /><br>
                               <div class="col-md-6">
                                 <b> Last 4 </b>
                               </div>
                               <div class="col-md-6">
                                 {{$order->last4}}
                               </div>
                               <br /><br>
                               <div class="col-md-6">
                                 <b> Status </b>
                               </div>
                               <div class="col-md-6">
                                 {{($order->is_delivered==0)?'Waiting':'Completed'}}
                               </div>

                           </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
