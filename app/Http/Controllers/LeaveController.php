<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest; // Assurez-vous d'importer le modèle LeaveRequest approprié

class LeaveController extends Controller
{
    public function approve($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->status = 'approved';
        $leaveRequest->save();

        // Vous pouvez rediriger vers une vue de confirmation ou une autre page
        return redirect()->route('leaveRequests.index')->with('success', 'Demande de congé approuvée avec succès.');
    }

    public function reject($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->status = 'rejected';
        $leaveRequest->save();

        // Vous pouvez rediriger vers une vue de confirmation ou une autre page
        return redirect()->route('leaveRequests.index')->with('success', 'Demande de congé rejetée.');
    }
}
