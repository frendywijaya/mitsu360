<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home.index');
    }

    public function show($car, $color = 'white', $variant = 'original')
    {
        $cars = ['xpander', 'pajero'];

        if ($car == 'pajero') {
            $colors = ['brown', 'black', 'grey', 'grey-light', 'white'];

            $variants = ['original', 'basic', 'aero'];
            $variants_detail = [
              'original' => [],
              'basic' => [
                'Muffler Cutter',
                'Side Window Deflector'
              ],
              'aero' => [
                'Muffler Cutter',
                'Side Window Deflector',
                'Front Under Garnish',
                'Rear Under Garnish'
              ]
            ];

            $variants_price = [
              'original' => '',
              'basic' => 'Rp 1.123.200',
              'aero' =>  'Rp 3.850.200'
            ];

            $data['car_switch']['text'] = 'XPANDER';
            $data['car_switch']['url'] = 'xpander';
            $data['car_switch']['color'] = 'white';

            $extra_images = [
              [
                'src' => asset('website_assets/images/extra/pajero/wheel_lock.jpg'),
                'title' => 'Wheel Lock Nut - Rp 525.000'
              ]
            ];
        } elseif ($car == 'xpander') {
            $colors = ['red', 'brown', 'black', 'grey', 'grey-light', 'white'];

            $variants = ['original', 'basic', 'aero', 'aero-plus-a', 'aero-plus-b', 'chrome'];
            $variants_detail = [
              'original' => [],
              'basic' => [
                'Side Visor',
                'Muffler Cutter'
              ],
              'aero' => [
                'Front Airdam',
                'Side Airdam',
                'Rear Airdam'
              ],
              'aero-plus-a' => [
                'Side Visor',
                'Muffler Cutter',
                'Front Airdam',
                'Side Airdam',
                'Rear Airdam',
                'Hood Emblem',
                'Luggage Mat',
                'Door Mirror Chrome'
              ],
              'aero-plus-b' => [
                'Side Visor',
                'Muffler Cutter',
                'Front Airdam',
                'Side Airdam',
                'Rear Airdam',
                'Hood Emblem',
                'Luggage Mat'
              ],
              'chrome' => [
                'Muffler Cutter',
                'Wheel Lock Nut'
              ],
            ];

            $variants_price = [
              'original' => '',
              'basic' => 'Rp 720.000',
              'aero' =>  'Rp 4.300.000',
              'aero-plus-a' => 'Rp 6.100.000',
              'aero-plus-b' => 'Rp 5.600.000',
              'chrome' => 'Rp 598.000'
            ];

            $data['car_switch']['text'] = 'PAJERO SPORT';
            $data['car_switch']['url'] = 'pajero';
            $data['car_switch']['color'] = 'brown';

            $extra_images = [
              [
                'src' => asset('website_assets/images/extra/xpander/scuff_plate.jpg'),
                'title' => 'Scuff Plate - Rp 345.000'
              ],
              [
                'src' => asset('website_assets/images/extra/xpander/side.jpg'),
                'title' => 'Side Body Molding - Rp 585.000'
              ],
              [
                'src' => asset('website_assets/images/extra/xpander/fuel.jpg'),
                'title' => 'Fuel Lid Garnish - Rp 226.000'
              ]
            ];
        }

        if (!in_array($car, $cars) || !in_array($color, $colors) || !in_array($variant, $variants)) {
            abort(404);
        }

        $data['car'] = $car;
        $data['color'] = $color;
        $data['colors'] = $colors;
        $data['variant'] = $variant;
        $data['variants'] = $variants;
        $data['variants_detail'] = $variants_detail;
        $data['variants_price'] = $variants_price;
        $data['extra_images'] = $extra_images;

        // dd($data);

        // return view('home.show', compact('data','car','color','colors','variant','variants','variants_detail','variants_price','extra_images'));
        return view('home.show', $data);
    }

    public function brosur()
    {
        return view('home.brosur');
    }
}
