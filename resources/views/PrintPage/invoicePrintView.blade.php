<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .headName{
            color:black;
            font-weight: 700;
            font-size: 10px;
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
            font-size: 40px;
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
            border: 1px solid lightgrey;
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
            /*width:634px;*/
            width : 100%;
        }

        .divClass{
            padding: 20px;
            width:50%;
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
            .headName{
                color:black!important;
                font-weight: 700!important;
                font-size: 15px!important;
            }
            table{
                border-collapse: collapse;
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
                border: 1px solid lightgrey !important
            }
            th{
                text-align: left!important;
            }
            .taxCls{
                font-size: 25px!important;
                font-weight: 700!important;
                color: #4F0800!important;
            }

            .widthImg{
                /*width:740px;*/
                width :100%;
                margin-bottom: -10px;
            }

            .divClass{
                padding: 20px!important;
                padding-top: 25px!important;
                width:100%!important;
            }
        }
    </style>
</head>
<body>
<div id="printDiv" class="divClass">
    <div>
        <img src="{{URL::asset('public/images/quot_banner.png')}}" class="img widthImg" >
    </div>
    <div>
        <table  class="table-bordered table-responsive" width="100%" style="background-color: #f5f5f5;">
            <tr><td colspan="8" style="text-align: center"><h4><b>TAX INVOICE</b> </h4></td></tr>
            <tr >
                <th width="25%" colspan="2">Invoice  No</th>
                <td width="25%" colspan="2">{{$inv_setting->invoice_prefix}}{{ $enquiryid->invid }}</td>
                <th width="25%" colspan="2">Quatation No</th>
                <td width="25%" colspan="2">{{$inv_setting->quot_prefix}}{{ $enquiryid->quot_id }}</td>
            </tr>
            <tr>
                <th width="25%" colspan="2">Invoiec Date</th>
                <td width="25%" colspan="2">{{ date("d-m-Y",strtotime($enquiryid->invCreate)) }}</td>
                <th width="25%" colspan="2">Quotation Date</th>
                <td width="25%" colspan="2">{{ date("d-m-Y",strtotime($enquiryid->quotCreate)) }}</td>
            </tr>

            <tr>
                <td colspan="4" style="padding:10px;" >
                    <b>BILL TO : <br>
                        {{ ucwords($enquiryid->cust_name) }}<br></b>
                        {{ $enquiryid->cust_contact }}<br />
                        {{ $enquiryid->cust_email }}<br />
                        {{ $enquiryid->source }}
                </td>
                <td colspan="4" style="padding:10px;" >
                    <b>SHIP TO : <br>
                        {{ ucwords($enquiryid->cust_name) }}<br></b>
                        {{ $enquiryid->cust_contact }}<br />
                        {{ $enquiryid->cust_email }}<br />
                        {{ $enquiryid->destination }}
                </td>
            </tr>

            <tr>

                <th colspan="4" width="300" align="center">Particulars</th>
                <th>Qauntity</th>
                <th>Rate</th>
                <th colspan="2">Total</th>
            </tr>

            {{--<tr>--}}
                {{--<td colspan="4" width="300">To Charges For <b>{{ $enquiryid->enquiry_type }}</b></td>--}}
                {{--<td align="center"></td>--}}
                {{--<td align="center"></td>--}}
                {{--<td colspan="2" align="right"></td>--}}
            {{--</tr>--}}

            {{--<tr>--}}

                {{--<td colspan="4" width="300">From : <b>{{ $enquiryid->source }}</b> to <b>{{ $enquiryid->destination }}</b> Door Delievery</td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td colspan="2"></td>--}}
            {{--</tr>--}}

            {{--<tr>--}}

                {{--<td colspan="4" width="300">{{ $enquiryid->enquiry_type }} of <b>{{ ucwords($enquiryid->cust_name) }}</b> </td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td colspan="2"></td>--}}
            {{--</tr>--}}

            {{--<tr>--}}

                {{--<td colspan="4" width="300"><br> </td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td colspan="2"></td>--}}
            {{--</tr>--}}
            <tr>
                <td colspan="4" width="300">Transportation Charges</td>
                <td align="center">1</td>
                <td align="center">{{$survey->transportation_chrg}}</td>
                <td colspan="2" align="right">{{$survey->transportation_chrg}}</td>
            </tr>

            <tr>
                <td colspan="4" width="300">Packing Charges </td>
                <td align="center"></td>
                <td align="center">{{$survey->total_pack_mat_amt}}</td>
                <td colspan="2" align="right">{{$survey->total_pack_mat_amt}}</td>
            </tr>
            <tr>
                <td colspan="4" width="300">Loading Charges </td>
                <td align="center"></td>
                <td align="center">{{$survey->loading_chrg}}</td>
                <td colspan="2" align="right">{{$survey->loading_chrg}}</td>
            </tr>

            <tr>

                <td colspan="4" width="300"><br> </td>
                <td></td>
                <td></td>
                <td colspan="2"></td>
            </tr>
            @if($enquiryid->cost_type!="cost_include1")
                <tr>
                    <td colspan='4' width='300'>Transit Insurance @ : <b> {{($enquiryid->cost_type=="cost_include1")?(int)$enquiryid->cost_in_freight_val:(int)$enquiryid->cost_ex_ins_val }} %</b> on Declared Value of  <b>{{ $enquiryid->enquiry_type }} RS. </b>{{$enquiryid->goods_value}}</td><td></td><td></td><td colspan="2" align='right'>{{($enquiryid->cost_type=="cost_include1")?"0":$enquiryid->after_insurance_amnt }}</td></tr>
            @endif

            <tr><td colspan='4' width='300'>Miscellaneous Charges</td><td></td><td></td><td colspan="2" align='right'></td></tr>


            <tr>

                <td colspan="4" width="300">{{($enquiryid->cost_type=="cost_include1")?"":"GST No :".$inv_setting->service_tax_no}} </td>
                <td colspan="2" align="right"> Amount</td>
                <td colspan="2" align="right">{{ $enquiryid->amount }}</td>
            </tr>
            @if($enquiryid->cost_type!="cost_include1")
                <tr>

                    <td colspan="4" width="300"></td>
                    <td colspan="2" align="right">GST {{($enquiryid->cost_type=="cost_include1")?(int)$enquiryid->cost_in_service_tax:(int)$enquiryid->cost_ex_service_tax  }}%</td>
                    <td colspan="2" align="right">{{($enquiryid->cost_type=="cost_include1")?"0":$enquiryid->after_service_tax }}</td>
                </tr>
            @endif



            <tr>
                <td colspan="4" width="400"><b>Amount in words: &nbsp;&nbsp;<span> {{ $amtInWord }}</span></b> </td>
                <td colspan="2" align="right"><b>Net Total</b></td>
                <td colspan="2" align="right"><b>{{ $enquiryid->invoice_amount }}</b></td>
            </tr>

            <tr>
                <td colspan="4">Invoicing Currency: {{$inv_setting->invoice_currency}}<br /><br />Payment Currency: {{$inv_setting->payment_currency}}<br /><br />PAN No. {{$inv_setting->pan_no}}</td>
                <td colspan="4" align="center"> <b>FOR SAFEMOVE PVT LTD</b><br><br /><br />Mr. XXX <br>(Authorized Signature)</td>
            </tr>
        </table>
    </div>

</div>
<br><br>
<form method="POST" role="form" action="{{ url('/sendPrintInvoice') }}" accept-charset="UTF-8">
    {{ csrf_field() }}
    <input type="hidden" name="consignment_no" value="{{ $enquiryid->cn_no }}">
    <div class="form-group col-sm-7 pull-right" id="formDiv">
        {{--<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" name="submit" value="saveBtn">--}}
            {{--<i class="fa fa-save"></i>  Save--}}
            {{--<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>--}}
        {{--</button>&nbsp;&nbsp;&nbsp;--}}

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