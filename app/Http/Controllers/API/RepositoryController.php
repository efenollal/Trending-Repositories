<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\RepositoryResource;
use App\Repository;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [];
        $results = RepositoryResource::collection(Repository::all());
        foreach ($results as $key => $result) {
            $response[$key]['id']               = $result->repository_id;
            $response[$key]['full_name']        = $result->name;
            $response[$key]['description']      = $result->description;
            $response[$key]['html_url']         = $result->url;
            $response[$key]['created_at']       = $result->created_date;
            $response[$key]['pushed_at']        = $result->last_push_date;
            $response[$key]['stargazers_count'] = $result->stars;
        }

        return new Response($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $req) {
            Repository::updateOrCreate(
            [
                'repository_id'     => $req['repository_id'],
            ],
            [
                'repository_id'     => $req['repository_id'],
                'name'              => $req['name'],
                'description'       => $req['description'] ?? '',
                'url'               => $req['url'],
                'last_push_date'    => $req['last_push_date'],
                'created_date'      => $req['created_date'],
                'stars'             => $req['stars'],
            ]);
        }

        return new Response('Success', Response::HTTP_OK);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
