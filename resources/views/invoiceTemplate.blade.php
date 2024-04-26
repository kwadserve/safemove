<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
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
    </style>
</head>
<body>
<table class="" width="100%" border="1">
    <tr >
        <td width="100%"  colspan="8" align="center"> <span class="taxCls">TAX INVOICE</span></td>
    </tr>
    <tr>
        <td  width="50%" colspan="4">
            <span class="logoClass"><span class="lC">Safe</span>m<span class="lC">o</span>ve</span>
            <p class="headName"><span class="dC">Domestic & Commercial</span> <span class="lC">Realocation Service</span></p>
            <p class="headName">An <span class="iso">ISO 9001:2015</span> Certified Comapany</p>
        </td>
        <td  width="50%" colspan="4">
            <p class="addClass"> {{ $companyDetails->add_line1 }}</p>
            <p class="addClass"> {{ $companyDetails->add_line2 }}</p>
            <p class="addClass">City - {{ $companyDetails->city }} Pincode - {{ $companyDetails->pincode }}</p>
            <p class="addClass">State - {{ $companyDetails->state }} Country - {{ $companyDetails->country }}</p>
        </td>
    </tr>
    <tr >
        <th width="25%" colspan="2">Invoice  No</th>
        <td width="25%" colspan="2">{{ $enquiryid->invid }}</td>
        <th width="25%" colspan="2">Quatation No</th>
        <td width="25%" colspan="2"> {{ $enquiryid->quot_id }}</td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Invoiec Date</th>
        <td width="25%" colspan="2">{{ date("d-m-Y",strtotime($enquiryid->invCreate)) }}</td>
        <th width="25%" colspan="2">Quotation Date</th>
        <td width="25%" colspan="2">{{ date("d-m-Y",strtotime($enquiryid->quotCreate)) }}</td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Customer Name</th>
        <td width="25%" colspan="2"> {{ ucwords($enquiryid->cust_name) }}</td>
        <th width="25%" colspan="2">CN NO</th>
        <td width="25%" colspan="2"> {{ $enquiryid->cn_no }}</td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Contact Number</th>
        <td width="25%" colspan="2">  {{ $enquiryid->cust_contact }}</td>
        <th width="25%" colspan="2">L/R No</th>
        <td width="25%" colspan="2"> </td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Email ID</th>
        <td width="25%" colspan="2"> {{ $enquiryid->cust_email }} </td>
        <th width="25%" colspan="2">Payment Method</th>
        <td width="25%" colspan="2">Cheque/Cash</td>
    </tr>
    <tr>
        <th width="50%" colspan="4">Origin Details</th>
        <th width="50%" colspan="4">Destination Details</th>
    </tr>
    <tr>
        <td width="50%" colspan="4">
            <p> {{ $enquiryid->src_add_line1 }}</p>
        </td>
        <td width="50%" colspan="4">
            <p> {{ $enquiryid->dest_add_line1 }}</p>
        </td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Elavator</th>
        <td width="25%" colspan="2">{{ ($enquiryid->src_elavator=="Y")?"Yes":"No" }}</td>
        <th width="25%" colspan="2">Elavator</th>
        <td width="25%" colspan="2">{{ ($enquiryid->dest_elavator=="Y")?"Yes":"No" }}</td>
    </tr>
    <tr>
        <td width="100%" colspan="8">
            <p>Total Number of Items - </p>
            <p>Total Volume (CFT) - {{$enquiryid->total_cft}}</p>
        </td>
    </tr>
    <tr>
        <th>Sr. No.</th>
        <th colspan="2">Description of Services</th>
        <th>HSN/SAC Code</th>
        <th colspan="2">Rate</th>
        <th colspan="2">Amount</th>
    </tr>
    <tr>
        <td>1</td>
        <td colspan="2">Packing Charges</td>
        <td></td>
        <td align="right" colspan="2">{{$survey->total_pack_mat_amt}}</td></td>
        <td align="right" colspan="2">{{$survey->total_pack_mat_amt}}</td>
    </tr>
    <tr>
        <td>2</td>
        <td colspan="2">Loading Charges</td>
        <td></td>
        <td align="right" colspan="2">{{$survey->loading_chrg}}</td>
        <td align="right" colspan="2">{{$survey->loading_chrg}}</td>
    </tr>
    {{--<tr>--}}
        {{--<td>3</td>--}}
        {{--<td colspan="2">Unloading Charges</td>--}}
        {{--<td></td>--}}
        {{--<td align="right" colspan="2">{{$survey->unloading_chrg}}</td>--}}
        {{--<td align="right" colspan="2"> {{$survey->unloading_chrg}}</td>--}}
    {{--</tr>--}}
    <tr>
        <td>3</td>
        <td colspan="2">Transportation Charges</td>
        <td></td>
        <td align="right" colspan="2">{{$survey->transportation_chrg}}</td>
        <td align="right" colspan="2">{{$survey->transportation_chrg}}</td>
    </tr>
    {{--<tr>--}}
        {{--<td>5</td>--}}
        {{--<td colspan="2">Unpacking Charges</td>--}}
        {{--<td></td>--}}
        {{--<td align="right" colspan="2">0.00</td>--}}
        {{--<td align="right" colspan="2"> 0.00 </td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td width="100%" colspan="8"></td>--}}
    {{--</tr>--}}

    @if($enquiryid->cost_type=="cost_include2")
    <tr>
        <td width="50%" colspan="4" rowspan="7"></td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Service Tax (GST) @ {{ $enquiryid->cost_ex_service_tax }} %</th>
        <td width="25%" align="right" colspan="2">{{ $enquiryid->after_service_tax }}</td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Insurance Charges @ {{ $enquiryid->cost_ex_ins_val }} %</th>
        <td width="25%" align="right" colspan="2">{{ $enquiryid->after_insurance_amnt }}</td>
    </tr>
    {{--<tr>--}}
        {{--<th width="25%" colspan="2">State Tax (SGST)</th>--}}
        {{--<td width="25%" align="right" colspan="2"></td>--}}
    {{--</tr>--}}
    <tr>
        <th width="25%" colspan="2">Discount @ 10 %	</th>
        <td width="25%" align="right" colspan="2"></td>
    </tr>
    {{--<tr>--}}
        {{--<th width="25%" colspan="2">Mathadi /Union Charges</th>--}}
        {{--<td width="25%" align="right" colspan="2"></td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<th width="25%" colspan="2">Carpainter Charges</th>--}}
        {{--<td width="25%" align="right" colspan="2"></td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<th width="25%" colspan="2">Round Off</th>--}}
        {{--<td width="25%" align="right" colspan="2"></td>--}}
    {{--</tr>--}}
    <tr>
        <th width="25%" colspan="2">Total Amount</th>
        <td width="25%" align="right" colspan="2">{{ $enquiryid->invoice_amount }}</td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Advacne Recd.</th>
        <td width="25%" align="right" colspan="2">{{ (empty($paymentData))?"0.00":$paymentData->invoice_amount-$paymentData->bal_amt }}</td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Balance Amount</th>
        <td width="25%" align="right" colspan="2">{{ (empty($paymentData))?$enquiryid->invoice_amount:$paymentData->bal_amt }}</td>
    </tr>
    @else
    <tr>
        <td width="50%" colspan="4" rowspan="4"></td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Total Amount</th>
        <td width="25%" align="right" colspan="2">{{ $enquiryid->invoice_amount }}</td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Advacne Recd.</th>
        <td width="25%" align="right" colspan="2">{{ (empty($paymentData))?"0.00":$paymentData->invoice_amount-$paymentData->bal_amt }}</td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Balance Amount</th>
        <td width="25%" align="right" colspan="2">{{(empty($paymentData))?$enquiryid->invoice_amount:$paymentData->bal_amt}}</td>
    </tr>
    @endif
    <tr>
        <th width="100%" colspan="8">Amount Payable (in Words) - {{ $amtInWord }}</th>
    </tr>
    <tr>
        <th width="50%" colspan="4">Bank Details </th>
        <th width="50%" colspan="4">Payment Terms </th>
    </tr>
    <tr>
        <th width="25%" colspan="2">Account Name</th>
        <td width="25%" colspan="2">Safe Move  </td>
        <td width="50%" colspan="4" rowspan="5"></td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Account No.</th>
        <td width="25%" colspan="2">12345678987</td>
    </tr>
    <tr>
        <th width="25%" colspan="2">IFSC Code</th>
        <td width="25%" colspan="2"></td>
    </tr>
    <tr>
        <th width="25%" colspan="2">Branch</th>
        <td width="25%" colspan="2"></td>
    </tr>
    <tr>
        <th width="25%" colspan="2">GSTIN No.</th>
        <td width="25%" colspan="2"></td>
    </tr>
    <tr>
        <td width="50%" colspan="4"><p><b>Declaration</b></p>
            <p>We declare that this invoice shows the actual price of the goods/service described and that all particulars are true and correct</p>
        </td>
        <td width="50%" colspan="4"> </td>
    </tr>
    <tr>
        <td width="50%" colspan="4"></td>
        <td width="50%" colspan="4" align="center">Authorised Signatory</td>
    </tr>
</table>
</body>
</html>