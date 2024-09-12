<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait imagetrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function uploadimage(Request $request, $fieldname = 'image', $directory = 'uploads' ) {

        // if( $request->hasFile( $fieldname ) ) {

        //     if (!$request->file($fieldname)->isValid()) {

        //         flash('Invalid Image!')->error()->important();

        //         return redirect()->back()->withInput();

        //     }

        //     return $request->file($fieldname)->store($directory, 'public');

        // }

        // return null;

        if ($request->has($fieldname)) {
            $filename = time() . '_' . $request->file($fieldname)->getClientOriginalName();
            return  $request->file($fieldname)->storeAs($directory, $filename, 'public');
        }

    }

}