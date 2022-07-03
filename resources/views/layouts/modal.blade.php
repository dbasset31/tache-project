<script>
    $(document).ready(function () {
        $('.btn-close').click(function () {
            setTimeout(closeModal, 500);
        })
        $('.modal-backdrop').click(function () {
            setTimeout(closeModal, 500);
        })
    })
</script>
<div id="modalbox" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                @yield('modal-header')
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @yield('modal-body')
            </div>
            <div class="modal-footer">
                @yield('modal-footer')
            </div>
        </div>
    </div>
</div>


