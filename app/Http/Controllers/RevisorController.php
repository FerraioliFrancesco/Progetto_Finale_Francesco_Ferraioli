<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index',compact('article_to_check'));
    }

    public function table(){
        $articles = Article::orderBY('created_at','asc')->get();
        return view('revisor.queue',compact('articles'));
    }

    public function show(Article $article){
        return view('revisor.show',compact('article'));
    }

    public function destroy(Article $article)
    {
        $article->user()->disassociate();
        $article->category()->disassociate();
        $article->delete();
        return redirect(route('revisor.table'))->with('message', __('ui.deleteRevisorMessage'));
    }

    public function accept(Article $article){
        $article->setAccepted(true);
        return redirect()->back()->with('messageAccepted', __('ui.article')." " . $article->title . " ".__('ui.accepted'));
    }

    public function reject(Article $article){
        $article->setAccepted(false);
        return redirect()->back()->with('messageRejected', __('ui.article')." " . $article->title . " ".__('ui.refused'));
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->with('message', __('ui.requestSend'));
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor',['email'=>$user->email]);
        return redirect()->back();
        
    }
}
