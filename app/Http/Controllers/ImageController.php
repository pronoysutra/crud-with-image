<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        $user=Image::all();
        return view('index',compact('user'));
    }

    public function create(){
        return view('create');
    }
    
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Create a new Image instance
        $student = new Image;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->birth_date = $request->input('birth_date');
        $student->gender = $request->input('gender');
  
        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
    
            // Move the uploaded file to the specified directory
            $file->move(public_path('uploads/students'), $filename);
            $student->image = $filename;
        }
   
        // Save the student record
        $student->save();
    
        return redirect()->route('index')->with('status', 'Student Image Added Successfully');
    }
    
   
    public function destroy( $id)
    {
        $student = Image::find($id);
        $student->delete();
        return redirect()->back()->with('status','Student Image Deleted Successfully');
    }

    public function edit($id)
    {
        $datas =Image::find($id);
        return view('edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $student = Image::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->birth_date = $request->input('birth_date');
        $student->gender = $request->input('gender');
        if($request->hasfile('image'))
        {
            $destination = 'uploads/students/'.$student->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/', $filename);
            $student->image = $filename;
        }

        $student->update();
        return redirect()->route('index')->with('status','Student Image Updated Successfully');
    } 
}