<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>

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
        }
    </style>
</head>
<body>
<div id="printDiv" align="center">
    <div align="left" style="margin-left:auto; margin-right:auto; margin-top:20px; width:740px;">

        <div align="justify" style="font-family:Verdana, Geneva, sans-serif; position:absolute; font-size:12px; width:500px; height:50px;margin-left:120px; margin-right:auto; margin-top:-5px;">
            <div align="center"><font size="+1" face="Verdana, Geneva, sans-serif">Safemove Movers and Packers</font></div>
            <div align="justify" style="width:450px;">
                {{ $companyDetails->add_line1 }} {{ $companyDetails->add_line2 }}<br>
                City - {{ $companyDetails->city }} Pincode - {{ $companyDetails->pincode }}
                State - {{ $companyDetails->state }} Country - {{ $companyDetails->country }}
            </div>
        </div>

        <div align="right" style="margin-top:0px;   height:100px;">
            <table align="right">
                <tr>
                    <td>No.</td><td style="border:#000 solid 1px;; width:100px;">{{ $PayRecpData->trp_id }}</td>
                </tr>
                <tr>
                    <td>Date</td><td style="border:#000 solid 1px;; width:100px;">{{ date("d-m-Y",strtotime($PayRecpData->trpCreate)) }}</td>
                </tr>
                <tr>
                    <td>Rs.</td><td style="border:#000 solid 1px;; width:100px;"></td>
                </tr>
            </table>

        </div>
        <div style="margin-top:-40px; position:absolute; margin-left:0px; padding-left:260px; font-family:Verdana, Geneva, sans-serif; font-size:13px;">
            <b>FREIGHT PAYMENT MEMO</b>
        </div><br>
        <div align="left" style="width:740px; margin-top:0px;">
            <table width="740px">

                <tr height="20px">
                    <td>Pay To</td>
                    <td>:</td>
                    <td  style="border:#000 solid 1px; width:100px;" >{{ ucwords($PayRecpData->trans_agent_name) }}</td>
                    <td width="150" align="right">CN. No. :</td>
                    <td style="border:#000 solid 1px;"align="center"></td>
                </tr>
                <tr height="20px">
                    <td>In Words</td>
                    <td>:</td>
                    <td colspan="3" id="inwords" style="border:#000 solid 1px;" ></td>
                </tr>
                <tr height="20px">
                    <td>To Be Paid At</td>
                    <td>:</td>
                    <td colspan="3"style="border:#000 solid 1px;" >{{ $PayRecpData->to_be_paid_at }}  </td>
                </tr>
                <tr height="20px">
                    <td>And Debt</td>
                    <td>:</td>
                    <td colspan="3" style="border:#000 solid 1px;" > {{ $PayRecpData->narrations }} </td>
                </tr>
                <tr height="30px">
                    <td style="width:120px;">Authorised By</td>
                    <td>: </td>
                    <td style="border:#000 solid 1px;" > </td>

                    <td  colspan="2" style="border:#000 solid 1px;" >Rcvd. above sum of Rs : {{ $PayRecpData->paid_amt }}</td>
                </tr >
                <tr height="20px">
                    <td>Paid by</td>
                    <td>:</td>
                    <td style="border:#000 solid 1px; width:300px;" ><input type="checkbox" {{ ($PayRecpData->payment_mode=="Cash")?"checked":"" }} > Cash <input type="checkbox" {{ ($PayRecpData->payment_mode=="Cash")?"checked":"" }}> Cheque </td>

                    <td style="border:#000 solid 1px;" colspan="2" height="30px;" >Drawn on Bank : <br> {{ $PayRecpData->bank_name }} </td>                </table>


        </div>

        <div style="margin-left:540px; margin-top:0px;" class="tbl">
            <table align="right">
                <tr style="border:#000 solid 1px;">
                    <td style="border:#000 solid 1px; width:100px; border-right:none;" >Total LF</td>
                    <td style="border:#000 solid 1px;" width="90px" align="right"> {{ $PayRecpData->trans_amt }} </td>
                </tr>
                <tr style="border:#000 solid 1px;">
                    <td style="border:#000 solid 1px; border-right:none;">Advance LF</td>
                    <td align="right" style="border:#000 solid 1px;"> {{ $PayRecpData->amount }} </td>
                </tr>
                <tr style="border:#000 solid 1px;">
                    <td style="border:#000 solid 1px; border-right:none;">Balance LF</td>
                    <td align="right" style="border:#000 solid 1px;">{{ $PayRecpData->bal_amt }} </td>
                </tr>
            </table>
        </div>
        <br><br><br><br><br><br>
        <div style="margin-left:0px; padding-left:40px; margin-top:70px; width:95%;">
            AUTHORED BY &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PAID BY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RECEIVER SIGNATORY
        </div>

    </div>

</div>

</body>
</html>