<?php
namespace App\Http\Controllers;

use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Personnel;

use PDF;

class CongeController extends Controller
{
    public function index()
    {
        $conges = Conge::where('personnel_id', Auth::id())->get();
        return view('conges.index', compact('conges'));
    }

    public function create()
    {
        return view('conges.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);

        $reliquat = (new \DateTime($request->date_fin))->diff(new \DateTime($request->date_debut))->days;

        Conge::create([
            'personnel_id' => Auth::id(),
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'reliquat' => $reliquat,
            'status' => 'en attente',
        ]);

        return redirect()->route('conges.index')->with('success', 'Demande de congé créée avec succès.');
    }


    public function edit(Conge $conge)
    {
        if ($conge->status != 'en attente' || $conge->personnel_id != Auth::id()) {
            return redirect()->route('conges.index')->with('error', 'Vous ne pouvez pas modifier cette demande.');
        }

        return view('conges.edit', compact('conge'));
    }

    public function update(Request $request, Conge $conge)
    {
        if ($conge->status != 'en attente' || $conge->personnel_id != Auth::id()) {
            return redirect()->route('conges.index')->with('error', 'Vous ne pouvez pas modifier cette demande.');
        }

        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);

        $reliquat = (new \DateTime($request->date_fin))->diff(new \DateTime($request->date_debut))->days;

        $conge->update([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'reliquat' => $reliquat,
        ]);

        return redirect()->route('conges.index')->with('success', 'Demande de congé mise à jour avec succès.');
    }


    public function destroy(Conge $conge)
    {
        if ($conge->status != 'en attente' || $conge->personnel_id != Auth::id()) {
            return redirect()->route('conges.index')->with('error', 'Vous ne pouvez pas supprimer cette demande.');
        }

        $conge->delete();
        return redirect()->route('conges.index')->with('success', 'Demande de congé supprimée avec succès.');
    }

    public function decision(Request $request, Conge $conge)
    {
        $decision = $request->input('decision');
        $conge->status = $decision == 'acceptée' ? 'acceptée' : 'refusée';

        if ($decision == 'acceptée') {
            // Générer le PDF de la décision seulement si acceptée
            $pdf = PDF::loadView('pdf.decision', ['conge' => $conge, 'decision' => $decision]);

            // Enregistrer le PDF dans le disque public
            $pdfPath = 'decisions/decision_conge_' . $conge->id . '.pdf';
            Storage::disk('public')->put($pdfPath, $pdf->output());

            // Mettre à jour le chemin du fichier de décision dans la base de données
            $conge->decision_conge = $pdfPath;
        } else {
            // Si refusée, on peut mettre à jour ou supprimer l'ancienne décision si elle existe
            if ($conge->decision_conge) {
                Storage::disk('public')->delete($conge->decision_conge);
            }
            $conge->decision_conge = null;
        }

        $conge->save();

        return redirect()->route('conges.pending')->with('success', 'Décision de congé mise à jour avec succès.');
    }

    public function downloadDecision(Conge $conge)
    {
        if (Storage::disk('public')->exists($conge->decision_conge)) {
            return Storage::disk('public')->download($conge->decision_conge);
        }

        return redirect()->route('conges.index')->with('error', 'Le fichier de décision n\'existe pas.');
    }

    public function showPendingRequests()
    {
        if (!Auth::user()->isDirecteur()) {
            return redirect()->route('conges.index')->with('error', 'Vous n\'avez pas l\'autorisation.');
        }

        // Récupérer les personnels qui ne sont pas en congé pour les dates des congés en attente
        $conges = Conge::where('status', 'en attente')->get();
        $personnels = Personnel::whereNotIn('id', $conges->pluck('personnel_id'))->get();

        return view('conges.pending', compact('conges', 'personnels'));
    }


    public function accept(Request $request, Conge $conge)
{
    $decision = 'acceptée';
    $request->validate([
        'remplacement' => 'required|string|max:255',
    ]);

    // Update the replacement field
    $conge->update([
        'remplacement' => $request->remplacement,
    ]);

    // Generate the PDF
    $pdf = PDF::loadView('pdf.decision', ['conge' => $conge, 'decision' => $decision]);

    $pdfPath = 'decisions/decision_conge_' . $conge->id . '.pdf';
    Storage::disk('public')->put($pdfPath, $pdf->output());

    // Update the status and decision_conge fields
    $conge->update([
        'status' => 'acceptée',
        'decision_conge' => $pdfPath,
    ]);

    return redirect()->route('conges.index')->with('success', 'La décision de congé a été acceptée et le PDF a été généré.');
}


    public function refuse(Request $request, Conge $conge)
    {
        $conge->update([
            'status' => 'refusée',
            'decision_conge' => null,
        ]);

        return redirect()->route('conges.index')->with('success', 'La demande de congé a été refusée.');
    }
}
