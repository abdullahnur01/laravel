<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //index function
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        if ($request->has('sort')) {
            $sort = $request->sort;
            $query->orderBy($sort, 'asc');
        } else {
            $query->orderBy('id', 'desc');
        }

        $contacts = $query->get();

        return view('contacts.index', compact('contacts'));
    }

    //create function
    public function create()
    {
        return view('contacts.create');
    }

    //store function
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|string|email|unique:contacts,email',
            'phone' => 'required|digits:10',
            'address' => 'required|string'
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.create')->with('success', 'Contact created successfully.');
    }

    //show function
    public function show(string $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return abort(404, 'Contact not found');
        }
        return view('contacts.show', compact('contact'));
    }

    //edit function
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return abort(404, 'Contact not found');
        }
        return view('contacts.edit', compact('contact'));
    }

    //update function
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:contacts,email,' . $id,
            'phone' => 'required|digits:10',
            'address' => 'required|string'
        ]);
    
        $contact = Contact::find($id);

        $isChanged = $request->name !== $request->original_name ||
                     $request->email !== $request->original_email ||
                     $request->phone !== $request->original_phone ||
                     $request->address !== $request->original_address;
    
        if (!$isChanged) {
            return redirect()->route('contacts.edit', $id)->with('info', 'No changes detected.');
        }

        $contact->update($request->only(['name', 'email', 'phone', 'address']));
        return redirect()->route('contacts.edit', $id)->with('success', 'Contact updated successfully.');
    }
    

    //destroy function
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

}