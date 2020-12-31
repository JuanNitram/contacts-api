<?php

namespace App\Services;

use App\Models\Contact;

class ContactsService
{
  /**
   * @return array
   */
  public function all(int $userId): array
  {
    return Contact::where('user_id', $userId)->get()->toArray();
  }

  /**
   * @param integer $contactId
   * @return array
   */
  public function show(int $contactId): array
  {
    return Contact::findOrFail($contactId)->toArray();
  }
}