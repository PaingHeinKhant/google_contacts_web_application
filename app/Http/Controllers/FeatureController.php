<?php

namespace App\Http\Controllers;

use App\Exports\ExportContact;
use App\Imports\ImportContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class FeatureController extends Controller
{
    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
//        return $request;
        Excel::import(new ImportContact,
            $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function export($export_id){

        return Excel::download(new ExportContact, 'contact.xlsx');
    }

    //Export all
    public function exportAll(Request $request){

        return Excel::download(new ExportContact, 'contacts.xlsx');
    }

    //multiple Export
    public function multipleExport(Request $request){

//        return $request;
        $contacts = Contact::whereIn('id',$request->multipleFormCheck)->get();

        return $contacts;

        (new InvoicesExport(2018))->download('invoices.xlsx');

        return redirect()->route('contact.index');
    }


    //multiple Destroy
    public function multipleDestroy(Request $request){
//        return $request;
        Contact::destroy(collect($request->multipleFormCheck));
        return redirect()->route('contact.index');
    }

    //duplicate contact
    public function duplicate($duplicate_id){

        $task = Contact::findOrFail($duplicate_id);
        $new_task = $task->replicate();
        $new_task->created_at = Carbon::now();
        $new_task->save();

        return redirect()->route('contact.index')->with('status', $new_task->firstName .' is Duplicate Successfully' );
    }

    //multipleDuplicate contact
    public function multipleDuplicate(Request $request){

        $contacts = Contact::whereIn('id',$request->multipleFormCheck)->get();
        foreach ($contacts as $contact){
            $new_task = $contact->replicate();
            $new_task->created_at = Carbon::now();
            $new_task->save();
        }

        return redirect()->route('contact.index');
    }

}
