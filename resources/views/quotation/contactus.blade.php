@extends('layouts.web_template')

@section('content')
<div class="frontend_content">
        <div class="slider-page"></div>
    <div class="about-area">
    <div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box fadeInUp animated-fast">
					
					<div class="fh5co-contact-info">
						<h3>Contact Information</h3>
						<ul>
							<li>198 West 21th Street, <br> Suite 721 Australia 10016</li>
							<li><a class="text-danger" href="tel://1234567920">+ 1235 2355 98</a></li>
							<li class="email"><a class="text-danger" href="mailto:info@cmsnbd.com.au">info@cmsnbd.com.au</a></li>
							<li><a style="color:#a94442" href="">gettemplates.co</a></li>
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box fadeInUp animated-fast">
					<h3>Get In Touch</h3>
					<form action="#">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="fname">First Name</label>
								<input type="text" id="fname" class="form-control" placeholder="Your firstname">
							</div>
							<div class="col-md-6">
								<label for="lname">Last Name</label>
								<input type="text" id="lname" class="form-control" placeholder="Your lastname">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="email" class="form-control" placeholder="Your email address">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="subject">Subject</label>
								<input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Message</label>
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-lg btn-primary">
						</div>

					</form>		
				</div>
			</div>
		</div>
    </div>
</div>
<style>
.form-control {
    box-shadow: none;
    background: transparent;
    border: 2px solid rgba(0, 0, 0, 0.1);
    height: 54px;
    font-size: 18px;
    font-weight: 300;
}
.fh5co-contact-info ul li {
    padding: 0 0 0 70px;
    margin: 0 0 30px 0;
    list-style: none;
    position: relative;
}

</style>
@endsection
