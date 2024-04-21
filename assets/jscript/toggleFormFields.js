    function toggleFormFields(selectorId, fieldIds,idToggle) {
        const selector = document.getElementById(selectorId);
        const fields = fieldIds.map(id => document.getElementById(id));

        selector.addEventListener("change", function() {
            const isChecked = selector.checked;
            fields.forEach(field => {
                field.required = isChecked;
                field.disabled = isChecked ? false : true;
            });
        });
    }