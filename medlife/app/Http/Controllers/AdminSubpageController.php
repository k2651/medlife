<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Page;
use File;
class AdminSubpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $page = Page::find($id);
        $subpages = Page::where('page_id', $id)->where('visibility', 1)->get();
        return view('admin_views.showSubpages', compact('subpages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($request->file('image'))
        {
            $image = $request->file('image');
            $new_image = 'page-'.$id.'.'. $image->getClientOriginalExtension();
           
            if(File::exists('./pages/images'.$new_image))
                 File::delete('./pages/images'.$new_image);

            $image->move('./pages/images', $new_image);
            Page::where('id', $id)->update([
                'img' => $new_image
            ]);
            
        }
   

    Page::where('id', $id)->update([
        'route_name' => $request['route'],
    ]);
    
    return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->update([
            'visibility' => 0
        ]);
        return 1;
    }

    public function switchDropActive(Request $request, $id)
    {
        $page = Page::where('id', $id)->update([
            'drop_active' => $request['drop_active']
        ]);
        return 1;
    }

}
