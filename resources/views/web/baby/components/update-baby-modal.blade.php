<div class="modal fade" id="update-baby-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-body">
                <div class="d-flex align-items-start justify-content-between mb-4">
                    <h4>Baby Information</h4>
                    <button type="button" class="btn-close" id="baby-modal-close" onclick="modalClose()" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
                <form enctype="multipart/form-data" method="post" action="{{ route('baby.update') }}" class="row g-3 basic-input mb-0">
                    @csrf
                    <input class="hide" value="{{ isset($baby) ? $baby->id : '' }}" name="id" type="text" id="id" hidden>
                    <div class="col-md-12 mt-2 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Baby Name - শিশুর নাম</label>
                        <input value="{{ isset($baby) ? $baby->name : old('name') }}" name="name" type="text" id="name" placeholder="Enter name" maxlength="50" required>
                        @error('name') <span class="text-danger"><i class="entypo-info-circled"></i>  {{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12 mt-2 {{ $errors->has('inseminationDate') ? 'has-error' : '' }}">
                        <label for="inseminationDate">Approximate Insemination Date - আনুমানিক গর্ভধারণের তারিখ</label>
                        <input @if (isset($baby->inseminationDate)) value="{{ $baby->inseminationDate }}" @endif name="inseminationDate" type="text" id="inseminationDate" placeholder="15-05-2022" required>
                        @error('inseminationDate') <span class="text-danger"><i class="entypo-info-circled"></i>  {{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12 mt-2 {{ $errors->has('bloodGroup') ? 'has-error' : '' }}">
                        <label for="bloodGroup">Mother's Blood Group - মায়ের রক্তের গ্রুপ</label>
                        <input value="{{ isset($baby) ? $baby->bloodGroup : old('bloodGroup') }}" name="bloodGroup" type="text" id="bloodGroup" maxlength="3" placeholder="O+" required>
                        @error('bloodGroup') <span class="text-danger"><i class="entypo-info-circled"></i>  {{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="save-btn mt-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .save-btn {
            background-color: #a3a0fb;
            border: 1px solid #e3e3e3;
            width: 100%;
            height: 36px;
            color: #ffffff;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .basic-input {
            margin-bottom: 20px;
        }
        .basic-input label {
            color: #908fac;
            margin-bottom: 4px;
        }
        .basic-input input {
            border-radius: 9px;
            border: 1px solid #707070;
            width: 100%;
            padding: 4px 8px;
        }
        #baby-modal-close {
            background-color: #ffffff;
            border: none;
            height: 36px;
            color: grey;
            font-size: 22px;
            font-weight: normal;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $("#inseminationDate").datepicker({
                orientation: "bottom left",
                endDate: new Date(),
                format: 'dd-mm-yyyy'
            });
        });
        /**
         * Open baby update modal.
         */
        const updateBaby = () => {
            $("#update-baby-modal").modal("show");
        };
        $(document).ready(function () {
            $(document).on("click", ".updateBaby", function (e) {
                e.preventDefault();
                updateBaby();
            });
        });
        /**
         * Close baby update modal.
         */
        function modalClose() {
            $("#update-baby-modal").modal("hide");
        }
    </script>
@endpush
