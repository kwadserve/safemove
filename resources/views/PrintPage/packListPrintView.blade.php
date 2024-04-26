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
            border: 1px solid lightgrey;
            width:40%;
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
                background-color: lightgrey !important;
                border: 1px solid lightgrey !important;
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
            .custSing{
                position:absolute!important;
                margin-left:530px!important;
                margin-top:50px!important;
                font-family:Verdana, Geneva, sans-serif!important;
                font-size:14px!important;
            }

            .suprSing{
                position:absolute!important;
                margin-top:50px!important;
                font-family:Verdana, Geneva, sans-serif!important;
                font-size:14px!important;

            }

            .totalValue{
                margin:auto!important;
                padding-left:20px!important;
                margin-top:20px!important;
            }
            .footTable{
                padding-left:0%!important;
            }
        }
    </style>
</head>
<body>
<div id="printDiv" align="center">
    <table class="" width="100%" id="printTable">
        <tr >
            <td width="100%"  colspan="8" align="center"> <span class="taxCls">PACKING LIST</span></td>
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
        <tr>
            <th width="25%" colspan="2">Customer Name</th>
            <td width="25%" colspan="2"> {{ ucwords($enquiryData->cust_name) }}</td>
            <th width="25%" colspan="2">CN NO</th>
            <td width="25%" colspan="2"> {{ $enquiryData->cn_no }}</td>
        </tr>
        <tr>
            <th width="25%" colspan="2">Contact Number</th>
            <td width="25%" colspan="2">  {{ $enquiryData->cust_contact }}</td>
            <th width="25%" colspan="2">Email ID</th>
            <td width="25%" colspan="2"> {{ $enquiryData->cust_email }} </td>
        </tr>
        <tr>
            <th width="50%" colspan="4">Origin Details</th>
            <th width="50%" colspan="4">Destination Details</th>
        </tr>
        <tr>
            <td width="50%" colspan="4">
                <p> {{ $enquiryData->src_add_line1 }}</p>
            </td>
            <td width="50%" colspan="4">
                <p> {{ $enquiryData->dest_add_line1 }}</p>
            </td>
        </tr>

    </table>
    <table width="100%" id="printTable">
        <tr align="center">
            <td width="50px">Pkg.No</td>
            <td width="100px">Method Packing</td>
            <td width="400px">Particulars</td>
            <td>Packers Name</td>
            <td>Value(Par)</td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="25px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </table>

</div>
<div id="printDiv" class="footTable" style=" padding-left:30%;">
<div class="totalValue" style="margin:auto; padding-left:20px; margin-top:20px;">
    TOTAL VALUE :
</div>
<div>
    <div align="left" class="suprSing" style="position:absolute; margin-top:50px; font-family:Verdana, Geneva, sans-serif; font-size:14px;">
        Supervisor Signature
    </div>

    <div align="right" class="custSing" style="position:absolute; margin-left:530px; margin-top:50px; font-family:Verdana, Geneva, sans-serif; font-size:14px;">
        Consignor Signature
    </div>
</div>
</div>
<br><br><br><br><br>
    <div class="form-group col-sm-6 pull-right" id="formDiv">

        <button  class="btn btn-primary ladda-button"  onClick="window.print()" name="button" value="printBtn">
            <i class="fa fa-print"></i>  Print
            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
        </button>
    </div>
</body>
</html>