<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Order;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function data_manage() {

        return view('admin.data-manege', [
            'message' => Message::orderBy('id', 'desc')->get(),
        ]);
    }

    public function siteSetting() {

        return view('admin.siteSetting', [
            'site'    => SiteSetting::first(),
            'message' => Message::orderBy('id', 'desc')->get(),
        ]);
    }

    public function orders() {
        $data = [];

        $data['orders'] = Order::orderBy('id', 'desc')->get();

        return view('admin.order', $data);
    }

    public function message($id) {
        $message = Message::orderBy('id', 'desc')->get();

        return view('admin.message', [

            'site'       => SiteSetting::first(),
            'message'    => $message,
            'message_id' => Message::where('id', $id)->first(),
        ]);
    }

    public function delete_message(Request $request) {

        $message_id5 = Message::find($request->id);
        $message_id5->delete();

        return redirect()->back()->with('message1', ' Message delete successfully !!');

    }

    public function message1(Request $request) {

        $add_message          = new Message();
        $add_message->fname   = $request->fname;
        $add_message->lname   = $request->lname;
        $add_message->email   = $request->email;
        $add_message->phone   = $request->phone;
        $add_message->message = $request->message;
        $add_message->save();
        toastr()->success('Your message has been send successfully!');

        return redirect()->back()->with('message', 'Your Message Send successfully !!');

    }

}
