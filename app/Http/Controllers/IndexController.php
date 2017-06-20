<?php

namespace App\Http\Controllers;

use App\User;
use App\Tender;
use App\Bid;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Mail;

class IndexController extends Controller
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
     * @return \Illuminate\Http\Response
     */

   public function viewtender($id)
   {

       $details = Tender::where('id','=',$id)->get();
       $count = Bid::where('tender_id','=', $id)->count();
       return view('tender')->with('count', $count)->with('details', $details);
   }

 public function deltender($id)
 {

     $name = Tender::find($id);
     $name->delete();
     return Redirect::to('/addtenders');
 }

   public function mybids()
   {
       $name = Bid::where('user_id','=',Auth::user()->id)->get();
       return view('myproposals')->with('proposals', $name);
   }


  protected function addTender(Request $request) {
   $rules = array(
           'title' => 'required|max:100',
           'date' => 'required|max:100',
           'description' => 'required|max:300',

       );

       $validator = Validator::make(Input::all(), $rules);

  // check if the validator failed -----------------------
  if ($validator->fails()) {

     // get the error messages from the validator
     $messages = $validator->messages();

     // redirect our user back to the form with the errors from the validator
     return Redirect::to('/addtenders')
         ->withErrors($validator);

  } else {
     // validation successful ---------------------------

     // report has passed all tests!
     // let him enter the database

     // create the data for report
     $tender= new Tender;
     $tender->title     = Input::get('title');
     $tender->dateline     = Input::get('date');
     $tender->description     = Input::get('description');
     $tender->category     = Input::get('org_type');
     $tender->file     = $request->file;
      $tender->save();

        $fileName = $tender->id . '.' .
        $request->file('file')->getClientOriginalExtension();

        $request->file('file')->move(
            base_path() . '/public/uploads', $fileName
        );

     $pat = '/public/uploads/'.$fileName;

        $tend_obj = new Tender();
        $tend_obj->id = $tender->id;
        $tend = Tender::find($tend_obj->id); // Eloquent Model
        $tend->update(['file' => $pat]);

     // save report


     // redirect ----------------------------------------
     // redirect our user back to the form so they can do it all over again
     return Redirect::to('/addtenders');
      }

  }


    public function getBidForm($id)
    {
        $name = Tender::find($id);
        if(Auth::user()->org_type === $name->category){
        return view('biding')->with('tender', $name);
      }else{
        return view('300');
      }
    }


      protected function bidTender() {
       $rules = array(
               'title' => 'required|max:100',
               'tender_id' => 'required|max:100',
               'proposal' => 'required|max:300',

           );

           $validator = Validator::make(Input::all(), $rules);

      // check if the validator failed -----------------------
      if ($validator->fails()) {

         // get the error messages from the validator
         $messages = $validator->messages();
         $tender_id = Input::get('tender_id');

         // redirect our user back to the form with the errors from the validator
         return Redirect::to('/bid'.$tender_id)
             ->withErrors($validator);

      } else {
         // validation successful ---------------------------

         // report has passed all tests!
         // let him enter the database

         // create the data for report
         $c = Bid::where('user_id','=',Auth::user()->id)->where('tender_id','=',Input::get('tender_id'))->count();

         if($c > 0 ){
           return view('200');
         }else {
         $bid = new Bid;
         $bid->title     = Input::get('title');
         $bid->tender_id     = Input::get('tender_id');
         $bid->proposal     = Input::get('proposal');
         $bid->c_name     = Input::get('c_name');
         $bid->user_id     = Auth::user()->id;
         $bid->kra_pin     = Input::get('kra_pin');

         // save report
         $bid->save();

         // redirect ----------------------------------------
         // redirect our user back to the form so they can do it all over again
         return view('200s');
          }
        }
      }

      public function activeTenders()
      {
          $name = Tender::where('status','=','active')->get();
          return view('activetenders')->with('tenders', $name);
      }


     public function getProposals($id)
          {
          $name = Bid::where('tender_id',"=",$id)->get();
          $tender = Tender::find($id);

          return view('proposals')->with('proposals', $name)->with('tender', $tender);

          }


         public function award($id,$t_id)
              {
              $name = Bid::where('tender_id',"=",$t_id)->get();
              $c = Tender::where('awarded_to','=',$id)->count();
              $user = User::where('id','=',$id)->get();
              if($c > 0){
                return view('200t');
              }else{
                 $c_name = "";
                 foreach($user as $key){
                   $c_name = $key->c_name;

                    $tender_obj = new Tender();
                    $tender_obj->id = $t_id;
                    $tender = Tender::find($tender_obj->id); // Eloquent Model
                    $tender->update(['status' => "closed",'awarded_to' => $id,'c_name' => $c_name]);
                 }
                  return Redirect::to('closedP');
              }



              }

              public function getClosedTenders()
              {
                  $name = Tender::where('status','=','closed')->get();
                  return view('closed')->with('tenders', $name);
              }



}
