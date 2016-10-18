<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\MessageRepository;

class MessageController extends Controller
{
    /**
     * The MessageRepository instance.
     *
     * @var \App\Repositories\MessageRepository
     */
    protected $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;

        $this->middleware('ajax')->except('getAllMessages');
    }

    public function createMessage(Request $request) {
    	// save new message
    	$this->messageRepository->store($request->all());
    }

    public function getChatNewMessage() {
    	$message = $this->messageRepository->generateRandomMessage();
    	// save new message
    	$this->messageRepository->store($message);

    	return response()->json(['message' => $message]);
    }

    public function getAllMessages() {
    	// let us see what we have
    	$messages = $this->messageRepository->getAllPaginate(10);
        return view('messages', ['messages' => $messages]);
    }
}
