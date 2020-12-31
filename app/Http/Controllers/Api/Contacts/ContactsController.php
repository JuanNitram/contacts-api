<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Services\ContactsService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;

class ContactsController
{
  private $contactsService;

  /**
   * @param ContactsService $contactsService
   */
  public function __construct(ContactsService $contactsService)
  {
    $this->contactsService = $contactsService;
  }

  /**
   * @param Request $request
   * @return JsonResponse
   */
  public function index(Request $request): JsonResponse
  {
    try {
        return response()->json([
          'contacts' => $this->contactsService->all($request->user()->id)
        ], 200);
    } catch (Exception $ex) {
      return response()->json([
        'errors' => ['error' => $ex->getMessage()]
      ], 400);
    }
  }

  /**
   * @param Request $request
   * @param integer $contactId
   * @return JsonResponse
   */
  public function show(Request $request, int $contactId): JsonResponse
  {
    try {
      return response()->json([
        'contact' => $this->contactsService->show($contactId)
      ], 200);
    } catch (Exception $ex) {
      return response()->json([
        'errors' => ['error' => $ex->getMessage()]
      ], 400);
    }
  }
}