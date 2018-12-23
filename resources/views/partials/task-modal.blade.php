<!-- Modal -->
<div class="modal fade" id="task-modal" tabindex="-1" role="dialog" aria-labelledby="task-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h5 class="modal-title" id="task-title">Modal title</h5>
                <div class="mx-5 small"><span id="status"></span></div>
                <div class="ml-5 small"><i class="far fa-clock"></i>&nbsp;<span id="created-at"></span></div>
                <div class="ml-3 small"><i class="fas fa-stopwatch"></i>&nbsp;<span id="deadline"></span></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="task-desc"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>