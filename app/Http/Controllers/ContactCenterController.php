<?php
namespace App\Http\Controllers;

use App\Branch;
use App\ContactCenter;
use App\ContactCenterLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactCenterController extends Controller {

    public function index() {
        return view('contact-center.manager');
    }

    public function getData(){
        $result = [];
        $contacts = ContactCenter::all();
        foreach ($contacts as $contact){
            $result[] = [
                'id' => $contact->id,
                'name' => $contact->name,
                'original' => $contact->name,
                'editMode' => false,
                'deleteText' => false,
                'deleted' => false,
                'labels' => $contact->getLabels()
            ];
        }
        return response()->json([
            'success' => true,
            'data' => $result
        ]);
    }

    public function setData(Request $request){
        $contactsData = $request->texts;
        foreach ($contactsData as $contacts){
            if ($contacts['name'] !== $contacts['original'] || $contacts['id'] === null)
                $this->setContact($contacts['id'], $contacts['name']);
            if($contacts['deleted'] && $contacts['id'] !== null)
                $this->deleteContact($contacts['id']);
            foreach ($contacts['labels'] as $contact){
                if ($contact['text'] !== $contact['original'] || $contact['id'] === null)
                    $this->setDocument($contact['id'], $contact['text'], $contacts['id']);
                if ($contact['deleted'] && $contact['id'] !== null)
                    $this->deleteDocument($contact['id']);
            }
        }
        return response()->json([
            'success' => true
        ]);
    }

    public function setDocument($id, $text, $parent){
        $contact = ContactCenterLabel::findOrNew($id);
        $contact->parent_id = $parent;
        $contact->text = $text;
        $contact->save();
    }
    public function setContact(&$id, $name){
        $contact = ContactCenter::findOrNew($id);
        $contact->name = $name;
        $contact->save();
        $id = $contact->id;
    }
    public function deleteDocument($id){
        $contact = ContactCenterLabel::find($id);
        if($contact !== null)
            $contact->delete();
    }
    public function deleteContact($id){
        $contact = ContactCenter::find($id);
        if($contact !== null)
            $contact->delete();
    }
}
