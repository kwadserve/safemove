<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .divClass{
            padding: 20px;
            width:50%;
        }
        table{
            border-collapse: collapse;
        }
        td,th{
            padding-left: 10px;
            padding-right: 10px;
        }
        th{
            text-align: left;
        }
        .logoClass1{
            font-size: 40px;
            font-weight: 700;
            font-family: auto;
            color: #4B0082;
            float: left;
        }
        .subheading{

        }
        .addClass{
            font-weight: 10;
            font-size: 12px;
            /*text-align: right;*/
        }
        .hrClass{
            height: 25px;
            border: 1px solid #c8d655;
            background-color: #c8d655;
            border-radius: 5px;
        }
        .clsRed{
            color: red;
            font-weight: bold;
        }

        li{
            padding: 10px;
            font-size: 10px;
            text-align: justify;
        }
        b{
            color: black;
        }
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
        .lableCls{
            font-family: auto;
            padding: 10px;
        }
        .backColor1{
            background-color: #9fcdff;
        }
        .backColor2{
            background-color: #d7f3e3;
        }
        p{
            font-size: 10px;
            text-align: justify;
        }
        .widthImg{
            width:634px;
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
            table{
                border-collapse: collapse!important;
                background-color: #f5f5f5!important;
            }
            td,th{
                padding: 10px!important;
            }
            th{
                text-align: left!important;
            }
            .divClass{
                padding: 20px!important;
                padding-top: 25px!important;
                width:100%!important;
            }
            .addClass{
                font-weight: 10!important;
                font-size: 10px!important;
                color: #4B0082!important;
            }
            .hrClass{
                height: 0px!important;
                background-color: #c8d655!important;
                border: 5px solid #c8d655!important;
            }
            .clsRed{
                color: red!important;
                font-weight: bold!important;
            }

            li{
                padding: 10px!important;
                font-size: 10px!important;
                text-align: justify!important;
            }
            b{
                color: black!important;
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
            p{
                font-size: 10px!important;
                text-align: justify!important;
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
    <div>
        <table  class="table-responsive" width="100%" style="background-color: #f5f5f5;">

            <tr><td colspan="2" style="text-align: center"><h4><b>Quatation</b> </h4></td></tr>
            <tr>
                <td width="50%">
                    <div><h6><b>Kind Attn: {{ ucwords($quotData->cust_name) }} </b></h6></div>
                </td>
                <td width="50%">
                    <div ><h6><b>Custmoer No:{{ $quotData->cn_no }}/Safemove/Pune</b> </h6></div>
                </td>
            </tr>
            <tr>
                <td>
                    <p><h6> <b>Email :</b> {{ $quotData->cust_email }}</h6></p>
                </td>
                <td>
                    <div><h6><b>Date:</b> {{ date("d-m-Y",strtotime($quotData->quotCreate)) }}</h6></div>
                </td>
            </tr>
            <tr>
                <td>
                    <p><h6><b> Contact :</b> {{ $quotData->cust_contact }} </h6></p>
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <p><h6><b>Origin Address :  </b></h6></p><p> <h6>{{ $quotData->src_add_line1 }}</h6></p>
                </td>
                <td>
                    <p><h6><b>Destination Address : </b></h6></p><p> <h6>{{ $quotData->dest_add_line1 }}</h6></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><h6><b>Floor No : </b>{{ $quotData->src_floor_no }}</h6></p>
                </td>
                <td>
                    <p><h6><b>Floor No : </b>{{ $quotData->dest_floor_no }}</h6></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><h6><b>Elavator : </b>{{ ($quotData->src_elavator == "Y")?"Yes":"No" }}</h6></p>
                </td>
                <td>
                    <p><h6><b>Elavator : </b>{{ ($quotData->dest_elavator == "Y")?"Yes":"No"}}</h6></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><h6><b>Total CFT : </b>{{ $quotData->total_cft }}</h6></p>
                </td>
                <td>
                    <p><h6><b>Total Kilometer : </b>{{ $quotData->kilometer }}</h6></p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p><h5>Dear Sir / Madam,</h5></p>
                    <p><h6>Thanks for Contacting Us concerning the Packing & Moving of Your's Goods From <b>{{ ucwords($quotData->source) }}</b> to <b>{{ ucwords($quotData->destination) }}</b>.
                        We are pleased to present our proposal for your consideration with assurance that with, your consignment would be Packed & Moved with the most professionalism and care.</h6></p>
                </td>
            </tr>
            @if($quotData->cost_type=="cost_include1")
                <tr>
                    <td style="text-align: right"><h5>Total Amount</h5></td>
                    <td style="text-align: right"><h5>{{ $quotData->net_amount + $quotData->discount }}</h5></td>
                </tr>
                @if($quotData->discount!="0.00")
                    <tr>
                        <td style="text-align: right"><h5>Total Discount</h5></td>
                        <td style="text-align: right"><h5>- {{ $quotData->discount }}</h5></td>
                    </tr>
                @endif
               @else
				<?php //dd($quotData); ?>
                <tr>
				
				
                    <td style="text-align: right"><h5>Base Amount </h5></td>
                    <td style="text-align: right"><h5>{{ $quotData->amount  }}</h5></td>
                </tr>
				
				
				@if($quotData->discount!="0.00")
                    <tr>
                        <td style="text-align: right"><h5>Total Discount</h5></td>
                        <td style="text-align: right"><h5>- {{ $quotData->discount }}</h5></td>
                    </tr>
                @endif
				
				
				
				
				@if($quotData->discount!="0.00")
                    <tr>
                        <td style="text-align: right"><h5>Sub Total</h5></td>
						
						<?php $subtotal = $quotData->amount - $quotData->discount; ?>
                        <td style="text-align: right"><h5> {{ $subtotal  }}</h5></td>
                    </tr>
					@else
					 <tr>
                        <td style="text-align: right"><h5>Sub Total (Without Discount)</h5></td>
						<?php $subtotalwithoutdiscount = $quotData->amount - $quotData->discount; ?>
                        <td style="text-align: right"><h5> {{  $subtotalwithoutdiscount }}</h5></td>
                    </tr>
						
                @endif
				
				
				
				
				<tr>
                    <td style="text-align: right"><h5>GST @ {{ $quotData->cost_ex_service_tax }} </h5></td>
                    
						@if($quotData->discount!="0.00")
									<?php $gstwithdiscount = ( ($quotData->amount - $quotData->discount) * $quotData->cost_ex_service_tax )/100;  ?>
							<td style="text-align: right"><h5>{{ $gstwithdiscount }}</h5></td>
					
						@else
								<?php $gstwithoutdiscount = ( ($quotData->amount ) * $quotData->cost_ex_service_tax )/100; ?>
							<td style="text-align: right"><h5>{{ $gstwithoutdiscount }}</h5></td>
						@endif
                </tr>
				
				
				
				<tr>
                 
                    <td style="text-align: right"><h5>Insurance @ {{ $quotData->cost_ex_ins_val }} </h5></td>
                    <td style="text-align: right"><h5>{{ $quotData->after_insurance_amnt }}</h5></td>
                </tr>
						
						
						
						<tr>
						<td style="text-align: right"><h5><b>Net Amount</b></h5></td>
						@if($quotData->discount!="0.00")
								<?php $netamount = $subtotal + $gstwithdiscount + $quotData->after_insurance_amnt   ?>
							<td style="text-align: right"><h5>{{ $netamount }}</h5></td>
					
						@else
							<?php $netamount = $subtotalwithoutdiscount + $gstwithoutdiscount + $quotData->after_insurance_amnt  ?>
							<td style="text-align: right"><h5>{{ $netamount }}</h5></td>
						@endif
					</tr>
                </tr>
				
				<tr>
				@if($quotData->discount!="0.00")
							<td colspan="2"><h6><b>Net Amount(In Words) : {{ $amtInWord }}</b></h6></td>
					
						@else
							
							<td colspan="2"><h6><b>Net Amount(In Words) : {{ $amtInWord }}</b></h6></td>
						@endif
                   
                </tr>
                
                <tr>
                    <td colspan="2"><h6><span class="clsRed"> # Our Cost Includes :</span> Packing, Loading, Transportation, Unloading, Unpacking, Settling and Removal of Debris with Door to Door Service.</h6></td>
                </tr>
            @endif
        </table>
    </div>
    <div>
        <p><h6><u><b> Please Note : </b></u></h6></p>
        <ul>
            <li>Time Required For Packing {{ $quotData->time_req_for_packing }} Day.</li>
            <li>Transit Time {{ $quotData->transist_time }} Days From The Date Of Final Dispatch.</li>
            <li>Minimum {{ $quotData->prior_notice }} Days Prior Notice Required For Packing.</li>
            <li>{{ $quotData->payment_terms }}% Advance At Confirmation Time.</li>
            <li>The rest of {{ 100-$quotData->payment_terms }}% At The Beginning of Journey.</li>

            <li>Kindly make all the payments in favor of <b>“Safemove Packers And Movers”</b></li>
            <li>We do not accept to move perishable goods , jewelery ,hazardous materials like crackers explosive chemicals, gas filled cylinders , battery acids and inflammable oils such as diesel , petrol , kerosene, gasoline & also narcotics , contraband items.</li>
            <li> The carrier , or their agent shall be exempted from any loss or damage through accident , pilferer age, fire,rain, collision,any other road or river hazard , we therefore recommend that goods to be insured under, carrier’s risk , no receipt from the insurance co, will be given.</li>
            <li>We also do not accept to move any pre-packed goods given by the customer, In case there are Prepacked goods to be moved the same will be opened and repacked with additional cost.</li>
            <li>Dismantling & assembling of TV Dish Antenna, Water Purifier, Screw Furniture, Electrical Fittings, UPSInvertors, Air Conditioners, Geysers, Solar equipments, Drilling works / Carpentry works etc are not in our scope of work, but can be arranged from third party with additional cost.</li>
            <li>This quote is based on the list of items based on your email /physical survey carried out by our Representatives. Should there be an increase in volume your goods at the time of packing/ moving, Our rates will be revised accordingly.</li>
            @if(!empty($quot_terms))
                @foreach($quot_terms as $quot_terms_data)
                    <li>{{$quot_terms_data->terms_cond}}</li>
                @endforeach
            @endif
        </ul>
    </div>
    <div>
        <p><h6><u><b> Two Wheelers : </b></u></h6></p>
        <p>
            Min Petrol of 1.5 Liters should be made available in the Two Wheeler.
            {{--Please empty the fuel tank / Oil completely to ensure no spillage / Leakage in Transit.--}}
        </p>
    </div>
    <div>
        <p><h6><u><b> Car : </b></u></h6></p>
        <p>
            Min Petrol of 10 Liters should be made available in the car as the carriers are not allowed inside the city limits at both origin and destination. Our charges excludes filling of fuel/oil for Motors Cars.
        </p>
    </div>
    <div>
        <p><h6><u><b> Quote Excludes : </b></u></h6></p>
        <p>
            Collection or delivery using stairs above 2rd floor (if service lift not provided), Multiple collections or deliveries, Special handling charges for items which can not be Accessed through elevator/normal stairs (special handling/difficult access) if any Force majeure situations/vehicle detention. Crating for household articles, Handyman servies(Professional carpenter/electrician/ A/C Mechanic / Plumber/Maids Etc.
        </p>
    </div>
    <div>
        <p><h6><u><b> Documents Required For - Car/Two wheelers : </b></u></h6></p>
        <p>
            Xerox copy of Registration Certificate / Xerox copy of Insurance Policy / Original PUC.
        </p>
    </div>
    <div>
        <p><h6><b> We hope you will find our rates to be very reasonable and we now look forward to receive your valued order to serve you impeccably.</b></h6></p>
    </div>
    <br>
    <div>
        <p><h6><u><b>  Terms and Conditions : </b></u></h6></p>
        <ul>
            <li> Our Quotation is valid for a period of 30 to 45 Days.</li>
            {{--<li> Octroi / State Levies / Entry taxes, etc., if any will be billed to your account.</li>--}}
            <li> Any moving in/moving out charges payable to apartment associations/Labour Unions to be paid by you.</li>
            <li> Value of Goods for insurance should be declared individually at the time of packing as per the inventory/packing list.</li>


        </ul>
    </div>
    <div style="page-break-before: always">
        <br>
        <h5><b>Articals List</b></h5>
        <div>
            <table class="table table-striped" width="100%">
                <tr style="border: 1px solid black;background-color: lightgrey">
                    <th style="border: 1px solid black;">Sr.No</th>
                    <th style="border: 1px solid black;">Name</th>
                    <th style="border: 1px solid black;">count</th>
                    <th style="border: 1px solid black;">Sr.No</th>
                    <th style="border: 1px solid black;">Name</th>
                    <th style="border: 1px solid black;">count</th>
                </tr>
                @php
                    $i=1;
                @endphp
                @foreach($articalsRs as $articalsData)
                    @if($i%2!=0)
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black;">{{$i}}</td>
                            <td style="border: 1px solid black;">{{ $articalsData->eq_name }}</td>
                            <td style="border: 1px solid black;">{{ $articalsData->artical_count }}</td>

                            @else
                                <td style="border: 1px solid black;">{{$i}}</td>
                                <td style="border: 1px solid black;">{{ $articalsData->eq_name }}</td>
                                <td style="border: 1px solid black;">{{ $articalsData->artical_count }}</td>
                        </tr>
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach
            </table>
        </div>
    </div>
</div>
<form method="POST" role="form" action="{{ url('/sendPrintQuotation') }}" accept-charset="UTF-8">
    {{ csrf_field() }}
<input type="hidden" name="consignment_no" value="{{ $quotData->cn_no }}">
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