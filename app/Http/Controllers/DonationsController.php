<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Services\CO2CalculatorInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DonationsController extends Controller
{
    public function makeContribution(Request $request, Tenant $tenant, CO2CalculatorInterface $calculator): Response
    {
        $mass = 0;
        $distance = 0;

        if ($request->has('mass')) {
            $mass = $request->get('mass');
        }

        if ($request->has('distance')) {
            $distance = $request->get('distance');
        }

        $footprint = $calculator->getCO2Footprint($distance, $mass);

        return response(
            view('compensate.view', [
                'tenant' => $tenant,
                'gramsOfCo2' => $footprint->getCO2InGrams(),
                'centsCharged' => $footprint->compensationCost(),
            ])->render()
        )->header('Content-Type', 'image/svg+xml');
    }
}
