var bodyDisplay = document.body.style.display;
bodyDisplay = 'none';
window.addEventListener('load', function(e) {
    bodyDisplay = 'unset';
});