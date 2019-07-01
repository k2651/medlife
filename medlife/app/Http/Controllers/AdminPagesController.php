<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Page;
use App\Language;
use App\Card;
use App\Text;
use File;
class AdminPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pages = Page::all();
        // $lol="lol";
        // return view('admin_views.showCards', compact('pages','lol'));
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
       
        $getTitle = Page::getTitle($request['route']);
        if($getTitle) // daca titlul deja exista
            return 0; 
        
        $validation = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        if($validation->fails())
             return -1;
        else 
        {
                if($request['page']) 
                    $pageId = Page::createPage($request['route'], $request['page']);
                   
                else 
                     $pageId = Page::createPage($request['route'], null, $request['index']);
                   
                    
                $card = Card::createCard($request['title'], $request['description'], $request['lang'], $pageId);

                $image = $request->file('image');
                $new_name = 'page-'.$pageId.'.'. $image->getClientOriginalExtension();
                $image->move('./pages/images', $new_name);
                $pg = Page::find($pageId);
                $pg->img = $new_name;
                $pg->save();

                return 1;
        }   
       
    }
    public function showCards()
    {
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $texts = Text::getUserText($page->id);
        // dd($texts);
        return view('admin_views.showEditor', compact('page', 'texts'));
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

        // $validation = Validator::make($request->all(), [
        //     'image' => 'image|mimes:jpeg,png,jpg',
        //     // 'route_name' => 'required'
        // ]);
        //  if($validation->fails())   
        //     return -1;
       
            
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
            'index' => $request['index'],
        ]);

        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->visibility = 0;
        $page->save();
        return 1;
    }

    public function switchNavActive(Request $request, $id)
    {
        if(Page::where('nav_active', 1)->where('visibility', 1)->get()->count() > 6 && $request['nav_active'] == 1)
            return -1;
        else
           $page = Page::where('id', $id)->update([
                'nav_active' => $request['nav_active']
            ]);
            return 1;
    }
    public function switchWelcome(Request $request, $id)
    {
        if(Page::where('welcome_active', 1)->where('visibility', 1)->get()->count() > 2 && $request['welcome'] == 1)
            return -1;
        else
           $page = Page::where('id', $id)->update([
                'welcome_active' => $request['welcome']
            ]);
            return 1;
    }
}
