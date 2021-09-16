<?php
namespace App\Http\Controllers;

use App\Contact;
use App\ContactCenter;
use App\ContactCenterLabel;
use Debugbar;
use Illuminate\Http\Request;

class ContactCenterController extends Controller {

    public function index() {
        $names = Contact::select('*')->where('parent_id', '0')->get();
//        dd($names);
        $result = [];
        $webId = 1;
        foreach ($names as $name) {
            array_push($result, [
                'id' => $name->id,
                'parent_id' => $name->parent_id,
                'name' => $name->name,
                'web_id' => $webId++,
                'child' => $this->getNamesChild($name->id),
            ]);
        }
//        dd($result);
//        return $result;
        return view('contact-center.manager', compact('result'));
    }

    public function getNames() {
        $names = Contact::select('*')->where('parent_id', '0')->get();
        $result = [];
        foreach ($names as $name) {
            array_push($result, [
                'id' => $name->id,
                'parent_id' => $name->parent_id,
                'name' => $name->name,
                'child' => $this->getNamesChild($name->id),
            ]);
        }
//        dd($result);
        return $result;
    }

    public function getNamesChild($id) {
        $names = Contact::select('*')->where('parent_id', $id)->get();
        $result = [];
        $webId = 1;
        if(count($names) === 0){
            return $result;
        }
        foreach ($names as $name) {
            array_push($result, [
                'id' => $name->id,
                'parent_id' => $name->parent_id,
                'name' => $name->name,
                'web_id' => $webId++,
                'child' => $this->getNamesChild($name->id),
            ]);
        }
        return $result;
    }

    public function getData(Request $request){
        $result = [];
        $contacts = ContactCenter::where('name_id', $request->id)->get();
        foreach ($contacts as $contact){
            $result[] = [
                'id' => $contact->id,
                'name' => $contact->name,
                'name_id' => $contact->name_id,
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
        foreach ($contactsData as $key => &$contacts){
            if ($contacts['name'] !== $contacts['original'] || $contacts['id'] === null){
                $id = $this->setContact($contacts['id'], $contacts['name'], $contacts['name_id']);
                $contacts['id'] = $id;
                $contacts['original'] = $contacts['name'];
            }
            if($contacts['deleted'] && $contacts['id'] !== null){
                $this->deleteContact($contacts['id']);
                unset($contacts);
            }
            foreach ($contacts['labels'] as $contactKey => &$contact){
                if ($contact['text'] !== $contact['original'] || $contact['id'] === null){
                    $cId = $this->setDocument($contact['id'], $contact['text'], $contacts['id']);
                    $contact['id'] = $cId;
                    $contact['original'] = $contact['text'];
                }
                if ($contact['deleted'] && $contact['id'] !== null){
                    $this->deleteDocument($contact['id']);
                    unset($contacts[$contactKey]);
                }
            }
        }
        return response()->json([
            'success' => true,
            'data' => $contactsData
        ]);
    }

    public function setDocument($id, $text, $parent){
        $contact = ContactCenterLabel::findOrNew($id);
        $contact->parent_id = $parent;
        $contact->text = $text;
        $contact->save();
        return $contact->id;
    }
    public function setContact($id, $name, $name_id){
        $contact = ContactCenter::findOrNew($id);
        $contact->name = $name;
        $contact->name_id = $name_id;
        $contact->save();
        return $contact->id;
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
    public function deleteField(Request $request){
        if(isset($request->id) && !empty($request->id)){
            $contactLabel = ContactCenterLabel::where('parent_id', $request->id)->first();
            if($contactLabel !== null)
                $contactLabel->delete();
            $contact = ContactCenter::where('id', $request->id)->first();
            if($contact !== null)
                $contact->delete();
        } else if(isset($request->idLabel) && !empty($request->idLabel)){
            $contactLabel = ContactCenterLabel::where('id', $request->idLabel)->first();
            if($contactLabel !== null)
                $contactLabel->delete();
        } else{
            return response()->json([
                'success' => false
            ]);
        }
        return response()->json([
            'success' => true
        ]);
    }

    public function approveRow(Request $request){
//        dd($request);
        if(isset($request->id)){
            $contact = Contact::where('id', $request->id)->first();
            $contact->parent_id = $request->parentId;
            $contact->name = $request->name;
//        dd($contact);
            $contact->save();
            $this->index();
//            dd($contact);
        }
        if(!isset($request->id)){
            $contact->parent_id = $request->parentId;
            $contact->name = $request->name;
            $contact->save();
            $this->index();
        }
    }

    public function deleteRow(Request $request){
//        dd($request);
        $contactRow = Contact::where('id', $request->id)->first();
        if($contactRow !== null){
            $contactRow->delete();
            $this->index();
            return response()->json([
                'success' => true,
            ]);
        }else{
            $this->index();
            return response()->json([
                'success' => false,
                'error' => 'Не нашли запись в базе данных'
            ]);
        }
    }
}
