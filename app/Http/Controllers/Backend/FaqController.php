<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    Public function Index(){
        $faqs = Faq::latest()->get();
        return view('admin.faq.index',compact('faqs'));
    }

    public function AddFaq(){
        return view('admin.faq.add');
    }

    public function SaveFaq(Request $request){


    Faq::insert([
        'question' => $request->question,
        'answer' => $request->answer,
    ]);

    $notification = array(
        'message' => 'Ajouté avec succès',
        'alert-type' => 'success'
    );

    return redirect()->route('admin.faq.index')->with($notification);
    }

    public function EditFaq($id){
        $faqs = Faq::findOrFail($id);
        return view('admin.faq.edit',compact('faqs'));
    }

    public function UpdateFaq(Request $request){

        $faq_id = $request->id;


            Faq::findOrFail($faq_id)->update([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);

            $notification = array(
                'message' => 'Mise à jour avec succès',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.faq.index')->with($notification);

        }
    

    public function DeleteFaq($id){
        
        Faq::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supprimé avec succès',
            'alert-type' => 'warning'
        );

        return redirect()->route('admin.faq.index')->with($notification);
    }

}
