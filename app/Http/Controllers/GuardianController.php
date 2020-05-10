<?php

namespace App\Http\Controllers;

use App\Services\GuardianService;
use Illuminate\Http\Request;


class GuardianController extends Controller
{
    private $guardianService;

    public function __construct(GuardianService $guardianService)
    {
        $this->guardianService = $guardianService;
    }

    public function index(){
        $guardians = $this->guardianService->all();

        return response()->json([
            "data" => $guardians
        ]);

    }
}
