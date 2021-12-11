<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Enroll;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index() {
    //    dd(auth()->user()->student()->first()->id);
        
        if(auth()->user()->student()->exists()) {
            if($enroll = Enroll::checkHasPendingEnrollment()->first()) {
                // dd("wew");
                return view('pages.users.dashboard-status-pending', compact('enroll'));
            }
        }
        
        return view('pages.users.index');
    }

    public function personalInfoForm() {
        return view('pages.users.users-personal-info');
    }

    public function personalInfoStore(Request $request) {
    
        $request->validate([
            'profile_pic'            => 'required|mimes:jpeg,png,jpg|max:8192',
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'middleName'            => 'required|string',
            'gender'                 => 'required|string',
            'birthDate'              => 'required|date',
            'birthPlace'             => 'required|string',
            'nationality'             => 'required|string',
            'religion'             => 'required|string',
            'civilStatus'           => 'required|string',
            'fatherName'             => 'required|string',
            'fatherOccup'             => 'required|string',
            'fatherContact'             => 'numeric',
            'motherName'             => 'required|string',
            'motherOccup'             => 'required|string',
            'motherContact'             => 'numeric',
            'guardianName'          => 'string',
            'guardianContact'       => 'numeric',
            'barangay'             => 'required|string',
            'town'             => 'required|string',
            'province'             => 'required|string',
            'elemSchool'             => 'required|string',
            'elemSchlAddr'             => 'required|string',
            'elemYrAttnd'             => 'required|string',
            'secondarySchool'             => 'string',
            'secondarySchlAddr'             => 'string',
            'secondaryYrAttnd'             => 'string',
        ], [
            'profile_pic.max' => 'Image should be less than 8mb.',
        ]);

        $user = User::find(auth()->user()->id);
        $imageName = time() . $request->lastName.'.'.$request->profile_pic->extension(); 

        $user->profile_pic = $imageName;
        $user->save();

        $request->profile_pic->move(public_path('images'), $imageName);

        
        $student = Student::create([
            'user_id'           => auth()->user()->id,
            'firstName'         => $request->firstName,
            'lastName'          => $request->lastName,
            'middleName'        => $request->middleName,
            'gender'        => $request->gender,
            'birthDate'        => $request->birthDate,
            'birthPlace'        => $request->birthPlace,
            'nationality'        => $request->nationality,
            'religion'        => $request->religion,
            'civilStatus'        => $request->civilStatus, 
            'fatherName'        => $request->fatherName,
            'fatherOccup'        => $request->fatherOccup,
            'fatherContact'        => $request->fatherContact,
            'motherName'        => $request->motherName,
            'motherOccup'        => $request->motherOccup,
            'motherContact'        => $request->motherContact,
            'guardianName'        => $request->guardianName,
            'guardianContact'        => $request->guardianContact,
            'barangay'        => $request->barangay,
            'town'        => $request->town,
            'province'        => $request->province,
            'grade_LVL'        => $request->grade_LVL,
            'elemSchool'        => $request->elemSchool,
            'elemSchlAddr'        => $request->elemSchlAddr,
            'elemYrAttnd'        => $request->elemYrAttnd,
            'secondarySchool'        => $request->secondarySchool,
            'secondarySchlAddr'        => $request->secondarySchlAddr,
            'secondaryYrAttnd'        => $request->secondaryYrAttnd,
        ]);

        event(new UserLog("Filled up personal info form with ID#$student->id"));   

        return redirect()->route('user.dashboard');
    }

    public function stepOneEnrollment(Request $request) {
        
        $enrollment = $request->session()->get('enrollment');

        return view('pages.users.enrollment',compact('enrollment'));
    }

    public function stepOneEnrollmentStore(Request $request) {
       
        $request->validate([
            'level_id'              => 'required|numeric',
            'student_type'          => 'required|string',
            'track'                 => 'string|nullable',
            'strand'                => 'string|nullable',
        ]);

        $enrollment = $request->session()->get('enrollment');
        
        if(isset($request->requiredFile)) {
            $request->validate([
                'requiredFile.*'        => 'image|mimes:jpeg,png,jpg,svg|max:4096',
                'requiredFile'          => 'max:3',
            ], [
                'requiredFile.*.max' => 'Image should be less than 4mb.',
                'requiredFile.*.mimes' => 'Only jpeg, png, svg files are allowed.',
                'requiredFile.max' => 'A maximum of 3 images are allowed.',
                'requiredFile.image' => 'Only jpeg, png, svg files are allowed.',
            ]);
        }
        if(($request->student_type == 'New Student' || $request->student_type == 'Transferee') && !isset($enrollment->requirement_images)){
            $request->validate([
                'requiredFile'          => 'required',
                'title'                 => 'required|string',
                'remarks'               => 'required|string',
            ], [
                'requiredFile.required' => 'You must submit required documents.',
            ]);
        }
        if($request->level_id >= 5) {
            $request->validate([
                'track'                 => 'required',
                'strand'                => 'required',
            ]);
        }

        if(!isset($enrollment->requirement_images)) {
            if(isset($request->requiredFile)) {
                foreach($request->file('requiredFile') as $image){
                    // $rand = Str::random(10);
                    // $fileName = "requiredFile-$rand-" . time() . '.' . $image->getClientOriginalExtension();
                    $fileName = "requiredFile-" . $this->generateRandomString() . "id".auth()->user()->id . '.' . $image->getClientOriginalExtension();
                    // $image->move(public_path('requiredFileImgs'), $fileName);
                    $image->storeAs('temp', $fileName);
                    $data[] = $fileName;
                }
            }
        }

     
        if(empty($enrollment)){
            $enrollment = new Enroll();
            $enrollment->fill($request->except('requiredFile'));
            
            if($request->level_id < 5) {
                $enrollment->track = null;
                $enrollment->strand = null;
            } 
    
            if(!isset($enrollment->requirement_images) && isset($request->requiredFile)) $enrollment->requirement_images = json_encode($data);
            $request->session()->put('enrollment', $enrollment);
        }else{
            $enrollment = $request->session()->get('enrollment');
            $enrollment->fill($request->except('requiredFile'));
            if(!isset($enrollment->requirement_images) && isset($request->requiredFile)) $enrollment->requirement_images = json_encode($data);
            $request->session()->put('enrollment', $enrollment);
        }
        
        return redirect()->route('user.payment');
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function removeRequirementImage(Request $request) {
        $enrollment = $request->session()->get('enrollment');
        if(isset($enrollment->requirement_images)) {
            foreach(json_decode($enrollment->requirement_images) as $file) {           
                // $file_path = public_path("requiredFileImgs/$file");
                $file_path = storage_path("app/temp/$file");
                File::delete($file_path);
            }
            $enrollment->requirement_images = null;
        }
        return view('pages.users.enrollment',compact('enrollment'));
    }

    public function stepTwoEnrollment(Request $request) {
        $enrollment = $request->session()->get('enrollment');

        // dd($enrollment);
        return view('pages.users.payments',compact('enrollment'));
    }

    public function stepTwoEnrollmentStore(Request $request) {
       $request->validate([
            'payment_channel'       => 'required|string',
            'entrance_amount'       => 'required|numeric|max:10000',
        ]);
        $enrollment = $request->session()->get('enrollment');
        if(!isset($enrollment->payment_image)) {
            $request->validate([
                'payment_image'         => 'required|image|mimes:jpeg,png,jpg,svg|max:4096',
            ], [
                'payment_image.max'     => 'Image should be less than 4mb.',
                'payment_image.mimes'   => 'Only jpeg, png, svg files are allowed.',
                'payment_image.image'   => 'Only jpeg, png, svg files are allowed.',
                'payment_image.required'=> 'You must submit a snapshot of your payment.',
            ]);
        }

        if(isset($request->payment_image)) {
            $image = $request->payment_image;
            // $rand = Str::random(10);
            // $fileName = "paymentFile-$rand-" . time() . '.' . $image->getClientOriginalExtension();
            $fileName = "paymentFile-" . $this->generateRandomString() . "id".auth()->user()->id . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('requiredFileImgs'), $fileName);
            $image->storeAs('temp', $fileName);
        }

      
        $enrollment->fill($request->all());
        if(isset($request->payment_image)) $enrollment->payment_image = $fileName;
        $request->session()->put('enrollment', $enrollment);

        return redirect()->route('user.review-enrollment');
    }

    public function removePaymentImage(Request $request) {
        $enrollment = $request->session()->get('enrollment');
        if(isset($enrollment->payment_image)) {
            $file = $enrollment->payment_image;
            // $file_path = public_path("requiredFileImgs/$file");
            $file_path = storage_path("app/temp/$file");
            File::delete($file_path);
            $enrollment->payment_image = null;
        }
        return view('pages.users.payments',compact('enrollment'));
    }

    public function stepThreeEnrollment(Request $request) {
        $enrollment = $request->session()->get('enrollment');

        return view('pages.users.review-enrollment',compact('enrollment'));
    }

    public function stepThreeEnrollmentStore(Request $request) {
        $enrollment = $request->session()->get('enrollment');
        $enrollment->school_year_id = SchoolYear::currentYearAttr()->id;
        $enrollment->student_id = auth()->user()->student()->first()->id;
        $enrollment->status = 'Pending';
        foreach(json_decode($enrollment->requirement_images) as $file) {           
            File::move(storage_path("app/temp/$file"), storage_path("app/files/$file"));
        }

        $file = $enrollment->payment_image;
        File::move(storage_path("app/temp/$file"), storage_path("app/files/$file"));

        $enrollment->save();

        $request->session()->forget('enrollment');
        return redirect()->route('user.dashboard');
    }
}
