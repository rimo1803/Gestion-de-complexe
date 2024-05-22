
<form action="{{ route('approveLeave', $leaveRequest->id) }}" method="POST">
    @csrf
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Approuver</button>
</form>
<form action="{{ route('rejectLeave', $leaveRequest->id) }}" method="POST">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Refuser</button>
</form>
