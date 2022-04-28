<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $uri = $request->path();
        // dd($uri);
        $apiArray=explode('/',$uri);
        if($apiArray[count($apiArray)-1]=='posts'){
            return [
                'id'=>$this->id,
                'title'=>$this->title,
                'description'=>$this->description,
                'user'=> new UserResource($this->user),
           
           ];
        }else{
            return [
             'id'=>$this->id,
             'title'=>$this->title,
             'description'=>$this->description,
             'user'=> new UserResource($this->user),
            
             'comments'=>CommentResource::collection($this->comments)


        ];
        }
    }
}
