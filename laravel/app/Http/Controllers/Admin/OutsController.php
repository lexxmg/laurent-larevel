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

        if (!$gpioId) {
            return abort('419');
        }

        $type = Gpio::find($gpioId)->type;
        $modes = Mode::find([2, 3]);

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
            $outCount = $request->outCount;
            $type = $request->type;
            $icons = Icon::all();
            
            if ($outCount === '1') {
                if ($type === 'relle') {
                    return view('admin.outs.create-virt-one-relle', [
                        'gpioId' => $gpioId,
                        'laurents' => $laurents,
                        'icons' => $icons
                    ]);
                }

                if ($type === 'out') {
                    return view('admin.outs.create-virt-one-out', [
                        'gpioId' => $gpioId,
                        'laurents' => $laurents,
                        'icons' => $icons
                    ]);
                }
            }

            if ($outCount === '2') {
                if ($type === 'relle') {
                    return view('admin.outs.create-virt-two-relle', [
                        'gpioId' => $gpioId,
                        'laurents' => $laurents,
                        'icons' => $icons
                    ]);
                }

                if ($type === 'out') {
                    return view('admin.outs.create-virt-two-out', [
                        'gpioId' => $gpioId,
                        'laurents' => $laurents,
                        'icons' => $icons
                    ]);
                }
            }

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
        $rev = $request->rev ? $rev = true : $rev = false;
        $confirm = $request->confirm ? $confirm = true : $confirm = false;
        
        $type = Gpio::find($gpioId)->type;

        if ($type === 'out' || $type === 'relle') {
            $outs = Out::create([
                'name' => $name,
                'gpio_id' => (int) $gpioId,
                'laurent_id' => (int) $laurentId,
                'icon_id' => (int) $iconId,
                'mode_id' => (int) $modeId,
                'revers' => $rev,
                'confirm' => $confirm
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
            $outCount = $request->outCount;
            $virt_on = $request->virt_on;
            $virt_type = $request->virt_type;

            if ($outCount === '1') {
                $virt = Out::create([
                    'name' => $name,
                    'gpio_id' => (int) $gpioId,
                    'icon_id' => (int) $iconId,
                    'mode_id' => 4,
                    'virt_on' => (int) $virt_on,
                    'virt_type' => $virt_type,
                    'revers' => $rev,
                    'confirm' => $confirm,
                    'laurent_id' => (int) $laurentId
                ]);

                if ($virt) {
                    return redirect()->route('admin.outs.index');
                }
            }

            if ($outCount === '2') {
                $virt_off = $request->virt_off;

                $virt = Out::create([
                    'name' => $name,
                    'gpio_id' => (int) $gpioId,
                    'icon_id' => (int) $iconId,
                    'mode_id' => 4,
                    'virt_on' => (int) $virt_on,
                    'virt_off' => (int) $virt_off,  // номер выхода или NULL
                    'virt_type' => $virt_type,
                    'revers' => $rev,
                    'confirm' => $confirm,
                    'laurent_id' => (int) $laurentId
                ]);

                if ($virt) {
                    return redirect()->route('admin.outs.index');
                }
            }
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
        $outs = Out::find($id);
        $laurents = Laurent::all();
        $icons = Icon::all();
        $type = $outs->gpio->type;
        $modes = Mode::find([2, 3]);

        if ($type === 'temp' || $type === 'abc1' || $type === 'abc2') {
            dd($type);
        }


        if ($type === 'out' || $type === 'relle') {
            return view('admin.outs.edit-out',[
                'laurents' => $laurents,
                'icons' => $icons,
                'modes' => $modes,
                'id' => $id,
                'currentName' => $outs->name,
                'currentMode' => $outs->mode_id,
                'currentLaurentId' => $outs->laurent_id,
                'currentRev' => $outs->revers,
                'currentConfirm' => $outs->confirm,
                'currentIcon' => $outs->icon_id
            ]);
        }
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
        $out = Out::find($id);
        $type = $out->gpio->type;

        $laurentId = $request->laurent;
        $name = $request->name;
        $iconId = $request->icon;
        $modeId = $request->mode;
        $rev = $request->rev ? $rev = true : $rev = false;
        $confirm = $request->confirm ? $confirm = true : $confirm = false;
        
        if ($type === 'temp' || $type === 'abc1' || $type === 'abc2') {
            $out->name = $name;
            $out->save();

            return redirect()->route('admin.outs.index'); 
        }

        
        if ($type === 'out' || $type === 'relle') {
            $out->name = $name;
            $out->revers = $rev;
            $out->confirm = $confirm;
            $out->laurent_id = $laurentId;
            $out->icon_id = $iconId;
            $out->mode_id = $modeId;
            $out->save();

            return redirect()->route('admin.outs.index'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Out::destroy($id);
        
        return redirect()->route('admin.outs.index');
    }
}
