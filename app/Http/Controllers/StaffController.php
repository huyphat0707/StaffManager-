<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\staff;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Lấy danh sách nhân viên từ database
	$getData = DB::table('staff')->select('id','name','email', 'age')->get();
	
	//Gọi đến file list.blade.php trong thư mục "resources/views/staff" với giá trị gửi đi tên listnhanvien = $getData
	return view('staff.list')->with('listStaff',$getData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //Them moi nhân viên
	//Set timezone
	date_default_timezone_set("Asia/Bangkok");
	
	//Lấy giá trị nhân viên đã nhập
	$allRequest  = $request->all();
	$name  = $allRequest['name'];
    $email = $allRequest['email'];
    $age = $allRequest['age'];

	
	//Gán giá trị vào array
	$dataInsertToDatabase = array(
		'name'  => $name,
        'email' => $email,
        'age' => $age,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s'),
	);
     $request->validate([
        'name' => 'required|unique:staff|max:64',
        'email' => 'required|unique:staff|max:255',
        'age' => 'required|min:0|max:100',
    ]);
            //Insert vào bảng staff
            $insertData = DB::table('staff')->insert($dataInsertToDatabase);
        if ($insertData) {
            Session::flash('success', 'Thêm mới nhân viên thành công!');
        }else {                        
            Session::flash('error', 'Thêm thất bại!');
        }
    
	
	
	//Thực hiện chuyển trang
	return redirect('staff/create');
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
        //
        $data= staff::find($id);

    //     $getData = DB::table('staff')->select('id','name','email','age')->where('id',$id)->get();
	
	// //Gọi đến file edit.blade.php trong thư mục "resources/views/staff" với giá trị gửi đi tên getStaffById = $getData
    return view('staff.edit',['getStaffById'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id= $request->id;
        $data= staff::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->age=$request->age;
        $data->save();
        return redirect()->route('list');


        //
        //Cap nhat sua hoc sinh
	//Set timezone
	date_default_timezone_set("Asia/Bangkok");	
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
        //Xoa nhan vien 
	//Thực hiện câu lệnh xóa với giá trị id = $id trả về
	$deleteData = DB::table('staff')->where('id', '=', $id)->delete();
	
	//Kiểm tra lệnh delete để trả về một thông báo
	if ($deleteData) {
		Session::flash('success', 'Xóa nhân viên thành công!');
	}else {                        
		Session::flash('error', 'Xóa thất bại!');
	}
	
	//Thực hiện chuyển trang
	return redirect('staff');
    }
}
