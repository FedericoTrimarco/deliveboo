<?php

namespace App\Http\Controllers\Admin;

use App\Plate;
use App\Typology;
use App\Category;
use App\User;
use App\Restaurant;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Piatti';
        $id = Auth::user()->id;
        $categories = Category::all();
        $user = User::where('id', $id)->first();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id)->orderBy('name', 'ASC')->get();
        return view('admin.plates.index', compact('user', 'plates', 'title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plates = Plate::all();
        $typologies = Typology::all();
        $categories = Category::all();
        return view('admin.plates.create', compact('plates', 'categories', 'typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->plateValidation());

        $data = $request->all();
        $data['restaurant_id'] = Auth::user()->id;

        if (array_key_exists('image', $data)) {
            $data['image'] = Storage::put('uploads/', $data['image']);
        }

        $plate = new Plate();
        $plate->fill($data)->save();

        return redirect()->route('admin.plates.show', $plate->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idUser = Auth::user()->id;
        $user = User::where('id', $idUser)->first();

        $plate = Plate::find($id);
        $categories = Category::all();
        if (!$plate) abort(404);

        return view('admin.plates.show', compact('plate', 'categories', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plate = Plate::find($id);
        $categories = Category::all();
        if (!$plate) abort(404);
        return view('admin.plates.edit', compact('plate', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->plateValidation());

        $data = $request->all();
        $plate = Plate::find($id);

        if (array_key_exists('image', $data)) {
            if ($plate->image) {
                Storage::delete($plate->image);
            }
            $data['image'] = Storage::put('uploads', $data['image']);
        }
        $plate->update($data);

        return redirect()->route('admin.plates.show', $plate->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plate = Plate::find($id);
        if ($plate->image) {
            Storage::delete($plate->image);
        }
        $plate->delete();
        return redirect()->route('admin.plates.index')->with('deleted', $plate->name);
    }

    public function plateValidation()
    {
        return      [
            'name' => 'required|string|max:50',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'visible' => 'boolean',
            'ingredients' => 'required',
            'restaurant_id' => 'nullable|exists:restaurants,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|file|mimes:png,jpg'
        ];
    }
}
