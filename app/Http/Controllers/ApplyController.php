<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masterapplies; 
use App\Applycategory;
use App\Applydate;
use App\Applylocation;
use App\Server_userprofile;

class ApplyController extends Controller
{
    
    public function masterAgree(Request $request)
    {
        $agree1 = $request->input('agree1');
        $agree2 = $request->input('agree2');
        $agree3 = $request->input('agree3');

        if( $agree1 == 'on' && $agree2 == 'on' && $agree3 == 'on' ) {
            return view('form.masterForm2');
        } else {
            return back();
        }
    }
    
    public function masterApplyStore(Request $request)
    {
        $apply = new Masterapplies($request->all());

        // $apply = new Masterapplies;
        // $apply->email = $request->input('email');
        // $apply->name = $request->input('name');
        // $apply->phone = $request->input('phone');
        // $birth = $request->input('birth');
        // $apply->birth = $birth;
        // $apply->gender = $request->input('gender');
        // $apply->career = $request->input('career');
        $gender = $request->input('gender');
        if( $gender == '남자' ) {
            $apply->gender = 'M';
        } else {
            $apply->gender = 'F';
        }
        $mail = $request->input('mail01');
        $apply->mail = $mail;

        $year = $request->input('birth1');
        $month = $request->input('birth2');
        $date = $request->input('birth3');
        $apply->birthday = $year . $month . $date; 

        if( $request->file('business_docu') != null ) { 
            $business = $request->file('business_docu');
            $business_name = $business->getClientOriginalName();
            $apply->business_name = $business_name;
            $store_business = Storage::put('master-apply', $business, 'public');
            $apply->business_docu = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_business;
        }

        if( $request->file('sale_docu') != null ) { 
            $sale = $request->file('sale_docu');
            $sale_name = $sale->getClientOriginalName();
            $apply->sale_name = $sale_name;
            $store_sale = Storage::put('master-apply', $sale, 'public');
            $apply->sale_docu = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_sale;
        }
        
        $bankbook = $request->file('bankbook');
        $bank_name = $bankbook->getClientOriginalName();
        $apply->bankbook_name = $bank_name;
        $store_bank = Storage::put('master-apply', $bankbook, 'public');
        $apply->bankbook = 'https://s3.ap-northeast-2.amazonaws.com/immaster/' . $store_bank;

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

        for( $i=1; $i<4; $i++ ) {
            $category = $request->input('category'.$i);
            if( $category != null ) {
                $category_detail = $request->input('category-detail'.$i);
                $master_category = new Applycategory;
                $master_category->master_id = $apply->id;
                $master_category->category = $category;
                $master_category->category_detail = $category_detail;
                $master_category->save();
            }
            
            $location = $request->input('location'.$i);
            if( $location != null ) {
                $location_detail = $request->input('location2'.$i);
                $master_location = new Applylocation;
                $master_location->master_id = $apply->id;
                $master_location->location = $location;
                $master_location->location_detail = $location_detail;
                $master_location->save();
            }
        }

        $master_date = new Applydate;
        $day = $request->input('date');
        $time = $request->input('date2');
        $master_date->master_id = $apply->id;
        $master_date->day = $day;
        $master_date->time = $time;
        $master_date->save();


    }


    public function confirmMaster(Request $request) {
        $email = $request->input('email');
        $name = $request->input('name');
        $status = $request->input('status'); //play or lesson 

        //email & name에 validation 처리할 것 
        $user = Server_userprofile::where('user_login_id', $email)->where('user_name', $name)->first();
        if( $user != null ) {
            
            if( $status == 'play') {
                return view('form.palyForm');
            } else {
                return view('form.lessonForm');
            }
            
        } else {
            // 일치하는 이메일 혹은 이름이 없습니다. 
            return back();
        }
    }


    public function playApplyStore(Request $request) {
        $status = $request->input('status');


        return view('form.complete')->with('status', $status);
    }

    public function lessonApplyStore(Request $request) {
        $status = $request->input('status');


        return view('form.complete')->with('status', $status);
    }

}
