<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    {{Html::style('public/global/fonts/font-awesome/font-awesome.css')}}
    <style>
        .divClass{
            padding: 20px;
            width:50%;
        }
        .widthCls{
            width: 50%;
        }
        .headName{
            color:black;
            font-weight: 700;
            font-size: 13px;
        }
        table{
            border-collapse: collapse;
        }
        body{
            padding: 0px;
            margin: 0px;
        }
        .addClass{
            font-weight: 10;
            font-size: 10px;
            color: #4B0082;
            text-align: right;
        }
        .logoClass{
            font-size: 30px;
            font-weight: 700;
            font-family: auto;
            color:gray;

        }
        .lC{
            color:#e98601;
        }
        .dC{
            color:gray;
        }
        .iso{
            color:red;
        }
        td,th{
            padding: 5px;
            font-size: 10px;
        }
        th{
            text-align: left;
        }
        .taxCls{
            font-size: 20px;
            font-weight: 700;
            color: #4F0800;
        }
        .widthImg{
            width:643px;
        }
        @page { size:  A4 ;  margin: 0; }
        @media print {
            * {
                margin: 3px !important;
                padding-top: 0 !important;
            }

            body *, #formDiv * {
                visibility: hidden;
            }

            #printDiv * ,#printTable * {
                visibility: visible;
            }

            .widthCls{
                width: 100%!important;
            }
            .headName{
                color:black!important;
                font-weight: 700!important;
                font-size: 15px!important;
            }
            table{
                background-color: lightgrey !important;
                border: 0px solid lightgrey !important;
                width:100%!important;
            }
            body{
                padding: 10px!important;
                padding-top: 10px!important;
                margin: 0px;
            }
            .addClass{
                font-weight: 10!important;
                font-size: 15px!important;
                color: #4B0082!important;
                text-align: right!important;
            }
            .logoClass{
                font-size: 50px!important;
                font-weight: 700!important;
                font-family: auto!important;
                color:gray!important;

            }
            .lC{
                color:#e98601!important;
            }
            .dC{
                color:gray!important;
            }
            .iso{
                color:red!important;
            }
            td,th{
                padding: 5px!important;
                font-size: 15px !important;
            }
            th{
                text-align: left!important;
            }
            .taxCls{
                font-size: 25px!important;
                font-weight: 700!important;
                color: #4F0800!important;
            }
            .divClass{
                padding: 20px!important;
                padding-top: 25px!important;
                width:100%!important;
            }
            .widthImg{
                width:740px;
                margin-bottom: -10px;
            }
        }
    </style>
</head>
<body>
<div class="divClass" id="printDiv" >
    <div>
        <img src="{{URL::asset('public/images/quot_banner.png')}}" class="img widthImg" >
    </div>
    <table class="table-bordered table-responsive" width="100%" style="background-color: #f5f5f5;">
        <tr><td colspan="8" style="text-align: center"><h4><b>CASH RECEIPT</b> </h4></td></tr>
        <tr >
            <td width="50%" colspan="4"><b> Receipt  No : </b> {{ $PayRecpData->rcp_id }}</td>
            <td width="50%" colspan="4"><b> Receipt Date : </b> {{ date("d-m-Y",strtotime($PayRecpData->rcpCreate)) }}</td>
        </tr>
        <tr >
            <td width="100%" colspan="8"><b>Custmoer No:{{ $PayRecpData->cn_no }}/Safemove/Pune : </b></td>
        </tr>
        <tr >
            <td width="50%" colspan="4"><b>Received From : </b> {{ ucwords($PayRecpData->cust_name) }}</td>
            <td width="50%" colspan="4"><b>Amount Received Rs. : </b> {{ $PayRecpData->cur_paid_amt }}</td>
        </tr>
        <tr >
            <td width="100%" colspan="8"><b>In Words : </b> {{$amtInWord}}</td>
        </tr>
        {{--<tr>--}}
        {{--<td width="100%" colspan="8">--}}
        {{--<b>Payment Mode : </b>--}}
        {{--<input type="checkbox" {{ ($PayRecpData->payment_mode=="Cash")?"checked":"" }}> Cash--}}
        {{--<input type="checkbox" {{ ($PayRecpData->payment_mode=="Cheque")?"checked":"" }}> Cheque--}}
        {{--<input type="checkbox" {{ ($PayRecpData->payment_mode=="Online Payment")?"checked":"" }}> Online--}}
        {{--</td>--}}
        {{--</tr>--}}
        <tr>
            <td colspan="2" align="center">@if($PayRecpData->payment_mode=="Cash")<i class="fa fa-check" ></i>@endif</td>
            <td colspan="2"><b>Cash Payment </b></td>
            <td colspan="2"><b>Total Amount Due </b></td>
            <td colspan="2" align="right">{{ $PayRecpData->invoice_amount }}</td>
        </tr>
        <tr>
            <td colspan="2" align="center">@if($PayRecpData->payment_mode=="Cheque")<i class="fa fa-check" ></i>@endif</td>
            <td colspan="2"><b>Cheque Payment</b></td>
            <td colspan="2"><b>Total Amount Received</b></td>
            <td colspan="2" align="right">{{ $PayRecpData->invoice_amount-$PayRecpData->bal_amt  }}</td>
        </tr>
        <tr>
            <td colspan="2" align="center">@if($PayRecpData->payment_mode=="Online Payment")<i class="fa fa-check" ></i>@endif</td>
            <td colspan="2"><b>Online Payment</b></td>
            <td colspan="2"><b>Balance Due</b></td>
            <td colspan="2" align="right">{{ $PayRecpData->bal_amt }}</td>
        </tr>
        <tr >
            <td align="center"  colspan="4" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><br><br><br>
                Stamp
            </td>
            <td align="center"  colspan="4" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><br><br><br>
                AUTHORED SIGNATORY
                FOR SAFEMOVE PVT. LTD.
            </td>
        </tr>

    </table>


</div>
<br><br>
<form method="POST" role="form" action="{{ url('/sendPrintPaymentRcp') }}" accept-charset="UTF-8">
    {{ csrf_field() }}
    <input type="hidden" name="consignment_no" value="{{ $PayRecpData->cn_no }}">
    <input type="hidden" name="rcp_id" value="{{ $rcp_id }}">
    <div class="form-group col-sm-7 pull-right" id="formDiv">
        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" name="submit" value="saveBtn">
            <i class="fa fa-save"></i>  Save
            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
        </button>&nbsp;&nbsp;&nbsp;

        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left"  name="submit" value="sendBtn">
            <i class="fa fa-plane"></i>  Send
            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
        </button>&nbsp;&nbsp;&nbsp;

        <button  class="btn btn-primary ladda-button"  onClick="window.print()" name="button" value="printBtn">
            <i class="fa fa-print"></i>  Print
            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
        </button>
    </div>
</form>
</body>
</html>