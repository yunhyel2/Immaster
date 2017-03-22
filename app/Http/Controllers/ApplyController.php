<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Masterapplies; 
use App\Applycategory;
use App\Applydate;
use App\Applylocation;
use App\Server_userprofile;
use App\Server_lessoncategorycode;

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
        // $request = $request->except(['_method', '_token']);
        // $apply = new Masterapplies($request);

        $apply = new Masterapplies;
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

        // for( $i=1; $i<4; $i++ ) {
            $category = $request->input('category');
            $category_id = Server_lessoncategorycode::where('category', $category)->first()->id;
            // if( $category != null ) {
                $category_detail = $request->input('category-detail');
                $master_category = new Applycategory;
                $master_category->apply_id = $apply->id;
                $master_category->category = $category_id;
                $master_category->category_detail = $category_detail;
                $master_category->save();
            // }
            
            $location = $request->input('location');
            // if( $location != null ) {
                $location_detail = $request->input('location2');
                $master_location = new Applylocation;
                $master_location->apply_id = $apply->id;
                $master_location->location = $location;
                $master_location->location_detail = $location_detail;
                $master_location->save();
            // }
        // }

        $master_date = new Applydate;
        $day = $request->input('date');
        $time = $request->input('date2');
        $master_date->apply_id = $apply->id;
        $master_date->day = $day;
        $master_date->time = $time;
        $master_date->save();

        return redirect('/');
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
