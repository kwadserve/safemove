@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="public/assets/examples/css/forms/advanced.css">
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
    <link rel="stylesheet" href="public//global/vendor/filament-tablesaw/tablesaw.css">

    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
        th{
            font-weight: bold;
            color: gray;
        }
    </style>
    <style>
        .divClass{
            padding: 20px;
            width:100%;
        }
        table{
            border-collapse: collapse;
        }
        td,th{
            padding: 10px;
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
            color: #4B0082;
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
        p{
            font-size: 10px;
            text-align: justify;
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
        }
    </style>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs ">
                                    <li class="active">
                                        <a href="#tab_default_1" data-toggle="tab">Quotation Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <div class="divClass" id="printDiv" >

                                                    <div >
                                                        <div style="float: left;">
                                                            <img src="{{URL::asset('public/images/safemove-logo.png')}}" class="img"  width="190px">
                                                            <p><img src="{{URL::asset('public/images/shreeramgroup.png')}}" style="width: 190px;height: 30px;margin-top: 15px"> </p>
                                                            {{--SafeMove <br> <span class="subheading"> Packers & Movers </span>--}}
                                                            {{--<p></p>--}}
                                                            {{--<span class="logoClass"><span class="lC">Safe</span>M<span class="lC">o</span>ve</span>--}}
                                                            {{--<p class="headName"><span class="dC">Domestic & Commercial</span> <span class="lC">Realocation Service</span></p>--}}
                                                            {{--<p class="headName">An <span class="iso">ISO 9001:2015</span> Certified Comapany</p>--}}
                                                        </div>
                                                        <div style="float: right">
                                                            {{--<p><img src="{{URL::asset('public/images/shreeramgroup.png')}}" style="width: 150px;height: 30px;"> </p>--}}
                                                            <p class="addClass"> {{ $companyDetails->add_line1 }}</p>
                                                            <p class="addClass"> {{ $companyDetails->add_line2 }}</p>
                                                            <p class="addClass">City - {{ $companyDetails->city }} Pincode - {{ $companyDetails->pincode }}</p>
                                                            <p class="addClass">State - {{ $companyDetails->state }} Country - {{ $companyDetails->country }}</p>
                                                            <p class="addClass">Contact Person - {{ $companyDetails->contact_person }}(Sales Executive)</p>
                                                            <p class="addClass">Contact - {{ $companyDetails->contact }},{{ $companyDetails->alt_contact }} </p>
                                                        </div>
                                                    </div>
                                                    <br><br><br><br><br><br><br><br>

                                                    <div style="padding-left:10px">
                                                        <img src="{{URL::asset('public/images/q3.png')}}" id="Image3" alt="" style="width:103%;margin-left: -12px;" />
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <div style="float: left"><h5><b>Custmoer No:{{ $quotData->cn_no }}/Safemove/Pune</b> </h5></div>
                                                        <div style="float: right"><h5><b>Date:</b> {{ date("d-m-Y",strtotime($quotData->quotCreate)) }}</h5></div>
                                                    </div><br><br><br>
                                                    <div>
                                                        <table width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div><h5><b>Kind Attn: {{ ucwords($quotData->cust_name) }} </b></h5></div>
                                                                    {{--<p><h6> {{ $quotData->src_add_line1 }} </h6></p>--}}
                                                                    <p><h6> Email : {{ $quotData->cust_email }}</h6></p>
                                                                    <p><h6> Contact : {{ $quotData->cust_contact }} </h6></p>
                                                                </td>
                                                                <td>
                                                                    <div><h5><b>Origin Address</b></h5></div>
                                                                    <p>{{ $quotData->src_add_line1 }} </p>
                                                                </td>
                                                                <td>
                                                                    <div><h5><b>Destination Address</b></h5></div>
                                                                    <p>{{ $quotData->dest_add_line1 }} </p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div><br>
                                                    <div>
                                                        <p><h5>Dear Sir / Madam,</h5></p><br>
                                                        <p><h6>Thanks for Contacting Us concerning the Packing & Moving of Your's Goods From <b>{{ ucwords($quotData->source) }}</b> to <b>{{ ucwords($quotData->destination) }}</b>.
                                                            We are pleased to present our proposal for your consideration with assurance that with, your consignment would be Packed & Moved with the most professionalism and care.</h6></p>
                                                    </div><br>
                                                    @if($quotData->cost_type=="cost_include1")
                                                        <div>
                                                            <table width="100%" style="font-size: 10px">
                                                                <tr>
                                                                    <th>Total Amount</th>
                                                                    <td align="right">{{ $quotData->net_amount + $quotData->discount }}</td>
                                                                </tr>
                                                                @if($quotData->discount!="0.00")
                                                                    <tr>
                                                                        <th>Total Discount</th>
                                                                        <td align="right">- {{ $quotData->discount }}</td>
                                                                    </tr>
                                                                @endif
                                                                <tr>
                                                                    <th><b>Net Amount</b></th>
                                                                    <td align="right"><b>{{ $quotData->net_amount }}</b></td>
                                                                </tr>
                                                            </table>
                                                        </div><br>
                                                        <div>
                                                            <p><b>Net Amount(In Words) :</b>{{$amtInWord}}</p>
                                                        </div>
                                                        <div>
                                                            <p><h5 class="clsRed"> # Our Cost Includes :</h5></p>
                                                            <p><h6>Packing, Loading, Transportation, Unloading, Unpacking, Settling and Removal of Debris with Door to Door Service.</h6></p>
                                                        </div>
                                                        <div>
                                                            <p><h5 class="clsRed"> # Our Cost Exclude :</h5></p>
                                                            <p><h6> Freight on Value @3% on the declare value of Goods, Service Tax @18%.</h6></p>
                                                        </div>
                                                        <br>
                                                    @else
                                                        <div>
                                                            <table width="100%" style="font-size: 10px">
                                                                <tr>
                                                                    <th>Total Charges</th>
                                                                    <td align="right">{{ $quotData->amount }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>GST @ {{ $quotData->cost_ex_service_tax }}</th>
                                                                    <td align="right">{{ $quotData->after_service_tax }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Insurance @ {{ $quotData->cost_ex_ins_val }}</th>
                                                                    <td align="right">{{ $quotData->after_insurance_amnt }}</td>
                                                                </tr>
                                                                @if($quotData->discount!="0.00")
                                                                    <tr>
                                                                        <th>Total Discount</th>
                                                                        <td align="right">- {{ $quotData->discount }}</td>
                                                                    </tr>
                                                                @endif

                                                                <tr>
                                                                    <th><b>Total Amount</b></th>
                                                                    <td align="right"><b>{{ $quotData->net_amount }}</b></td>
                                                                </tr>
                                                            </table>
                                                        </div><br>
                                                        <div>
                                                            <p><b>Net Amount(In Words) :</b>{{$amtInWord}}</p>
                                                        </div>
                                                        <div>
                                                            <p><h5 class="clsRed"> # Our Cost Includes :</h5></p>
                                                            <p><h6>Packing, Loading, Transportation, Unloading, Unpacking, Settling and Removal of Debris with Door to Door Service.</h6></p>
                                                        </div>

                                                        <br>
                                                    @endif
                                                    <div>
                                                        <p><b>Total CFT :</b>{{$quotData->total_cft}}</p>
                                                        <p><b>Total Kilometer :</b>{{$quotData->kilometer}}</p>
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
                                                            <li> Octroi / State Levies / Entry taxes, etc., if any will be billed to your account.</li>
                                                            <li> Any moving in/moving out charges payable to apartment associations/Labour Unions to be paid by you.</li>
                                                            <li> Value of Goods for insurance should be declared individually at the time of packing as per the inventory/packing list.</li>
                                                        </ul>
                                                    </div>
                                                    <div style="page-break-before: always">
                                                        <br>
                                                        <h5><b>Articals List</b></h5>
                                                        <div>
                                                            <table width="100%" style="border: 1px solid black;font-size:10px">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });

            $('#example').DataTable( {
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                order:["1","desc"]
            } );

        });
    </script>
@stop