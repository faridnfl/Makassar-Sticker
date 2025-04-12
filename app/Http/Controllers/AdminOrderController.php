<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
        public function index(Request $request)
    {
        $query = Order::query();

        if ($request->has('search')) {
            $query->where('order_id', 'like', '%' . $request->search . '%');
        }

        $orders = $query->latest()->paginate(10)->withQueryString();

        return view('admin.orders', compact('orders'));
    }

        public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:dalam proses,pesanan diterima,siap diambil,selesai',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pesanan diperbarui.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);


        if ($order->stnk_file && \Storage::disk('public')->exists($order->stnk_file)) {
            \Storage::disk('public')->delete($order->stnk_file);
        }


        $order->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
    
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'nullable',
            'vehicle_number' => 'required',
            'plate_size' => 'required',
            'plate_material' => 'required',
            'plate_color' => 'required',
            'font_type' => 'required',
            'finishing' => 'required',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable',
            'stnk_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);
    
        if ($request->hasFile('stnk_file')) {
            if ($order->stnk_file && \Storage::disk('public')->exists($order->stnk_file)) {
                \Storage::disk('public')->delete($order->stnk_file);
            }
            $newPath = $request->file('stnk_file')->store('stnk_files', 'public');
            $validated['stnk_file'] = $newPath;
        }
    
        $order->update($validated);
    
        return redirect()->back()->with('success', 'Pesanan berhasil diperbarui.');
    }
    

}
