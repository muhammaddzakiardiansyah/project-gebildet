<?php 
  
  namespace App\Http\Controllers;
  use Illuminate\Http\Request;

  class MusicaController extends Controller {
    public function pilih() {
        return view('musica', [
            "title" => "Musica",
            "active" => "musica"
        ]);
    }
  }