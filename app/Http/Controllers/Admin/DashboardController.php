<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FoodRatingsService;

class DashboardController extends Controller
{
	
    public function index(Request $request) {
		
		// Get the response from service
		$foodRatingsService = new FoodRatingsService;
		$authorities = $foodRatingsService->getAuthorities();
	
		return view('admin.dashboard', compact('authorities'));
	
	}

	public function getEstablishments(Request $request) {

		// Set the authority ID which is already validated in Web routes
		$authorityId = $request->id;

		// Get the response from service
		$foodRatingsService = new FoodRatingsService;
		$establishments = $foodRatingsService->getEstablishmentsByAuthorityId($authorityId);
	
		return view('admin.establishments', compact('establishments'));

	}
	
}
