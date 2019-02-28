<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon as Carbon;
use Excel;
use Sassnowski\LaravelShareableModel\Shareable\ShareableLink;
use App\Exports\UserPostExcel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       //  $dt = Carbon::now();
       //  $startDate = $dt->subMinutes(7);
       //  $endDate = Carbon::now(); 

       // $period = Period::create($startDate, $endDate);
        //$analyticsData = Analytics::fetchMostVisitedPages($period);
       // $analyticsData = Analytics::getVisitorsAndPageViews(Period::days(7));
          //$analyticsData = Analytics::fetchMostVisitedPages(Period::days(7));
//          $analyticsData = Analytics::performQuery(Period::days(10),'ga:sessions',
//     [
//         'metrics' => 'ga:sessions, ga:pageviews',
//         'dimensions' => 'ga:yearMonth'
//     ]
// );

       // dd($analyticsData);

       // Bugsnag::notifyException(new RuntimeException("Test error"));

        try {
            $data = Post::all();


        } catch (Exception $ex) {
            Bugsnag::notifyException($ex);
        }


        return view('home', ['posts'=>$data]);
    }

    protected function columns(){
        return collect((new Post)->getFillable())
                          ->reject(function($value){
                            return $value == "_token";
                        });
                        
    }

    public function store(Request $request)
    {
        

        try {
            $post = Post::create($request->all());
        } catch (Exception $ex) {
            Bugsnag::notifyException($ex);
        }
       // $dt = $this->columns()->combine($request->only('title','body'));

       // dd($dt);
       // 
       $link = ShareableLink::buildFor($post)
                    ->setActive()
                    ->build();

                    dd($link);

        return back();
    }

     public function edit(Post $post)
    {
        return Excel::download(new UserPostExcel, 'Report.xlsx');
        //return view('edit', ['post'=>$post]);
    }

      public function update(Request $request,Post $post)
    {
             $post->update($request->all());

            return redirect()->route('home');
    }
}
