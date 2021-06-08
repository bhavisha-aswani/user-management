<?php

namespace App\Http\Controllers;

use App\Employee;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Employee::latest()->paginate(5);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'joining_date' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            ]);
        //status "on" & 1 for current working employee
        //status "off" & 0 for ex-employee
        
        if($request->status == "on"){
            $date=\Carbon\Carbon::now()->format('Y-m-d');
            $status='1';
        }
        else
        {
            $date=$request->leaving_date;
            $status='0';
        }

        if($request->hasfile('image'))
        {
        $destination_path='public/image';
        $image=$request->file('image');
        $image_name=$image->getClientOriginalName();
        $path= $request->file('image')->storeAs( $destination_path,$image_name);
        }

        $user=new Employee;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->joining_date=$request->joining_date;
        $user->leaving_date=$date;
        $user->status=$status;
        $user->image=$image_name;
        $user->save();
        return redirect('/user')->with('success','user Added successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
    public function destroy(Request $user)
    { 
        $delete = Employee::find($user->id)->delete();
        return redirect('/')->with('success','User deleted successfully');
    }
}
