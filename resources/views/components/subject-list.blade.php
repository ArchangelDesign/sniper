@props(['subjects'])
<table class="">
    <thead>
    <tr><td>URL</td></tr>
    </thead>
    @foreach($subjects as $subject)
        <tr><td>{{ $subject->getUrl() }}</td></tr>
    @endforeach
</table>
