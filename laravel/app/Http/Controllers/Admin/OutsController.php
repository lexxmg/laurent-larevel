<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gpio;
use App\Models\Icon;
use App\Models\Laurent;
use App\Models\Mode;
use App\Models\Out;
use Illuminate\Http\Request;

class OutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $outs = Out::all();
        $gpio = Gpio::all();

        $authUser = $request->user();
        return view('admin.outs.index', [
            'user' => $authUser,
            'outs' => $outs,
            'gpio' => $gpio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $laurents = Laurent::all();
        $gpioId = $request->gpio;
        $type = Gpio::find($gpioId)->type;
        $modes = Mode::all();

        if ($type === 'out' || $type === 'relle') {
            $icons = Icon::all();

            return view('admin.outs.create-out', [
                'gpioId' => $gpioId,
                'laurents' => $laurents,
                'icons' => $icons,
                'modes' => $modes
            ]);
        }

        if ($type === 'temp' || $type === 'abc1' || $type === 'abc2') {
            return view('admin.outs.create-abc', [
                'gpioId' => $gpioId,
                'laurents' => $laurents
            ]);
        }

        if ($type === 'virt') {
            return view('admin.outs.create-virt', [
                'gpioId' => $gpioId,
                'laurents' => $laurents
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laurentId = $request->laurent;
        $gpioId = $request->gpioId;
        $name = $request->name;
        $iconId = $request->icon;
        $modeId = $request->mode;

        
        $type = Gpio::find($gpioId)->type;

        if ($type === 'out' || $type === 'relle') {
            $outs = Out::create([
                'name' => $name,
                'gpio_id' => (int) $gpioId,
                'laurent_id' => (int) $laurentId,
                'icon_id' => (int) $iconId,
                'mode_id' => (int) $modeId
            ]);

            if ($outs) {
                return redirect()->route('admin.outs.index');
            }
        }

        if ($type === 'temp' || $type === 'abc1' || $type === 'abc2') {
            $outs = Out::create([
                'name' => $name,
                'gpio_id' => (int) $gpioId,
                'laurent_id' => (int) $laurentId
            ]);

            if ($outs) {
                return redirect()->route('admin.outs.index');
            }
        }

        if ($type === 'virt') {
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
