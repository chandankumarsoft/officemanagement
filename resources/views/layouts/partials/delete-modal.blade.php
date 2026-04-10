{{-- resources/views/layouts/partials/delete-modal.blade.php --}}
{{--
    Reusable Bootstrap 5 delete confirmation modal.

    How to use on any delete button:
        <button type="button"
                class="btn btn-sm btn-outline-danger"
                data-bs-toggle="modal"
                data-bs-target="#deleteModal"
                data-action="{{ route('admin.xxxxx.destroy', $item) }}"
                data-message="Delete '{{ $item->name }}'? This cannot be undone.">
            <i class="bi bi-trash"></i>
        </button>
--}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow">

            <div class="modal-header border-0 pb-0" style="background:#fff3f3;border-radius:12px 12px 0 0;">
                <h6 class="modal-title text-danger fw-semibold" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Confirm Delete
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-3">
                <p id="deleteMessage" class="text-muted small mb-0">
                    Are you sure you want to delete this record? This action cannot be undone.
                </p>
            </div>

            <div class="modal-footer border-0 pt-1">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                    <i class="bi bi-x me-1"></i>Cancel
                </button>
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash me-1"></i>Delete
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
