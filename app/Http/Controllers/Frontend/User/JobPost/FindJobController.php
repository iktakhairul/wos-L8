<?php

namespace App\Http\Controllers\Frontend\User\JobPost;

use App\Http\Controllers\Controller;
use App\Models\Profile\JobPost\JobPost;
use App\Models\Profile\JobPost\JobResponses;
use App\Models\Profile\JobPost\JobTimeline;
use App\Models\Profile\JobPost\ServiceCategory;
use App\Models\Profile\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FindJobController extends Controller
{
    /**
     * Valid constructor for user resource.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function find_job_posts_by_km()
    {
        $available_job_posts = [];
        $own_responses = null;
        $service_categories = [];
        $profile_status = true;
        $km = 5;
        $profile = Profile::where('user_id', auth()->user()['id'])->first();

        $latitudeOne  = (float)$profile['present_latitude'] - (0.008983157 * $km);
        $latitudeTwo  = (float)$profile['present_latitude'] + (0.008983157 * $km);
        $longitudeOne = (float)$profile['present_longitude'] - (0.015060684 * $km);
        $longitudeTwo = (float)$profile['present_longitude'] + (0.015060684 * $km);

        if (auth()->user()['complete_profile_status'] !== 'incomplete') {
            $available_job_posts = JobPost::with(['service_category', 'job_responses', 'user'])
                ->where('user_id', '!=', auth()->user()['id'])
                ->where('status', '!=', 'inactive')
                ->whereBetween('latitude', [$latitudeOne, $latitudeTwo])
                ->orWhereBetween('latitude', [$longitudeOne, $longitudeTwo])
                ->paginate(15);
            $own_responses = JobResponses::where('user_id', auth()->user()['id'])->get();
            $service_categories = ServiceCategory::select('id', 'name')->where('status', 1)->get();
        }else {
            $profile_status = false;
        }

        return view('web.user.job_post.find_job_posts_result', compact('available_job_posts', 'service_categories', 'own_responses', 'profile_status'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return View
     */
    public function find_job_post_by_km_filter($km)
    {
        $available_job_posts = [];
        $own_responses = null;
        $service_categories = [];
        $profile_status = true;
        $profile = Profile::where('user_id', auth()->user()['id'])->first();

        $latitudeOne  = (float)$profile['present_latitude'] - (0.008983157 * $km);
        $latitudeTwo  = (float)$profile['present_latitude'] + (0.008983157 * $km);
        $longitudeOne = (float)$profile['present_longitude'] - (0.015060684 * $km);
        $longitudeTwo = (float)$profile['present_longitude'] + (0.015060684 * $km);

        if (auth()->user()['complete_profile_status'] !== 'incomplete') {
            $available_job_posts = JobPost::with(['service_category', 'job_responses', 'user'])
                ->where('user_id', '!=', auth()->user()['id'])
                ->where('status', '!=', 'inactive')
                ->whereBetween('latitude', [$latitudeOne, $latitudeTwo])
                ->orWhereBetween('latitude', [$longitudeOne, $longitudeTwo])
                ->paginate(15);

            $own_responses = JobResponses::where('user_id', auth()->user()['id'])->get();
            $service_categories = ServiceCategory::select('id', 'name')->where('status', 1)->get();
        }else {
            $profile_status = false;
        }

        return view('web.user.job_post.find_job_posts_result', compact('available_job_posts', 'service_categories', 'own_responses', 'profile_status'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return View
     */
    public function find_job_post_by_all_jobs_in_country()
    {
        $available_job_posts = [];
        $own_responses = null;
        $service_categories = [];
        $profile_status = true;
        $profile = Profile::where('user_id', auth()->user()['id'])->first();

        if (auth()->user()['complete_profile_status'] !== 'incomplete') {
            $available_job_posts = JobPost::with(['service_category', 'job_responses', 'user'])
                ->where('user_id', '!=', auth()->user()['id'])
                ->where('status', '!=', 'inactive')
                ->where('country', $profile['present_country'])
                ->paginate(15);

            $own_responses = JobResponses::where('user_id', auth()->user()['id'])->get();
            $service_categories = ServiceCategory::select('id', 'name')->where('status', 1)->get();
        }else {
            $profile_status = false;
        }

        return view('web.user.job_post.find_job_posts_result', compact('available_job_posts', 'service_categories', 'own_responses', 'profile_status'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return View
     */
    public function find_job_post_by_service_category_filter_with_fix_km($id)
    {
        $available_job_posts = [];
        $own_responses = null;
        $service_categories = [];
        $profile_status = true;
        $km = 2;
        $profile = Profile::where('user_id', auth()->user()['id'])->first();

        $latitudeOne  = (float)$profile['present_latitude'] - (0.008983157 * $km);
        $latitudeTwo  = (float)$profile['present_latitude'] + (0.008983157 * $km);
        $longitudeOne = (float)$profile['present_longitude'] - (0.015060684 * $km);
        $longitudeTwo = (float)$profile['present_longitude'] + (0.015060684 * $km);

        if (auth()->user()['complete_profile_status'] !== 'incomplete') {
            $available_job_posts = JobPost::with(['service_category', 'job_responses', 'user'])
                ->where('user_id', '!=', auth()->user()['id'])
                ->where('service_category_id', $id)
                ->where('status', '!=', 'inactive')
                ->whereBetween('latitude', [$latitudeOne, $latitudeTwo])
                ->orWhereBetween('latitude', [$longitudeOne, $longitudeTwo])
                ->paginate(15);

            $own_responses = JobResponses::where('user_id', auth()->user()['id'])->get();
            $service_categories = ServiceCategory::select('id', 'name')->where('status', 1)->get();
        }else {
            $profile_status = false;
        }

        return view('web.user.job_post.find_job_posts_result', compact('available_job_posts', 'service_categories', 'own_responses', 'profile_status'));
    }
}
