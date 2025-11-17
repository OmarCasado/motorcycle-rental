<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="container mt-8 mb-16">
    <h2 class="text-xl font-semibold mb-3">Availability calendar</h2>

    <input id="availabilityCalendar" type="text" class="w-full" readonly>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Rango de fechas ocupadas enviado desde el controlador
    const disabledRanges = @json($disabledDateRanges);

    flatpickr('#availabilityCalendar', {
        inline: true,
        dateFormat: 'Y-m-d',
        showMonths: 1,
        disable: disabledRanges,
        locale: { firstDayOfWeek: 1 },
        minDate: 'today',
    });
});
</script>