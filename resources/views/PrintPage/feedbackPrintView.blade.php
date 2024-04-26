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
            border: 0px solid lightgrey !important;
            width:50%;
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
            border: 0px solid lightgrey !important;
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
                border: 0px solid lightgrey !important;
            }
            th{
                text-align: left!important;
            }
            .taxCls{
                font-size: 25px!important;
                font-weight: 700!important;
                color: #4F0800!important;
            }
        }
    </style>
</head>
<body>
<div id="printDiv" align="center">
    <table class="" width="100%" >
        <tr>
            <td  width="50%" colspan="4">
                <img src="{{URL::asset('public/images/safemove-logo.png')}}" class="img"  width="190px">
                {{--<span class="logoClass"><span class="lC">Safe</span>m<span class="lC">o</span>ve</span>--}}
                {{--<p class="headName"><span class="dC">Domestic & Commercial</span> <span class="lC">Realocation Service</span></p>--}}
                {{--<p class="headName">An <span class="iso">ISO 9001:2015</span> Certified Comapany</p>--}}
            </td>
            <td  width="50%" colspan="4">
                <p class="addClass"> {{ $companyDetails->add_line1 }}</p>
                <p class="addClass"> {{ $companyDetails->add_line2 }}</p>
                <p class="addClass">City - {{ $companyDetails->city }} Pincode - {{ $companyDetails->pincode }}</p>
                <p class="addClass">State - {{ $companyDetails->state }} Country - {{ $companyDetails->country }}</p>
            </td>
        </tr>
        <tr>
            <th width="100%" colspan="8"><div style="border:1px solid black;margin-top: 5px;margin-bottom: 5px;"></div></th>
        </tr>
        <tr>
            <td colspan="8" >
                <p>Dear {{ ucwords($enquiryData->cust_name) }},</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;We appreciate  that safe movement of personal effects is important to you. To track this and to closely monitor the staff performance.</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;We have designed a small questionnaire to be filled by you. The Transferee.</p>
                <p>&nbsp;&nbsp;&nbsp;We request you to ensure that is filled in without fail.</p>
                <p>Thanks for your time.</p>
            </td>
        </tr>
        <tr>
            <th width="100%" colspan="8"><div style="border:1px solid black;margin-top: 5px;margin-bottom: 5px;"></div></th>
        </tr>
        <tr>
            <th width="25%" colspan="2">Customer Name</th>
            <td width="25%" colspan="2"> {{ ucwords($enquiryData->cust_name) }}</td>
            <th width="25%" colspan="2">CN NO</th>
            <td width="25%" colspan="2">  {{ $enquiryData->cn_no }}</td>
        </tr>
        <tr>
            <th width="25%" colspan="2">Contact Number</th>
            <td width="25%" colspan="2">  {{ $enquiryData->cust_contact }}</td>
            <th width="25%" colspan="2">Email ID</th>
            <td width="25%" colspan="2"> {{ $enquiryData->cust_email }} </td>
        </tr>
        <tr>
            <th width="25%" colspan="2">Source</th>
            <td width="25%" colspan="2">  {{ $enquiryData->source }}</td>
            <th width="25%" colspan="2">Destination</th>
            <td width="25%" colspan="2"> {{ $enquiryData->destination }} </td>
        </tr>
        <tr>
            <th width="100%" colspan="8"><div style="border:1px solid black;margin-top: 5px;margin-bottom: 5px;"></div></th>
        </tr>
        <tr>
            <td colspan="8" align="center">
                <b><h5>Your Feedback</h5></b>
            </td>
        </tr>
        <tr>
            <th width="60%" colspan="4"><b>A) Please rate as</b></th>
            <th width="10%" colspan="1">  <b>Excellent</b></th>
            <th width="10%" colspan="1">  <b>Good</b></th>
            <th width="10%" colspan="1"><b>Fair</b></th>
            <th width="10%" colspan="1"> <b>Poor</b> </th>
        </tr>
        <tr>
            <td width="" colspan="4">1) Skill of the Packing Staff </td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->skill=="Excellent")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->skill=="Good")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->skill=="Fair")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->skill=="Poor")?"checked":""}}></td>
        </tr>
        <tr>
            <td width="" colspan="4">2) Quality of the Packing Material </td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->quality=="Excellent")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->quality=="Good")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->quality=="Fair")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->quality=="Poor")?"checked":""}}></td>
        </tr>
        <tr>
            <td width="" colspan="4">3) Time Delivery </td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->time_delivery=="Excellent")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->time_delivery=="Good")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->time_delivery=="Fair")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->time_delivery=="Poor")?"checked":""}}></td>
        </tr>
        <tr>
            <td width="" colspan="4">4) General Attributes (Courtesy ,Punctuality etc.)</td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->attributes=="Excellent")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->attributes=="Good")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->attributes=="Fair")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->attributes=="Poor")?"checked":""}}></td>
        </tr>
        <tr>
            <td width="" colspan="4"> 5) Experience with the office staff   </td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->experience=="Excellent")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->experience=="Good")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->experience=="Fair")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->experience=="Poor")?"checked":""}}></td>
        </tr>
        <tr>
            <td width="" colspan="4"> 6) Breakage/Losses   </td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->breakage=="Excellent")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->breakage=="Good")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->breakage=="Fair")?"checked":""}}></td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->breakage=="Poor")?"checked":""}}></td>
        </tr>
        <tr>
            <th width="70%" colspan="4"><b>B) Please Mention</b></th>
            <th width="10%" colspan="1">  <b>Yes</b></th>
            <th width="20%" colspan="3"><b>No</b></th>
        </tr>
        <tr>
            <td width="" colspan="4"> 1) Work Start On Time </td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->work_start=="Yes")?"checked":""}}></td>
            <td width="" colspan="3"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->work_start=="No")?"checked":""}}></td>
        </tr>
        <tr>
            <td width="" colspan="4"> 2) Labours commite </td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->labour_commit=="Yes")?"checked":""}}></td>
            <td width="" colspan="3"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->labour_commit=="No")?"checked":""}}></td>
        </tr>
        <tr>
            <td width="" colspan="4"> 3) Correct Vehical </td>
            <td width="" colspan="1"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->correct_vehical=="Yes")?"checked":""}}></td>
            <td width="" colspan="3"><input type="checkbox" {{ (!empty($feedback_data) && $feedback_data->correct_vehical=="No")?"checked":""}}></td>
        </tr>
        <tr>
            <th width="100%" colspan="8"><b> #Overall Experience / Suggestion/ Comments</b></th>
        </tr>
        <tr>
            <th width="100%" colspan="8"><input style="border:2px solid black;width: 100%;height:70px;" value="{{ (!empty($feedback_data))?$feedback_data->suggestion:""}}"></th>
        </tr>
    </table>
</div>
<br><br>
<div class="form-group col-sm-6 pull-right" id="formDiv">
    <button  class="btn btn-primary ladda-button"  onClick="window.print()" name="button" value="printBtn">
        <i class="fa fa-print"></i>  Print
        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
    </button>
    <a href="{{url('feedbackPage')}}" class="btn btn-info ladda-button">
        <i class="fa fa-arrow-left"></i>  Back
        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
    </a>
</div>
</body>
</html>