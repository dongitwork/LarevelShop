<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends Controller
{
    //*************** CUSTOMER *****************
    public function getContact(){
        return view('pages.contact');
    }
    public function postContact(ContactRequest $request){
        $contact = new Contact();
        $contact->ContactName = $request->name;
        $contact->Email = $request->email;
        $contact->Title = $request->title;
        $contact->Content = $request->contact_content;
        $contact->Status = 0;
        $contact->CreatedAt = Carbon::now()->setTimezone('ICT')->toDateTimeString();
        $contact->save();
        return redirect()->back()->with('flash_message','CẢM ƠN BẠN ĐÃ LIÊN HỆ, CHÚNG TÔI SẼ TRẢ LỜI EMAIL CỦA BẠN SỚM NHẤT CÓ THỂ');
    }

    //*************** ADMIN *****************
    public function getListContact(){
        $Contact = Contact::all();
        return view('admin.pages.contact.list_contact',compact('Contact'));
    }
    public function getContactContent($id){
        $Contact = Contact::findOrFail($id);
        return view('admin.pages.contact.content_contact', compact('Contact'));
    }
    public function postContactContent(Request $request, $id){
        $this->validate($request,[
            'reply' => 'required',
        ],[
            'reply.required' => 'Bạn chưa nhập nội dung trả lời',
        ]);
        $Contact = Contact::findOrFail($id);
        $Contact->ReplyContent = $request->reply;
        $Contact->UserId = auth('admin')->user()->UserId;
        $Contact->Status = 1;
        $Contact->save();
        return redirect()->route('mail.sendReplyContact',$id);
    }
}
