<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Places;
use App\Models\ReviewsPlaces;

use Hashids\Hashids;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Str;


class PlacesController extends Controller
{

    public function index()
    {
        $hashids = new Hashids('Elradipet10Lt',6,'ABCEIU1234567890');
        $places = Places::where('id_user',Auth::user()->id)->limit(6)->get();
        return view('places.index',compact('places','hashids'));
    }

    public function create()
    {
        return view('places.create');
    }


    public function store(Request $request)
    {

        $baseImage = $request->base;
        list($type, $baseImage) = explode(';', $baseImage);
        list(, $baseImage)      = explode(',', $baseImage);
        $baseImage = base64_decode($baseImage);

        // aca validaciones
        $image = 'https://radi-images.s3.us-west-1.amazonaws.com/radi-default.png';
        $menu = 'https://radi-images.s3.us-west-1.amazonaws.com/places/Instagram+Post+Mariposa+Belleza+Interior+Lila+y+Rosa.png';

        if($request->file('image')){
            $fileName = $request->image->getClientOriginalName();
            $filePath = 'laravel/' .  Str::random(14).'_'.$fileName;
            $path = Storage::disk('s3')->put($filePath,$baseImage);
            $path = Storage::disk('s3')->url($path);
            $image   = 'https://radi-images.s3.us-west-1.amazonaws.com/'.$filePath;
        }

        if($request->file('menu')){
            $fileName = $request->menu->getClientOriginalName();
            $filePath = 'laravel/' .  Str::random(14).'_'.$fileName;
            $path = Storage::disk('s3')->put($filePath, file_get_contents($request->menu));
            $path = Storage::disk('s3')->url($path);
            $menu   = 'https://radi-images.s3.us-west-1.amazonaws.com/'.$filePath;
        }

        $schedule = array();
        $schedule[0] = array("start"  => $request->monday_start ,     "end"    => $request->monday_end);
        $schedule[1] = array("start"  => $request->tuesday_start ,    "end"    => $request->tuesday_end);
        $schedule[2] = array("start"  => $request->wednesday_start ,  "end"    => $request->wednesday_end);
        $schedule[3] = array("start"  => $request->thursday_start ,   "end"    => $request->thursday_end);
        $schedule[4] = array("start"  => $request->friday_start ,     "end"    => $request->friday_end);
        $schedule[5] = array("start"  => $request->saturday_start ,   "end"    => $request->saturday_end);
        $schedule[6] = array("start"  => $request->sunday_start ,     "end"    => $request->sunday_end);
        $schedule = json_encode($schedule);

        $places = new Places([
            'title'             => $request->get('title'),
            'image'             => $image,
            'place'             => $request->get('place'),
            'type'              => $request->get('type'),
            'cellphone'         => $request->get('cellphone'),
            'description'       => $request->get('description'),
            'schedule'          => $schedule,
            'address'           => $request->get('address'),
            'city'              => $request->get('city'),
            'food_pets'         => $request->get('food_pets'),
            'parking'           => $request->get('parking'),
            'payment_methods'   => $request->get('payment_methods'),
            'wifi'              => $request->get('wifi'),
            'public'            => $request->get('public'),
            'enviroment'        => $request->get('enviroment'),
            'accessibility'     => $request->get('accessibility'),
            'facebook_url'      => $request->get('facebook_url'),
            'instagram_url'     => $request->get('instagram_url'),
            'menu'              => $menu,
            'pdf_menu'          => $request->get('pdf_menu'),
            'notes'             => $request->get('notes'),
            'status'            => 2,
            'id_user'           => Auth::user()->id
        ]);

        $places->save();
        return redirect('/places')->with('success', 'Se ha creado correctamente.');
    }

    public function show(string $hash)
    {
        $hashids = new Hashids('Elradipet10Lt',6,'ABCEIU1234567890');
        $id = $hashids->decode($hash)[0];
        $place = Places::findOrFail($id);

        $schedule = json_decode($place->schedule, true);
        return view('places.show',compact('place','schedule','hash'));
    }


    public function edit(string $hash)
    {
        $hashids = new Hashids('Elradipet10Lt',6,'ABCEIU1234567890');
        $id = $hashids->decode($hash)[0];
        $place = Places::findOrFail($id);

        if($place->id_user == Auth::user()->id){
            if($place->schedule){
                $schedule = json_decode($place->schedule, true);
            }
            return view('places.edit',compact('place','schedule','hash'));

        }else{
            return redirect('/places')->with('error', 'No tienes permisos para ver.');
        }

    }


    public function update(Request $request)
    {

        $schedule = array();
        $schedule[0] = array("start"=> $request->monday_start ,     "end"    => $request->monday_end);
        $schedule[1] = array("start"=> $request->tuesday_start ,    "end"   => $request->tuesday_end);
        $schedule[2] = array("start"=> $request->wednesday_start ,  "end"  => $request->wednesday_end);
        $schedule[3] = array("start"=> $request->thursday_start ,   "end"  => $request->thursday_end);
        $schedule[4] = array("start"=> $request->friday_start ,     "end" => $request->friday_end);
        $schedule[5] = array("start"=> $request->saturday_start ,   "end" => $request->saturday_end);
        $schedule[6] = array("start"=> $request->sunday_start ,     "end"  => $request->sunday_end);

        $schedule = json_encode($schedule);

        $hashids = new Hashids('Elradipet10Lt',6,'ABCEIU1234567890');
        $id = $hashids->decode($request->id)[0];

        $place = Places::find($id);

        if($request->file('image')){
            $fileName = $request->image->getClientOriginalName();
            $filePath = 'laravel/' .  Str::random(14).'_'.$fileName;
            $path = Storage::disk('s3')->put($filePath, file_get_contents($request->image));
            $path = Storage::disk('s3')->url($path);
            $image   = 'https://radi-images.s3.us-west-1.amazonaws.com/'.$filePath;
            $place->image = $image;

        }

        if($request->file('menu')){
            $fileName = $request->menu->getClientOriginalName();
            $filePath = 'laravel/' .  Str::random(14).'_'.$fileName;
            $path = Storage::disk('s3')->put($filePath, file_get_contents($request->menu));
            $path = Storage::disk('s3')->url($path);
            $menu   = 'https://radi-images.s3.us-west-1.amazonaws.com/'.$filePath;
            $place->menu = $menu;
        }

        $place->title                  = $request->get('title');
        $place->place                  = $request->get('place');
        $place->type                   = $request->get('type');
        $place->cellphone              = $request->get('cellphone')?$request->get('cellphone'):0;
        $place->description            = $request->get('description');
        $place->address                = $request->get('address');
        $place->city                   = $request->get('city');
        $place->schedule               = $schedule;
        $place->food_pets              = $request->get('food_pets');
        $place->parking                = $request->get('parking');
        $place->payment_methods        = $request->get('payment_methods');
        $place->payments_card          = $request->get('payments_card');
        $place->wifi                   = $request->get('wifi');
        $place->public                 = $request->get('public');
        $place->enviroment             = $request->get('enviroment');
        $place->accessibility          = $request->get('accessibility');
        $place->facebook_url           = $request->get('facebook_url');
        $place->instagram_url          = $request->get('instagram_url');
        $place->pdf_menu               = $request->get('pdf_menu');
        $place->notes                  = $request->get('notes');
        $place->update();

        return redirect('/places/'.$request->id)->with('success', 'Se ha actualizado correctamente.');

    }

    public function destroy(string $hash)
    {

        $hashids = new Hashids('Elradipet10Lt',6,'ABCEIU1234567890');
        $id = $hashids->decode($hash)[0];
        $place = Places::find($id);
        $place->status = 0;
        $place->update();
        return redirect('/places')->with('success', 'Se ha eliminado el lugar.');
    }


    public function reviews(string $hash)
    {
        $hashids = new Hashids('Elradipet10Lt',6,'ABCEIU1234567890');
        $id = $hashids->decode($hash)[0];
        $place = Places::find($id);
        if($place->id_user == Auth::user()->id){
            $reviews = ReviewsPlaces::where('place_id',$id)->paginate(2);
            return view('places.reviews',compact('reviews'));
        }else{
            return redirect('/places')->with('error', 'No tienes permisos para ver.');
        }
    }

    public function reviewsStore(Request $request)
    {
        $hashids = new Hashids('Elradipet10Lt',6,'ABCEIU1234567890');
        $review = ReviewsPlaces::findOrFail($request->id);
        $review->reply = $request->reply;
        $review->update();
        return redirect('/places/reviews/'.$hashids->encode($review->place_id))->with('success', 'Se ha mandando tu comentario correctamente.');


    }


}
