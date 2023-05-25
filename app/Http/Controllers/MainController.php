<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function saveReservation(Request $request)
    {
        $request->validate([
            'date_first' => 'required|date|after:today|unique:reservations',
            'date_second' => 'required|date|after_or_equal:date_first|unique:reservations',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:12',
            'email' => 'required|email',

        ], [
            'date_first.required' => 'Поле дату заїзду пусте',
            'date_second.required' => 'Поле дату виїзду пусте',
            'date_first.unique' => 'Така дата заїзду зайнята, виберіть іншу',
            'date_second.unique' => 'Така дата виїзду, виберіть іншу',
            'date_first.date' => 'Формат дата заїзду не вірний. Правильний формат д.м.р',
            'date_second.date' => 'Формат дата виїзду, не вірний. Правильний формат д.м.р',
            'date_first.after' => 'Дата заїзду не повина бути менша ніж сьогоднішня',
            'date_second.date|after_or_equal' => 'Дата виїзду не повина бути менша ніж Дата заїзду',
            'phone.required' => 'Поле номер телефону пусте',
            'phone.regex' => 'Поле номер телефону не вірне',
            'phone.min' => 'Поле номер телефону має містити 12 симвалів',
            'email.required' => 'Поле e-mail пусте',
            'email.email' => 'Поле e-mail повино містити @',
        ]);

        $modelReservation = new Reservation();
        $data = $request->all();


        $modelReservation->saveReservation($data);


        return redirect('/')->withSuccess('Успешно!');
    }

    public function removeReservation(int $id, int $index)
    {
        $modelReservation = new Reservation();

        $modelReservation->removeReservation($id, $index);

        return redirect('/');
    }
}


