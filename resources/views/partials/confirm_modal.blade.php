<div id="delCompModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please Confirm</h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body form-auth-style">
                <div class="form-group">
                    <p>Are you sure you want to remove this record?</p>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-custom-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger delCompConfirm">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            let modalDiv = $('#delCompModal');
            $('.delCom').on('submit', function(e){
                e.preventDefault();
                let form = e.target;
                modalDiv.modal('show');

                modalDiv.find('.delCompConfirm').on('click',function (){
                    form.submit();
                })
            });
        });
    </script>
@endpush
