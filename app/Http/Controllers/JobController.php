<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        if ((int) $request->user()->role !== 2) {
            abort(403, 'You are not authorized to access this page.');
        }

        // Temporary demonstration listings.
        $jobs = collect([
            [
                'title' => 'Junior Software Developer',
                'company' => 'Tech Solutions Kenya',
                'location' => 'Nairobi',
                'type' => 'Full-time',
                'level' => 'Entry Level',
                'salary' => 'Negotiable',
                'posted' => '2 days ago',
                'description' => 'Assist in developing, testing and maintaining web applications and APIs.',
                'skills' => ['PHP', 'Laravel', 'MySQL'],
            ],
            [
                'title' => 'IT Support Assistant',
                'company' => 'Digital Systems Ltd',
                'location' => 'Embu',
                'type' => 'Full-time',
                'level' => 'Entry Level',
                'salary' => 'KSh 25,000 - 35,000',
                'posted' => '3 days ago',
                'description' => 'Provide technical support, troubleshoot computer systems and assist users.',
                'skills' => ['Networking', 'Windows', 'Technical Support'],
            ],
            [
                'title' => 'Python Developer Intern',
                'company' => 'Innovate Africa',
                'location' => 'Remote',
                'type' => 'Internship',
                'level' => 'Internship',
                'salary' => 'Stipend',
                'posted' => '5 days ago',
                'description' => 'Work with the development team to build and test Python applications.',
                'skills' => ['Python', 'Flask', 'REST API'],
            ],
            [
                'title' => 'Database Administrator',
                'company' => 'DataHub Kenya',
                'location' => 'Nairobi',
                'type' => 'Full-time',
                'level' => 'Mid Level',
                'salary' => 'Negotiable',
                'posted' => '1 week ago',
                'description' => 'Maintain databases, monitor performance and support data operations.',
                'skills' => ['MySQL', 'PostgreSQL', 'SQL'],
            ],
            [
                'title' => 'Digital Marketing Assistant',
                'company' => 'Growth Media',
                'location' => 'Nakuru',
                'type' => 'Contract',
                'level' => 'Entry Level',
                'salary' => 'Negotiable',
                'posted' => '1 week ago',
                'description' => 'Support digital campaigns, social media management and content creation.',
                'skills' => ['SEO', 'Social Media', 'Content'],
            ],
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
