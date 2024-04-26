<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        *{
            margin:auto;
            font-size:14px;
            line-height:24px;
        }
        body{
            width:80%;
            margin:3%;


        }
        table,th,td
        {
            border:1px solid black;
            border-collapse:collapse


        }
        .headName{
            color:black;
            font-weight: 700;
            font-size: 10px;
        }
        .addClass{
            font-weight: 10;
            font-size: 10px;
            color: #4B0082;
            text-align: right;
        }
        .logoClass{
            font-size: 40px!important;
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

    </style>
</head>
<body>
<div id="printDiv" align="center">
    <table class="" width="100%" id="printTable">
        <tr >
            <td width="100%"  colspan="8" align="center"> <span class="taxCls">TAX INVOICE</span></td>
        </tr>
        <tr>
            <td  width="50%" colspan="4">
                <span class="logoClass"><span class="lC" style="font-size: 40px">Safe</span>m<span class="lC" style="font-size: 40px">o</span>ve</span>
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
            <td align="center" colspan="4"><b>BILL TO</b></td>
            <td align="center" colspan="4"><b>SHIP TO</b></td>
        </tr>

        <tr>
            <td colspan="4" style="padding:10px;" align="center"><b style="font-size:14px; ">
                    {{ ucwords($enquiryid->cust_name) }}<br />
                    {{ $enquiryid->cust_contact }}<br />
                    {{ $enquiryid->cust_email }}<br />

                    {{ $enquiryid->source }}<br></b></td>
            <td colspan="4" style="padding:10px;" align="center"><b style="font-size:14px; ">
                    {{ ucwords($enquiryid->cust_name) }}<br />
                    {{ $enquiryid->cust_contact }}<br />
                    {{ $enquiryid->cust_email }}<br />
                    {{ $enquiryid->destination }}
                </b>
            </td>
        </tr>

        <tr>

            <th colspan="4" width="300" align="center">Particulars</th>
            <th>Qauntity</th>
            <th>Rate</th>
            <th colspan="2">Total</th>
        </tr>

        <tr>
            <td colspan="4" width="300">To Charges For <b>{{ $enquiryid->enquiry_type }}</b></td>
            <td align="center"></td>
            <td align="center"></td>
            <td colspan="2" align="right"></td>
        </tr>

        <tr>

            <td colspan="4" width="300">From : <b>{{ $enquiryid->source }}</b> to <b>{{ $enquiryid->destination }}</b> Door Delievery</td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>

        <tr>

            <td colspan="4" width="300">{{ $enquiryid->enquiry_type }} of <b>{{ ucwords($enquiryid->cust_name) }}</b> </td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>

        <tr>

            <td colspan="4" width="300"><br> </td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
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
        <?php if($enquiryid->cost_type!="cost_include1"){ ?>
        <tr><td colspan='4' width='300'>Transit Insurance @ : <b> {{($enquiryid->cost_type=="cost_include1")?(int)$enquiryid->cost_in_freight_val:(int)$enquiryid->cost_ex_ins_val }} %</b> on Declared Value of  <b>{{ $enquiryid->enquiry_type }} RS. </b>{{$enquiryid->goods_value}}</td><td></td><td></td><td colspan="2" align='right'>{{($enquiryid->cost_type=="cost_include1")?"0":$enquiryid->after_insurance_amnt }}</td></tr>
       <?php }?>

        <tr><td colspan='4' width='300'>Miscellaneous Charges</td><td></td><td></td><td colspan="2" align='right'></td></tr>




        <tr>

            <td colspan="4" width="300"><br> </td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>

        <tr>

            <td colspan="4" width="300">{{($enquiryid->cost_type=="cost_include1")?"":"Service Tax No :".$inv_setting->service_tax_no}} </td>
            <td colspan="2" align="right"> Amount</td>
            <td colspan="2" align="right">{{ $enquiryid->amount }}</td>
        </tr>
        <?php if($enquiryid->cost_type!="cost_include1"){ ?>
        <tr>

            <td colspan="4" width="300"></td>
            <td colspan="2" align="right">Service Tax {{($enquiryid->cost_type=="cost_include1")?(int)$enquiryid->cost_in_service_tax:(int)$enquiryid->cost_ex_service_tax  }}%</td>
            <td colspan="2" align="right">{{($enquiryid->cost_type=="cost_include1")?"0":$enquiryid->after_service_tax }}</td>
        </tr>
        <?php }?>



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
</body>
</html>