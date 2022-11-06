<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\KeyWord;
use App\Models\Podacst;
use App\Models\PodacstKeyword;
use App\Models\PodcastCategory;
use DB;
use Illuminate\Http\Request;
use Alert;
use App\Models\NewPodcast;
use App\Models\OwenPodcast;
use App\Models\Sound;
use SimpleXMLElement;
use View;

class PodacstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        return view('pages.podcasts.index')
            ->with('podcasts', Podacst::orderBy('id', 'desc')->get())
            ->with('categories', Category::ofType('podcast')->get());
    }
    public function new_index()
    {
     

        return view('pages.podcasts.new_index')
            ->with('podcasts', NewPodcast::orderBy('id', 'desc')->get())
            ->with('categories', Category::ofType('podcast')->get());
    }
    public function destort_new($id){
        NewPodcast::find($id)->delete();
        Alert::warning('Success', 'Deleted successfully');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  media_rss($id){
        
        $pod = NewPodcast::find($id);
        if($pod->type =='rss'){
            $url = $pod->url;
            $content = file_get_contents($url);
            $flux = new SimpleXMLElement($content);
            return View::make('pages.podcasts.rss_media', compact('flux'));
        }else{
            return View::make('pages.podcasts.rss_media_pod', compact('pod'));

        }
     
    }
    public function uploda_sound(Request $request){
       $request->validate([
        'title'=>'required',
        'description'=>'required',
        'sound' => 'mimes:mp3',
       ]);

        $music_file = $request->sound;
        $sound = new Sound();

        if (isset($music_file)) {
            $filename = $music_file->getClientOriginalName();
            $location = public_path('audio/');
            $music_file->move($location, $filename);
            $sound->sound = $filename;
            $sound->podcast_id = $request->podcast_id;
            $sound->title = $request->title;
            $sound->description = $request->description;
            $sound->save();
            Alert::success('Success', 'تم رفع الملف الصوتي بنجاح');
            return redirect()->back();
        }
    }
    public function create()
    {
        //
    }
    public function store_podcast(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'user_id' => 'required'
        ]);
        $podcast = new NewPodcast();
        $podcast->user_id = $request->user_id;
        $podcast->type = 'rss';
        $podcast->url = $request->url;
        $podcast->save();
        Alert::success('Success', 'Added successfully');
        return redirect()->back();
    }
    public function maual_podcast(Request $request){
        $request->validate([
            'user_id' => 'required',
            'title'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);
        $podcast = new NewPodcast();
        $podcast->user_id = $request->user_id;
        $podcast->type = 'manual';
        $podcast->url = null;
        $podcast->save();
        $attemp = new OwenPodcast();
        $attemp->podcast_id = $podcast->id;
        $attemp->title = $request->title;
        $attemp->description = $request->description;
        $attemp->image = $request->image->store('podcast');
        $attemp->save();

        Alert::success('Success', 'Added successfully');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_manula_podcast(){
        return view('pages.podcasts._new_create');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'image'=>'dimensions:width=470,height=800',
        // ]);
        try {
            DB::transaction(function () use ($request) {
                $service = new Podacst();
                $service->title = $request->title;
                $service->description = $request->description;
                $service->url = $request->url;
                $service->apple_url  = $request->apple_url;
                $service->sound_url  = $request->sound_url;
                $service->user_id = $request->user_id;

                $service->time = $request->time;
                $service->image = $request->image->store('podcast');
                $service->save();


                foreach ($request->type as $category) {
                    $cat = new PodcastCategory();
                    $cat->podcast_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);

                foreach (json_decode($request->keywords) as $s) {
                    $keyword = KeyWord::ofType('podcast')->where('title', $s->value)->where('title', $s->value)->first();
                    if ($keyword) {
                        $key = new PodacstKeyword();
                        $key->podcast_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s->value, 'en' => $s->value];
                        $keyword->type = 'podcast';
                        $keyword->save();

                        $key = new PodacstKeyword();
                        $key->podcast_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }





                return $service;
            });
        } catch (\Throwable $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Podacst  $podacst
     * @return \Illuminate\Http\Response
     */
    public function show(Podacst $podacst)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Podacst  $podacst
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $podacst = Podacst::find($id);
        $selectedtype = $podacst->category;
        $selectedkeywords = $podacst->keywords;
        $selectedkeywords_array = array();
        foreach ($selectedkeywords as $selc) {
            array_push($selectedkeywords_array, $selc->title);
        }
        $selectedtype_array = array();
        foreach ($selectedtype as $selc) {
            array_push($selectedtype_array, $selc->id);
        }
        $podacst = Podacst::find($id);
        return view('pages.podcasts.edit')
            ->with('podcast', Podacst::find($id))
            ->with('type_array', $selectedtype_array)
            ->with('keywords_array', $selectedkeywords_array)
            ->with('categories', Category::ofType('podcast')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Podacst  $podacst
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $service = Podacst::find($id);

                $service->title = $request->title;
                $service->description = $request->description;
                $service->url = $request->url;
                $service->apple_url  = $request->apple_url;
                $service->sound_url  = $request->sound_url;
                $service->user_id = $request->user_id;

                $service->time = $request->time;
                if ($request->image != null) {
                    $service->image = $request->image->store('podcast');
                }
                $service->save();

                PodcastCategory::where('podcast_id', $service->id)->delete();
                foreach ($request->type as $category) {
                    $cat = new PodcastCategory();
                    $cat->podcast_id = $service->id;
                    $cat->category_id = $category;
                    $cat->save();
                }

                // dd($request->keywords);
                PodacstKeyword::where('podcast_id', $service->id)->delete();

                foreach (json_decode($request->keywords) as $s) {
                    $keyword = KeyWord::ofType('podcast')->where('title', $s->value)->where('title', $s->value)->first();
                    if ($keyword) {
                        $key = new PodacstKeyword();
                        $key->podcast_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    } else {

                        $keyword = new KeyWord();
                        $keyword->title = ['ar' => $s->value, 'en' => $s->value];
                        $keyword->type = 'podcast';
                        $keyword->save();

                        $key = new PodacstKeyword();
                        $key->podcast_id = $service->id;
                        $key->keyword_id = $keyword->id;
                        $key->save();
                    }
                }
            });
            Alert::success('Success', 'Edited successfully');

            return redirect()->back();
        } catch (\Throwable $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Podacst  $podacst
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $podacst = Podacst::find($id);
        $podacst->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();
    }
}
