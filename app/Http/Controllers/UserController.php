<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        
        $sortField = $request->input('sortField', 'created_at');
        $sortOrder = $request->input('sortOrder', 'desc');
        $users = User::orderBy($sortField, $sortOrder)->paginate(5);
        return view('user.index', compact('users', 'sortField', 'sortOrder'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check if there are any validation errors in the session data
        $users = User::All();

        // If there are validation errors, pass them to the view
        return view('user.modal-create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //     // Validate the form data
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|unique:users|max:255',
        //     'gender' => 'required',
        //     'password' => 'required|min:8|max:255',
        // ]);

        // // Create a new user with the validated data
        // $user = User::create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'gender' => $validatedData['gender'],
        //     'password' => Hash::make($validatedData['password']),
        // ]);
        // Validate user input
    // Create new user
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|string|min:8',
        'gender' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:5120' // 5MB max file size, valid image MIME types
    ]);

    $user = new User;
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->gender = $validatedData['gender'];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/users'), $imageName);
        $user->image = $imageName;
    }

    $user->save();

    Alert::toast('Created Successfully', 'success')->autoClose(3000)->timerProgressBar();
    return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
         return view('user.modal-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // $user = User::find($id);
    // $validatedData = $request->validate([
    //     'name' => 'required|max:255',
    //     'email' => 'required|email|max:255|unique:users,email,'.$user->id,
    //     'gender' => 'required',
    //     'password' => 'nullable|min:8|max:255',
    // ]);
    
    // // Update the user with the validated data
    // $user->update([
    //     'name' => $validatedData['name'],
    //     'email' => $validatedData['email'],
    //     'gender' => $validatedData['gender'],
    //     'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
    // ]);
    
    // Alert::toast('Updated Successfully', 'success')->autoClose(3000)->timerProgressBar()->width('20rem')->padding('1.5rem');
    // return redirect()->back();

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id.'|max:255',
        'password' => 'nullable|string|min:8',
        'gender' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120' // 5MB max file size, valid image MIME types
    ]);

    $user = User::find($id);
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->gender = $validatedData['gender'];

    if (!empty($validatedData['password'])) {
        $user->password = Hash::make($validatedData['password']);
    }

    if ($request->hasFile('image')) {
        // Delete the old image file
        if (!empty($user->image)) {
            $oldImage = public_path('images/users/' . $user->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        // image the new image file
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images/users'), $imageName);
        $user->image = $imageName;
    }

    $user->save();

    Alert::toast('Updated Successfully', 'success')->autoClose(3000)->timerProgressBar();
    return redirect()->back();
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!empty($user->image) && file_exists(public_path('images/users/' . $user->image))) {
            File::delete(public_path('images/users/' . $user->image));
        }
        $user->delete();

        Alert::toast('Deleted Successfully', 'success')->autoClose(3000)->timerProgressBar();
        return redirect()->back();
    }

    public function deleteSelected(Request $request)
    {

        $id = $request->input('selected_users');

        if(!empty($id)){
            User::whereIn('id', $id)->delete();
        }
        return redirect()->back();
    }
}
