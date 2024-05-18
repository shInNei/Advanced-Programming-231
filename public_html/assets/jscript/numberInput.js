document.querySelectorAll('input[type="number"]').forEach(function(input) {
    input.addEventListener("input", function(event) {
        let input = event.target;
        let value = input.value.trim();
        
        // Remove non-numeric characters
        input.value = value.replace(/\D/g, '');
    });
});