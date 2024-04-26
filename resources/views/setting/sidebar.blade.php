<!-- nav-tabs -->
<ul class="site-sidebar-nav nav nav-tabs nav-justified nav-tabs-line" data-plugin="nav-tabs"
role="tablist">
    <li class="active" role="presentation">
        <a data-toggle="tab" title="Followup List"  href="#sidebar-setting" role="tab">
            <i class="icon wb-clipboard"></i>
        </a>
    </li>
  <li role="presentation">
    <a data-toggle="tab" href="#sidebar-userlist" title="{{ trans('app.users')}}" role="tab">
     <i class="icon wb-graph-up" aria-hidden="true"></i>
    </a>
  </li>
  <li role="presentation">
    <a data-toggle="tab" title="{{ trans('app.activity')}}" href="#sidebar-activity" role="tab">
      
	   <i class="fa fa-truck"></i>
    </a>
  </li>
</ul>

<div class="site-sidebar-tab-content tab-content">

    <div class="tab-pane fade active in" id="sidebar-setting">
        <div>
            <div>
                <h5> <b> Followup Update</b></h5>
                <ul class="list-group">
                    @foreach($followupList as $data)
                        <li class="list-group-item" style="border-top: 1px solid lightgray;">
                            CN NO :{{$data->cn_no}} <br>
                            Name :{{$data->cust_name}}<br>
                            Mob No. :{{$data->cust_contact}}<br>
                            Date. :{{date('d-m-Y',strtotime($data->follow_up_date))}}<br>
                            <a onclick='getFollowup({{$data->cn_no}})' style='color: red'> Conversation : {{$data->follow_up_convr}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-------------- sart sidebar register users --------------------->
  <div class="tab-pane fade" id="sidebar-userlist">
    <div>
      <div>
        <h5> <b> Survey Date</b> </h5>
          <ul class="list-group">
              @foreach($surveyList as $data)
                  <li class="list-group-item" style="border-top: 1px solid lightgray;">
                      CN NO :{{$data->cn_no}} <br>
                      Name :{{$data->cust_name}}<br>
                      Mob No. :{{$data->cust_contact}}<br>
                      Date. :{{date('d-m-Y',strtotime($data->schedule_date))}}<br>
                      Time. :{{date('h:i A',strtotime($data->schedule_time))}}<br>
                  </li>
              @endforeach
          </ul>
      </div>
    </div>
  </div>
<!----------------------- end sidebar register user --------------------->
  
<!----------------------- Start sidebar activity --------------------->
  <div class="tab-pane fade" id="sidebar-activity">
    <div>
      <div>
        <h5> <b> Shifting Date</b></h5>
          <ul class="list-group">
              @foreach($shiftingList as $data)
                  <li class="list-group-item" style="border-top: 1px solid lightgray;">
                      CN NO :{{$data->cn_no}} <br>
                      Name :{{$data->cust_name}}<br>
                      Mob No. :{{$data->cust_contact}}<br>
                      Date. :{{date('d-m-Y',strtotime($data->moving_date))}}<br>
                      Time. :{{date('h:i A',strtotime($data->moving_time))}}<br>
                  </li>
              @endforeach
          </ul>
      </div>
    </div>
  </div>
<!----------------------- end sidebar activity --------------------->

<!----------------------- End sidebar general setting --------------------->
</div>
