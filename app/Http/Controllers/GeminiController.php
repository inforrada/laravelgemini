<?php

namespace App\Http\Controllers;

use Gemini;
use Carbon\Carbon;
//use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Blob;
use Gemini\Enums\MimeType;
use Illuminate\Http\Request;


class GeminiController extends Controller
{
    //
    public static function getText(){
        // Carbon::setLocale('es');
        $fechaActual = Carbon::now();

        $dia = $fechaActual->day;
        $nombreMes = $fechaActual->monthName;
        $dia = 5;
        $nombreMes = 'marzo';
       
        $prompt = "Dime una efeméride del día $dia de $nombreMes a nivel mundial y en España. Utiliza el formato 'Tal día como hoy, en España ... y a nivel mundial ...' siendo los tres puntos un texto breve sobre cada uno de los hechos relevalentes";
    
        $apiKey = getenv('GEMINI_API_KEY');
        $client = Gemini::client($apiKey);

        $result = $client->geminiPro()->generateContent($prompt);
        return view ('gemini.text', ['fecha' => "$dia de $nombreMes", 'result' => $result->text()]);
    } 
    public static function getImageComment () {
        $url = 'https://conferences.codemotion.com/madrid2024/wp-content/uploads/sites/4/2023/11/AlexLomart_CODEMOTION2023-332-1-2048x1365.jpg';
        $apiKey = getenv('GEMINI_API_KEY');
        $client = Gemini::client($apiKey);
        
        $result = $client
        ->geminiProVision()
        //->geminiProFlash1_5 ()
        ->generateContent([
         'Explica la siguiente imagen',
         new Blob(
          mimeType: MimeType::IMAGE_JPEG,
          data: base64_encode(
           file_get_contents($url)
          )
         )
        ]);
        
       
       return view ('gemini.image', ['result' => $result->text()]);
    }

}
