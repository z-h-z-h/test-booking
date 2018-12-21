<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingFormRequest;
use App\Services\BookingApi;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function handleForm(BookingFormRequest $request, BookingApi $api)
    {
        $data = $request->validated();

        [$data['checkin'], $data['checkout']] = explode(' - ', $data['dates']);
        $data['phone'] = str_replace(' ', '', $data['phone']);

        dd($data);

        $id = $api->makeBooking([
            ['name' => 'Имя', 'value' => $data['name']],
            ['name' => 'Телефон', 'value' => $data['phone']],
            ['name' => 'Дата заезда', 'value' => $data['checkin']],
            ['name' => 'Дата выезда', 'value' => $data['checkout']],
        ]);

        return view('result', ['id' => $id]);
    }
}
