<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use App\Models\{
    User,
    Comment
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request) 
    {
        $search = $request->search;
        $users = $this->user->getUsers(
            search: $request->get('search', '') ?? ''
        );

        return view('users.index', compact('users'));
    }

    public function show($id) 
    {
        // $user = User::where('id', $id)->first();
        if (!$user = $this->user->find($id)) {
            return redirect()->route('users.index');
        }

        return view('users.show', compact('user'));
    }

    public function create() 
    {
        return view('users.create');
    }

    public function store(StoreUpdateUser $request) 
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if($request->image) {
            $data['image'] = $request->image->store('users');
        }

        $user = User::create($data);
        
        return redirect()->route('users.index');

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
    }

    public function edit($id)
    {
        if(!$user = $this->user->find($id)) {
            return redirect()->route('users.index');
        }

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUser $request, $id)
    {
        if(!$user = $this->user->find($id)) {
            return redirect()->route('users.index');
        }

        $data = $request->only('name', 'email');

        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        if($request->image) {
            if($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }

            $data['image'] = $request->image->store('users');
        } 

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if(!$user = $this->user->find($id)) {
            return redirect()->route('users.index');
        }

        $user->delete();

        return redirect()->route('users.index');
    }
}
