<?php

namespace App\Repositories;

use App\Message;

class MessageRepository
{
    /**
     * Create a new ContactRepository instance.
     *
     * @param  \App\Models\Contact $contact
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->model = $message;
    }

    /**
     * Save message
     */
    public function store($inputs) {
        $this->model->userfirstname = $inputs['firstName'];
        $this->model->usersecondname = $inputs['secondName'];
        $this->model->text = $inputs['messageText'];

        $this->model->save();
    }

    /**
     * Get all message
     */    
    public function getAllPaginate($numberOfItems) {

        return $this->model->paginate($numberOfItems);
    }

    /**
     * Generate random message
     */
    public function generateRandomMessage() {
        $output['firstName'] = 'Иван';
        $output['secondName'] = 'Иванов';
        $output['messageText'] = 'Случайное сообщение в чат №' . mt_rand(1, 30);

        return $output;
    }
}
