<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Enroll;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $totalUsers = User::get()->count();
        $admins = User::where('role', 1)->get()->count();
        $adminsBarWidth = ($admins / $totalUsers) * 100;
        return view('pages.admins.index', compact('admins', 'adminsBarWidth'));
    }

    public function showUsers() {
        $users = User::orderByRaw('lastName,firstName')->get();
        return view('pages.admins.users', compact('users'));
    }

    public function viewUser(User $user) {
        return view('pages.admins.users-detail-view', compact('user'));
    }    

    public function storeUser(Request $request) {
        
        $request->validate([
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'middleName'            => 'required|string',
            'email'                 => 'required|email|unique:users',
            'username'              => 'required|string|unique:users',
            'contactNo'             => 'required|numeric|regex:/(09)[0-9]{9}/',
            'password'              => 'required|string|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|string|min:8',
        ]);

        $token = Str::random(24);

        $user = User::create([
            'firstName'         => $request->firstName,
            'lastName'          => $request->lastName,
            'middleName'        => $request->middleName,
            'email'             => $request->email,
            'contactNo'         => $request->contactNo,
            'username'          => $request->username,
            'password'          => bcrypt($request->password),
            'role'              => $request->role,
            'remember_token'    => $token,
        ]);

        return redirect()->route('admin.users')->with('Message', 'User has been successfully created.');
        
    }


    public function updateUser(Request $request) {

        $request->validate([
            'id'                    => 'required|numeric',
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'middleName'            => 'required|string',
            'email'                 => 'required|email|unique:users,email,'.$request->id,
            'username'              => 'required|string|unique:users,username,'.$request->id,
            'contactNo'             => 'required|numeric|regex:/(09)[0-9]{9}/',
            'role'                  => 'required|numeric',
        ]);
        $user = User::find($request->id);

        if(empty($request->get('password'))) $user->update($request->except('password'));
        else {
            $request->merge([
                'password' => bcrypt($request->password),
            ]);
            $user->update($request->all());
        }
        
        event(new UserLog("Updated user with ID#$user->id"));   
    
        return redirect()->route('admin.users')->with('Message', "User [ID #$request->id] has been successfully updated.");
    }

    public function deleteUser(Request $request) {
        $user = User::find($request->id);
        $id = $request->id;
        $user->delete();

        return redirect()->route('admin.users')->with('Message', "User [ID #$id] has been successfully deleted.");
    }

    public function showStudents() {
        $students = Student::orderByRaw('lastName,firstName')->get();
        return view('pages.admins.students', compact('students'));
    }

    public function viewstudent(Student $student) {
        return view('pages.admins.students-detail-view', compact('student'));
    } 

    public function createStudent() {
        return view('pages.admins.student-create');
    }

    public function storeStudent(Request $request) {
        $request->validate([
            'user_id'               => 'required|numeric',
            'profile_pic'           => 'mimes:jpeg,png,jpg',
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'middleName'            => 'required|string',
            'gender'                 => 'required|string',
            'birthDate'              => 'required|date',
            'birthPlace'             => 'required|string',
            'nationality'            => 'required|string',
            'religion'              => 'required|string',
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
            'grade_LVL'          => 'required|string',
            'elemSchool'             => 'required|string',
            'elemSchlAddr'             => 'required|string',
            'elemYrAttnd'             => 'required|string',
            'secondarySchool'             => 'string',
            'secondarySchlAddr'             => 'string',
            'secondaryYrAttnd'             => 'string',
        ]);

        if(!empty($request->profile_pic)) {
            $user = User::find($request->user_id);
            $imageName = time() . $request->lastName.'.'.$request->profile_pic->extension(); 
    
            $user->profile_pic = $imageName;
            $user->save();
    
            $request->profile_pic->move(public_path('images'), $imageName);
        }
        
        $student = Student::create([
            'user_id'           => $request->user_id,
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

        return redirect()->route('admin.students')->with('Message', 'Student has been successfully created.');
    }


    public function editStudent(Student $student) {
        return view('pages.admins.student-edit', compact('student'));
    }

    public function updateStudent(Student $student, Request $request) {
        $request->validate([
            'profile_pic'                 => 'mimes:jpeg,png,jpg',
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
            'grade_LVL'          => 'required|string',
            'elemSchool'             => 'required|string',
            'elemSchlAddr'             => 'required|string',
            'elemYrAttnd'             => 'required|string',
            'secondarySchool'             => 'string',
            'secondarySchlAddr'             => 'string',
            'secondaryYrAttnd'             => 'string',
        ]);

        if(!empty($request->profile_pic)) {
            $user = User::find($student->user->id);
            $imageName = time() . $request->lastName.'.'.$request->profile_pic->extension(); 
    
            $user->profile_pic = $imageName;
            $user->save();
    
            $request->profile_pic->move(public_path('images'), $imageName);
        }
        
        $student->update($request->all());

        return redirect()->route('admin.students')->with('Message', "Student [ID #$student->id] has been successfully updated.");
    }


    public function deleteStudent(Request $request) {
        $student = Student::find($request->id);
        $id = $request->id;
        $student->delete();

        return redirect()->route('admin.students')->with('Message', "Student [ID #$id] has been successfully deleted.");
    }


    public function showTeachers() {
        $teachers = Teacher::orderByRaw('lastName,firstName')->get();
        return view('pages.admins.teachers', compact('teachers'));
    }

    public function storeTeacher(Request $request) {
        $request->validate([
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'subj_teaching'         => 'string',
            'contactNo'             => 'numeric|regex:/(09)[0-9]{9}/',
        ]);


        $teacher = Teacher::create([
            'firstName'         => $request->firstName,
            'lastName'          => $request->lastName,
            'subj_teaching'     => $request->subj_teaching,
            'contactNo'         => $request->contactNo,
        ]);

        return redirect()->route('admin.teachers')->with('Message', 'Teacher has been successfully created.');
        
    }


    public function updateTeacher(Request $request) {
        $request->validate([
            'id'                    => 'required|numeric',
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'subj_teaching'         => 'string',
            'contactNo'             => 'numeric|regex:/(09)[0-9]{9}/',
        ]);
        $teacher = Teacher::find($request->id);

        $teacher->update($request->all());
        
        return redirect()->route('admin.teachers')->with('Message', "Teacher [ID #$request->id] has been successfully updated.");
    }


    public function deleteTeacher(Request $request) {
        $teacher = Teacher::find($request->id);
        $id = $request->id;
        $teacher->delete();

        return redirect()->route('admin.teachers')->with('Message', "Teacher [ID #$id] has been successfully deleted.");
    }


    public function showSubjects() {
        $subjects = Subject::orderBy('subjectName')->get();
        return view('pages.admins.subjects', compact('subjects'));
    }

    public function storeSubject(Request $request) {
        $request->validate([
            'subjectName'             => 'required|string',
            'subjectDescription'      => 'required|string',
        ]);

        $subject = Subject::create([
            'subjectName'         => $request->subjectName,
            'subjectDescription'  => $request->subjectDescription,
        ]);

        return redirect()->route('admin.subjects')->with('Message', "Subject ($subject->subjectName) has been successfully created.");
    }


    public function updateSubject(Request $request) {
        $request->validate([
            'id'                      => 'required|numeric',
            'subjectName'             => 'required|string',
            'subjectDescription'      => 'required|string',
        ]);

        $subject = Subject::find($request->id);

        $subject->update($request->all());

        return redirect()->route('admin.subjects')->with('Message', "Subject [ID #$request->id] has been successfully updated.");
    }

    public function deleteSubject(Request $request) {
        $subject = Subject::find($request->id);
        $id = $request->id;
        $subject->delete();

        return redirect()->route('admin.subjects')->with('Message', "Subject [ID #$id] has been successfully deleted.");
    }

    public function showSections() {
        $sections = Section::get();
        return view('pages.admins.sections', compact('sections'));
    }

    public function storeSection(Request $request) {
        $request->validate([
            'name'          => 'required|string',
            'room'          => 'required|string',
            'teacher_id'    => 'required|numeric',
            'level_id'      => 'required|numeric',
        ]);

        $section = Section::create([
            'name'          => $request->name,
            'room'          => $request->room,
            'teacher_id'    => $request->teacher_id,
            'level_id'      => $request->level_id
        ]);

        return redirect()->route('admin.sections')->with('Message', "Section ($section->name) has been successfully created.");
    }


    public function updateSection(Request $request) {
        $request->validate([
            'id'            => 'required|numeric',
            'name'          => 'required|string',
            'room'          => 'required|string',
            'teacher_id'    => 'required|numeric',
            'level_id'      => 'required|numeric',
        ]);

        $section = Section::find($request->id);

        $section->update($request->all());

        return redirect()->route('admin.sections')->with('Message', "Section ($section->name) has been successfully updated.");
    }

    public function deleteSection(Request $request) {
        $section = Section::find($request->id);
        $name = $section->name;
        $section->delete();

        return redirect()->route('admin.sections')->with('Message', "Section ($name) has been successfully deleted.");
    }

    public function showClasses() {
        $classes = Session::get();
        return view('pages.admins.classes', compact('classes'));
    }

    public function storeClass(Request $request) {
        $request->validate([
            'teacher_id'    => 'required|numeric',
            'subject_id'    => 'required|numeric',
            'schedule'      => 'required|string',
            'time'          => 'required|string',
           
        ]);

        $class = Session::create([
            'teacher_id'    => $request->teacher_id,
            'subject_id'    => $request->subject_id,
            'schedDay'      => $request->schedule,
            'schedTime'     => $request->time,
        ]);

        return redirect()->route('admin.classes')->with('Message', "Class has been successfully created.");
    }

    public function updateClass(Request $request) {
        $request->validate([
            'id'            => 'required|numeric',
            'teacher_id'    => 'required|numeric',
            'subject_id'    => 'required|numeric',
            'schedDay'      => 'required|string',
            'schedTime'     => 'required|string',
        ]);

        $class = Session::find($request->id);

        $class->update($request->all());

        return redirect()->route('admin.classes')->with('Message', "Class [ID #$request->id] has been successfully updated.");
    }

    public function deleteClass(Request $request) {
        $class = Session::find($request->id);
        $id = $request->id;
        $class->delete();

        return redirect()->route('admin.classes')->with('Message', "Section [ID #$id] has been successfully deleted.");
    }

    public function showSchoolYear() {
        $schoolyears = SchoolYear::get();
        return view('pages.admins.schoolyear', compact('schoolyears'));
    }

    public function storeSchoolYear(Request $request) {
        $request->validate([
            'schoolYr_started'      => 'required|numeric|min:2000|max:2100',
            'schoolYr_ended'        => 'required|numeric|min:2000|max:2100|gt:schoolYr_started'
        ]);

        $schoolyear = SchoolYear::create([
            'schoolYr_started'    => $request->schoolYr_started,
            'schoolYr_ended'      => $request->schoolYr_ended,
            'status'              => 'inactive'
        ]);

        return redirect()->route('admin.schoolyear')->with('Message', "School Year has been successfully created.");
    }

    public function updateSchoolYear(Request $request) {
        $request->validate([
            'id'    => 'required|numeric',
        ]);

        $schoolyear = SchoolYear::find($request->id);

        $schoolyear->status = 'active';
        $schoolyear->save();
        SchoolYear::where('id', '!=', $request->id)->update(['status' => 'inactive']);;

        return redirect()->route('admin.schoolyear')->with('Message', "$schoolyear->schoolYr_started - $schoolyear->schoolYr_ended has been set as current school year.");
    }

    public function deleteSchoolYear(Request $request) {
        $schoolyear = SchoolYear::find($request->id);
        $sy_temp = $schoolyear->schoolYr_started . ' - ' . $schoolyear->schoolYr_ended;
        $schoolyear->delete();

        return redirect()->route('admin.schoolyear')->with('Message', "School Year $sy_temp has been successfully deleted.");
    }

    public function showEnrolees() {
        $enrolees = Enroll::where('status', 'Pending')->orderBy('created_at')->get();

        return view('pages.admins.enrolees', compact('enrolees'));
    }

    public function viewEnrolee(Enroll $enrolee) {
        return view('pages.admins.view-enrolee', compact('enrolee'));
    }

    public function setApprovedEnrolee(Enroll $enrolee) {
        $classes = Session::all();
        return view('pages.admins.approved-enrolee', compact('enrolee', 'classes'));
    }
}
