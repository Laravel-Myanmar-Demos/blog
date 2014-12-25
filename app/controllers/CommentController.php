<?php

class CommentController extends \BaseController {

	public function comment($id)
	{
		$rules = array(
            'name'     => 'required',
            'comment'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/blog/comment/'.$id)
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $comment = new Comment;
            $comment->post_id       = $id;
            $comment->name       = Input::get('name');
            $comment->comment      = Input::get('comment');
            $comment->save();

            // redirect
            return Redirect::to('/blog/'.$id);
        }
	}

}