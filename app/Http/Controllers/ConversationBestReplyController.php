<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        // authorize that the current user has permission to set the best reply

        $this->authorize('update-conversation', $reply->conversation);

        $reply->conversation->best_reply_id = $reply->id;
        $reply->conversation->save();

        return back();
    }
}
