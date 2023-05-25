<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Reservation extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function saveReservation(array $data)
    {
        $this->date_first = Carbon::parse($data['date_first']);
        $this->date_second = Carbon::parse($data['date_second']);
        $this->phone = $data['phone'];
        $this->email = $data['email'];

        $reservation = $this->save();

        if (!is_null($this->id)) {
            $sessionData = [
                'date_first' => Carbon::parse($data['date_first'])->locale('uk_UA')->isoFormat('D MMMM YYYY'),
                'date_second' => Carbon::parse($data['date_second'])->locale('uk_UA')->isoFormat('D MMMM YYYY'),
                'id' => $this->id,

            ];

            session()->push('reservations', $sessionData);
        }

        return $this->id;
    }

    public function removeReservation(int $id, int $index)
    {
        $result = $this->destroy($id);

        if ($result) {
            session()->forget('reservations', $index);
        }


        return $result;
    }
}