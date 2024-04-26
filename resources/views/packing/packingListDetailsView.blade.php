@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="public/assets/examples/css/forms/advanced.css">
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
    <link rel="stylesheet" href="public//global/vendor/filament-tablesaw/tablesaw.css">

    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
        th{
            font-weight: bold;
            color: gray;
        }
    </style>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs ">
                                    <li class="active">
                                        <a href="#tab_default_1" data-toggle="tab">Packing Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Packing List No</th>
                                                        <td>{{$packListData->pl_id}}</td>
                                                        <th>Date </th>
                                                        <td>{{date("d-m-Y",strtotime($packListData->plcat))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Consignment No</th>
                                                        <td>{{$packListData->cn_no}}</td>
                                                        <th>Supervisor Name</th>
                                                        <td>{{$packListData->supervisor_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Laboure Name 1</th>
                                                        <td>{{$packListData->packer_name1}}</td>
                                                        <th>Laboure Name 2</th>
                                                        <td>{{$packListData->packer_name2}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Laboure Name 3</th>
                                                        <td>{{$packListData->packer_name3}}</td>
                                                        <th>Laboure Name 4</th>
                                                        <td>{{$packListData->packer_name4}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Laboure Name 5</th>
                                                        <td>{{$packListData->packer_name5}}</td>
                                                        <th>Laboure Name 6</th>
                                                        <td>{{$packListData->packer_name6}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created Date</th>
                                                        <td>{{date("d-m-Y",strtotime($packListData->plcat))}}</td>
                                                        <th>Updated Date</th>
                                                        <td>{{date("d-m-Y",strtotime($packListData->plupat))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created By</th>
                                                        <td>{{$packListData->u1fst}}{{$packListData->u1lst}}</td>
                                                        <th>Updated By</th>
                                                        <td>@if(!empty($packListData->u2fst) && !empty($packListData->u2lst)){{$packListData->u2fst}}{{$packListData->u2lst}}@endif</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @if(!empty($packingImage))
                                                @foreach($packingImage as $image)
                                                    <div class="form-group">
                                                        <div class="form-group col-md-4">
                                                            <a target="_blank" href="{{URL::asset('public/PackingImage')}}/{{$image->upload_image}}"  style="border: none;"><img src="{{URL::asset('public/PackingImage')}}/{{$image->upload_image}}" style="width: 80%;"></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });

            $('#example').DataTable( {
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                order:["1","desc"]
            } );

        });
    </script>
@stop