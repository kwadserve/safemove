<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .logoClass{
            font-size: 50px;
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
            color:black;
            font-weight: 700;
            font-size: 15px;
        }
        @page { size:  A4 ;  margin: 0; }
        @media print {
            * { margin: 3px !important; padding-top: 0 !important; }
            body *,#formDiv * {
                visibility: hidden;
            }
            #printDiv * {
                visibility: visible;
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
            .divlab{
                padding-bottom: 65px!important;
            }
        }
    </style>
</head>
<body>
<div id="printDiv" align="center">
    <div align="left" style="margin-left:auto; margin-right:auto; margin-top:-1px; width:740px;">

        <div class="divlab" style="padding-bottom: 65px">
            <div style="float: left;">
                {{--SafeMove <br> <span class="subheading"> Packers & Movers </span>--}}
                <span class="logoClass"><span class="lC">Safe</span>M<span class="lC">o</span>ve</span>
                <p class="headName"><span class="dC">Domestic & Commercial</span> <span class="lC">Realocation Service</span></p>
                <p class="headName">An <span class="iso">ISO 9001:2015</span> Certified Comapany</p>
            </div>
            <div style="float: right">
                <p class="addClass"> {{ $companyDetails->add_line1 }}</p>
                <p class="addClass"> {{ $companyDetails->add_line2 }}</p>
                <p class="addClass">City - {{ $companyDetails->city }} Pincode - {{ $companyDetails->pincode }}</p>
                <p class="addClass">State - {{ $companyDetails->state }} Country - {{ $companyDetails->country }}</p>
            </div>
        </div>
        <div style=" margin-top:70px; position:absolute; margin-left:0px; padding-left:260px; font-family:Verdana, Geneva, sans-serif; font-size:13px;">
            <b>OFFICE EXPENSES VOUCHER</b>
        </div>
        
        <div align="left" style="width:740px; margin-top:0px;">
            <table width="740px">
                <tr height="20px">
                    <td>No</td>
                    <td>:</td><td style="border:#000 solid 1px;; width:100px;">{{$offExpData->id}}</td>
                    <td>Date</td><td style="border:#000 solid 1px;; width:100px;">{{date('d-m-Y',strtotime($offExpData->created_at))}}</td>
                    <td>Rs.</td><td style="border:#000 solid 1px;; width:100px;">{{$offExpData->amount}}</td>
                </tr>
                <tr height="20px">
                    <td>BY</td>
                    <td>:</td>
                    <td  style="border:#000 solid 1px; width:100px;" >{{$offExpData->expenes_by}}</td>
                </tr>
                <tr height="20px">
                    <td>In Words</td>
                    <td>:</td>
                    <td colspan="2" style="border:#000 solid 1px;" > <span id="inwords"></span>Only.</td>
                </tr>
                <tr height="20px">
                    <td>Being</td>
                    <td>:</td>
                    <td colspan="2" style="border:#000 solid 1px;" > {{$offExpData->narration}} </td>
                </tr>
                <tr height="30px">
                    <td style="width:90px;">Authorised By</td>
                    <td>:</td>
                    <td style="border:#000 solid 1px;" ></td>

                    <td  style="border:#000 solid 1px;" >Recd. above sum of Rs : </td>
                </tr >
                <tr height="20px">
                    <td>Paid by</td>
                    <td>:</td>
                    <td style="border:#000 solid 1px; width:300px;" ><input type="checkbox" {{($offExpData->payment_mode=="Cash")?"checked":""}} > Cash <input type="checkbox" {{($offExpData->payment_mode=="Cheque")?"checked":""}} > Cheque </td>

                    <td style="border:#000 solid 1px;" height="30px;" >Drawn on Bank : <br> {{$offExpData->bank_name}}  </td>

                </tr>
                <tr>
                    <td colspan="3" style="height:50px; padding-top:30px;" align="center" >Accountant Signature</td>
                    <td style="height:50px; padding-top:30px;" align="center">Reciever's Signature</td>

                </tr>
            </table>
        </div>
    </div>
</div>
<br><br>
<div class="form-group col-sm-6 pull-right" id="formDiv">
    <button  class="btn btn-primary ladda-button"  onClick="window.print()" name="button" value="printBtn">
        <i class="fa fa-print"></i>  Print
        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
    </button>
</div>
</body>
</html>