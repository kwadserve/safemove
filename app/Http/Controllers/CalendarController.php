<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;
use App\Http\Requests;
use App\User;
use App\DeliveryModel;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;

class CalendarController extends Controller
{
    private $activities;
    protected $foo;
    public function __construct(Foo $foo){
        $this->foo = $foo;
    }
// check is sunday or not
    public function isSunday($d, $month){
        $year = date("Y");
        $day_name = date("N", strtotime($d . "-" . $month . "-" . $year)); // numeric representation of a day (1 for Monday, 7 for Sunday)
        if ($day_name == 7) {
            return true;
        } else {
            return false;
        }
    }
//check Current day or not
    public function getCurrentDate($d, $month) {
        $year = date("Y");
        $date = date("Y-m-d", strtotime($d."-" . $month . "-" . $year));
        $cur_date = date("Y-m-d");
        if($cur_date == $date){
            return true;
        } else {
            return false;
        }
    }

    public function getscheduleData($d, $month){
        $year = date("Y");
        $cur_date = date("Y-m-d",strtotime($year."-".$month."-".$d));
        $user_id =Auth::user()->id;
        $admin = DB:: table("role_user")->select("user_id")->where("role_id",1)->get();
        foreach ($admin as $adminData){
            $admin_id=$adminData->user_id;
        }
        if($user_id == $admin_id) {
            $allSurveyData = DB::table('tbl_schedule_survey')
                ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
                ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
                ->where("tbl_schedule_survey.isdelete", "0")
                ->where("tbl_schedule_survey.schedule_date",$cur_date)
                ->get();
        } else {
            $allSurveyData = DB::table('tbl_schedule_survey')
                ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
                ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
                ->where("tbl_schedule_survey.isdelete", "0")
                ->Where("tbl_schedule_survey.assing_emp",$user_id )
                ->where("tbl_schedule_survey.schedule_date",$cur_date)
                ->get();
        }
	
        return $allSurveyData;
    }
    public function calenderPage(){
        return view('calendar.calendarPageView');
    }

    public function getCalendarData(){
        $month = $_GET['month'];
        $year = date("Y");
        $d_name = date("N", strtotime("01-" . $month . "-" . $year)); // numeric representation of a day (1 for Monday, 7 for Sunday)
        $last_day = date("t", strtotime("01-" . $month . "-" . $year)); // The number of days in the given month
?>
        <table class="table table-bordered">
            <tr style="background-color: #eddeed;">
                <th style="width: 15%">Monday</th>
                <th style="width: 15%">Tuesday</th>
                <th style="width: 15%">Wednesday</th>
                <th style="width: 15%">Thursday</th>
                <th style="width: 15%">Friday</th>
                <th style="width: 15%">Saturday</th>
                <th style="width: 10%">Sunday</th>
            </tr>
            <tr>
<?php
for ($j = 1, $d = 1; $j <= 7; $j++) {
    if ($j < $d_name) {
        ?>
        <td class='emptyDay'></td>
        <?php
    } else {
        if ($this->isSunday($d, $month)) {
            ?>
            <td class='holiday'><p class='boldP text-right'><?php echo $d; ?></p></td>
            <?php
        } else {
//            if ($this->amc_visit_model->isCompanyHoliday($d, $month)) {
//                ?>
<!--                <td class='holiday'><p class='boldP text-right'>--><?php //echo $d; ?><!--</p></td>-->
<!--                --><?php
//            } else {
                $query = $this->getscheduleData($d, $month);
                $temp_c = $query->count();
                if ($this->getCurrentDate($d, $month)) {
                    ?>
                    <td class='currentDay' id="normalDay_<?php echo $d . '_' . $month; ?>" >
                    <?php
                } else {
                    ?>
                    <td class='normalDay <?php echo ($temp_c > 0) ? "visitDay" : "normalDay" ?>' id="normalDay_<?php echo $d . '_' . $month; ?>" >
                <?php } ?>
                <p class='boldP text-right <?php echo ($temp_c > 0) ? "fontSize" : "" ?>' style="float:right" ><?php echo $d; ?></p>
                <p style="float:left">
<!--                    --><?php
                    foreach ($query as $row) {
                        echo $row->cust_name . "<br>";
                    }
//                    ?>
                </p>
                </td>
                <?php
//            }
        }
        $d++;
    }
}
?>
        </tr>
        <tr>
            <?php
            for ($j = 1; $j <= 7; $j++) {
                if ($this->isSunday($d, $month)) {
                    ?>
                    <td class='holiday'><p class='boldP text-right'><?php echo $d; ?></p></td>
                    <?php
                } else {
//                    if ($this->amc_visit_model->isCompanyHoliday($d, $month)) {
//                        ?>
<!--                        <td class='holiday'><p class='boldP text-right'>--><?php //echo $d; ?><!--</p></td>-->
<!--                        --><?php
//                    } else {
                        $query = $this->getscheduleData($d, $month);
                        $temp_c = $query->count();
                        if ($this->getCurrentDate($d, $month)) {
                            ?>
                            <td class='currentDay' id="normalDay_<?php echo $d . '_' . $month; ?>">
                            <?php
                        } else {
                            ?>
                            <td class='<?php echo ($temp_c > 0) ? "visitDay" : "normalDay" ?>' id="normalDay_<?php echo $d . '_' . $month; ?>">
                        <?php } ?>
                        <p class='boldP text-right <?php echo ($temp_c > 0) ? "fontSize" : "" ?>' style="float:right" ><?php echo $d; ?></p>
                        <p style="float:left">
<!--                            --><?php
                            foreach ($query as $row) {
                                echo $row->cust_name . "<br>";
                            }
//                            ?>
                        </p>
                        </td>
                        <?php
//                    }
                }
                $d++;
            }
            ?>
        </tr>
            <tr>
                <?php
                for ($j = 1; $j <= 7; $j++) {
                    if ($this->isSunday($d, $month)) {
                        ?>
                        <td class='holiday'><p class='boldP text-right'><?php echo $d; ?></p></td>
                        <?php
                    } else {
//                    if ($this->amc_visit_model->isCompanyHoliday($d, $month)) {
//                        ?>
                        <!--                        <td class='holiday'><p class='boldP text-right'>--><?php //echo $d; ?><!--</p></td>-->
                        <!--                        --><?php
//                    } else {
                        $query = $this->getscheduleData($d, $month);
                        $temp_c = $query->count();
                        if ($this->getCurrentDate($d, $month)) {
                            ?>
                            <td class='currentDay' id="normalDay_<?php echo $d . '_' . $month; ?>">
                            <?php
                        } else {
                            ?>
                            <td class='<?php echo ($temp_c > 0) ? "visitDay" : "normalDay" ?>' id="normalDay_<?php echo $d . '_' . $month; ?>">
                        <?php } ?>
                        <p class='boldP text-right <?php echo ($temp_c > 0) ? "fontSize" : "" ?>' style="float:right" ><?php echo $d; ?></p>
                        <p style="float:left">
                        <?php
                            foreach ($query as $row) {
                                echo $row->cust_name . "<br>";
                            }
//                            ?>
                        </p>
                        </td>
                        <?php
//                    }
                    }
                    $d++;
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($j = 1; $j <= 7; $j++) {
                    if ($this->isSunday($d, $month)) {
                        ?>
                        <td class='holiday'><p class='boldP text-right'><?php echo $d; ?></p></td>
                        <?php
                    } else {
//                    if ($this->amc_visit_model->isCompanyHoliday($d, $month)) {
//                        ?>
                        <!--                        <td class='holiday'><p class='boldP text-right'>--><?php //echo $d; ?><!--</p></td>-->
                        <!--                        --><?php
//                    } else {
                        $query = $this->getscheduleData($d, $month);
                        $temp_c = $query->count();
                        if ($this->getCurrentDate($d, $month)) {
                            ?>
                            <td class='currentDay' id="normalDay_<?php echo $d . '_' . $month; ?>">
                            <?php
                        } else {
                            ?>
                            <td class='<?php echo ($temp_c > 0) ? "visitDay" : "normalDay" ?>' id="normalDay_<?php echo $d . '_' . $month; ?>">
                        <?php } ?>
                        <p class='boldP text-right <?php echo ($temp_c > 0) ? "fontSize" : "" ?>' style="float:right" ><?php echo $d; ?></p>
                        <p style="float:left">
                            <?php
                            foreach ($query as $row) {
                                echo $row->cust_name . "<br>";
                            }
//                            ?>
                        </p>
                        </td>
                        <?php
//                    }
                    }
                    $d++;
                }
                ?>
            </tr>
            <?php if ($d <= $last_day) { ?>
                <tr>
                    <?php
                    for ($j = 1; $j <= 7; $j++) {
                        if ($d <= $last_day) {
                            if ($this->isSunday($d, $month)) {
                                ?>
                                <td class='holiday'><p class='boldP text-right'><?php echo $d; ?></p></td>
                                <?php
                            } else {
//                                if ($this->amc_visit_model->isCompanyHoliday($d, $month)) {
//                                    ?>
<!--                                    <td class='holiday'><p class='boldP text-right'>--><?php //echo $d; ?><!--</p></td>-->
<!--                                    --><?php
//                                } else {
                                $query = $this->getscheduleData($d, $month);
                                $temp_c = $query->count();
                                    if ($this->getCurrentDate($d, $month)) {
                                        ?>
                                        <td class='currentDay' id="normalDay_<?php echo $d . '_' . $month; ?>" onclick="showModel(this.id)">
                                        <?php
                                    } else {
                                        ?>
                                        <td class='<?php echo ($temp_c > 0) ? "visitDay" : "normalDay" ?>' id="normalDay_<?php echo $d . '_' . $month; ?>" onclick="showModel(this.id)">
                                    <?php } ?>
                                    <p class='boldP text-right <?php echo ($temp_c > 0) ? "fontSize" : ""?>' style="float:right" ><?php echo $d; ?></p>
                                    <p style="float:left">
                                    <?php
                                        foreach ($query as $row) {
                                            echo $row->cust_name . "<br>";
                                        }
//                                        ?>
                                    </p>
                                    </td>
                                    <?php
//                                }
                            }
                        } else {
                            ?>
                            <td class='emptyDay'></td>
                            <?php
                        }
                        $d++;
                    }
                    ?>
                </tr>
            <?php } if ($d <= $last_day) { ?>
                <tr>
                    <?php
                    for ($j = 1; $j <= 7; $j++) {
                        if ($d <= $last_day) {
                            if ($this->isSunday($d, $month)) {
                                ?>
                                <td class='holiday'><p class='boldP text-right'><?php echo $d; ?></p></td>
                                <?php
                            } else {
//                                if ($this->amc_visit_model->isCompanyHoliday($d, $month)) {
//                                    ?>
<!--                                    <td class='holiday'><p class='boldP text-right'>--><?php //echo $d; ?><!--</p></td>-->
<!--                                    --><?php
//                                } else {
                                $query = $this->getscheduleData($d, $month);
                                $temp_c = $query->count();
                                    if ($this->getCurrentDate($d, $month)) {
                                        ?>
                                        <td class='currentDay' id="normalDay_<?php echo $d . '_' . $month; ?>" onclick="showModel(this.id)">
                                        <?php
                                    } else {
                                        ?>
                                        <td class='<?php echo ($temp_c > 0) ? "visitDay" : "normalDay" ?>' id="normalDay_<?php echo $d . '_' . $month; ?>" onclick="showModel(this.id)">
                                    <?php } ?>
                                    <p class='boldP text-right <?php /*echo ($temp_c > 0) ? "fontSize" : "" */?>' style="float:right" ><?php echo $d; ?></p>
                                    <p style="float:left">
<!--                                        --><?php
                                        foreach ($query as $row) {
                                            echo $row->cust_name . "<br>";
                                        }
//                                        ?>
                                    </p>
                                    </td>
                                    <?php
//                                }
                            }
                        } else {
                            ?>
                            <td class='emptyDay'></td>
                            <?php
                        }
                        $d++;
                    }
                    ?>
                </tr>
            <?php } ?>
        </table>
<?php
    }

}
