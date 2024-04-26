@extends('layouts.web_template')

@section('content')
<div class="frontend_content" style="transform: none;">
    <div class="slider-page">
        
    </div>

    <div class="service-area" style="transform: none;">
    <h1 class="text-center text-danger"><u>Quotation Sumbit Here</u></h1>
        <div class="container" style="transform: none;">
            
            <div class="row" style="transform: none;">
           
            <!-- Quation Here -->
            <div class="col-md-8">
           
            <form method="POST" action="#" accept-charset="UTF-8" value="PATCH" autocomplete="off" >
            
                <p class="text-center">Please fill this form. We will get back to you soon.</p>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="unit_no" class="unit_no">Unit No.</label>
                                <input class="form-control" placeholder="Enter Unit No." name="unit_no" type="text" id="unit_no">

                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="address" class="addresss">Street Address</label>
                            <input required="" autocomplete="off" id="formatted_address" class="form-control geocomplete" placeholder="Enter Address" name="address" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="name" class="name">Name</label>

                            <input required="" class="form-control" placeholder="Enter Name" name="name" type="text" id="name">

                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="email" class="email">Email</label>
                            <input required="" autocomplete="off" id="email" class="form-control" placeholder="Enter Email" name="email" type="email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="phone" class="phone">Phone </label>

                            <input required="" class="form-control" placeholder="Enter Phone" name="phone" type="text" id="phone">

                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="subject" class="subject">Subject</label>
                            <input required="" autocomplete="off" id="subject" class="form-control" placeholder="Enter Subject" name="subject" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="massage" class="massage">Description of work or services needed</label>
                        <textarea rows="4" class="form-control" placeholder="Enter Description of work or services needed.." id="massage" name="massage" cols="50"></textarea>
                    </div>
                </div>
                <div class="form-group pull-right">               
                     <button class="btn btn-primary" name="submit" type="submit" >Submit Quotation</button>
                </div>
            
            </form>
            </div>
                <!-- End Quation Here -->
            </div>


        </div>
    </div>


    
</div>
@endsection
