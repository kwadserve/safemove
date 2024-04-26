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
        table,th,td{
            border:1px solid black;
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
            table,th,td{
                border:1px solid black!important;
            }
        }
    </style>
</head>
<body>
<br><br>
<div id="printDiv" align="center">
    <div style="width:740px; margin:auto; font-family:Verdana, Geneva, sans-serif; font-size:14px; line-height:25px;">
        <h3 align="center">Costing Sheet After Survey</h3>
        <table width="100%" style="padding-left:10px; padding-right:10px;border:1px solid black">
            <tr>
                <td width="40%" style="padding-left:5px;">CN No.</td>

                <td colspan="4" style="padding-left:5px;">{{$surveyData->cn_no}}</td>
            </tr>

            <tr>
                <td  style="padding-left:5px;">Survey Date</td>

                <td colspan="4" style="padding-left:5px;">{{$surveyData->cn_no}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Party Name</td>

                <td colspan="4" style="padding-left:5px;">{{$surveyData->cust_name}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Email Id</td>

                <td colspan="4" style="padding-left:5px;">{{$surveyData->cust_email}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Mobile No</td>

                <td colspan="4" style="padding-left:5px;">{{$surveyData->cust_contact}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Source Address</td>

                <td colspan="4" style="padding-left:5px;">{{$surveyData->src_add_line1}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Destination Address</td>

                <td colspan="4" style="padding-left:5px;">{{$surveyData->dest_add_line1}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Loading From</td>

                <td width="50px" style="padding-left:5px;">Floor</td>

                <td width="100px">{{$surveyData->src_floor_no}}</td>
                <td width="80px" style="padding-left:5px;">Lift Use</td>
                <td>{{($surveyData->src_elavator=="Y")?"Yes":"No"}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Unloading At</td>

                <td style="padding-left:5px;">Floor</td>

                <td>{{$surveyData->dest_floor_no}}</td>
                <td style="padding-left:5px;">Lift Use</td>

                <td>{{($surveyData->dest_elavator=="Y")?"Yes":"No"}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Truck Size</td>

                <td colspan="4" style="padding-left:5px;">{{$surveyData->vehical_name}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Labor Required</td>

                <td colspan="4" style="padding-left:5px;">{{$surveyData->laboure_req}}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Any Special Remarks</td>

                <td colspan="4" style="padding-left:5px;"></td>
            </tr>

        </table>
    </div>
    <div style=" width:740px; margin:auto; font-family:Verdana, Geneva, sans-serif; font-size:14px; line-height:25px;">
        <h4>Transportation Costing Details</h4>
        <table width="720px" style="padding-left:10px; padding-right:10px; margin-top:20px;">
            <tr>
                <th>Contents</th>
                <th>Amount</th>
                <th>Remark</th>
                <th>Sign</th>
            </tr>

            <tr>
                <td style="padding-left:5px;">Loading Charges</td>
                <td style="padding-left:5px;">{{$surveyData->loading_chrg}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Local Transportation</td>
                <td style="padding-left:5px;">{{$surveyData->local_transp}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Transportation Charges</td>
                <td style="padding-left:5px;">{{$surveyData->transportation_chrg}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Unloading Charges</td>
                <td style="padding-left:5px;">{{$surveyData->unloading_chrg}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Dilevery Chrg</td>
                <td style="padding-left:5px;">{{$surveyData->delivery_chrg}}</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td style="padding-left:5px;">Car Transportation Charges</td>
                <td style="padding-left:5px;">{{$surveyData->car_transp_chrg}}</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td style="padding-left:5px;">Other Charges</td>
                <td style="padding-left:5px;">{{$surveyData->other_chrg}}</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td style="padding-left:5px;"><b>Total Costing</b></td>
                <td style="padding-left:5px;"><b>{{$surveyData->total_costing}}</b></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <div style=" width:740px; margin:auto; font-family:Verdana, Geneva, sans-serif; font-size:14px; line-height:25px;">
        <h4>Packing Material Details</h4>
        <table width="720px" style="padding-left:10px; padding-right:10px; margin-top:-10px;">
            <tr>
                <th>Packing Material</th>
                <th>Qty</th>
                <th>Amount</th>
            </tr>

            <tr>
                <td>Roll</td>
                <td>{{(int)$surveyData->roll_price}}</td>
                <td>{{$surveyData->roll_total_amt}}</td>
            </tr>

            <tr>
                <td>Boxes</td>
                <td>{{(int)$surveyData->boxes_price}}</td>
                <td>{{$surveyData->boxes_total_amt}}</td>
            </tr>

            <tr>
                <td>Tape</td>
                <td>{{(int)$surveyData->tap_price}}</td>
                <td>{{$surveyData->tap_total_amt}}</td>
            </tr>
            <tr>
                <td>Air Bubble</td>
                <td>{{(int)$surveyData->airbubble_price}}</td>
                <td>{{$surveyData->airbubble_total_amt}}</td>
            </tr>
            <tr>
                <td>Thermacol</td>
                <td>{{(int)$surveyData->thermacol_price}}</td>
                <td>{{$surveyData->thermacol_total_amt}}</td>
            </tr>
            <tr>
                <td>News Paper</td>
                <td>{{(int)$surveyData->newpaper_price}}</td>
                <td>{{$surveyData->newspaper_total_amt}}</td>
            </tr>
            <tr>
                <td>Stretch Film</td>
                <td>{{(int)$surveyData->strfilm_price}}</td>
                <td>{{$surveyData->strfilm_total_amt}}</td>
            </tr>

            <tr>
                <td>Foam Sheet</td>
                <td>{{(int)$surveyData->foamsheet_price}}</td>
                <td>{{$surveyData->foamsheet_total_amt}}</td>
            </tr>
            <tr>
                <td>Other</td>
                <td>{{(int)$surveyData->other_price}}</td>
                <td>{{$surveyData->other_total_amt}}</td>
            </tr>


            <tr>
                <td colspan="2" align="right" style="padding-right:40px;"><b>Total</b></td>
                <td><b>{{$surveyData->total_pack_mat_amt}} </b></td>
            </tr>
        </table>
    </div>
    <div align="right" style="width:740px; margin:auto; font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-top:30px; padding-right:50px;">
        Sign & Name.
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