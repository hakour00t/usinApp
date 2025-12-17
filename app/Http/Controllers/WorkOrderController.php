<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use Illuminate\Http\Request;
use App\Models\Lote;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workOrders = WorkOrder::all();
        return view('workOrders.index' , compact('workOrders'));
    }

    public function create()
    {
        $lotes = Lote::all();
        return view('workOrders.create' , compact('lotes'));
    }

    public function store(Request $request)
    {
            // dd($request->all());

      try{ 
            $validated = $request->validate([

                'description' => 'required',
                'date_creation'=> 'required',
                'date_debut'=> 'required',
                // 'date_cloture'=> 'required',
                'quantite_planifiee'=> 'required',
                'date_de_finaliser'=> 'required',
                'lote_id' => 'required',
            ]);

        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
        
        $today = Carbon::now()->format('Ymd');
        $last = WorkOrder::where('id', 'like','WO-' . $today . '%')->orderBy('id', 'desc')->first();

        if ($last) {
            
            $lastNumber = (int) substr($last->id, -2);
            $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
        } else {
           
            $nextNumber = "01";
        }
        $newId = 'WO-' . $today .'-'. $nextNumber;

        // dd($request->quantite_planifiee);
       try{ 
            $work_order = WorkOrder::create([
                'id' => $newId,
                'description' => $request->description ,
                'date_creation'=> $request->date_creation,
                'date_debut'=> $request->date_debut,
                'date_cloture' =>$request->date_cloture,
                'quantite_planifiee' => $request->quantite_planifiee,
                'date_de_finaliser'  =>$request->date_de_finaliser,
                'lote_id' =>$request->lote_id,
                'user_id' => Auth::id()
            ]);
             return redirect()->route('work_order.index')->with('sucss' , 'Work Order est ajeuter .');
        }catch(QueryException $e){return back()->withErrors($e->validator)->withInput(); }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkOrder $workOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkOrder $id)
    {
        
         try {
            $wo = WorkOrder::findOrFail($id); 
            $wo->delete();  
            return redirect()->back()->with('success', 'Work order est supprimé avec succès.');
            } catch (ModelNotFoundException $e) {
                return back()->with('error', 'Ce work order n\'existe pas.');
            } catch (QueryException $e) {
                return back()->with('error','Impossible de supprimer : ce work order est utilisé ailleurs.');
            } catch (Exception $e) {
                return back()->with('error', $e->getMessage());
            }
    }
}
