 <!-- resources/views/applications-data/migration-form.blade.php -->
<form action="{{ route('application.store', $student->id) }}" method="POST">
    @csrf
    <input type="hidden" name="head_id" value="{{ $head->id }}">
    
    <div>
        <p>Student: {{ $student->name }}</p>
        <p>Receipt Number: {{ $receipt->re_number }}</p>
        <!-- Add other form fields as needed -->
    </div>
    
    <button type="submit">Submit Application</button>
</form>
