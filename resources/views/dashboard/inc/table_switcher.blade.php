<div class="row">
    <div class="col-sm-12 mb-1">
        <div class="row">
            <div class="col">
                <div class="custom-control custom-switch d-inline">
                    <input type="checkbox" class="custom-control-input addon" id="ExportButton">
                    <label class="custom-control-label" for="ExportButton">Export Buttons</label>
                </div>
                <span id="counterDiv" class="ml-4"> Show
                    <select id="counterNumber">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50" selected>50</option>
                        <option value="100">100</option>
                    </select>
                    entries
                </span>
            </div>
        </div>
    </div>
</div>

@push('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        var addon = $('#ExportButton:checked').val();
        $('#displayTable').DataTable();
        $('#counterDiv').hide();

        reformTable(addon);

        $('#ExportButton').change(function(){
            addon = $('#ExportButton:checked').val();
            reformTable(addon);
        });

        function reformTable(addon, counter){
            if(addon == 'on')
            {
                $('#counterDiv').show();
                $('#displayTable').DataTable({
                    "destroy": true,
                    dom: 'Bfrtip',
                    "lengthMenu": [10, 25, 50, "All"],
                    "pageLength":   50,
                    "paging":   true,
                    "ordering": true,
                    "info":     true,
                    "searching": true,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                
            }else
            {
                $('#counterDiv').hide();
                $('#displayTable').DataTable({
                    "destroy": true,
                    "lengthMenu": [10, 25, 50, "All"],
                    "pageLength":   10,
                    "paging":   true,
                    "ordering": true,
                    "info":     true
                });
            }
        }

        $('#counterNumber').change(function(){
            var showNumber = $('#counterNumber').val();
            $('#displayTable').DataTable({
                "destroy": true,
                dom: 'Bfrtip',
                "pageLength":   showNumber,
                "paging":   true,
                "ordering": true,
                "info":     true,
                "searching": true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });

    });
</script>

@endpush