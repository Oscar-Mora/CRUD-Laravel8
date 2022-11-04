<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // public function index(){
    //     return view('contacts.index',[
    //         'contacts'=>Contact::latest()->orderBy('id')->paginate()
    //     ]);
    // }
   
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);

    }
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Contact $contact)
    // {
    //     return view('contacts.create',['contact'=>$contact]);
    // }


    public function store(Request $request){

       return Contact::create($request->form);
    }



    public function edit (Request $request, $contact_id){   
        return Contact::find($contact_id);
    }


    public function update (Request $request){   
        
        // dd($request->contact);
        $contact=Contact::where('id',$request->contact['id'])->update($request->contact);
        return response()->json(['contact_id' => $contact]);
        
        

    }

    public function destroy(Request $request, $contact_id){

        $contact = Contact::find($contact_id);
        // dd($contact->toArray());
        $confirmacion_de_eliminacion = $contact->delete();
        
        return $confirmacion_de_eliminacion;
     
        // if(isset($contact_id)){
        // return Contact::where('id',$request->contact['id'])
        // ->delete($request->contact);}
        
        
    }
    
}
