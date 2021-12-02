<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AppConst;

class UserManageController extends Controller
{
    public function index()
    {
        // Hiện thông tin của người dùng nhưng không hiện thằng Admin hiện tại
        $users = User::where('id', '!=', auth()->user()->id)->paginate(AppConst::DEFAULT_PER_PAGE);
        return view('admin.user.list')->with('users', $users);
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
        //
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
    // Khóa tài khoản
    public function blockUser(Request $request, User $user){
        $user->blocked=true;
        $user->save();
        return redirect()->route('admin.manageUser');
    }
    // Mở khóa tài khoản
    public function unblockUser(Request $request, User $user){
        $user->blocked=false;
        $user->save();
        return redirect()->route('admin.manageUser');
    }

}
