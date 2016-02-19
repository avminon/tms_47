<?php

namespace App\Repositories\Eloquents;

use Config;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function listUserType(){
        $userType = [
            User::TYPE_TRAINEE => trans('message.trainee'),
            User::TYPE_SUPERVISOR => trans('message.supervisor')
        ];
        return $userType;
    }

    public function uploadImage($request)
    {
        $path = config('file.image.root_path');
        if ( $request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $path . date('YmdHisu') . $file->getClientOriginalName();
            move_uploaded_file($file, $filename);
            return $filename;
        } else {
            return $path . config('file.image.paths.default');
        }
    }
}