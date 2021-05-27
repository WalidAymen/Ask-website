<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showProfile()
    {
        $user=User::findOrFail(Auth::user()->id);
        return view('users.profile',[
            'user'=>$user
        ]);
    }
    public function showAll()
    {
        $users=User::paginate(9);
        return view('users.all',[
            'users'=>$users
        ]);
    }
    public function show($id)
    {

        if(Auth::user()&&Auth::user()->id==$id)
        {
            return redirect(url('/me'));
        }
        else
        {
            $user=User::find($id);
            if ($user!=null) {
                return view('users.show', [
                'user'=>$user
            ]);
            }
            else
            {
                return redirect(url('/allusers'));
            }
        }
    }
    public function editForm($id)
    {
        if (Auth::user()->id==$id) {
            $user=User::findOrFail($id);
            return view('users.edit', [
            'user'=>$user
        ]);
        }
        else
            return redirect(url('/me'));
    }
    public function update($id,Request $request)
    {
        if (Auth::user()->id==$id) {
            $request->validate([
                'name'=>'required|max:255|string',
                'bio'=>'string|max:255|nullable',
                'img'=>'nullable|image|max:2048|mimes:png,jpg'
            ]);
            $user=User::findOrFail($id);
            $imgpath=$user->img;
            if($request->hasFile('img'))
            {
                $imgpath=Storage::put('user', $request->img);
            }

            $user->update([
                'name'=>$request->name,
                'bio'=>$request->bio,
                'img'=>$imgpath
            ]);
            return redirect(url('/me'));
        }
        else
            return redirect(url('/me'));
    }
    public function pending($id)
    {
        if (Auth::user()->id==$id) {
            $user=User::findOrFail($id);
            return view('messages.pending',[
                'user'=>$user
            ]);
        }
        else
            return redirect(url('/me'));

    }
    public function search(Request $request)
    {
        $users=User::where('name',"like","%$request->keyword%")->paginate(9);
        return view('users.search',[
            'users'=>$users,
            'keyword'=>$request->keyword
        ]);
    }

}
