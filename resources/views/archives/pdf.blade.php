<!DOCTYPE html>
<html>
<head>
    <title>Archive PDF</title>
</head>
<body>
    <h1>Archive Data</h1>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Post</th>
                <th>Date</th>
                <th>Caption</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeds as $feed)
                <tr>
                    <td>
                        @if ($feed->file_type === 'image')
                            <img src="{{ public_path($feed->file_path) }}" alt="Image" width="50">
                        @elseif ($feed->file_type === 'video')
                            Video: {{ $feed->file_path }}
                        @endif
                    </td>
                    <td>{{ $feed->created_at->format('d M Y') }}</td>
                    <td>{{ $feed->caption }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
