<!DOCTYPE html >
<html>
<style type="text/css">

    body{
        width:80%;
        margin:20px;
    }


    *{
        margin: auto;
        padding:0px;
    }

    table,th
    {
        border:none;
        border-collapse:collapse;
        font-weight:bold;
        font-family:Verdana;
        font-size:12px;
    }
    td{
        border:1px solid black;
        border-collapse:collapse;
    }
    #table1{
        width:80%;
    }


    #outertable{
        width:80%;
    }

    p{
        font-size:11px;

    }

    .logoClass{
        padding-left: 5px;
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
    .headName{
        padding-left: 5px;
        color:black;
        font-weight: 700;
        font-size: 10px;
    }
    .addClass{
        font-weight: 10;
        font-size: 12px;
        text-align: right;
        padding-right: 5px;
    }
    .btn-primary {
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }
    .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .pull-right{
        padding-left: 50%;
    }
</style>
<body>
<br><br>
<div id="divToPrint" class="content">
    <table width="900">
        <tbody>
        <tr>
            <td width="500" colspan="2">
                <div >
                    <div style="float: left;">
                        <span class="logoClass"><span class="lC">Safe</span>M<span class="lC">o</span>ve</span>
                        <p class="headName"><span class="dC">Domestic & Commercial</span> <span class="lC">Realocation Service</span></p>
                        <p class="headName">An <span class="iso">ISO 9001:2015</span> Certified Comapany</p>
                    </div>
                    <div style="float: right;">
                        <p class="addClass"> {{ $companyDetails->add_line1 }}</p>
                        <p class="addClass"> {{ $companyDetails->add_line2 }}</p>
                        <p class="addClass">City - {{ $companyDetails->city }} Pincode - {{ $companyDetails->pincode }}</p>
                        <p class="addClass">State - {{ $companyDetails->state }} Country - {{ $companyDetails->country }}</p>
                    </div><br><br>
                </div>
                <div style="width:600px;height:23px; margin-left:5px;">
                    <img src="{{URL::asset('public/images/q3.png')}}" id="Image3" alt="" style="width:580px;height:23px;"></div>
            </td>
            <td width="200">
                <table style="border:none">
                    <tr>
                        <td height="46" width="200">CN. No: {{ $listData->cn_no }}</td>
                    </tr>
                    <tr>
                        <td height="47">Origin: {{ $listData->source }}</td>
                    </tr>
                    <tr>
                        <td height="48">Destination : {{$listData->destination}}</td>
                    </tr>
                </table>
            </td>

            <td width="200" >
                <table  border="1">
                    <tr>
                        <td height="30" align="center" width="200">DATE</td>
                    </tr>
                    <tr><td height="40" align="center"><?php echo date("d/m/Y");?><br /></td></tr>
                    <tr>
                        <td height="30" align="center">TRUCK NO</td>
                    </tr>
                    <tr><td height="40" align="center">{{$listData->truck_no}}<br /></td></tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center" height="25" >CONSIGNOR</td>
            <td colspan="2" align="center" >CONSIGNEE</td>
        </tr>
        <tr>
            <td height="50" colspan="2" align="center">{{ucwords($listData->cust_name)}}<br>{{$listData->src_add_line1}}</td>
            <td colspan="2" align="center">{{ucwords($listData->cust_name)}}<br>{{$listData->dest_add_line1}}</td>
        </tr>
        <tr>
            <td colspan="2">
                <table  border="0" id="table2" height="400" width="600">
                    <tr>
                        <td colspan="4" height="35" align="center">PACKAGE INFORMATION</td>
                    </tr>
                    <tr>
                        <td height="25">No of Pkgs</td>
                        <td>Packing Type</td>
                        <td>Volume (Inch X)</td>
                        <td width="290" align="center">Said to Contain</td>
                    </tr>
                    <tr>
                        <td align="center" height="30">{{$listData->no_of_packages}}</td>
                        <td align="center">{{$listData->type_of_packing}}</td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="25" align="center">Private Marks</td>
                        <td>Risk Owner</td>
                        <td align="center"> Declaration</td>
                    </tr>
                    <tr>
                        <td height="20" colspan="2" align="center">{{$listData->private_mark}}</td>
                        <td>{{$listData->risk_type}}</td>
                        <td rowspan="3" align="justify" ><p style="font-size:13px; font-weight:normal;">I/we here by agree to the terms &amp; conditions set on the reverse of this consignor copy &amp; declare that the contents on the way bill are true and correct. The to-pay freight has my/our consent and will be paid by the consignee along with the applicable service charges at the delivery.</p><br />
                            <p>SIGN</p></td>
                    </tr>
                    <tr>
                        <td  height="15" colspan="2">Value Of Goods</td>
                        <td>Dispatch Mode</td>

                    </tr>
                    <tr>
                        <td height="112" colspan="2">{{$listData->value_of_goods}}</td>
                        <td>{{$listData->mode_of_dispatch}}
                    </tr>
                    <tr>
                        <td height="25" colspan="3">FOR USE AT THE TIME OF DELIVERY ONLY</td>
                        <td align="center">REMARK</td>
                    </tr>
                    <tr>
                        <td colspan="2">Name</td>
                        <td rowspan="2">Stamp / Tel No</td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p>SIGNATURE</p>
                            <p><BR>
                                DATE</p></td>
                    </tr>
                    <tr>
                        <td height="16" colspan="3">WAY BILL NUMBER</td>
                    </tr>
                </table>
            </td>
            <td colspan="2">
                <table height="400" width="400">
                    <tr>
                        <td width="83">BOOKING</td>
                        <td width="95">DETAILS</td>
                        <td width="154">INSTRUCTIONS</td>
                    </tr>
                    <tr>
                        <td>Booking Amount</td>
                        <td></td>
                        <td rowspan="6">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Advance</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Balance</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>AT</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>BY</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><br /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Paid (Cheque/Cash)</td>
                    </tr>
                    <tr>
                        <td><br/></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>TOTAL</td>
                        <td></td>
                        <td>To Pay</td>
                    </tr>
                    <tr>
                        <td><BR /></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><br /></td>
                        <td></td>
                        <td>Company Credit Code</td>
                    </tr>
                    <tr>
                        <td>Grand Total</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">RECEIVED BY SAFEMOVE MOVERS AND PACKERS</td>
                    </tr>
                    <tr>
                        <td rowspan="3" colspan="3"><p>PICK UP Date & Time</p>
                            <p style="float:right;">Name & Sign</p></td>
                    </tr>
                    <tr></tr>
                </table>
            </td>
        </tr>
    </table>
    <div style="width:80%"><span style="float:left"><b># SUBJECT TO PUNE JURIDITION ONLY.</b></span></div>
    <br />
    <br />
    <div style="width:80%"><span style="float:left">&nbsp;&nbsp;&nbsp;<b>Supervisor Signature</b></span><span style="float:right"><b>Consigner Signature</b>&nbsp;&nbsp;&nbsp;</span></div>
</div>
<form method="POST" role="form" action="{{ url('/sendPrintDelivaryForm') }}" accept-charset="UTF-8">
    {{ csrf_field() }}
    <input type="hidden" name="consignment_no" value="{{ $listData->cn_no }}">
    <br><br>
    <div class="pull-right" id="formDiv">
        <button type="submit" class="btn btn-primary " name="submit" value="saveBtn">Save
        </button>&nbsp;&nbsp;&nbsp;

        <button  class="btn btn-primary "  onClick="window.print()" name="button" value="printBtn">
            Print
        </button>
    </div>
</form>
</body>
</html>