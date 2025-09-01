<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\File;
use App\Http\Resources\BookingResource;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    function auth(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'contact' => ['required'],
        ]);

        if (!empty($request->auth_code)) {
            if ($request->session()->get('auth_code') == $request->auth_code) {
                $request->session()->put('name', $request->name);
                $request->session()->put('contact', $request->contact);
                $request->session()->forget('auth_code');
                return Redirect::back()->with('success', '정상적으로 인증되었습니다.');
            } else {
                return Redirect::back()->with('error', '인증번호를 다시 확인해 주세요.');
            }
        }

        $exists = Booking::where('name', $request->name)
            ->where('contact', $request->contact)
            ->exists();

        if (!$exists) {
            return Redirect::back()->with('error', '정보가 확인되지 않습니다.');
        }

        $auth_code = six_digit_code();
        Log::debug('auth_code: ' . $auth_code);

        $result = send_sms($request->contact, '[' . config('app.name') . '] 인증번호 [' . $auth_code . '] 입력해 주세요.');
        if ($result->result_code != "1") {
            return Redirect::back()->with('error', $result->message);
        }

        $request->session()->put('auth_code', $auth_code);

        return Redirect::back()->with('success', '인증번호가 발송되었습니다.');
    }

    function create(Request $request)
    {
        // $request->session()->forget('name');
        // $request->session()->forget('contact');

        // 이미 예약된 날짜
        $booked_dates = Booking::where('active', '!=', 2)
            ->where('booking_date', '>', \Carbon\Carbon::now()->format('Y-m-d'))->get()
            ->map(function ($data) {
                return \Carbon\Carbon::parse($data->booking_date)->toIso8601String();
            })->toArray();

        return Inertia::render('Booking/Create', ['bookedDates' => $booked_dates]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bookingDate' => ['required'],
            'numberAdult' => ['required', 'numeric'],
            'numberTeenager' => ['required', 'numeric'],
            'numberChild' => ['required', 'numeric'],
            'name' => ['required'],
            'contact' => ['required'],
            'email' => ['required', 'email'],
            // 'image' => ['required', File::image()->max('10mb')],
        ]);

        $booking_date = \Carbon\Carbon::parse($request->bookingDate)->format('Y-m-d');

        $booking = Booking::create([

            // https://laraveldaily.com/post/generate-random-strings-laravel-helper-methods
            'code' => bin2hex(random_bytes(10)),

            'booking_date' => $booking_date,
            'number_adult' => $request->numberAdult,
            'number_teenager' => $request->numberTeenager,
            'number_child' => $request->numberChild,
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
        ]);

        // 파일첨부
        if ($request->image) {
            $booking->addMedia($request->image)->toMediaCollection();
        }

        return Redirect::back()->with('success', '[예약완료] 확인 후 연락을 드리겠습니다.');
    }

    function index(Request $request)
    {
        // $request->session()->forget('name');
        // $request->session()->forget('contact');

        $bookings = null;
        $booking = null;
        $booked_dates = null;
        $auth = $request->session()->get('name') && $request->session()->get('contact') ? true : false;

        if ($auth) {
            if (!empty($request->code)) {
                $booking = Booking::where('code', $request->code)->first();
                $booking = new BookingResource($booking);

                // 이미 예약된 날짜
                $booked_dates = Booking::where('active', '!=', 2)
                    // ->where(DB::raw('date(created_at)'), '>', \Carbon\Carbon::now()->format('Y-m-d'))
                    ->where('code', '!=', $request->code)
                    ->get()
                    ->map(function ($data) {
                        return \Carbon\Carbon::parse($data->booking_date)->toIso8601String();
                    })->toArray();
            } else {
                $bookings = Booking::where('name', $request->session()->get('name'))
                    ->where('contact', $request->session()->get('contact'))
                    ->latest()
                    ->paginate(10);
                $bookings = BookingResource::collection($bookings);
            }
        }
        return Inertia::render('Booking/List', [
            'bookings' => $bookings,
            'booking' => $booking,
            'bookedDates' => $booked_dates,
            'auth' => $auth,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'bookingDate' => ['required'],
            'numberAdult' => ['required', 'numeric'],
            'numberTeenager' => ['required', 'numeric'],
            'numberChild' => ['required', 'numeric'],
        ]);

        $booking_date = \Carbon\Carbon::parse($request->bookingDate)->format('Y-m-d');

        $booking = Booking::find($request->id);
        if ($booking == null) {
            return Redirect::back()->with('error', '해당 예약정보가 없습니다.');
        }

        $booking->update([
            'booking_date' => $booking_date,
            'number_adult' => $request->numberAdult,
            'number_teenager' => $request->numberTeenager,
            'number_child' => $request->numberChild,
        ]);

        return Redirect::back()->with('success', '정상적으로 변경되었습니다.');
    }

    public function cancel(Request $request)
    {
        $booking = Booking::find($request->id);
        if ($booking == null) {
            return Redirect::back()->with('error', '해당 예약정보가 없습니다.');
        }

        $booking->update([
            'active' => 2,
        ]);

        return Redirect::back()->with('success', '정상적으로 취소되었습니다.');
    }

    function estimate(Request $request)
    {
        return Inertia::render('Booking/Estimate');
    }
}
