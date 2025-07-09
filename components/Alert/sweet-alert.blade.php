{{-- @props(['event', 'title' => 'Are you sure?', 'text' => 'This action cannot be undone.', 'icon' => 'warning', 'confirmEvent'])

<script>
    window.addEventListener('{{ $event }}', () => {
        Swal.fire({
            title: @js($title),
            text: @js($text),
            icon: @js($icon),
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                @if ($confirmEvent)
                    Livewire?.emit('{{ $confirmEvent }}');
                @endif
            }
        });
    });
</script> --}}

{{-- 
@props(['event', 'title' => 'Are you sure?', 'text' => 'This action cannot be undone.', 'icon' => 'warning'])

<script>
    window.addEventListener('{{ $event }}', (e) => {
        const data = e.detail;

        Swal.fire({
            title: @js($title),
            text: @js($text),
            icon: @js($icon),
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Option 1: Submit a hidden form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/users/${data.id}`; // change to your route
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();

                // Option 2 (alternative): use fetch() or window.location
                // window.location.href = `/users/delete/${data.id}`;
            }
        });
    });
</script> --}}

{{-- 

<script>
    const handleSweetAlert = (eventName, callback) => {
        window.addEventListener(eventName, (e) => {
            const { id, type, title, text, icon, url } = e.detail;

            Swal.fire({
                title: title || 'Are you sure?',
                text: text || 'This action cannot be undone.',
                icon: icon || 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed && typeof callback === 'function') {
                    callback({ id, type, url });
                }
            });
        });
    };

    // Example: For delete
    handleSweetAlert('btnDeleteUser', ({ id }) => {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/users/${id}`;
        form.innerHTML = `
            @csrf
            @method('DELETE')
        `;
        document.body.appendChild(form);
        form.submit();
    });

    // Example: For update
    handleSweetAlert('btnUpdate', ({ id, url }) => {
        // Example: navigate or trigger update logic
        window.location.href = url || `/users/${id}/edit`;
    });
</script> --}}


<script>
    window.addEventListener('btnDeleteUser', (e) => {
        const data = e.detail;

        Swal.fire({
            title: data.title || 'Are you sure?',
            text: data.text || 'This action cannot be undone.',
            icon: data.icon || 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/users/${data.id}`;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
</script>
