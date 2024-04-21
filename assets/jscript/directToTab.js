window.addEventListener('DOMContentLoaded', (event) => {
    // Function to parse URL parameters
    console.log("echo");
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    };

    // Activate tab based on URL parameter
    var tabToActivate = getUrlParameter('tab');
    if (tabToActivate) {
        activateTab(tabToActivate);
    }
});

function activateTab(tabId) {
    // Remove 'show active' class from all tab panes
    document.querySelectorAll('.tab-pane').forEach(function(tabPane) {
        tabPane.classList.remove('show', 'active');
    });

    // Remove 'active' class from all tab links
    document.querySelectorAll('a[data-bs-toggle="tab"]').forEach(function(tabLink) {
        tabLink.classList.remove('active');
    });

    // Add 'show active' class to the specified tab pane
    document.getElementById(tabId).classList.add('show', 'active');

    // Add 'active' class to the corresponding tab link
    document.querySelector('a[data-bs-target="#' + tabId + '"]').classList.add('active');
}

