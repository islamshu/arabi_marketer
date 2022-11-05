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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
