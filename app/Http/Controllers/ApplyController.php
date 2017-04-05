<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\MasterApplyRequest;
use App\Http\Requests\MasterCheckRequest;
use App\Http\Requests\LessonApplyRequest;
use App\Http\Requests\PlayApplyRequest;
use App\Master_applies; 
use App\Master_applycategory;
use App\Master_applydate;
use App\Master_applylocation;
use App\Server_userprofile;
use App\Server_lessoncategorycode;
use App\Lesson_applies;
use App\Lesson_applyimages;
use App\Lesson_applyschedule;
use App\Play_applies;
use App\Play_applyimages;
use App\Play_applyschedule;


class ApplyController extends Controller
{
    public function applyIndex() {

        if( request()->segment(1) == 'master-apply' ) {
            return view('form.masterForm');
        } else {
            return view('form.lessonForm');
        } 
    }

    public function masterAgree(Request $request)
    {
        $agree1 = $request->input('agree1');
        $agree2 = $request->input('agree2');
        $agree3 = $request->input('agree3');

        if( $agree1 == 'on' && $agree2 == 'on' && $agree3 == 'on' ) {
            // return view('form.masterForm2');
            return redirect('/master-create');
        } else {
            return back();
        }
    }

    public function masterCreate(Request $request) {
        return view('form.masterForm2');
    }

    public function masterCheck(MasterCheckRequest $request)
    {
        $email = $request->input('email');
        $name = $request->input('name');
        $status = $request->input('status');

        $count = Server_userprofile::where('user_login_id', $email)->where('user_name', $name)->count();

        if( $count == 0 ) {
            return back();
        } else {
            if($status == 'lesson') {
                return view('form.lessonForm2')->with('email', $email)->with('name', $name);
            } else {
                return view('form.playForm2')->with('email', $email)->with('name', $name);
            }
        }
    }
     
    
    public function masterApplyStore(MasterApplyRequest $request)
    {

        $apply = new Master_applies;
        $apply->name = $request->input('master_name');
        $apply->phone = $request->input('phone');
        $apply->gender = $request->input('gender');
        $apply->career = $request->input('career');
        $apply->intro = $request->input('intro');
        $apply->intro_detail = $request->input('detail-intro');
        $apply->sns_1 = $request->input('sns1');
        $apply->sns_2 = $request->input('sns2');
        $apply->sns_3 = $request->input('sns3');
        $apply->sns_4 = $request->input('sns4');
        
        $gender = $request->input('gender');
        if( $gender == '남자' ) {
            $apply->gender = 'M';
        } else {
            $apply->gender = 'F';
        }
        $email = $request->input('email01') . '@' . $request->input('email02');
        $apply->email = $email;

        $year = $request->input('birth1');
        $month = $request->input('birth2');
        $date = $request->input('birth3');
        $apply->birth = $year . $month . $date; 
        $apply->business = $request->input('business_docu');
        $apply->sale = $request->input('sales_docu');

        if( $request->file('business_docu') != null ) { 
            $business = $request->file('business_docu');
            $business_name = $business->getClientOriginalName();
            $apply->business_name = $business_name;
            $store_business = Storage::put('master-apply', $business, 'public');
            $apply->business_docu = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_business;
        }

        if( $request->file('sales_docu') != null ) { 
            $sale = $request->file('sales_docu');
            $sale_name = $sale->getClientOriginalName();
            $apply->sale_name = $sale_name;
            $store_sale = Storage::put('master-apply', $sale, 'public');
            $apply->sale_docu = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_sale;
        }
        
        $bankbook = $request->file('bankbook');
        $bank_name = $bankbook->getClientOriginalName();
        $apply->bankbook_name = $bank_name;
        $store_bank = Storage::put('master-apply', $bankbook, 'public');
        $apply->bankbook_docu = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_bank;

        $profile_image = $request->file('profile');
        $profile_name = $profile_image->getClientOriginalName();
        $apply->profile_name = $profile_name;
        $store_profile = Storage::put('master-apply', $profile_image, 'public');
        $apply->profile_image = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_profile;

        if( $request->file('image') != null ) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $apply->image_name = $image_name;
            $store_image = Storage::put('master-apply', $image, 'public');
            $apply->image = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_image;
        }

        $apply->save();

        
        $category = $request->input('category');
        $category_detail = $request->input('category-detail');
        $location = $request->input('location');
        $location_detail = $request->input('location2');
        $day = $request->input('date');
        $time = $request->input('date2');

        for( $i=0; $i<count($category); $i++ ) {
            // $category_id = Server_lessoncategorycode::where('category', $category[$i])->first()->id;
            $category_id = 2; //임의로 지정 
            $master_category = new Master_applycategory;
            $master_category->apply_id = $apply->id;
            $master_category->category = $category_id;
            $master_category->category_detail = $category_detail[$i];
            $master_category->save();
        }
            
        for( $i=0; $i<count($location); $i++ ) {
            $master_location = new Master_applylocation;
            $master_location->apply_id = $apply->id;
            $master_location->location = $location[$i];
            $master_location->location_detail = $location_detail[$i];
            $master_location->save();
        }
                
        for( $i=0; $i<count($day); $i++ ) {
            $master_date = new Master_applydate;
            $master_date->apply_id = $apply->id;
            $master_date->day = $day[$i];
            $master_date->time = $time[$i];
            $master_date->save();
        }

        return redirect('/master-complete');
    }

    public function lessonApplyStore(LessonApplyRequest $request) {
        $status = $request->input('status');
        $lesson = new Lesson_applies;
        $lesson->master_id = Server_userprofile::where('user_login_id', $request->master_email)->first()->id;
        $lesson->category = $request->input('category');
        $lesson->category_detail = $request->input('category-detail');
        $lesson->postcode = $request->input('postcode');
        $lesson->location = $request->input('location');
        $lesson->class = $request->input('class'); // 정규 or 원데이
        $lesson->howmany_week = $request->input('howmany_week'); //숫자
        $lesson->howmany_total = $request->input('howmany_total'); //숫자
        $lesson->howmany = $request->input('howmany'); //1:1 or 그룹 
        $lesson->howmany_min = $request->input('howmany_min'); //숫자
        $lesson->howmany_max = $request->input('howmany_max'); //숫자
        $lesson->cost = $request->input('cost'); //숫자
        $lesson->lesson_name = $request->input('lesson-name');
        $lesson->lesson_intro = $request->input('lesson-intro');
        $lesson->lesson_goal = $request->input('lesson-goal');
        $lesson->curriculum = $request->input('curriculum');
        $lesson->required = $request->input('required');
        $lesson->lesson_ready = $request->input('lesson-ready');
        $etcs = $request->input('lesson-etc');
        $lesson->lesson_tag = $request->input('lesson-tag');
        $etc_text = '';
        foreach( $etcs as $etc ) {
            if( $etc_text == '' ) {
                $etc_text = $etc;
            } else {
                $etc_text = $etc_text . ' ' . $etc;
            }
        }
        $lesson->lesson_etc = $etc_text;
        $lesson->save();

        $images = $request->file('images');
        foreach ($images as $image) {
            $apply = new Lesson_applyimages;
            $store_image = Storage::put('lesson-apply',  $image, 'public');
            $apply->image = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_image;
            $apply->apply_id = $lesson->id;
            $apply->save();
        }


        // 일정 최대 3개까지 가능! 
        for( $j=1; $j<4; $j++ ) {
            $date = $request->input('date'.$j);
            if( $date ) {
                if( $request->input('class') == '정규' ) { 
                    $total = $request->input('howmany_total');
                    for( $i=0; $i<$total; $i++ ) {
                        $schedule = new Lesson_applyschedule;
                        $schedule->schedule = $j;
                        $start_h = $request->input('start-hour' . $j);
                        $start_m = $request->input('start-minute' . $j);
                        $end_h = $request->input('end-hour' . $j);
                        $end_m = $request->input('end-minute' . $j);
                        $schedule->sub_schedule = $i+1;
                        $schedule->date = $date[$i];
                        $schedule->start_time = $start_h[$i] . ':' . $start_m[$i]*5;
                        $schedule->end_time = $end_h[$i] . ':' . $end_m[$i]*5;
                        $schedule->apply_id = $lesson->id;
                        $schedule->save();
                    }
                } else {
                    $schedule = new Lesson_applyschedule;
                    $schedule->schedule = $j;
                    $start_h = $request->input('start-hour' . $j);
                    $start_m = $request->input('start-minute' . $j);
                    $end_h = $request->input('end-hour' . $j);
                    $end_m = $request->input('end-minute' . $j);
                    $schedule->sub_schedule = 1;
                    $schedule->date = $date[0];
                    $schedule->start_time = $start_h[0] . ':' . $start_m[0]*5;
                    $schedule->end_time = $end_h[0] . ':' . $end_m[0]*5;
                    $schedule->apply_id = $lesson->id;
                    $schedule->save();
                }
            } 
        }
        
        return redirect('/lesson-complete');
    }


    public function playApplyStore(PlayApplyRequest $request) {
        $status = $request->input('status');
        $play = new Play_applies;
        $play->master_id = Server_userprofile::where('user_login_id', $request->master_email)->first()->id;
        $play->category = $request->input('category');
        $play->category_detail = $request->input('category-detail');
        $play->postcode = $request->input('postcode');
        $play->location = $request->input('location');
        $play->howmany_min = $request->input('howmany_min'); //숫자
        $play->howmany_max = $request->input('howmany_max'); //숫자
        $play->cost = $request->input('cost'); //숫자

        $play->play_name = $request->input('play-name');
        $play->play_intro = $request->input('play-intro');
        $play->play_ready = $request->input('play-ready');
        $etcs = $request->input('play-etc');
        $play->play_tag = $request->input('play-tag');
        $etc_text = '';
        foreach( $etcs as $etc ) {
            if( $etc_text == '' ) {
                $etc_text = $etc;
            } else {
                $etc_text = $etc_text . ' ' . $etc;
            }
        }
        $play->play_etc = $etc_text;
        $play->save();

        $images = $request->file('images');
        foreach ($images as $image) {
            $apply = new Play_applyimages;
            $store_image = Storage::put('play-apply',  $image, 'public');
            $apply->image = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_image;
            $apply->apply_id = $play->id;
            $apply->save();
        }

        // 일정 최대 3개까지 가능! 
        for( $j=1; $j<4; $j++ ) {
            $date = $request->input('date'.$j);
            if( $date ) {
                $schedule = new Play_applyschedule;
                $schedule->schedule = $j;
                $start_h = $request->input('start-hour' . $j);
                $start_m = $request->input('start-minute' . $j);
                $end_h = $request->input('end-hour' . $j);
                $end_m = $request->input('end-minute' . $j);

                $schedule->date = $date[0];
                $schedule->start_time = $start_h[0] . ':' . $start_m[0]*5;
                $schedule->end_time = $end_h[0] . ':' . $end_m[0]*5;
                $schedule->apply_id = $play->id;
                $schedule->save();
            } 
        }

        return redirect('/play-complete');
    }

    public function complete() {
        return view('form.masterForm3');
    }

}
