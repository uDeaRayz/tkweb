<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;
use App\AddLeave;
use DB;

class PositionController extends Controller
{


    public function index()
    {
        

        $position = position::all();
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('position.position', compact('position','data'));
        
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $post = new position;
        $post->post_name = $request->post_name;
        $post->save();
        return redirect('position')->with('add', 'เพิ่มตำแหน่งเรียบร้อย');

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
        $position = position::find($id);
        $position->delete();
        return redirect('position')->with('del', 'ลบข้อมูลเรียบร้อย');
    }

    public function fix(Request $request){
        DB::table('positions')
            ->where('post_id', $request->post_id)
            ->update([
                'post_name' => $request['post_name'],
        ]);
        return redirect('position')->with('update', 'แก้ไขข้อมูลเรียบร้อย');
    }
}
