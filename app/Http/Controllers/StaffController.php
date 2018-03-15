<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Staff;
use App\User;
class StaffController extends Controller
{
	public function index(){
		$staffs = DB::table('staff')->get();
    return view('main.staffs.index', ['staffs' => $staffs]);
	}
    

    public function store(Request $request)

    {

        $this->validate($request, [
            'name' => 'required',
            'empno' => 'required',
            'empdate' => 'required',
            'email' => 'required',
            'phone' => 'required',
            
            

        ]);
         $user=new User;
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password=bcrypt('123456');
         $user->user_level=2;
         $user->save();

        // Create Staff
        $staff = new Staff;
        $staff->user_id = $user->id;
        $staff->name = $request->input('name');
        $staff->empno = $request->input('empno');
        $staff->empdate = $request->input('empdate');
        $staff->email = $request->input('email');
        $staff->phone = $request->input('phone');
        $staff->save();

        return redirect('main/staffs')
                ->with('success', 'Staff created');

            }
}
