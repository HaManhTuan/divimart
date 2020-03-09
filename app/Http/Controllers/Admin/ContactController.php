<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Contact;

class ContactController extends Controller
{
  public function view()
  {
    $dataContact = Contact::orderBy('created_at','ASC')->get();
    return view('admin.contact.list',compact('dataContact',$dataContact));
  }
  public function openmodal(Request $req){
    $contactDetail = Contact::find($req->id);
      $data = '<div class="row">
      <div class="col-md-3">
            <div class="form-group mb-3">
                <label for="category_name_input" class="control-label">Tên <font color="#a94442">(*)</font></label>
                <input type="text" class="form-control" id="name_edit" name="name" value="'.$contactDetail->name.'" readonly />
            </div>
      </div>
      <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="category_name_input" class="control-label">Tiêu đề <font color="#a94442">(*)</font></label>
                <input type="text" class="form-control" id="name_edit" name="name" value="'.$contactDetail->subject.'" readonly />
            </div>
      </div>
      <div class="col-md-3">
          <div class="form-group mb-3">
                <label for="category_name_input" class="control-label">Email <font color="#a94442">(*)</font></label>
                <input type="text" class="form-control" id="name_edit" name="name" value="'.$contactDetail->email.'" readonly />
            </div>
      </div>

      </div>
            <div class="form-group mb-3">
                <label for="category_name_input" class="control-label">Nội dung <font color="#a94442">(*)</font></label>
                <textarea rows="5" class="form-control" readonly>'.$contactDetail->content.'</textarea>
            </div>
            ';
                $msg = array(
      'category_name'  => $contactDetail->name,
      'body'           => $data
    );

    return json_encode($msg);
               
  }
}
