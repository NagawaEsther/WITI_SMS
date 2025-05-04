<?php

namespace App\Http\Controllers;

use App\Models\ResourcesSupport;
use Illuminate\Http\Request;

class ResourcesSupportController extends Controller
{
    /**
     * Display a listing of the resources.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $resources = ResourcesSupport::orderBy('created_at', 'desc')->get();
        return view('resources_supports.index', compact('resources'));
    }

    /**
     * Handle search requests (regular and AJAX).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query', '');

        $resources = ResourcesSupport::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('category', 'like', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->get();

        if ($request->ajax()) {
            $output = '';
            if ($resources->count() > 0) {
                foreach ($resources as $resource) {
                    $thumbnail = $resource->thumbnail_url
                        ? '<div class="card-img-top position-relative overflow-hidden">
                               <img src="' . e($resource->thumbnail_url) . '" alt="' . e($resource->title) . ' Thumbnail"
                                    class="img-fluid w-100 resource-image"
                                    style="height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                               <div class="image-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                           </div>'
                        : '';

                    $output .= '<div class="col-md-6 col-lg-4" style="margin-bottom:30px;">
                                    <div class="card resource-card h-100 border-0 shadow-sm overflow-hidden">
                                        ' . $thumbnail . '
                                        <div class="card-body p-4">
                                            <div class="d-flex align-items-center mb-3">
                                                <h5 class="card-title mb-0 text-dark fw-bold">' . e($resource->title) . '</h5>
                                            </div>
                                            <p class="card-text text-muted mb-3 line-clamp">
                                                ' . e($resource->description ?? 'Access this resource to support your studies.') . '
                                            </p>
                                            <div class="mb-2">
                                                <span class="badge bg-soft-primary text-primary">
                                                    <i class="fas fa-tag me-1"></i>
                                                    ' . e($resource->type) . '
                                                </span>
                                                <span class="badge bg-soft-success text-success ms-2">
                                                    <i class="fas fa-folder me-1"></i>
                                                    ' . e($resource->category ?? 'General') . '
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <a href="' . e($resource->url) . '" target="_blank"
                                                   class="btn btn-outline-primary btn-sm rounded-pill">
                                                    Access Resource
                                                    <i class="fas fa-arrow-right ms-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer p-0"
                                             style="height: 4px; background: linear-gradient(to right, #800020, #ff6b6b);"></div>
                                    </div>
                                </div>';
                }
            } else {
                $output = '<div class="col-12 text-center">
                               <p class="text-muted">No resources found for "' . e($query) . '".</p>
                           </div>';
            }

            return response()->json(['html' => $output]);
        }

        return view('resources_supports.index', compact('resources'));
    }
}