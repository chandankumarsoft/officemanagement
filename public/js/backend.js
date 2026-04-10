/**
 * OfficeMgmt Backend JS  –  public/js/backend.js
 */

document.addEventListener('DOMContentLoaded', function () {

    /* --------------------------------------------------------
     * Delete confirmation modal
     * Buttons that trigger it must have:
     *   data-bs-toggle="modal"
     *   data-bs-target="#deleteModal"
     *   data-action="<form POST url>"
     *   data-message="<optional custom message>"
     * -------------------------------------------------------- */
    var deleteModalEl = document.getElementById('deleteModal');
    if (deleteModalEl) {
        deleteModalEl.addEventListener('show.bs.modal', function (e) {
            var btn    = e.relatedTarget;
            var action = btn ? btn.getAttribute('data-action') : null;
            var msg    = btn ? btn.getAttribute('data-message') : null;

            var form = document.getElementById('deleteForm');
            var msgEl = document.getElementById('deleteMessage');

            if (form && action) { form.action = action; }
            if (msgEl && msg)   { msgEl.textContent = msg; }
        });
    }

    /* --------------------------------------------------------
     * Auto-dismiss flash alerts after 5 seconds
     * -------------------------------------------------------- */
    var alerts = document.querySelectorAll('.alert.auto-dismiss');
    alerts.forEach(function (el) {
        setTimeout(function () {
            var bsAlert = bootstrap.Alert.getOrCreateInstance(el);
            if (bsAlert) { bsAlert.close(); }
        }, 5000);
    });

    /* --------------------------------------------------------
     * Mobile sidebar toggle
     * -------------------------------------------------------- */
    var sidebarOverlay = document.getElementById('sidebarOverlay');
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function () {
            document.getElementById('sidebar').classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });
    }
    var menuToggle = document.getElementById('menuToggle');
    if (menuToggle) {
        menuToggle.addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('show');
            if (sidebarOverlay) { sidebarOverlay.classList.toggle('show'); }
        });
    }

});
