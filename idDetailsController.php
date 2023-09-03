<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\IdCard;
use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;   
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;


class idDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('e_id')){
            return view('faculty.pages.idDetailsForm');
        }
        else {
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dt=Carbon::now()->format('Y-m-d');
        $arr = explode("-",$dt);
        $arr[0] = (string)((int)$arr[0] - 16);
        $dt =implode ( "-" , $arr );
        // return $dt;
        $yr=Carbon::now()->format('Y');
        $this->validate($request, [
            'user_photo' => 'nullable|max:1999',
            'email_id'=>'required|email',
            'mobile_no'=>'required|numeric|digits:10|unique:idcard',
            'residential_address'=>'required',
            'course'=>'required|regex:/^[A-Z. ]/i',
            'blood_group'=>'required',
            'date_of_birth'=> 'required|date_format:Y-m-d|before:'.$dt,
            'last_name'=>'required|alpha',
            'middle_name'=>'nullable|alpha',
            'first_name'=>'required|alpha', 
            // 'admission_year'=>'required|numeric|digits:4',
            'admission_year' => ['required', Rule::in([$yr]),],
         
            'dte_id'=>'alpha_num|size:10',
        ]);
        
        if(isset($request->user_photo)){
            // Get filename with the extension
            $filenameWithExt = $request->file('user_photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('user_photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            // $fileNameToStore= $request->user_photo;
            $path = $request->file('user_photo')->storeAs('public/student_idcard_photo', $fileNameToStore);
        } else {
            $fileNameToStore =null;
        }

    

        $students = new IdCard;
        $students->email_id=$request->input('email_id');
        $students->admission_year=$request->input('admission_year');
        $admissionTillYear = ((int)($students->admission_year)+1)%100;
        $students->admission_year = implode('-',array($students->admission_year,$admissionTillYear));
        $students->first_name=$request->input('first_name');
        $students->middle_name=$request->input('middle_name');
        $students->last_name=$request->input('last_name');
        $students->full_name=$request->input('full_name');
        $students->course=strtoupper($request->input('course'));
        $students->dte_id=strtoupper($request->input('dte_id'));
        // return $students->dte_id;
        $students->blood_group=$request->input('blood_group');
        // return $students->blood_group;
        $date_of_birth=$request->input('date_of_birth');
        $datedob=date("Y-m-d");
        $students->date_of_birth=$datedob; 
        $students->date_of_birth=$request->input('date_of_birth');
        $students->mobile_no=$request->input('mobile_no');
        $students->residential_address=$request->input('residential_address');
        // echo $fileNameToStore;
        $students->photo=$fileNameToStore;
        // return $students;
        $students->save();

        return redirect('/staff/idView')->with('success', 'Data added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show()
    {
        $students = IdCard::all();
        return view('faculty.pages.idView')->with('students',$students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($uid);
        return view('faculty.pages.editstudent')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}