@php
$notificationsArr = $notifications["data"];

@endphp
@extends("app")
@section("contentbox")
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>My Notifications</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0"><h2>Notifications List</h2></div>
            </div>
            
            <div class="row column4 graph">
                <div class="col-md-12">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full progress_bar_inner">
                            <div class="row">
                            <div class="col-md-12">
                                <div class="msg_list_main">
                                    <ul class="msg_list">
                                    
                                    <?php
                    
                                    if(!empty($notificationsArr)){
                                        foreach($notificationsArr as $k => $row){    
                                            
                                            $id = $row["id"];
                                            $message = $row["message"];
                                            $receiver = $row["receiver"];
                                            $sender = $row["sender"];
                                            $dateTime = $row["dateTime"];
                                            $isRead = $row["isRead"];
                                            $type = $row["type"];
                                            $reference = $row["reference"];

                                            $dateTime = convertDateTime($dateTime);
                                            
                                    ?>

                                        <li>
                                            <span>
                                                <span class="name_user">{{ucwords($type)}}</span>
                                                <span class="msg_user">
                                                    
                                                <span style="float: left; width: 100%;">
                                                {{$message}}
                                                </span>
                                                <span style="float: left; width: 100%; padding: 15px; padding-right: 0; text-align: right;"> 
                                                    <?php if($reference > 0){ ?>
                                                        <a style="border: 1px solid #ff9800; border-radius: 3px; padding: 3px;" href="{{url('portal/application/'.$reference)}}"><i class="fa fa-upload yellow_color"></i> <span>Upload Documents</span></a>

                                                        <?php }else{ ?>
                                                            <a style="border: 1px solid #ff9800; border-radius: 3px; padding: 3px;" href="{{url('portal/newapplication')}}"><i class="fa fa-upload yellow_color"></i> <span>Upload Documents</span></a>

                                                        <?php } ?>
                                                </span>

                                                </span>
                                                <span style="right: 60px;" class="time_ago">{{$dateTime}}</span>
                                            </span>
                                        </li>

                                    <?php
                                        }
                                    }
                                    ?>   
                                        
                                    </ul>

                                     
                                </div>
                                
                            </div>

                            </div>



                        </div>


                        
                    </div>
                </div>


                <!--- pagination --->
                <div class="col-md-12">
                <div class="btn-group mr-2 pagination button_section button_style2">
                                @php
                        
                                    $prevLink = $notifications["links"][0]["url"]; //prevbutton url
                                    $nextLink = $notifications["links"][count($notifications["links"]) - 1]["url"]; //nextbutton url
                                    $activePageNum = "";
                                    foreach($notifications["links"] as $linkRw){
                                        if($linkRw["active"] == 1){
                                        $activePageNum = $linkRw["label"];
                                        }
                                    }  

                                    if($prevLink != ""){
                                        $prevurl = $prevLink;
                                        $prevHref = 'href='.$prevurl;
                                        $prevdisable = "";
                                    }else{
                                        $prevHref = "";
                                        $prevdisable = "disabled";
                                    }

                                    if($nextLink != ""){
                                        $nexturl = $nextLink;
                                        $nextHref = 'href='.$nexturl;
                                        $nextdisable = "";
                                    }else{
                                        $nextHref = "";
                                        $nextdisable = "disabled";
                                    }
                                    
                                    @endphp    
                        
                                <a class="btn paginate_button previous {{$prevdisable}}" {{$prevHref}} aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous"><i class="fa fa-angle-double-left"></i></a>
                            
                                <a class="btn active paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">{{$activePageNum}}</a>
                            
                                <a class="btn paginate_button next {{$nextdisable}}" {{$nextHref}}  aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="-1" id="DataTables_Table_0_next"><i class="fa fa-angle-double-right"></i></a>    
                            </div>
                            </div>
                            <!--- pagination --->
            </div>
            
        </div>
        </div>
    </div>
</div>
@endsection
@push("js")
@endpush