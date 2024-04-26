@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="public/assets/examples/css/forms/advanced.css">
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}

        .paddingRightDiv{
            padding-bottom: 22px;
            text-align: left;
            padding-right: 30px;
        }
        .marginCss {
            padding-bottom: 30px;
            text-align: right;
            padding-right: 30px;
        }
        .divcls{
            border: 1px solid lightgrey;
            padding: 10px;
        }

    </style>
    {{--@foreach($listData as $list)--}}
    {{--@endforeach--}}
    <div class="page-content"><div class="panel">
            @if(!empty($message))
                <div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-bell" style="color:#fff"></i>&nbsp;&nbsp;
                    {{$message}}
                </div>
            @endif
            @if(!empty($listData))
                <div class="panel-body container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-panel">
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_default_1" data-toggle="tab">Add Articals List</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab_default_2">
                                            <div class="row" style="transform: none;">
                                                {{--<form method="POST" role="form" action="{{ url('/getArticalListData') }}" accept-charset="UTF-8" id="schedulePageForm" name="schedulePageForm" >--}}
                                                    {{--{{ csrf_field() }}--}}
                                                    {{--<br>--}}
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Articals</label>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-control" id="add_artical_id" name="add_artical_id">
                                                                    <option value="">Select Artical</option>
                                                                    @foreach($allArtcal as $articallist)
                                                                        <option value="{{$articallist->home_eq_id}}">{{$articallist->eq_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <label for="" class="control-label col-md-1">Count</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="number" class="form-control" id="add_artical_count" name="add_artical_count">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <button type="button"  class="btn btn-primary ladda-button" onclick="addArticalToTable()">
                                                                    <i class="fa fa-plus"></i>  ADD
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                {{--</form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="panel">
            @if(!empty($listData))
                <div class="panel-body container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-panel">
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_default_1" data-toggle="tab">Edit Articals List</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab_default_2">
                                            <div class="row" style="transform: none;">
                                                <form method="POST" role="form" action="{{ url('/updateArticalListData') }}" accept-charset="UTF-8" id="schedulePageForm" name="schedulePageForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-3">Name :</label>
                                                            <label for="" class="control-label col-md-3" style="text-align: left">{{$enq_data->cust_name}}</label>

                                                            <input type="hidden" name="enq_id" value="{{$enq_data->enq_id}}">

                                                            <label for="" class="control-label col-md-2">CN NO :</label>
                                                            <label for="" class="control-label col-md-3" style="text-align: left">{{$enq_data->cn_no}}</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-3">Origin :</label>
                                                            <label for="" class="control-label col-md-3" style="text-align: left">{{$enq_data->source}}</label>

                                                            <label for="" class="control-label col-md-2">Destination :</label>
                                                            <label for="" class="control-label col-md-3" style="text-align: left">{{$enq_data->destination}}</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-3">Previous CFT :</label>
                                                            <label for="" class="control-label col-md-3" style="text-align: left">{{$enq_data->total_cft}}</label>

                                                            <label for="" class="control-label col-md-2">Kilometer :</label>
                                                            <label for="" class="control-label col-md-3" style="text-align: left">{{$enq_data->kilometer}}</label>
                                                            <input type="hidden" name="kilometer" value="{{$enq_data->kilometer}}">
                                                            <br><br><br>
                                                        </div>

                                                    </div>
                                                    <div class="row" style="padding-left: 30px;padding-right: 30px;font-weight: bold;">
                                                        {{--<div class="col-md-3 divcls">Sr. No.</div>--}}
                                                        <div class="col-md-4 divcls">Artical Name</div>
                                                        <div class="col-md-4 divcls">Artical Count</div>
                                                        <div class="col-md-4 divcls">Action</div>
                                                    </div>
                                                    <div id="articalTable">
                                                        @php $i=1; @endphp
                                                        @foreach($listData as $list)
                                                            <div class="row clsCount" style="padding-left: 30px;padding-right: 30px;" id="articalDiv_{{$i}}">
                                                                {{--<div class="col-md-3 divcls">{{$i}}</div>--}}
                                                                <div class="col-md-4 divcls">
                                                                    <input type="hidden" name="artical_id[]" value="{{$list->artical_id}}">
                                                                    {{$list->eq_name}}
                                                                </div>
                                                                <div class="col-md-4 divcls">
                                                                    <input type="hidden" name="artical_count[]" value="{{$list->artical_count}}">
                                                                    {{$list->artical_count}}
                                                                </div>
                                                                <div class="col-md-4 divcls" style="padding: 5px">
                                                                    <button type="button" onclick="deleteArtical({{$i}})" class="btn btn-primary" style="padding: 3px 10px;background-color: red;border: 1px solid red;border-radius: 7px;">
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            @php $i++; @endphp
                                                        @endforeach

                                                    </div>
                                                    <br>
                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" name="submit_cnno" value="submit_cnno" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i>  Update
                                                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.time1').datetimepicker({
            format: 'HH:mm a',

        });
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });

            $('#example').DataTable( {
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        });

        function deleteArtical(id) {
//            alert(id);
            // delete row (index-0).
            $("#articalDiv_"+id).hide();
            $("#articalDiv_"+id).html(" ");
        }

//        function addArticalToTable(){
//            var artical_id = $("#add_artical_id").val();
//            var artical_count = $("#add_artical_count").val();
//            if(artical_id != "" && artical_count !="") {
//                var x = document.getElementById("articalTable").rows.length;
//                var new_x = x;
//                var table = document.getElementById("articalTable");
//                var row = table.insertRow(new_x);
//                var cell1 = row.insertCell(0);
//                var cell2 = row.insertCell(1);
//                var cell3 = row.insertCell(2);
//                var cell4 = row.insertCell(3);
//                cell1.innerHTML = new_x;
//                cell2.innerHTML = '<input type="hidden" name="artical_id[]" value="' + artical_id + '"> ' + $("#add_artical_id option:selected").text();
//                ;
//                cell3.innerHTML = '<input type="hidden" name="artical_count[]" value="' + artical_count + '"> ' + artical_count;
//                cell4.innerHTML = '<button type="button" onclick="deleteArtical(' + new_x + ')" class="btn btn-primary ladda-button" style="background-color: red;border: 1px solid red;border-radius: 7px;">\n' +
//                    '                                                                                    <i class="fa fa-trash"></i>\n' +
//                    '                                                                                </button>';
//            }else{
//                alert("Select  artical or enter artical count.");
//            }
//        }
        function addArticalToTable(){
            var artical_id = $("#add_artical_id").val();
            var artical_count = $("#add_artical_count").val();
            if(artical_id != "" && artical_count !="") {
                var count_cls = parseInt($('.clsCount').length)+1;
                $( "#articalTable" ).append(
                    '<div class="row clsCount" style="padding-left: 30px;padding-right: 30px;" id="articalDiv_' + count_cls + '">\n' +
                    '                                                                <div class="col-md-4 divcls">\n' +
                    '                                                                    <input type="hidden" name="artical_id[]" value="' + artical_id + '">\n' +
                    '                                                                    ' + $("#add_artical_id option:selected").text() + '\n' +
                    '                                                                </div>\n' +
                    '                                                                <div class="col-md-4 divcls">\n' +
                    '                                                                    <input type="hidden" name="artical_count[]" value="' + artical_count + '">\n' +
                    '                                                                    ' + artical_count + '\n' +
                    '                                                                </div>\n' +
                    '                                                                <div class="col-md-4 divcls" style="padding: 5px">\n' +
                    '                                                                    <button type="button" onclick="deleteArtical(' + count_cls + ')" class="btn btn-primary" style="padding: 3px 10px;background-color: red;border: 1px solid red;border-radius: 7px;">\n' +
                    '                                                                        Delete\n' +
                    '                                                                    </button>\n' +
                    '                                                                </div>\n' +
                    '                                                            </div>'
                );
            }else{
                alert("Select  artical or enter artical count.");
            }
        }
    </script>
@stop