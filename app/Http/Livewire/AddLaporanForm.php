<?php

namespace App\Http\Livewire;

use App\Models\laporan;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddLaporanForm extends Component
{
  use WithFileUploads;
  public $name;
  public $email;
  public $road;
  public $phone;
  public $location;
  public $lat;
  public $long;
  public $photo;
  public $photo2;
  public $description;
  public function mount() {
    $this->fill([
      'name'=>Auth::user()->name,
      'email'=>Auth::user()->email,
      'phone'=>Auth::user()->phone,
    ]);
  }

  public function render()
  {
    return view('livewire.add-laporan-form');
  }

  public function addData()
  {

    $filename = $this->photo->storePublicly('photos');
    $filename2 = $this->photo2->storePublicly('photos');

    Artisan::call('storage:link');
    laporan::create([
      'name'=>$this->name,
      'email'=>$this->email,
      'phone'=>$this->phone,
      'road'=>$this->road,
      'location'=>$this->location,
      'lat'=>$this->lat,
      'long'=>$this->long,
      'photo'=>$filename,
      'photo2'=>$filename2,
      'status'=>0,
      'description'=>$this->description,
    ]);
    \redirect('home');
  }
}
