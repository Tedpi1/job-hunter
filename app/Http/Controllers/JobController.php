<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class JobController extends Controller
{
    public function index(Request $request)
    {
        if ((int) $request->user()->role !== 2) {
            abort(403, 'You are not authorized to access this page.');
        }

        // Database demonstration listings.
        $jobs = Vacancy::with('company')
            ->where('is_active', true)
            ->latest()
            ->paginate(10);

        return view('pages.jobs', [
            'jobs' => $jobs,
            'search' => $request->query('q', ''),
            'location' => $request->query('location', ''),
            'type' => $request->query('type', ''),
            'level' => $request->query('level', ''),
            'skills' => $request->query('skills', ''),

        ]);

        // Search by title, company, location or skills.
        $search = trim($request->query('q', ''));

        if ($search !== '') {
            $jobs = $jobs->filter(function ($job) use ($search) {
                $searchable = strtolower(
                    $job['title'] . ' ' .
                    $job['company'] . ' ' .
                    $job['location'] . ' ' .
                    implode(' ', $job['skills'])
                );

                return str_contains($searchable, strtolower($search));
            });
        }

        // Filter by location.
        if ($request->filled('location')) {
            $jobs = $jobs->where('location', $request->location);
        }

        // Filter by employment type.
        if ($request->filled('type')) {
            $jobs = $jobs->where('type', $request->type);
        }

        // Filter by experience level.
        if ($request->filled('level')) {
            $jobs = $jobs->where('level', $request->level);
        }

        return view('pages.jobs', [
            'jobs' => $jobs->values(),
            'search' => $search,
            'location' => $request->location,
            'type' => $request->type,
            'level' => $request->level,
        ]);
    }
}
